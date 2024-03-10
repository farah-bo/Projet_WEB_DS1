// Connexion à la base de données
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utilisateurs";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}*/
/* Traitement du formulaire lorsqu'il est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
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
    $linkedIn = $_POST["LinkedIn"];*/


    // Requête d'insertion dans la base de données
    $sql = "INSERT INTO cv (nom, lnom, mail, headline, phone, adr, cp, city, degree, uniname, graddate, work, skills, certif, languages, linkedIn)
            VALUES ('$nom', '$lnom', '$mail', '$headline', '$phone', '$adr', '$cp', '$city', '$degree', '$uniname', '$graddate', '$work', '$skills', '$certif', '$languages', '$linkedIn')";

    /*if ($conn->query($sql) === TRUE) {
                // Afficher le bouton pour générer le CV
                /*echo '<form method="POST" action="cv_template.php ">
                <button type="submit" name="generer_cv">Générer le CV</button>
              </form>';
    } else {
        echo "Erreur d'enregistrement dans la base de données : " . $conn->error;
    }
} 


// Fermer la connexion à la base de données
$conn->close();*/
?>
