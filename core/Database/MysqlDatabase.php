<?php
namespace Core\Database;

use \PDO;
use PDOException;

/**
 * Class MysqlDatabase
 * @package App
 * Facilitates use of PDO class.
*/
class MysqlDatabase extends Database
{
    
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
     
    // MysqlDatabase builder.
    public function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    // return a PDO instance
    private function getPDO(){
        if($this->pdo === null) {
            try {
                $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host,
                    $this->db_user, $this->db_pass);

            } catch (PDOException $e) {
                \App::error('La connexion à la base de donnée a échouée : ' .$e->getMessage());
               die();
            }

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

  
    
    
    /* Executes the pdo query function
     * @param string $stmt the SQL query
     * @param null $class_name the class name for PDO::FETCH_CLASS to return
     * @param bool $one type of fetch (one if $one is true else all)
     * @return array|bool|mixed
    */
    public function query($stmt, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->query($stmt);
        if(
            strpos($stmt, 'UPDATE') === 0 ||
            strpos($stmt, 'INSERT') === 0 ||
            strpos($stmt, 'DELETE') === 0
        ){
            return $req;
        }
        if($class_name === null)
        {
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else
        {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one)
        {
            $datas = $req->fetch();
        }
        else
        {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    
    // Run prepare and execute function of PDO
    public function prepare($stmt, $attr, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->prepare($stmt);
        $res = $req->execute($attr);
        if(
            strpos($stmt, 'UPDATE') === 0 ||
            strpos($stmt, 'INSERT') === 0 ||
            strpos($stmt, 'DELETE') === 0
        )
        {
            return $res;
        }
        if($class_name === null)
        {
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one)
        {
            $datas = $req->fetch();
        }
        else
        {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    
    /* Executes the LastInsertId function of PDO to get the last id of the last row that was inserted into the database
    @return string
    */
    public function lastInsertId()
    {
        return $this->getPDO()->lastInsertId();
    }
}