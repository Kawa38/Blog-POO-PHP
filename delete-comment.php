<?php
require_once("libraries/database.php");
require_once('libraries/utils.php');
require_once("libraries/models/Comment.php");

 // instanciation des objets
$model = new Comment;

// Récupération du paramètre "id" en GET
if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ! Fallait préciser le paramètre id en GET !");
}
$id = $_GET['id'];


// vérifer que l'id correspond à un commentaire existant en base de donnée 
$comment = $model -> findThe($id);
if (!$comment) {
    die("Aucun commentaire n'a l'identifiant $id !");}

// récupérer l'id de l'aticle pour retour sur la page artile 
$article_id = $comment['article_id'];

// supprimer le commentaire
$model->deleteThe($id);

//  Redirection vers l'article en question
header("Location: article.php?id=" . $article_id);
exit();
