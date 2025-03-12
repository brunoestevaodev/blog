
<?php

include_once __DIR__ . "/../includes/config.php";

class Comentario
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Adicionar comentário
    public function adicionarComentario($idPost, $nome, $comentario)
    {
        try {
            $sql = "INSERT INTO comentarios(id_post, nome, comentario) VALUES(:id_post, :nome, :comentario)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":id_post", $idPost);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":comentario", $comentario);
            return $stmt->execute();
        } catch (PDOException $erro) {
            echo "Erro ao adicionar o comentário " . $erro->getMessage();
        }
    }

    // Exibir comentários de um post
    public function exibirComentarioPost($id_post)
    {
        try {
            $sql = "SELECT c.nome, c.comentario FROM comentarios c WHERE id_post = :id_post";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":id_post", $id_post);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            echo "Erro ao exibir os comentários " . $erro->getMessage();
        }
    }
}
