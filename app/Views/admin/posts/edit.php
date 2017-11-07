<div class="page-content inset">
    <div class="row">
        <div class="col-md-12">
            <p class="well lead"> <?= $locationTitle ?> </p>
        </div>
        <section id="main-content">
            <div class="col-md-1"></div>
            <div class="col-md-10 container">
                <div class="form-area">
                    <form role="form" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <?= $form->input('title', 'Titre du Billet'); ?>
                        </div>
                        <div class="form-group">
                            <span class="glyphicon glyphicon-camera"></span>
                            <span class="btn btn-link btn-file"> Ajouter une Image <input type="file" id="postPicture"></span>
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