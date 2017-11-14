<div class="container">
    <?php foreach($users as $user): ?>
    <div class="hover userCardPanel" onmouseover="javascript:this.className += ' flip';" onmouseout="javascript:this.className = 'hover userCardPanel';">
        <div class="front">
            <div class="frontTitle">
                <?= $user->username; ?>
            </div>
            <div id="img-preview-block" class="img-circle avatar avatar-original center-block" style="background-size:cover; background-image:url(
            <?php 
                if(isset($user) && $user->pictureUrl != ''){
                    echo($user->pictureUrl);
                }else {
                    echo('http://icons.iconarchive.com/icons/hopstarter/halloween-avatars/256/Mask-3-icon.png');
                } ?>)"> 
            </div>
            <br> 
            <div class="frontLocation">
                <?= $user->role; ?>
            </div>
        </div>
        <div class="back">
            <div class="backTitle"><?= $user->email; ?></div>
            <div class="backParagraph">
                
                <p>Utilisateur de la plateforme Bloogy</p>
                
            </div>
            <div class="backGoto">
                <a href="?p=users.show&userId=<?= $user->id; ?>">
                    <button type="button" class="btn btn-success btn-lg" title="Voir le Profil">
                        <span class="glyphicon glyphicon-eye-open"></span>                        
                    </button>
                </a>
                
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>