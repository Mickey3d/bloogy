<?php

// On demande les billets (modèle)
include_once('../../Model/blog/get_all_billets.php');
$billets = get_all_billets();

// On effectue du traitement sur les données (contrôleur)
// Ici, on sécurise l'affichage
foreach($billets as $cle => $billet)
{
    $billets[$cle]['billet_title'] = htmlspecialchars($billet['billet_title']);
    $billets[$cle]['billet_content'] = nl2br(htmlspecialchars($billet['billet_content']));
    $billets[$cle]['billet_author'] = nl2br(htmlspecialchars($billet['billet_author']));
    $billets[$cle]['id'] = nl2br(htmlspecialchars($billet['id']));
    $billets[$cle]['billet_date_creation_fr'] = nl2br(htmlspecialchars($billet['billet_date_creation_fr']));
}

// On affiche la page (vue)
include_once('../../Views/admin/blog/billet/billet_index_Views.php');