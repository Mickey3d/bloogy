<?php

// use of IntlDateFormatter class to get a "French date"
    $mask = "EEEE d MMMM YYYY '&agrave;' HH:mm ";

    $postDate = new DateTime($post->date);

?>


<div id="parallax-world-of-ugg">

<section>
    <div class="parallax-one">
      <h2><?= $post->title ?></h2>
    </div>
</section>

<section>
  <div class="block">
    <article class="margin-top-10"> 
                        
        <?= $post->content; ?>    
                    
    </article>
    <p class="line-break margin-top-10 center"></p>
  </div>
</section>
  
</div>


<!-- MAIN CONTENT --------------------------------------------------------------------------------------------->


<div class="col-xl-12 center"><span class="glyphicon glyphicon-option-horizontal"></span></div>
    
        <div class=" container center">
            <div class="jumbotron">
                <div class="container">
                    <div class="col-lg-6">
                        <h2 class='blog-title'> <?= $post->title; ?></em></h2>
                            <p><a href="index.php">Retour à la liste des billets</a></p>
                    </div>
                    <div class="col-lg-6">
                        <p><small><?= "Posté le " . IntlDateFormatter::formatObject($postDate,$mask) . " . " ;?></small></p>
                        <p><em><?= $post->categorie; ?></em></p>
                    </div>  
                </div>
            </div>
        </div>



<?php
// Ajoût du commentaire si $POST existe
if (!empty($_POST)){

	$commentTable = app::getInstance()->getTable('comment');

	$sql = [	'content' => htmlspecialchars($_POST['comment']),
				'postId'  => $_POST['postID'],
                'userId'  => $_SESSION['auth']
			];	
	
	$res = $commentTable->create($sql);
	
	$comments = $commentTable->getComments($_GET['postId']);
}
?>

        <!--Total comments-->

<div class="col-md-2"></div>     
         
<div class="col-md-8 alert alert-success center">
		<?php
		$totalComments = count($comments);
		$commentWritted = 'Commentaire.';
		if ($totalComments > 1){
			$commentWritted = 'Commentaires.';
		}
	?>
			<strong><?= $totalComments . ' ' .  $commentWritted ?></strong>	
</div>


<!-- /.container -->

<section id="comment-ui-container">
    
