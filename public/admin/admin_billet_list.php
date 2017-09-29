<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/bloogy.css" rel="stylesheet" />
    <title>Bloogy - Home</title>
</head>
    
<body>
    
<?php
    require 'backNav.php';
?>
    <div id="wrapper" class="active">  
                                                <!-- Sidebar -->

        <div id="sidebar-wrapper">
            <ul id="sidebar_menu" class="sidebar-nav">
                <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
            </ul>
            <ul class="sidebar-nav" id="sidebar">
                <li><a href="admin_billet_list.php">Billets<span class="sub_icon glyphicon glyphicon-edit"></span></a></li>
                <li><a>Commentaires<span class="sub_icon glyphicon glyphicon-comment"></span></a></li>
                <li><a>Utilisateurs<span class="sub_icon glyphicon glyphicon-user"></span></a></li>
                <li><a>Configuration<span class="sub_icon glyphicon glyphicon-cog"></span></a></li>
            </ul>
      </div>
          
      <!-- Page content -->
        <div id="page-content-wrapper">
    <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row well lead">
                    <div class="col-md-2">
                        <a href="billet_add.php"><button type="button" class="btn btn-success" title="add-billet">
                        <span class="glyphicon glyphicon-plus"></span>  Ajouter un Billet
                        </button></a>
                    </div>
                    <div class="col-md-10">
                        <p>Billets</p>
                    </div>
                    
                </div>
                
        <!-- Billets List Container -->          
                <div class="container">
                    <div class="row">
                        <div class="panel panel-default widget">
                            <div class="panel-heading">
                                <span class="glyphicon glyphicon-comment"></span>
                                <h3 class="panel-title">Liste des Billets</h3>
                                <span class="label label-info">78</span>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group">
        <!-- Billets List -->
                                    
                                    
                                    
                                    
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
                
                $req = $bdd->query('SELECT id, billet_title, billet_content, billet_author, DATE_FORMAT(billet_date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS billet_date_creation_fr FROM billets ORDER BY billet_date_creation DESC');

                while ($donnees = $req->fetch())
                {
                ?>
                <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-xs-2 col-md-1">
                                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                                            <div class="col-xs-10 col-md-11">
                                                <div>
                                                    <a href="billet.php?billet=<?php echo $donnees['id']; ?>"><?php echo htmlspecialchars($donnees['billet_title']); ?></a>
                                                    
                                                    <div class="mic-info">Auteur: <a href="#"><?php echo htmlspecialchars($donnees['billet_author']); ?></a> le <?php echo $donnees['billet_date_creation_fr']; ?></div>
                                                </div>
                                
                                                <div class="comment-text">Extrait :</div>
                                                
                                                <div class="action">
                                                    <a href="billet_edit.php?billet=<?php echo $donnees['id']; ?>"><button type="button" class="btn btn-primary btn-xs" title="Editer">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </button>
                                                    </a>
                                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                                        <span class="glyphicon glyphicon-ok"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                <?php
                } 
// Fin de la boucle des billets

                $req->closeCursor();
                ?> 
                                           
           <!-- Billets List end -->                                      
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Billets List Container end -->  
            </div>
        <!-- page-content inset end -->  
        </div>
    <!--  page-content-wrapper end --> 
    
    </div>
  <!--  Wrapper end --> 
                
                
                
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/sidebar.js"></script>
</body>
</html>