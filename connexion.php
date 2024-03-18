<?php
session_start();
// Fonction pour vérifier si un utilisateur est banni
function isUserBanned($username, $ban_file) {
    $ban_list = file($ban_file, FILE_IGNORE_NEW_LINES);
    return in_array($username, $ban_list);
}

$_SESSION['id'] = FALSE;
$route = $_GET['route'];
switch($route){
    case "login":
        $file=fopen("utilisateur.csv", "r");
        $con = fopen("connexion.csv", "a");
        $ban_file = './ban.csv';
        $ban = array_map('str_getcsv', file($ban_file));

        
            $username = $_POST['ID'];
            $password = $_POST['password'];
                if(isUserBanned($username, $ban_file)){
                    echo "votre compte c'est fait BAN. Veuillez écrirt au administrateur.";
                    fclose($file);
                    fclose($con);
                    header('Location: ./index.php');
                    break;
                }
            
            while (($row = fgetcsv($file, 6000,",")) !== FALSE){
                if ($username === $row[3] && $password === $row[4]) {
                    $type = $row[0];
                    // Authentification réussie
                    echo "Authentification réussie. Bienvenue, $username!" ;
                    $_SESSION['id'] = "True";
                    $_SESSION['username'] = $username;
                    $_SESSION['type'] = $type;
                    fputcsv($con, array($username));
                    header("Location: ./C_$type/acceuil.php");
                    
                } 
            }
            if($_SESSION['id'] === FALSE){
                // Authentification échouée
                
                echo "Nom d'utilisateur ou mot de passe incorrect.";
                header("Location: ./index.php");
            }
        
        fclose($file);
        break;

    case "logout":
                // Récupérer l'identifiant de l'utilisateur
        $user_id = $_SESSION['username'];
        
        // Chemin vers le fichier CSV
        $file_path = "connexion.csv";
        
        // Lire le contenu du fichier CSV dans un tableau
        $users_online = array_map('str_getcsv', file($file_path));
        
        // Parcourir le tableau pour trouver et supprimer l'identifiant de l'utilisateur
        foreach ($users_online as $key => $user) {
            if ($user[0] == $user_id) {
                unset($users_online[$key]);
            }
        }
        
        // Réécrire le contenu mis à jour dans le fichier CSV
        $file = fopen($file_path, 'w');
        foreach ($users_online as $user) {
            fputcsv($file, $user);
        }
        fclose($file);
        session_destroy();
        header('location: ./index.php');
    break;

    default:
    break;
}