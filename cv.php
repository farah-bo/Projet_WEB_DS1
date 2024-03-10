<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre titre</title>
    <link rel="stylesheet" href="cssstyle.css">
</head>
<body>
<?php

// Inclure le fichier contenant la classe CV
require_once('Cv_classe.php');

$host = "localhost";
$username = "root";
$password = "";
$database = "utilisateurs";
$message = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['nom'])) {
      // Vérifie si un fichier a été téléchargé avec succès
            if(isset($_FILES['imagePath']) && $_FILES['imagePath']['error'] === UPLOAD_ERR_OK) {
                // Chemin où vous souhaitez stocker l'image téléchargée sur votre machine locale
                $uploadDirectory = 'images/';

                // Générez un nom de fichier unique pour éviter les conflits de noms de fichier
                $fileName = uniqid() . '_' . basename($_FILES['imagePath']['name']);

                // Chemin complet du fichier sur votre machine locale
                $filePath = $uploadDirectory . $fileName;
                $imagePath = $filePath;

            }
        $nom = $_POST["nom"];
        $lnom = $_POST["lnom"];
        $mail = $_POST["mail"];
        $headline = $_POST["headline"];
        $phone = $_POST["phone"];
        $adr = $_POST["adr"];
        $cp = $_POST["cp"];
        $city = $_POST["city"];
        $degree = $_POST["degree"];
        $ecole1 = $_POST["ecole1"];
        $lieuDiplome1 = $_POST["lieuDiplome1"];
        $descriptionDiplome1 = $_POST["descriptionDiplome1"];
        $datedegree = $_POST["datedegree"];
        $degree2 = $_POST["degree2"];
        $ecole2 = $_POST["ecole2"];
        $lieuDiplome2 = $_POST["lieuDiplome2"];
        $descriptionDiplome2 = $_POST["descriptionDiplome2"];
        $datedegree2 = $_POST["datedegree2"];
        $work = $_POST["work"];
        $entreprise1 = $_POST["entreprise1"];
        $lieu1 = $_POST["lieu1"];
        $description1 = $_POST["description1"];
        $datework = $_POST["datework"];
        $work2 = $_POST["work2"];
        $entreprise2 = $_POST["entreprise2"];
        $lieu2 = $_POST["lieu2"];
        $description2 = $_POST["description2"];
        $datework2 = $_POST["datework2"];
        $skills = $_POST["Skills"];
        $certif = $_POST["Certif"];
        $languages = $_POST["Languages"];
        $languages2 = $_POST["Languages2"];
        $languages3 = $_POST["Languages3"];

        $linkedIn = $_POST["LinkedIn"];
        $facebook = $_POST["facebook"];
        $git = $_POST["git"];


        // Utiliser la fonction addCVToDatabase pour ajouter le CV à la base de données
        $newCV = CV::addCVToDatabase($nom, $lnom, $mail, $headline, $phone, $adr, $cp, $city, $degree, $ecole1, $lieuDiplome1, $descriptionDiplome1, $datedegree, $degree2, $ecole2, $lieuDiplome2, $descriptionDiplome2, $datedegree2, $work, $entreprise1, $lieu1, $description1, $datework, $work2, $entreprise2, $lieu2, $description2, $datework2, $skills, $certif, $languages, $languages2, $languages3, $linkedIn, $facebook, $git, $imagePath);

        if ($newCV) {
            $_SESSION["nom"] = $nom;
            echo '<script>alert("Success")</script>';
            echo '<form method="POST" action="index.php">
                      <input type="image" src="tempCv1.png" alt="Generate the CV 1" name="generer_cv" width="500" height="500">
                  </form>

                  <form method="POST" action="templateCv2.php">
                      <input type="image" src="tempCv2.png" alt="Generate the CV 2" name="generer_cv" width="500" height="500">
                  </form>

                  <form method="POST" action="templateCv3.php">
                      <input type="image" src="tempCv3.png" alt="Generate the CV 3" name="generer_cv" width="500" height="500">
                  </form>';
        } else {
            echo '<script>alert("Fail");</script>';
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
    echo "Erreur: $message";
}

?>

</body>
</html>