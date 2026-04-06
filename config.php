<?php
declare(strict_types=1);

return [
    'app' => [
        'name' => 'Mood',
        'base_path' => __DIR__,
    ],
    'db' => [
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'hooka_tobacco',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
    ],
    'auth' => [
        'admin_username' => 'admin',
        'admin_password_hash' => '$2y$10$YEzzYLFTXqYo6tj6DtwSluCXN/MiYI3N9vWStaOV0b2vODMIuK3Cm',
    ],
    'uploads' => [
        'products_dir' => __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'products',
        'products_url' => 'uploads/products',
        'max_image_size' => 5 * 1024 * 1024,
        'allowed_extensions' => ['jpg', 'jpeg', 'png', 'webp', 'gif'],
        'allowed_mime' => ['image/jpeg', 'image/png', 'image/webp', 'image/gif'],
    ],
];
