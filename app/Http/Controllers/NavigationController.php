<?php

namespace App\Http\Controllers;

use App\Support\LearningContent;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NavigationController extends Controller
{
    public function __construct(private LearningContent $content) {}

    public function favorites(): View
    {
        return view('navigation.favorites', [
            'catalog' => $this->content->catalog(),
        ]);
    }

    public function notifications(): View
    {
        return view('navigation.notifications', [
            'catalog' => $this->content->catalog(),
            'reminders' => $this->content->data('notificaciones'),
        ]);
    }

    public function profile(Request $request): View
    {
        return view('navigation.profile', [
            'user' => $request->session()->get('demo_user'),
            'catalog' => $this->content->catalog(),
            'levels' => config('ayulta.levels'),
        ]);
    }
}
