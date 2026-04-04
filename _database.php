<?php
declare(strict_types=1);

function db(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $settings = config('db');

    if (!is_array($settings)) {
        abort(500, 'Database settings are missing.');
    }

    $dsn = sprintf(
        'mysql:host=%s;port=%s;dbname=%s;charset=%s',
        $settings['host'] ?? '127.0.0.1',
        $settings['port'] ?? '3306',
        $settings['database'] ?? '',
        $settings['charset'] ?? 'utf8mb4'
    );

    try {
        $pdo = new PDO(
            $dsn,
            (string) ($settings['username'] ?? ''),
            (string) ($settings['password'] ?? ''),
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
    } catch (PDOException $exception) {
        abort(500, 'Database connection failed. Update config.php with your MySQL settings before loading the project.');
    }

    return $pdo;
}
