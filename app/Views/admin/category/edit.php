<div class="page-content inset center">
    <div class="row">
        <div class="col-md-12">
            <p class="well lead"> <?= $locationTitle ?> </p>
        </div>
        <section id="main-content">
            <div class="col-md-1"></div>
            <div class="col-md-10 container">
                <div class="form-area">
                    <form role="form" method="POST">
                        <div class="form-group">
                            <?= $form->input('titre', 'Titre de la Categorie'); ?>
                        </div>
                        <button class="btn btn-success">Valider</button>
                                          
                        <a class="btn btn-danger" href="?p=admin.categories.index">Annuler</a>
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