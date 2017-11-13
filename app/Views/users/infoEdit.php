<div class="page-content inset center">
    <div class="row">
        <div class="well lead">
            <div class="well lead col-md-12">
                <p> <?= $locationTitle ?> </p>
            </div>
        </div>
   
        <div class="col-md-12">
            <section id="main-content">
                
                <div class="col-md-12 container">
                    <div class="form-area">
                        
                        <form method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div >
                                            <div >

                                                <hr>

                                                <div class="row">
                                            
                                                    <div class="col-lg-12">

                                                        <div class="form-group">
                                                            <?= $form->input('info', 'Informations sur le Profil', ['type' => 'tinytextarea'], true); ?>
                                                        </div>

                                                    </div>
                                                     
                                                </div>
                                                <div class="row ">
                                                    <div class="col-lg-12">
                                                        <hr>

                                                        <a href="?p=users.show" class="btn btn-primary  pull-left" ><i  class="glyphicon glyphicon-chevron-left"></i> Annuler </a>

                                                        <button class="btn btn-success pull-right"><i class="glyphicon glyphicon-floppy-    disk"></i> Enregistrer </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>  



                        

                    </div>
                </div>
                <!-- /.container -->
            </section>  
            <!-- /.section -->                
        </div>
    </div>
</div>



