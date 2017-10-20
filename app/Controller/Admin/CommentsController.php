<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

/** 
 * Class Comments Controller -> Controller for CommentEntity
 * Get data from the model and transfer it to the view
 * @package App\Controller\Admin
 */
class CommentsController extends AppController{

    /**
     * CommentsController Builder.
     * define the view path and template and load required models
     */
    public function __construct(){
        parent::__construct();
        $this->loadModel('comment');
        $this->loadModel('Post');
        
    }

    // Request all the comments and transmit it to the view
    public function index(){

        $title = 'Back Office';

        $comments = $this->comment->getAllComments();
        $posts = $this->Post->all();
        $locationTitle = 'Administration des Commentaires';

        $this->render('admin.comments.index', compact('comments', 'posts', 'locationTitle'));
    }

    // Edit a comment and go back to the refresh comments list
    public function edit(){
        if (!empty($_POST)) 
        {
            $result = $this->comment->update($_GET['id'], [
                'content' => $_POST['content']                
            ]);
            if($result){
                header('Location: ' . $this->getLocation());
                exit;
            }
        }

        $post = $this->comment->find($_GET['id']);

        $locationTitle = 'Edition d\'un commentaire';

        $form = new BootstrapForm($post);
        $this->render('admin.comments.edit', compact('form', 'locationTitle'));
    }

    // Delete a comment and go back to the refresh comments list
    public function delete(){
        if (!empty($_POST)) {
            $result = $this->comment->delete($_POST['id']);
            return $this->index();
        }
    }

    /**
     * Define the location depending of the call's origin (backend or frontend)
     * @return string $url -> Redirection path
     */
    public function getLocation() {

        $url = '';

        // admin'call from frontend $_GET['from'] is defined.
        if (isset($_GET['from'])) {
            $url = 'index.php?p='. $_GET['from'] . '&id=' . $_GET['id'];
            
            // else if $_GET['from']is not defined, call is from backend
            
        } else {
            $url = 'index.php?p=admin.comments.index';
        }
        return $url;
    }
}