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
$req = $bdd->prepare('INSERT INTO billets (billet_title, billet_content, billet_author) VALUES(:billet_title, :billet_content, :billet_author)');

$req->bindParam('billet_title', $_POST['billet-title'], PDO::PARAM_STR);
$req->bindParam('billet_content', $_POST['billet-content'], PDO::PARAM_STR);
$req->bindParam('billet_author', $_POST['billet-author'], PDO::PARAM_STR);

$req->execute();

// Récupération de l'id du billet
$id = $bdd->lastInsertId();

// Redirection vers le billet nouvellement créé
header('Location: billet.php?billet=' .$id);
?>