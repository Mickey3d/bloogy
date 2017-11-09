<?php
namespace App\Controller\Admin;

use \App;

use \Core\Auth\DBAuth;

// Class AppController is the application controller for the back office

class AppController extends \App\Controller\AppController {

    public function __construct(){
        parent::__construct();
        $this->template = 'admin/default';
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if(!$auth->logged()){
            header('Location: index.php?p=users.login');
        }
    }

}