<?php

include_once __DIR__ . "/controllers/PostController.php";
include_once __DIR__ . "/controllers/ComentarioController.php";

$id = $_GET['post'];

$postModel = new PostController();
$post = $postModel->buscarPost($id);

// Chamar o metodo para exibir comentário
$modelComentario = new ComentarioController();
$exibirComentario = $modelComentario->exibirComentarioPost($id);

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
        font-size: 2.5em !important;
    }

    .box-comentarios {
        padding: 50px 0;
    }

    .form-control {
        width: 100%;
        display: block;
        padding: 10px 6px;
        margin-bottom: 12px;
    }

    .label-control {
        margin-bottom: 10px;
        display: block;
    }

    .btn {
        padding: 12px 10px;
        background-color: #31005F;
        color: #fff;
        border: none;
        outline: #fff;
        border-radius: 6px;
        font-size: 1em;
    }

    .btn:hover {
        background-color: rgb(59, 24, 92);
        cursor: pointer;
    }

    /* Comentários */
    .container-comentarios {
        width: 70%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .container-comentarios div {
        background-color: #ffffff;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 8px;
        border-left: 4px solid #007bff;
        /* Destaque na lateral */
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
    }

    .container-comentarios p {
        margin: 5px 0;
    }

    .container-comentarios p:first-child {
        font-weight: bold;
        color: #007bff;
        font-size: 16px;
    }

    .container-comentarios p:last-child {
        font-size: 14px;
        color: #333;
        line-height: 1.4;
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
            <p style="font-weight:normal;font-size:1.1em;text-align:justify;line-height:32px;color:#444;letter-spacing: 0.01em;"><?= nl2br($post['descricao']) ?></p>
            <small>Categoria: <?= $post['categoria'] ?></small>
            <small>Autor: <?= $post['autor'] ?></small>
            <small>Data Publicação: <?= $post['data_publicacao'] ?></small>
        </div>
    </section>

    <!-- Comentários -->
    <section class="container-post box-comentarios">
        <form action="processa_comentario.php" method="POST">

            <div>
                <label class="label-control" for="nome">Nome</label>
                <input class="form-control" type="text" id="nome" name="nome" required>
            </div>

            <div>
                <label class="label-control" for="comentario">Comentário</label>
                <textarea class="form-control" name="comentario" id="comentario" rows="6" required></textarea>
            </div>

            <div>
                <input type="text" id="id-post" name="id-post" value=" <?php echo $id; ?> " hidden>
                <button class="btn" type="submit">Comentar</button>
            </div>

        </form>
    </section>

    <section class="container-comentarios">

        <h5 style="margin-bottom: 10px;">Total de comentários: <?php echo count($exibirComentario ?? []); ?></h5>

        <?php foreach ($exibirComentario as $comentario) : ?>

            <div>
                <p> <?php echo $comentario['nome'] ?> </p>
                <p> <?php echo $comentario['comentario'] ?> </p>
            </div>

        <?php endforeach; ?>
    </section>

</body>

</html>