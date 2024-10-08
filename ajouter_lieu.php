<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connexion à la base de données
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

    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Préparer l'insertion du lieu
    $stmt = $pdo->prepare("INSERT INTO lieux_visites (nom, description, latitude, longitude) VALUES (:nom, :description, :latitude, :longitude)");
    $stmt->execute(['nom' => $nom, 'description' => $description, 'latitude' => $latitude, 'longitude' => $longitude]);

    // Récupérer l'ID du lieu inséré
    $lieuId = $pdo->lastInsertId();

    // Traitement des images
    if (isset($_FILES['images'])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
            $fileData = file_get_contents($tmpName);
            $stmt = $pdo->prepare("INSERT INTO images (idLieu, image) VALUES (:lieu_id, :image_blob)");
            $stmt->execute(['lieu_id' => $lieuId, 'image_blob' => $fileData]);
        }
    }

    echo "Lieu ajouté avec succès !";
}
?>
