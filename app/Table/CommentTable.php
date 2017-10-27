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
		SELECT id AS commentId, content, postID, userId AS userID, author, commentDate
		FROM comments
        
		WHERE postID = ?
        ORDER BY commentId DESC", [$id], false);
    }
    
     /**
     * Get userId from a coment
	 * @param int $id -> comment id
     * @return CommentEntity array
     */
    public function getUserId($id){
		return $this->query("		
		SELECT userId
		FROM comments  
		WHERE postId = ?", [$id], true);
    }

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
                            SELECT id AS commentId, content, postID, userID, author, commentDate
                            FROM comments
                            
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