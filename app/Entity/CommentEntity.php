<?php

namespace App\Entity;

use Core\Entity\Entity;


class CommentEntity Extends Entity {
    
    // ATTRIBUT
    
    /**
     * Comment's id -> @var integer
     */
    protected $commentId;	
    
    /**
     * Content's Comment -> @var string
     */
    protected $content;
	
    /**
     * Author's id -> @var int
     */
    protected $userID;
    
    /**
     * Author's name -> @var string
     */
    protected $username;
	
	/**
     * Creation's date of the comment -> @var dateTime -> CURRENT TIMESTAMP
     */
    protected $commentDate;
    
    /**
     * Post's id for the comment -> @var integer
     */
    protected $postID;


    // GETTER

    public function getCommentId() {
        return $this->commentId;
    }

    public function getContent() {
        return $this->content;
    }
    
    public function getUserID() {
        return $this->userID;
    }
    
    public function getUsername() {
        return $this->username;
    }

	public function getCommentDate(){
		return $this->commentDate;
	}

    public function getPostID() {
        return $this->postID;
    }
	
	
}