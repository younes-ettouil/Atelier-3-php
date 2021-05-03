<?php
// id
if(isset($_GET["id"]))
        $id = $_GET["id"] ;
try
{
$bdd = new PDO('mysql:host=127.0.0.1;dbname=atelierphp;charset=utf8', 'root', ''); 
echo '<h1 style = "color : #0A0;" class="text-center">Success !!</h1>' ;
// update into bdd table etudiant

// cursor
$aff = "SELECT * FROM etudiant WHERE id = ".$id."";
$tab =$bdd->query($aff);
$donnees = $tab->fetch();
if(isset($_GET["nom"])&&isset($_GET["prenom"])&&isset($_GET["age"])){
  $nom = $_GET["nom"] ;
  $prenom= $_GET["prenom"] ;
  $age = $_GET["age"] ;  
 
$req = $bdd->prepare("UPDATE etudiant SET nom = :nom,prenom = :prenom, age = :age WHERE id =:id");

$req->execute(array( 'nom' => $nom,'prenom' =>$prenom,
'age' => $age,'id'=>$id

));
header('Location: personne.php');
}
}
catch (Exception $e) {
die('Erreur : ' . $e->getMessage()); 
}

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Formulaire</title>
  </head>
  <body class="bg-light">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
            <h3>cree un personne</h3>
            </div>
            <div class="card-body">
            <form method ="get">
            <div class="form-group">
            <label for="id">id:</label>
            <input type="text" name="id" id="id" class="form-control" value =<?php echo $donnees['id']?>>
            </div>
            <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" value =<?php echo($donnees['nom'])?>>
            </div>
            <div class="form-group">
            <label for="prenom">Prenom:</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value =<?php echo($donnees['prenom'])?>>
            </div>
            <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" name="age" id="age" class="form-control" value =<?php echo($donnees['age'])?>>
            </div>
            <div class="form-group text-end">
            <button type="submit" class="btn btn-dark mt-3">Modifier</button>
            </div>
            </form>
            </div>
        </div>
    </div>
  </body>
</html>