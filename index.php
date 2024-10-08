<?php

error_reporting(E_ALL); // Rapport de toutes les erreurs
ini_set('display_errors', 1); // Afficher les erreurs à l'écran

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte interactive des lieux visités</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="css/index.css">
</head>



<body>
    <div class="header">
        <a href="addLieu.php">Ajouter un marker</a>
        <h1>Swiss Explorers</h1>
    </div>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Initialisation de la carte
        var map = L.map('map').setView([46.2044, 6.1432], 13); // Centre sur Genève

        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            maxZoom: 18,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>'
        }).addTo(map);



        // Récupération des données en JSON via PHP
        fetch('get_lieux.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(lieu => {
                    // Créer un marqueur avec un numéro
                    var numberIcon = L.divIcon({
                        html: `<div class="custom-marker">${lieu.description}</div>`,
                        className: '',
                        iconSize: [30, 30]
                    });

                    // Construire le contenu de la popup
                    let popupContent = `<strong class="titleMarker">${lieu.nom}</strong>`;
                    if (lieu.image_url) {
                        popupContent += `<br><img src="${lieu.image_url}" alt="${lieu.nom}" style="width: 100px; height: auto;">`;
                    }

                    // Ajouter le marqueur à la carte
                    L.marker([lieu.latitude, lieu.longitude], { icon: numberIcon })
                        .addTo(map)
                        .bindPopup(popupContent);
                });
            });
    </script>

</body>

</html>