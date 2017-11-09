<?php

namespace Core\Controller;

 // Class Controller => mother class for all controllers

class Controller{

    // @var string $viewPath: main directory for the view.
    protected $viewPath;

    // @var string $template: view's template
    protected $template;

    //this function is in charge to display data => @param string $view the name and path of the view file.
    //                                           => @param array $variables all variables needed by the view.
    protected function render($view, $variables = []) 
    {

        // start buffering
        ob_start();

        // extract variables from the array
        extract($variables);

        // require the view
        require($this->viewPath . str_replace('.', '/', $view) . '.php');

        // put the buffer in $content ($content is used in the template below).
        $content = ob_get_clean();		

        // require the template for the final display
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    // Forbidden action
    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Accès interdit');
    }

    // page not found
    protected function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

}