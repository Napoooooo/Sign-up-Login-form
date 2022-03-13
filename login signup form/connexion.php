


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/styleco.css">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<body>
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  width:400px;
  border-radius:8px;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<form action="" method ='post'>
<center>
<h1>Connexion</h1>
<?php
    $bdd = new PDO('mysql:host=localhost;dbname=flipper', 'root', '');


	if(isset($_POST['userco'])){
        $nom = htmlspecialchars($_POST['nom']);
		$mdp = htmlspecialchars($_POST['mdp']);

		if(!empty($_POST['nom']))
		{
            $requser = $bdd->prepare("SELECT * FROM user WHERE nom = ? AND mdp = ?");
            $requser->execute(array($nom, $mdp));
            $userexist = $requser->rowCount();

            if($userexist == 1) {
                $userinfo = $requser->fetch();
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['nom'] = $userinfo['nom'];
                $_SESSION['mdp'] = $userinfo['mdp'];
                header('Location:bienvenue.php');

  	      } else 
            {
            ?>
            <center>
            <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Erreur </strong> Mot de passe ou nom d'utilisateur incorrect :(
            </div>
            <br>
            </center>
            <?php
            }

         }
      } 
    
?>
<input type="text" name="nom" placeholder="Nom d'utilisateur" autocomplete="off" required >
<br><br>
<input type="password" name="mdp" placeholder="Mot de passe" autocomplete="off" required>
<br><br>
<button name="userco" class="button button2">Se connecter</button>
<br>
<a href = index.php style="color:#FFFFFF;font-size:15px;font-family:Garamond, serif;">Je ne possède pas de compte</a>

</center>
</body>
<style>




</html>