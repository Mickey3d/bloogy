<?php

namespace App\Entity;

use Core\Entity\Entity;

class SettingEntity Extends Entity {
    
    // Settings id. -> @var integer
    protected $id;	
    
    // Site name. -> @var string
    protected $siteName;
    
    // Slogan of the site. -> @var string
    protected $slogan;
    
    // Subtitle for the logo of the site. -> @var string
    protected $logoSubtitle;
    
    // Mail Contact for the site. -> @var string
    protected $mailContact;

    // Number of post to show per page on the Homepage, categories pages, post admin index  -> @var int
    protected $nbrPostPerPage;


// GETTER
    
    public function getId() {
        return $this->id; 
    }

    public function getSiteName() {
        return $this->siteName;
    }
   
    public function getSlogan() {
        return $this->slogan;
    }
    
    public function getLogoSubtitle() {
        return $this->logoSubtitle;
    }
    public function getMailContact() {
        return $this->mailContact;
    }

    public function getNbrPostPerPage() {
        return $this->nbrPostPerPage;
    }
   
}