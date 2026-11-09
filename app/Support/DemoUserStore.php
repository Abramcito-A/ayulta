<?php

namespace App\Support;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Stores demonstration accounts. This is NOT a secure authentication system.
 *
 * Drivers (config "ayulta.demo_users_driver"):
 * - "file": private JSON file in storage/app/private (local development).
 * - "cookie": encrypted cookie in the visitor's browser, for hosts with an
 *   ephemeral filesystem such as Render's free plan. Accounts then exist only
 *   in the browser where they were created.
 *
 * Passwords are always hashed with Laravel's Hash facade.
 */
class DemoUserStore
{
    private const MAX_COOKIE_ACCOUNTS = 5;

    private const COOKIE_MINUTES = 60 * 24 * 365;

    /**
     * Accounts created during the current request (cookie driver).
     *
     * @var array<string, array{name: string, password: string, created_at?: string}>|null
     */
    private ?array $pendingAccounts = null;

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

        $this->save($accounts);

        return ['name' => trim($name), 'email' => $email, 'is_demo' => false];
    }

    private function usesCookie(): bool
    {
        return config('ayulta.demo_users_driver') === 'cookie';
    }

    /**
     * @param  array<string, array{name: string, password: string, created_at?: string}>  $accounts
     */
    private function save(array $accounts): void
    {
        if ($this->usesCookie()) {
            $accounts = array_slice($accounts, -self::MAX_COOKIE_ACCOUNTS, null, true);
            $this->pendingAccounts = $accounts;

            Cookie::queue(config('ayulta.demo_users_cookie'), json_encode($accounts, JSON_UNESCAPED_UNICODE), self::COOKIE_MINUTES);

            return;
        }

        Storage::disk('local')->put(
            config('ayulta.demo_users_path'),
            json_encode($accounts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
        );
    }

    /**
     * @return array<string, array{name: string, password: string, created_at?: string}>
     */
    private function all(): array
    {
        if ($this->usesCookie()) {
            $raw = $this->pendingAccounts !== null
                ? json_encode($this->pendingAccounts)
                : request()->cookie(config('ayulta.demo_users_cookie'));
        } else {
            $disk = Storage::disk('local');
            $path = config('ayulta.demo_users_path');
            $raw = $disk->exists($path) ? $disk->get($path) : null;
        }

        $accounts = is_string($raw) ? json_decode($raw, true) : null;

        return is_array($accounts) ? $accounts : [];
    }
}
