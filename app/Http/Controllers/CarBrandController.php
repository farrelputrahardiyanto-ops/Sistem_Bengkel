<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarBrand;
use Exception;

class CarBrandController extends Controller
{
    public function index() {
        $cars = CarBrand::orderBy('created_at', 'asc')->paginate(10);

        return view('pages.admin.carbrand.index', compact('cars'));
    }

    public function create() {
        return view('pages.admin.carbrand.create');
    }


    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try {
            CarBrand::create($request->all());
            return redirect()->route('carbrand.index');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal memasukan data')->withInput();
        }
    }

    public function edit(string $id) {
        $car = CarBrand::findOrFail($id);

        return view('pages.admin.carbrand.edit', compact('car'));
    }

    public function update(Request $request, string $id) {
        $car = CarBrand::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try {
            $car->update($request->all());
            return redirect()->route('carbrand.index');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal memperbarui data')->withInput();
        }
    }

        public function destroy(string $id) {
            $car = CarBrand::findOrFail($id);
    
            try {
                $car->delete();
                return redirect()->route('carbrand.index');
            } catch (Exception $e) {
                return back()->with('error', 'Gagal menghapus data');
            }
        }
}
