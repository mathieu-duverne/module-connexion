-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 23 nov. 2020 à 09:28
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexion`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$gORng3ThlKPw1triI1OR9..0m5l.JUMoL9u0CjjP/kDpw2Dqr3ArO'),
(58, 'zorkin', 'zorkin', 'zorkin', '$2y$10$qvKmaiNTKM4LWb5Kr2jeVOJB.a5MTjOurNXBgtSWgcYM7nI5G3wYS'),
(67, 'zorkin30', 'mathieu', 'duverne', '$2y$10$YoKNVaSvhBsi0H2u1OVANu8ExwFLeSoeY5rZrueEyF4BWl2YYQj66'),
(73, 'matleStevJobs', 'Zorkina', 'Zorkino', '$2y$10$ro5S5RnK4Yef9NTS6T43e.gjImhpqe3MeuWdM9I6K6a0qIEfFaqfe'),
(74, 'za', 'za', 'za', '$2y$10$.3kTW5wzsWAJbwjbBaqqCO2QdswP6xgmwrig3dFxdrAmoRTo2Mg9C'),
(75, 'matlelion', 'mathieu', 'duverne', '$2y$10$v2Yd2zcb/XDk9wll.PAkVeUyk3jCyY87R2zLcTXv08PU6wXzKgifW'),
(77, 'zoro', 'Zoro', 'Ronoa', '$2y$10$7lAJkOnXDvb3s.FaM05n..o1mlQgPTpqK.7SdraJeAe9IYLPWqWHy'),
(78, 'ziri', 'ziri', 'ziri', '$2y$10$VUEfBCd9KmmgUsHPDMTaouuQ5LsRfXjdwEyYmIYkxQjVhMT3Xrh1m'),
(80, 'zara', 'zara', 'zara', '$2y$10$LSLSlwfxaxe9M6S/lXRNmuQaFiGK12mEgI21FeVTKXFhN1qykzAMy'),
(82, 'zar', 'zara', 'el magazine', '$2y$10$YdzlZqHWniZ1SY9pDnEAOe2oOcAhA73SwKTStUfQwf6ZLhWBCiYBS');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
