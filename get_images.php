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

// Vérification de l'ID du lieu
if (isset($_GET['id'])) {
    $lieuId = $_GET['id'];

    // Requête pour récupérer les images associées au lieu
    $stmt = $pdo->prepare('SELECT image FROM images WHERE idLieu = :idLieu');
    $stmt->execute(['idLieu' => $lieuId]);
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Convertir les images en base64 avec le type MIME
    $encodedImages = [];
    foreach ($images as $image) {
        $base64Image = base64_encode($image['image']);
        $encodedImages[] = [
            'image' => 'data:image/jpeg;base64,' . $base64Image // Assurez-vous d'utiliser le bon type MIME (ex. image/png si c'est un PNG)
        ];
    }

    // Retourner les données au format JSON
    header('Content-Type: application/json');
    echo json_encode($encodedImages);
}
?>
