<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="log.css">
    <link rel="shortcut icon" href="./" >
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="inscription.css">
</head>

<body>
    <div class="container">
        <h2>Inscription</h2>
        <form action="traitement_sub.php" method="post">
            <select name="type" id="type">
                <option value="user">utilisateur</option>
                <option value="entreprise">entreprise</option>
                <option value="ecole">école</option>
                <option value="admin">Administrateur</option>
            </select>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required><br>
            <label for="ID">Identifiant :</label>
            <input type="text" id="ID" name="ID" required><br>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="ajouter">
        </form>
        
    </div>
</body>

</html>


