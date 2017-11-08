<p>
		<?php
		// To report a comment user have to be connected
		if (isset($_SESSION['auth'])) {
			
			// Total number reports for this comment
			$total = $this->report->totalReported($comment->getCommentId());
			
			/// Is the user already report this comment ?
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
		
			<!-- total report -->
			<span class="badge badge-white" data-toggle="tooltip" data-placement="right"
                  title="Nombre de signalement pour ce commentaire">
            <?= $total ?></span>

            <!-- Comment Edit Link for admin  -->
            <?php
                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
                <div>
                    <a href="?p=admin.comments.edit&comId=<?= $comment->getComId() . '&from=billets.show&billetId='
                    .$billet->getId(); ?>">
                        <span class="glyphicon glyphicon-edit"></span> Editer
                    </a>
                </div>
            <?php } // end user admin ?>

        <?php } // end user connected ?>

</p>