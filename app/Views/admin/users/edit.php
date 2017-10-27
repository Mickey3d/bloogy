<div class="page-content inset">
    <div class="row">
        <div class="col-md-12">
            <p class="well lead"> <?= $locationTitle; ?></p>
        </div>
        <section id="main-content">
            <div class="col-md-1"></div>
            <div class="col-md-10 container">
                <div class="form-area">
                                      
                    <form method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <div >
                                        <div >
                                                                
                                            <hr>
                                                                
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <div>
                                                        <div id="img-preview-block" class="img-circle avatar avatar-    original    center-block" style="background-size:cover; 
                                                        background-image:url(http://robohash.org/sitsequiquia.png?  size=120x120)"> </div>
                                                        <br> 
                                                        <span class="btn btn-link btn-file">Changer d'Avatar <input type="file"     id="upload-img"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <?= $form->select('role', 'Rôle', ['user' => 'Utilisateur', 'admin' =>  'administrateur' ]) ; ?>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="chkIsLocked" class="checkbox">
                                                            <input type="checkbox" name="isLocked" id="chkIsLocked" >
                                                            Verrouiller l'utilisateur
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                                        
                                                    <div class="form-group">
                                                        <?= $form->input('username', 'Nom ou Pseudo *', null, true); ?>
                                                    </div>
                                                                        
                                                    <?= $passwordField; ?>
                                                                        
                                                    <div class="form-group">
                                                        <?= $form->input('email', 'email *',['type' => 'email'], true); ?>
                                                    </div>
                                                                        
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-md-12">
                                                    <hr>
                                                                        
                                                    <a href="?p=admin.users.index"> <button class="btn btn-primary  pull-left" ><i  class="glyphicon glyphicon-chevron-left"></i> Annuler</button> </a>
                                                                       
                                                    <?= $deleteButton; ?>
                                                                        
                                                    <button class="btn btn-success pull-right"><i class="glyphicon glyphicon-floppy-    disk"></i> Enregistrer </button>
                                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                
                    </form>  
                                            
                                      
                                      
                    <!-- /.modal 1-->
                                            
                    <div id="delete-user-modal" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p>Ëtres-vous certain de vouloir supprimer cette utilisateur et son profil </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                        
                                                        <form action="?p=admin.users.delete" method="POST" style="display: inline;">
                                                            
                                                            <input type="hidden" name="userId" value="<?= $userEditedId; ?>">                             
                                                            <button type="submit" class="btn btn-danger" title="Delete">
                                                                Supprimer <span class="glyphicon glyphicon-trash"></span>
                                                            </button>
                                                        </form> 
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                         
                </div>
            </div>
            <!-- /.container -->
        </section>  
        <!-- /.section -->                
    </div>
</div>





<?php
/*
// is the user locked ?
if ($form->getValue('isLocked') == 1){
$chkIsLocked = ' checked';
} else {
$chkIsLocked = '';
        }
       */ 
?>