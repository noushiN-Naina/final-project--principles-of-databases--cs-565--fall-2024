<?php
require_once 'includes/php/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search = $_POST['search'];

    $sql = "SELECT * FROM accounts WHERE site_name LIKE :search";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':search' => "%$search%"]);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        foreach ($results as $row) {
            echo "Site Name: " . htmlspecialchars($row['site_name']) . "<br>";
            echo "Username: " . htmlspecialchars($row['username']) . "<br>";
            echo "Email: " . htmlspecialchars($row['email']) . "<br><br>";
        }
    } else {
        echo "No results found!";
    }
}
?>
