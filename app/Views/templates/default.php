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
    
    <style>
    
        #parallax-world-of-ugg .parallax-one {background-image: url(img/postsPictures/posts/image-fond-article.jpg);}
    
    
    </style>
    
</head>
    
<body>
    
    <?php
    require 'frontNav.php';
    ?>
    
    <!-- /.container -->    
    

    
    <!-- MAIN CONTENT --------------------------------------------------------------------------------------------->
    <div >
        <section id="blog-show">
                
                <?= $content; ?>
            
        </section>		
    </div>
    
                                            <!-- /.container -->
    
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
</body>
</html>