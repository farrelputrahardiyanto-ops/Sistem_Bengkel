<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // PROFILE PAGE
    public function show()
    {
        $user = auth()->user();

        return view('pages.user.profile.show', compact('user'));
    }

    // EDIT PAGE
    public function edit()
    {
        $user = auth()->user();

        return view('pages.user.profile.edit', compact('user'));
    }

    // UPDATE PROFILE
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name'            => 'required|max:100',
            'email'           => 'required|email|unique:t_users,email,' . $user->id,
            'no_whatsapp'     => 'required|max:20|unique:t_users,no_whatsapp,' . $user->id,
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password'        => 'nullable|min:6|confirmed'
        ]);

        // upload photo
        if($request->hasFile('profile_picture')){

            // delete old photo
            if($user->profile_picture){
                Storage::delete('public/user/' . $user->profile_picture);
            }

            $photo = $request->file('profile_picture');

            $photoName = time() . '.' . $photo->extension();

            $photo->storeAs('public/user', $photoName);

            $user->profile_picture = $photoName;
        }

        // update basic data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_whatsapp = $request->no_whatsapp;

        // update password kalau diisi
        if($request->password){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('profile.show')
            ->with('success', 'Profile berhasil diupdate');
    }
}