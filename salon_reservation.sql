-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 mars 2026 à 16:48
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
-- Base de données : `salon_reservation`
--

-- --------------------------------------------------------

--
-- Structure de la table `disponibilites`
--

CREATE TABLE `disponibilites` (
  `id` int(11) NOT NULL,
  `jour_semaine` varchar(11) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `actif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `disponibilites`
--

INSERT INTO `disponibilites` (`id`, `jour_semaine`, `heure_debut`, `heure_fin`, `actif`) VALUES
(1, 'Lundi', '00:00:00', '00:00:00', 1),
(2, 'Mardi', '09:00:00', '18:00:00', 1),
(3, 'Mercredi', '09:00:00', '18:00:00', 1),
(4, 'Jeudi', '09:00:00', '18:00:00', 1),
(5, 'Vendredi', '09:20:00', '18:30:00', 1),
(6, 'Samedi', '10:30:00', '16:45:00', 1),
(7, 'Dimanche', '12:00:00', '18:30:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `date_rdv` date NOT NULL,
  `heure_rdv` time NOT NULL,
  `nom_client` varchar(100) NOT NULL,
  `email_client` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `statut` varchar(20) DEFAULT 'confirme'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `service_id`, `date_rdv`, `heure_rdv`, `nom_client`, `email_client`, `telephone`, `statut`) VALUES
(1, 1, '0245-04-21', '13:00:00', 'Mus Mus', 'nnn@ity.com', '22454', 'confirme'),
(2, 3, '0245-04-21', '13:00:00', 'Mus Mus', 'nnn@ity.com', '22454', 'confirme'),
(3, 3, '0245-04-21', '17:00:00', 'Mus Mus', 'nnn@ity.com', '22454', 'confirme'),
(4, 3, '2222-04-21', '17:00:00', 'Mus Mus', 'nnn@ity.com', '22454', 'confirme');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `duree` varchar(11) NOT NULL,
  `prix_euros` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `nom`, `description`, `duree`, `prix_euros`) VALUES
(1, 'Coupe homme', 'Coupe simple', '30 minutes', 25.00),
(2, 'Coupe femme', 'Coupe + brushing', '1 heure', 38.00),
(3, 'Barbe', 'Taille barbe', '20 minutes', 10.00),
(5, 'Coloration + mèches', 'Coloration avec mèches ', '2 à 2h30', 85.00);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `disponibilites`
--
ALTER TABLE `disponibilites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
