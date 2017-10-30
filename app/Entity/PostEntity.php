<?php
namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity {
    
    // ATTRIBUT
    
     // Post id -> @var integer
    protected $postId;

     // Post title->  @var string
    protected $titre;

    // Post content _> @var string
    protected $contenu;

	// Post Url -> @var string
    private $url;	
    
     // Post id -> @var integer
    protected $picture_id;  

    
    
    // GETTER
    
    public function getPostId() {
        return $this->postId;
    }
    
    public function getTitle() {
        return $this->titre;
    }

    public function getContent() {
        return $this->contenu;
    }

    public function getUrl() {
        $id = $this->getPostId();
        $urlLink = 'index.php?p=posts.show&postId=' . $id . '';
        return $urlLink;
    }
    
    public function getPicture_id() {
        return $this->picture_id;
    }

    // Return an extract of the content
    public function getExtrait(){
        $html = '<p>' . substr($this->contenu, 0, 200) . '...</p>';
        // $html .= '<p><a href="' . $this->Url . '">Voir la suite</a></p>';
        return $html;
    }

}