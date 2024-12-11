<?php
$data = json_decode(file_get_contents('php://input'), true);

$full_name = $data['full_name'];
$login = $data['login'];
$password = password_hash($data['password'], PASSWORD_BCRYPT);
$role_id = $data['role_id'];

$stmt = $pdo->prepare("INSERT INTO users (full_name, login, password_hash, role_id) VALUES (?, ?, ?, ?)");
$stmt->execute([$full_name, $login, $password, $role_id]);

echo json_encode(["status" => "User created successfully"]);
?>
