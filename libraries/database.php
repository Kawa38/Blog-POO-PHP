<?php 

 

function connectDataBase() {

       //ANCHOR - fonction de connection à la base de données
    // * 1. Connexion à la base de données avec PDO
    // * Attention, on précise ici deux options :
    // * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
    // * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
    // */
    $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', 'mysql', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
};


//ANCHOR - Fonctions qui gères les différentes demande à la base de données 

function findAllArticles() :array {

    // ouverture de la connection
    $pdo = connectDataBase();
    // query car pas de préparation nécessaire car pas de var passé )

    $resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');

    $articles = $resultats->fetchAll();
    return $articles;

}

function finCommentsOfTheArticle($id){

    /**
         * 2. Connexion à la base de données avec PDO
         * Attention, on précise ici deux options :
         * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
         * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
         * 
         * PS : Vous remarquez que ce sont les mêmes lignes que pour l'index.php ?!
         */

 
 $pdo = connectDataBase();

// Récupération des commentaires de l'article en question
// ne requête préparée pour sécuriser la donnée filée par l'utilisateur 

$query = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
$query->execute(['article_id' => $id]);
$commentaires = $query->fetchAll();
 return $commentaires;

 var_dump($commentaires);

};


function finTheArticle($id){
    $pdo = connectDataBase();

    /**
     * 3. Récupération de l'article en question
     * On va ici utiliser une requête préparée 
     *Attention, on précise ici deux options :
        * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
        * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs*/
    $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");

    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute(['article_id' => $id]);

    $article = $query->fetch();
    return $article;
};

function deleteTheArticle($id){
    $pdo = connectDataBase();
    
    //Réelle suppression de l'article
  
    $query = $pdo->prepare('DELETE FROM articles WHERE id = :id');
    $query->execute(['id' => $id]);

};

function findTheComment($id){
    
    $pdo = connectDataBase();
    $query = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);
    $commentaire = $query->fetch();

    return $commentaire;
}
    
function deleteTheComment($id){

    $pdo = connectDataBase();
    $query = $pdo->prepare('DELETE FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);
   
}

function saveComments ($author,$content,$article_id): void{
    
    $pdo = connectDataBase();
    $query = $pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');

    $query->execute(compact('author', 'content', 'article_id'));

}



?> 