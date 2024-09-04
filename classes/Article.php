<?php
class Article
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Méthode pour récupérer tous les articles
    public function getAllArticles($page, $article_per_page)
    {
        $offset = ($page - 1) * $article_per_page;
        $query = "SELECT id, content, title, image, category, DATE_FORMAT(created_at, '%d - %m - %Y') AS formatted_date FROM posts ORDER BY created_at DESC LIMIT :offset, :limit";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $article_per_page, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function countArticles()
    {
        $sql = "SELECT COUNT(*) FROM posts";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchColumn();
    }

    public function countArticlesByCategories($category)
    {
        $sql = "SELECT COUNT(*) FROM posts WHERE category= :category";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }


    public function countArticlesBySearch($search)
    {
        $sql = "SELECT COUNT(*) FROM posts WHERE title LIKE :search";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    // Méthode pour récupérer tous les articles
    public function getAllArticlesByCategory($page, $article_per_page, $category)
    {
        $offset = ($page - 1) * $article_per_page;
        $query = "SELECT id, content, title, image, category, DATE_FORMAT(created_at, '%d - %m - %Y') AS formatted_date FROM posts WHERE category= :category ORDER BY created_at DESC LIMIT :offset, :limit";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $article_per_page, PDO::PARAM_INT);
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Méthode pour récupérer tous les articles
    public function getAllArticlesBySearch($page, $article_per_page, $search)
    {
        $offset = ($page - 1) * $article_per_page;
        $query = "SELECT id, content, title, image, category, DATE_FORMAT(created_at, '%d - %m - %Y') AS formatted_date FROM posts WHERE title LIKE :search ORDER BY created_at DESC LIMIT :offset, :limit";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $article_per_page, PDO::PARAM_INT);
        $stmt->bindValue(':search', '%' . $search . "%", PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Méthode pour récupérer un seul article
    public function getSingleArticle($id)
    {
        $query = "SELECT id, content, title, image, category, DATE_FORMAT(created_at, '%d - %m - %Y') AS formatted_date FROM posts WHERE id= :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
