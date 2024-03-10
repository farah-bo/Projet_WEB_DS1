<?php

session_start();

class User {
    private $nom;
    private $mail;
    private $pass;
    private $type;

    public function __construct($nom, $mail, $pass, $type) {
        $this->nom = $nom;
        $this->mail = $mail;
        $this->pass = $pass;
        $this->type = $type;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getType() {
        return $this->type;
    }

    // Méthode pour insérer un utilisateur dans la base de données
    public function insertUserIntoDatabase() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "utilisateurs";

        try {
            $pdo = new PDO("mysql:host=$host; dbname=$database", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $requete = $pdo->prepare("INSERT INTO user (nom, mail, pass, type) VALUES(:nom, :mail, :pass, :type)");
            $requete->bindParam(':nom', $this->nom);
            $requete->bindParam(':mail', $this->mail);
            $requete->bindParam(':pass', $this->pass);
            $requete->bindParam(':type', $this->type);

            $requete->execute();

            $count = $requete->rowCount();

            if ($count > 0) {
                $_SESSION["nom"] = $this->nom;
                echo '<script>alert("Sign up success")</script>';
                sleep(3);
                header("location:login2.php");
            } else {
                echo '<script>alert("Fail");</script>';
            }
        } catch (PDOException $error) {
            $message = $error->getMessage();
        }
    }
}

if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $type = 'user'; // Vous pouvez définir le type comme nécessaire

    // Créer une instance de la classe User
    $user = new User($nom, $mail, $pass, $type);

    // Appeler la méthode pour insérer l'utilisateur dans la base de données
    $user->insertUserIntoDatabase();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index2.css">
    <title>Sign Up Form</title>
        <link rel="icon" type="image/jpg" href="logo2.jpg">
        <script language="javascript" src="signup2.js"></script>

    <style>
        body {
            background-image: url("cv4.jpg") ;
            background-size: cover;
            background-attachment: fixed;
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    
        h2 {
            text-align: center;
            font-size: 45px;
            color: white;
            margin-top: 30px;
            margin-bottom: 30px;
        }



       .input-group{
        position: relative;
        margin:30px 0;
        border-bottom: 2px solid #fff;
        }
        .input-group label{
            position: absolute;
            top:50%;
            left:5px;
            transform: translateY(-50%);
            font-size: 16px;
            color:#fff;
            pointer-events: none;
            transform: .5s;
        }

        .input-group input{
            width: 320px; 
            height:40px;
            font-size: 16px;
            color: #fff;
            padding: 0 5px;
            background: transparent;
            border:none;
            outline: none;
        }
        .input-group input:focus~label,
        .input-group input:valid~label{
            top:-5px
        }
        .remember{
            margin:-5px 0 15px 5px;
        }
        .remember label {
             color: #fff;
             font-size: 14px;
        }
        .remember label input {
            accent-color: #0ef;
        }
        button{
            position: relative;
            width: 100%;
            height: 40px;
            background: #0ef;
            box-shadow: 0 0 10px #0ef;
            font-size: 16px;
            color: #000;
            font-weight: 500;
            cursor: pointer;
            border-radius: 30px;
            border: none;
            outline: none;
        }
        .ins{
            position: relative;
            width: 400px;
            height: 550px;
            background: transparent;
            box-shadow: 0 0 50px #0ef;
            border-radius: 20px;
            padding: 40px;
          /* overflow: hidden;*/
        }
        .form-ins{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            transition: 1s ease-in-out ;
        }
        .sign-up{
            font-size: 14px;
            text-align: center;
            margin: 15px 0;
        }
        .sign-up p{
            color: #fff;
        }
        .sign-up p a {
            color: #0ef;
            text-decoration: none;
            font-weight: 500;
        }
        .sign-up p a:hover {
            text-decoration: underline;
        }


    </style>
</head>
<body>
    <div class="menu">
    <nav>
        <img src="logo2.jpg" class="logo">
        <ul>
            <li><a href="index2.html">Acceuil</a></li>
            <li><a href="#">Sign up</a></li>
            <li><a href="login2.php">Login</a></li>
        </ul>
    </nav>
    <div class="ins">
    <div class="form-ins sign-up">
        <form method="POST">
            <h2>Sign Up</h2>
            <div class="input-group">
                <input type="text" name="nom" required>
                <label for="nom">Username</label>
            </div>
            <div class="input-group">
                <input type="email" name="mail" required>
                <label for="mail">Email</label>
            </div>
            <div class="input-group">
                <input type="password" name="pass" id="pass" required>
                <label for="pass">Password</label>
            </div>
            <div class="input-group">
                <input type="password" name="pass2" id="pass2" required>
                <label for="pass2">Confirm password</label>
            </div>
            <div class="remember">
                <label><input type="checkbox" id="btn">I agree to the terms & conditions</label>
            </div>
            <button type="submit" onclick="return check()">Sign Up</button>
            <div class="sign-up">
                <p>Already  have an account?<a href="login2.php"class="signIn-btn">Login</a></p>
            </div>
        </div>
</body>
</html>

