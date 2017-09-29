<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bloogy.css" rel="stylesheet" />
    <title>Bloogy - Home</title>
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
     
<?php
    require 'postsNav.php';
?>  
    <!-- MAIN CONTENT --------------------------------------------------------------------------------------------->
     <section id="main-content">
         <div class="container">
<?php
    require 'postsNav.php';
?>  
         </div>
                                        <!-- /.container -->
    </section>
                                        <!-- /.section -->
            
            
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
</body>
</html>