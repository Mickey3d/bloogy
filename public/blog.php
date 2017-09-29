<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bloogy.css" rel="stylesheet" />
    <title>Bloogy - Blog</title>
</head>
    
<body>
    
<?php
    require 'frontNav.php';
?>
    <div class="container" >
        <header class="row">
            <div class="col-md-12">
                <img src="img/bloogy.png" alt="bloogy">    
            </div>
        </header>
    </div><!-- /.container -->    
    
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="blog-title col-xs-12">Bloogy V 0.1</div>
            </div>
            <div class="row">
                <div class="blog-description  col-xs-12 col-md-5 col-lg-4">Le nouveau roman de Jean Forteroche.</div>
            </div>
        </div>
    </div>
    
    
    <!-- MAIN CONTENT --------------------------------------------------------------------------------------------->
    <div class="container">
        <section id='blog-show'>
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

// On récupère les billets
                
                $req = $bdd->query('SELECT id, billet_title, billet_content, DATE_FORMAT(billet_date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS billet_date_creation_fr FROM billets ORDER BY billet_date_creation DESC');

                while ($donnees = $req->fetch())
                {
                ?>
                <div class="col-md-12 blogShort" class='billets'>
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
                } 
// Fin de la boucle des billets

                $req->closeCursor();
                ?>  

                <div class="col-md-12 gap10"></div>
            </div>
        </section>		
    </div>
    
                                            <!-- /.container -->
    
    

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
</body>
</html>