<?php
	$bdd = new PDO('mysql:host=localhost;dbname=flipper', 'root', '');
	
	if(isset($_POST['adduser']))
	{	
		if(!empty($_POST['nom']))
		{
			$mdp = htmlspecialchars($_POST['mdp']);
			$user = htmlspecialchars($_POST['nom']);
			$insertmbr = $bdd->prepare("INSERT INTO user(nom, mdp) VALUES(?, ?)");
			$insertmbr->execute(array($user, $mdp));
			header('Location:connexion.php ');
		}
	}
	?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/style.css">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<body>
<form action="" method='post'>
<center>

<h1>Inscription</h1>
<input type="text" name="nom" placeholder="Nom d'utilisateur" autocomplete="off" required >
<br><br>
<input type="password" name="mdp" placeholder="Mot de passe" autocomplete="off" required>
<br><br>
<button name="adduser" class="button button2">S'inscrire</button>
<br>
<a class="lien"href = connexion.php style="color:#FFFFFF;font-size:15px;font-family:Garamond, serif;">Je possède déjà un compte</a>

</center>
</body>
<style>



</html>
