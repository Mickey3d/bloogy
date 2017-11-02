<?php

namespace App\Controller;

use Core\Controller\Controller;

/**
 * Class ReportController -> controller for ReportEntity
 */
class ReportsController extends AppController{

    public function __construct(){
		
        parent::__construct();
		
        $this->loadModel('Report');
        $this->loadModel('comment');
    }

    /**
     * Add a report 
     */
    public function add(){
        
        $commentId = $_GET['commentId'];
        
        $comment = $this->comment->find($commentId);
        
        $authorId = $comment->userID;
		
		$res = $this->Report->add($commentId, $authorId);
		
		if ($res){
			//If success refresh the data via the method show of the controller
			$post = new PostsController;
			$post->show();
		} else {
			$texte = 'une erreur est survenue lors de l\'exécution de la requete.
			-> fonction ReportsController.add';
			\App::error($texte);	
		}		
	}

    /**
     * Cancel the report for the comment
     */
	public function cancel(){
		
		// todo gestion de l'erreur eventuelle de la requete avec un catch.
		$res = $this->Report->cancel($_GET['reportId']);

		if ($res){
			$pc = new \App\Controller\PostsController;				
			$pc->show();
		} else {
			$texte = 'une erreur est survenue lors de l\'exécution de la requete.
			dans la fonction ReportsController.delete';
			\App::error($texte);	
		}
	}
}