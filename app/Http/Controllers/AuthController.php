<?php

namespace App\Http\Controllers;

use App\Support\DemoUserStore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

/**
 * Simulated authentication for the AYULTA demonstration.
 * Sessions are handled by Laravel; accounts live in a private JSON file.
 */
class AuthController extends Controller
{
    public function __construct(private DemoUserStore $users) {}

    public function showLogin(Request $request): View|RedirectResponse
    {
        return $request->session()->has('demo_user')
            ? redirect()->route('home')
            : view('auth.login');
    }

    public function showRegister(Request $request): View|RedirectResponse
    {
        return $request->session()->has('demo_user')
            ? redirect()->route('home')
            : view('auth.register');
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

        $user = $this->users->attempt($validated['email'], $validated['password']);

        if ($user === null) {
            throw ValidationException::withMessages([
                'email' => 'No encontramos una cuenta con esos datos. Verifica tu correo y contraseña.',
            ]);
        }

        $this->startSession($request, $user, $request->boolean('remember'));

        return redirect()->intended(route('home'))->with('success', "¡Qué gusto verte, {$user['name']}!");
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Escribe tu nombre.',
            'name.min' => 'Tu nombre debe tener al menos 2 caracteres.',
            'name.max' => 'El nombre no puede tener más de 100 caracteres.',
            'email.required' => 'Escribe tu correo electrónico.',
            'email.email' => 'Escribe un correo electrónico válido.',
            'email.max' => 'El correo no puede tener más de 255 caracteres.',
            'password.required' => 'Escribe una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        if ($this->users->exists($validated['email'])) {
            throw ValidationException::withMessages([
                'email' => 'Este correo ya está registrado en esta demostración.',
            ]);
        }

        $user = $this->users->create($validated['name'], $validated['email'], $validated['password']);

        $this->startSession($request, $user, false);

        return redirect()->route('home')->with('success', 'Tu cuenta de demostración está lista. ¡Bienvenido a AYULTA!');
    }

    public function recoverPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'recovery_email' => ['required', 'email', 'max:255'],
        ], [
            'recovery_email.required' => 'Escribe tu correo electrónico.',
            'recovery_email.email' => 'Escribe un correo electrónico válido.',
            'recovery_email.max' => 'El correo no puede tener más de 255 caracteres.',
        ]);

        return back()->with(
            'success',
            'Recuperación simulada: no se envió ningún correo. En la demostración puedes usar demo@ayulta.mx / ayulta123.',
        );
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Cerraste tu sesión. ¡Vuelve pronto!');
    }

    /**
     * @param  array{name: string, email: string, is_demo: bool}  $user
     */
    private function startSession(Request $request, array $user, bool $remember): void
    {
        $request->session()->regenerate();
        $request->session()->put('demo_user', [...$user, 'remember' => $remember]);

        if ($remember) {
            config(['session.lifetime' => config('session.remember_lifetime')]);
        }
    }
}
