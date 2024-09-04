document.addEventListener("DOMContentLoaded", () => {
  const articlesContainer = document.querySelector(".list-articles");
  const pagination = document.querySelector(".pagination");
  const categoryLinks = document.querySelectorAll(".categories-list a");
  const title = document.querySelector(".title");
  const searchForm = document.getElementById("searchForm");
  const searchInput = document.getElementById("searchInput");

  let currentPage = 1;
  let selectedCategory = null; // Variable pour stocker la catégorie sélectionnée
  let search = "";

  function loadArticles(page) {
    fetch(`get_articles.php?page=${page}`)
      .then((response) => response.json())
      .then((data) => {
        // Afficher les articles
        title.innerHTML = "Mes articles";
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
          paginationHTML += `<a href="#" class="btn number-btn" data-page="${i}">${i}</a>`;
        }

        pagination.innerHTML = paginationHTML;
      })
      .catch((error) => console.error("Erreur:", error));
  }

  function loadArticlesByCategory(page, category) {
    fetch(
      `get_category.php?page=${page}&category=${encodeURIComponent(category)}`
    )
      .then((response) => response.json())
      .then((data) => {
        // Afficher les articles
        title.innerHTML = `Catégorie: ${category}`;
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
          paginationHTML += `<a href="#" class="btn number-btn" data-page="${i}">${i}</a>`;
        }

        pagination.innerHTML = paginationHTML;
      })
      .catch((error) => console.error("Erreur:", error));
  }

  function loadArticlesBySearch(page, search) {
    fetch(
      `search_articles.php?page=${page}&search=${encodeURIComponent(search)}`
    )
      .then((response) => response.json())
      .then((data) => {
        // Afficher les articles
        title.innerHTML = search
          ? `Résultats de recherche pour: "${search}"`
          : "Mes articles";
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
          paginationHTML += `<a href="#" class="btn number-btn" data-page="${i}">${i}</a>`;
        }

        pagination.innerHTML = paginationHTML;
      })
      .catch((error) => console.error("Erreur:", error));
  }

  // Charger les articles de la première page
  loadArticles(currentPage);

  // Gestionnaire d'événement pour la catégorie
  categoryLinks.forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault();

      selectedCategory = this.textContent.trim(); // Stocker la catégorie sélectionnée
      search = ""; // Réinitialiser la recherche
      currentPage = 1; // Réinitialiser à la première page
      loadArticlesByCategory(currentPage, selectedCategory);
    });
  });

  // Gestionnaire d'événement pour la recherche
  searchForm.addEventListener("submit", (e) => {
    e.preventDefault(); // Empêcher la soumission normale du formulaire
    search = searchInput.value.trim();
    selectedCategory = null; // Réinitialiser la catégorie sélectionnée
    currentPage = 1;
    loadArticlesBySearch(currentPage, search);
  });

  // Gestionnaire d'événements pour la pagination
  pagination.addEventListener("click", (event) => {
    if (event.target.classList.contains("number-btn")) {
      event.preventDefault();
      currentPage = parseInt(event.target.dataset.page);

      // Charger les articles selon la catégorie ou la recherche
      if (selectedCategory) {
        loadArticlesByCategory(currentPage, selectedCategory);
      } else if (search) {
        loadArticlesBySearch(currentPage, search);
      } else {
        loadArticles(currentPage);
      }
    }
  });
});
