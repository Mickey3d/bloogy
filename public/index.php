<?php
// define application's root path
define ('ROOT', dirname(__DIR__));

// Application init
require ROOT . '/app/App.php';
App::load();


// Url parameters checking
if(isset($_GET['p'])){
     // setting $page variable if a page parameter exists ($_GET['p'])
    $page = $_GET['p'];
}else{
    // default page location if parameters are empty
    $page = 'posts.index';
}

/* DISPATCHER role: determine the path, finding the good controller and action to execute (function to call).
   The URL mask have the TWO following possibles masks :
   - path.controllerName.action e.g: admin.post.index
   - controllerName.action e.g: post.index
*/
$page = explode('.', $page);
if($page[0] == 'admin'){
    $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
}else{
    $action = $page[1];
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
}


// Create and execute the action of the called controller.
$controller = new $controller();
$controller->$action();

