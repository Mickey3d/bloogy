<?php     
//Passwords are different
if ($passEqualityTest) { ?>
<div class="alert alert-danger">
    Les mots de passe que vous avez saisis sont différents.
</div>
<?php } ?>
        



<div class="page-content inset center">
    <div class="row">
        <div class="col-md-12">
            <p class="well lead"> <?= $locationTitle ?> </p>
        </div>
        <section id="main-content">
            <div class="col-md-1"></div>
            <div class="col-md-10 container">
                <div class="form-area">

                    <form method="post">
                <?php
                        // if the user is not connected we need to identify it. (case password forgotten)
                        if (empty($_SESSION['auth'])) {
                            echo $form->input('email', 'Entrez l\'email associé à votre compte *',['type' => 'email'], true);
                        }
                        ?>
                        
                        <?= $form->input('password', 'Nouveau mot de passe *', ['type' => 'password'], true); ?>
                        <?= $form->input('password2', 'Confirmez le Mot de passe *', ['type' => 'password'], true); ?>
                        
                        <button class="btn btn-success" title="Confirm"> Confirmer <span class="glyphicon glyphicon-check"></span></button>   
                    </form>
                

                    <a href="?p=admin.users.edit&userId=<?= $_GET['userId'] ?>" class="btn btn-default" >Annuler</a>
                
                </div>
            </div>
            <!-- /.container -->
        </section>  
        <!-- /.section -->                
    </div>
</div>
