<?php
namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;

class PostsController extends AppController {

    // PostsContoller Builder
    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }
    
    // Indes of all Posts
    public function index(){
        $posts = $this->Post->last();
        $locationTitle = 'Administration des Billets';
        $this->render('admin.posts.index', compact('posts', 'locationTitle'));
    }

    // Add a Post -> Return to Admin Post Index
    public function add(){
        if(!empty($_POST)){
            $result = $this->Post->create([
                'titre' => $_POST['title'],
                'contenu' => $_POST['content'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                header('Location: index.php?p=admin.posts.index');
            }
        }
        $categories =  $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $locationTitle = 'Mode Création d\'un Billet';
        $this->render('admin.posts.edit', compact('categories', 'form', 'locationTitle'));
    }

    // Edit a Post -> Return to Admin Post Index
    public function edit(){
        if(!empty($_POST)){
            $result = $this->Post->update($_GET['postId'], [
                'titre' => $_POST['title'],
                'contenu' => $_POST['content'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                header('Location: index.php?p=admin.posts.index');
            }
        }
        $post = $this->Post->find($_GET['postId']);
        $categories =  $this->Category->extract('id', 'titre');
        $locationTitle = 'Mode Edition d\'un Billet';
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('post', 'categories', 'form', 'locationTitle'));
    }

    // Delete a Post
    public function delete(){
        if(!empty($_POST)){
            $result = $this->Post->delete($_POST['postId']);
            return $this->index();
        }
    }
    

}