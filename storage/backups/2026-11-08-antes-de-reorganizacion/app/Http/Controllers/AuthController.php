<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(Request $request): View|RedirectResponse
    {
        $this->applyRememberedSessionLifetime($request);

        if ($request->session()->has('demo_user')) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    public function showRegister(Request $request): View|RedirectResponse
    {
        $this->applyRememberedSessionLifetime($request);

        if ($request->session()->has('demo_user')) {
            return redirect()->route('home');
        }

        return view('auth.register');
    }

    public function login(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string'],
            'remember' => ['sometimes', 'boolean'],
        ], [
            'email.required' => 'Escribe tu correo electrónico.',
            'email.email' => 'Escribe un correo electrónico válido.',
            'email.max' => 'El correo no puede tener más de 255 caracteres.',
            'password.required' => 'Escribe tu contraseña.',
        ]);

        $email = Str::lower($validated['email']);
        $accounts = $request->session()->get('demo_accounts', []);
        $registeredAccount = $accounts[$email] ?? null;
        $isDefaultAccount = $email === 'demo@ayulta.mx'
            && hash_equals('ayulta123', $validated['password']);
        $isRegisteredAccount = is_array($registeredAccount)
            && isset($registeredAccount['password'])
            && Hash::check($validated['password'], $registeredAccount['password']);

        if (! $isDefaultAccount && ! $isRegisteredAccount) {
            throw ValidationException::withMessages([
                'email' => 'No encontramos una cuenta con esos datos. Verifica tu correo y contraseña.',
            ]);
        }

        $request->session()->put('demo_user', [
            'name' => $isDefaultAccount ? 'Alex' : $registeredAccount['name'],
            'email' => $email,
            'is_demo' => $isDefaultAccount,
            'remember' => $request->boolean('remember'),
        ]);

        if ($request->boolean('remember')) {
            config(['session.lifetime' => config('session.remember_lifetime')]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('home'))->with('success', '¡Qué bueno tenerte de vuelta!');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Escribe tu nombre.',
            'name.max' => 'El nombre no puede tener más de 100 caracteres.',
            'email.required' => 'Escribe tu correo electrónico.',
            'email.email' => 'Escribe un correo electrónico válido.',
            'email.max' => 'El correo no puede tener más de 255 caracteres.',
            'password.required' => 'Escribe una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $email = Str::lower($validated['email']);
        $accounts = $request->session()->get('demo_accounts', []);

        if ($email === 'demo@ayulta.mx' || isset($accounts[$email])) {
            throw ValidationException::withMessages([
                'email' => 'Este correo ya está registrado en esta demostración.',
            ]);
        }

        $accounts[$email] = [
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
        ];

        $request->session()->put('demo_accounts', $accounts);
        $request->session()->put('demo_user', [
            'name' => $validated['name'],
            'email' => $email,
            'is_demo' => false,
            'remember' => false,
        ]);
        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Tu cuenta de demostración está lista.');
    }

    public function recoverPassword(Request $request): RedirectResponse
    {
        $this->applyRememberedSessionLifetime($request);

        $request->validate([
            'recovery_email' => ['required', 'email', 'max:255'],
        ], [
            'recovery_email.required' => 'Escribe tu correo electrónico.',
            'recovery_email.email' => 'Escribe un correo electrónico válido.',
            'recovery_email.max' => 'El correo no puede tener más de 255 caracteres.',
        ]);

        return back()->with(
            'success',
            'Recuperación simulada: en una aplicación real recibirías instrucciones por correo.',
        );
    }

    public function logout(Request $request): RedirectResponse
    {
        $accounts = $request->session()->get('demo_accounts', []);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($accounts !== []) {
            $request->session()->put('demo_accounts', $accounts);
        }

        return redirect()->route('login')->with('success', 'Has cerrado tu sesión de demostración.');
    }

    private function applyRememberedSessionLifetime(Request $request): void
    {
        if ($request->session()->get('demo_user.remember')) {
            config(['session.lifetime' => config('session.remember_lifetime')]);
        }
    }
}
