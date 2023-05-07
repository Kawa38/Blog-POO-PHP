<?php
require_once("libraries/database.php");
require_once('libraries/utils.php');


require_once("libraries/models/Article.php");
require_once("libraries/models/Comment.php");
 // instanciation des objets
$model_article = new Article;
$model_comment = new Comment;



// * CE FICHIER DOIT ENREGISTRER UN NOUVEAU COMMENTAIRE ET REDIRIGER SUR L'ARTICLE !

//Vérification 
        $author = null;
        if (!empty($_POST['author'])) {
            $author = $_POST['author'];
        }

        $content = null;
        if (!empty($_POST['content'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $content = htmlspecialchars($_POST['content']);
        }

        $article_id = null;
        if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) {
            $article_id = $_POST['article_id'];
        }

        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)

        if (!$author || !$article_id || !$content) {
            die("Votre formulaire a été mal rempli !");
        }


 // Vérification que l'id de l'article pointe bien vers un article qui existe
 
$article = $model_article->findThe($article_id);

// Si rien n'est revenu, on fait une erreur
if (!$article) {
    die("Ho ! L'article $article_id n'existe pas boloss !");
}

$model_comment->save($author,$content,$article_id);

// 4. Redirection vers l'article en question :
header('Location: article.php?id=' . $article_id);
exit();
