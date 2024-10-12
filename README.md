<h1 align="center">SwissExplorers</h1>

<p align="center"><em>SwissExplorers</em> est un projet visant à explorer et documenter les paysages et lieux autour de Genève en Suisse. Nous plaçons aléatoirement des points sur une carte et partons les découvrir, capturant des photos et des moments uniques en chemin.</p>

<h2 align="center">Table des matières</h2>

1. [Aperçu du projet](#aperçu-du-projet)
2. [Fonctionnalités](#fonctionnalités)
3. [Pages](#pages)
4. [Technologies utilisées](#technologies-utilisées)
5. [Installation et utilisation](#installation-et-utilisation)

<h2 align="center">Aperçu du projet</h2>

L'objectif de *SwissExplorers* est de découvrir des endroits inattendus autour de Genève et de capturer ces moments en photo. Les points sont placés de manière aléatoire sur la carte, et notre mission est de les visiter et d'en rapporter des images. Ce site est une trace de toutes nos découvertes, accessible à tous ceux qui souhaitent explorer virtuellement avec nous.

<h2 align="center">Fonctionnalités</h2>

- **Carte interactive** : Visualisez tous les points que nous avons explorés autour de Genève.
- **Photos des lieux visités** : Chaque point cliqué affiche une galerie d'images prises lors de nos visites.
- **Interface moderne** : Design clair et épuré, facile à naviguer.
- **Historique des découvertes** : Retrouvez l'ensemble de nos visites passées et suivez nos nouvelles explorations en temps réel.

<h2 align="center">Pages</h2>

<h2 align="center">Technologies utilisées</h2>

- **Frontend** : HTML, CSS, JavaScript, [Leaflet](https://leafletjs.com/) pour la carte interactive.
- **Backend** : PHP pour le traitement des données et la gestion des points.
- **Base de données** : MySQL pour stocker les informations sur les points et les photos.

<h2 align="center">Installation et utilisation</h2>

Pour exécuter ce projet en local :
1. Démarrez vos services apache2 et mysql
   ```bash
   sudo service apache2 start
   sudo service apache2 start
3. Rendez-vous dans le répertoire des projets web locaux
   ```bash
   # Si le sous-système utilisé est WSL :
   cd /var/www/html
2. Clonez le dépôt :
   ```bash
   git clone https://github.com/username/swissexplorers.git
4. Importez la base de données dans un éditeur SQL
5. Renommez "configSample.php" en config.php, est ajoutez vos informations de connexion à la base de données
6. Ouvrez votre navigateur web et allez sur localhost
