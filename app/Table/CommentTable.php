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
		SELECT id AS comment_id, content, postId, author, CommentDate
		FROM comments            
		WHERE postId = ?
        ORDER BY comment_id DESC", [$id], false);
    }
    
    /**
     * get  all the comments.
     * @return CommentEntity array object.
     */
    public function getAllComments(){
	    return $this->query("
                            SELECT id AS comment_id, content, postId, author, CommentDate
                            FROM comments
                            GROUP BY postId, content
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
			'postId' => $postID
		];			
		
		$res = $this->create($sSql);
	}

    
}