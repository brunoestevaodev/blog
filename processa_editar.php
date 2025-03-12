<?php

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria_id'];
$autor = $_POST['autor_id'];
$postId = $_POST['post_id'];

include_once __DIR__ . "/controllers/PostController.php";

$post = new PostController();
$result = $post->editarPost($postId, $titulo, $descricao, $categoria, $autor);

echo $result;
