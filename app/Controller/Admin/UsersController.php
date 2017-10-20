<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

/* Class UsersController is the controller for Users Entity 
 * @package App\Controller\Admin
 */
class UsersController extends AppController{

    // CommentsController builder
    public function __construct(){
        parent::__construct();
        $this->loadModel('user');
    }

    // Request all Users from User Model render-> Users Index View.
    public function index() {

        $users = $this->user->all('username');

        $locationTitle = 'Administration des Utilisateurs';
        $this->render('admin.Users.index', compact('users', 'locationTitle'));
    }
    
    
    // Edit an User account
    public function edit(){

        if (!empty($_POST)) {
            
            $fields =  ['username' => $_POST['username'],
                        'email' => $_POST['email'],
                        'role' => $_POST['role'],
                        'isLocked' => 0];

            if (isset($_POST['isLocked']) && $_POST['isLocked']=='on') 
            {
                $fields['isLocked'] =  1;
            }

            $result = $this->user->update($_GET['id'], $fields);

            if($result)
            {
                return $this->index();
            }
        }

        $data = $this->user->find($_GET['id']);

        $locationTitle = 'Mode Edition d\'un utilisateur';

        $form = new BootstrapForm($data);
        
        $userEditedId = $_GET['id'];
        
        $deleteButton = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-user-modal"> Supprimer le Profil </button>';
        
        $passwordField = '<a href="?p=admin.users.newPassword&id=' . $userEditedId . '" class="btn btn-danger"> Changer de Mot de Passe </a>' ;
        
        
        $this->render('admin.users.edit', compact('form', 'locationTitle','passwordField', 'deleteButton', 'userEditedId'));
    }

    //Delete an User return -> index
    public function delete(){
        if (!empty($_POST)) {
            
            $result = $this->user->delete($_POST['id']);
            return $this->index();
        }
    }
    

    // Add an user  
    public function add(){
    
        if (!empty($_POST)) {
            $result = $this->user->create([
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'role' => $_POST['role'],
                'password' => sha1($_POST['password'])
            ]);
            if($result){
                return $this->index();
            }
        }

        $locationTitle = 'Mode Création d\'un Utilisateur';
        
        $form = new BootstrapForm($_POST);
        
        $deleteButton = '<strong> Nouvel Utilisateur </strong>';
        
        $passInput = $form->input('password', 'Mot de Passe*',null, true);
        
        $passwordField = '<div class="form-group">' . $passInput . '</div>' ;
        
        $this->render('admin.users.edit', compact('form', 'locationTitle', 'passwordField', 'deleteButton'));
    }

    
    // Give the possibility for an admin to Change an user's password
    public function newPassword()
    {
        $error = false;
        $passEqualityTest = false;
        $userNewPassId = $_GET['id'];

        if (!empty($_POST)) {
            // Check if user is logged
            if (isset($_SESSION['auth'])) {
                $userNewPassId = $_GET['id'];
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

        $locationTitle = 'Modification du mot de passe. ';

        $form = new BootstrapForm($_POST);
        $this->render('admin.users.newPassword', compact('form', 'locationTitle', 'error', 'passEqualityTest', '$userNewPassId'));
    }   
}