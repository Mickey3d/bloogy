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
                             if ($_SESSION['role'] == 'admin') { ?>
                         <li>
                             <a id="lien-accueil" href="?p=admin.posts.index"><span class="glyphicon glyphicon-cog"></span> Administration</a>
                        </li>
                         
                         <?php } ?>
                    <!-- User logged -->
                         <li class="dropdown">
                            <a id="lien-accueil" class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
                                <span class="glyphicon glyphicon-user"></span>
                                Options <b class="caret"></b>
                            </a>
                             <ul class="dropdown-menu">
                                 <li><a href="?p=users.show">
                                     <span class="glyphicon glyphicon-user"></span> Mon compte
                                     </a>
                                 </li>
                                 <li><a href="?p=users.logout">
                                <span class="glyphicon glyphicon-log-in"></span> Deconnexion
                                     </a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        </ul>
                
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->
