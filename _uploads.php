<?php
declare(strict_types=1);

function ensure_product_upload_dir(): string
{
    $directory = (string) config('uploads.products_dir', __DIR__ . '/uploads/products');

    if (!is_dir($directory)) {
        mkdir($directory, 0775, true);
    }

    return $directory;
}

function normalize_uploaded_files(array $files): array
{
    $normalized = [];

    $names = $files['name'] ?? [];
    $tmpNames = $files['tmp_name'] ?? [];
    $errors = $files['error'] ?? [];
    $sizes = $files['size'] ?? [];

    if (!is_array($names)) {
        return [];
    }

    foreach ($names as $index => $name) {
        $normalized[] = [
            'name' => $name,
            'tmp_name' => $tmpNames[$index] ?? '',
            'error' => $errors[$index] ?? UPLOAD_ERR_NO_FILE,
            'size' => $sizes[$index] ?? 0,
        ];
    }

    return $normalized;
}

function has_uploaded_files(array $files): bool
{
    foreach (normalize_uploaded_files($files) as $file) {
        if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE) {
            return true;
        }
    }

    return false;
}

function store_product_images(array $files): array
{
    $normalized = normalize_uploaded_files($files);
    $storedPaths = [];
    $allowedExtensions = config('uploads.allowed_extensions', []);
    $allowedMime = config('uploads.allowed_mime', []);
    $maxSize = (int) config('uploads.max_image_size', 5 * 1024 * 1024);
    $uploadDirectory = ensure_product_upload_dir();
    $finfo = finfo_open(FILEINFO_MIME_TYPE);

    try {
        foreach ($normalized as $file) {
            if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
                continue;
            }

            if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
                throw new RuntimeException('One of the uploaded images could not be processed.');
            }

            if ((int) ($file['size'] ?? 0) > $maxSize) {
                throw new RuntimeException('Each image must be smaller than 5 MB.');
            }

            $extension = strtolower(pathinfo((string) ($file['name'] ?? ''), PATHINFO_EXTENSION));
            if (!in_array($extension, $allowedExtensions, true)) {
                throw new RuntimeException('Images must be JPG, PNG, WEBP, or GIF files.');
            }

            $mimeType = $finfo ? finfo_file($finfo, (string) $file['tmp_name']) : '';
            if (!is_string($mimeType) || !in_array($mimeType, $allowedMime, true)) {
                throw new RuntimeException('An uploaded file is not a valid image.');
            }

            $filename = bin2hex(random_bytes(16)) . '.' . $extension;
            $destination = $uploadDirectory . DIRECTORY_SEPARATOR . $filename;
            $relativePath = rtrim((string) config('uploads.products_url', 'uploads/products'), '/') . '/' . $filename;

            if (!move_uploaded_file((string) $file['tmp_name'], $destination)) {
                throw new RuntimeException('The server could not save one of the uploaded images.');
            }

            $storedPaths[] = $relativePath;
        }
    } catch (Throwable $exception) {
        foreach ($storedPaths as $path) {
            delete_uploaded_image($path);
        }

        throw $exception;
    } finally {
        if ($finfo) {
            finfo_close($finfo);
        }
    }

    return $storedPaths;
}

function delete_uploaded_image(?string $relativePath): void
{
    if (!$relativePath) {
        return;
    }

    $basePath = (string) config('app.base_path', __DIR__);
    $fullPath = $basePath . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $relativePath);

    if (is_file($fullPath)) {
        unlink($fullPath);
    }
}
