<?php
require_once 'includes/php/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $site_name = $_POST['site_name'];
    $site_url = $_POST['site_url'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO accounts (site_name, site_url, first_name, last_name, username, email, password, comment)
            VALUES (:site_name, :site_url, :first_name, :last_name, :username, :email, AES_ENCRYPT(:password, 'secret_key'), :comment)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':site_name' => $site_name,
        ':site_url' => $site_url,
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':username' => $username,
        ':email' => $email,
        ':password' => $password,
        ':comment' => $comment
    ]);

    echo "Entry added successfully!";
}
?>
