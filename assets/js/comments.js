document.addEventListener("DOMContentLoaded", () => {
  const listComments = document.querySelector(".list-comments");
  const urlParam = new URLSearchParams(window.location.search);
  const id = urlParam.get("id");

  // Assurez-vous que l'ID est valide
  if (!id) {
    listComments.innerHTML = "<p>ID de l'article invalide.</p>";
    return;
  }

  fetch(`get_comments.php?id=${id}`)
    .then((response) => response.json())
    .then((data) => {
      if (data.error) {
        listComments.innerHTML = `<p>${data.error}</p>`;
      } else {
        // Initialiser la variable commentsHtml
        let commentsHtml = "";

        data.forEach((comment) => {
          // Utiliser forEach avec un E majuscule
          commentsHtml += `
            <div class="comment">
                <p class="comment-author">Écrit par: ${comment.name}</p>
                <p>${comment.comment_text}</p>
                <i>${comment.created_at}</i>
                <div class="separator"></div>
            </div>
          `;
        });

        listComments.innerHTML = commentsHtml;
      }
    })
    .catch((error) => {
      // Gestion des erreurs de la requête fetch
      listComments.innerHTML = `<p>Erreur lors de la récupération des commentaires: ${error.message}</p>`;
    });
});
