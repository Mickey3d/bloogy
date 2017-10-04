<?php
function get_all_billets()
{
    global $bdd;
        
    $req = $bdd->prepare('SELECT id, billet_title, billet_content, billet_author, DATE_FORMAT(billet_date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS billet_date_creation_fr FROM billets ORDER BY billet_date_creation DESC');
    $req->execute();
    $billets = $req->fetchAll();
    
    
    return $billets;
}
