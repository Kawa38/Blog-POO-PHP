<?php
require_once("libraries/database.php");
require_once("libraries/utils.php");
require_once("libraries/models/Article.php");
require_once("libraries/models/Model.php");

//ANCHOR -  * CE FICHIER A POUR BUT D'AFFICHER LA PAGE D'ACCUEIL !

//instanciation de l'objet
$model= new Article;


//Récupération des articles 
$articles = $model->findAll();



//Affichage de la page d'acceuil  via une fonction gérant la mise en cache du template. Passer en paramètre tt les infos utile, ici sour la forme d'un tableau indexé

$pageTitle = "Accueil";

loadPageContent('articles/index', compact('articles'));

