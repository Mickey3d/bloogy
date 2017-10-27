<div class="page-content inset">
    <div class="row">
        <div class="well lead">
            <div class="well lead col-md-12">
                <p> <?= $locationTitle ?> </p>
            </div>
        </div>
                       
        <div class="col-md-1"></div>
                        
        <div class="col-md-10">
            
            <table class="table table-striped">
                <thead class="table-bordered head-table color-blue">
                    <tr>
                        <td>ID</td>
                        <td>Commentaire</td>
                        <td>Auteur</td>
                        <td>Billet</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
            
                    <?php foreach($comments as $comment): ?>
            
                    <?php $postId = $comment->getPostId(); ?>
            
            
                    <tr>
                
                        <td><strong><?= $comment->commentId; ?></strong></td>
                        <td><?= $comment->getContent(); ?></td>
                        <td><?= ' ' . $comment->getUserId(); ?></td>
                        <td><a href="?p=posts.show&id=<?= $postId; ?>">
                            <button type="button" class="btn btn-success btn-xs" title="Voir le billet">
                                <span class="glyphicon glyphicon-eye-open"></span>                        
                            </button>
                            </a>
                        </td>
                        <td>
                            <a href="?p=admin.comments.edit&commentId=<?= $comment->commentId; ?>">
                                <button type="button" class="btn btn-primary btn-xs" title="Editer">
                                    <span class="glyphicon glyphicon-pencil"></span>                        
                                </button>
                            </a>
                            <form action="?p=admin.comments.delete" onsubmit="return deleteConfirm();" method="post" style="display:    inline;">
                                <input type="hidden" name="commentId" value="<?= $comment->commentId; ?>">
                                <button type="submit" class="btn btn-danger btn-xs" title="Delete">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table
        </div>            
    </div>
</div>      