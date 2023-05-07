<?php 
//ANCHOR - function permettant de mettre grace à ob_start et ob_get_clean le contenu d'un template dans un variable

function loadPageContent($articleTemplate,$variables=[]){
//je recupére les variables passées sous forme de tableau
extract($variables);
//j'ouvre la zone tampon
ob_start();
// j'appele mon template
// 'article/show'  pour  templates/article/show.html.php
require('templates/'. $articleTemplate.'.html.php');
// je charge le contenu du tampon dans la var page conntant
$pageContent = ob_get_clean();
//j'affiche le contenu dans le layout
require('templates/layout.html.php');

return $pageContent ;
};
?>