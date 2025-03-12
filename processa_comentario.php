<?php

include_once __DIR__ . "/controllers/ComentarioController.php";

$id_post = $_POST['id-post'];
$nome = $_POST['nome'];
$comentario = $_POST['comentario'];

$modelComentario = new ComentarioController();
$comentar = $modelComentario->adicionarComentario($id_post, $nome, $comentario);

header('Location: post_details.php?post=' . $id_post);
exit;
