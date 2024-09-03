<?php
require_once "includes/connexion.php";
//----------------------Afficher l'article -------------
// Récupérer l'ID depuis la requête GET
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

//instanciation de article
$article = new Article($db);
$article_data = $article->getSingleArticle($id);

//Vérification si l'article existe
if (!$article_data) {
    header("Location: error.php");
}

header('Content-Type: application/json');
echo json_encode($article_data);
