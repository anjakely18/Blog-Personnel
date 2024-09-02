<?php

require_once "includes/connexion.php";
include_once "classes/Article.php";

// Nombre d'articles par page
$articles_per_page = 6;

// Numéro de la page actuelle
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$article = new Article($db);
$articles = $article->getAllArticles($page, $articles_per_page);
$total_articles = $article->countArticles();


$response = [
    'articles' => $articles,
    'page' => $page,
    'articles_per_page' => $articles_per_page,
    'total_articles' => (int)$total_articles,
    'total_pages' => ceil($total_articles / $articles_per_page),
];

// Envoyer la réponse en JSON
header('Content-Type: application/json');
echo json_encode($response);
