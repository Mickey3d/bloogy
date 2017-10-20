<div class="page-content inset">
    <div class="row">
        <div class="well lead">
            <div class="well lead col-md-12">
                <p> <?= $locationTitle ?> </p>
                <p>
                    <a href="?p=admin.categories.add">
                        <button type="button" class="btn btn-success" title="add-category">
                            <span class="glyphicon glyphicon-plus"></span>  Ajouter une Catégorie
                        </button>
                    </a>
                </p>
            </div>
        </div>
                       
        <div class="col-md-1"></div>
                        
        <div class="col-md-10">
            <!-- Billets List Container -->          
            <table class="table table-striped">
                <thead class="head-table table-bordered color-blue">
                    <tr>
                        <td>ID</td>
                        <td>Titre</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?= $category->id; ?></td>
                        <td><?= $category->titre; ?></td>
                                    
                        <td>
                            <div class="action">
                                <a href="?p=admin.categories.edit&id=<?= $category->id; ?>">
                                    <button type="button" class="btn btn-primary btn-xs" title="Editer">
                                        <span class="glyphicon glyphicon-pencil"></span>                        
                                    </button>
                                </a>                
                                <form action="?p=admin.categories.delete" method="POST" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $category->id; ?>">                             
                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </form>  
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>