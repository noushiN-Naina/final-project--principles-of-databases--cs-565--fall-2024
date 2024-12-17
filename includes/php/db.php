<?php
require_once 'config.php';

function fetchAllEntries() {
    global $pdo;
    $stmt = $pdo->query("SELECT id, site_name, site_url, first_name, last_name, username, email, AES_DECRYPT(password, 'secret_key') AS password, comment, created_at FROM accounts");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
