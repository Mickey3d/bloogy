<div class="container" >
    <header class="row center">    
        <div class="col-md-12">    
            <img src="img/bloogy.png" alt="bloogy">    
        </div>
    </header>
</div>

<div class="container">
    <div class="page-header">
            <div class="row">
                <div class="blog-title col-xs-12 center"><?= $settings->logoSubtitle; ?></div>
            </div>
            <div class="row">
                <div class="blog-description  col-xs-12 col-md-5 col-lg-4"><?= $categorie->titre; ?></div>
                
                <div class="row pull-right">

                    <form action="?p=posts.category&id=<?= $categorie->id; ?>" method="post" style="display: inline;">
                        <span>Choisir l'ordre des Billets </span>
            
                        <?php
                        // Manage the value of the select SortBy and sort icon
                        $AscSelected = '';
                        $DescSelected = '';
            
                        if (isset($_POST['orderBy'])) {
                            if ($_POST['orderBy'] == 'ASC') {
                                $AscSelected = 'selected';
                            } else {
                                $DescSelected = 'selected';
                            }
                        } 
                        ?>
                        <select name="orderBy">
                            <option value="DESC" <?= $DescSelected ;?>>Les plus récents en premier</option>
                            <option value="ASC" <?= $AscSelected ;?>>Les plus anciens en premier</option>
                        </select>
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-sort"> Trier</span>
                        </button>
            
                    </form>
                </div>
        </div>   
    </div>
</div>

<div class="container">
        <section id='blog-show'>
            <div class="container">
                        
                <div class="col-sm-8"> 
                    <?php
                    foreach($articles as $post)
                        {
                    ?>
                    
                        <div class="row">
                            <div class="span12">
                                <div class="row center">
                                    <div class="span8">
                                        <h4><strong><a href="<?= $post->Url ?>"><?= $post->title ?></a></a></strong></h4>
                                    <p><em><?= $post->categorie; ?></em></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="span2 pull-left thumbPad">
                                        <a href="?p=posts.show&postId=<?= $post->postId; ?>" class="thumbnail postThumbnail">
                                               
                                            <?php
                        
                        // use of IntlDateFormatter class to get a "French date"
                        $mask = "EEEE d MMMM YYYY '&agrave;' HH:mm ";

                        $postDate = new DateTime($post->date);
                        
        
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
                                        
                                        <p><a class="btn btn-success marginBottom10 pull-right" href="?p=posts.show&postId=<?= $post->postId; ?>">Lire plus...</a> </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="span8">
                                        <p></p>
                                        <p>
                                            
                                            | <i class="icon-calendar"></i> <em><small><?= "Posté le " . IntlDateFormatter::formatObject($postDate,$mask) . " . " ;?></small></em>
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