<div class="container">
  
    <?php
    // post a comment is available only for authenticated users
	if (isset($_SESSION['auth'])){?>
    
    <div class="row">

      
        <div class="col-sm-10 col-sm-offset-1" id="logout">
            <div class="page-header">
                <h3 class="reviews">Laissez votre commentaire</h3>
                <div class="logout">
                    <a href="?p=users.logout">
                        <button class="btn btn-default btn-circle text-uppercase" type="button">
                            <span class="glyphicon glyphicon-off"></span> Deconnexion                    
                        </button> 
                    </a>
                </div>
            </div>
            <div class="comment-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Commentaires</h4></a></li>
                    <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Ajouter un commentaire</h4></a></li>
                </ul>            
                <div class="tab-content">
                    <div class="tab-pane active" id="comments-logout">                
                        <ul class="media-list">
                            
                            <?php
        
        if(isset($comments)) {
            foreach($comments as $comment){
            
                $commentDate = new DateTime($comment->commentDate);
            
                if(isset($comment)) {
                            ?>
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object img-circle" src="
                                                                              <?php 
                                                        if(isset($comment->pictureUrl) && $comment->pictureUrl != ''){
                                                            echo($comment->pictureUrl);
                                                        }else {
                                                            echo('http://icons.iconarchive.com/icons/hopstarter/halloween-avatars/256/Mask-3-icon.png');
                                                        } ?>" alt="profile">
                                </a>
                                <div class="media-body">
                                    <div class="well well-lg">
                                        <h4 class="media-heading text-uppercase reviews">
                                            <?= $comment->getUsername(); ?>
                                        </h4>
                                        
                                        <p class="media-date text-uppercase reviews list-inline">
                                            <small><?= "Posté le " . IntlDateFormatter::formatObject($commentDate,$mask) . " . " ;?></small>
                                        </p>
                                        <p class="media-comment">
                                        <?= $comment->getContent(); ?>
                                        </p>
                                        <p>
                                            <?php                            
            
            // If the user already report this comment ?
            $reportId = $this->report->isReported($comment->commentId, $_SESSION['auth']);
			
            if ($reportId) {
                $param = "&reportId=" . $reportId . "&postId=" . $post->getPostId(); ?>
                                            <span class="glyphicon glyphicon-eye-close"></span>
                                            <a href="?p=reports.cancel<?php echo $param ; ?>"> Annuler le signalement</a>	
                                            <?php
            } else {
                $param = "&postId=" . $post->getPostId(). "&commentId=". $comment->getCommentId() . "&comAuthorId=" . $comment->getUserId();				
                                            ?>
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                            <a href="?p=reports.add<?php echo $param ; ?>"> Signaler le commentaire</a>
				
                                            <?php
            } ?> 	
                                        </p>
                                        	
                                        
                                    </div>
                                </div>     
                            </li>

                            <?php
        }
        }
                }
                            ?>
                        
                        </ul>
                    </div>
                    <div class="tab-pane" id="add-comment">
                        <form method="POST" class="form-horizontal"> 
                            <div class="form-group">
                                    
                                <div class="col-sm-2 control-label"></div>
                        
                                <input type="hidden" name="postID" value="<?= $post->postId; ?>">
                            
                                <div class="col-sm-10 form-group">
                                    <label for="comment">Commentaire :</label>
                                    <textarea class="form-control" rows="5" name="comment" id="comment" placeholder="Veuillez saisir votre commentaire ..." required></textarea>
                                </div>   
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">                    
                                    <button class="btn btn-success btn-circle text-uppercase" type="submit"><span class="glyphicon glyphicon-send"></span> Envoyer mon commentaire</button>
                                </div>
                            </div>            
                        </form>
                    </div>
                </div>
            </div>
        </div>
  
    </div>
  
    
    <?php } elseif (!isset($_SESSION['auth'])) {
        // if the user is not authenticated
    ?>
    
    <div class="row">
        
      
        <div class="col-sm-10 col-sm-offset-1" id="logout">
            <div class="page-header">
                <h3 class="reviews">Laissez votre Commentaire</h3>
                <div class="logout">
                    <a href="?p=users.login">
                        <button class="btn btn-default btn-circle text-uppercase" type="button" >
                            <span class="glyphicon glyphicon-off"></span> Login                    
                        </button>
                    </a>
                </div>
            </div>
            <div class="comment-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#comments-login" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Commentaires</h4></a></li>
                    <li><a href="#add-comment-disabled" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Ajouter un commentaire</h4></a></li>
                </ul>            
                <div class="tab-content">
                    <div class="tab-pane active" id="comments-login">                
                        <ul class="media-list">
                            
                            <?php
        
        if(isset($comments)) {
        foreach($comments as $comment){
            
            $commentDate = new DateTime($comment->commentDate);
            
         if(isset($comment)) {
                            ?>
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object img-circle" src="
                                                                              <?php 
                                                        if(isset($comment->pictureUrl) && $comment->pictureUrl != ''){
                                                            echo($comment->pictureUrl);
                                                        }else {
                                                            echo('http://icons.iconarchive.com/icons/hopstarter/halloween-avatars/256/Mask-3-icon.png');
                                                        } ?>" alt="profile">
                                </a>
                                <div class="media-body">
                                    <div class="well well-lg">
                                        <h4 class="media-heading text-uppercase reviews">
                                            <?= $comment->getUsername(); ?>
                                        </h4>
                                        
                                        <p class="media-date text-uppercase reviews list-inline">
                                            <small><?= "Posté le " . IntlDateFormatter::formatObject($commentDate,$mask) . " . " ;?></small>
                                        </p>
                                        <p class="media-comment">
                                        <?= $comment->getContent(); ?>
                                        </p>
                                        
                                        		
                                        
                                        
                                        
                                    </div>
                                </div>     
                            </li>

                            <?php
        }
        }
                }
                            ?>
                        
                        </ul>
                    </div>
                    <div class="tab-pane" id="add-comment-disabled">
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">×</span><span class="sr-only">Fermer</span>                        
                            </button>
                            <strong>Hey!</strong> Si vous avez déjà un compte <a href="?p=users.login&Id=" <?php $post->getpostId();  ?>  class="alert-link">Connectez vous</a> d'abord pour laisser un commentaire.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
    
</section>

 <?php } ?>

<div class="page-header text-center">
    <h3 class="reviews"><span class="glyphicon glyphicon-magnet"></span> Bloogy </h3>
</div>



