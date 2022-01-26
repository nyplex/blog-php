<?php

use App\App;
use App\Table\Article;
use App\Table\Category;

$post = Article::find($_GET['id']);

App::setTitle($post->titre);

if($post === false)
{
    App::notFound();
}



?>

<h1><?= $post->titre; ?></h1>

<p><em><?= $post->categorie ?></em></p>

<p><?= $post->contenu; ?></p>