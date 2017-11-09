<?php

namespace App\Controller;

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
        $this->loadModel('user');
        
    }

    // // Show User's Comments
    public function index() {

        $userProfile = '';
        
        $locationTitle = '';
        
        if (!empty($_GET['userId'])) {
            
        $userProfile = $this->user->find($_GET['userId']);
            
        $comments = $this->comment->getUserComments($_GET['userId']);
            
        $locationTitle = 'Commentaires du Profil';
            
        } else {
        
            $userProfile = $this->user->find($_SESSION['auth']);
            
            $comments = $this->comment->getUserComments($_SESSION['auth']);
            
            $locationTitle = 'Mes Commentaires';
        }
        
        $this->template = 'profile';
        
        $activeItem = "comments" ;
               
        
        $this->render('comments.user_comments_index', compact('userProfile', 'locationTitle', 'activeItem', 'comments'));
    }
    

    // Edit a comment and go back to the refresh comments list
    public function edit(){
        if (!empty($_POST)) 
        {
            $result = $this->comment->update($_GET['commentId'], [
                'content' => $_POST['content']                
            ]);
            if($result){
                header('Location: ' . $this->getLocation());
                exit;
            }
        }
        
        $userProfile = $this->user->find($_SESSION['auth']);
        
        $this->template = 'profile';
        
        $activeItem = "comments" ;

        $data = $this->user->find($_SESSION['auth']);

        $locationTitle = 'Edition de Mon Commentaire';
        
        $post = $this->comment->find($_GET['commentId']);

        $locationTitle = 'Edition d\'un commentaire';

        $form = new BootstrapForm($post);
        $this->render('comments.user_comment_edit', compact('form', 'locationTitle', 'activeItem', 'userProfile'));
    }

    // Delete a comment and go back to the refresh comments list
    public function delete(){
        if (!empty($_POST)) {
            $result = $this->comment->delete($_POST['commentId']);
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
            $url = 'index.php?p='. $_GET['from'] . '&commentId=' . $_GET['commentId'];
            
            // else if $_GET['from']is not defined, call is from backend
            
        } else {
            $url = 'index.php?p=comments.index';
        }
        return $url;
    }
}