<?php


require_once("libraries/models/Model.php");

       // grace à extend Article hérite du constructor de Model ( et donc de l'initialisation de PDO)
class Comment extends Model 
{ 

    // private $pdo;
    
    // public function __construct()
    // {
    //     $this->pdo = connectDataBase();
    // }

public function findAllFromArticle($id): array{

    /**
         * 2. Connexion à la base de données avec PDO
         * Attention, on précise ici deux options :
         * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
         * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
         * 
         * PS : Vous remarquez que ce sont les mêmes lignes que pour l'index.php ?!
         */

 
    // Récupération des commentaires de l'article en question
    // ne requête préparée pour sécuriser la donnée filée par l'utilisateur 

    $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
    $query->execute(['article_id' => $id]);
    $commentaires = $query->fetchAll();
    return $commentaires;

    var_dump($commentaires);

}

public function findThe($id){
    
    $this->pdo = connectDataBase();
    $query = $this->pdo->prepare('SELECT * FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);
    $commentaire = $query->fetch();

    return $commentaire;
}
    
public function deleteThe(int $id):void{

    $this->pdo = connectDataBase();
    $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);
   
}

public function save (string $author,string $content,int $article_id): void{
    
    $this->pdo = connectDataBase();
    $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');

    $query->execute(compact('author', 'content', 'article_id'));

}
}
