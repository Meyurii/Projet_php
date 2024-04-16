-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 16 avr. 2024 à 18:23
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_php_alicia_foune`
--

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id_film` bigint NOT NULL AUTO_INCREMENT,
  `title` char(50) NOT NULL,
  `durée` int NOT NULL,
  `date_de_sortie` date NOT NULL,
  `price` float NOT NULL,
  `img` longtext NOT NULL,
  `catégorie` char(40) DEFAULT NULL,
  `realisateur` char(40) DEFAULT NULL,
  `acteur` char(40) DEFAULT NULL,
  `lien_ba` longtext,
  PRIMARY KEY (`id_film`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_film`, `title`, `durée`, `date_de_sortie`, `price`, `img`, `catégorie`, `realisateur`, `acteur`, `lien_ba`) VALUES
(1, 'Top Gun', 100, '1986-09-17', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRkiH4kdffC-fTYjwTLiu6nbUmdDleqILib4DdcDLVLrLIdRTd7', 'action', 'Tony Scott', 'Tom Cruise, Val Kilmer ,Kelly McGillis', 'https://www.youtube.com/watch?v=V4gQdk1nAn0'),
(2, 'John Wick', 96, '2014-10-29', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTP3k717qTOuBUYdg8SgYve2AUPpUQg5pkqHzEOpC7ZGVdH6DOA', 'action', 'Chad Stahelski', 'Keanu Reeves, Ian McShane,Lance Reddick', 'https://www.youtube.com/watch?v=pWK5crMuhHY'),
(3, 'Terminator', 107, '1985-04-24', 2.99, 'https://fr.web.img4.acsta.net/pictures/22/09/27/12/52/4744720.jpg', 'action', 'James Cameron', '\'Arnold Schwarzenegger T-800,Linda Hamil', 'https://www.youtube.com/watch?v=y9e1-5QHPA'),
(4, 'Mad Max: Fury Road', 120, '2015-05-14', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQiktnHumUfIghvT7UYJttUIAU5YFC76GFf7hkH9sMyKDtSERRW', 'action', 'George Miller', 'Tom Hardy, Charlize Theron', 'https://www.youtube.com/watch?v=mtolAJbj44s'),
(5, '\r\nKill Bill: Volume 1', 111, '2003-11-26', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTN3BErqTsHT-K04smobHfFYli-4zXE9AtutApi5etA-dhi3aqm', 'action', 'Quentin Tarantino', 'Quentin Tarantino\',\'Uma Thurman, Lucy Li', 'https://www.youtube.com/watch?v=zIab-33tEyg'),
(6, 'Matrix', 136, '1999-06-23', 2.99, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRV7I2E-P76TdnOogBv5Ux4_3e5jD9hDIcw2zfxicuG2bP6IPGn', 'action', 'Lana Wachowski, Lilly Wachowski', 'Keanu Reeves, Carrie-Anne Moss', 'https://www.youtube.com/watch?v=8xx91zoASLY'),
(7, 'Gladiator', 155, '2000-06-20', 2.99, 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQt4x73lgh2Ralm135feVqzrmLQYkiB2jL332tSKteRAm5sFgFZ', 'action', 'Ridley Scott', 'Russell Crowe, Joaquin Phoenix', 'https://www.youtube.com/watch?v=ChcgxBAzrks'),
(8, 'Godzilla vs Kong', 113, '2021-03-25', 2.99, 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTUvknn6MH6L0TEb75M2bs1_sQN6O9UwHgE6G_j0Op_GNxxeIAF', 'action', 'Adam Wingard', 'Alexander Skarsgård, Millie Bobby Brown', 'https://www.youtube.com/watch?v=9bvq8db0xLs'),
(9, 'Mission impossible : Fallout', 133, '2018-07-12', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcT3sNQItKWetDPTnDSqT-LTbJVB_f5VqnvNPkVG4P1oESk800o9', 'action', '\'Christopher McQuarrie', 'Tom Cruise, Rebecca Ferguson', 'https://www.youtube.com/watch?v=8y5oSx3pB-s'),
(10, 'Les Aventuriers de l arche perdue', 115, '1981-09-16', 2.99, 'https://fr.web.img4.acsta.net/medias/nmedia/00/02/49/18/affiche.jpg', 'action', 'Steven Spielberg', 'Harrison Ford,Karen Allen', 'https://www.youtube.com/watch?v=liIQREC0X2A'),
(21, 'N oublie jamais', 121, '0000-00-00', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSOxtojbzM5segf4v7TPYW7Q73zPYr8cUMyGaHaPtZe-SmHDZ-C', 'Drame', 'Nick Cassavetes', 'Ryan Gosling, Rachel McAdams', 'https://dailymotion.com/video/x2gwcri'),
(22, 'La Liste de Schindler', 195, '0000-00-00', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQ08Gf7iAM3tdAjKvIAQA0SAQE62kzQxlQzNRgZ03CH9q65KeRc', 'Drame', 'Steven Spielberg', 'Liam Neeson, Ralph Fiennes', 'https://www.youtube.com/watch?v=ONWtyxzl-GE'),
(23, 'Titanic', 194, '0000-00-00', 2.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgA13CwSXM1k2yx2WGeLVXksg03vzvSrRpr5ZvXrZRX2d6NPlb', 'Drame', 'James Cameron', 'Kate Winslet, Leonardo DiCaprio', 'https://www.youtube.com/watch?app=desktop&v=aLRl4mnvfWQ'),
(24, 'Intouchables', 112, '0000-00-00', 2.99, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTEJlX9_RKvgnHDHcMUrEL0zFDtz8LEEVGvfnxkJYBM972HVlv0', 'Drame', 'Olivier Nakache, Éric Toledano', 'Omar Sy, François Cluzet', 'https://www.youtube.com/watch?v=cXu2MhWYUuE'),
(25, 'La Rafle', 115, '0000-00-00', 2.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8xK0dB2ZCM7ErexvxYE5lkb9yHR-dvh2qoprMnhaXgMjnzA4a', 'Drame', 'Roselyne Bosch', 'Jean Reno, Mélanie Laurent', 'https://www.youtube.com/watch?v=qXOmq3tcmnw'),
(26, 'Le Journal d Anne Frank', 180, '0000-00-00', 2.99, 'https://fr.web.img6.acsta.net/c_310_420/pictures/21/12/06/16/11/2820992.jpg', 'Drame', 'George Stevens', 'Millie Perkins, Shelley Winters', 'https://www.youtube.com/watch?v=nRw-WjxT5bc'),
(27, 'Nos cœurs meurtris', 182, '0000-00-00', 2.99, 'https://images.justwatch.com/poster/300097866/s718/purple-hearts.jpg', 'Drame', 'Elizabeth Allen', '\r\nNicholas Galitzine, Sofia Carson', 'https://www.youtube.com/watch?v=WTLgg8oRSBE'),
(28, 'A Star Is Born', 135, '0000-00-00', 2.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgncrVgR-Gx8VtIF4PRVxAaTI9xZS0a5ejtev5KcM-CyLFEPlb', 'Drame', 'Bradley Cooper', 'Bradley Cooper, Lady Gaga', 'https://www.youtube.com/watch?v=jsg9NxCBzFs'),
(29, 'Les Misérables', 218, '0000-00-00', 2.99, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSO5pPBVnTPrj81zBq4rWFHhj22nzk1A68kIxu3XlBJ_GA4kM6J', 'Drame', 'Tom Hooper', 'Hugh Jackman, Anne Hathaway', 'https://www.youtube.com/watch?v=n694aKtoPu8'),
(30, 'Rush', 218, '0000-00-00', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSWiUlirTNGbmalMap4v6C0dFBQSoVKfdrt4K7jNkCltvooAWrM', 'Drame', 'Ron Howard', 'Daniel Brühl, James Hunt', 'https://www.youtube.com/watch?v=4XA73ni9eVs');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_user` bigint NOT NULL AUTO_INCREMENT,
  `email` char(50) NOT NULL,
  `pseudo` char(50) DEFAULT NULL,
  `password` char(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ID_user`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
