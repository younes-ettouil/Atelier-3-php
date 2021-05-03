<?php
$id = $_GET["id"] ;

 $bdd = new PDO('mysql:host=127.0.0.1;dbname=atelierphp;charset=utf8', 'root', '');
 $req = $bdd->prepare(" DELETE FROM etudiant WHERE id = :id");
 $req->execute(array( 'id'=>$id
));
header('Location: personne.php');
?>