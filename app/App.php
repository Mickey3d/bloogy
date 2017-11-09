<?php

use Core\Config;
use Core\Database\MysqlDatabase;

 // Class App: perform the initialization of the application and main operations:
 // => create instance of database and table
 // => register the 'autoloaders'
 // => start session
  

class App{

    public $title = "Bloogy";
    private $db_instance;

    private static $_instance;

    // Singleton design pattern implementation
    public static function getInstance()
    {
        if(self::$_instance === null)
        {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    // start session and load the autoloader (which autoloads all the other classes)
    public static function load()
    {
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }
    
    // factory for table class
    // @param  string $name => required class name
    // @return \Core\Table\Table => table class
    public function getTable($name)
    {
        $class_name = 'App\\Table\\' . ucfirst($name) . 'Table' ;
        return new $class_name($this->getDb());
    }

    // factory for Mysqldatabase class
    // @return a PDO class
    public function getDb(){
        $config = Config::getInstance(ROOT . '/config/config.php');
        if($this->db_instance === null){
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

}