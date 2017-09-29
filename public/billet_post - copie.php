<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bloogy;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du billet à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO billets (billet_title, billet_content, billet_author) VALUES(?, ?, ?)');
$req->execute(array(
    $_POST['billet-title'],
    $_POST['billet-content'],
    $_POST['billet-author']
    ));

// Redirection du visiteur vers la page d'admin
header('Location: admin.php');
?>