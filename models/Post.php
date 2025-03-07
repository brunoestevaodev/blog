<?php

include_once __DIR__ . "/../includes/config.php";

class Post
{

    private $pdo;

    public function __construct()
    {
        global $pdo; // Usando a variável global $pdo
        $this->pdo = $pdo; // Atribui a conexão PDO ao objeto
    }

    // Buscar todos os posts
    public function getPosts()
    {
        try {
            $sql = "SELECT * FROM posts ORDER BY id DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Erro ao buscar posts: " . $e->getMessage();
            return [];
        }
    }

    // Inserir um post
    public function addPost($titulo, $descricao, $categoria_id, $autor_id)
    {
        try {
            $sql = "INSERT INTO posts(titulo, descricao, categoria_id, autor_id) VALUES(:titulo, :descricao, :categoria_id, :autor_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":titulo", $titulo);
            $stmt->bindValue(":descricao", $descricao);
            $stmt->bindValue(":categoria_id", $categoria_id, PDO::PARAM_INT);
            $stmt->bindValue(":autor_id", $autor_id, PDO::PARAM_INT);
            $stmt->execute();
            return "Post adicionado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }
}
