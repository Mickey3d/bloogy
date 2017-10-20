<div class="container" >
    <header class="row">    
        <div class="col-md-12">    
            <img src="img/bloogy.png" alt="bloogy">    
        </div>
    </header>
</div>

<div class="container">
    <div class="page-header">
            <div class="row">
                <div class="blog-title col-xs-12">Bloogy V 0.4</div>
            </div>
            <div class="row">
                <div class="blog-description  col-xs-12 col-md-5 col-lg-4">Bloogy l'utilitaire blog vraiment pratique</div>
            </div>
    </div>
</div>


<div class="container">
        <section id='blog-show'>
            <div class="container">
            
                <div class="col-sm-8">   

                    <?php
                    foreach($posts as $post)
                        {
                    ?>
                    <div class="col-md-12 blogShort" class='billets'>
                        <h2><a href="?p=posts.show&id=<?= $post->post_id; ?>"><?= $post->title ?></a></h2>

                            <em><small>le <?= $post->date; ?> </small></em>
                        </h1>

                        <article>

                            <p><?= $post->extrait; ?></p>
                        
                        </article>
                    
                            <a class="btn btn-blog pull-right marginBottom10" href="?p=posts.show&id=<?= $post->post_id; ?>">Lire plus...</a> 

                    </div>

                    <?php
                    }
                    ?> 
            </div>
            <div class="col-sm-4">
                <ul> 
                  <?php foreach($categories as $categorie): ?>

                  <li><a href="index.php?p=posts.category&id=<?= $categorie->id; ?> "><?= $categorie->titre; ?></a></li>
		      
                  <?php endforeach; ?>
		        </ul>
            </div>

                <div class="col-md-12 gap10"></div>
            </div>
        </section>		
    </div>

