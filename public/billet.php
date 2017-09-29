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

// Récupération du billet
$req = $bdd->prepare('SELECT id, billet_title, billet_content, DATE_FORMAT(billet_date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS billet_date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($donnees['billet_title']); ?></title>
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bloogy.css" rel="stylesheet" />
    <title>Bloogy - Home</title>
</head>
    
<body>
    
<?php
    require 'frontNav.php';
?>
    <!-- MAIN CONTENT --------------------------------------------------------------------------------------------->
    <div class="container">
        <div class="container">
            <div class="row"> 
                <div class="col-md-12 ">
                    <div class="page-header">
                        <h1><?php echo htmlspecialchars($donnees['billet_title']); ?></em></h1>      
                    </div>
                <img src="">
            
                <article>           
                    <p class="text-left">     
                        <?php echo nl2br(htmlspecialchars($donnees['billet_content']));?>    
                    </p>
                </article>

                </div>
	       </div>
        </div>
    
        <div class="container">
            <div class="jumbotron">
                <div class="container">
                    <h2 class='blog-title'> <?php echo htmlspecialchars($donnees['billet_title']); ?></em></h2>
                    <div>
                        <p><small>le <?php echo $donnees['billet_date_creation_fr']; ?></small></p>
                    </div>
                        <p><a href="index.php">Retour à la liste des billets</a></p>
                </div>
            </div>

        </div> 
    
    <?php    
    $req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

    require 'comment.php';
    
    ?>
    
	</div>

<!-- /.container -->  
      
           
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
</body>
</html>