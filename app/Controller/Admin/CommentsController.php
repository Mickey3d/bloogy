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
        $this->loadModel('Setting');
        
    }

    // Request all the comments and transmit it to the view
    public function index(){

        $title = 'Back Office';

        $comments = $this->comment->getAllComments();
        $reportedComments = $this->comment->getReportedComments();
        $posts = $this->Post->all();
        $locationTitle = 'Administration des Commentaires';
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);

        $this->render('admin.comments.index', compact('comments', 'reportedComments', 'posts', 'locationTitle', 'settings'));
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

        $post = $this->comment->find($_GET['commentId']);

        $locationTitle = 'Edition d\'un commentaire';
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);

        $form = new BootstrapForm($post);
        $this->render('admin.comments.edit', compact('form', 'locationTitle','settings'));
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
            $url = 'index.php?p=admin.comments.index';
        }
        return $url;
    }
}