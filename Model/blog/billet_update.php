<?php
// Update du billet à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE billets SET billet_title = :billet_title, billet_content = :billet_content, billet_author = :billet_author WHERE id = :billet_id');

$req->bindParam('billet_title', $_POST['billet-title'], PDO::PARAM_STR);
$req->bindParam('billet_content', $_POST['billet-content'], PDO::PARAM_STR);
$req->bindParam('billet_author', $_POST['billet-author'], PDO::PARAM_STR);
$req->bindParam('billet_id', $_POST['billet-id'], PDO::PARAM_INT);

$req->execute();

$id = $_POST['billet-id'];

// Redirection du visiteur vers le billet mis à jour
header('Location: ../billet.php?billet=' .$id);


