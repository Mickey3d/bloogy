<?php
namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;

class SettingsController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Setting');
    }

    // Edit  blog settings
    public function edit(){
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        
        if(!empty($_POST)){
            $result = $this->Setting->update($settingsId, [
                'siteName' => $_POST['siteName'],
                'slogan' => $_POST['slogan'],
                'logoSubtitle' => $_POST['logoSubtitle'],
                'mailContact' => $_POST['mailContact']
            ]);
            if($result){
                header('Location: index.php?p=admin.settings.edit');
            }
        }
    
        
        $locationTitle = 'Configuration du Blog';
        
        $form = new BootstrapForm($settings);
        
        $this->render('admin.settings.edit', compact('form', 'locationTitle', 'settings'));
    }


}