<?php
class Article
{
    private $table_name = "posts";
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Méthode pour récupérer tous les articles
    public function getAllArticles()
    {
        $query = "SELECT id, content, title, image, category, DATE_FORMAT(created_at, '%d - %m - %Y') AS formatted_date FROM " . $this->table_name . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Méthode pour récupérer un seul article
    public function getSingleArticle($id)
    {
        $query = "SELECT id, content, title, image, category, DATE_FORMAT(created_at, '%d - %m - %Y') AS formatted_date FROM " . $this->table_name . " WHERE id= :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
