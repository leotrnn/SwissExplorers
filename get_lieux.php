<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=swissExplorers;charset=utf8';
$user = 'leo-trn';
$pass = 'Super12345@';

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    exit();
}

// Requête pour récupérer les lieux
$query = $pdo->query('SELECT * FROM lieux_visites');
$lieux = $query->fetchAll(PDO::FETCH_ASSOC);

// Retourner les données au format JSON
header('Content-Type: application/json');
echo json_encode($lieux);
?>
