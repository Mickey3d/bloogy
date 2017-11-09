<?php
namespace Core\Table;
use Core\Database\Database;


// Class Table => mother class for all 'table' class

class Table{
    
    // @var string $table: name of the table in the database
    protected $table;
    
    // @var Database $db: the database object. (from Core\Database\Database)
    protected $db;
    
    // Table builder
     // @param Database $db (control is $db is Database instance)
    public function __construct(Database $db)
    {
        $this->db = $db;        
        if($this->table === null)
        {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }

    
    // Return all row from the table
    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->table);
    }

     // return a row with a specific id => @param int $id the id of the row wanted
    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id=?", [$id], true);
        // @return a Instance of Entity class (or sub class of Entity) or false in case of failure.
    }

    
     // Update the row identified by the id => @param int $id the row id to update
    public function update($id, $fields) // => @param Array $fields the fields to update
    {
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
        $sql_parts[] = "$k = ?";
        $attributes[] = $v; 
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
        // @return boolean return the result of the query
    }
    
    // Create a new row in the table => @param Array $fields the fields and its values.
    public function create($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
        $sql_parts[] = "$k = ?";
        $attributes[] = $v; 
        }
        $sql_part = implode(', ', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
        // @return boolean return the result of the query.
    }

    // delete the row identified by the id => @param int $id the row id to delete
    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id=?", [$id], true);
        // @return boolean return the result of the query.
    }
    
    // extract from a rows a pair key value => @param string $key / @param string $value
    public function extract($key, $value)
    {
        $records = $this->all();
        $return = [];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
        // @return array
    }


     // Execute prepare function from MysqlDatabase if there is attributes else query function is executed => 
     // @param string $stmt the SQL query/ @param string $attr the attributes of the SQL query / @param bool $one type of fetch (one if $one is true else all)
     public function query($stmt, $attr = null, $one = false)
     {
        if($attr)
        {
            return $this->db->prepare(
                $stmt,
                $attr,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }else
        {
            return $this->db->query(
                $stmt,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }
    


}