<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

require_once 'db.php';

$request_uri = rtrim(explode('?', $_SERVER['REQUEST_URI'], 2)[0], '/'); // Удаляем завершающий слэш

switch ($request_uri) {
    case '':
    case '/':
        echo json_encode(["message" => "Welcome to the API"]);
        break;
    case '/users':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require 'users/list.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require 'users/create.php';
        }
        break;
    case '/users/block':
        require 'users/block.php';
        break;
    case '/roles':
        require 'roles/list.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(["error" => "Route not found"]);
}
