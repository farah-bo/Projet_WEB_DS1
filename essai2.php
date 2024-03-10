<?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "utilisateurs";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Récupérer les données du CV depuis la base de données
    $sql = "SELECT * FROM cv ORDER BY id DESC LIMIT 1"; // Assurez-vous que votre table s'appelle 'cv' et a une colonne 'id'
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Récupérer la première ligne (la plus récente) de résultats
        $row = $result->fetch_assoc();

        // Attribuer les valeurs aux variables pour les utiliser dans le modèle HTML
        $nom = $row["nom"];
        $lnom = $row["lnom"];
        $mail = $row["mail"];
        $headline = $row["headline"];
        $phone = $row["phone"];
        $adr = $row["adr"];
        $cp = $row["cp"];
        $city = $row["city"];
        $degree = $row["degree"];
        $uniname = $row["uniname"];
        $graddate = $row["graddate"];
        $work = $row["work"];
        $skills = $row["skills"];
        $certif = $row["certif"];
        $languages = $row["languages"];
        $linkedIn = $row["linkedIn"];

        // Afficher le contenu du CV
        echo '<div class="cv-container">
                <div class="personal-info">
                    <h1 id="full-name">' . $nom . " " . $lnom . '</h1>
                    <p id="headline">' . $headline . '</p>
                    <p id="email">' . $mail . '</p>
                    <p id="phone">' . $phone . '</p>
                    <p id="address">' . $adr . ', ' . $cp . ' ' . $city . '</p>
                </div>

                <div class="education">
                    <h2>Education</h2>
                    <p id="education-details">' . $degree . ' in ' . $uniname . ' - ' . $graddate . '</p>
                </div>

                <div class="work-experience">
                    <h2>Work Experience</h2>
                    <p id="work-details">' . $work . '</p>
                </div>

                <div class="skills">
                    <h2>Skills</h2>
                    <p id="skills-details">' . $skills . '</p>
                </div>

                <div class="certifications">
                    <h2>Certifications and Licenses</h2>
                    <p id="certifications-details">' . $certif . '</p>
                </div>

                <div class="languages">
                    <h2>Languages</h2>
                    <p id="languages-details">' . $languages . '</p>
                </div>

                <div class="linkedin">
                    <h2>LinkedIn</h2>
                    <p id="linkedin-details">' . $linkedIn . '</p>
                </div>
            </div>';
    } else {
        echo "Aucune donnée de CV n'a été trouvée dans la base de données.";
    }

    // Fermer la connexion à la base de données
    $conn->close();
    ?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cv_template.css">
    <title>CV</title>
</head>

<body>
    <?php
    // Connexion à la base de données
    session_start();  
    $host = "localhost";  
    $username = "root";  
    $password = "";  
    $database = "utilisateurs";  
    $message = ""; 

    // Vérification de la connexion
    try  
    {  
      $pdo = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données du CV depuis la base de données
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['nom']))  
      {
        $nom = $_POST["nom"];
        $lnom = $_POST["lnom"];
        $mail = $_POST["mail"];
        $headline = $_POST["headline"];
        $phone = $_POST["phone"];
        $adr = $_POST["adr"];
        $cp = $_POST["cp"];
        $city = $_POST["city"];
        $degree = $_POST["degree"];
        $uniname = $_POST["uniname"];
        $graddate = $_POST["graddate"];
        $work = $_POST["work"];
        $skills = $_POST["Skills"];
        $certif = $_POST["Certif"];
        $languages = $_POST["Languages"];
        $linkedIn = $_POST["LinkedIn"];

        $requete = $pdo->prepare("SELECT * FROM cv ORDER BY id DESC LIMIT 1");
        $count = $requete->rowCount();

    if ($count> 0) {
        $_SESSION["nom"] = $_POST["nom"];
        // Récupérer la première ligne (la plus récente) de résultats
        /*$row = $result->fetch_assoc();

        // Attribuer les valeurs aux variables pour les utiliser dans le modèle HTML
        $nom = $row["nom"];
        $lnom = $row["lnom"];
        $mail = $row["mail"];
        $headline = $row["headline"];
        $phone = $row["phone"];
        $adr = $row["adr"];
        $cp = $row["cp"];
        $city = $row["city"];
        $degree = $row["degree"];
        $uniname = $row["uniname"];
        $graddate = $row["graddate"];
        $work = $row["work"];
        $skills = $row["skills"];
        $certif = $row["certif"];
        $languages = $row["languages"];
        $linkedIn = $row["linkedIn"];*/

        // Afficher le contenu du CV
        echo '<div class="cv-container">
                <div class="personal-info">
                    <h1 id="full-name">' . $nom . " " . $lnom . '</h1>
                    <p id="headline">' . $headline . '</p>
                    <p id="email">' . $mail . '</p>
                    <p id="phone">' . $phone . '</p>
                    <p id="address">' . $adr . ', ' . $cp . ' ' . $city . '</p>
                </div>

                <div class="education">
                    <h2>Education</h2>
                    <p id="education-details">' . $degree . ' in ' . $uniname . ' - ' . $graddate . '</p>
                </div>

                <div class="work-experience">
                    <h2>Work Experience</h2>
                    <p id="work-details">' . $work . '</p>
                </div>

                <div class="skills">
                    <h2>Skills</h2>
                    <p id="skills-details">' . $skills . '</p>
                </div>

                <div class="certifications">
                    <h2>Certifications and Licenses</h2>
                    <p id="certifications-details">' . $certif . '</p>
                </div>

                <div class="languages">
                    <h2>Languages</h2>
                    <p id="languages-details">' . $languages . '</p>
                </div>

                <div class="linkedin">
                    <h2>LinkedIn</h2>
                    <p id="linkedin-details">' . $linkedIn . '</p>
                </div>
            </div>';
    } else {
        echo "Aucune donnée de CV n'a été trouvée dans la base de données.";
    }
} 
    } 
}  catch(PDOException $error)  
{  
     $message = $error->getMessage(); 
     //echo'erreur connexion';
}  

    // Fermer la connexion à la base de données
    //$conn->close();
    ?>
</body>

</html>
