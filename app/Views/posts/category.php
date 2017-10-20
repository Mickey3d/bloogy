<h1><?= $categorie->titre; ?></h1>

<div class="row">
  <div class="col-sm-12">

		<?php foreach($articles as $post): ?>

			<h2><a href="<?= $post->Url ?>"><?= $post->title ?></a></h2>
			<p><em><?= $post->categorie; ?></em></p>
				
			<p><?= $post->extrait; ?></p>

		<?php endforeach; ?>
        
  </div>
</div>