<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_POST['file'];
    if (file_exists($file)) {
        unlink($file); // Supprime le fichier
        header("Location: gallery.php"); // Redirige vers la galerie
        exit();
    } else {
        echo "Le fichier n'existe pas.";
    }
}
?>
