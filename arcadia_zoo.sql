-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 27 oct. 2024 à 20:00
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
-- Base de données : `arcadia_zoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `race` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(30) DEFAULT NULL,
  `habitat_id` int(11) NOT NULL,
  `visualiser` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`id`, `prenom`, `race`, `image`, `slug`, `habitat_id`, `visualiser`) VALUES
(1, 'Leo', 'Lion', 'lion.jpg', 'lion', 1, 0),
(2, 'Zara', 'Zèbre', 'zebre.jpg', 'zebre', 1, 3),
(3, 'Raja', 'Tigre du Bengale', 'tigre.jpg', 'tigre', 2, 0),
(4, 'Luna', 'Panthère noire', 'panthere.png', 'panthere', 2, 1),
(5, 'Nemo', 'Crocodile du Nil', 'croco.jpg', 'croco', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `commentaire` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `est_valide` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `pseudo`, `commentaire`, `date_creation`, `est_valide`) VALUES
(1, 'Saul Goodman', 'J’ai adoré ma journée au zoo Arcadia. Les animaux\r\n                        sont magnifiques, et l’application web permet de tout\r\n                        savoir sur eux en temps réel, ce qui rend la visite\r\n                        super interactive. Le cadre est splendide, et on sent\r\n                        que tout est pensé pour respecter la nature. Mention\r\n                        spéciale pour les vétérinaires qui veillent\r\n                        constamment sur les animaux !', '2024-10-26 10:02:21', 1),
(2, 'Sara Wilsson', 'Le zoo Arcadia est un vrai bijou en Bretagne ! J’ai\r\n                        été impressionnée par la diversité des animaux et par\r\n                        l’approche écologique du parc. Les enfants ont adoré\r\n                        la visite guidée en petit train, et nous avons tous\r\n                        appris beaucoup de choses. Le personnel est\r\n                        accueillant et toujours prêt à répondre aux questions.\r\n                        Une sortie idéale pour les familles !', '2024-10-26 10:02:21', 1),
(3, 'Matt Brandon', 'Une expérience incroyable au zoo Arcadia ! Les\r\n                        habitats sont si bien recréés que l’on se croirait\r\n                        vraiment en pleine savane ou jungle. On sent que les\r\n                        animaux sont bien traités et en bonne santé, ce qui\r\n                        rend la visite encore plus agréable. L’engagement\r\n                        écologique du parc est admirable. Un endroit à visiter\r\n                        absolument !', '2024-10-26 10:02:21', 0),
(4, 'Olivier Gobou', 'Mon avis est mitigé', '2024-10-26 10:23:59', 1),
(5, 'xrt', 'dfsz', '2024-10-26 10:26:16', 0),
(6, 'Pseudo', 'Un commentaire en attente', '2024-10-26 10:26:49', 0),
(7, 'a', 'a', '2024-10-26 10:27:10', 0),
(8, 'ad', 'dz', '2024-10-26 10:30:35', 0);

-- --------------------------------------------------------

--
-- Structure de la table `consommation_nourriture`
--

CREATE TABLE `consommation_nourriture` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `employe_id` int(11) NOT NULL,
  `date_heure` datetime NOT NULL,
  `nourriture` varchar(100) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(180) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `habitat`
--

CREATE TABLE `habitat` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `habitat`
--

INSERT INTO `habitat` (`id`, `nom`, `description`, `image`, `slug`) VALUES
(1, 'Savane', 'Vaste étendue herbeuse africaine où vivent nos animaux de la savane', 'savane.jpg', 'savane'),
(2, 'Jungle', 'Forêt tropicale dense abritant nos espèces exotiques', 'jungle.jpg', 'jungle'),
(3, 'Marais', 'Zone humide accueillant nos espèces aquatiques et semi-aquatiques', 'marais.jpg', 'marais');

-- --------------------------------------------------------

--
-- Structure de la table `habitat_commentaire`
--

CREATE TABLE `habitat_commentaire` (
  `id` int(11) NOT NULL,
  `habitat_id` int(11) NOT NULL,
  `veterinaire_id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `ouverture` time NOT NULL,
  `fermeture` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`ouverture`, `fermeture`) VALUES
('08:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `rapport_veterinaire`
--

CREATE TABLE `rapport_veterinaire` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `veterinaire_id` int(11) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `nourriture` varchar(100) NOT NULL,
  `grammage` int(11) NOT NULL,
  `date_passage` timestamp NOT NULL DEFAULT current_timestamp(),
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'ROLE_ADMIN'),
(2, 'ROLE_VETERINAIRE'),
(3, 'ROLE_EMPLOYE');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `icone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `nom`, `description`, `icone`) VALUES
(1, 'Restauration', 'Restaurant et snacks proposant une cuisine locale et responsable', 'briefcase'),
(2, 'Visite guidée', 'Visite des habitats avec un guide expert (gratuit)', 'card-checklist'),
(3, 'Train du zoo', 'Visite du parc en petit train pour toute la famille', 'bar-chart');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `password`, `role_id`, `created_at`) VALUES
(1, 'jose@arcadia-zoo.fr', '59232261427aa46c6ef904a2803b7743e44f6f49', 1, '2024-10-26 05:18:55');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_animal_habitat` (`habitat_id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_avis_validation` (`est_valide`);

--
-- Index pour la table `consommation_nourriture`
--
ALTER TABLE `consommation_nourriture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employe_id` (`employe_id`),
  ADD KEY `idx_consommation_animal` (`animal_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `habitat`
--
ALTER TABLE `habitat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `habitat_commentaire`
--
ALTER TABLE `habitat_commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habitat_id` (`habitat_id`),
  ADD KEY `veterinaire_id` (`veterinaire_id`);

--
-- Index pour la table `rapport_veterinaire`
--
ALTER TABLE `rapport_veterinaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `veterinaire_id` (`veterinaire_id`),
  ADD KEY `idx_rapport_animal` (`animal_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `consommation_nourriture`
--
ALTER TABLE `consommation_nourriture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `habitat`
--
ALTER TABLE `habitat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `habitat_commentaire`
--
ALTER TABLE `habitat_commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rapport_veterinaire`
--
ALTER TABLE `rapport_veterinaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`habitat_id`) REFERENCES `habitat` (`id`);

--
-- Contraintes pour la table `consommation_nourriture`
--
ALTER TABLE `consommation_nourriture`
  ADD CONSTRAINT `consommation_nourriture_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`),
  ADD CONSTRAINT `consommation_nourriture_ibfk_2` FOREIGN KEY (`employe_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `habitat_commentaire`
--
ALTER TABLE `habitat_commentaire`
  ADD CONSTRAINT `habitat_commentaire_ibfk_1` FOREIGN KEY (`habitat_id`) REFERENCES `habitat` (`id`),
  ADD CONSTRAINT `habitat_commentaire_ibfk_2` FOREIGN KEY (`veterinaire_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `rapport_veterinaire`
--
ALTER TABLE `rapport_veterinaire`
  ADD CONSTRAINT `rapport_veterinaire_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`),
  ADD CONSTRAINT `rapport_veterinaire_ibfk_2` FOREIGN KEY (`veterinaire_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
