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
    <script src='lib/tinymce/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '#tinytextarea',
            language: 'fr_FR',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code textcolor colorpicker '
            ],
            toolbar: 'undo redo | insert | styleselect | bold italic | forecolor  | alignleft aligncenter alignright alignjustify' +
            ' | bullist numlist outdent indent | link image'
        });
    </script>
    <title><?= $settings->siteName; ?></title>
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
                                    <img src="
                                              <?php 
                                              if(isset($userProfile) && $userProfile->pictureUrl != ''){
                                                  echo($userProfile->pictureUrl);
                                              }else {
                                                  echo('http://icons.iconarchive.com/icons/hopstarter/halloween-avatars/256/Mask-3-icon.png');
                                              } ?>" alt="">
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
    
    <div class="col-lg-12 center">
        <strong>Powered by Bloogy</strong>
    </div>
    
                                            <!-- /.container -->
    
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src='lib/message.js'></script>
    <script src='lib/buttonplus.js.js'></script>
</body>
</html>

