<?php
if (isset($_POST['type'])&& isset($_POST['nom'])&& isset($_POST['prenom']) && isset($_POST['ID']) && isset($_POST['password'])){
    $file_name="utilisateur.csv";
    $fav = array();

    $file=fopen($file_name, "a");

    if (isset($file)== FALSE){
        fputcsv($file, ['type','nom', 'prenom', 'ID', 'password']);
    }

    fputcsv($file, [$_POST['type'], $_POST['nom'], $_POST["prenom"], $_POST["ID"], $_POST['password']]);
    fclose($file);
    echo "un nouvelle utilisateur à été ajouté";
    header("location: index.php");
}