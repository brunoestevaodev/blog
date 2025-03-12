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
            $sql = "SELECT p.id, p.titulo, p.descricao, p.data_publicacao, a.nome AS autor, c.nome AS categoria 
            FROM posts p
            INNER JOIN autor a ON p.autor_id = a.id
            INNER JOIN categoria c ON p.categoria_id = c.id
            ORDER BY p.id DESC";
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

    // Deletar um post
    public function deletarPost($id)
    {

        try {
            $sql = "DELETE FROM posts WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":id", $id);
            return $stmt->execute();
        } catch (PDOException $erro) {
            echo "Erro ao deletar o post! " . $erro->getMessage();
        }
    }

    // Buscar um posts pelo id
    public function buscarPost($id)
    {
        try {

            $sql = "SELECT 
            p.id, 
            p.titulo, 
            p.descricao, 
            p.data_publicacao, 
            a.nome AS autor, 
            c.nome AS categoria 
        FROM posts p
        INNER JOIN autor a ON p.autor_id = a.id
        INNER JOIN categoria c ON p.categoria_id = c.id
        WHERE p.id = :id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            echo "Erro ao buscar os dados do post " . $erro->getMessage();
        }
    }

    // Editar post
    public function editarPost($id_post, $titulo, $descricao, $categoriaId, $autorId)
    {
        try {
            $sql = "UPDATE posts SET titulo = :titulo, descricao = :descricao, categoria_id = :categoria_id, autor_id = :autor_id WHERE id = :id_post";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':titulo', $titulo);
            $stmt->bindValue(':descricao', $descricao);
            $stmt->bindValue(':categoria_id', $categoriaId);
            $stmt->bindValue(':autor_id', $autorId);
            $stmt->bindValue(':id_post', $id_post);
            return $stmt->execute();
        } catch (PDOException $erro) {
            echo "Erro ao atualizar o post! " . $erro->getMessage();
        }
    }
}
