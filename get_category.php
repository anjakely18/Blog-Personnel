<?php
//Fichier ajax pour récupérer les articles ayant une catégorie particulière


require_once "includes/connexion.php";
include_once "classes/Article.php";

// Nombre d'articles par page
$articles_per_page = 6;

// Numéro de la page actuelle
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$category = isset($_GET['category']) ? $_GET['category'] : "";

$article = new Article($db);
$articles = $article->getAllArticlesByCategory($page, $articles_per_page, $category);
$total_articles = $article->countArticlesByCategories($category);


$response = [
    'articles' => $articles,
    'page' => $page,
    'articles_per_page' => $articles_per_page,
    'total_articles' => (int)$total_articles,
    'total_pages' => ceil($total_articles / $articles_per_page),
    'category' => $category,
];

// Envoyer la réponse en JSON
header('Content-Type: application/json');
echo json_encode($response);
