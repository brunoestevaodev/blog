<?php

include_once __DIR__ . "/controllers/PostController.php";

$id = $_GET['post'];

$postModel = new PostController();
$post = $postModel->buscarPost($id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contents/css/style.css">
    <title>Blog</title>
</head>

<style>
    .container-post {
        width: 70%;
        margin: 0 auto;
    }

    .text-titulo {
        width: 60%;
        font-size: 2.5em !important;
    }
</style>

<body>

    <div class="menu-topo">
        <nav class=" container">
            <a href="index.php" style="color:#fff;text-decoration:none;font-size:2.5rem;">Blog</a>
        </nav>
    </div>

    <section class="container-post">
        <div class="posts">
            <h2 class="text-titulo"><?= $post['titulo'] ?></h2>
            <p><?= nl2br($post['descricao']) ?></p>
            <small>Categoria: <?= $post['categoria'] ?></small>
            <small>Autor: <?= $post['autor'] ?></small>
            <small>Data Publicação: <?= $post['data_publicacao'] ?></small>
        </div>
    </section>


</body>

</html>