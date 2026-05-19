<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrivingPackages;
use App\Models\UserDrivingPackages;
use Illuminate\Support\Facades\Auth;
use App\Models\DrivingSession;
use App\Models\Service;

class HomeController extends Controller
{
    //

    public function index() {
        return view('pages.user.index');
    }

    public function servis(){
        $services = Service::with('car.model')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

        return view('pages.user.servis', compact('services'));
    }

public function driving_course()
{
    $packages = DrivingPackages::all()->keyBy('id');

    $userPackages = UserDrivingPackages::with([
            'package',
            'car',
            'tutor'
        ])
        ->where('user_id', Auth::id())
        ->where('status', 'active')
        ->latest()
        ->get();

    $drivingSessions = DrivingSession::with([
            'car',
            'instructor',
            'userPackage'
        ])
        ->whereHas('userPackage', function($q){

            $q->where('user_id', Auth::id());

        })
        ->latest()
        ->get();

    return view(
        'pages.user.driving_course',
        compact(
            'packages',
            'userPackages',
            'drivingSessions'
        )
    );
}

    public function contact(){
        return view('pages.user.contact');
    }
}
