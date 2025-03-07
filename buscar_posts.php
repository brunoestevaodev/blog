<?php

include_once __DIR__ . "/controllers/PostController.php";

$postController = new PostController();
$posts = $postController->getAllPosts();

// Respondendo com os posts em formato JSON
echo json_encode($posts);
