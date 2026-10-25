<?php

// Local dev router for `php artisan serve` / `php -S` — this project keeps index.php in the root (shared-hosting layout).
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '');
$file = realpath(__DIR__.$uri);

if ($uri !== '/' && $file && is_file($file) && str_starts_with($file, __DIR__) && pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
    $types = [
        'css' => 'text/css', 'js' => 'application/javascript', 'json' => 'application/json', 'map' => 'application/json',
        'svg' => 'image/svg+xml', 'png' => 'image/png', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'gif' => 'image/gif',
        'webp' => 'image/webp', 'ico' => 'image/x-icon', 'woff' => 'font/woff', 'woff2' => 'font/woff2', 'ttf' => 'font/ttf',
        'eot' => 'application/vnd.ms-fontobject', 'otf' => 'font/otf', 'mp4' => 'video/mp4', 'pdf' => 'application/pdf',
        'txt' => 'text/plain', 'xml' => 'application/xml', 'html' => 'text/html',
    ];
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    header('Content-Type: '.($types[$ext] ?? (mime_content_type($file) ?: 'application/octet-stream')));
    header('Content-Length: '.filesize($file));
    readfile($file);
    return true;
}

require_once __DIR__.'/index.php';
