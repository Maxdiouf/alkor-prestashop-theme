<?php
// Diagnostic simple
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<!DOCTYPE html>";
echo "<html><head><title>Test PrestaShop</title></head><body>";
echo "<h1>🔍 Diagnostic PrestaShop</h1>";

// Vérifications de base
echo "<h2>Environnement</h2>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Working Directory: " . getcwd() . "<br>";
echo "Memory Limit: " . ini_get('memory_limit') . "<br>";

echo "<h2>Fichiers requis</h2>";
$required_files = [
    'config/config.inc.php',
    'classes/ObjectModel.php',
    'classes/Context.php',
    'classes/Tools.php'
];

foreach ($required_files as $file) {
    $exists = file_exists($file);
    echo $file . ": " . ($exists ? "✅ Existe" : "❌ Manquant") . "<br>";
    if ($exists) {
        echo "  → Taille: " . filesize($file) . " bytes<br>";
    }
}

echo "<h2>Test d'inclusion</h2>";
if (file_exists('./config/config.inc.php')) {
    echo "Tentative d'inclusion de config.inc.php...<br>";
    try {
        include_once('./config/config.inc.php');
        echo "✅ Config inclus avec succès<br>";
    } catch (Throwable $e) {
        echo "❌ Erreur config: " . $e->getMessage() . "<br>";
    }
}

echo "</body></html>";
