<?php
namespace App\Table;

use Core\Table\Table;

/**
 * Class UserTable -> model for UserEntity
 * @package App\Table
 */
class UserTable extends Table
{

    /**
     * @var string $table table name in the DB
     */
    protected $table = 'users';

    
    
        /**
     * Get an user
     * @return array of UserEntity
     */
    public function getUsers(){
		return $this->query("		
		SELECT users.id as userId, username, email, password, role, info
		FROM users");
    }
    
        /**
     * Get user name as an author
	 * @param int $id id of the 'user'
     * @return array of UserEntity
     */
    public function getUsername($id){
		return $this->query("		
		SELECT users.id as userId, username, email, role, info
		FROM users
        WHERE id = ?", [$id], true);
    }
    
    /**
     * test to know if a mail already exists in users table
     * @return mixed id of the user if mail exists or false
     */
    public function mailTest()
    {
        if (!isset($_POST['email'])) {
            return false;
        }

        // query looking if a user exists with this email
        $sql = 'SELECT id AS userId, username FROM users WHERE email = ?';
        return $this->query($sql, [$_POST['email']], true);
    }
    
     /**
     * test to know if a name already exists in users table
     * @param string $name -> username
     * @return boolean -> true if exists
                       -> false if not exists
     */
    public function nameTest($name)
    {
        $result = $this->query("		
		SELECT id AS userId
		FROM users
		WHERE username = ? ", [$name], true);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}