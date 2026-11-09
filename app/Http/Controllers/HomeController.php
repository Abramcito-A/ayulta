<?php

namespace App\Http\Controllers;

use App\Support\LearningContent;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request, LearningContent $content): View
    {
        return view('home.index', [
            'user' => $request->session()->get('demo_user'),
            'modules' => $content->modules(),
        ]);
    }
}
