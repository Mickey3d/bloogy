<<<<<<< HEAD


<div class="page-content inset">
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
                            <div class="form-group"><label>Titre du Billet</label>
                                <input type="text" name="title" value="titre Avec Image" class="form-control" required></div> 
                        </div>
                        
                        <div class="form-group">
                    
                            <div class="pull-left">
                                <a href="img/postsPictures/posts/<?= $nomImage ?>" class="thumbnail postThumbnail">
                                    <img class="thumbnail postThumbnail" src="img/postsPictures/posts/<?= $nomImage ?>" alt="">
                                </a>
                            </div>
                        
                        <?= $pictureUrl ?>
                                              
                    <fieldset>
                        <legend>Ajout d'une Image</legend>
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
=======
 <?php
      if( !empty($message) ) 
      {
        echo '<p>',"\n";
        echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
          
        echo "\t\t<strong> Le Nom de l'image: ", htmlspecialchars($nomImage) ,"</strong>\n";
        echo "\t</p>\n\n";
      }
    ?>
    <!-- Debut du formulaire -->
   <form role="form" enctype="multipart/form-data"  method="POST">
    <fieldset>
        <legend>Formulaire</legend>
          <p>
            <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
            <input name="fichier" type="file" id="fichier_a_uploader" />
            <input type="submit" name="submit" value="Uploader" />
          </p>
      </fieldset>
    </form>
    <!-- Fin du formulaire -->
>>>>>>> 4ea8d628177b522434d14eb2dcc10a4957752ff2
