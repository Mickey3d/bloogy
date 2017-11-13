

<div class="page-content inset center">
    <div class="row">
        <div class="col-md-12">
            <p class="well lead"> <?= $locationTitle ?> </p>
        </div>
        <section id="main-content">
            <div class="col-md-1"></div>
            <div class="col-md-10 container">
                
                
                
                
                <?php
                if( !empty($message) ) 
                {
                    echo '<p>',"\n";
                    echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
          
                    echo "\t\t<strong> Le Nom de l'image est : ", htmlspecialchars($nomImage) ,"</strong>\n";
                    echo "\t</p>\n\n";
                }
                ?>
                
                <div class="form-area">
                    <form role="form" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-group">
                                <?= $form->input('title', 'Titre du Billet'); ?>
                            </div>
                        
                        <div class="form-group">
                    
                            <div class="pull-left">
                                <a href="<?= $post->pictureUrl ?>" class="thumbnail postThumbnail">
                                    <img class="thumbnail postThumbnail" src="<?= $post->pictureUrl ?>" alt="">
                                    
                                    
                                </a>
                            </div>
                        
                       
                                              
                    <fieldset>
                        <legend>Gestion de l'Image d'Illustration</legend>
                        <p>
                            <span class="btn btn-link btn-file"> 
                                <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !"></label></span>
                            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
                            <input name="fichier" type="file" id="fichier_a_uploader" />
                                    
                            <span class="btn btn-link btn-file"><span class="glyphicon glyphicon-camera"></span> Cliquez ici pour selectionner une image <input name="fichier" type="file" id="fichier_a_uploader"></span>
                    <!--        <input type="submit" name="submit" value="Uploader" />  -->
                        </p>
                        </fieldset>
                </div>
                        <div class="form-group">
                            <?= $form->input('pictureUrl', 'Lien de l\'image'); ?>
                        </div>
                        
 
                        <div class="form-group">
                            <?= $form->input('content', 'Contenu du Billet', ['type' => 'tinytextarea'], true); ?>
                        </div>
                        
                        <div class="form-group">  
                            <?= $form->select('category_id', 'Catégorie', $categories); ?>
                            <br />
                        </div>
                        
                        <button class="btn btn-success">Valider</button>
                        
                        <a class="btn btn-danger" href="?p=admin.posts.index">Annuler</a>
                                          
                        <br />
                        <br />
                        <div class="col-md-12 well lead"></div>
                    </form>
                </div>
            </div>
            <!-- /.container -->
        </section>  
        <!-- /.section -->                
    </div>
</div>