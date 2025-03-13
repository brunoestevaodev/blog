<?php

include_once __DIR__ . "/controllers/PostController.php";

$posts = new PostController();
$allPosts = $posts->getAllPosts();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contents/css/style.css">
    <title>Blog</title>
</head>

<body>

    <div class="menu-topo"">
        <nav class=" container">
        <h1>Blog</h1>
        </nav>
    </div>

    <section class="container box-posts-feed">

        <?php foreach ($allPosts as $post) : ?>
            <div class="posts-feed" style="padding:40px 0;">
                <small style="background-color:<?= $post['color'] ?>;color:#fff; padding: 6px;"><?= $post['categoria'] ?></small>
                <h2 style="margin-top:10px;"><?= $post['titulo'] ?></h2>
                <p><?= substr($post['descricao'], 0, 200) . (strlen($post['descricao']) > 200 ? '...' : '') ?></p>
                <div style="margin: 20px 0;"><a href="post_details.php?post=<?= $post['id'] ?>">Leia mais</a></div>
                <div style="margin-bottom:10px;">
                    <small>Autor: <?= $post['autor'] ?></small><br>
                    <small>Data Publicação: <?= $post['data_publicacao'] ?></small>
                </div>
            </div>
        <?php endforeach; ?>

    </section>

    <div>
        <a href="criar_post.php">Criar novo post.</a>
    </div>

</body>

</html>