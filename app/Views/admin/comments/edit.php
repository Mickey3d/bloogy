<div class="page-content inset">
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
                            <!-- <?//= $form->input('content', 'Contenu', ['type' => 'tinytextarea'], true); ?>  -->
                            <?= $form->input('content', 'Commentaire', ['type' => 'tinytextarea'], true); ?>
                        </div>
                        <button class="btn btn-success">Enregistrer</button>
                                          
                        <?php
                        // get link for redirection
                        $link = $this->getLocation();
                        ?>
                        <a class="btn btn-danger" href="<?=$link;?>">Annuler</a>
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