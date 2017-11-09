<div class="page-content inset">
    <div class="row">
        <div class="well lead">
            <div class="well lead col-md-12">
                <p> <?= $locationTitle ?> </p>
            </div>
        </div>
                       
        <div class="col-md-1"></div>
                        
        <div class="col-md-10">
            
            
            <section class="comments">
                
                <?php foreach($comments as $comment): ?>
            
                <?php $postId = $comment->getPostId(); ?>
                
                <article class="comment">
                    <a class="comment-img" href="#non">
                        <img src="https://pbs.twimg.com/profile_images/444197466133385216/UA08zh-B.jpeg" alt="" width="50" height="50">
                    </a>
                    <div class="comment-body">
                        <div class="text">
                            <?= $comment->getContent(); ?>
                        </div>
                        
                        <div>
                            <a href="?p=posts.show&postId=<?= $postId; ?>">
                            <button type="button" class="btn btn-success btn-xs" title="Voir le billet">
                                <span class="glyphicon glyphicon-eye-open"></span>                        
                            </button>
                            </a>
                        
                            <?php
    
                            $userProfileId = $userProfile->id;
                            
                            if (($userProfileId === $_SESSION['auth']) || ($_SESSION['role'] == 'admin')) { ?>
                            
                            <a href="?p=comments.edit&commentId=<?= $comment->commentId; ?>">
                                <button type="button" class="btn btn-primary btn-xs" title="Editer">
                                    <span class="glyphicon glyphicon-pencil"></span>                        
                                </button>
                            </a>
                            
                            <form action="?p=comments.delete" onsubmit="return deleteConfirm();" method="post" style="display:    inline;">
                                <input type="hidden" name="commentId" value="<?= $comment->commentId; ?>">
                                <button type="submit" class="btn btn-danger btn-xs" title="Delete">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>
                            
                            <?php }
                            ?>
                            
                        </div>
                        
                        <p class="attribution">par <a href="#non"> <?= $comment->username; ?> </a> <?= $comment->commentDate; ?></p>
                    </div>
                </article>
                <?php endforeach; ?>
                
            </section>
            
            
                   
                
        
        </div>
    </div> 
</div> 