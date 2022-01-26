<?php
use App\Table\Article;
$data = Article::getLast();
?>

<div class="row">
    <div class="col-sm-8">
        <?php
    foreach($data as $post) {
    ?>

    <h2><a href="<?= $post->url ?>"><?= $post->titre ?></a></h2>
    <p><em><?= $post->categorie ?></em></p>

    <p><?= $post->extrait ?></p>

    <?php } ?>
    </div>
    <div class="col-sm-4">
        <ul>
        <?php foreach(\App\Table\Category::all() as $categorie): ?>
        <li><a href="<?= $categorie->url ?>"><?= $categorie->titre ?></a></li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>
