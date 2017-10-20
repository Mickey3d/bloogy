<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bloogy.css" rel="stylesheet" />
    <title><?= App::getInstance()->title; ?></title>
</head>
    
<body>
    
<!-- Navigation menu -->
<nav id="header" class="navbar navbar-fixed-top">
            <div id="header-container" class="container navbar-container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a id="brand" class="navbar-brand" href="index.php">Bloogy</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="?p=posts.index">Blog</a></li>
                    </ul>
                     <ul class="nav navbar-nav navbar-right">

			
                         <?php
                         // No user logged
                         if (!isset($_SESSION['auth'])){ ?>
                         <li>
                             <a id="lien-accueil" href="?p=users.login"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
                        </li>
                        <?php } else {
                
                             //  User is logged.
                             if ($_SESSION['auth']) { ?><?php } ?>
                    <!-- User logged -->
                         
                         <li class="dropdown">
                            <a id="lien-accueil" class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
                                <span class="glyphicon glyphicon-user"></span>
                                Options <b class="caret"></b>
                            </a>
                             
                             <ul class="dropdown-menu">
                                 <li>
                                     <a href="?p=users.edit">
                                     <span class="glyphicon glyphicon-user"></span> Mon compte
                                     </a>
                                 </li>
                                 <li>
                                     <a href="?p=users.logout">
                                     <span class="glyphicon glyphicon-log-in"></span> Deconnexion
                                     </a>
                                 </li>
                            </ul>
                         </li>
                    <?php } ?>
                    </ul>
                
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->

    

    <div id="wrapper" class="active">  
                                                <!-- Sidebar -->

        <div id="sidebar-wrapper">
            <ul id="sidebar_menu" class="sidebar-nav">
                <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
            </ul>
            <ul class="sidebar-nav" id="sidebar">
                <li><a href="?p=admin.posts.index">Billets<span class="sub_icon glyphicon glyphicon-edit"></span></a></li>
                <li><a href="index.php?p=admin.comments.index">Commentaires<span class="sub_icon glyphicon glyphicon-comment"></span></a></li>
                <li><a href="?p=admin.categories.index">Catégories<span class="sub_icon glyphicon glyphicon-pushpin"></span></a></li>
                <li><a href="?p=admin.users.index">Utilisateurs<span class="sub_icon glyphicon glyphicon-user"></span></a></li>
                <li><a>Configuration<span class="sub_icon glyphicon glyphicon-cog"></span></a></li>
            </ul>
      </div>
          
      <!-- Page content -->
        <div id="page-content-wrapper">
    <!-- Keep all page content within the page-content inset div! -->
                                     
            <?= $content; ?>
                        
        </div>
      </div>

                
                
                
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/sidebar.js"></script>
</body>
</html>
