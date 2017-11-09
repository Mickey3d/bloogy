<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bloogy.css" rel="stylesheet" />
    <title><?= App::getInstance()->title; ?></title>
</head>
    
<body>
    
    <?php
    require 'frontNav.php';
    ?>
    
    <!-- /.container -->    
    

    
    <!-- MAIN CONTENT --------------------------------------------------------------------------------------------->
    <div class="col-md-12 container">
        <section id='blog-show'>
            <div class="container">
                
                <div >
                    <div class="row profile">
                        <div class="col-lg-3">
                            <div class="profile-sidebar">
                                <!-- SIDEBAR USERPIC -->
                                <div class="profile-userpic">
                                    <img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
                                </div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name">
                                        <?= $userProfile->username; ?>
                                    </div>
                                    <div class="profile-usertitle-role">
                                        <?= $userProfile->role; ?>
                                    </div>
                                </div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
                                <div class="profile-userbuttons">
                                    <a href="?p=posts.index" class="btn btn-info btn-lg">Blog</a>
                                    <a href="?p=users.index" class="btn btn-success btn-lg">Tipi</a>
                                </div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->


                                <?php 
                                if (empty($_GET['userId'])) {

                                    require 'profile_usermenu.php';
                                } else {
                                    
                                   require 'profile_publicmenu.php'; 
                                }

                                
                                ?>
  
				<!-- END MENU -->
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="profile-content">
                               
                                
                                <?= $content; ?>
                                
                            
                            </div>
                        </div>
                    </div>
                </div>
               
            <br>

                
                
            </div>
        </section>		
    </div>
    
    <div class="col-lg-12">
        <strong>Powered by Bloogy</strong>
    </div>
    
                                            <!-- /.container -->
    
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
</body>
</html>

