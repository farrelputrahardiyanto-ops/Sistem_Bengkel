<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    //


    function index(){
        $users = User::orderBy('created_at', 'asc')->limit(10)->get();

        return view('pages.admin.user.index', compact('users'));
    }


    function create(){
        return view('pages.admin.user.create');
    }

    function edit(string $id){
        $user = User::findOrFail($id);

        return view('pages.admin.user.edit', compact('user'));
        
    }

    function store(StoreUserRequest $request){
        $data = $request->validated();

        if($request->hasFile('profile_picture')){
            $profile_picture = $request->file('profile_picture');
            $profile_picture->storeAs('user', $profile_picture->hashName(), 'public');
            $data['profile_picture'] = $profile_picture->hashName();
        }

        $data['password'] = Hash::make($data['password']);

        try {
            User::create($data);
            return redirect()->route('user.index');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal memasukan data')->withInput();
        }
    }

    function update(UpdateUserRequest $request, string $id){
        $user = User::findOrFail($id);

        $data = $request->validated();

        if($request->hasFile('profile_picture')){

        if ($user->profile_picture) {
            Storage::delete('public/user/' . $user->profile_picture);
        }

            $profile_picture = $request->file('profile_picture');
            $profile_picture->storeAs('user', $profile_picture->hashName(), 'public');
            $data['profile_picture'] = $profile_picture->hashName();

          
           
           
        }

        if($request->filled('password')){
             $data['password'] = Hash::make($data['password']);

        }else{
            unset($data['password']);
        }

         $user->update($data);
         return redirect()->route('user.index');
    }

    function destroy(string $id){
        $user = User::findOrFail($id);

        if ($user->profile_picture) {
            Storage::delete('public/user/' . $user->profile_picture);
        }
      
        $user->delete();

        return redirect()->route('user.index');

    }

    function show(string $id){
        $user = User::findOrFail($id);

        return view('pages.admin.user.show', compact('user'));
    }
}
