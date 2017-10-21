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
    }

    // Request all Users from User Model render-> Users Index View.
    public function index() {

        $users = $this->user->all('username');

        $locationTitle = 'Profiles des Utilisateurs';
        $this->render('users.index', compact('users', 'locationTitle'));
    }
    
        
    // Function for connect the user
    public function login()
    {
        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['username'], $_POST['password'])){
                header('Location: index.php?p=users.show&id=' . $_SESSION['auth'] . '');
            }else
            {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }
    

    // function for disconnect the user
    public function logout(){
		session_destroy();
		header('Location: index.php');
	}
    
    
    // Show Profile
    public function show(){

        $userProfile = '';
        
        if (!empty($_GET['id'])) {
            
        $userProfile = $this->user->find($_GET['id']);    
            
        } else {
        
            $userProfile = $this->user->find($_SESSION['auth']);
        }
        
        $this->template = 'profile';
        
        $activeItem = "profile" ;
        
        $locationTitle = 'Profil';        
        
        $this->render('users.show', compact('userProfile', 'locationTitle', 'activeItem'));
    }
    
    
    // Edit Profile
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
        
        $passwordField = '<a href="?p=users.newPassword&id=' . $userEditedId . '" class="btn btn-danger"> Changer de Mot de Passe </a>' ;
        
        
        $this->render('users.edit', compact('form', 'userProfile', 'locationTitle','passwordField', 'deleteButton', 'userEditedId', 'activeItem'));
    }
}