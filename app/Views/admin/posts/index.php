<div class="page-content inset">
    <div class="row">
        <div class="well lead">
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
                        
        <div class="col-md-1"></div>
                        
                        
        <!-- Billets List Container -->          
                    
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class=" panel panel-default widget">
                        <div class="panel-heading">
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
                                ?>
                                        
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-xs-2 col-md-1">
                                            <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" />
                                        </div>
                                                
                                        <div class="col-xs-10 col-md-10">
                                            <div>
                                                <a href="?p=posts.show&id=<?= $post->id; ?>"><?= $post->title; ?></a>
                                                <div class="mic-info">le <?= $post->date; ?></div>
                                            </div>
                                                    
                                            <div class="comment-text"><?php echo $post->getExtrait() ?></div>
                                                    
                                                    
                                            <div class="action">
                                                <a href="?p=admin.posts.edit&id=<?= $post->id; ?>">
                                                    <button type="button" class="btn btn-primary btn-xs" title="Editer">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </button>
                                                </a>
            
                                                <form action="?p=admin.posts.delete" method="POST" style="display: inline;">
                                                            
                                                    <input type="hidden" name="id" value="<?= $post->id; ?>">
                    
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