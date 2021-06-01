-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 02 juin 2021 à 00:18
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `systeme_location`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id` int(11) NOT NULL,
  `titre` varchar(5000) NOT NULL,
  `adresse` varchar(5000) NOT NULL,
  `prix` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `carac` varchar(10000) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `categorie` varchar(255) NOT NULL,
  `login_createur` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT '2002-02-27'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id`, `titre`, `adresse`, `prix`, `image`, `carac`, `departement`, `type`, `status`, `categorie`, `login_createur`, `telephone`, `date`) VALUES
(2, ' Besoin d un appartement ', '  ', 25000, ' images/depositphotos_8987777-stock-photo-3d-house.jpg', 'Cette maison possÃ¨de  3 chambres , 1 salons, 2 salle de bain, possÃ¨de une surface de 500 mÂ², possÃ¨de au moins un garage.', '', 'Ã€ louer', 0, 'demande', 'fawaz', 0, '2021-05-27'),
(18, 'Villa a louer dans a Cotonou', 'Proche de l Ã©toile rouge', 30000, 'images/0bjfr6mj63uqafribaba.jpg', 'Cette maison possÃ¨de  3 chambres , 1 salons, 2 salle de bain, possÃ¨de une surface de 500 mÂ², possÃ¨de au moins un garage.', '', 'Ã€ louer', 1, 'offre', 'admin', 95661715, '0000-00-00'),
(19, 'Villa a louer dans a Cotonou', 'Proche de l Ã©toile rouge', 30000, 'images/0bjfr6mj63uqafribaba.jpg', 'Cette maison possÃ¨de  3 chambres , 1 salons, 2 salle de bain, possÃ¨de une surface de 500 mÂ², possÃ¨de au moins un garage.', '', 'Ã€ louer', 1, 'offre', 'admin', 90049109, '0000-00-00'),
(20, 'Villa a louer dans a Ouidah', 'Proche de l Ã©cole Mandela', 20000, 'images/0bjfroftohvhafribaba.jpg', 'Cette maison possÃ¨de  3 chambres , 1 salons, 2 salle de bain, possÃ¨de une surface de 300 mÂ², possÃ¨de au moins un jardin.', '', 'Ã€ louer', 0, 'offre', 'fawaz', 95661715, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `login` varchar(50) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(11) NOT NULL DEFAULT '0',
  `image` varchar(500) NOT NULL DEFAULT 'images/compte-utilisateur-1.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`login`, `nom`, `prenom`, `password`, `email`, `telephone`, `image`) VALUES
('admin', 'admin', 'admin', 'banikanny', 'boukarifawas27@gmail.com', '90049109', ''),
('Bio', 'BOUKARY', 'Faical', '2222', 'bio@gmail.com', '97880419', 'images/profils/Fate Series2020_10_26_17_06_23.jpg'),
('fawaz', 'CHABI', 'Fawaz', '123456789', 'fawaz.chabi@imsp-uac.org', '95661715', ''),
('Mike', 'ODJO', 'Mike', '987654', 'odjo.mike@imsp-uac.org', '91662902', ''),
('ruchdane', 'AMADOU', 'Ruchdane', '1111', 'ruchdane.amadou@imsp-uac.org', '61136456', 'images/Dragon Ball2020_10_26_17_02_04.jpg'),
('Waris', 'CHABI', 'Waris', '123456', 'waris@imsp-uac.org', '95494975', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
