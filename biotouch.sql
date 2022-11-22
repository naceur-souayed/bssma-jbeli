-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 16 nov. 2022 à 13:12
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biotouch`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category`, `image`, `created_at`) VALUES
(5, 'Corps', 'corps.jpg', '2022-07-23 18:20:34'),
(6, 'Visage', 'visage.jpg', '2022-07-23 18:20:34'),
(7, 'Cheveux', 'cheveux.jpg', '2022-07-23 18:23:54'),
(8, 'main', 'main.jpg', '2022-07-23 18:22:50'),
(9, 'Demaquillyant', 'demaquilage.jpg', '2022-08-04 20:39:49');

-- --------------------------------------------------------

--
-- Structure de la table `orderlines`
--

CREATE TABLE `orderlines` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `reduction` varchar(50) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `price` int(100) NOT NULL,
  `Id_category` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `reference`, `title`, `content`, `image`, `price`, `Id_category`, `created_at`) VALUES
(150, 111, 'L\'huile de sésame', 'L\'huile de sésame pressée à froid est maintenant disponible\r\nParmi ses bienfaits les plus importants pour la peau et les cheveux :\r\n  Nettoie la peau et désincruste les pores\r\n  Combat la peau sèche\r\n  Combat les rides\r\n  Unifie le teint\r\n  Traite les boutons sur le visage\r\n', 'huile_sésame.png', 30, 6, '2022-11-01 16:59:42'),
(151, 112, 'l\'huile de graines de cresson', 'Vos cheveux vous fatiguent de pots-de-vin, ils ne poussent pas longtemps et se fourchent \r\nPourquoi attendez-vous pour essayer l\'huile de graines de cresson, notre sachet original \r\nIl est pressé à froid avec la dernière technologie\r\nNourrit le cuir chevelu\r\nAugmente sa longueur et sa densité\r\nIl prévient l\'écaillage et le protège du dessèchement\r\nHydrate les cheveux et leur donne un éclat naturel\r\nLisse et facile à coiffer\r\nPrévient les frisottis et renforce ses follicules\r\nPrévient les pellicules et protège les cheveux de la casse', '1667319794huile_cresson.png', 25, 7, '2022-11-12 13:11:57'),
(152, 113, 'L\'huile de graine noire', 'L\'huile de graine noire contient de nombreux acides gras essentiels.\r\nIl contient également de la Nigellone, un antioxydant naturel, ainsi que du glutathion.\r\nEn plus de contenir de l\'acide arginine.\r\nTout cela fait de l\'huile de Nigella sativa de nombreux bienfaits dont les plus importants sont :\r\nstopper la chute des cheveux\r\nMaintenir un cuir chevelu sain\r\nStimulation de la croissance et de la germination des cheveux\r\nprévenir le grisonnement\r\nCheveux hydratants\r\nÉlimine les pointes fourchues', '1667320189huile_Nigella_sativa .jpg', 40, 7, '2022-11-12 13:12:04'),
(153, 114, 'L\'huile de moutarde', 'L\'huile de moutarde est l\'une des huiles rares les plus importantes, qui se caractérise par plusieurs propriétés et de multiples utilisations\r\nAujourd\'hui, nous allons parler des avantages les plus importants des cheveux\r\nAide à lutter contre la chute des cheveux\r\nStimule la croissance des cheveux (ce qui signifie qu\'il fonctionne pour prolonger les cheveux en peu de temps)\r\nFonctionne pour adoucir et hydrater les cheveux (combat la casse des cheveux)\r\nNourrit la fibre capillaire, apporte brillance et douceur aux cheveux\r\ncombattre les pellicules', '1667319385huile_moutarde.png', 40, 7, '2022-11-12 13:12:09'),
(154, 115, 'Lhuile de Biotouch', 'J\'en ai marre de tes cheveux et je ne trouve pas la solution\r\nAvec Biotouch, quelle est la solution ?\r\nVos cheveux ne veulent pas être longs jusqu\'à ce que vos cheveux aient toujours la même longueur et vous nourrissent avec une brosse, et vos cheveux ne renversent pas une brosse au point que vous ayez des espaces dans votre cuir chevelu\r\nLes fentes et les piqûres vous ont torturé et vous ont gâté. Décorez vos cheveux\r\nVous vous en détendrez progressivement après avoir utilisé l\'huile de \"Biotouch\".\r\nNotre huile se compose d\'huile d\'olive vierge et de 4 huiles pressées à froid, et nous n\'oublions pas environ 18 herbes responsables du renforcement et de la prolongation des cheveux.', 'huile_biotouch.jpg', 50, 7, '2022-11-12 13:12:12'),
(155, 116, 'Sérum éclaircissant', 'L\'un des produits les plus populaires de Biotouch\r\nSérum éclaircissant pour la peau au toucher blanc\r\nOuvre la peau, unifie sa couleur et traite les taches causées par l\'acné et les effets des grains\r\nIl garantit la pureté et l\'éclat de la peau, disponible pour les peaux sèches et grasses', 'serum_biotouch.jpg', 65, 6, '2022-11-12 13:12:16'),
(156, 117, 'Vitamine E', 'Combattre les signes du vieillissement\r\n  Activité anti-inflammatoire sur la peau (utile en cas de coup de soleil, ...)\r\n\r\n  Aide à maintenir l\'élasticité et l\'hydratation de la peau en renforçant la couche hydrolipidique de la peau.', '1667323254vitamine.jpg', 15, 6, '2022-11-12 13:12:19'),
(157, 118, 'Vitamine C', 'Avec une exposition prolongée au soleil, de nombreuses taches brunes apparaissent sur la peau\r\nVoici un sérum à la vitamine C pour éclaircir la peau et unifier sa couleur\r\nUnifie le teint, l\'ouvre et élimine les taches brunes', 'vitamine_c.jpg', 25, 6, '2022-11-12 13:12:22'),
(158, 119, 'Gel Nettoyant', 'Parce que le nettoyage est l\'étape la plus importante des soins de la peau\r\nNous avons sélectionné pour vous les meilleurs produits pour nettoyer le visage de la poussière\r\nEt éliminer les impuretés.\r\n\r\nNettoyant visage pour peaux sensibles et sèches, il nettoie la peau en douceur, maintient son élasticité et ne provoque pas de dessèchement et rend la peau plus lumineuse et éclatante\r\n\r\nLe nettoyant visage, pour peaux mixtes et grasses, nettoie la peau, aide à ajuster la proportion de sécrétions de sébum et réduit l\'apparence des boutons.', 'gel_nettoyant.jpg', 70, 9, '2022-11-12 13:12:26'),
(159, 1110, 'Crème blanchissante ', 'L\'un des produits les plus populaires de Biotouch\r\nCrème blanchissante pour la peau au toucher blanc\r\nOuvre la peau, unifie sa couleur et traite les taches causées par l\'acné et les effets des grains\r\nIl assure pureté et éclat à la peau, disponible pour les peaux sèches et grasses', 'creme_white.jpg', 55, 6, '2022-11-12 13:12:31'),
(160, 1111, 'crème éclaircissant', 'crème éclaircissant\r\n  TOUCHE BLANCHE\r\nMaintient votre peau éclatante, hydratée et souple\r\nUnifie le teint, réduit les taches brunes et élimine les cicatrices d\'acné\r\nDisponible pour les peaux sèches et grasses', 'creme_hydratante.jpg', 45, 5, '2022-11-12 13:12:38'),
(161, 1112, 'Le beurre corporel', 'Le beurre corporel est riche en protéines de soie pure et en antioxydants.\r\n  Il offre une bonne hydratation ainsi qu\'une bonne protection.\r\nConvient à tous les types de peau', 'beurre_corporel.jpg', 35, 5, '2022-11-12 13:12:44'),
(162, 1113, 'Acne Stop contre l\'acné', 'Le nouveau produit de la gamme \"acne stop\" contre l\'acné\r\nUn toner naturel qui purifie la peau des impuretés et la rafraîchit.Ses principaux ingrédients : extrait d\'eau de romarin, lavande distillée, qui a une propriété désinfectante et anti-acné.\r\nTous les composants de la gamme \"ACNE STOP\" éliminent les boutons, combattent l\'acné et les points noirs, nettoient les pores et éliminent les bactéries sous la peau.\r\nUn ensemble spécial contenant de l\'extrait d\'huile d\'arbre à thé, de l\'huile essentielle de lavande et de l\'acide salicylique', 'acne_stop.jpg', 55, 9, '2022-11-12 13:12:48'),
(163, 1114, 'Eau tonique avec vitamine C', 'Pour une peau nette et uniforme, sans taches ni traces d\'acné, on ne trouve pas mieux que les produits TOUCH blancs\r\nQui agit pour éliminer les taches brunes de la peau et unifier visiblement sa couleur pour paraître plus lisse et plus lumineuse au fil du temps\r\nRiche en Vitamine C', 'eau_tonique.png\r\n', 55, 9, '2022-11-12 13:12:52'),
(164, 1115, 'hydraté la peau et le corps ', 'Utilisez-le le soir après avoir nettoyé et hydraté la peau et le corps avec de la crème\r\nPour vous assurer une peau pure', 'serum_corps.jpg', 45, 5, '2022-11-12 13:12:56'),
(165, 1116, 'Déodorant bio', 'déodorant bio %\r\nUn déodorant naturel au parfum doux aux propriétés antibactériennes idéales pour éclaircir vos aisselles et vous donner confiance tout au long de la journée\r\n100% naturel\r\nune efficacité contre\r\nles odeurs\r\net la transpiration.\r\n  Sans alcool, sans sels d\'aluminium', 'creme_paradise.jpg', 33, 5, '2022-11-12 13:13:00'),
(166, 1117, 'hydratante pour les mains', 'Une crème hydratante pour le corps, les mains et les jambes d\'un groupe composé d\'huile végétale biotouch, beurre (cacao + karité) , sel de bain  .\r\nIl donne des résultats étonnants et garantis', 'gommage_corps.jpg', 40, 8, '2022-11-12 13:13:03'),
(167, 1118, 'Creme avec argile pour les mains', 'Une crème hydratante pour le corps, les mains et les jambes d\'un groupe composé d\'huile végétale biotouch et argile   .\r\nIl donne des résultats étonnants et garantis', 'gommage_argile.png', 55, 8, '2022-11-12 13:13:06'),
(168, 1119, 'Gommage pour les mains', 'Une crème hydratante pour le corps, les mains et les jambes d\'un groupe composé de sel de bain , cire d\'abeille , huile d\'abricot, noix de coco et huile de rose   .\r\nIl donne des résultats étonnants et garantis', 'masque.jpg', 70, 8, '2022-11-12 13:13:13'),
(169, 1120, 'Aloe Vera', 'Aloe Vera : apaisant, apaisant, anti-inflammatoire, antibactérien, contient de l\'allantoïne qui aide à la cicatrisation des plaies, un hydratant anti-oxydant et un vieillissement prématuré', 'aloevera_corps.jpg', 35, 5, '2022-11-12 13:13:21'),
(170, 1121, 'Lait de corps', 'Lait de corps biotouch \r\nLes goûts disponibles :\r\ncoco vanille,\r\npêche,\r\nmusc blanc,\r\nfleuri.\r\nCrème nourrissante \r\nHydrater la peau ', 'lait_corps.jpg', 50, 5, '2022-11-12 13:13:26'),
(171, 1122, 'Masque gommage pour visage', 'Nouveauté de biotouch\r\nMasque gommage\r\nUn produit 100% naturel composé des ingrédients les plus précieux riches en minéraux et vitamines, et des composants les plus importants :\r\nL\'argile : selon le type de peau (l\'argile rouge, blanche, jaune et verte) est riche en minéraux les plus fins, comme le potassium, le calcium, le zinc... Les tâches sont nombreuses, parmi lesquelles éclaircir la couleur de la peau tout en l\'unifiant, protéger la peau peau des rayons ultraviolets, stimulant la production de collagène, hydratation profonde', 'masque_gommage_visage.jpg', 80, 6, '2022-11-12 13:13:32'),
(172, 1123, 'le spray capillaire anti chute', 'Tes cheveux ont peur de tomber et de traverser tes draps vides\r\nN\'attendez plus pour essayer le spray capillaire anti chute de Biotouch\r\nC\'est un groupe d\'eau distillée composé de:\r\neau distillée de romarin\r\neau d\'incendie\r\neau de thym\r\nRand eau\r\neau de girofle\r\nEt la chose la plus importante pour vous aider est de faire pousser vos cheveux en peu de temps', 'capillaire_anti_chute.jpg', 60, 7, '2022-11-12 13:13:37'),
(173, 1124, 'Huile de ricin', 'Huile de ricin\r\nHydrate les cheveux dès la première utilisation\r\n  Élimine les pointes fourchues dès la deuxième utilisation\r\n  Les cheveux s\'allongent après un mois d\'utilisation\r\n  empêche la perte\r\n  Renforce les cheveux\r\n  Nourrit le cuir chevelu\r\n  Stimule la croissance des cheveux en peu de temps\r\n  Il corrige la plupart des problèmes de cheveux tels que la grossièreté et la matité.\r\nPour cheveux fins, secs, cassants, abîmés, pour cheveux très rêches', 'huile_ricin.png', 45, 7, '2022-11-12 13:13:42');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_post` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(11) NOT NULL,
  `reponse` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `adress`, `admin`) VALUES
(1, 'test', 'testtest@gmail.com', '$2y$10$W3D62SYzbmT308EiXrDnEegNvVMGwjDN6B7FYex0BnV5UkmpPAlrm', '', '', 1),
(10, 'test', 'test@gmail.com', '$2y$10$T6qpmjDNiQFoLAOE5ocxJuA4bi/MtcaE6hCcgv15sIHvpl24iwfPK', '12345678', 'ariana', 0),
(11, 'test', 'testtest@gmail.com', '$2y$10$W3D62SYzbmT308EiXrDnEegNvVMGwjDN6B7FYex0BnV5UkmpPAlrm', '12345678', 'ariana', 0),
(12, 'a', 'a@a.fr', '$2y$10$5K82WWN1NvFs5PBruepUR.JLvPVj9RsYmmkORpVqcvuva22U98ba2', '123456789', 'ariana', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orderlines`
--
ALTER TABLE `orderlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_category` (`Id_category`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `id_post` (`id_post`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `orderlines`
--
ALTER TABLE `orderlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=811;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orderlines`
--
ALTER TABLE `orderlines`
  ADD CONSTRAINT `orderlines_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderlines_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`Id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `reponses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reponses_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
