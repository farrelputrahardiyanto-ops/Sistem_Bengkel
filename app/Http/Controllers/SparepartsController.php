<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sparepart;
use App\Http\Requests\StoreSparepartsRequest;
use App\Http\Controllers\Returntype;
use App\Http\Requests\UpdateSparepartsRequest;
use Exception;
use Illuminate\Support\Facades\Storage;


class SparepartsController extends Controller
{
    //
    function index() {
        $spareparts = Sparepart::orderBy('created_at', 'asc')->limit(10)->get();

        return view('pages.admin.sparepart.index', compact('spareparts'));
    }

    function create() {
        return view('pages.admin.sparepart.create');
    }

    function store(StoreSparepartsRequest $request) {
        $data = $request->validated();

        $img = $request->file('img');
        $img->storeAs('sparepart', $img->hashName(), 'public');
        $data['img'] = $img->hashName();

        try {
            Sparepart::create($data);
            return redirect()->route('sparepart.index');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal memasukan data')->withInput();
        }
    }

    function edit(string $id) {
        $sparepart = Sparepart::findOrFail($id);

        return view('pages.admin.sparepart.edit', compact('sparepart'));
    }

    function update(UpdateSparepartsRequest $request, string $id) {
        $sparepart = Sparepart::findOrFail($id);
        $data = $request->validated();

        if($request->hasFile('img')) {
            $img = $request->file('img');
            $img->storeAs('sparepart', $img->hashName(), 'public');
            Storage::disk('public')->delete('sparepart/'.$sparepart->img);
            $data['img'] = $img->hashName();
        }

        try {
            $sparepart->update($data);
            return redirect()->route('sparepart.index');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal mengubah data')->withInput();
        }
    }

    function destroy(string $id) {
        $sparepart = Sparepart::findOrFail($id);

        try {
            Storage::disk('public')->delete('sparepart/'.$sparepart->img);
            $sparepart->delete();
            return redirect()->route('sparepart.index');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menghapus data');
        }
    }
}
