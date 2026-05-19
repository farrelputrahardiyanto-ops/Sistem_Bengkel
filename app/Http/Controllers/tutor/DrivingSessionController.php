<?php

namespace App\Http\Controllers\tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DrivingSession;
use App\Models\UserDrivingPackages;
use Illuminate\Support\Facades\Auth;

class DrivingSessionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $sessions = DrivingSession::with([
                'userPackage.user',
                'userPackage.car',
                'userPackage.package'
            ])
            ->whereHas('userPackage', function($q){

                $q->where(
                    'tutor_id',
                    Auth::id()
                );

            })
            ->latest()
            ->get();

        return view(
            'pages.tutor.driving_session.index',
            compact('sessions')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $session = DrivingSession::with([
                'userPackage.user',
                'userPackage.car',
                'userPackage.package'
            ])
            ->findOrFail($id);

        return view(
            'pages.tutor.driving_session.show',
            compact('session')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $session = DrivingSession::findOrFail($id);

        return view(
            'pages.tutor.driving_session.edit',
            compact('session')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $request->validate([

            'status' => 'required',

            'used_hours' => 'required|integer',

            'note' => 'nullable'

        ]);

        $session = DrivingSession::findOrFail($id);

        $session->update([

            'status' => $request->status,

            'used_hours' => $request->used_hours,

            'note' => $request->note

        ]);

        return redirect()
            ->route('tutor.driving.session')
            ->with(
                'success',
                'Session updated successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $session = DrivingSession::findOrFail($id);

        $session->delete();

        return redirect()
            ->back()
            ->with(
                'success',
                'Session deleted successfully'
            );
    }
}