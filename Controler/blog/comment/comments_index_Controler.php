<?php

// On demande les commentaires (modèle)
include_once('../Model/blog/get_comments.php');
$comments = get_comments();

// On effectue du traitement sur les données (contrôleur)
// Ici, on sécurise l'affichage
foreach($comments as $cle => $comment)
{
    $comments[$cle]['comment_author'] = htmlspecialchars($comment['comment_author']);
    $comments[$cle]['comment_content'] = htmlspecialchars($comment['comment_content']);
    $comments[$cle]['comment_date_fr'] = htmlspecialchars($comment['comment_date_fr']);
    $comments[$cle]['id'] = htmlspecialchars($comment['id']);
}

// On affiche la page (vue)
include_once('../Views/blog/comment/comments_index_Views.php');