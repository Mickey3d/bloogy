<?php

namespace App\Entity;

use Core\Entity\Entity;

class PictureEntity Extends Entity {
    
    // User id. -> @var integer
    protected $id;	
    
    // Picture name. -> @var string
    protected $name;
    
    // Picture Url. -> @var string
    protected $pictureUrl;
    
    // Picture Thumbnail Url. -> @var string
    protected $pictureThumbnailUrl;

    


// GETTER
    
    public function getId() {
        return $this->id; 
    }

    public function getName() {
        return $this->name;
    }
   
    public function getPictureUrl() {
        return $this->pictureUrl;
    }
    
    public function getPictureThumbnailUrl() {
        return $this->pictureThumbnailUrl;
    }

}