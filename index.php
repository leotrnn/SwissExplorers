<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte interactive des lieux visités</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="index.css">
</head>
<body>

<h1>Swiss Explorers</h1>
<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    // Initialisation de la carte
    var map = L.map('map').setView([46.2044, 6.1432], 13); // Centre sur Genève

    // Ajout d'une couche de tuiles sombre (CartoDB Dark Matter)
    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
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
                L.marker([lieu.latitude, lieu.longitude], { icon: numberIcon })
                    .addTo(map)
                    .bindPopup(`<strong class="titleMarker">${lieu.nom}</strong>`);
            });
        });
</script>

</body>
</html>
