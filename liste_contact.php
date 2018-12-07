<?php
session_start();
require_once 'Config.php';
require_once 'contact.php';
$id_book = $_GET['id'];
$Contactes = array();
 try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=formulaire_contacte",
        'root',
        '');
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //$pdo->exec("INSERT INTO books(nom) VALUES ('pro');");
      ///var_dump("Le dernier book est : " . $pdo->lastInsertId());
     $stmt = $pdo->query("SELECT * FROM donnee_contact WHERE id_book=$id_book;");
 //    var_dump($stmt->fetchObject());
 
     while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
         $Contacte = new contact(
             $row['id_contact'],
             $row['nom'],
             $row['prenom'],
             $row['telephone'],
             $row['mail']
         );
         $Contactes[] = $Contacte;
    }
     //var_dump($books);
 //    var_dump($stmt);
} catch (PDOException $e) {
    var_dump($e->getMessage());
//    var_dump("Bad credentials");
} finally {
    $pdo = null;
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formulaire contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<br><br><br>
	<center>
   
	<br>Voici vos Contactes ! 
	</center>
<br><br>
	<table class="table">
    <thead>
        <th>numero contacte</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>telephone</th>
        <th>mail</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($Contactes as $Contacte): ?>
    <tr>
        <td><?= $Contacte->getId() ?></td>
        <td><?= $Contacte->getNom() ?></td>
        <td><?= $Contacte->getPrenom() ?></td>
        <td><?= $Contacte->getTelephone() ?></td>
        <td><?= $Contacte->getMail() ?></td>
    </tr>
    <?php endforeach; ?>
	</tbody>
</table>
<a href="deconnexion.php">Déconnexion</a>
</body>
</html> 