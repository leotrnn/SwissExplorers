<?php
// Connexion à la base de données
include('bdd/bdd.php');

// Requête pour récupérer les lieux
$query = $pdo->query('SELECT * FROM lieux_visites');
$lieux = $query->fetchAll(PDO::FETCH_ASSOC);

// Retourner les données au format JSON
header('Content-Type: application/json');
echo json_encode($lieux);
?>
