<?php
session_start();
$id_membres = $_SESSION['id'];
require_once 'Config.php';
require_once 'Book.php';
//setcookie('id_membres', "$id_membre", time() + 365*24*3600);
var_dump ($_SESSION);
$books = array();
 try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=formulaire_contacte",
        'root',
        '');
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     ///$pdo->exec("INSERT INTO books(nom) VALUES ('?');");
      ///var_dump("Le dernier book est : " . $pdo->lastInsertId());
     $stmt = $pdo->query("SELECT * FROM books;");
 //    var_dump($stmt->fetchObject());
 
     while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
         $book = new Book(
             $row['id_book'],
             $row['nom']
         );
         $books[] = $book;
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
    <form action="cree_book.php" method="post">
    <input type="text" name="Nom_Book" placeholder="Nom Book" />
	<a href="cree_book.php" ><button type="submit" name="cree_book" value="cree_book" class='btn btn-dark'>Crée ton nouveau book ! </button></a>
	<br><br><p>
        Bonjour [à remplacer] <br>
     Voici tes books ! Clique sur leur noms pour voir leurs contenues ou le modifier !  </p>
	</center>
<br><br>
	<table class="table">
    <thead>
        <th>Numéro du Book</th>
        <th>Nom du Book</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books as $book): ?>
    <tr>
        <td><?= $book->getId() ?></td>
        <td><a herf="" ><button type="submit" name="book" value="book" class='btn btn-dark'><?= $book->getname() ?></button></a></td>
    </tr>
    <?php endforeach; ?>
	</tbody>
</table>
</body>
</html> 