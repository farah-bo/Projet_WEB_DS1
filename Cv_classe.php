<?php

class CV {
    private $id; // Ajoutez l'ID avec auto-incrémentation
    private $nom;
    private $lnom;
    private $mail;
    private $headline;
    private $phone;
    private $adr;
    private $cp;
    private $city;
    private $degree;
    private $ecole1;
    private $lieuDiplome1;
    private $descriptionDiplome1;
    private $datedegree;
    private $degree2;
    private $ecole2;
    private $lieuDiplome2;
    private $descriptionDiplome2;
    private $datedegree2;
    private $work;
    private $entreprise1;
    private $lieu1;
    private $description1;
    private $datework;
    private $work2;
    private $entreprise2;
    private $lieu2;
    private $description2;
    private $datework2;
    private $skills;
    private $certif;
    private $languages;
    private $languages2;
    private $languages3;
    private $linkedIn;
    private $facebook;
    private $git;
    private $imagePath; // Chemin de l'image

    public function __construct($id,$nom, $lnom, $mail, $headline, $phone, $adr, $cp, $city, $degree, $ecole1, $lieuDiplome1, $descriptionDiplome1, $datedegree, $degree2, $ecole2, $lieuDiplome2, $descriptionDiplome2, $datedegree2, $work, $entreprise1, $lieu1, $description1, $datework, $work2, $entreprise2, $lieu2, $description2, $datework2, $skills, $certif, $languages, $languages2, $languages3, $linkedIn, $facebook, $git, $imagePath) {
        $this->id = $id;
        $this->nom = $nom;
        $this->lnom = $lnom;
        $this->mail = $mail;
        $this->headline = $headline;
        $this->phone = $phone;
        $this->adr = $adr;
        $this->cp = $cp;
        $this->city = $city;
        $this->degree = $degree;
        $this->ecole1 = $ecole1;
        $this->lieuDiplome1 = $lieuDiplome1;
        $this->descriptionDiplome1 = $descriptionDiplome1;
        $this->datedegree = $datedegree;
        $this->degree2 = $degree2;
        $this->ecole2 = $ecole2;
        $this->lieuDiplome2 = $lieuDiplome2;
        $this->descriptionDiplome2 = $descriptionDiplome2;
        $this->datedegree2 = $datedegree2;
        $this->work = $work;
        $this->entreprise1 = $entreprise1;
        $this->lieu1 = $lieu1;
        $this->description1 = $description1;
        $this->datework = $datework;
        $this->work2 = $work2;
        $this->entreprise2 = $entreprise2;
        $this->lieu2 = $lieu2;
        $this->description2 = $description2;
        $this->datework2 = $datework2;
        $this->skills = $skills;
        $this->certif = $certif;
        $this->languages = $languages;
        $this->languages2 = $languages2;
        $this->languages3 = $languages3;

        $this->linkedIn = $linkedIn;
        $this->facebook = $facebook;
        $this->git = $git;
        $this->imagePath = $imagePath;

    }

public static function fetchCVFromDatabase() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "utilisateurs";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = $pdo->prepare("SELECT * FROM cv ORDER BY id DESC LIMIT 1");
        $requete->execute();
        $row = $requete->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new CV(
                $row['id'],
                $row['nom'],
                $row['lnom'],
                $row['mail'],
                $row['headline'],
                $row['phone'],
                $row['adr'],
                $row['cp'],
                $row['city'],
                $row['degree'],
                $row['ecole1'],
                $row['lieuDiplome1'],
                $row['descriptionDiplome1'],
                $row['datedegree'],
                $row['degree2'],
                $row['ecole2'],
                $row['lieuDiplome2'],
                $row['descriptionDiplome2'],
                $row['datedegree2'],
                $row['work'],
                $row['entreprise1'],
                $row['lieu1'],
                $row['description1'],
                $row['datework'],
                $row['work2'],
                $row['entreprise2'],
                $row['lieu2'],
                $row['description2'],
                $row['datework2'],
                $row['skills'],
                $row['certif'],
                $row['languages'],
                $row['languages2'],
                $row['languages3'],
                $row['linkedin'],
                $row['facebook'],
                $row['git'],
                $row['imagePath']

            );
        } else {
            echo "Aucune donnée de CV n'a été trouvée dans la base de données.";
            return null;
        }
    } catch (PDOException $error) {
        echo "Erreur de connexion à la base de données: " . $error->getMessage();
        return null;
    }
}



    public static function addCVToDatabase($nom, $lnom, $mail, $headline, $phone, $adr, $cp, $city, $degree, $ecole1, $lieuDiplome1, $descriptionDiplome1, $datedegree, $degree2, $ecole2, $lieuDiplome2, $descriptionDiplome2, $datedegree2, $work, $entreprise1, $lieu1, $description1, $datework, $work2, $entreprise2, $lieu2, $description2, $datework2, $skills, $certif, $languages, $languages2, $languages3, $linkedIn, $facebook, $git) {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "utilisateurs";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // Vérifier si un fichier a été téléchargé
        if (isset($_FILES['imagePath']) && $_FILES['imagePath']['error'] === UPLOAD_ERR_OK) {
            // Déplacer le fichier téléchargé vers le dossier souhaité
            $uploadDirectory = 'images/';
            $imagePath = $uploadDirectory . basename($_FILES['imagePath']['name']);
            move_uploaded_file($_FILES['imagePath']['tmp_name'], $imagePath);
        }

            $requete = $pdo->prepare("INSERT INTO cv (nom, lnom, mail, headline, phone, adr, cp, city, degree, ecole1, lieuDiplome1, descriptionDiplome1, datedegree, degree2, ecole2, lieuDiplome2, descriptionDiplome2, datedegree2, work, entreprise1, lieu1, description1, datework, work2, entreprise2, lieu2, description2, datework2, skills, certif, languages, languages2, languages3, linkedIn, facebook, git,imagePath)
                VALUES (:nom, :lnom, :mail, :headline, :phone, :adr, :cp, :city, :degree, :ecole1, :lieuDiplome1, :descriptionDiplome1, :datedegree, :degree2, :ecole2, :lieuDiplome2, :descriptionDiplome2, :datedegree2,  :work, :entreprise1, :lieu1, :description1, :datework, :work2, :entreprise2, :lieu2, :description2, :datework2, :skills, :certif, :languages, :languages2, :languages3, :linkedIn, :facebook, :git, :imagePath)");

            // Bind parameters
            $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
            $requete->bindParam(':lnom', $lnom, PDO::PARAM_STR);
            $requete->bindParam(':mail', $mail, PDO::PARAM_STR);
            $requete->bindParam(':headline', $headline, PDO::PARAM_STR);
            $requete->bindParam(':phone', $phone, PDO::PARAM_STR);
            $requete->bindParam(':adr', $adr, PDO::PARAM_STR);
            $requete->bindParam(':cp', $cp, PDO::PARAM_STR);
            $requete->bindParam(':city', $city, PDO::PARAM_STR);
            $requete->bindParam(':degree', $degree, PDO::PARAM_STR);
            $requete->bindParam(':ecole1', $ecole1, PDO::PARAM_STR);
            $requete->bindParam(':lieuDiplome1', $lieuDiplome1, PDO::PARAM_STR);
            $requete->bindParam(':descriptionDiplome1', $descriptionDiplome1, PDO::PARAM_STR);
            $requete->bindParam(':datedegree', $datedegree, PDO::PARAM_STR);
            $requete->bindParam(':degree2', $degree2, PDO::PARAM_STR);
            $requete->bindParam(':ecole2', $ecole2, PDO::PARAM_STR);
            $requete->bindParam(':lieuDiplome2', $lieuDiplome2, PDO::PARAM_STR);
            $requete->bindParam(':descriptionDiplome2', $descriptionDiplome2, PDO::PARAM_STR);
            $requete->bindParam(':datedegree2', $datedegree2, PDO::PARAM_STR);
            $requete->bindParam(':work', $work, PDO::PARAM_STR);
            $requete->bindParam(':entreprise1', $entreprise1, PDO::PARAM_STR);
            $requete->bindParam(':lieu1', $lieu1, PDO::PARAM_STR);
            $requete->bindParam(':description1', $description1, PDO::PARAM_STR);
            $requete->bindParam(':datework', $datework, PDO::PARAM_STR);
            $requete->bindParam(':work2', $work2, PDO::PARAM_STR);
            $requete->bindParam(':entreprise2', $entreprise2, PDO::PARAM_STR);
            $requete->bindParam(':lieu2', $lieu2, PDO::PARAM_STR);
            $requete->bindParam(':description2', $description2, PDO::PARAM_STR);
            $requete->bindParam(':datework2', $datework2, PDO::PARAM_STR);
            $requete->bindParam(':skills', $skills, PDO::PARAM_STR);
            $requete->bindParam(':certif', $certif, PDO::PARAM_STR);
            $requete->bindParam(':languages', $languages, PDO::PARAM_STR);
            $requete->bindParam(':languages2', $languages2, PDO::PARAM_STR);
            $requete->bindParam(':languages3', $languages3, PDO::PARAM_STR);
            $requete->bindParam(':linkedIn', $linkedIn, PDO::PARAM_STR);
            $requete->bindParam(':facebook', $facebook, PDO::PARAM_STR);
            $requete->bindParam(':git', $git, PDO::PARAM_STR);
            $requete->bindParam(':imagePath', $imagePath, PDO::PARAM_STR);

            $requete->execute();

            $id = $pdo->lastInsertId(); // Récupère l'ID généré pour le nouveau CV

            return new CV(
                $id,
                $nom,
                $lnom,
                $mail,
                $headline,
                $phone,
                $adr,
                $cp,
                $city,
                $degree,
                $ecole1,
                $lieuDiplome1,
                $descriptionDiplome1,
                $datedegree,
                $degree2,
                $ecole2,
                $lieuDiplome2,
                $descriptionDiplome2,
                $datedegree2,
                $work,
                $entreprise1,
                $lieu1,
                $description1,
                $datework,
                $work2,
                $entreprise2,
                $lieu2,
                $description2,
                $datework2,
                $skills,
                $certif,
                $languages,
                $languages2,
                $languages3,
                $linkedIn,
                $facebook,
                $git,
                $imagePath
            );
        } catch (PDOException $error) {
            echo "Erreur d'ajout du CV dans la base de données: " . $error->getMessage();
            return null;
        }
    }



    // Ajoutez des méthodes getter pour accéder aux propriétés

 public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getLnom() {
        return $this->lnom;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getHeadline() {
        return $this->headline;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getAdr() {
        return $this->adr;
    }

    public function getCp() {
        return $this->cp;
    }

    public function getCity() {
        return $this->city;
    }

    public function getDegree() {
        return $this->degree;
    }

    public function getEcole1() {
        return $this->ecole1;
    }

    public function getLieuDiplome1() {
        return $this->lieuDiplome1;
    }

    public function getDescriptionDiplome1() {
        return $this->descriptionDiplome1;
    }

    public function getDateDegree() {
        return $this->datedegree;
    }

    public function getDegree2() {
        return $this->degree2;
    }

    public function getEcole2() {
        return $this->ecole2;
    }

    public function getLieuDiplome2() {
        return $this->lieuDiplome2;
    }

    public function getDescriptionDiplome2() {
        return $this->descriptionDiplome2;
    }

    public function getDateDegree2() {
        return $this->datedegree2;
    }

    public function getWork() {
        return $this->work;
    }

    public function getEntreprise1() {
        return $this->entreprise1;
    }

    public function getLieu1() {
        return $this->lieu1;
    }

    public function getDescription1() {
        return $this->description1;
    }

    public function getDateWork() {
        return $this->datework;
    }

    public function getWork2() {
        return $this->work2;
    }

    public function getEntreprise2() {
        return $this->entreprise2;
    }

    public function getLieu2() {
        return $this->lieu2;
    }

    public function getDescription2() {
        return $this->description2;
    }

    public function getDateWork2() {
        return $this->datework2;
    }

    public function getSkills() {
        return $this->skills;
    }

    public function getCertif() {
        return $this->certif;
    }

    public function getLanguages() {
        return $this->languages;
    }
    public function getLanguages2() {
        return $this->languages2;
    }
    public function getLanguages3() {
             return $this->languages3;
     }
    public function getLinkedIn() {
        return $this->linkedIn;
    }

    public function getFacebook() {
        return $this->facebook;
    }

    public function getGit() {
        return $this->git;
    }
      public function getImagePath() {
            return $this->imagePath;
        }
}


?>
