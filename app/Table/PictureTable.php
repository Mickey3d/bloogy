<?php
namespace App\Table;

use Core\Table\Table;

/**
 * Class PictureTable -> model for PictureEntity
 * @package App\Table
 */
class PictureTable extends Table
{

    /**
     * Get a picture with the id
	 * @param int $id id of the 'picture'
     * @return array of UserEntity
     */
    public function getPicture($id){
		return $this->query("		
		SELECT pictures.id as pictureId, name, pictureUrl, pictureThumbnailUrl
		FROM pictures
        WHERE id = ?", [$id], true);
    }
    
    
    
    
    
    
    
}