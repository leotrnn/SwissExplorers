<?php

include("header.php");


?>
    <div class="main">
        <div class="center">
            <div class="card">
                <h1>Ajouter un lieu</h1>
                <form action="ajouter_lieu.php" method="POST" enctype="multipart/form-data">
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
                            <label for="adresse">Adresse :</label>
                            <input type="text" id="adresse" name="adresse" required>
                        </div>
                        <div>
                            <label for="images">Ajouter des images :</label>
                            <input type="file" id="images" name="images[]" accept="image/*" multiple required>
                        </div>
                        <div>
                            <button class="btnForm" type="submit">Ajouter le lieu</button>
                        </div>
                    </form>


            </div>
        </div>
    </div>
</body>



</html>