<?php
// Define the root directory
$root = __DIR__;

// Get the requested path
$requestedPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Serve PHP files from the "player" folder
if (preg_match('/^\/player\/(v[1-4]\.php)$/', $requestedPath, $matches)) {
    include $root . '/player/' . $matches[1];
    exit;
}

// Serve static files (js, image, css) from their respective folders
$staticPaths = ['/js/', '/image/', '/css/'];
foreach ($staticPaths as $staticPath) {
    if (strpos($requestedPath, $staticPath) === 0) {
        $filePath = $root . $requestedPath;
        if (file_exists($filePath) && !is_dir($filePath)) {
            return false; // Let PHP handle static files
        }
    }
}

// Default to the landing page (index.php)
include $root . '/index.html';
