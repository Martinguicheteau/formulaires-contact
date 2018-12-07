
<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=formulaire_contacte', 'root', ''); //liaison entre le site et la base de donnée
if(isset($_POST['donnee_contact'])) {
   $nom = htmlspecialchars($_POST['nom']);
   $prenom = htmlspecialchars($_POST['prenom']);
   $telephone = htmlspecialchars($_POST['telephone']);
   $mail = htmlspecialchars($_POST['mail']);
   $id_book = $_GET['id'];
   if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['telephone']) AND !empty($_POST['mail'])) { 
        $insertmbr = $bdd->prepare("INSERT INTO donnee_contact(nom, prenom, telephone, mail, id_book) VALUES(?, ?, ?, ?, ?);");
        $insertmbr->execute(array($nom, $prenom, $telephone, $mail, $id_book));                 
}
?>
<?php
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formulaire contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <center>
   <h1> Rajoute un contacte dans ton book !</h1>
    </br>
    <form method="POST" action="">
    <label for="nom">Entrer le nom : </label>           
    <input type="text" placeholder="nom" id="nom" name="nom"/>
    </br>
    <label for="prenom">Entrer le prénom : </label>
    <input type="text" placeholder="prénom" id="prenom" name="prenom" />
    </br>
    <label for="telephone">Entrer le numéro de téléphone : </label>           
    <input type="text" placeholder="téléphone" id="telephone" name="telephone"/>
    </br>
    <label for="mail">Entrer l'adresse mail : </label>
    <input type="text" placeholder="mail" id="mail" name="mail" />
    </br>
    <button type="submit" name="donnee_contact" value="envoyer"class='btn btn-dark'> Rajouter mon contacte ! </button>
</form>
</center>
</body>
</html>