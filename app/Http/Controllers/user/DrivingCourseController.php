<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CarModel;
use App\Models\User;
use App\Models\UserDrivingPackages;
use App\Models\DrivingSession;
use App\Models\TutorCar;
use App\Models\DrivingPackages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Midtrans\Config;
use Midtrans\Snap;

use Carbon\Carbon;

class DrivingCourseController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PACKAGE PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $packages = DrivingPackages::all();

        $userPackages = UserDrivingPackages::with([
            'package'
        ])
        ->where('user_id', Auth::id())
        ->where('status', 'active')
        ->get();

        $drivingSessions = DrivingSession::with([
            'car',
            'tutor',
            'userPackage'
        ])
        ->whereHas('userPackage', function ($q) {
            $q->where('user_id', Auth::id());
        })
        ->latest()
        ->get();

        return view(
            'pages.user.driving_course.index',
            compact(
                'packages',
                'userPackages',
                'drivingSessions'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CHECKOUT PACKAGE
    |--------------------------------------------------------------------------
    */

public function checkout($id)
{
    $package = DrivingPackages::findOrFail($id);

    Config::$serverKey = config('midtrans.server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = true;
    Config::$is3ds = true;

    session([
        'driving_course_data' => [
            'user_id' => Auth::id(),
            'package_id' => $package->id
        ]
    ]);

    $params = [

        'transaction_details' => [

            'order_id' =>
                'COURSE-' . time(),

            'gross_amount' =>
                $package->price

        ],

        'customer_details' => [

            'first_name' =>
                Auth::user()->name,

            'email' =>
                Auth::user()->email

        ]
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

    /*
    |--------------------------------------------------------------------------
    | PAYMENT
    |--------------------------------------------------------------------------
    */

    public function payment(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:t_driving_packages,id'
        ]);

        $package = DrivingPackages::findOrFail(
            $request->package_id
        );

        Config::$serverKey =
            config('midtrans.server_key');

        Config::$isProduction =
            config('midtrans.is_production');

        Config::$isSanitized = true;

        Config::$is3ds = true;

        session([
            'driving_course_data' => [

                'user_id' => Auth::id(),

                'package_id' => $package->id

            ]
        ]);

        $params = [

            'transaction_details' => [

                'order_id' =>
                    'COURSE-' . time(),

                'gross_amount' =>
                    $package->price

            ],

            'customer_details' => [

                'first_name' =>
                    Auth::user()->name,

                'email' =>
                    Auth::user()->email

            ]
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

    /*
    |--------------------------------------------------------------------------
    | PAYMENT SUCCESS
    |--------------------------------------------------------------------------
    */

    public function paymentSuccess()
    {
        $data =
            session('driving_course_data');

        if (!$data) {

            return redirect()
                ->route('dashboard.driving-course');
        }

        $package =
            DrivingPackages::findOrFail(
                $data['package_id']
            );

        UserDrivingPackages::create([

            'user_id' =>
                $data['user_id'],

            'package_id' =>
                $package->id,

            'remaining_hours' =>
                $package->total_hours,

            'status' =>
                'active'

        ]);

        session()->forget(
            'driving_course_data'
        );

        return redirect()
            ->route('dashboard.driving-course')
            ->with(
                'success',
                'Payment berhasil'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM SESSION
    |--------------------------------------------------------------------------
    */



public function sessionForm($id)
{
    $userPackage = UserDrivingPackages::with('package')
        ->findOrFail($id);

    // Mobil sesuai AC package
    $cars = TutorCar::with('car.brand')
        ->where('ac_type', $userPackage->package->ac_type)
        ->get();

    // Semua tutor
    $tutors = User::where('role', 'tutor')->get();

    return view(
        'pages.user.driving_course.session_form',
        compact(
            'userPackage',
            'cars',
            'tutors'
        )
    );
}
    /*
    |--------------------------------------------------------------------------
    | STORE SESSION
    |--------------------------------------------------------------------------
    */

  public function sessionStore(Request $request)
{
    $request->validate([

        'id_user_package' => 'required|exists:t_user_driving_packages,id',

        'car_id' => 'required|exists:t_tutor_car,id',

        'tutor_id' => 'required|exists:t_users,id',

        'schedule_date' => 'required|date|after_or_equal:today',

        'start_time' => 'required',

        'used_hours' => 'required|integer|min:1'
    ]);

    $userPackage = UserDrivingPackages::findOrFail(
        $request->id_user_package
    );

    $usedHours = (int) $request->used_hours;

    if ($usedHours > $userPackage->remaining_hours) {

        return back()->with(
            'error',
            'Remaining hours not enough.'
        );
    }

    $start = Carbon::parse(
        $request->schedule_date . ' ' . $request->start_time
    );

    $end = $start->copy()->addHours($usedHours);

    // cek tutor bentrok (tutor memang cuma bisa pegang 1 sesi dalam satu waktu, ini sudah benar)
    $tutorConflict = DrivingSession::where('tutor_id', $request->tutor_id)
        ->where('status', 'scheduled')
        ->where(function ($q) use ($start, $end) {

            $q->whereBetween('start_datetime', [$start, $end])
                ->orWhereBetween('end_datetime', [$start, $end])
                ->orWhere(function ($q2) use ($start, $end) {

                    $q2->where('start_datetime', '<=', $start)
                        ->where('end_datetime', '>=', $end);

                });

        })
        ->exists();

    if ($tutorConflict) {

        return back()->with(
            'error',
            'Tutor is already booked.'
        );
    }

    // ambil data stok mobil
    $tutorCar = TutorCar::findOrFail($request->car_id);

    // hitung berapa unit mobil ini yang sedang dipakai di jam yang overlap
    $carUsedCount = DrivingSession::where('car_id', $request->car_id)
        ->where('status', 'scheduled')
        ->where(function ($q) use ($start, $end) {

            $q->whereBetween('start_datetime', [$start, $end])
                ->orWhereBetween('end_datetime', [$start, $end])
                ->orWhere(function ($q2) use ($start, $end) {

                    $q2->where('start_datetime', '<=', $start)
                        ->where('end_datetime', '>=', $end);

                });

        })
        ->count();

    if ($carUsedCount >= $tutorCar->amount) {

        return back()->with(
            'error',
            'Car is fully booked at that time.'
        );
    }

    DB::transaction(function () use (
        $request,
        $userPackage,
        $usedHours,
        $start,
        $end,
        $tutorCar
    ) {

        DrivingSession::create([

            'id_user_package' => $userPackage->id,

            'session_date' => $start,

            'start_datetime' => $start,

            'end_datetime' => $end,

            'car_id' => $request->car_id,

            'tutor_id' => $request->tutor_id,

            'used_hours' => $usedHours,

            'status' => 'scheduled',

            'note' => null,
        ]);

        $userPackage->decrement(
            'remaining_hours',
            $usedHours
        );

        $tutorCar->decrement('amount');
    });

    return redirect()
        ->route('dashboard.driving-course')
        ->with(
            'success',
            'Driving session created.'
        );
}
}