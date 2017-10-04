<?php
function get_one_billet()
{
    global $bdd;
        
    // Récupération du billet
    $req = $bdd->prepare('SELECT id, billet_title, billet_content, billet_author, DATE_FORMAT(billet_date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS billet_date_creation_fr FROM billets WHERE id = ?');
    $req->execute(array($_GET['billet']));
    $billet = $req->fetchAll();
    
    
    return $billet;
}

