<?php

$profileCssClass =  '';


$commentsCssClass = '';

switch ($activeItem) {
        
    case "profile" :
        $profileCssClass = 'class="active"';
        break;
    case "comments" :
        $commentsCssClass = 'class="active"';
        break;
}
?>

<div class="profile-usermenu">
    <ul class="nav">
        <li <?php echo($profileCssClass) ?> > 
            <a href="?p=users.show&userId=<?= $userProfile->id; ?>"><i class="glyphicon glyphicon-user"></i> Profil </a>
        </li>
        <li <?php echo($commentsCssClass) ?> >
            <a href="?p=comments.index&userId=<?= $userProfile->id; ?>"><i class="glyphicon glyphicon-comment"></i> Ses Commentaires </a>
        </li>
                                            
    </ul>
</div>