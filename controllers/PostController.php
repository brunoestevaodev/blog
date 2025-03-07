<?php

include_once __DIR__ . "/../models/Post.php";

class PostController
{

    private $postModel;

    public function __construct()
    {
        $this->postModel = new Post();
    }

    // Buscar todos os posts
    public function getAllPosts()
    {
        return $this->postModel->getPosts();
    }

    // Iserir um post
    public function addPost($titulo, $descricao, $categoria_id, $autor_id)
    {
        return $this->postModel->addPost($titulo, $descricao, $categoria_id, $autor_id);
    }
}
