<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie de Fichiers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="gallery-container">
        <h1>Galerie des Fichiers</h1>

        <div class="navigation">
            <a href="index.html" class="btn-back">Retour à l'accueil</a>
        </div>

        <h2>Images</h2>
        <div class="gallery-images">
            <?php
            $directory = "uploads/";
            $images = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
            $videos = glob($directory . "*.mp4");

            if (!empty($images)) {
                foreach ($images as $image) {
                    echo "<div class='gallery-item'>
                            <img src='$image' alt='Image' style='width:200px;'>
                            <form action='delete.php' method='post'>
                                <input type='hidden' name='file' value='$image'>
                                <button type='submit' class='btn-delete'>Supprimer</button>
                            </form>
                          </div>";
                }
            } else {
                echo "<p>Aucune image disponible.</p>";
            }
            ?>
        </div>

        <h2>Vidéos</h2>
        <div class="gallery-videos">
            <?php
            if (!empty($videos)) {
                foreach ($videos as $video) {
                    echo "<div class='gallery-item'>
                            <video width='320' height='240' controls>
                                <source src='$video' type='video/mp4'>
                                Votre navigateur ne supporte pas le format de la vidéo.
                            </video>
                            <form action='delete.php' method='post'>
                                <input type='hidden' name='file' value='$video'>
                                <button type='submit' class='btn-delete'>Supprimer</button>
                            </form>
                          </div>";
                }
            } else {
                echo "<p>Aucune vidéo disponible.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
