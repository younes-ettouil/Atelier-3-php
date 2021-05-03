<?php

session_start();
$nom  = "";
$id = 0;
$prenom = "";
$age = 0;
// id


try
{
$bdd = new PDO('mysql:host=127.0.0.1;dbname=atelierphp;charset=utf8', 'root', ''); 
echo '<h1 style = "color : #0A0;" class="text-center">Success !!</h1>' ;
if(isset($_GET["nom"])&&isset($_GET["prenom"])&&isset($_GET["age"])){
  $nom = $_GET["nom"] ;
  $prenom= $_GET["prenom"] ;
  $age = $_GET["age"] ;  
// insert into bdd table etudiant
$req = $bdd->prepare('INSERT INTO etudiant(nom, prenom ,age ) VALUES(:nom, :prenom, :age )');

$req->execute(array( 'nom' => $nom,'prenom' =>$prenom,
'age' => $age

));
}
// cursor
$tab =    $bdd->query("select * from etudiant");
}
catch (Exception $e) {
die('Erreur : ' . $e->getMessage()); 
}
?>


<html>
<head>

 <title>atelier | 3</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


 </head>


 <body class = "container">


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Age</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
  <?php
 while ($donnees = $tab->fetch()){ // parcourir ligne par line
?>
<tr>  
<th scope ="row"><?php echo $donnees['id'] ; ?> </th>
<td> <?php echo $donnees['nom'] ; ?> </td>
<td> <?php echo $donnees['prenom'] ; ?> </td>
<td> <?php echo $donnees['age'] ; ?>  </td>
<td><a href="modifier.php?id=<?php echo $donnees['id']?>"><button type = "submit" class = "btn btn-primary" >Modifier</button></a></td>
<td><a href="supp.php?id=<?php echo $donnees['id']?>"><button type = "submit" class = "btn btn-warning">Supprimer</button></a></td>
</tr>
<?php
}
?>
  </tbody>
</table>
<br><br>


</body>
</html>
