<?php
session_start();
require_once 'Config.php';
require_once 'Book.php';
$id_membres = $_SESSION['id'];
//$id_membres2 = $_COOKIE['id_membres'];
$Nom_Book=$_POST['Nom_Book'];
$books = array();
var_dump ($_SESSION);
 try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=formulaire_contacte",
        'root',
        '');
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $pdo->exec("INSERT INTO books(nom,id_membres) VALUES ('$Nom_Book','$id_membres');");
     //var_dump("Le dernier book est : " . $pdo->lastInsertId());
     //$stmt = $pdo->query("SELECT * FROM books;");
    //var_dump($stmt->fetchObject());
 
     //while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
     //    $book = new Book(
      //       $row['id_book'],
      //       $row['nom']
       //  );
        // $books[] = $book;
    //}
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
 <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>formulaire contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <br><br><br><br><br><br><br><br>
    <center>
    Ton book <?php echo $_POST['Nom_Book']; ?> a été crée (ou pas ahah). 
    </center>
</body>
</html> 