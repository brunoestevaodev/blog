<?php

include_once __DIR__ . "/controllers/PostController.php";

$id = $_POST['id'];

if ($id == "") {
    echo "Por favor, informar o id do post!";
    exit;
}

$post = new PostController();
$deletarPost = $post->deletarPost($id);

if ($deletarPost) {
    echo "Post deletado com sucesso!";
} else {
    echo "Post não encontrado!";
}
