<?php


$host = "localhost";
$username = "root";
$password = "";
$database = "utilisateurs";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    if (isset($_POST['nom']) ){
        
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

        $requete = $pdo->prepare("SELECT * FROM nom_de_la_table ORDER BY id DESC LIMIT 1 ");
        $requete->execute();
        $count = $requete->rowCount();

        if ($count > 0) {
            $row = $requete->fetch(PDO::FETCH_ASSOC);

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
} catch (PDOException $error) {
    echo "Erreur de connexion à la base de données: " . $error->getMessage();
}
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
    
</body>

</html>
