<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->has('demo_user')) {
            return redirect()->route('login');
        }

        if ($request->session()->get('demo_user.remember')) {
            config(['session.lifetime' => config('session.remember_lifetime')]);
        }

        return $next($request);
    }
}
