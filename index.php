<?php

include('header.php');

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

    <div id="map"></div>
    <div id="sidebar">
        <h2 class="titleSidebar">Détails du lieu</h2>
        <div id="imagesContainer"></div>
    </div>

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

                    // Ajouter le marqueur à la carte
                    var marker = L.marker([lieu.latitude, lieu.longitude], { icon: numberIcon })
                        .addTo(map);

                    // Événement au clic sur le marqueur
                    marker.on('click', function () {
                        afficherImages(lieu.idLieu, lieu.nom); // Assurez-vous que 'lieu.id' existe ici
                    });
                });

            });

        function afficherImages(lieuId, lieuNom) {
            fetch(`get_images.php?id=${lieuId}`)
                .then(response => response.json())
                .then(images => {
                    console.log(images); // Vérifiez ce que vous récupérez

                    const sidebar = document.getElementById('sidebar');
                    const imagesContainer = document.getElementById('imagesContainer');

                    // Mettre à jour le titre
                    document.querySelector('.titleSidebar').textContent = `Images de ${lieuNom}`;

                    // Vider le conteneur des images
                    imagesContainer.innerHTML = '';

                    // Ajouter les images récupérées
                    images.forEach(image => {
                        const imgElement = document.createElement('img');
                        imgElement.src = image.image; // La source est déjà sous forme de chaîne base64 avec le bon type MIME
                        imagesContainer.appendChild(imgElement);
                    });

                    // Afficher la section latérale
                    sidebar.style.display = 'block';
                });
        }



    </script>

</body>

</html>