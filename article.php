<?php
require_once("libraries/database.php");
require_once('libraries/utils.php');
require_once("libraries/models/Article.php");
require_once("libraries/models/Comment.php");
/**
 * CE FICHIER AFFICHE UN ARTICLE ET SES COMMENTAIRES ! */
 // instanciation des objets
$model_article = new Article;
$model_comment = new Comment;
 
//1. Récupération du param "id" et vérification de celui-ci

// On part du principe qu'on ne possède pas de param "id"
$article_id = null;

// Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $article_id = $_GET['id'];
}

// On peut désormais décider : erreur ou pas ?!
if (!$article_id) {
    die("Vous devez préciser un paramètre `id` dans l'URL !");
}

// récupérer les datas
$article =$model_article -> findThe($article_id);
$commentaires = $model_comment -> findAllFromArticle($article_id);

// afficher 
$pageTitle = $article['title'];
    // affiche le contenu via layout et le teamplate show.html.php
    // la fonction compact permet de passer sous forme de tableau associatif les variables pageTitle= $pageTitle.
    // pageTille = un chaine de caractère, article_Id=integer et article et commentaire sont le resultat de la requete ( tableau associatif!)
    
loadPageContent('articles/show', compact('pageTitle','article','commentaires','article_id'));



