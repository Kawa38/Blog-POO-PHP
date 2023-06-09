<?php 


require_once("libraries/models/Model.php");

       // grace à extend Article hérite du constructor de Model ( et donc de l'initialisation de PDO)

Class Article extends Model {

    // l'initialisation de pdo est réalisé dans Model.php. Article en hérite car elle est extend de Model
    // private $pdo;

    // public function __construct(){
    //     $this->pdo = connectDataBase();
    // }

public function findAll() :array {
    // ouverture de la connection
        // query car pas de préparation nécessaire car pas de var passé )
    
        $resultats = $this->pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
    
        $articles = $resultats->fetchAll();
        return $articles;
    
}

public function findThe($id){

    $query = $this->pdo->prepare("SELECT * FROM articles WHERE id = :article_id");

    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute(['article_id' => $id]);

    $article = $query->fetch();
    return $article;
}

public function deleteThe($id){
    
    //Réelle suppression de l'article
  
    $query = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
    $query->execute(['id' => $id]);

}



}
