<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCars;
use App\Models\CarModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Service;

class ServiceController extends Controller
{
        // 🔹 TAMPIL HALAMAN
    public function index()
    {
        $cars = ServiceCars::with('model')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $models = CarModel::where('is_tutor_car', 1)->get();

        return view('pages.user.servis.servis_car', compact('cars', 'models'));
    }


    public function store(Request $request)
{
    $request->validate([
        'plate_number' => 'required|string|max:255|unique:t_service_cars,plate_number',
        'car_model_id' => 'required|exists:t_car_models,id',
    ]);

    ServiceCars::create([
        'plate_number' => strtoupper($request->plate_number),
        'user_id'      => Auth::id(),
        'car_model_id' => $request->car_model_id,
        'is_active'    => 1,
    ]);

    return redirect()
        ->back()
        ->with('success', 'Car successfully added');  


}
   
    public function booking($id)
    {
        $car = ServiceCars::with('model')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view(
            'pages.user.servis.booking_service',
            compact('car')
        );
    
    
        }

        public function booking_store(Request $request)
{
    $request->validate([

        'car_id' => 'required|exists:t_service_cars,id',

        'reservation_date' => 'required|date',

        'reservation_time' => 'required',

        'services_description' => 'required|string',

    ]);

    $dateTime = \Carbon\Carbon::parse(

        $request->reservation_date . ' ' .
        $request->reservation_time

    );

    Service::create([

        'user_id' => auth()->id(),

        'car_id' => $request->car_id,

        'sales_id' => null,

        'services_description' => $request->services_description,

        'time_reservation' => $dateTime,

        'status' => 'pending',

        'service_price' => 0,

        'total_price' => 0,

    ]);

    return redirect()
        ->route('dashboard.servis')
        ->with(
            'success',
            'Booking service created successfully'
        );
}

}
