<?php

$host = 'localhost'; // À adapter selon votre configuration
$dbname = 'swissExplorers';
$username = 'leo-trn';
$password = 'Super12345@';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}