-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 23 avr. 2024 à 11:21
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
-- Base de données : `kiosk`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id_cart` bigint NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total_amount` float NOT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id_cart`, `pseudo`, `total_amount`) VALUES
(1, 'Meyuri2', 11.96),
(5, 'Stan', 0),
(6, 'Meyuri', 8.97);

-- --------------------------------------------------------

--
-- Structure de la table `cart_details`
--

DROP TABLE IF EXISTS `cart_details`;
CREATE TABLE IF NOT EXISTS `cart_details` (
  `id_cart` bigint NOT NULL,
  `id_film` bigint NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `id_lignes` bigint NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(40) NOT NULL,
  PRIMARY KEY (`id_lignes`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `categorie` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `realisateur` char(40) DEFAULT NULL,
  `acteur` char(40) DEFAULT NULL,
  `lien_ba` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` longtext,
  PRIMARY KEY (`id_film`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_film`, `title`, `durée`, `date_de_sortie`, `price`, `img`, `categorie`, `realisateur`, `acteur`, `lien_ba`, `description`) VALUES
(1, 'Top Gun', 100, '1986-09-17', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRkiH4kdffC-fTYjwTLiu6nbUmdDleqILib4DdcDLVLrLIdRTd7', 'action', 'Tony Scott', 'Tom Cruise, Val Kilmer ,Kelly McGillis', 'https://www.youtube.com/embed/V4gQdk1nAn0?si=gwrkEHdwO8XWU_-6', 'Un jeune pilote de chasse talentueux mais téméraire est envoyé à l\'école d\'élite de pilotes de l\'US Navy, où il va apprendre à maîtriser son arrogance tout en rivalisant pour devenir le meilleur.'),
(2, 'John Wick', 96, '2014-10-29', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTP3k717qTOuBUYdg8SgYve2AUPpUQg5pkqHzEOpC7ZGVdH6DOA', 'action', 'Chad Stahelski', 'Keanu Reeves, Ian McShane,Lance Reddick', 'https://www.youtube.com/embed/pWK5crMuhHY?si=SK7B7Z_UZeMCVYhy', 'Après la mort tragique de son chien, un ex-tueur à gages légendaire se lance dans une vengeance impitoyable contre ceux qui ont détruit sa vie, déclenchant une série de confrontations explosives.'),
(3, 'Terminator', 107, '1985-04-24', 2.99, 'https://fr.web.img4.acsta.net/pictures/22/09/27/12/52/4744720.jpg', 'action', 'James Cameron', '\'Arnold Schwarzenegger T-800,Linda Hamil', 'https://www.youtube.com/embed/QaagRs5pX_E?si=xy98JtBK9663rc82', 'Dans un futur post-apocalyptique, un cyborg indestructible est envoyé dans le passé pour éliminer la mère du leader de la résistance humaine, mais un guerrier rebelle est également envoyé pour la protéger.'),
(4, 'Mad Max: Fury Road', 120, '2015-05-14', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQiktnHumUfIghvT7UYJttUIAU5YFC76GFf7hkH9sMyKDtSERRW', 'action', 'George Miller', 'Tom Hardy, Charlize Theron', 'https://www.youtube.com/embed/mtolAJbj44s?si=wP2xHewLgy4EMwe_', 'Dans un monde désolé où l\'eau et l\'essence sont des biens rares, Mad Max s\'unit à une guerrière impitoyable pour échapper à un seigneur de guerre tyrannique à la tête d\'un convoi meurtrier.'),
(5, '\r\nKill Bill: Volume 1', 111, '2003-11-26', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTN3BErqTsHT-K04smobHfFYli-4zXE9AtutApi5etA-dhi3aqm', 'action', 'Quentin Tarantino', 'Quentin Tarantino\',\'Uma Thurman, Lucy Li', 'https://www.youtube.com/embed/zIab-33tEyg?si=n4OjRwRjRSYtqApS', 'Une ancienne tueuse à gages se réveille d\'un coma et entreprend une mission de vengeance impitoyable contre ses anciens collègues qui ont tenté de la tuer le jour de son mariage.'),
(6, 'Matrix', 136, '1999-06-23', 2.99, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRV7I2E-P76TdnOogBv5Ux4_3e5jD9hDIcw2zfxicuG2bP6IPGn', 'action', 'Lana Wachowski, Lilly Wachowski', 'Keanu Reeves, Carrie-Anne Moss', 'https://www.youtube.com/embed/8xx91zoASLY?si=F7WwydUAWffQAWcW', 'Un jeune hacker découvre que la réalité dans laquelle il vit n\'est qu\'une simulation informatique, et il rejoint une rébellion pour combattre les machines qui asservissent l\'humanité.'),
(7, 'Gladiator', 155, '2000-06-20', 2.99, 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQt4x73lgh2Ralm135feVqzrmLQYkiB2jL332tSKteRAm5sFgFZ', 'action', 'Ridley Scott', 'Russell Crowe, Joaquin Phoenix', 'https://www.youtube.com/embed/ChcgxBAzrks?si=9Bq4tUp22Tts201E', 'Un général romain est trahi et réduit en esclavage, mais il survit pour devenir un gladiateur légendaire et se lance dans une quête de vengeance contre l\'empereur corrompu qui a détruit sa vie.'),
(8, 'Godzilla vs Kong', 113, '2021-03-25', 2.99, 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTUvknn6MH6L0TEb75M2bs1_sQN6O9UwHgE6G_j0Op_GNxxeIAF', 'action', 'Adam Wingard', 'Alexander Skarsgård, Millie Bobby Brown', 'https://www.youtube.com/embed/9bvq8db0xLs?si=7GlPXs1zSlJWK_B6', 'Deux puissantes créatures, Godzilla et Kong, entrent en collision dans un affrontement spectaculaire qui déterminera le destin de l\'humanité et du monde entier.'),
(9, 'Mission impossible : Fallout', 133, '2018-07-12', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcT3sNQItKWetDPTnDSqT-LTbJVB_f5VqnvNPkVG4P1oESk800o9', 'action', '\'Christopher McQuarrie', 'Tom Cruise, Rebecca Ferguson', 'https://www.youtube.com/embed/8y5oSx3pB-s?si=CUU5DmbcInfLAzvF', 'L\'agent secret Ethan Hunt doit récupérer des armes nucléaires volées tout en évitant les agents doubles et les conspirations, dans une mission pleine de rebondissements à travers le monde.'),
(10, 'Les Aventuriers de l arche perdue', 115, '1981-09-16', 2.99, 'https://fr.web.img4.acsta.net/medias/nmedia/00/02/49/18/affiche.jpg', 'action', 'Steven Spielberg', 'Harrison Ford,Karen Allen', 'https://www.youtube.com/embed/liIQREC0X2A?si=hl0gOHaEjepuMax4', 'L\'archéologue Indiana Jones se lance dans une course effrénée pour retrouver l\'Arche de l\'Alliance avant les nazis, affrontant des pièges mortels et des ennemis impitoyables.'),
(21, 'N oublie jamais', 121, '2004-09-08', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSOxtojbzM5segf4v7TPYW7Q73zPYr8cUMyGaHaPtZe-SmHDZ-C', 'Drame', 'Nick Cassavetes', 'Ryan Gosling, Rachel McAdams', 'https://www.dailymotion.com/embed/video/x2gwcri?', 'Une histoire d\'amour poignante entre deux jeunes amants, dont la mémoire est mise à l\'épreuve lorsque l\'un d\'eux est atteint de la maladie d\'Alzheimer précoce.'),
(22, 'La Liste de Schindler', 195, '1994-03-02', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQ08Gf7iAM3tdAjKvIAQA0SAQE62kzQxlQzNRgZ03CH9q65KeRc', 'Drame', 'Steven Spielberg', 'Liam Neeson, Ralph Fiennes', 'https://www.youtube.com/embed/ONWtyxzl-GE?si=J7WXGZTt_tMNLUo3', 'L\'histoire vraie d\'Oskar Schindler, un industriel allemand qui a sauvé des centaines de Juifs pendant l\'Holocauste en les employant dans sa fabrique, mettant sa vie en danger.'),
(23, 'Titanic', 194, '1998-01-07', 2.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgA13CwSXM1k2yx2WGeLVXksg03vzvSrRpr5ZvXrZRX2d6NPlb', 'Drame', 'James Cameron', 'Kate Winslet, Leonardo DiCaprio', 'https://www.youtube.com/embed/aLRl4mnvfWQ?si=0hF78tnOyTKE3NM9', 'Une histoire d\'amour épique se déroulant à bord du paquebot Titanic, dont le destin tragique lors de son voyage inaugural marque le destin des passagers à jamais.'),
(24, 'Intouchables', 112, '2011-11-02', 2.99, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTEJlX9_RKvgnHDHcMUrEL0zFDtz8LEEVGvfnxkJYBM972HVlv0', 'Drame', 'Olivier Nakache, Éric Toledano', 'Omar Sy, François Cluzet', 'https://www.youtube.com/embed/cXu2MhWYUuE?si=Z7WJOiE0zLcmA4s4', 'L\'histoire inspirante de l\'amitié improbable entre un aristocrate paralysé et son aide-soignant issu des quartiers défavorisés, qui transforme leurs vies de manière inattendue.'),
(25, 'La Rafle', 115, '2010-03-10', 2.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8xK0dB2ZCM7ErexvxYE5lkb9yHR-dvh2qoprMnhaXgMjnzA4a', 'Drame', 'Roselyne Bosch', 'Jean Reno, Mélanie Laurent', 'https://www.youtube.com/embed/qXOmq3tcmnw?si=9CMJSZCA9h5FTuBO', 'Basé sur des événements réels, ce film retrace le sort tragique des Juifs lors de la rafle du Vél d\'Hiv en 1942, où des milliers de familles ont été déportées vers les camps de concentration.'),
(26, 'Le Journal d Anne Frank', 180, '1959-09-10', 2.99, 'https://fr.web.img6.acsta.net/c_310_420/pictures/21/12/06/16/11/2820992.jpg', 'Drame', 'George Stevens', 'Millie Perkins, Shelley Winters', 'https://www.youtube.com/embed/nRw-WjxT5bc?si=BGd6NpjzsQ0Ia6ov', 'Le récit poignant d\'Anne Frank, une jeune fille juive cachée avec sa famille pour échapper à la persécution nazie, raconté à travers son journal intime.'),
(27, 'Nos cœurs meurtris', 182, '2022-07-29', 2.99, 'https://images.justwatch.com/poster/300097866/s718/purple-hearts.jpg', 'Drame', 'Elizabeth Allen', '\r\nNicholas Galitzine, Sofia Carson', 'https://www.youtube.com/embed/WTLgg8oRSBE?si=VwfLF-AqVg3ZLHu-', 'Une exploration émotionnelle des conséquences d\'une tragédie sur une communauté, mettant en lumière le courage et la résilience des personnes touchées.'),
(28, 'A Star Is Born', 135, '2018-10-03', 2.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgncrVgR-Gx8VtIF4PRVxAaTI9xZS0a5ejtev5KcM-CyLFEPlb', 'Drame', 'Bradley Cooper', 'Bradley Cooper, Lady Gaga', 'https://www.youtube.com/embed/jsg9NxCBzFs?si=1abgRcU1RyUx0NMN', 'Une romance passionnée entre une chanteuse émergente et une star déclinante de la musique, dont la relation est mise à l\'épreuve par les défis de la célébrité.\n'),
(29, 'Les Misérables', 218, '2013-06-18', 2.99, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSO5pPBVnTPrj81zBq4rWFHhj22nzk1A68kIxu3XlBJ_GA4kM6J', 'Drame', 'Tom Hooper', 'Hugh Jackman, Anne Hathaway', 'https://www.youtube.com/embed/n694aKtoPu8?si=NQG1QBJWrT9cy4xb', 'Adaptation du classique de Victor Hugo, suivant les destins croisés de plusieurs personnages luttant pour la survie et la rédemption dans la France du 19e siècle.'),
(30, 'Rush', 218, '2013-09-25', 2.99, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSWiUlirTNGbmalMap4v6C0dFBQSoVKfdrt4K7jNkCltvooAWrM', 'Drame', 'Ron Howard', 'Daniel Brühl, James Hunt', 'https://www.youtube.com/embed/4XA73ni9eVs?si=U-sTju3hOrJW6Bnh', 'Une rivalité féroce entre deux pilotes de Formule 1, James Hunt et Niki Lauda, qui repoussent les limites de la vitesse et du courage sur les circuits, au risque de leur vie.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `email` char(50) NOT NULL,
  `pseudo` char(50) DEFAULT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `passwordbdd` char(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `pseudo`, `isadmin`, `passwordbdd`) VALUES
(5, '1@1.fr', 'Meyuri2', 0, '$2y$10$hphqlA8BMnqyWSopAd.YpOFBYGY5invyn7rBQf6EogK4fjoojE7yi'),
(6, 'aliciamp0705@gmail.com', 'Meyuri', 0, '$2y$10$IQ9ZWd/sls/E9536C31lfuYp81AYCyiaCOHX6QpFFz/RLcrjOsIFi'),
(3, 'adafe@zffz.com', 'Stan', 0, '$2y$10$Oe/ZBoQm3RItFnyF3yyIouBunCew2APbkMNnoK.XXfZhPMryePtVq');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
