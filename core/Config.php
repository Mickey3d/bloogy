<?php

namespace Core;
/**
 * Class Config
 * @package App
*/

//  Class Config; this class manage the configuration parameters for the application

class Config {
    // $setting: this array contains all parameters
    private $settings = [];
    // $_instance: the instance of the class
    private static $_instance;
    
    // Singleton design pattern Implementation
    // parameter string $file: the file containing the parameters.
    // return Config $_instance
    public static function getInstance($file)
    {
        if(self::$_instance === null)
        {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }
    
    
    // Config builder
    // parameter string $file: the file containing the parameters.
    public function __construct($file)
    {
        $this->settings = require $file;
    }

    
    
     // return key's value: $key (or null if not set)
     // parameter string $key: the key to find in the array setting[]
     // return mixed|null
    public function get($key){
        if(!isset($this->settings[$key])){
            return null;
        }
        return $this->settings[$key];
    }

}

