<h1 align="center">SwissExplorers</h1>

<p align="justify"><em>SwissExplorers</em> est un projet visant à explorer et documenter les paysages et lieux autour de Genève en Suisse. Nous plaçons aléatoirement des points sur une carte et partons les découvrir, capturant des photos et des moments uniques en chemin.</p>

<h2 align="center">Table des matières</h2>

1. [Aperçu du projet](#aperçu-du-projet)
2. [Fonctionnalités](#fonctionnalités)
3. [Pages](#pages)
4. [Technologies utilisées](#technologies-utilisées)
5. [Installation et utilisation](#installation-et-utilisation)
6. [Potentiels bugs](#potentiels-bugs)

<h2 align="center">Aperçu du projet</h2>

<p align="justify">L'objectif de <strong>SwissExplorers</strong> est de découvrir des endroits inattendus autour de Genève et de capturer ces moments en photo. Les points sont placés de manière aléatoire sur la carte, et notre mission est de les visiter et d'en rapporter des images. Ce site est une trace de toutes nos découvertes, accessible à tous ceux qui souhaitent explorer virtuellement avec nous.</p>

<h2 align="center">Fonctionnalités</h2>

- **Carte interactive** : Visualisez tous les points que nous avons explorés autour de Genève.
- **Photos des lieux visités** : Chaque point cliqué affiche une galerie d'images prises lors de nos visites.
- **Interface moderne** : Design clair et épuré, facile à naviguer.
- **Historique des découvertes** : Retrouvez l'ensemble de nos visites passées et suivez nos nouvelles explorations en temps réel.

<h2 align="center">Pages</h2>
<h3 align="center">Accueil</h3>
<p align="justify">La page d'accueil de SwissExplorers présente une carte interactive affichant tous les points que nous avons explorés autour de Genève. Chaque point correspond à un endroit que nous avons visité et documenté en photos. En cliquant sur un point, une galerie d’images s’affiche, permettant de découvrir les lieux à travers notre regard. L’interface moderne et épurée rend la navigation facile et agréable.</p>

![image](https://github.com/user-attachments/assets/fa017289-1ac8-4722-8f38-79a9a7db68ef)

![image](https://github.com/user-attachments/assets/af786df3-1f3c-4d06-ae4b-c03f0622b2cf)


<h3 align="center">À propos</h3>

<p align="justify">La page À propos offre un aperçu du projet SwissExplorers, expliquant notre démarche et notre objectif de découverte. Elle met en avant une grande image en arrière-plan, représentant les paysages que nous explorons, avec un arc de cercle en avant-plan contenant des informations sur notre aventure et notre motivation.</p>

![image](https://github.com/user-attachments/assets/abf60c5e-71de-44d0-9bfc-1a72020b98a5)

<h2 align="center">Technologies utilisées</h2>

- **Frontend** : HTML, CSS, JavaScript, [Leaflet](https://leafletjs.com/) pour la carte interactive.
- **Backend** : PHP pour le traitement des données et la gestion des points.
- **Base de données** : MySQL pour stocker les informations sur les points et les photos.

<h2 align="center">Installation et utilisation</h2>

<h3>1. Démarrez vos services apache2 et mysql</h3>

```bash
sudo service apache2 start
sudo service apache2 start
```

<h3>3. Rendez-vous dans le répertoire des projets web locaux</h3>

```bash
# Si le sous-système utilisé est WSL :
cd /var/www/html
```

<h3>2. Clonez le dépôt</h3>
      
```bash
git clone https://github.com/username/swissexplorers.git
```

<h3>4. Importez la base de données dans un éditeur SQL</h3>
   <strong><h4>[ATTENTION]</h4></strong> Les images sont stockées sous format BLOB, cela veut dire que le contenu du script SQL est volumineux et contient des caractères spéciaux, nous vous recommandons d'importer le fichier dans sa globalité plutôt que de copier-coller son contenu.

<h3>6. Renommez "configSample.php" en config.php, est ajoutez vos informations de connexion à la base de données</h3>

<h3>7. Ouvrez votre navigateur web et allez sur localhost</h3>

<h2 align="center">Potentiels bugs</h2>
<h3>Impossible de cloner le projet car le dossier /var/www est protégé</h3>
      
```bash
// Donner l'accès d'écriture au dossier www
sudo chown -R www-data:www-data /var/www
sudo chmod -R g+rwX /var/www
 sudo chmod 0777 /var/www
 sudo chown -R [VOTRE USER] var/www
```

