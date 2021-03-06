<?php
namespace App\Table;


use Core\Table\Table;

class PostTable extends Table {

    protected $table = 'articles';

    /**
     * Récupere les derniers articles
     * @return array
     */
    public function last(){
        return $this->query("
            SELECT articles.id AS postId, articles.titre, articles.contenu, articles.date, categories.titre as categorie, articles.pictureUrl
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            ORDER BY articles.date DESC
        ");
    }
    
    
        /**
     *
     * @param $order way for the order by (ASC or DESC)
     *
     * @return array of PostEntity
     */
    public function getAllSelectedPost($order = 'DESC', $limit, $offset){

        $limit = $limit;
        $offset = $offset;
        $orderLimit = " ".$order. " LIMIT ".$limit. ",".$offset ;
        $sql = "SELECT articles.id AS postId, articles.titre, articles.contenu, articles.date, categories.titre as categorie, articles.pictureUrl
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            ORDER BY articles.date " .$orderLimit ;
        return $this->query($sql);
    }
    
    public function getAllPost(){

        $sql = "SELECT *
            FROM articles";
        return $this->query($sql);
    }
    
    public function getAllPostByCategory($category_id){

        return $this->query("SELECT articles.id AS postId, articles.titre, articles.contenu, articles.date, categories.titre as categorie, articles.pictureUrl
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            WHERE articles.category_id = ?", [$category_id], false);
    }

    /**
     * Récupere les derniers articles de la catégorie demandée
     * @param $category_id int
     * @return array
     */
    public function lastByCategory($category_id, $order = 'DESC', $limit, $offset){
        
        $limit = $limit;
        $offset = $offset;
        $orderLimit = " ".$order. " LIMIT ".$limit. ",".$offset ;
        
        return $this->query("SELECT articles.id AS postId, articles.titre, articles.contenu, articles.date, categories.titre as categorie, articles.pictureUrl
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            WHERE articles.category_id = ?
            ORDER BY articles.date " . $orderLimit , [$category_id]);
    }

    /**
     * Récupere un article en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function findWithCategory($id){
        return $this->query("
            SELECT articles.id AS postId, articles.titre, articles.contenu, articles.date, categories.titre as categorie, articles.pictureUrl
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            WHERE articles.id = ?
        ", [$id], true);
    }
    
    /**
     * Get a specific post from the database
     *
	 * @param $id int the id of the row
     * @return \App\Entity\PostEntity or null if not found
     */
    public function find($id){
		return $this->query("		
		SELECT *
		FROM articles            
		WHERE id = ?", [$id], true);		
    }
    

/**
     * Get the totaal of post in the database
     * @return a count
     */
    public function postsCount(){
		return $this->query("		
		SELECT COUNT(*) AS nbrOfPosts
		FROM articles");		
    }
    
}