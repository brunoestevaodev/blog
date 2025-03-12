<?php

include_once __DIR__ . "/../models/Comentario.php";

class ComentarioController
{

    private $modelComentario;

    public function __construct()
    {
        $this->modelComentario = new Comentario(); // Criando uma nova instância do Model
    }

    // Adicionar comentário
    public function adicionarComentario($id_post, $nome, $comentario)
    {
        if ($id_post == "" || $nome == "" || $comentario == "") {
            echo "Por favor, preencha todos os campos!";
            exit;
        }

        return $this->modelComentario->adicionarComentario($id_post, $nome, $comentario);
    }

    // Exibir comentários pelo id do post
    public function exibirComentarioPost($id_post)
    {
        // Obtém os comentários
        return $comentarios = $this->modelComentario->exibirComentarioPost($id_post);
    }
}
