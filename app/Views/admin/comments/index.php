<div class="page-content inset center">
    <div class="row">
        <div class="well lead">
            <div class="well lead col-md-12">
                <p> <?= $locationTitle ?> </p>
            </div>
        </div>
        
        
        <div class="container">
            <div class="row"  style="margin-top:20px;">
                <div class=" well well-sm  bg-white borderZero"  uib-dropdown >
                    <div class="btn-group date-block btn-group-justified font-small dropdown" data-toggle="buttons">
                        <label href="#allcomments" data-toggle="tab" class="btn btn-default  next font-small semiBold" title="Next Day" style="font-size:12px; border-radius:0;">
                            Tous les Commentaires
                        </label>
                        <label  href="#reportedcomments" data-toggle="tab" class="btn btn-default previous text-right font-small semiBold" title="Previous Day" style="font-size:12px;">
                            Commentaires signalés
                        </label>
                    </div>
          
                </div>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="allcomments">
                        <div>
                            <div>
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
                                            <td>
                                                <a href="?p=users.show&userId=<?= $comment->userID; ?>" title="Voir le Profil">
                                                <?= $comment->username; ?>   
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?p=posts.show&postId=<?= $postId; ?>">
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
                                </table>
                            </div>          
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reportedcomments">
                        
                            <div>
                                <table class="table table-striped">
                                    <thead class="table-bordered head-table color-blue">
                                        <tr>
                                            <td>ID</td>
                                            <td>Commentaire</td>
                                            <td>Auteur</td>
                                            <td>Signalement(s)</td>
                                            <td>Billet</td>
                                            <td>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php foreach($reportedComments as $reportedComment): ?>
                                        
                                        <?php $postId = $reportedComment->getPostId(); 
                                        
                                        
                                        
                                        if ($reportedComment->reported > 0) { ?>
                                        
            
                                        <tr>
                
                                            <td><strong><?= $reportedComment->commentId; ?></strong></td>
                                            <td><?= $reportedComment->getContent(); ?></td>
                                            <td>
                                                <a href="?p=users.show&userId=<?= $reportedComment->userID; ?>" title="Voir le Profil">
                                                <?= $reportedComment->username; ?>   
                                                </a>
                                            </td>
                                            <td>
                                                <span class="badge background-blue" data-toggle="tooltip" data-placement="right"
                                                      title="Total des signalements pour ce commentaire"> <?= $reportedComment->reported; ?> 
                                                </span>
                                            </td>
                                            <td>
                                                <a href="?p=posts.show&postId=<?= $postId; ?>">
                                                <button type="button" class="btn btn-success btn-xs" title="Voir le billet">
                                                    <span class="glyphicon glyphicon-eye-open"></span>                        
                                                </button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?p=admin.comments.edit&commentId=<?= $reportedComment->commentId; ?>">
                                                    <button type="button" class="btn btn-primary btn-xs" title="Editer">
                                                        <span class="glyphicon glyphicon-pencil"></span>                        
                                                    </button>
                                                </a>
                                                <form action="?p=admin.comments.delete" onsubmit="return deleteConfirm();" method="post" style="display:    inline;">
                                                    <input type="hidden" name="commentId" value="<?= $reportedComment->commentId; ?>">
                                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                        <?php } ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
   
                    
    </div>
</div>      