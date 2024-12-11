<?php
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['id'];

$stmt = $pdo->prepare("UPDATE users SET is_blocked = NOT is_blocked WHERE id = ?");
$stmt->execute([$user_id]);

echo json_encode(["status" => "User block status toggled"]);
?>
