<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Extends the session lifetime for "Mantener sesión iniciada".
 *
 * It runs before StartSession so the extended lifetime also applies to the
 * cookie session driver, whose expiration is fixed when the session starts.
 */
class ApplyRememberedSessionLifetime
{
    public const COOKIE = 'ayulta_remember';

    /**
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isRememberedLogin = $request->routeIs('login.store') && $request->boolean('remember');

        if ($isRememberedLogin || $request->cookies->get(self::COOKIE) === '1') {
            config(['session.lifetime' => config('session.remember_lifetime')]);
        }

        return $next($request);
    }
}
