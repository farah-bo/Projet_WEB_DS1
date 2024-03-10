<?php  
 session_start();  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "utilisateurs";  
 $message = "";  

 try  
 {  
      $pdo = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

      if(isset($_POST['nom']))  
      {  
            $nom=$_POST['nom'];
            $pass=$_POST['pass'];
            $requete = $pdo->query("SELECT * FROM user WHERE nom = '$nom' AND pass = '$pass' "); 
            $count = $requete->rowCount();  

            //echo "<script>alert('$count')</script>";
                if($count > 0)  
                {  
                     $_SESSION["nom"] = $_POST["nom"];  
                      echo '<script>alert("sucess")</script>';
                     header("location:formulaire.html");  
                }  
                else  
                {  
                    echo '<script>alert("Please check your data");</script>';
                }  
           
      }  
 }  catch(PDOException $error)  
 {  
      $message = $error->getMessage(); 
 }  
 ?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index2.css">
    <title>Login Form</title>
        <link rel="icon" type="image/jpg" href="logo2.jpg">

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
            color: white;
            font-size: 60px;
            margin-top: 50px;
            margin-bottom: 50px;
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
            <li><a href="signup21.php">Sign up</a></li>
            <li><a href="#">Login</a></li>
        </ul>
    </nav>
    <div class="ins">
    <div class="form-ins sign-up">
        <form method="POST">
            <h2>Login</h2>
            <div class="input-group">
                <input type="text" required name="nom">
                <label for="nom" >Username</label>
            </div>

            <div class="input-group">
                <input type="password" required name="pass">
                <label for="pass">Password</label>
            </div>
            <button type="submit">Login</button>
            <div class="sign-up">
                <p>You don't have an account?<a href="signup21.php"class="signIn-btn">Sign up</a></p>
            </div>

        </form>
    </div>
</body>
</html>

