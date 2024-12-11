<?php
$stmt = $pdo->query("SELECT u.id, u.full_name, u.login, u.is_blocked, r.name as role_name 
                     FROM users u
                     JOIN roles r ON u.role_id = r.id");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($users);
?>
