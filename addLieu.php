<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwissExplorers</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="main">
        <div class="center">
            <div class="card">
                <h1>Ajouter un lieu</h1>
                <form action="ajouter_lieu.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="nom">Nom du lieu :</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>
                    <div>
                        <label for="description">Description :</label>
                        <input type="text" id="description" name="description" required>
                    </div>
                    <div>
                        <label for="latitude">Latitude :</label>
                        <input type="text" id="latitude" name="latitude" required>
                    </div>
                    <div>
                        <label for="longitude">Longitude :</label>
                        <input type="text" id="longitude" name="longitude" required>
                    </div>
                    <div>
                        <label for="images">Ajouter des images :</label>
                        <input type="file" id="images" name="images[]" accept="image/*" multiple required>
                    </div>
                    <div>
                        <button type="submit">Ajouter le lieu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>



</html>