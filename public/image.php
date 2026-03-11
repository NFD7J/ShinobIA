<?php
// Simple secure image proxy for files stored under views/game/images
// Usage: image.php?f=logo_dark_shadow.png or image.php?f=emotes_sensei/sensei_idea.png
if (!isset($_GET['f'])) {
    http_response_code(400);
    echo 'Missing file param';
    exit;
}

// Remove any path traversal attempts
$filename = str_replace('..', '', $_GET['f']);
$allowedDir = realpath(__DIR__ . '/../views/game/images/');
$path = realpath($allowedDir . '/' . $filename);

// Ensure file is inside allowed directory and exists
if ($path === false || strpos($path, $allowedDir) !== 0 || !is_file($path)) {
    http_response_code(404);
    echo 'Not found';
    exit;
}

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $path);
finfo_close($finfo);

header('Content-Type: ' . $mime);
header('Content-Length: ' . filesize($path));
readfile($path);
exit;
