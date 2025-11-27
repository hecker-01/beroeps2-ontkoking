<?php

/**
 * Authentication helpers: login, logout, roles and flash messaging.
 */

function ensureSessionStarted(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function loginUser(array $user): void
{
    ensureSessionStarted();
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
        'role' => $user['role'],
    ];
}

function logoutUser(): void
{
    ensureSessionStarted();
    unset($_SESSION['user']);
}

function currentUser(): ?array
{
    ensureSessionStarted();
    return $_SESSION['user'] ?? null;
}

function isLoggedIn(): bool
{
    return currentUser() !== null;
}

function isAdmin(): bool
{
    $user = currentUser();
    return $user && $user['role'] === 'admin';
}

function requireLogin(): void
{
    if (!isLoggedIn()) {
        setFlash('error', 'Je moet ingelogd zijn om deze pagina te bekijken.');
        redirect('login.php');
    }
}

function requireAdmin(): void
{
    if (!isAdmin()) {
        setFlash('error', 'Alleen beheerders hebben toegang tot het beheerpaneel.');
        redirect('login.php');
    }
}

function setFlash(string $type, string $message): void
{
    ensureSessionStarted();
    $_SESSION['flash'][$type][] = $message;
}

function getFlashes(): array
{
    ensureSessionStarted();
    $messages = $_SESSION['flash'] ?? [];
    unset($_SESSION['flash']);

    return $messages;
}

function csrf_token(): string
{
    ensureSessionStarted();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function validate_csrf(?string $token): bool
{
    ensureSessionStarted();
    return is_string($token)
        && isset($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $token);
}

?>

