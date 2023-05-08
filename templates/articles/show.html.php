<?php //ANCHOR - Affichage des articles ?>
<section class="container">

<section class="card border-primar m-md-3">
    <h1 class="text-center text-primary"><?= $article['title'] ?></h1>
    <small class="small text-end fst-italic" >Ecrit le <?= $article['created_at'] ?></small>
    <p><?= $article['introduction'] ?></p>
    <hr>
    <?= $article['content'] ?>
</section>

<section class="card border-primar m-md-3">
    <?php if (count($commentaires) === 0) : ?>
        <h2 class="text-primary">Il n'y a pas encore de commentaires pour cet article ... SOYEZ LE PREMIER ! :D</h2>
    <?php else : ?>
        <div class="card border-primar m-md-3">
            <h2 class="text-primary">Il y a déjà <?= count($commentaires) ?> réactions : </h2>
            <?php foreach ($commentaires as $commentaire) : ?>
                <div class="card border-primar ">
                    <h3 class="text-end">Commentaire de <?= $commentaire['author'] ?></h3>
                    <small class="text-end" >Le <?= $commentaire['created_at'] ?></small>
                    <blockquote >
                        <em><?= $commentaire['content'] ?></em>
                    </blockquote>
                    <a class="btn btn-warning w-25" href="delete-comment.php?id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a>

                <?php endforeach ?>
    <?php endif ?>
</section>

<section class=" m-md-3 row justify-content-center" >
    <form class="col-md-6 ">
        <h3 class="text-center text-primary">Vous voulez réagir ? N'hésitez pas! !</h3>
        <div >
            <input class="form-control" type="text" name="author" placeholder="Votre pseudo !">
            <textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>
                <div class="flex ">
                    <input class="form-control" type="hidden" name="article_id" value="<?= $article_id ?>">
                    <button class="btn btn-info ">Commenter !</button>
                </div>
        </div>
    </form>
</section>
</section>