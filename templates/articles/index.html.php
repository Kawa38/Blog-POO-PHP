
<?php //ANCHOR  Affichage liste articles- ?>

<!DOCTYPE html>
<html>
    <head>
    <section class="container">
        <h1 class="text-center text-primary">Nos articles</h1>
        <title>Article</title>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>

    <section class="row justify-content-between">
            <?php foreach ($articles as $article) : ?>
                <div class= "col-md-3 mb-3" >
                    <div class="card border-primary bg-light h-100 justify-content-between ">
                        <h2 class="card-header"><?= $article['title'] ?></h2>
                        <small class="small text-end fst-italic" >Ecrit le <?= $article['created_at'] ?></small>
                        <p div="card-body card-text"><?= $article['introduction'] ?></p>
                        <div class ="card-footer d-flex justify-content-between">
                            <a  class="btn btn-warning " href="delete-article.php?id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
                            <a class="btn btn-success " href="article.php?id=<?= $article['id'] ?>">Lire la suite</a>
                        </div>
                    </div> 
                </div> 
        <?php endforeach ?>
    </section>
</section>