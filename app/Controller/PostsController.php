<?php
namespace App\Controller;

class PostsController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('comment');
        $this->loadModel('Category');
        $this->loadModel('user');
    }

    public function index(){
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts.index', compact('posts', 'categories'));
    }

    public function category(){
        $categorie = $this->Category->find($_GET['id']);
        $articles = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('articles', 'categorie', 'categories'));
    }

    public function show(){
        $post = $this->Post->findWithCategory($_GET['id']);
        $comments = $this->comment->getComments($_GET['id']);
        $this->render('posts.show', compact('post','comments'));
    }
    
    /**
     * Add  a comment and refresh comments list
     */
	public function addComment() {
		// todo gestion de l'erreur eventuelle de la requete.
		$this->comment->add($_GET['id'], $_GET['userId'], $_GET['comment']);
		// Refresh the data.
		$this->show();
	}
}