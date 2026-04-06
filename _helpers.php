<?php
declare(strict_types=1);

function config(?string $key = null, mixed $default = null): mixed
{
    $config = $GLOBALS['config'] ?? [];

    if ($key === null) {
        return $config;
    }

    $segments = explode('.', $key);
    $value = $config;

    foreach ($segments as $segment) {
        if (!is_array($value) || !array_key_exists($segment, $value)) {
            return $default;
        }

        $value = $value[$segment];
    }

    return $value;
}

function app_name(): string
{
    return (string) config('app.name', 'Mood');
}

function e(null|string|int|float $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function redirect(string $path): never
{
    header('Location: ' . $path);
    exit;
}

function is_post(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';
}

function set_flash(string $type, string $message): void
{
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message,
    ];
}

function pull_flash(): ?array
{
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);

    return is_array($flash) ? $flash : null;
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return (string) $_SESSION['csrf_token'];
}

function csrf_input(): string
{
    return '<input type="hidden" name="_token" value="' . e(csrf_token()) . '">';
}

function verify_csrf(): bool
{
    $token = $_POST['_token'] ?? '';

    return is_string($token) && hash_equals(csrf_token(), $token);
}

function ensure_csrf_or_abort(): void
{
    if (!verify_csrf()) {
        abort(419, 'Invalid CSRF token.');
    }
}

function abort(int $status, string $message): never
{
    http_response_code($status);
    echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Error</title><style>body{font-family:Arial,sans-serif;padding:2rem;background:#f8f5ef;color:#171411}article{max-width:40rem;margin:auto;background:#fff;padding:2rem;border-radius:1rem;box-shadow:0 18px 40px rgba(0,0,0,.08)}</style></head><body><article><h1>Error ' . e((string) $status) . '</h1><p>' . e($message) . '</p></article></body></html>';
    exit;
}

function slugify(string $value): string
{
    $value = trim($value);
    $transliterated = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $value);
    $value = $transliterated !== false ? $transliterated : $value;
    $value = strtolower($value);
    $value = preg_replace('/[^a-z0-9]+/', '-', $value) ?? '';
    $value = trim($value, '-');

    return $value !== '' ? $value : 'item';
}

function format_currency(float $amount): string
{
    $formatted = floor($amount) === $amount
        ? number_format($amount, 0)
        : number_format($amount, 2);

    return $formatted . ' ل.س';
}

function parse_attributes(string $value): array
{
    $lines = preg_split('/\r\n|\r|\n/', $value) ?: [];

    return array_values(array_filter(array_map(static fn ($line) => trim($line), $lines)));
}

function excerpt(string $value, int $limit = 120): string
{
    $value = trim(preg_replace('/\s+/', ' ', strip_tags($value)) ?? '');

    if ($value === '') {
        return '';
    }

    if (function_exists('mb_strlen') && function_exists('mb_substr')) {
        if (mb_strlen($value) <= $limit) {
            return $value;
        }

        return rtrim(mb_substr($value, 0, $limit - 3)) . '...';
    }

    if (strlen($value) <= $limit) {
        return $value;
    }

    return rtrim(substr($value, 0, $limit - 3)) . '...';
}

function request_query_string(string $key, string $default = ''): string
{
    $value = $_GET[$key] ?? $default;

    return is_string($value) ? trim($value) : $default;
}

function request_query_int(string $key): ?int
{
    $value = filter_input(INPUT_GET, $key, FILTER_VALIDATE_INT);

    return $value === false || $value === null ? null : (int) $value;
}

function nav_is_active(string $current, string $expected): string
{
    return $current === $expected ? 'is-active' : '';
}
