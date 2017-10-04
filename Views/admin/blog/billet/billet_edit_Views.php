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
    require '../../Views/templates/backNav.php';
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
                <div class="row">
                    <div class="col-md-12">
                        <p class="well lead"> Éditer un Billets</p>
                    </div>
                      <section id="main-content">
                          <div class="container">
		                      <div class="form-area">
                                  <form role="form" action="billet_update.php" method="post">
                                      <div class="form-group">  
                                          <label for="billet-title">Titre</label> : <input type="text" class="form-control" name="billet-title" id="billet-title" value="<?php echo $billet_item['billet_title']; ?>" /><br />
                                        </div>
                                      <div class="form-group">
                                          <label for="billet-content">Contenu</label>
                                      <textarea class="form-control" type="textarea" name="billet-content" rows="7"><?php echo $billet_item['billet_content']; ?></textarea><br />
                                      </div>
                                      <div class="form-group">
                                          <label for="billet-author">Auteur</label> :  <input type="text" class="form-control" name="billet-author" id="billet-author" value="<?php echo $billet_item['billet_author']; ?>"/><br />
                                      </div>
                                      <div class="form-group">  
                                          <label for="billet-id">ID</label> : <input type="text" class="form-control" name="billet-id" id="billet-id" value="<?php echo $billet_item['id']; ?>" readonly/><br />
                                        </div>
                                      <input type="submit" class='btn btn-primary' value="Valider" />
                                  </form>
                              </div>
                          </div>
                                            <!-- /.container -->
                    </section>  
                                            <!-- /.section -->                
                </div>
            </div>
        </div>
      </div>

                
                
                
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/sidebar.js"></script>
</body>
</html>         

    
                
