<?php
require_once "includes/connexion.php";
include_once "classes/Article.php";

// Nombre d'articles par page
$articles_per_page = 6;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$search = isset($_GET['search']) ? $_GET['search'] : '';


$article = new Article($db);
$articles = $article->getAllArticlesBySearch($page, $articles_per_page, $search);
$total_articles = $article->countArticlesBySearch($search);


$response = [
    'articles' => $articles,
    'page' => $page,
    'articles_per_page' => $articles_per_page,
    'total_articles' => (int)$total_articles,
    'total_pages' => ceil($total_articles / $articles_per_page),
    'search' => $search,
];

// Envoyer la réponse en JSON
header('Content-Type: application/json');
echo json_encode($response);
