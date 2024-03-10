<?php
           require('configuration.php');
           session_start();

        	$nom=$_POST['nom'];
        	$mail=$_POST['mail'];
        	$pass=$_POST['pass'];

        	$req="INSERT INTO user (nom,mail,pass,type) VALUES('$nom','$mail','$pass','user');";
        	$res=mysqli_query($conn,$req);

        	if($res){
        		echo '<div> <h3>Vous etes inscrit avec succes.</h3>
        		<p>Cliquer ici pour vous <a href="login.html">Connecter</a></p>
        		</div>';
        	}
        	else{
        		echo 'inscription échouée';
        	}
        	mysqli_close($conn);
?>