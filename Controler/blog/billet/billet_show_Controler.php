<?php

// On demande le billet (modèle)
include_once('../Model/blog/get_one_billet.php');
$billet = get_one_billet();

// On effectue du traitement sur les données (contrôleur)
// Ici, on sécurise l'affichage
foreach($billet as $cle => $billet_item)
{
    $billet[$cle]['billet_title'] = htmlspecialchars($billet_item['billet_title']);
    $billet[$cle]['billet_content'] = htmlspecialchars($billet_item['billet_content']);
    $billet[$cle]['billet_author'] = htmlspecialchars($billet_item['billet_author']);
    $billet[$cle]['id'] = htmlspecialchars($billet_item['id']);
    $billet[$cle]['billet_date_creation_fr'] = htmlspecialchars($billet_item['billet_date_creation_fr']);
}

// On affiche la page (vue)
include_once('../Views/blog/billet/billet_show_Views.php');