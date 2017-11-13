<div class="container-fluid col-lg-12">
	<div class="row-fluid">

        <div class="col-lg-12">  
            <h2 class="center"> Mes Informations</h2>
            <br>        
        </div>
        
        <?php
    
        $userProfileId = $userProfile->id;
        
        if (($userProfileId === $_SESSION['auth']) || ($_SESSION['role'] == 'admin')) { ?>
        
        <div class="col-lg-12">
            <div class="btn-group pull-right">
                <a class="btn dropdown-toggle btn-success" data-toggle="dropdown" href="#">
                    Option 
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="?p=users.infoEdit"><span class="icon-wrench"></span> Editer mes Infos</a></li>
                    <li><a href="?p=users.edit"><span class="icon-trash"></span> Modifier mon Compte</a></li>
                </ul>
            </div>
        </div>
        <br>
        
        <?php } ?>
        
        <div class="col-lg-12">
            <br>
            <br>
            <?= $userProfile->info; ?>
               
        </div>
        
        
    </div>
</div>