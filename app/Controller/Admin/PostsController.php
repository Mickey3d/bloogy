<?php
namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;
use \Core\Database\MysqlDatabase;

class PostsController extends AppController {

    // PostsContoller Builder
    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Picture');
        $this->loadModel('Setting');
    }
    
    // Indes of all Posts
    public function index(){
        
        
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
        
        $calledFunction = 'index';
        $locationTitle = 'Administration des Billets';
        
        $this->render('admin.posts.index', compact('posts', 'locationTitle', 'categories', 'calledFunction',  'settings', 'page', 'orderSelected', 'nbrOfPages'));
    }
    
    public function category(){
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        
        // Catdegory Id.
        $categoryId = '';
        
        if (isset($_POST['category'])) {
             $categoryId = $_POST['category'];
            
        }
        
        // direction for the order by (ASC or DESC) for the post list.
        $orderSelected = 'DESC';
        
        if (isset($_POST['orderBy'])) {
            
            $orderSelected = $_POST['orderBy'];
            $categoryId = $_POST['categoryId'];
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
        
        
        if (isset($_POST['category']))
        {
            $catId = $_POST['category'];
            $calledFunction = "category&categoryId=". $catId . "&";
        }
        else
        {
            $calledFunction = 'category';
        }
        
        if (isset($_GET['categoryId'])) {
            
            $catId = $_GET['categoryId'];
            $categoryId = $_GET['categoryId'];
            $calledFunction = "category&categoryId=". $catId . "&";
        }
        
        $categorie = $this->Category->find($categoryId);
        $categorieTitle = $categorie->titre;
        
        $posts = $this->Post->lastByCategory($categoryId, $orderSelected, $limit, $offset);
        
        // On récupère le nombre total de billets
        $totalPost = $this->Post->getAllPostByCategory($categoryId);
        $totalPostsCount = count($totalPost);
        
        // On calcule le nombre de pages à créer
        $nbrOfPages = ceil($totalPostsCount/$nbrOfPostsPerPage) ;
        
        $categories = $this->Category->all();
        $locationTitle = 'Administration des Billets -> '.$categorieTitle;        
        
        $this->render('admin.posts.index', compact('posts', 'categorie', 'categories', 'locationTitle', 'calledFunction', 'settings', 'totalPostsCount', 'totalPost', 'orderSelected', 'nbrOfPages', 'page'));
    }


    // Add a Post -> Return to Admin Post Index
    public function add(){
       
/************************************************************
 * Definition des constantes / tableaux et variables
 *************************************************************/
 
// Constantes
        define('TARGET', 'img/postsPictures/posts/');    // Repertoire cible
        define('MAX_SIZE', 120000);    // Taille max en octets du fichier
        define('WIDTH_MAX', 1600);    // Largeur max de l'image en pixels
        define('HEIGHT_MAX', 1200);    // Hauteur max de l'image en pixels
 
// Tableaux de donnees
        $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
        $infosImg = array();
 
// Variables
        $extension = '';
        $message = '';
        $nomImage = '';
        $pictureUrl = '';
 
/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
        if( !is_dir(TARGET) ) {
            if( !mkdir(TARGET, 0755) ) {
                exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
  }
}
 
/************************************************************
 * Script d'upload
 *************************************************************/
        if(!empty($_POST))
        {
            // On verifie si le champ est rempli
            if( !empty($_FILES['fichier']['name']) )
            {
                
               // var_dump($_FILES);
    
    // Recuperation de l'extension du fichier
                $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
                if(in_array(strtolower($extension),$tabExt))
    {
      // On recupere les dimensions du fichier
                    
                    $file_temp = $_FILES['fichier']['tmp_name'];   
                    
                    $infosImg = getimagesize($file_temp);
 
      // On verifie le type de l'image
                    if($infosImg[2] >= 1 && $infosImg[2] <= 14)
                    {
        // On verifie les dimensions et taille de l'image
                        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE))
                        {
          // Parcours du tableau d'erreurs
                            if(isset($_FILES['fichier']['error']) 
                               && UPLOAD_ERR_OK === $_FILES['fichier']['error'])
          {
            // On renomme le fichier
                                $nomImage = md5(uniqid()) .'.'. $extension;
 
            // Si c'est OK, on teste l'upload
                                if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$nomImage))
                                {
                                    $message = 'Upload réussi !';
                                }
                                else
                                {
              // Sinon on affiche une erreur systeme
                                    $message = 'Problème lors de l\'upload !';
                                }
                            }
                            else
                            {
                                $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                            }
                        }
                        else
                        {
          // Sinon erreur sur les dimensions et taille de l'image
                            $message = 'Erreur dans les dimensions de l\'image !';
                        }
                    }
                    else
                    {
        // Sinon erreur sur le type de l'image
                        $message = 'Le fichier à uploader n\'est pas une image !';
                    }
                }
                else
                {
      // Sinon on affiche une erreur pour l'extension
                    $message = 'L\'extension du fichier est incorrecte !';
                }
                
                
            }
            else
            {
    // Sinon on affiche une erreur pour le champ vide
                $message = '';
            }
        
            
            if( !empty($_FILES['fichier']['name']) ) {
                $pictureUrl = 'img/postsPictures/posts/' .$nomImage;
            } else {
                
                $pictureUrl = '';
            }
        
        if( !empty($_POST['title']) ) {  
        $result = $this->Post->create([
                'titre' => $_POST['title'],
                'contenu' => $_POST['content'],
                'category_id' => $_POST['category_id'],
                'pictureUrl' => $pictureUrl
            ]);
            
                
            if($result){
                header('Location: index.php?p=admin.posts.index');
                $infoMessage = "Création du billet et enregistrement dans la base de donnée OK";
                
            }
        }
            
        } 
        $categories =  $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $locationTitle = 'Mode Création d\'un Billet';
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        
        $this->render('admin.posts.edit', compact('categories', 'form', 'locationTitle', 'message', 'nomImage', 'pictureUrl','settings'));
    }

    // Edit a Post -> Return to Admin Post Index
    public function edit()
    {
    /************************************************************
 * Definition des constantes / tableaux et variables
 *************************************************************/
 
// Constantes
        define('TARGET', 'img/postsPictures/posts/');    // Repertoire cible
        define('MAX_SIZE', 120000);    // Taille max en octets du fichier
        define('WIDTH_MAX', 1600);    // Largeur max de l'image en pixels
        define('HEIGHT_MAX', 1200);    // Hauteur max de l'image en pixels
 
// Tableaux de donnees
        $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
        $infosImg = array();
 
// Variables
        $extension = '';
        $message = '';
        $nomImage = '';
        $pictureUrl = '';
        
/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
        if( !is_dir(TARGET) ) {
            if( !mkdir(TARGET, 0755) ) {
                exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
  }
}
 
/************************************************************
 * Script d'upload
 *************************************************************/
        if(!empty($_POST))
        {
            // On verifie si le champ est rempli
            if( !empty($_FILES['fichier']['name']) )
            {
                
               // var_dump($_FILES);
    
    // Recuperation de l'extension du fichier
                $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
                if(in_array(strtolower($extension),$tabExt))
    {
      // On recupere les dimensions du fichier
                    
                    $file_temp = $_FILES['fichier']['tmp_name'];   
                    
                    $infosImg = getimagesize($file_temp);
 
      // On verifie le type de l'image
                    if($infosImg[2] >= 1 && $infosImg[2] <= 14)
                    {
        // On verifie les dimensions et taille de l'image
                        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE))
                        {
          // Parcours du tableau d'erreurs
                            if(isset($_FILES['fichier']['error']) 
                               && UPLOAD_ERR_OK === $_FILES['fichier']['error'])
          {
            // On renomme le fichier
                                $nomImage = md5(uniqid()) .'.'. $extension;
 
            // Si c'est OK, on teste l'upload
                                if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$nomImage))
                                {
                                    $message = 'Upload réussi !';
                                }
                                else
                                {
              // Sinon on affiche une erreur systeme
                                    $message = 'Problème lors de l\'upload !';
                                }
                            }
                            else
                            {
                                $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                            }
                        }
                        else
                        {
          // Sinon erreur sur les dimensions et taille de l'image
                            $message = 'Erreur dans les dimensions de l\'image !';
                        }
                    }
                    else
                    {
        // Sinon erreur sur le type de l'image
                        $message = 'Le fichier à uploader n\'est pas une image !';
                    }
                }
                else
                {
      // Sinon on affiche une erreur pour l'extension
                    $message = 'L\'extension du fichier est incorrecte !';
                }
                
                
            }
            else
            {
    // Sinon on affiche une erreur pour le champ vide
                $message = '';
            }
        
            
            if( !empty($_FILES['fichier']['name']) ) {
                $pictureUrl = 'img/postsPictures/posts/' .$nomImage;
            } else {
                
                $pictureUrl = $_POST['pictureUrl'];
            }
        
         if( !empty($_POST) ) {
            $result = $this->Post->update($_GET['postId'], [
                'titre' => $_POST['title'],
                'contenu' => $_POST['content'],
                'category_id' => $_POST['category_id'],
                'pictureUrl' => $pictureUrl
                
                
            ]);
            if($result){
                
                header('Refresh:5;Location: index.php?p=admin.posts.index');
                $infoMessage = "Edition du billet et mise à jour de la base de donnée OK";
            }
         }
            
        } 

       
        $post = $this->Post->find($_GET['postId']);
         
        $categories =  $this->Category->extract('id', 'titre');
        $locationTitle = 'Mode Edition d\'un Billet';
        $form = new BootstrapForm($post);
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        
        $this->render('admin.posts.edit', compact('post', 'categories', 'form', 'locationTitle','message', 'nomImage', 'pictureUrl', 'settings', 'infoMessage'));
    }

    // Delete a Post
    public function delete(){
        if(!empty($_POST)){
            $result = $this->Post->delete($_POST['postId']);
            return $this->index();
        }
    }
    
    
    // Add a Post -> Return to Admin Post Index
    public function addPicture(){
       /* if(!empty($_POST)){
            
            $result = $this->Post->create([
                'titre' => $_POST['title'],
                'contenu' => $_POST['content'],
                'category_id' => $_POST['category_id']
            ]);
            
            
            
                
            if($result){
                
                header('Location: index.php?p=admin.posts.index');
            }
        }*/
/************************************************************
 * Definition des constantes / tableaux et variables
 *************************************************************/
 
// Constantes
        define('TARGET', 'img/postsPictures/posts/');    // Repertoire cible
        define('MAX_SIZE', 120000);    // Taille max en octets du fichier
        define('WIDTH_MAX', 1600);    // Largeur max de l'image en pixels
        define('HEIGHT_MAX', 1200);    // Hauteur max de l'image en pixels
 
// Tableaux de donnees
        $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
        $infosImg = array();
 
// Variables
        $extension = '';
        $message = '';
        $nomImage = '';
 
/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
        if( !is_dir(TARGET) ) {
            if( !mkdir(TARGET, 0755) ) {
                exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
  }
}
 
/************************************************************
 * Script d'upload
 *************************************************************/
        if(!empty($_POST))
        {
            // On verifie si le champ est rempli
            if( !empty($_FILES['fichier']['name']) )
            {
                
               // var_dump($_FILES);
    
    // Recuperation de l'extension du fichier
                $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
                if(in_array(strtolower($extension),$tabExt))
    {
      // On recupere les dimensions du fichier
                    
                    $file_temp = $_FILES['fichier']['tmp_name'];   
                    
                    $infosImg = getimagesize($file_temp);
 
      // On verifie le type de l'image
                    if($infosImg[2] >= 1 && $infosImg[2] <= 14)
                    {
        // On verifie les dimensions et taille de l'image
                        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE))
                        {
          // Parcours du tableau d'erreurs
                            if(isset($_FILES['fichier']['error']) 
                               && UPLOAD_ERR_OK === $_FILES['fichier']['error'])
          {
            // On renomme le fichier
                                $nomImage = md5(uniqid()) .'.'. $extension;
 
            // Si c'est OK, on teste l'upload
                                if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$nomImage))
                                {
                                    $message = 'Upload réussi !';
                                }
                                else
                                {
              // Sinon on affiche une erreur systeme
                                    $message = 'Problème lors de l\'upload !';
                                }
                            }
                            else
                            {
                                $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                            }
                        }
                        else
                        {
          // Sinon erreur sur les dimensions et taille de l'image
                            $message = 'Erreur dans les dimensions de l\'image !';
                        }
                    }
                    else
                    {
        // Sinon erreur sur le type de l'image
                        $message = 'Le fichier à uploader n\'est pas une image !';
                    }
                }
                else
                {
      // Sinon on affiche une erreur pour l'extension
                    $message = 'L\'extension du fichier est incorrecte !';
                }
                
                
            }
            else
            {
    // Sinon on affiche une erreur pour le champ vide
                $message = 'Veuillez remplir le formulaire svp !';
            }
    
        $pictureUrl = 'img/postsPictures/posts/' .$nomImage;
        
        if( !empty($_POST['title']) ) {  
        $result = $this->Post->create([
                'titre' => $_POST['title'],
                'contenu' => $_POST['content'],
                'category_id' => $_POST['category_id'],
                'pictureUrl' => $pictureUrl
            ]);
            
                
            if($result){
                
                header('Location: index.php?p=admin.posts.index');
            }
        }
            
        } 
        $categories =  $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $locationTitle = 'Mode Ajout Image';
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        
        $this->render('admin.posts.addPicture', compact('categories', 'form', 'locationTitle', 'message', 'nomImage', 'pictureUrl', 'settings'));
    }
    

}