<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="./acceuil.php"><img src="../quizzeo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
        <?php
          if(isset($_SESSION['username'])){
            echo "bonjour ".$_SESSION['username'];
          }
          else{
            echo " vous n'etes pas connecté";
          }
        ?>
           </a>
        </li>
        <?php
          if(isset($_SESSION['username'])){
            ?>
              <li class="nav-item">
                <button><a class="nav-link" href="../connexion.php?route=logout">Logout</a></button>
              </li>
         <     <li class="nav-item">
                <a class="nav-link" href="./produits.php">Produits</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./favoris.php">Favoris</a>
              </li>
            <?php
          }
          else{
            ?>
              <li class="nav-item">
                <button><a class="nav-link" href="./login.php">Login</a></button>
              </li>
            <?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>
