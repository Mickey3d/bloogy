<?php

$profileCssClass =  '';

$settingsCssClass = '';

$commentsCssClass = '';

switch ($activeItem) {
        
    case "profile" :
    
        $profileCssClass = 'class="active"';
        break;
    case "settings" :
        $settingsCssClass = 'class="active"';
        break;
    case "comments" :
        $commentsCssClass = 'class="active"';
        break;
}
?>

<div class="profile-usermenu">
    <ul class="nav">
        <li <?php echo($profileCssClass) ?> > 
            <a href="?p=users.show"><i class="glyphicon glyphicon-user"></i> Mon Profil </a>
        </li>
        <li <?php echo($settingsCssClass) ?> >
            <a href="?p=users.edit"><i class="glyphicon glyphicon-cog"></i> Paramètres du Compte </a>
        </li>
        <li <?php echo($commentsCssClass) ?> >
            <a href="?p=comments.index"><i class="glyphicon glyphicon-comment"></i> Mes Commentaires </a>
        </li>
                                            
    </ul>
</div>
