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
    <title>Blog</title>
</head>

<body>

    <h1>Blog</h1>

    <ul>

        <?php foreach ($allPosts as $post) : ?>

            <li>Titulo: <?= $post['titulo'] ?></li>
            <li>Descrição: <?= $post['descricao'] ?> </li>
            <li>Categoria: <?= $post['categoria'] ?></li>
            <li>Autor: <?= $post['autor'] ?></li>
            <li>Data Publicação: <?= $post['data_publicacao'] ?></li>
            <hr>
        <?php endforeach; ?>

    </ul>

    <div>
        <a href="criar_post.php">Criar novo post.</a>
    </div>

</body>

</html>