<?php

session_start();

$_SESSION["panier"] = "list" ;

//---------------------------------------------
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
            <form method ="get" action = "personne.php">
            <div class="form-group">
            <label for="id">id:</label>
            <input type="text" name="id" id="id" class="form-control" disabled >
            </div>
            <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control">
            </div>
            <div class="form-group">
            <label for="prenom">Prenom:</label>
            <input type="text" name="prenom" id="prenom" class="form-control">
            </div>
            <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" name="age" id="age" class="form-control">
            </div>
            <div class="form-group text-end">
            <button type="submit" class="btn btn-dark mt-3">save me</button>
            </div>
            </form>
            </div>
        </div>
    </div>
  </body>
</html>