<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\CarBrand;
use Execption;
use  App\Http\Requests\StoreCarModelRequest;
use App\Http\Requests\UpdateCarModelRequest;
use Exception;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\HttpCache\Store;

class CarModelController extends Controller
{
    //

    public function index()
    {
        $carmodels = CarModel::orderBy('created_at', 'asc')->paginate(10);

        return view('pages.admin.carmodel.index', compact('carmodels'));
    }

    public function create()
    {
        $brands = CarBrand::all();

        return view('pages.admin.carmodel.create', compact('brands'));

        
    }

    public function edit(string $id)
    {
        $carmodel = CarModel::findOrFail($id);

        $brands = CarBrand::all();

        

        return view('pages.admin.carmodel.edit', compact('carmodel', 'brands'));

    }

    public function store(StoreCarModelRequest $request)
    {
        $data = $request->validated();

        try
        {

            if($request->hasFile('img'))
            {
                $img = $request->file('img');
                $img->storeAs('carmodel', $img->hashName(), 'public');
                $data['img'] = $img->hashName();
            
            }
            CarModel::create($data);

            return redirect()->route('carmodel.index');
        }
        catch(Exception $e)
        {
            return back()->with('eror', 'data gagal masuk' . $e->getMessage());
        }


    }

    public function update(string $id, UpdateCarModelRequest $request)
    {
        $carmodel = CarModel::findOrFail($id);

        $data = $request->validated();

        if($request->hasFile('img'))
            {
                if($carmodel->img){
                    Storage::disk('public')->delete('carmodel/'.$carmodel->img);
                }
                $img = $request->file('img');
                $img->storeAs('carmodel', $img->hashName(), 'public');
                $data['img'] = $img->hashName();
            }

        try{
            $carmodel->update($data);

            return redirect()->route('carmodel.index');
        }
        catch(Exception $e)
        {
            return back()->with('eror', 'data tidak bisa masuk'. $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $carmodel = CarModel::findOrFail($id);

        try{
            $carmodel->delete();

            return redirect()->route('carmodel.index');
        }
        catch(Exception $e)
        {
            return back()->with('eror', 'gagal mengahapus data'. $e->getMessage());
        }
    }
    
}
