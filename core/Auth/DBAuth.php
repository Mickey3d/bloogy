<?php
namespace Core\Auth;

use Core\Database\Database;

class DBAuth 
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getUserId(){
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

    // Checks in the database if username and password given by user are correct
    // @param $username / @param $password
    // @return boolean return true if user exists and password is correct else return false.
    public function login($username, $password)
    {
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
        if($user){
            if($user->password === sha1($password)){
                $_SESSION['auth'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['role'] = $user->role;
            //    $_SESSION['email'] = $user->email;
            //    $_SESSION['userLocked'] = $user->userLocked;
                return true;
            }
        }
        return false;
    }

    // Check if the user is logged.
    public function logged()
    {
        return isset($_SESSION['auth']);
    }

}


     /**
  
    // Check if the user is an admin
    public function isAdmin()
  {
		if (!isset($_SESSION['role']))
        {
			return false;
		}
		return ($_SESSION['role'] === 'admin');
        // @return bool
	}


    // Check if the user is locked
    public function userLocked() 
    {
        if (!isset($_SESSION['userLocked'])){
            return false;
        }

        return ($_SESSION['userLocked'] == 1);
    }
    // @return bool
}
*/