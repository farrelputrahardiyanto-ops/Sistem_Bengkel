<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CarModel;
use App\Models\User;
use App\Models\UserDrivingPackages;
use App\Models\DrivingSession;
use App\Models\DrivingPackages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Midtrans\Config;
use Midtrans\Snap;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DrivingCourseController extends Controller
{
    public function register(Request $request, $id)
{
    $transmission = $request->transmission;

    $acType = $request->ac_type;

    $package = DrivingPackages::findOrFail($id);

    $cars = CarModel::query()
        ->where('transmission', $transmission)
        ->where('is_tutor_car', 1)
        ->get();

    $tutors = User::query()
        ->where('role', 'tutor')
        ->get();

    return view(
        'pages.user.driving_course.register',
        compact(
            'cars',
            'tutors',
            'transmission',
            'acType',
            'package'
        )
    );
}
    

public function store(Request $request)
{
    $request->validate([

        'car_model_id' => 'required',

        'tutor_id' => 'required',

        'transmission' => 'required',

        'ac_type' => 'required',

        'package_id' => 'required'

    ]);

    /*
    |--------------------------------------------------------------------------
    | PACKAGE
    |--------------------------------------------------------------------------
    */

    $package =
        DrivingPackages::findOrFail(
            $request->package_id
        );

    /*
    |--------------------------------------------------------------------------
    | MIDTRANS CONFIG
    |--------------------------------------------------------------------------
    */

    Config::$serverKey =
        config('midtrans.server_key');

    Config::$isProduction =
        config('midtrans.is_production');

    Config::$isSanitized = true;

    Config::$is3ds = true;

    /*
    |--------------------------------------------------------------------------
    | SAVE TEMP SESSION TO SESSION()
    |--------------------------------------------------------------------------
    */

    session([

    'driving_course_data' => [

        'user_id' => Auth::id(),

        'package_id' => $package->id,

        'car_model_id' => $request->car_model_id,

        'tutor_id' => $request->tutor_id,

        'schedule_date' => $request->schedule_date,

        'schedule_time' => $request->schedule_time,

    ]

]);

    /*
    |--------------------------------------------------------------------------
    | MIDTRANS PARAMS
    |--------------------------------------------------------------------------
    */

    $params = [

        'transaction_details' => [

            'order_id' =>
                'COURSE-' . time(),

            'gross_amount' =>
                $package->price,
        ],

        'customer_details' => [

            'first_name' =>
                Auth::user()->name,

            'email' =>
                Auth::user()->email,
        ],
    ];

    $snapToken =
        Snap::getSnapToken($params);

    return view(
        'pages.user.driving_course.payment',
        compact(
            'snapToken',
            'package'
        )
    );
}

public function paymentSuccess()
{
    $data = session('driving_course_data');

    if (!$data) {

        return redirect()->route('home');
    }

    $package = DrivingPackages::findOrFail(
        $data['package_id']
    );

    /*
    |--------------------------------------------------------------------------
    | CREATE USER PACKAGE
    |--------------------------------------------------------------------------
    */

    $userPackage = UserDrivingPackages::create([

        'user_id' => $data['user_id'],

        'package_id' => $package->id,

        'tutor_id' => $data['tutor_id'],

        'car_id' => $data['car_model_id'],

        'remaining_hours' => $package->total_hours,

        'status' => 'active'

    ]);

   



    return redirect()
        ->route('dashboard.driving-course')
        ->with(
            'success',
            'Payment berhasil!'
        );

}
   

public function sessionForm($id)
{
    $userPackage = UserDrivingPackages::with([
            'package',
            'car',
            'tutor'
        ])
        ->findOrFail($id);

    return view(
        'pages.user.driving_course.session_form',
        compact('userPackage')
    );
}

public function sessionStore(Request $request)
{
    $request->validate([

        'id_user_package' => 'required|exists:t_user_driving_packages,id',

        'schedule_date' => 'required|date|after_or_equal:today',

        'start_time' => 'required|date_format:H:i',

        'used_hours' => 'required|integer|min:1',

    ]);

    $userPackage = UserDrivingPackages::findOrFail(
        $request->id_user_package
    );

    // ambil durasi dari input
    $usedHours = (int) $request->used_hours;

    // cek apakah melebihi remaining hours
    if ($usedHours > $userPackage->remaining_hours) {

        return back()->with(
            'error',
            'Remaining hours not enough'
        );

    }

    DB::transaction(function () use (
        $request,
        $userPackage,
        $usedHours
    ) {

        $sessionDateTime = Carbon::parse(

            $request->schedule_date
            . ' ' .
            $request->start_time

        );

        DrivingSession::create([

            'id_user_package' => $userPackage->id,

            'used_hours' => $usedHours,

            'session_date' => $sessionDateTime,

            'status' => 'scheduled',

        ]);

        // kurangi jam paket
        $userPackage->decrement(
            'remaining_hours',
            $usedHours
        );

    });

    return redirect()
        ->route('dashboard.driving-course')
        ->with(
            'success',
            'Driving session created'
        );
}
}


