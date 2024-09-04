//Vérification email
document
  .getElementById("form-comment")
  .addEventListener("submit", function (event) {
    const email = document.getElementById("email").value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const name = document.getElementById("pseudo").value.trim();
    const comment = document.getElementById("comment").value.trim();

    //S'assurer que rien n'est vide
    if (name === "" || email === "" || comment === "") {
      alert("Tous les champs sont obligatoires.");
      event.preventDefault();
      return;
    }

    // Vérification de la longueur du nom
    if (name.length < 3) {
      alert("Le nom doit comporter au moins 3 caractères.");
      event.preventDefault();
      return;
    }

    if (!emailPattern.test(email)) {
      alert("Veuillez entrer une adresse email valide.");
      event.preventDefault();
    }
  });
