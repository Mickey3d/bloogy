<?php
namespace App\Controller;

class PostsController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('comment');
        $this->loadModel('Category');
        $this->loadModel('report');
        $this->loadModel('Setting');
    }
    
    public function index() {
        
        $categories = $this->Category->all();
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        
        // direction for the order by (ASC or DESC) for the post list.
        $orderSelected = 'DESC';

        if (isset($_POST['orderBy'])) {
            $orderSelected = $_POST['orderBy'];
            
        }
        
        $posts = $this->Post->getAllPost($orderSelected);

        $this->render('posts.index', compact('posts', 'categories', 'settings'));
    }

    public function category(){
        
        // direction for the order by (ASC or DESC) for the post list.
        $orderSelected = 'DESC';

        if (isset($_POST['orderBy'])) {
            $orderSelected = $_POST['orderBy'];
            
        }
        
        $categorie = $this->Category->find($_GET['id']);
        $articles = $this->Post->lastByCategory($_GET['id'], $orderSelected);
        $categories = $this->Category->all();
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        $this->render('posts.category', compact('articles', 'categorie', 'categories', 'settings'));
    }

    public function show(){
        $post = $this->Post->findWithCategory($_GET['postId']);
        $comments = $this->comment->getComments($_GET['postId']);
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        $this->render('posts.show', compact('post','comments', 'pictureUrl', 'settings'));
    }
    
    /**
     * Add  a comment and refresh comments list
     */
	public function addComment() {
		// todo gestion de l'erreur eventuelle de la requete.
		$this->comment->add($_GET['postId'], $_GET['userId'], $_GET['comment']);
		// Refresh the data.
		$this->show();
	}
}