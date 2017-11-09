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
    }
    
    // Indes of all Posts
    public function index(){
        $posts = $this->Post->last();
        $locationTitle = 'Administration des Billets';
        $this->render('admin.posts.index', compact('posts', 'locationTitle'));
    }

    // Add a Post -> Return to Admin Post Index
    public function add(){
<<<<<<< HEAD
       /* if(!empty($_POST)){
=======
        if(!empty($_POST)){
>>>>>>> 4ea8d628177b522434d14eb2dcc10a4957752ff2
            
            $result = $this->Post->create([
                'titre' => $_POST['title'],
                'contenu' => $_POST['content'],
<<<<<<< HEAD
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
                $message = 'Veuillez remplir le formulaire svp !';
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
=======
                'category_id' => $_POST['category_id'],
                'pictureUrl' => $_POST['pictureUrl']
>>>>>>> 4ea8d628177b522434d14eb2dcc10a4957752ff2
            ]);
            
                
            if($result){
                
                header('Location: index.php?p=admin.posts.index');
            }
        }
<<<<<<< HEAD
            
        } 
        $categories =  $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $locationTitle = 'Mode Ajout Image';
        $this->render('admin.posts.edit', compact('categories', 'form', 'locationTitle', 'message', 'nomImage', 'pictureUrl'));
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
        $pictureUrl = $post->pictureUrl;
 
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
        
            
            if( !empty($_FILES['fichier']['name']) ) {
                $pictureUrl = 'img/postsPictures/posts/' .$nomImage;
            } else {
                
                $pictureUrl = $_POST['pictureUrl'];
            }
        
         if( !empty($_POST) ) {
=======
        $categories =  $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $locationTitle = 'Mode Création d\'un Billet';
        $this->render('admin.posts.edit', compact('categories', 'form', 'locationTitle'));
    }

    // Edit a Post -> Return to Admin Post Index
    public function edit(){
        if(!empty($_POST)){
>>>>>>> 4ea8d628177b522434d14eb2dcc10a4957752ff2
            $result = $this->Post->update($_GET['postId'], [
                'titre' => $_POST['title'],
                'contenu' => $_POST['content'],
                'category_id' => $_POST['category_id'],
<<<<<<< HEAD
                'pictureUrl' => $pictureUrl
=======
                'pictureUrl' => $_POST['pictureUrl']
>>>>>>> 4ea8d628177b522434d14eb2dcc10a4957752ff2
                
                
            ]);
            if($result){
                header('Location: index.php?p=admin.posts.index');
            }
<<<<<<< HEAD
         }
            
        } 

       
        $post = $this->Post->find($_GET['postId']);
         
        $categories =  $this->Category->extract('id', 'titre');
        $locationTitle = 'Mode Edition d\'un Billet';
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('post', 'categories', 'form', 'locationTitle','message', 'nomImage', 'pictureUrl'));
=======
        }
        $post = $this->Post->find($_GET['postId']);
        $categories =  $this->Category->extract('id', 'titre');
        $locationTitle = 'Mode Edition d\'un Billet';
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('post', 'categories', 'form', 'locationTitle'));
>>>>>>> 4ea8d628177b522434d14eb2dcc10a4957752ff2
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
<<<<<<< HEAD
        define('TARGET', 'img/postsPictures/posts/');    // Repertoire cible
=======
        define('TARGET', 'C:/wamp64/www/bloogy3/public/img/postsPictures/posts/');    // Repertoire cible
>>>>>>> 4ea8d628177b522434d14eb2dcc10a4957752ff2
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
<<<<<<< HEAD
        {
=======
{
>>>>>>> 4ea8d628177b522434d14eb2dcc10a4957752ff2
            // On verifie si le champ est rempli
            if( !empty($_FILES['fichier']['name']) )
            {
                
<<<<<<< HEAD
               // var_dump($_FILES);
    
=======
                var_dump($_FILES);
    /*
>>>>>>> 4ea8d628177b522434d14eb2dcc10a4957752ff2
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
                
<<<<<<< HEAD
                
=======
                */
>>>>>>> 4ea8d628177b522434d14eb2dcc10a4957752ff2
            }
            else
            {
    // Sinon on affiche une erreur pour le champ vide
                $message = 'Veuillez remplir le formulaire svp !';
            }
<<<<<<< HEAD
    
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
        $this->render('admin.posts.addPicture', compact('categories', 'form', 'locationTitle', 'message', 'nomImage', 'pictureUrl'));
=======
        }
        
        $categories =  $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $locationTitle = 'Mode Ajout Image';
        $this->render('admin.posts.addPicture', compact('categories', 'form', 'locationTitle', 'message', 'nomImage'));
>>>>>>> 4ea8d628177b522434d14eb2dcc10a4957752ff2
    }
    

}