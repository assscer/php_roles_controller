<?php
require_once '../db.php'; 

try {
    $query = $db->query("SELECT id, name AS value FROM roles"); 
    $roles = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($roles);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Database query failed: " . $e->getMessage()]);
}

?>
