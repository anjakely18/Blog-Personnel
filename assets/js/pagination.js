document.addEventListener("DOMContentLoaded", () => {
  const articlesContainer = document.querySelector(".list-articles");
  const pagination = document.querySelector(".pagination");

  let currentPage = 1;

  function loadArticles(page) {
    fetch(`get_articles.php?page=${page}`)
      .then((response) => response.json())
      .then((data) => {
        // Afficher les articles
        articlesContainer.innerHTML = data.articles
          .map(
            (article) => `
            <div class="article">
                <img src="${article.image}" alt="${article.title}" />
                <a href="single.php?id=${article.id}">
                    <h4>${article.title}</h4>
                </a>
                <i>${article.category}</i>
                <p>${article.formatted_date}</p>
            </div>
            `
          )
          .join("");

        // Afficher pagination
        let paginationHTML = "";
        for (let i = 1; i <= data.total_pages; i++) {
          // Inclure `total_pages` dans la boucle
          paginationHTML += `<a href="#" class="btn number-btn" data-page="${i}">${i}</a>`;
        }

        pagination.innerHTML = paginationHTML;
      })
      .catch((error) => console.error("Erreur:", error)); // Ajout d'un gestionnaire d'erreur
  }

  // Charger les articles de la première page
  loadArticles(currentPage);

  // Gestionnaire d'événements pour la pagination
  pagination.addEventListener("click", (event) => {
    if (event.target.classList.contains("number-btn")) {
      event.preventDefault();
      currentPage = parseInt(event.target.dataset.page);
      loadArticles(currentPage);
    }
  });
});
