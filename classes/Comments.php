<?php
class Comments
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    //AJOUTER LES COMMENTAIRES DANS LA BDD
    public function addComments($article_id, $name, $email, $comment_text)
    {
        $query = "INSERT INTO comments (article_id, name, email, comment_text) values (:article_id, :name, :email, :comment_text)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":article_id", $article_id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":comment_text", $comment_text, PDO::PARAM_STR);
        return $stmt->execute();
    }


    //AFFICHER LES COMMENTAIRES
    public function getComments(int $id)
    {
        $query = "SELECT * FROM comments WHERE article_id = :id ORDER BY created_at";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
