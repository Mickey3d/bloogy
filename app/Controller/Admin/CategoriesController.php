<?php
namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;

class CategoriesController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Category');
        $this->loadModel('Setting');
    }

    // Index off all Categories
    public function index(){
        $categories = $this->Category->all();
        $locationTitle = 'Administration des Catégories';
        $this->render('admin.category.index', compact('categories', 'locationTitle'));
    }

    // Add a Catgory
    public function add(){
        if(!empty($_POST)){
            $result = $this->Category->create([
                'titre' => $_POST['titre']
            ]);
            if($result){
                header('Location: index.php?p=admin.categories.index');
            }
        }
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        
        $locationTitle = 'Mode Création d\'une Catégorie';
        
        $form = new BootstrapForm($_POST);
        
        $this->render('admin.category.edit', compact('form', 'locationTitle', 'settings'));
    }

    // Edit a Category
    public function edit(){
        if(!empty($_POST)){
            $result = $this->Category->update($_GET['id'], [
                'titre' => $_POST['titre']
            ]);
            if($result){
                header('Location: index.php?p=admin.categories.index');
            }
        }
        $categories = $this->Category->find($_GET['id']);
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        
        $locationTitle = 'Mode Edition d\'une Catégorie';
        
        $form = new BootstrapForm($categories);
        
        $this->render('admin.category.edit', compact('form', 'locationTitle', 'settings'));
    }

    // Delete a Category
    public function delete(){
        if(!empty($_POST)){
            $result = $this->Category->delete($_POST['id']);
            return $this->index();
        }
    }

}