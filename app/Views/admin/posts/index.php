<?php
if(isset($categorie)){
    
    $categoryId = $categorie->id;
}
?>

<div class="page-content col-lg-12 inset ">
    <div class="row">
        <div class="well lead center">
            <div class="well lead col-md-12">
                <p> <?= $locationTitle ?> </p>
                <p>
                    <a href="?p=admin.posts.add">
                        <button type="button" class="btn btn-success" title="add-billet">
                            <span class="glyphicon glyphicon-plus"></span>  Ajouter un Billet
                        </button>
                    </a>
                </p>
            </div>
        </div>
                        
        <div class="col-lg-1"></div>
                        
        <div class="container">
            
            <div class="row col-lg-5 col-sm-12 center">

                <form action="?p=admin.posts.category" method="post" style="display: inline;">
                    <span>Choisir la Catégorie  </span>   
                    
                 
                    <select name="category">
                  <?php foreach($categories as $categorie): ?>
                    
                            <option value="<?= $categorie->id; ?>"><?= $categorie->titre; ?></option>
                        
                            
                  <?php 
                        
                        endforeach; ?>
                    </select>
                        
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-pushpin"> Valider </span>
                    </button>
            
                </form>
            </div>
            
            <br>
            
            <div class="row col-lg-5 col-sm-12 center">

                    <form action="?p=admin.posts.<?= $calledFunction ?>" method="post" style="display: inline;">
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
                        
                        <?php
                        if(isset($categorie)){ ?>
                        
                        <input id="categoryId" name="categoryId" type="hidden" value="<?= $categoryId ?>">
                        
                        <?php   
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
        <br>
            
        <div class="container">
                        
        <!-- Posts List Container -->          
                    
        <div class="row">
            
            
                <div class="col-md-12">
                    <div class=" panel panel-default widget">
                        <div class="panel-heading center">
                            <span class="glyphicon glyphicon-edit"></span>
                            <h3 class="panel-title">Liste des Billets</h3>
                            <span class="label label-info">
                                <?php
                                echo count($posts); 
                                ?>
                            </span>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
        <!-- Billets List -->
                                        
                                <?php
                                foreach($posts as $post)
                                {
                                    // use of IntlDateFormatter class to get a "French date"
                                    $mask = "EEEE d MMMM YYYY '&agrave;' HH:mm ";

                                    $postDate = new DateTime($post->date);
                                ?>
                                        
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-xs-2 col-md-1">
                                             
                                            <a href="?p=posts.show&postId=<?= $post->postId; ?>" class="thumbnail ">
                                               
                                                <?php
        
                                    if ($post->pictureUrl == '' ) {
        
                                            ?>
        
                                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" />
    
                                                <?php
        
                                    } else {
        
                                                ?>
                                               
                                                <img id="thumbnail-index-img" src="<?= $post->pictureUrl; ?>" alt="" class="img-circle img-responsive">
                                           
                                                <?php
                                    }
            
                                                ?>
                                            </a>
                                            
                                            
                                           
                                        </div>
                                                
                                        <div class="col-xs-10 col-md-10">
                                            <div class="center">
                                                <a href="?p=posts.show&postId=<?= $post->postId; ?>">  <?= $post->title; ?> </a>
                                                <div class="mic-info"><?= "Posté le " . IntlDateFormatter::formatObject($postDate,$mask) . " . " ;?></div>
                                            </div>
                                                    
                                            <div class="comment-text"><?php echo $post->getExtrait() ?></div>
                                                    
                                                    
                                            <div class="action center">
                                                <a href="?p=admin.posts.edit&postId=<?= $post->postId; ?>">
                                                    <button type="button" class="btn btn-primary btn-xs" title="Editer">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </button>
                                                </a>
            
                                                <form action="?p=admin.posts.delete" method="POST" style="display: inline;">
                                                            
                                                    <input type="hidden" name="postId" value="<?= $post->postId; ?>">
                    
                                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </button>
                
                                                </form>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </li>
                    
                                <?php } ?> 
                       
           <!-- Billets List end -->                                      
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>                       
    </div>
</div>

<div class="container center">
    <ul class="pagination">
        <?php

        // Boucle For pour écrire les liens vers chacune des pages

        for ($i = 1 ; $i <= $nbrOfPages ; $i++)
        {
            if(isset($page)){
                if($page == $i){
                    ?>
                    <li class="active"><a href="?p=admin.posts.index&page=<?= $i ?>&orderBy=<?= $orderSelected ?>"><?= $i ?><span class="sr-only">(current)</span></a></li>
                
        <?php
                }else{
                    ?>
        <li><a href="?p=admin.posts.<?= $calledFunction ?>&page=<?= $i ?>&orderBy=<?= $orderSelected ?>"><?= $i ?></a></li>
        
        <?php
                }
            }
        ?>
              
        <?php
        }   ;
        ?>
    </ul>
</div>

