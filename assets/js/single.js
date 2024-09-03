//Affichage d'un article à l'aide d'ajax

document.addEventListener("DOMContentLoaded", () => {
  const singleArticle = document.querySelector(".single-article");

  //Récupère l'ID de l'article depuis l'URL
  const urlParams = new URLSearchParams(window.location.search);
  const articleID = urlParams.get("id");
  fetch(`get_single_article.php?id=${articleID}`)
    .then((response) => response.json())
    .then((data) => {
      if (data.error) {
        `<p>${data.error}</p>`;
      } else {
        //aficher l'article
        singleArticle.innerHTML = `
            <div class="img-container">
                <img src="${data.image}" alt="${data.title}" />
            </div>
            <h2>${data.title}</h2>
            <h3>${data.formatted_date}</h3>
            <div class="text-content">
                <p>
                    ${data.content}
                </p>
            </div>
        `;
      }
    });
});
