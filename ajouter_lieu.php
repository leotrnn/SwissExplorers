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
    $adresse = $_POST['adresse'];

    // URL de l'API Nominatim pour la recherche d'adresse
    $adresseEncodee = urlencode($adresse);
    $url = "https://nominatim.openstreetmap.org/search?format=json&q={$adresseEncodee}";

    // Configuration du contexte avec un User-Agent personnalisé
    $opts = [
        "http" => [
            "method" => "GET",
            "header" => "User-Agent: SwissExplorers/1.0\r\n"
        ]
    ];
    $context = stream_context_create($opts);

    // Effectuer la requête à l'API
    $response = file_get_contents($url, false, $context);
    $data = json_decode($response);

    // Vérifier si une réponse est reçue
    if (!empty($data) && isset($data[0])) {
        $latitude = $data[0]->lat;
        $longitude = $data[0]->lon;

        // Préparer l'insertion du lieu avec les coordonnées récupérées
        $stmt = $pdo->prepare("INSERT INTO lieux_visites (nom, description, latitude, longitude) VALUES (:nom, :description, :latitude, :longitude)");
        $stmt->execute(['nom' => $nom, 'description' => $description, 'latitude' => $latitude, 'longitude' => $longitude]);

        // Récupérer l'ID du lieu inséré
        $lieuId = $pdo->lastInsertId();

        // Traitement des images
        if (isset($_FILES['images'])) {
            foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
                $fileType = $_FILES['images']['type'][$key];
                $image = null;

                // Créer une image selon le type (JPEG ou PNG)
                if ($fileType === 'image/jpeg' || $fileType === 'image/jpg') {
                    $image = imagecreatefromjpeg($tmpName);
                } elseif ($fileType === 'image/png') {
                    $image = imagecreatefrompng($tmpName);
                }

                // Si l'image est créée avec succès, on la compresse
                if ($image !== null) {
                    // Chemin temporaire pour stocker l'image compressée
                    $compressedPath = 'compressed_' . $key . '.jpg';

                    // Sauvegarder l'image compressée (qualité à 75 pour une bonne compression)
                    imagejpeg($image, $compressedPath, 75);
                    imagedestroy($image);

                    // Lire le contenu de l'image compressée
                    $fileData = file_get_contents($compressedPath);

                    // Insérer l'image compressée dans la base de données
                    $stmt = $pdo->prepare("INSERT INTO images (idLieu, image) VALUES (:lieu_id, :image_blob)");
                    $stmt->execute(['lieu_id' => $lieuId, 'image_blob' => $fileData]);

                    // Supprimer l'image temporaire compressée
                    unlink($compressedPath);
                }
            }
        }

        echo "Lieu ajouté avec succès !";
        header("Location: index.php");
    } else {
        echo "Erreur : Impossible de récupérer les coordonnées pour cette adresse.";
    }
}
?>
