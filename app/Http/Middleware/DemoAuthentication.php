<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Protects AYULTA's private screens using the simulated session user.
 */
class DemoAuthentication
{
    /**
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->has('demo_user')) {
            return redirect()->guest(route('login'))
                ->with('success', 'Inicia sesión para continuar con tu aprendizaje.');
        }

        if ($request->session()->get('demo_user.remember')) {
            config(['session.lifetime' => config('session.remember_lifetime')]);
        }

        View::share('currentUser', $request->session()->get('demo_user'));

        return $next($request);
    }
}
