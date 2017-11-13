<?php
namespace App\Table;


use Core\Table\Table;

class SettingTable extends Table {

    protected $table = 'settings';


    /**
     * Get Settings Info from the database
     *
	 * @param $id int the id of the row
     * @return \App\Entity\PostEntity or null if not found
     */
    public function find($id){
		return $this->query("		
		SELECT *
		FROM settings            
		WHERE id = ?", [$id], true);		
    }
    

    

}