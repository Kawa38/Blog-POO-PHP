<?php
require_once("libraries/database.php");
require_once('libraries/utils.php');


/**
 * CE FICHIER DOIT ENREGISTRER UN NOUVEAU COMMENTAIRE ET REDIRIGER SUR L'ARTICLE !
 * 

//  Vérification 
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

/**
 * 2. Vérification que l'id de l'article pointe bien vers un article qui existe
 
 */
$article = finTheArticle($article_id);

// Si rien n'est revenu, on fait une erreur
if (!$article) {
    die("Ho ! L'article $article_id n'existe pas boloss !");
}

saveComments($author,$content,$article_id);

// 4. Redirection vers l'article en question :
header('Location: article.php?id=' . $article_id);
exit();
