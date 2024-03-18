<?php
// Récupérer l'action du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        // Vérifier si l'utilisateur est banni ou non
        $ban_file = '../ban.csv';
        $ban = array_map('str_getcsv', file($ban_file));
        $is_banned = FALSE;
        foreach ($ban as $banish) {
            if ($banish[0] == $key) {
                $is_banned = TRUE;
                break;
            }
        }

        // Si l'utilisateur est banni, le débannir
        if ($is_banned) {
            // Supprimer l'utilisateur du fichier de bannissement
            $ban_file_contents = file_get_contents($ban_file);
            $ban_file_contents = str_replace($key, "", $ban_file_contents);
            file_put_contents($ban_file, $ban_file_contents);
            echo "L'utilisateur $key a été débanni.";
        } else {
            // Sinon, le bannir
            // Ajouter l'utilisateur au fichier de bannissement
            file_put_contents($ban_file, $key . PHP_EOL, FILE_APPEND | LOCK_EX);
            echo "L'utilisateur $key a été banni.";
        }
    }
header('Location: acceuil.php');
}
?>
