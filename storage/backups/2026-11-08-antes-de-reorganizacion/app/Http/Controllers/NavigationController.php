<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NavigationController extends Controller
{
    public function favorites(): View
    {
        return view('navigation.favorites');
    }

    public function notifications(): View
    {
        return view('navigation.notifications');
    }

    public function profile(Request $request): View
    {
        return view('navigation.profile', [
            'user' => $request->session()->get('demo_user'),
        ]);
    }
}
