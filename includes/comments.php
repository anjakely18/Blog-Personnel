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

        <!-- Message pour confirmer l'envoi du commentaire -->
        <p class="success"><?php echo htmlspecialchars($message); ?></p>
    </div>