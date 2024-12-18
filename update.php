<?php
require_once 'includes/php/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $site_name = $_POST['site_name'];
    $comment = $_POST['comment'];

    $sql = "UPDATE accounts SET site_name = :site_name, comment = :comment WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id,
        ':site_name' => $site_name,
        ':comment' => $comment
    ]);

    echo "Entry updated successfully!";
}
?>
