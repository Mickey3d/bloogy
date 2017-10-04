<?php
function get_billets($offset, $limit)
{
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
        
    $req = $bdd->prepare('SELECT id, billet_title, billet_content, billet_author, DATE_FORMAT(billet_date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS billet_date_creation_fr FROM billets ORDER BY billet_date_creation DESC LIMIT :offset, :limit');
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();
    $billets = $req->fetchAll();
    
    
    return $billets;
}
