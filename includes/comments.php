<?php
// Récupérer les données du formulaire et les mettre dans la BDD
require_once "includes/connexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $article_id = isset($_GET["id"]) ? (int)$_GET['id'] : 0;
    $name = isset($_POST["nom"]) ? trim($_POST["nom"]) : "";
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $comment = isset($_POST["comment"]) ? trim($_POST["comment"]) : "";

    // Validation basique des champs
    if (empty($name) || empty($email) || empty($comment)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        exit;
    }

    $comments = new Comments($db);
    // Ajouter le commentaire à la base de données
    if ($comments->addComments($article_id, $name, $email, $comment)) {
        echo "Commentaire ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du commentaire.";
    }
}
?>

<div class="comment-section">
    <h2>Les commentaires</h2>
    <div class="list-comments">
        <div class="comment">
            <p class="comment-author">Ecrit par: Julie</p>
            <p>J'adore ce que tu as écrit!</p>
            <i></i>
            <div class="separator"></div>
        </div>
    </div>

    <form action="" class="form-comment" id="form-comment" method="post">
        <input type="hidden" id="article_id" name="article_id" value="<?php echo $article_data['id'] ?>">
        <label for="email">Email:</label>
        <input class="input" type="email" id="email" name="email" />

        <label for="nom">Nom:</label>
        <input class="input" type="text" id="pseudo" name="nom" />

        <label for="comment">Commentaire:</label>
        <textarea
            class="input comment-input"
            id="comment"
            name="comment"
            rows="20"
            cols="50"></textarea>
        <input type="submit" class="btn" value="Commenter">
    </form>


</div>