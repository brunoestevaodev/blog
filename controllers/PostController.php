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

    // Deletar Post
    public function deletarPost($id)
    {
        return $this->postModel->deletarPost($id);
    }

    // Buscar post pelo id
    public function buscarPost($id)
    {
        return $this->postModel->buscarPost($id);
    }

    public function editarPost($id_post, $titulo, $descricao, $categoria_id, $autor_id)
    {
        try {
            $resultado = $this->postModel->editarPost($id_post, $titulo, $descricao, $categoria_id, $autor_id);

            if ($resultado) {
                return "Post editado com sucesso!";
            } else {
                return "Falha ao editar o post.";
            }
        } catch (Exception $erro) {
            return "Erro ao editar o post: " . $erro->getMessage();
        }
    }
}
