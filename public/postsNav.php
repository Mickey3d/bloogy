<section id='postsNav'>
    
    <div class="container">

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

// On récupère les 5 derniers billets
$req = $bdd->query('SELECT id, billet_title, billet_content, DATE_FORMAT(billet_date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS billet_date_creation_fr FROM billets ORDER BY billet_date_creation DESC LIMIT 0, 3');

while ($donnees = $req->fetch())
{
?>
        <div class="col-md-9 blogShort" class='billets'>
            <h1>
                <?php echo htmlspecialchars($donnees['billet_title']); ?>
                <em><small>le <?php echo $donnees['billet_date_creation_fr']; ?></small></em>
            </h1>
            <article>
            <p>
                <?php echo nl2br(htmlspecialchars($donnees['billet_content'])); ?>
            </p>
            </article>
  
            <a class="btn btn-blog pull-right marginBottom10" href="billet.php?billet=<?php echo $donnees['id']; ?>">Lire plus...</a> 

        </div>
        
<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
                 
        <div class="col-md-12 gap10">
        </div>
    
    </div>
  
</section>