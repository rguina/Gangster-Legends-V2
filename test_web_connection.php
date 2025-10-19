<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Test de connexion MySQL via Apache/PHP</h1>";

// Afficher les extensions chargées
echo "<h2>Extensions MySQL chargées:</h2>";
echo "PDO: " . (extension_loaded('pdo') ? 'OUI' : 'NON') . "<br>";
echo "PDO_MYSQL: " . (extension_loaded('pdo_mysql') ? 'OUI' : 'NON') . "<br>";

// Test 1: Sans base de données
echo "<h2>Test 1: Connexion sans base de données</h2>";
try {
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    echo "<span style='color:green'>✓ Connexion réussie sans base de données</span><br>";
    $pdo = null;
} catch (Exception $e) {
    echo "<span style='color:red'>✗ Erreur: " . $e->getMessage() . "</span><br>";
}

// Test 2: Avec base de données gangster
echo "<h2>Test 2: Connexion avec base de données 'gangster'</h2>";
try {
    $pdo = new PDO('mysql:host=localhost;dbname=gangster', 'root', '');
    echo "<span style='color:green'>✓ Connexion réussie avec base de données gangster</span><br>";
    $pdo = null;
} catch (Exception $e) {
    echo "<span style='color:red'>✗ Erreur: " . $e->getMessage() . "</span><br>";
}

// Test 3: Avec options PDO
echo "<h2>Test 3: Connexion avec options PDO (INIT_COMMAND)</h2>";
try {
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );
    $pdo = new PDO('mysql:host=localhost;dbname=gangster', 'root', '', $options);
    echo "<span style='color:green'>✓ Connexion réussie avec SET NAMES utf8</span><br>";
    $pdo = null;
} catch (Exception $e) {
    echo "<span style='color:red'>✗ Erreur: " . $e->getMessage() . "</span><br>";
}

echo "<h2>Version PHP</h2>";
echo "PHP Version: " . phpversion() . "<br>";
echo "MySQL Client Version: " . phpversion('pdo_mysql') . "<br>";
?>
