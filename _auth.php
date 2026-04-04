<?php
declare(strict_types=1);

function is_admin_logged_in(): bool
{
    return !empty($_SESSION['admin_user']);
}

function admin_user(): ?string
{
    $user = $_SESSION['admin_user'] ?? null;

    return is_string($user) ? $user : null;
}

function attempt_admin_login(string $username, string $password): bool
{
    $expectedUser = (string) config('auth.admin_username', 'admin');
    $passwordHash = (string) config('auth.admin_password_hash', '');

    if (!hash_equals($expectedUser, trim($username))) {
        return false;
    }

    return password_verify($password, $passwordHash);
}

function login_admin(string $username): void
{
    session_regenerate_id(true);
    $_SESSION['admin_user'] = $username;
}

function logout_admin(): void
{
    unset($_SESSION['admin_user']);
    session_regenerate_id(true);
}

function require_admin(): void
{
    if (!is_admin_logged_in()) {
        set_flash('error', 'Please log in to access the dashboard.');
        redirect('dashboard-login.php');
    }
}
