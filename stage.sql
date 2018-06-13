-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 16 Février 2018 à 09:49
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `idEntreprise` int(200) NOT NULL,
  `nomEntreprise` text,
  `villeEntreprise` text,
  `cpEntreprise` int(5) DEFAULT NULL,
  `adresseEntreprise` text,
  `mailEntreprise` text,
  `telEntreprise` varchar(20) DEFAULT NULL,
  `activiteEntreprise` text,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `nomEntreprise`, `villeEntreprise`, `cpEntreprise`, `adresseEntreprise`, `mailEntreprise`, `telEntreprise`, `activiteEntreprise`, `active`) VALUES
(1, 'Ecole Maternelle Françoise Dolto', 'Melun', 77000, '30 avenue Georges Pompidou', '', '01 64 64 04 20', 'Enseignement', 1),
(2, 'Groupe Adéquat', 'Vert-Saint-Denis', 77240, '390 avenue Anna Lindh', 'agence.vsd@groupeadequat.fr', '06 46 64 27 82', 'Autre', 1),
(3, 'Le Pain Gourmand', 'Melun', 77000, '47 avenue Georges Pompidou', '', '07 50 60 12 06', 'commerce/Distribution', 1),
(4, 'Franco Pizz', 'Melun', 77000, '14 route de Montereau', '', '01 64 37 55 07', 'Commerce/Distribution', 1),
(5, 'Papa Grill', 'Melun', 77000, '26 Boulevard Gambetta', '', '01 60 68 27 01', 'Hôtellerie/Restauration', 1),
(6, 'Ecole Primaire Jules Ferry', 'Melun', 77000, 'Rue Jules Ferry ', '', '01 64 38 99 78 ', 'Enseignement', 1),
(7, 'Tribunal de Grande Instance', 'Melun', 77010, '2 avenue du Général Leclerc', '', '01 64 79 81 64', 'Droit/Justice', 1),
(8, 'Baildy Group', 'Melun', 77000, '1 place Loïc Baron', '', '01 60 66 88 50', 'Multimedia/Audiovisuel/Informatique ', 1),
(9, 'Relay Gare', 'Melun', 77000, 'Place Callieni', '', '01 64 39 33 21', 'Commerce/Distribution', 1),
(10, 'Micro Crèche Les P’tis Petons', 'St-Germain-Laxis', 77950, '3 bis rue de l’église', '', '09 82 42 27 12', 'Sciences humaines ', 1),
(11, 'Diarra Institut', 'Melun', 77000, 'Mail Gaillardon', '', '01 64 09 81 17', 'Commerce/Distribution ', 1),
(12, 'Menuiserie', 'Corbeil Essonnes', 91100, '21 rue du Champ d’Epreuves', '', '01 60 88 25 59', 'Industrie', 1),
(13, 'Sodiaal International', 'Paris Cedex 14', 75680, '170 bis Boulevard du Montparnasse', '', '01 44 10 90 10', 'Industrie', 1),
(14, 'Intermarché', 'Melun', 77000, '36 avenue du Général Patton', '', '01 60 56 00 90', 'Commerce/Distribution', 1),
(15, 'Orange', 'Paris Cedex 14', 75012, '187 avenue Daumesnil', '', '07 87 16 06 59', 'Multimedia/Audiovisuel/Informatique ', 1),
(16, 'TMC télécommandes mécaniques par câble', 'Le Mée-Sur-Seine', 77350, 'Rue Jean-Baptiste Colbert', '', '01 60 56 56 56', 'Transports/Automobile ', 1),
(17, 'Sobeca', 'Vert-Saint-Denis', 77240, '581 avenue de l’Europe', '', '01 64 52 04 30', 'Bâtiment/Construction ', 1),
(18, 'Carrefour ', 'Evry', 91006, '9 avenue du Lac Bois Briard Mermoz 6 Bat. K1', '', '01 69 64 64 00 ', 'Commerce/Distribution', 1),
(19, 'Banque de France ', 'Paris ', 75001, '31 rue Croix des Petits Champs', '', '01 64 87 67 03', 'Banque/Assurance ', 1),
(20, 'Les Plaisirs Parisiens', 'Melun', 77000, '40 Boulevard de l’Almont', '', '01 64 87 67 03', 'Commerce/Distribution', 1),
(21, 'ND Logistics', 'Le Coudray-Montceaux', 91830, '9-11 rue des Haies Blanches', '', '01 69 90 70 26', 'Logistique ', 1),
(22, 'Banque de France ', 'Melun', 77000, '24 rue St Ambroise', '', '01 64 87 67 00 ', 'Banque/Assurance ', 1),
(23, 'Mairie de Melun', 'Melun', 77000, '210 rue Paul Doumer', '', '01 64 52 33 03 ', 'Fonction publique ', 1),
(24, 'CAMVS', 'Dammarie-les-Lys', 77190, '297 rue Rousseau Vaudran', '', ' 01 64 79 25 25 ', 'Fonction publique ', 1),
(25, 'La Banque Postale', 'Melun', 77000, '210 avenue Georges Clémenceau', '', '01 64 71 37 00 ', 'Banque/Assurance ', 1),
(26, 'SMR France', 'Dammarie-les-Lys', 77190, '154 avenue du Lys', '', '01 64 79 22 00 ', 'Transports/Automobile ', 1),
(27, 'PMS Photomike Studio', 'Rubelles', 77950, 'Centre Commercial Carrefour Market', '', ' 01 64 64 04 23 ', 'Multimedia/Audiovisuel/Informatique ', 1),
(28, 'Planet Pizza', 'Melun', 77000, '80 bis rue du Général de Gaulle', '', '01 60 68 11 11 ', 'Commerce/Distribution', 1),
(29, 'Ibis Styles Rubelles', 'Rubelles', 77950, '6 rue du Perré', '', '01 64 52 41 41 ', 'Hôtellerie/Restauration', 1),
(30, 'XPO SUPPLY CHAIN France', 'Bretigny-sur-Orge', 91220, 'Rue de Bourgogne – ZI de la Moinerie', '', '01 48 16 38 00 ', 'Transports/Automobile ', 1),
(31, 'Garage Jean Redele', 'Brie-Comte-Robert', 77170, '17 rue du Général Leclerc', '', '01 64 39 95 77 ', 'Transports/Automobile ', 1),
(32, 'Institut Cameane', 'Paris ', 75002, '23 rue des Jeuneurs', '', '01 40 13 07 14 ', 'Commerce/Distribution', 1),
(33, 'Général d’Optique', 'Cesson', 77240, 'Centre Commercial Boissénart', '', '01 60 63 01 23 ', 'Commerce/Distribution', 1),
(34, 'Euro Disney Associes ', 'Chessy', 77700, '1 rue de la Galmy', '', '', 'Art/Spectacle ', 1),
(35, 'Elres', 'Combs-la-Ville', 77380, '2 allée René Lalique', '', '', 'Commerce/Distribution', 1),
(36, 'Burton Of London', 'Melun', 77000, '20 rue St Aspais', '', '01 64 09 24 82 ', 'Commerce/Distribution', 1),
(37, 'Boulangerie Assia', 'Melun', 77000, '12 rue Colonel Picot', '', '09 54 77 04 08 ', 'Commerce/Distribution', 1),
(38, 'GEMO', 'Melun', 77000, 'ZAC du Champs de Foire', '', ' 01 64 71 90 95 ', 'Commerce/Distribution', 1),
(39, 'Association Lys ODE77', 'Dammarie-les-Lys', 77190, '7 rue Marc Jacquet', '', '01 64 39 97 93 ', 'Sciences humaines ', 1),
(40, 'Le Petrin de l’Abbaye', 'Dammarie-les-Lys', 77190, 'Centre Commercial de l’Abbaye', '', '', 'Commerce/Distribution', 1),
(41, 'Pharmacie Jaoui', 'Melun', 77000, '65 avenue du Général Patton', '', '01 60 68 71 00 ', 'Santé ', 1),
(42, 'Boulangerie l’Aures', 'Melun', 77000, '5-7 Square Blaise Pascal', '', '', 'Commerce/Distribution', 1),
(43, 'Centre DCNS de Nantes ', 'La Montagne', 44620, 'Indret', '', '02 40 84 89 49 ', 'Bâtiment/Construction ', 1),
(44, 'La Maison de Toutou', 'Vaux-le-Penil', 77000, '25 route de Montereau', '', ' 01 64 37 15 61 ', 'Santé ', 1),
(45, 'Direction des Affaires Sportives', 'Melun', 77000, '4 rue de la Fontaine Saint Liesne', '', '01 60 56 06 20 ', 'Fonction publique ', 1),
(46, 'SARL VHS', 'Le Mée-Sur-Seine', 77350, 'Centre Commercial Plein-Ciel', '', '', 'Commerce/Distribution', 1),
(47, 'Centre Hôspitalier de Melun', 'Melun', 77000, '2 rue Fréteau de Peny', '', '01 64 71 60 00', 'Santé ', 1),
(48, 'Hyper U', 'Brie-Comte-Robert', 77170, 'Rue Gustave Eiffel', '', '01 64 05 23 01', 'Commerce/Distribution', 1),
(49, 'Musée de la Gendarmerie', 'Melun', 77000, 'Avenue du 13eme Dragon', '', '01 64 14 54 64', 'Fonction publique ', 1),
(50, 'Boulangerie Pâtisserie Artisanale BAH', 'Le Mée-Sur-Seine', 77350, 'Avenue Maurice Dauvergne', '', '', 'Commerce/Distribution', 1),
(51, 'PAK Auto', 'Vaux-le-Penil', 77000, '112 route de Nangis', '', '06 64 86 07 07 ', 'Transports/Automobile ', 1),
(52, 'Boulanger', 'Cesson', 77240, 'Rue du Bois des Saint-Pères', '', '0 825 85 08 50 ', 'Commerce/Distribution', 1),
(53, 'Geolia', 'Champlan', 91160, '3 rue des Clotais', '', '09 72 13 20 41', 'Logistique ', 1),
(54, 'Cabinet de Kinésithérapie', 'Melun', 77000, '17 Boulevard François René de Châteaubriand', '', '01 64 09 06 96', 'Santé ', 1),
(55, 'Optiko', 'Melun', 77000, '21 Boulevard de l’Almont', '', '01 60 66 01 80 ', 'Commerce/Distribution', 1),
(56, 'A la Crêperie de l’Avenue', 'Melun', 77000, '18 avenue du Général Patton', '', '01 64 52 59 25 ', 'Hôtellerie/Restauration', 1),
(57, 'Avancial', 'Paris ', 75012, '40 avenue des Terroirs de France', '', '01 44 74 95 77 ', 'Transports/Automobile ', 1),
(58, 'Rigolo comme la Vie', 'Cesson', 77240, '5 rue Aimé Césaire', '', '01 64 37 61 94 ', 'Sciences humaines ', 1),
(59, 'Mairie de Villeneuve-Saint-Georges', 'Villeneuve-Saint-Georges', 94190, 'Place Pierre Semard', '', '01 43 86 38 00 ', 'Fonction publique ', 1),
(60, 'D.Lys Burger', 'Dammarie-les-Lys', 77190, '824 avenue du Lys', '', '09 83 48 64 88 ', 'Hôtellerie/Restauration', 1),
(61, 'Leroy Merlin', 'Massy', 91300, '2 rue Aulnay Dracourt', '', '01 69 53 59 59 ', 'Commerce/Distribution', 1),
(62, 'Okaïdi', 'Melun', 77000, '28 rue Saint Aspais', '', '01 64 14 92 89 ', 'Commerce/Distribution', 1),
(63, 'Auchan', 'Cesson', 77240, 'Centre Commercial Boissénart', '', '01 64 10 16 16 ', 'Commerce/Distribution', 1),
(64, 'O’Dwich', 'Melun', 77000, '1 avenue du Général Patton', '', '01 75 18 29 02 ', 'Hôtellerie/Restauration', 1),
(65, 'Kam Fret Services', 'Le Mée-Sur-Seine', 77350, '261 rue de Chanteloup', '', '', 'Transports/Automobile ', 1),
(66, 'Le Moulin à Sakina', 'Melun', 77000, '1 Avenue Patton', '', '', 'Commerce/Distribution', 1),
(67, 'Planète Santé Pharmacie', 'Melun', 77000, '1 Square Blaise Pascal', '', '01 60 56 54 44 ', 'Santé ', 1),
(68, 'Mairie de St-Germain-Laxis', 'St-Germain-Laxis', 77950, 'Place Emile Piot', '', '01 64 52 27 12 ', 'Fonction publique ', 1),
(69, 'Sun Paradise', 'Melun', 77000, '13 rue de l’Abreuvoir', '', '01 64 09 97 62 ', 'Commerce/Distribution ', 1),
(70, 'Optique Plein Ciel', 'Le Mée-Sur-Seine', 77350, 'Centre Commercial Plein-Ciel', '', '01 64 52 29 36 ', 'Commerce/Distribution', 1),
(71, 'ID Logistics France', 'Vert-Saint-Denis', 77240, '10 Rue Paul-Henri Spaak', '', '', 'Logistique ', 1),
(72, 'Mohammad Emran', 'Le Mée-Sur-Seine', 77350, '49 rue de Bouville', '', '09 50 14 91 13', 'Commerce/Distribution', 1),
(73, 'Mairie de Savigny-le-Temple', 'Savigny-le-Temple', 77176, '1 Place François Mitterrand', '', '01 64 10 18 00 ', 'Fonction publique ', 1),
(74, 'Tati', 'Melun', 77000, 'ZAC du Champs de Foire', '', '01 60 66 83 83 ', 'Commerce/Distribution', 1),
(75, 'Matrechka', 'Melun', 77000, '18 rue Saint Barthélémy', '', '06 89 34 08 78 ', 'Commerce/Distribution', 1),
(76, 'Multi Accueil AFC Les Petits Bergers', 'Melun', 77000, 'Place de la Motte aux Cailles', '', '01 64 39 91 61 ', 'Sciences humaines ', 1),
(77, 'Véronic Coiffure', 'Vaux-le-Penil', 77000, '25 route de Montereau', '', '01 64 10 96 71 ', 'Commerce/Distribution', 1),
(78, 'BNP Paribas', 'Melun', 77000, '1 rue St Etienne', '', '0 820 82 00 01 ', 'Banque/Assurance ', 1),
(79, 'Préfecture de Seine-et-Marne', 'Melun', 77000, 'Rue des Saints-Pères', '', '01 64 71 77 77 ', 'Fonction publique ', 1),
(80, 'Paulstra', 'Lisses', 91090, '24 rue de l’Eglantier', '', ' 01 69 91 50 00 ', 'Sport', 1),
(81, 'Vêt Affaires', 'Savigny-le-Temple', 77176, '137 rue de l’Industrie', '', '01 75 79 12 67 ', 'Commerce/Distribution', 1),
(82, 'Confédération Syndicale des Familles ', 'Melun', 77000, '11 Avenue de Saint Exupery', '', '01 64 38 51 63 ', 'Sciences humaines ', 1),
(83, 'Cornet Franck', 'Broyes', 51120, '23 rue Georges Sand', '', '', 'Bâtiment/Construction ', 1),
(84, 'Médiathèque', 'Melun', 77000, '25 rue du Château', '', '01 60 56 04 70 ', 'Fonction publique ', 1),
(85, 'EZO', 'Dammarie-les-Lys', 77190, 'Place Paul Gauguin', '', '', 'Industrie', 1),
(86, 'Mayeur Garage AD', 'Moissy-Cramayel', 77550, '24 avenue Jean Jaurès', '', ' 01 60 60 63 26 ', 'Transports/Automobile ', 1),
(87, 'Catchoupiote', 'Melun', 77000, '11 rue du Presbytère ', '', '01 64 09 48 82 ', 'Commerce/Distribution', 1),
(88, 'Bertin & Bertin Avocats Associés', 'Avon', 77210, '2 rue Gambetta', '', '01 60 96 89 61', 'Droit/Justice', 1),
(89, 'Boucherie de l’Almont', 'Melun', 77000, '30 Boulevard de l’Almont', '', '01 64 09 20 08 ', 'Commerce/Distribution', 1),
(90, 'Ecole Maternelle Montaigu', 'Melun', 77000, '30 avenue Georges Pompidou', '', '01 64 52 33 03', 'Enseignement', 1),
(91, 'Espace 3000 Vesoul', 'Vesoul', 70000, 'Rue Victor Dolle', '', '03 84 97 10 10', 'Transports/Automobile ', 1),
(92, 'Pierre et Beauté', 'Melun', 77000, '21 rue de St Liesne', '', '09 53 70 44 42', 'Commerce/Distribution', 1),
(93, 'RapidFlore', 'Melun', 77000, '2 avenue du Général Patton', '', '01 60 66 47 01', 'Commerce/Distribution', 1),
(94, 'Lidl', 'Dammarie-les-Lys', 77191, '536 rue des Frères Thibault', '', '01 60 56 00 90', 'Commerce/Distribution', 1),
(95, 'Librairie Jacques Amyot', 'Melun', 77000, '22 rue Paul Doumer', '', '01 64 14 44 24', 'Commerce/Distribution', 1),
(96, 'O.N. BTP', 'Melun', 77000, '26 rue de la Fontaine', '', '06 61 07 95 24', 'Bâtiment/Construction ', 1),
(97, 'Lycée Léonard de Vinci', 'Melun', 77011, '2 bis rue Edouard Branly', '', '01 60 56 60 60 ', 'Enseignement', 1),
(98, 'Picard Surgelés', 'Savigny-le-Temple', 77176, '8 rue de l’Orée du Bois', '', '01 60 63 14 14', 'Commerce/Distribution', 1),
(99, 'Centre Commercial', 'Pantin', 93500, '9 rue du Pré St Gervais', '', '01 48 40 17 90', 'Commerce/Distribution', 1),
(100, '3H Food', 'Melun', 77000, 'Place des 3 Horloges', '', '09 81 47 52 37', 'Hôtellerie/Restauration', 1),
(101, 'Pompes Funèbres Roc-Eclerc', 'Dammarie-les-Lys', 77190, '603 avenue André Ampère', '', '01 64 37 21 89', 'Commerce/Distribution', 1),
(102, 'Publicité Benoist', 'Vaux-le-Penil', 77300, '880 rue du Maréchal Juin', '', '01 64 37 15 75', 'Multimedia/Audiovisuel/Informatique ', 1),
(103, 'Maternité', 'Melun', 77011, '2 rue de Fréteau de Peny', '', '01 64 71 65 35', 'Santé ', 1),
(104, 'Clinique des Fontaines', 'Melun', 77000, '54 Boulevard Aristide Briand', '', '01 60 56 40 00 ', 'Santé ', 1),
(105, 'Maison Médicale Saint Nicolas', 'Rubelles', 77950, 'Rue St Nicolas', '', '01 60 66 84 45', 'Santé ', 1),
(106, 'Pharmacie', 'Dammarie-les-Lys', 77190, 'Centre Commercial Villaubois', '', '01 64 37 36 07', 'Santé ', 1),
(107, 'Auto Ecole', 'Melun', 77000, '16 rue du Colonel Picot', '', '09 83 34 06 77', 'Transports/Automobile ', 1),
(108, 'Hôtel Montaigne', 'Paris ', 75008, '6 avenue Montaigne', '', '01 80 97 40 00', 'Hôtellerie/Restauration', 1),
(109, 'Salon Fat Beauty', 'Melun', 77000, '12 bis rue St Liesne', '', '06 12 78 01 25', 'Commerce/Distribution', 1),
(110, 'Tonton Grill', 'Melun', 77000, '49 rue St Barthélémy', '', '09 83 39 65 39', 'Hôtellerie/Restauration', 1),
(111, 'Eva & Flo Couture', 'Melun', 77000, '19 rue St Ambroise', '', '01 64 39 50 56', 'Commerce/Distribution', 1),
(112, 'Clinique St Jean', 'Melun', 77000, '41 avenue de Corbeil', '', '01 64 14 30 27', 'Santé ', 1),
(113, 'Zadis Electrique', 'Dammarie-les-Lys', 77190, '37 rue Marc Lanvin', '', '01 60 65 19 53', 'Bâtiment/Construction ', 1),
(114, 'Centre de loisirs Bois du Lys', 'Dammarie-les-Lys', 77190, '380 chemin du Clocher', '', '01 64 37 15 27', 'Sport', 1),
(115, 'Chantemur', 'Melun', 77000, 'ZAC du Champs de Foire', '', '01 60 68 25 00', 'Commerce/Distribution', 1);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE `stage` (
  `idStage` int(200) NOT NULL,
  `idUserEleve` int(11) NOT NULL,
  `idUserProf` int(11) NOT NULL,
  `idTuteur` int(11) NOT NULL,
  `dateStage` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tuteur`
--

CREATE TABLE `tuteur` (
  `idTuteur` int(200) NOT NULL,
  `nomTuteur` text,
  `prenomTuteur` text,
  `mailTuteur` text,
  `telTuteur` varchar(20) DEFAULT NULL,
  `idEntreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tuteur`
--

INSERT INTO `tuteur` (`idTuteur`, `nomTuteur`, `prenomTuteur`, `mailTuteur`, `telTuteur`, `idEntreprise`) VALUES
(1, 'truc', 'truc', 'truc', '1231231231', 5);

-- --------------------------------------------------------

--
-- Structure de la table `usereleve`
--

CREATE TABLE `usereleve` (
  `idUserEleve` int(200) NOT NULL,
  `nomEleve` text,
  `prenomEleve` text,
  `classeEleve` int(2) DEFAULT NULL,
  `anneeScolaire` text,
  `login` text,
  `password` text,
  `role` varchar(200) DEFAULT 'eleve',
  `present` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `usereleve`
--

INSERT INTO `usereleve` (`idUserEleve`, `nomEleve`, `prenomEleve`, `classeEleve`, `anneeScolaire`, `login`, `password`, `role`, `present`) VALUES
(1, 'Abed', 'Norhanne', 31, '2018-2019', 'ANorhanne', 'AbeNor7602', 'eleve', 1),
(2, 'Abed', 'Ranja', 31, '2018-2019', 'ARanja', 'AbeRan4853', 'eleve', 1),
(3, 'Al Sid Chikh', 'Chikh', 31, '2018-2019', 'AChikh', 'Al Chi8929', 'eleve', 1),
(4, 'Aldede', 'Vedat', 31, '2018-2019', 'AVedat', 'AldVed3254', 'eleve', 1),
(5, 'Altun', 'Ali', 31, '2018-2019', 'AAli', 'AltAli9462', 'eleve', 1),
(6, 'Alavaro', 'Eliezer', 31, '2018-2019', 'AEliezer', 'AlaEli8795', 'eleve', 1),
(7, 'Amoura', 'Reda', 31, '2018-2019', 'AReda', 'AmoRed6254', 'eleve', 1),
(8, 'Anani', 'Mikhail', 31, '2018-2019', 'AMikhail', 'AnaMik7409', 'eleve', 1),
(9, 'Antunes Da Fonseca', 'Mathéo', 31, '2018-2019', 'AMathéo', 'AntMat2602', 'eleve', 1),
(10, 'Arslan', 'Lisa', 31, '2018-2019', 'ALisa', 'ArsLis6982', 'eleve', 1),
(11, 'Ayad', 'Anissa', 31, '2018-2019', 'AAnissa', 'AyaAni6344', 'eleve', 1),
(12, 'Balay', 'Alexia', 31, '2018-2019', 'BAlexia', 'BalAle6732', 'eleve', 1),
(13, 'Bangy', 'Benoit', 31, '2018-2019', 'BBenoit', 'BanBen741', 'eleve', 1),
(14, 'Bara', 'Jenna-Maëlys', 31, '2018-2019', 'BJenna-Maë', 'BarJen5558', 'eleve', 1),
(15, 'Bara', 'Jenny-Mélodie', 31, '2018-2019', 'BJenny-Mél', 'BarJen8220', 'eleve', 1),
(16, 'Bekaoui', 'Anouar', 31, '2018-2019', 'BAnouar', 'BekAno7049', 'eleve', 1),
(17, 'Benchohra', 'Sahra', 31, '2018-2019', 'BSahra', 'BenSah5741', 'eleve', 1),
(18, 'Berroumana ', 'Chaïmane', 31, '2018-2019', 'BChaïmane', 'BerCha9000', 'eleve', 1),
(19, 'Boulery', 'Ethan', 31, '2018-2019', 'BEthan', 'BouEth2522', 'eleve', 1),
(20, 'Burkay', 'Diyar', 31, '2018-2019', 'BDiyar', 'BurDiy4155', 'eleve', 1),
(21, 'Chabane', 'Diya-Eddine', 31, '2018-2019', 'CDiya-Eddi', 'ChaDiy302', 'eleve', 1),
(22, 'Charda', 'Maryem', 31, '2018-2019', 'CMaryem', 'ChaMar5665', 'eleve', 1),
(23, 'Courtin', 'Orane', 31, '2018-2019', 'COrane', 'CouOra2009', 'eleve', 1),
(24, 'Dejean', 'Solomon', 31, '2018-2019', 'DSolomon', 'DejSol5169', 'eleve', 1),
(25, 'Derbal', 'Sana', 31, '2018-2019', 'DSana', 'DerSan4437', 'eleve', 1),
(26, 'Diallo', 'Mouhammad', 31, '2018-2019', 'DMouhammad', 'DiaMou1471', 'eleve', 1),
(27, 'Diamouangana', 'Kristie-Talianne', 31, '2018-2019', 'DKristie-T', 'DiaKri4922', 'eleve', 1),
(28, 'Diasila', 'Grace', 31, '2018-2019', 'DGrace', 'DiaGra4127', 'eleve', 1),
(29, 'Djafri', 'Kamel', 31, '2018-2019', 'DKamel', 'DjaKam1115', 'eleve', 1),
(30, 'Dos Santos Oliveira', 'Darlène', 31, '2018-2019', 'DDarlène', 'DosDar2085', 'eleve', 1),
(31, 'Egata', 'Orlane', 31, '2018-2019', 'EOrlane', 'EgaOrl2764', 'eleve', 1),
(32, 'Essombe', 'Shana', 31, '2018-2019', 'EShana', 'EssSha5923', 'eleve', 1),
(33, 'Fahim', 'Roumaissa', 31, '2018-2019', 'FRoumaissa', 'FahRou1060', 'eleve', 1),
(34, 'Fernando', 'Akash', 31, '2018-2019', 'FAkash', 'FerAka4262', 'eleve', 1),
(35, 'Friha', 'Hiba', 31, '2018-2019', 'FHiba', 'FriHib316', 'eleve', 1),
(36, 'Gana', 'Inâs', 31, '2018-2019', 'GInâs', 'GanInâ2323', 'eleve', 1),
(37, 'Guyot', 'Adam', 31, '2018-2019', 'GAdam', 'GuyAda5736', 'eleve', 1),
(38, 'Hadbi', 'Nassim', 31, '2018-2019', 'HNassim', 'HadNas587', 'eleve', 1),
(39, 'Hammami', 'Kylhian', 31, '2018-2019', 'HKylhian', 'P', 'eleve', 1),
(40, 'Izraouchene', 'Amina', 31, '2018-2019', 'IAmina', 'IzrAmi4286', 'eleve', 1),
(41, 'Kebli', 'Ayman', 31, '2018-2019', 'KAyman', 'KebAym287', 'eleve', 1),
(42, 'Kehli', 'Salim', 31, '2018-2019', 'KSalim', 'KehSal4257', 'eleve', 1),
(43, 'Kipulu Matoka', 'Déborha', 31, '2018-2019', 'KDéborha', 'KipDéb2478', 'eleve', 1),
(44, 'Lamrini', 'Ayoub', 31, '2018-2019', 'LAyoub', 'LamAyo4180', 'eleve', 1),
(45, 'Lima Sançao', 'Schilo', 31, '2018-2019', 'LSchilo', 'LimSch5221', 'eleve', 1),
(46, 'Malembo', 'Maxime Anthony', 31, '2018-2019', 'MMaxime An', 'MalMax8412', 'eleve', 1),
(47, 'Masson', 'Marina', 31, '2018-2019', 'MMarina', 'MasMar9708', 'eleve', 1),
(48, 'Mayiza-Galan', 'Veronica', 31, '2018-2019', 'MVeronica', 'MayVer9736', 'eleve', 1),
(49, 'Mazetier', 'Clément', 31, '2018-2019', 'MClément', 'MazClé1938', 'eleve', 1),
(50, 'Mekki', 'Bilel', 31, '2018-2019', 'MBilel', 'MekBil6929', 'eleve', 1),
(51, 'Monthule', 'Enzo', 31, '2018-2019', 'MEnzo', 'MonEnz7618', 'eleve', 1),
(52, 'Monthule', 'Hugo', 31, '2018-2019', 'MHugo', 'MonHug2000', 'eleve', 1),
(53, 'Moungabio', 'Ornella', 31, '2018-2019', 'MOrnella', 'MouOrn5561', 'eleve', 1),
(54, 'Mungenga', 'Zola Béni', 31, '2018-2019', 'MZola Béni', 'MunZol2290', 'eleve', 1),
(55, 'Nemlin Koffi', 'Sullyvann Arvyn', 31, '2018-2019', 'NSullyvann', 'NemSul3888', 'eleve', 1),
(56, 'Nguyen Van', 'Madygane', 31, '2018-2019', 'NMadygane', 'NguMad3582', 'eleve', 1),
(57, 'Niamkey', 'Elohim', 31, '2018-2019', 'NElohim', 'NiaElo7506', 'eleve', 1),
(58, 'Ntsourankoua', 'Merveille', 31, '2018-2019', 'NMerveille', 'NtsMer1700', 'eleve', 1),
(59, 'Ouaddah', 'Sabri', 31, '2018-2019', 'OSabri', 'OuaSab3919', 'eleve', 1),
(60, 'Palanisamy', 'Cindrella', 31, '2018-2019', 'PCindrella', 'PalCin5000', 'eleve', 1),
(61, 'Pannetier', 'Manon', 31, '2018-2019', 'PManon', 'PanMan5523', 'eleve', 1),
(62, 'Pombinho Sousa Barbosa', 'Bernardo Joao', 31, '2018-2019', 'PBernardo ', 'PomBer2075', 'eleve', 1),
(63, 'Przysiecki', 'Paul', 31, '2018-2019', 'PPaul', 'PrzPau2938', 'eleve', 1),
(64, 'Rahmani', 'Ruhin', 31, '2018-2019', 'RRuhin', 'RahRuh4020', 'eleve', 1),
(65, 'Ramdani', 'Amel', 31, '2018-2019', 'RAmel', 'RamAme4342', 'eleve', 1),
(66, 'Rassouad', 'Qassim', 31, '2018-2019', 'RQassim', 'RasQas8404', 'eleve', 1),
(67, 'Rekik', 'Wissar', 31, '2018-2019', 'RWissar', 'RekWis8622', 'eleve', 1),
(68, 'Rodrigues', 'Tiffany', 31, '2018-2019', 'RTiffany', 'RodTif2867', 'eleve', 1),
(69, 'Roinoldgeorgeraj', 'Nishan', 31, '2018-2019', 'RNishan', 'RoiNis9525', 'eleve', 1),
(70, 'Salah', 'Hakim', 31, '2018-2019', 'SHakim', 'SalHak828', 'eleve', 1),
(71, 'Seyfulova', 'Elis', 31, '2018-2019', 'SElis', 'SeyEli9830', 'eleve', 1),
(72, 'Shamurzaeva', 'Raiana', 31, '2018-2019', 'SRaiana', 'ShaRai2961', 'eleve', 1),
(73, 'Sigiscar', 'Willem', 31, '2018-2019', 'SWillem', 'SigWil9090', 'eleve', 1),
(74, 'Sissoko', 'Issa', 31, '2018-2019', 'SIssa', 'SisIss2364', 'eleve', 1),
(75, 'Sousa De Almeida', 'Joana', 31, '2018-2019', 'SJoana', 'SouJoa1283', 'eleve', 1),
(76, 'Sumanan', 'Solan', 31, '2018-2019', 'SSolan', 'SumSol2686', 'eleve', 1),
(77, 'Tambara', 'Salimatou', 31, '2018-2019', 'TSalimatou', 'TamSal8829', 'eleve', 1),
(78, 'Tigrine', 'Charlyn', 31, '2018-2019', 'TCharlyn', 'TigCha8060', 'eleve', 1),
(79, 'Williams', 'Athanaël', 31, '2018-2019', 'WAthanaël', 'WilAth4905', 'eleve', 1),
(80, 'Yatto', 'Abdelkader', 31, '2018-2019', 'YAbdelkade', 'YatAbd4271', 'eleve', 1),
(81, 'Yildiz', 'Ronay', 31, '2018-2019', 'YRonay', 'YilRon4575', 'eleve', 1),
(82, 'Zeghoudi', 'Hichem', 31, '2018-2019', 'ZHichem', 'ZegHic9655', 'eleve', 1);

-- --------------------------------------------------------

--
-- Structure de la table `userprof`
--

CREATE TABLE `userprof` (
  `idUserProf` int(200) NOT NULL,
  `nomProf` text,
  `prenomProf` text,
  `login` text,
  `password` text,
  `role` varchar(200) DEFAULT 'prof',
  `present` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `userprof`
--

INSERT INTO `userprof` (`idUserProf`, `nomProf`, `prenomProf`, `login`, `password`, `role`, `present`) VALUES
(1, 'Professeur', 'Fantome', 'PFantome', 'ProFan3780', 'fantome', 1),
(2, 'Fortin', 'Pascal', 'admin', '1962-vzîvo,d', 'admin', 1),
(3, 'Aupy Biamonti', 'Brigitte', 'ABrigitte', 'AupBri2256', 'prof', 1),
(4, 'Bartlet', 'Delina', 'BDelina', 'BarDel2889', 'prof', 1),
(5, 'Belet', 'Lucie', 'BLucie', 'BelLuc1255', 'prof', 1),
(6, 'Blampain', 'Pascaline', 'BPascaline', 'BlaPas5852', 'prof', 1),
(7, 'Boggio-Pola', 'Amelie', 'BAmelie', 'BogAme3407', 'prof', 1),
(8, 'Borgna', 'Margaux', 'BMargaux', 'BorMar4022', 'prof', 1),
(9, 'Bouacha', 'Nabil', 'BNabil', 'BouNab4454', 'prof', 1),
(10, 'Bougeard Belotti', 'Celine', 'BCeline', 'BouCel7244', 'prof', 1),
(11, 'Bouzimbou', 'Gabriel', 'BGabriel', 'BouGab4593', 'prof', 1),
(12, 'Campoy-Salaun', 'Julia', 'CJulia', 'CamJul3700', 'prof', 1),
(13, 'Canitrot', 'Valentin', 'CValentin', 'CanVal1691', 'prof', 1),
(14, 'Cochard', 'Alexandra', 'CAlexandra', 'CocAle3408', 'prof', 1),
(15, 'Colombani', 'Laetitia', 'CLaetitia', 'ColLae2580', 'prof', 1),
(16, 'Courtois', 'Jean-Christophe', 'CJean-Chri', 'CouJea5929', 'prof', 1),
(17, 'Crispet', 'Ophélie', 'COphélie', 'CriOph3666', 'prof', 1),
(18, 'Daubard', 'Eric', 'DEric', 'DauEri536', 'prof', 1),
(19, 'Debatty', 'Orianne', 'DOrianne', 'DebOri7196', 'prof', 1),
(20, 'Delhalle', 'Wesley', 'DWesley', 'DelWes7884', 'prof', 1),
(21, 'El M’Chichi', 'Driss', 'EDriss', 'El Dri265', 'prof', 1),
(22, 'Feltz', 'Oliver', 'FOliver', 'FelOli7422', 'prof', 1),
(23, 'Fontan', 'Celian', 'FCelian', 'FonCel656', 'prof', 1),
(24, 'Geoffroy', 'Audrey', 'GAudrey', 'GeoAud321', 'prof', 1),
(25, 'Hacquard', 'Guillaume', 'HGuillaume', 'HacGui6844', 'prof', 1),
(26, 'Herrero', 'Katherine', 'HKatherine', 'HerKat1267', 'prof', 1),
(27, 'Jubin', 'Fabienne', 'JFabienne', 'JubFab924', 'prof', 1),
(28, 'Kahukula', 'Masumbuko', 'KMasumbuko', 'KahMas7677', 'prof', 1),
(29, 'Khalef Nessah', 'Claire', 'KClaire', 'KhaCla6902', 'prof', 1),
(30, 'Larderet ', 'Anaïs', 'LAnaïs', 'LarAna6716', 'prof', 1),
(31, 'Laumuno', 'Cedric', 'LCedric', 'LauCed1527', 'prof', 1),
(32, 'Leduc', 'Etienne', 'LEtienne', 'LedEti7724', 'prof', 1),
(33, 'Lempereur', 'Lucie', 'LLucie', 'LemLuc594', 'prof', 1),
(34, 'Maaradji', 'Abdelhamid', 'MAbdelhami', 'MaaAbd4282', 'prof', 1),
(35, 'Marange', 'Benoît', 'MBenoît', 'MarBen3406', 'prof', 1),
(36, 'Martin', 'Cyril', 'MCyril', 'MarCyr7593', 'prof', 1),
(37, 'Martin', 'Michele', 'MMichele', 'MarMic7470', 'prof', 1),
(38, 'Maugere', 'Claire', 'MClaire', 'MauCla7939', 'prof', 1),
(39, 'Meilland', 'Candice', 'MCandice', 'MeiCan6430', 'prof', 1),
(40, 'Meslier', 'Anaïs', 'MAnaïs', 'MesAna4713', 'prof', 1),
(41, 'Moumbeki Mouiri', 'Thierry', 'MThierry', 'MouThi3053', 'prof', 1),
(42, 'Nogues', 'Christophe', 'NChristoph', 'NogChr8373', 'prof', 1),
(43, 'Olive', 'Allix', 'OAllix', 'OliAll4574', 'prof', 1),
(44, 'Ouanes', 'Amar', 'OAmar', 'OuaAma6508', 'prof', 1),
(45, 'Oury', 'Julien', 'OJulien', 'OurJul3590', 'prof', 1),
(46, '¨hilippon', 'Anne', '¨Anne', '¨hiAnn9393', 'prof', 1),
(47, 'Quesson', 'Emeline', 'QEmeline', 'QueEme3219', 'prof', 1),
(48, 'Ranger', 'Alexandra', 'RAlexandra', 'RanAle1976', 'prof', 1),
(49, 'Rech', 'Coralie', 'RCoralie', 'RecCor2259', 'prof', 1),
(50, 'Sassi', 'Lilia', 'SLilia', 'SasLil1558', 'prof', 1),
(51, 'Sissoko', 'Diaguily', 'SDiaguily', 'SisDia3397', 'prof', 1),
(52, 'Teyssier', 'Christine', 'TChristine', 'TeyChr6137', 'prof', 1),
(53, 'Vignon', 'Manon', 'VManon', 'VigMan182', 'prof', 1),
(54, 'Walter', 'Emilie', 'WEmilie', 'WalEmi4237', 'prof', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`idEntreprise`);

--
-- Index pour la table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`idStage`,`idUserEleve`,`idUserProf`,`idTuteur`),
  ADD KEY `fk_Stage_UserEleve_idx` (`idUserEleve`),
  ADD KEY `fk_Stage_UserProf1_idx` (`idUserProf`),
  ADD KEY `fk_Stage_Tuteur1_idx` (`idTuteur`);

--
-- Index pour la table `tuteur`
--
ALTER TABLE `tuteur`
  ADD PRIMARY KEY (`idTuteur`,`idEntreprise`),
  ADD KEY `fk_Tuteur_Entreprise1_idx` (`idEntreprise`);

--
-- Index pour la table `usereleve`
--
ALTER TABLE `usereleve`
  ADD PRIMARY KEY (`idUserEleve`);

--
-- Index pour la table `userprof`
--
ALTER TABLE `userprof`
  ADD PRIMARY KEY (`idUserProf`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `idEntreprise` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT pour la table `stage`
--
ALTER TABLE `stage`
  MODIFY `idStage` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tuteur`
--
ALTER TABLE `tuteur`
  MODIFY `idTuteur` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `usereleve`
--
ALTER TABLE `usereleve`
  MODIFY `idUserEleve` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT pour la table `userprof`
--
ALTER TABLE `userprof`
  MODIFY `idUserProf` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `fk_Stage_Tuteur1` FOREIGN KEY (`idTuteur`) REFERENCES `tuteur` (`idTuteur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Stage_UserEleve` FOREIGN KEY (`idUserEleve`) REFERENCES `usereleve` (`idUserEleve`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Stage_UserProf1` FOREIGN KEY (`idUserProf`) REFERENCES `userprof` (`idUserProf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tuteur`
--
ALTER TABLE `tuteur`
  ADD CONSTRAINT `fk_Tuteur_Entreprise1` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
