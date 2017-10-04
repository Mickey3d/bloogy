<?php

// On demande les 5 derniers billets (modèle)
include_once('../Model/blog/get_billets.php');
$billets = get_billets(0, 5);

// On effectue du traitement sur les données (contrôleur)
// Ici, on sécurise l'affichage
foreach($billets as $cle => $billet)
{
    $billets[$cle]['billet_title'] = htmlspecialchars($billet['billet_title']);
    $billets[$cle]['billet_content'] = nl2br(htmlspecialchars($billet['billet_content']));
    $billets[$cle]['billet_author'] = nl2br(htmlspecialchars($billet['billet_author']));
}

// On affiche la page (vue)
include_once('../Views/blog/blog_index_Views.php');