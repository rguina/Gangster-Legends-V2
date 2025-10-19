<?php
// Test de connexion PDO simple
try {
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    echo "Connection OK without database\n";

    // Test avec la base de données gangster
    $pdo2 = new PDO('mysql:host=localhost;dbname=gangster', 'root', '');
    echo "Connection OK with database\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
