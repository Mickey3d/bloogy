<div class="page-content inset">
    <div class="row">
        <div class="well lead">
            <div class="well lead col-md-12">
                <p><?= $locationTitle ?></p>
                <p>
                    <a href="?p=admin.users.add">
                        <button type="button" class="btn btn-success" title="add-category">
                            <span class="glyphicon glyphicon-plus"></span>  Ajouter un Utilisateur
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
                        <td>Nom</td>
                        <td>Email</td>
                        <td>Rôle</td>
                        <td>Profil</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user->id; ?></td>
                        <td><?= $user->username; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><?= $user->role; ?></td>
                        <td>
                            <a href="?p=users.show&id=<?= $user->id; ?>">
                                <button type="button" class="btn btn-success btn-xs" title="Voir le Profil">
                                    <span class="glyphicon glyphicon-eye-open"></span>                        
                                </button>
                            </a>
                        </td>
                                    
                        <td>
                            <div class="action">
                                <a href="?p=admin.users.edit&id=<?= $user->id; ?>">
                                    <button type="button" class="btn btn-primary btn-xs" title="Editer">
                                        <span class="glyphicon glyphicon-pencil"></span>                        
                                    </button>
                                </a>                
                                <form action="?p=admin.users.delete" method="POST" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $user->id; ?>">                             
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