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

//récupération de la variable d'URL,
//qui va nous permettre de savoir quel enregistrement supprimer:
$id  = $_GET["billet-id"] ;
 
//requête SQL:
$req = $bdd->prepare('DELETE FROM billets WHERE id = '.$id);

$req->execute();


// Redirection vers le billet nouvellement créé
header('Location: admin_billet_list.php');
?>