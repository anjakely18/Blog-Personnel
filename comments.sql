-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 05 sep. 2024 à 15:28
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mini_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `name`, `email`, `comment_text`, `created_at`) VALUES
(19, 6, 'Sophie Martin', 'sophie.martin@example.com', 'Cet article m\'a beaucoup aidé à comprendre les bienfaits de la méditation sur la santé mentale. J\'ai commencé à intégrer des séances de méditation dans ma routine quotidienne et je remarque déjà une réduction significative de mon stress. Merci pour ces conseils pratiques !', '2024-09-04 16:36:43'),
(20, 6, 'Julien Lefèvre', 'julien.lefevre@example.com', 'Je suis sceptique sur les effets de la méditation, mais après avoir lu cet article, je suis motivé à essayer sérieusement. La section sur la gestion de l\'anxiété m\'a particulièrement intéressé. Je vais commencer avec des séances courtes comme recommandé.', '2024-09-04 16:37:25'),
(21, 4, 'Marie Dupont', 'marie.dupont@example.com', 'Merci pour ces recettes faciles à suivre ! J\'ai essayé le Buddha Bowl au Poulet et Patate Douce, et c\'était délicieux. C\'est devenu un de mes plats préférés pour les repas de la semaine. Hâte d\'essayer les autres recettes !', '2024-09-04 16:38:43'),
(22, 1, 'Sophie Martin', 'sophie.martin@example.com', 'Quel bel hommage à votre pays ! Madagascar semble être un véritable joyau naturel et culturel. C\'est fascinant de voir comment la nature et les traditions se marient si harmonieusement sur cette île. Bravo pour cet article, il reflète bien l\'amour que vous portez à votre terre natale.', '2024-09-04 16:41:18');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_id` (`article_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
