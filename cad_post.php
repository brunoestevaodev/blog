<?php

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria_id'];
$autor = $_POST['autor_id'];

include_once __DIR__ . "/controllers/PostController.php";

$newPost = new PostController();
$addPost = $newPost->addPost($titulo, $descricao, $categoria, $autor);


if ($addPost) {
    echo "Post cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o post.";
}
