# Mon Blog PHP

Bienvenue dans mon projet de blog développé en PHP ! Ce projet est conçu pour permettre la création, la gestion et la visualisation d'articles de blog. Il prend en charge plusieurs fonctionnalités comme la publication d'articles, les commentaires, et bien plus encore.

## Fonctionnalités

- **Création d'articles** : J'ai créé mes articles à l'aide de ma base de donnée
- **Commentaires** : Les utilisateurs peuvent commenter les articles.
- **Catégories d'articles** : Classez les articles par catégorie.
- **Recherche** : Recherchez des articles par titre ou contenu.
- **Interface responsive** : Le blog s'adapte aux différentes tailles d'écran.

## Prérequis

Pour faire fonctionner ce projet, vous aurez besoin de :

- **PHP** : Version 7.4 ou supérieure
- **MySQL** : Base de données pour stocker les articles, les utilisateurs et les commentaires
- **Serveur Web** : Apache, Nginx, ou un serveur local comme XAMPP

## Contraintes du site

- Le site doit être responsive (s'adapter à la taille des écrans smartphone -> desktop).
- Vous devrez avoir un formulaire qui utilisera la méthode GET & un formulaire qui utilisera la méthode POST. **TOUS** les formulaire devront avoir une vérification avant envoi avec JS.
- Vous devrez avoir au moins un appel AJAX sur le site => proposition d'avoir un bouton "Voir plus de projet" sur la page d'accueil.
- La gestion de la base de donnée devra se faire via des class PHP~~.~~
- Utilisation de PDO **obligatoire** pour la connexion à la bdd.