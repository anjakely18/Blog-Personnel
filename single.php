<?php
include "includes/connexion.php";
//----------------------Afficher les articles -------------
// Récupérer l'ID depuis la requête GET
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

//instanciation de article
$article = new Article($db);
$article_data = $article->getSingleArticle($id);

//Vérification si l'article existe
if (!$article_data) {
  header("Location: error.php");
}
?>








<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php $article_data['title'] ?></title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/single.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Josefin+Slab:ital,wght@0,100..700;1,100..700&family=Lora:ital,wght@0,400..700;1,400..700&family=Varela+Round&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>



<!-- HEADER -->
<?php include_once('includes/header.php'); ?>
<main>
  <!-- SECTION ARTICLE -->
  <?php include_once('includes/article.php'); ?>


  <!-- SECTION COMMENTAIRE -->
  <?php include_once('includes/comments.php'); ?>
</main>

<!-- FOOTER -->
<?php include_once('includes/footer.php');
?>