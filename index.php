<?php
require_once("libraries/database.php");
require_once('libraries/utils.php');

//ANCHOR -  * CE FICHIER A POUR BUT D'AFFICHER LA PAGE D'ACCUEIL !
//Récupération des articles (integre la connection à la base de donnée)
 
$articles = findAllArticles();
/**
 * 3. Affichage
 */
//ANCHOR - Affichage de la page d'acceuil  via la fonction. Passer en paramètre tt les infos utile, ici sour la forme d'un tableau indexé

$pageTitle = "Accueil";

loadPageContent('articles/index', compact('articles'));

