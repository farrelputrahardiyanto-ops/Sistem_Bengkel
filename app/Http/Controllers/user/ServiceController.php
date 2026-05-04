<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCars;
use App\Models\CarModel;


class ServiceController extends Controller
{
        // 🔹 TAMPIL HALAMAN
    public function index()
    {
        $cars = ServiceCars::with('model')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        $models = CarModel::all();

        return view('service.index', compact('cars', 'models'));
    }


    // 🔹 SIMPAN DATA MOBIL USER
    public function store(Request $request)
    {
        $request->validate([
            'plate_number' => 'required|unique:t_service_cars,plate_number',
            'car_model_id' => 'required|exists:t_car_models,id',
        ]);

        $car = ServiceCars::create([
            'plate_number' => strtoupper($request->plate_number),
            'car_model_id' => $request->car_model_id,
            'user_id' => auth()->id(),
            'is_active' => 1
        ]);

        return redirect()->back()->with('success', 'Mobil berhasil ditambahkan');
    }
}
