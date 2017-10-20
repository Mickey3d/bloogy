<?php

namespace App\Entity;

use Core\Entity\Entity;


class CommentEntity Extends Entity {
    
    // ATTRIBUT
    
    /**
     * Comment's id -> @var integer
     */
    protected $id;	
    
    /**
     * Content's Comment -> @var string
     */
    protected $content;
	
    /**
     * Author's name comment -> @var string
     */
    protected $author;
	
	/**
     * Creation's date of the comment -> @var dateTime -> CURRENT TIMESTAMP
     */
    protected $commentDate;
    
    /**
     * Post's id for the comment -> @var integer
     */
    protected $postId;


    // GETTER

    public function getId() {
        return $this->id;
    }
	
    public function getAuthor() {
        return $this->author;
    }

    public function getContent() {
        return $this->content;
    }

	public function getCommentDate(){
		return $this->commentDate;
	}

    public function getPostId() {
        return $this->postId;
    }
	
	
}