<?php

namespace App\Entity;

use Core\Entity\Entity;

class UserEntity Extends Entity {
    
    // User id. -> @var integer
    protected $id;	
    
    // User name. -> @var string
    protected $username;
    
    // User email. -> @var string
    protected $email;
    
    // User email. -> @var string
    protected $password;
    
    // User email. -> @var string
    protected $role;
    
    // User info. -> @var string
    protected $info;
    
    // User info. -> @var string
    protected $pictureUrl;
    


// GETTER
    
    public function getId() {
        return $this->id; 
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
    
    public function getInfo() {
        return $this->info;
    }
    
    public function getPictureUrl() {
        return $this->pictureUrl;
    }

}