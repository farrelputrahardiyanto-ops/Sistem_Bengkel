<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sparepart;

class SparepartController extends Controller
{
    //

    public function index(Request $request)
{
    $query = Sparepart::query();

    // 🔍 SEARCH
    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('part_code', 'like', '%' . $request->search . '%');
        });
    }

    // 🎯 FILTER
    if ($request->brand_car) {
        $query->where('brand_car', $request->brand_car);
    }

    if ($request->car_type) {
        $query->where('car_type', $request->car_type);
    }

    if ($request->brand_sparepart) {
        $query->where('brand_sparepart', $request->brand_sparepart);
    }

    // 💰 PRICE RANGE
    if ($request->min_price) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->max_price) {
        $query->where('price', '<=', $request->max_price);
    }

    $spareparts = $query->paginate(12)->withQueryString();

    $brands = Sparepart::select('brand_car')->distinct()->pluck('brand_car');
    $types = Sparepart::select('car_type')->distinct()->pluck('car_type');
    $spBrands = Sparepart::select('brand_sparepart')->distinct()->pluck('brand_sparepart');

    return view('pages.user.sparepart', compact(
        'spareparts', 'brands', 'types', 'spBrands'
    ));
}

public function show(string $id)
{
    $spareparts = Sparepart::findOrFail($id);

    return view('pages.user.sparepart.show', compact('spareparts'));
}
}