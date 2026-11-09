<?php

namespace App\Support;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Stores demonstration accounts in a private JSON file (storage/app/private).
 * This is NOT a secure authentication system; it only simulates one.
 */
class DemoUserStore
{
    /**
     * @return array{name: string, email: string, is_demo: bool}|null
     */
    public function attempt(string $email, string $password): ?array
    {
        $email = Str::lower(trim($email));
        $demoAccount = config('ayulta.demo_account');

        if ($email === $demoAccount['email']) {
            return hash_equals($demoAccount['password'], $password)
                ? ['name' => $demoAccount['name'], 'email' => $email, 'is_demo' => true]
                : null;
        }

        $account = $this->all()[$email] ?? null;

        if (! is_array($account) || ! Hash::check($password, $account['password'] ?? '')) {
            return null;
        }

        return ['name' => $account['name'], 'email' => $email, 'is_demo' => false];
    }

    public function exists(string $email): bool
    {
        $email = Str::lower(trim($email));

        return $email === config('ayulta.demo_account.email') || array_key_exists($email, $this->all());
    }

    /**
     * @return array{name: string, email: string, is_demo: bool}
     */
    public function create(string $name, string $email, string $password): array
    {
        $email = Str::lower(trim($email));
        $accounts = $this->all();

        $accounts[$email] = [
            'name' => trim($name),
            'password' => Hash::make($password),
            'created_at' => now()->toIso8601String(),
        ];

        Storage::disk('local')->put(
            config('ayulta.demo_users_path'),
            json_encode($accounts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
        );

        return ['name' => trim($name), 'email' => $email, 'is_demo' => false];
    }

    /**
     * @return array<string, array{name: string, password: string, created_at?: string}>
     */
    private function all(): array
    {
        $disk = Storage::disk('local');
        $path = config('ayulta.demo_users_path');

        if (! $disk->exists($path)) {
            return [];
        }

        $accounts = json_decode((string) $disk->get($path), true);

        return is_array($accounts) ? $accounts : [];
    }
}
