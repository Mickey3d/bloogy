<?php
function get_comments()
{
    global $bdd;
        
    // Récupération des commentaires
    $req = $bdd->prepare('SELECT id, comment_author, comment_content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id_billet = ? ORDER BY comment_date');
    $req->execute(array($_GET['billet']));
    
    $comments= $req->fetchAll();
    
    
    return $comments;
}
