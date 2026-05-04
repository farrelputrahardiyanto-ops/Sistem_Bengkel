<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrivingPackages;
use App\Http\Requests\StoreDrivingPackagesRequest;
use Exception;

class DrivingPackagesController extends Controller
{
    //


    public function index()
    {
        $drivingPackages = DrivingPackages::orderBy('created_at', 'asc')->paginate(10);
        return view('pages.admin.drivingpackages.index', compact('drivingPackages'));
    
    }

    public function create()
    {
        return view('pages.admin.drivingpackages.create');
    }

    public function store(StoreDrivingPackagesRequest $request)
    {
        $request->validated();

       

        try{
             DrivingPackages::create($request->all());
             return redirect()->route('drivingpackage.index')->with('success', 'Driving package created successfully.');
        }catch(Exception $e)
        {
            return back()->with('eror', $e);
        }
        
    }

    public function edit(string $id)
    {
        $drivingpackages = DrivingPackages::findOrFail($id);

        return view('pages.admin.drivingpackages.edit', compact('drivingpackages'));
    }

    public function update(string $id, StoreDrivingPackagesRequest $request)
    {
        $drivingPackages = DrivingPackages::findOrFail($id);

        $data = $request->validated();

        try{
            $drivingPackages->update($data);

            return redirect()->route('drivingpackage.index');
        }
        catch(Exception $e)
        {
            return back()->with('eror', $e);
        }

       
    }

    public function destroy(string $id)
    {
        $drivingPackages = DrivingPackages::findOrFail($id);

          try {
                $drivingPackages->delete();
                return redirect()->route('drivingpackage.index');
            } catch (Exception $e) {
                return back()->with('error', 'Gagal menghapus data');
            }
    }

}
