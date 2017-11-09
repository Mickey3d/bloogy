<?php
namespace Core\Entity;


 // Class Entity => mother class for all 'entity' class

class Entity{
    
     /**
     * Magic method __get is using to return the value key via the getter (getter must exist)
     * parameter $key
     * return => mixed
     */

    public function __get($key){
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

}