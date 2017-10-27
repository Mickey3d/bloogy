<?php

namespace App\Entity;

use Core\Entity\Entity;

class UserEntity Extends Entity {
    
    // User id. -> @var integer
    protected $userId;	
    
    // User name. -> @var string
    protected $username;
    
    // User email. -> @var string
    protected $email;
    
    // User email. -> @var string
    protected $password;
    
    // User email. -> @var string
    protected $role;
    


// GETTER
    
    public function getUserId() {
        return $this->userId; 
    }

    public function getUsername() {
        return $this->username;
    }
   
    public function getEmail() {
        return $this->email;
    }
    
    public function getPassword() {
        return $this->password;
    }
    public function getRole() {
        return $this->role;
    }

}