<?php
namespace App\Controller;

use Core\Controller\Controller;
use \App;

// Class AppController is the application controller for the front office

class AppController extends Controller {
    
    // App Builder
    public function __construct(){
    // define view path and template
        $this->viewPath = ROOT . '/app/Views/';
        $this->template = 'default';
    }
    
    
    // Creates a Model instance via the factory App->getTable()
    protected function loadModel($model_name){
        $this->$model_name = App::getInstance()->getTable($model_name);
        // @param string $model_name => name of the model
    }

}