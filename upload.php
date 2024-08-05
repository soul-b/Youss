<?php
$target_dir = "C:/wamp64/www/youssouf/uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Vérifiez si le fichier est une image ou une vidéo
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false || $imageFileType == "mp4") {
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image ou une vidéo.";
        $uploadOk = 0;
    }
}

// Vérifiez si le fichier existe déjà
if (file_exists($target_file)) {
    echo "Désolé, le fichier existe déjà.";
    $uploadOk = 0;
}

// Limitez la taille du fichier
if ($_FILES["file"]["size"] > 500000) {
    echo "Désolé, votre fichier est trop volumineux.";
    $uploadOk = 0;
}

// Limitez les formats de fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "mp4" ) {
    echo "Désolé, seuls les fichiers JPG, JPEG, PNG, GIF et MP4 sont autorisés.";
    $uploadOk = 0;
}

// Vérifiez si $uploadOk est mis à 0 par une erreur
if ($uploadOk == 0) {
    echo "Désolé, votre fichier n'a pas été téléchargé.";
// si tout est ok, essayez de télécharger le fichier
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "Le fichier ". htmlspecialchars( basename( $_FILES["file"]["name"])). " a été téléchargé.";
    } else {
        echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
    }
}
?>
