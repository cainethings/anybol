<?php
// Phase 0: minimal router-like front controller
declare(strict_types=1);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Simple CORS and JSON headers for dev
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, X-Admin-Key');
header('Access-Control-Allow-Methods: GET, POST, PATCH, OPTIONS');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}
header('Content-Type: application/json');

if ($uri === '/api/health') {
    echo json_encode(['ok' => true, 'message' => 'PHP API alive']);
    exit;
}

http_response_code(404);
echo json_encode(['error' => 'Not Found', 'path' => $uri]);
