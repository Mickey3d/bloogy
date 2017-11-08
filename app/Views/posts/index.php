<div class="container" >
    <header class="row">    
        <div class="col-md-12">    
            <img src="img/bloogy.png" alt="bloogy">    
        </div>
    </header>
</div>

<div class="container">
    <div class="page-header">
            <div class="row">
                <div class="blog-title col-xs-12">Bloogy V 0.4</div>
            </div>
            <div class="row">
                <div class="blog-description  col-xs-12 col-md-5 col-lg-4">Bloogy l'utilitaire blog vraiment pratique</div>
            </div>
    </div>
</div>


<div class="container">
        <section id='blog-show'>
            <div class="container">
                        
                <div class="col-sm-8"> 
                    <?php
                    foreach($posts as $post)
                        {
                    ?>
                    
                        <div class="row">
                            <div class="span12">
                                <div class="row">
                                    <div class="span8">
                                        <h4><strong><a href="?p=posts.show&postId=<?= $post->postId; ?>"><?= $post->title ?></a></strong></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="span2 pull-left">
                                        <a href="?p=posts.show&postId=<?= $post->postId; ?>" class="thumbnail postThumbnail">
                                               
                                            <?php
        
                            if ($post->pictureUrl == '' ) {
        
                                            ?>
        
                                            <img src="http://placehold.it/260x180" alt="">
    
                                            <?php
        
                            } else {
        
                                            ?>
                                            
                                            <img src="<?= $post->pictureUrl; ?>" alt="">
            
                                            <?php
                            }
            
                                            ?>
                                        </a>
                                    </div>
                                    <div class="span10">      
                                    
                                            <?= $post->extrait; ?>
                                        
                                        <p><a class="btn btn-success marginBottom10" href="?p=posts.show&postId=<?= $post->postId; ?>">Lire plus...</a> </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="span8">
                                        <p></p>
                                        <p>
                                            
                                            | <i class="icon-calendar"></i> <em><small>le <?= $post->date; ?> </small></em>
                                        <!--
                                            | <i class="icon-user"></i> by <a href="#">Jean</a> 
                                            | <i class="icon-comment"></i> <a href="#">3 Comments</a>
                                            | <i class="icon-tags"></i> Tags : <a href="#"><span class="label label-info">Snipp</span></a> 
                                            <a href="#"><span class="label label-info">Bootstrap</span></a> 
                                            <a href="#"><span class="label label-info">UI</span></a> 
                                            <a href="#"><span class="label label-info">growth</span></a>
                             -->   
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                    <?php
                    }
                    ?> 
            </div>
            
            <div class="col-sm-4">
                <ul> 
                  <?php foreach($categories as $categorie): ?>

                  <li><a href="index.php?p=posts.category&id=<?= $categorie->id; ?> "><?= $categorie->titre; ?></a></li>
		      
                  <?php endforeach; ?>
		        </ul>
            </div>

                <div class="col-md-12 gap10"></div>
            </div>
        </section>		
    </div>

