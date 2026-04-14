<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    function create(){
        return view('pages.admin.user.create');
    }

    function store(StoreUserRequest $request){
        $data = $request->validated();

        if($request->hasFile('profile_picture')){
            $profile_picture = $request->file('profile_picture');
            $profile_picture->storeAs('user', $profile_picture->hashName());
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
}
