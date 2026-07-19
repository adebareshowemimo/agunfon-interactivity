<?php

$publicPath = __DIR__.'/public';
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/');
$assetPath = realpath($publicPath.$uri);

if ($uri !== '/'
    && $assetPath !== false
    && str_starts_with($assetPath, realpath($publicPath).DIRECTORY_SEPARATOR)
    && is_file($assetPath)) {
    $mimeType = mime_content_type($assetPath) ?: 'application/octet-stream';
    header('Content-Type: '.$mimeType);
    header('Content-Length: '.filesize($assetPath));
    readfile($assetPath);

    return true;
}

require $publicPath.'/index.php';
