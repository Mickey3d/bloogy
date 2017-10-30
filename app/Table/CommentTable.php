<?php
namespace App\Table;

use Core\Table\Table;

/**
 * Class CommentTable ->  Model for CommentEntity
 * @package App\Table
 */

class CommentTable extends Table{

    // @var string $table -> Table's name in the DB
    protected $table = 'comments';

 
    /**
     * Get Comments for a post
	 * @param int $id -> post id
     * @return CommentEntity array
     */
    public function getComments($id){
		return $this->query("		
		SELECT comments.id AS commentId, content, postID, userID, username, commentDate
		FROM comments
        INNER JOIN users ON userID = users.id
		WHERE postID = ?
        ORDER BY commentId DESC", [$id], false);
    }
    
    
    /**
     * Get Comments for a post
	 * @param int $id -> post id
     * @return CommentEntity array
     */
    public function getUserComments($userID){
		return $this->query("		
		SELECT comments.id AS commentId, content, postID, userID, username, commentDate
		FROM comments
        INNER JOIN users ON userID = users.id
		WHERE userID = ?
        ORDER BY commentId DESC", [$userID], false);
    }
    
     /**
     * Get userId from a comment
	 * @param int $id -> comment id
     * @return CommentEntity array
     
    public function getUserId($id){
		return $this->query("		
		SELECT userID AS userId
		FROM comments  
		WHERE postId = ?", [$id], true);
    }
    
    */

     /**
     * Get id from a coment
	 * @param int $id -> post id
     * @return CommentEntity array
     */
    public function getComId($id){
		return $this->query("		
		SELECT id AS comId
		FROM comments
		WHERE postId = ?", [$id], false);
    }
    
    /**
     * get  all the comments.
     * @return CommentEntity array object.
     */
    public function getAllComments(){
	    return $this->query("
                            SELECT comments.id AS commentId, content, postID, userID, username, commentDate
                            FROM comments
                            INNER JOIN users ON userID = users.id
                            GROUP BY postID, content
                            ORDER BY CommentDate DESC");
    }
    
    
    public function findPostTitle($id){
		return $this->query("		
		SELECT titre
		FROM articles            
		WHERE id = ?", [$id], true);		
    }
    
    
	public function add($postID)
    {
		$sSql = [
			'content' => $_POST['content'],
			'postId' => $postID,
            'userId' => $_SESSION['auth'],
            'author' => $_SESSION['username']
		];			
		
		$res = $this->create($sSql);
	}

    
}