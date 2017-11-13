<?php
namespace App\Controller;

use \App;
use \Core\Auth\DBAuth;
use \Core\HTML\BootstrapForm;

class UsersController extends AppController {
    
    // UsersController builder
    public function __construct(){
        
        parent::__construct();
        
        $this->loadModel('user');
        $this->loadModel('comment');
        $this->loadModel('Setting');
    }

    // Request all Users from User Model render-> Users Index View.
    public function index() {

        $users = $this->user->all('username');

        $locationTitle = 'Profiles des Utilisateurs';
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        $this->render('users.index', compact('users', 'locationTitle', 'settings'));
    }
    
        
    // Function for connect the user
    public function login()
    {
        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['username'], $_POST['password'])){
                header('Location: index.php?p=users.show');
            }else
            {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        $this->render('users.login', compact('form', 'errors', 'settings'));
    }
    

    // function for disconnect the user
    public function logout(){
		session_destroy();
		header('Location: index.php');
	}
    
    
    // Show Profile
    public function show(){

        $userProfile = '';
        
        if (!empty($_GET['userId'])) {
            
        $userProfile = $this->user->find($_GET['userId']);    
            
        } else {
        
            $userProfile = $this->user->find($_SESSION['auth']);
        }
        
        $this->template = 'profile';
        
        $activeItem = "profile" ;
        
        $locationTitle = 'Profil';    
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        
        $this->render('users.show', compact('userProfile', 'locationTitle', 'activeItem', 'settings'));
    }
    
    
     // Edit Profile -> info
    public function infoEdit(){

        if (!empty($_POST)) {
            
            $fields =  ['info' => $_POST['info']];

            $result = $this->user->update($_SESSION['auth'], $fields);

            if($result)
            {
                return $this->show();
            }
        }
        
        $userProfile = $this->user->find($_SESSION['auth']);
        
        $this->template = 'profile';
        
        $activeItem = "profile" ;

        $data = $this->user->find($_SESSION['auth']);

        $locationTitle = 'Edition des Informations de mon Profil';

        $form = new BootstrapForm($data);
        
        $userEditedId = $_SESSION['auth'];
        
        
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        
        $this->render('users.infoEdit', compact('form', 'userProfile', 'locationTitle', 'userEditedId', 'activeItem', 'settings'));
    }
    
    
    
    // Edit Account Profile
    public function edit(){

        if (!empty($_POST)) {
            
            $fields =  ['username' => $_POST['username'],
                        'email' => $_POST['email']];

            $result = $this->user->update($_SESSION['auth'], $fields);

            if($result)
            {
                return $this->show();
            }
        }
        
        $userProfile = $this->user->find($_SESSION['auth']);
        
        $this->template = 'profile';
        
        $activeItem = "settings" ;

        $data = $this->user->find($_SESSION['auth']);

        $locationTitle = 'Edition de Mon Profil';

        $form = new BootstrapForm($data);
        
        $userEditedId = $_SESSION['auth'];
        
        $deleteButton = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-user-modal"> Supprimer le Profil </button>';
        
        $passwordField = '<a href="?p=users.newPassword" class="btn btn-danger"> Changer de Mot de Passe </a>' ;
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
        
        $this->render('users.edit', compact('form', 'userProfile', 'locationTitle','passwordField', 'deleteButton', 'userEditedId', 'activeItem', 'settings'));
    }
    
    // Give the possibility for an admin to Change an user's password
    public function newPassword()
    {
        $error = false;
        $passEqualityTest = false;

        if (!empty($_POST)) {
            // Check if user is logged
            if (isset($_SESSION['auth'])) {
                $userNewPassId = $_SESSION['auth'];
            } else {
                // user is not logged -> GO to login page
                header('Location: index.php??p=users.login');
            }

            // Check the mail and get the user id
            if (!empty($userNewPassId)) {
                // Passwords test
                if ($_POST['password'] === $_POST['password2']) {
                    
                    $fields = [
                        'password' => sha1($_POST['password'])
                    ];
                    
                    // Update the user's password in DB.
                    $result = $this->user->update($userNewPassId, $fields);
                    
                    
                    
                    if ($result) {
                        $_SESSION['newPassword'] = true;
                        header("location: index.php?p=users.login");
                        exit;
                    }
                } else {
                    $passEqualitytest = true;
                }
            }
            
        }

        $userProfile = $this->user->find($_SESSION['auth']);
        
        $this->template = 'profile';
        
        $activeItem = "settings" ;
        
        $locationTitle = 'Modification du mot de passe. ';
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);

        $form = new BootstrapForm($_POST);
        $this->render('users.newPassword', compact('form','userProfile', 'activeItem', 'locationTitle', 'error', 'passEqualityTest', '$userNewPassId','settings'));
    }
    
    
    // Show User's Comments
    public function userComments(){

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
        
        $activeItem = "comment" ;
        
        $settingsId = 1;
        $settings = $this->Setting->find($settingsId);
               
        
        $this->render('users.comments', compact('userProfile', 'locationTitle', 'activeItem', 'comments', 'settings'));
    }
    
}