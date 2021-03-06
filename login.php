<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=formulaire_contacte', 'root', '');
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);  
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?"); // recuperation du mail et du mot de passe dans la base de données
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id_membres'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: dashboard.php?id=".$_SESSION['id']); // envoie vers la page membre
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<html lang="fr">
<link rel="stylesheet" href="../CSS/styles.css"/>
<head>
	<meta charset="UTF-8">
	<title>formulaire contacte  </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"
</head>
<body>

<div id= "form-group" align="center">	
		<h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Email : test@test.fr" />
            <input type="password" name="mdpconnect" placeholder="Mdp : azerty" />
            <br /><br />
            <a href="dashboard.php" title="Dashboard" > <button type="submit" name="formconnexion" value="Se connecter !" class='btn btn-dark'>Se connecter !</button></a>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="black">'.$erreur."</font>";
         }
         ?>
      </div>
         </body>
</html>