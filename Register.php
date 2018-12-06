<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=life_is_strange', 'root', ''); //liaison entre le site et la base de donnée

if(isset($_POST['forminscription'])) {
   $mail = htmlspecialchars($_POST['mail']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   if(!empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) { // voir ce que l'utilisateur a saisi dans les champs.
    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
        $reqmail->execute(array($mail));
        $mailexist = $reqmail->rowCount();
            if($mailexist == 0) {
                if($mdp == $mdp2) { // on regarde si les deux mot de passe saisi sont identiques
                    $insertmbr = $bdd->prepare("INSERT INTO membres(mail, motdepasse) VALUES(?, ?)");
                    $insertmbr->execute(array($mail, $mdp));
                    $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                } else {
                    $erreur = "Vos mots de passes ne correspondent pas !";
                }
            } else {
                $erreur = "Adresse mail déjà utilisée !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
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

<div id="form-group" align="center">
         <h2>Inscription</h2>
         <br /><br />
         <form method="POST" action="">
            
               
                  
                  <td align="right">
                     <label for="mail">Mail :</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" /></br>
                  </td>
               
                  <td align="right">
                     <label for="mdp">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" /></br>
                  </td>
               
               
                  <td align="right" >
                     <label for="mdp2">Confirmation du mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" /></br>
                  </td>
               
               
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" value="Je m'inscris" /></br>
                  </td>
               
            
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="black">'.$erreur."</font>"; // affiche un message d'erreur
         }
         ?>
         </div>
         </body>
</html>
