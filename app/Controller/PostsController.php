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
        
        if (isset($_GET['orderBy'])) {
            $orderSelected = $_GET['orderBy'];
        }
        
        if (isset($_GET['page']))
        {
            $page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse
        }
        else // La variable n'existe pas, c'est la première fois qu'on charge la page
        {
            $page = 1; // On se met sur la page 1 (par défaut)
        }
        
        // On place dans une variable le nombre de billet souhaité par page
        $nbrOfPostsPerPage = $settings->nbrPostPerPage;
        
        // On définit la clause de LIMIT
        $limit = ($page - 1) * $nbrOfPostsPerPage;
        
        // On définit la clause de OFFSET
        $offset = $nbrOfPostsPerPage;
        
        $posts = $this->Post->getAllSelectedPost($orderSelected, $limit, $offset);
        
        // On récupère le nombre total de billets
        $totalPost = $this->Post->getAllPost();
        $totalPostsCount = count($totalPost);
        
        // On calcule le nombre de pages à créer
        $nbrOfPages = ceil($totalPostsCount/$nbrOfPostsPerPage) ;
        

        $this->render('posts.index', compact('posts', 'categories', 'settings', 'orderSelected', 'nbrOfPages', 'page'));
    }

    public function category(){
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        
        // direction for the order by (ASC or DESC) for the post list.
        $orderSelected = 'DESC';

        if (isset($_POST['orderBy'])) {
            $orderSelected = $_POST['orderBy'];
        }
        
        if (isset($_GET['orderBy'])) {
            $orderSelected = $_GET['orderBy'];
        }
        
        if (isset($_GET['page']))
        {
            $page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse
        }
        else // La variable n'existe pas, c'est la première fois qu'on charge la page
        {
            $page = 1; // On se met sur la page 1 (par défaut)
        }
        
        // On place dans une variable le nombre de billet souhaité par page
        $nbrOfPostsPerPage = $settings->nbrPostPerPage;
        
        // On définit la clause de LIMIT
        $limit = ($page - 1) * $nbrOfPostsPerPage;
        
        // On définit la clause de OFFSET
        $offset = $nbrOfPostsPerPage;
        
        // On récupère le nombre total de billets
        $totalPost = $this->Post->getAllPostByCategory($_GET['id']);
        $totalPostsCount = count($totalPost);
        
        // On calcule le nombre de pages à créer
        $nbrOfPages = ceil($totalPostsCount/$nbrOfPostsPerPage) ;
        
        $categorie = $this->Category->find($_GET['id']);
        $articles = $this->Post->lastByCategory($_GET['id'], $orderSelected, $limit, $offset);
        $categories = $this->Category->all();
        
        $this->render('posts.category', compact('articles', 'categorie', 'categories', 'settings', 'totalPostsCount', 'totalPost', 'orderSelected', 'nbrOfPages', 'page'));
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