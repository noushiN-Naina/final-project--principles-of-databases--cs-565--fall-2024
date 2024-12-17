<?php
$host = 'localhost';
$dbname = 'passwords';
$username = 'passwords_user';
$password = 'k(D2Whiue9d8yD';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
