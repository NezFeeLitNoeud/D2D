-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 29 juin 2018 à 10:38
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `D2D`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `page` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `page`) VALUES
(1, 'Drone Racing', 'dr.php'),
(2, 'Drone Pro', 'dp.php'),
(3, 'Drone Camera', 'dc.php'),
(4, 'Drone Loisir', 'dl.php');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id_drone` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `nom_drone` varchar(100) NOT NULL,
  `prix` float NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `autonomie` text NOT NULL,
  `poids` int(11) NOT NULL,
  `camera` varchar(100) NOT NULL,
  `vitesse` int(11) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id_drone`, `id_cat`, `nom_drone`, `prix`, `image`, `description`, `autonomie`, `poids`, `camera`, `vitesse`, `code`) VALUES
(1, 1, 'TBS OBVLIVION PNP', 330, '/D2D/products_pictures/tbs-oblivion-pnp.jpg', 'Le premier drone racer monocorps en polymère composite injecté.\r\nRace Ready, 120 km/h de vitesse maximale et jusqu\'à 11 minutes de temps de vol hors de la boîte.', '11', 315, 'Caméra TBS Oblivion 650TVL FPV', 120, 'tbs330'),
(2, 1, 'SKITZO NOVA BNF BY DFR', 599, '/D2D/products_pictures/skitzo-nova-bnf-by-dfr.jpg', 'Le SKITZO Nova est conçu pour la FPV freestyle et dispose d\'une conception avec batterie sur le dessus et d\'un corps symétrique en fibre de carbone.\r\nNous avons équipé cette version avec les composant skitzo ,moteur Lumenier Skitzo et Carte de vol FlightOne Skitzo OSD, des composant tous aussi excellent une predator mini et une esc Lunenier BlHeli 32.', '15', 240, '', 100, 'ski599'),
(4, 1, 'Eachine Aurora 68 BNF ', 129, '/D2D/products_pictures/eachine.jpg', 'Eachine a rétréci son Aurora 90 pour en faire un Aurora 68. 68mm c\'est la taille du Tiny Whoop, mais l\'Aurora 68 est équipé de moteurs Brushless 1102 11500Kv, d\'un ESC 4 en 1 10A BlHeli_S comptabile DSHOT. \r\nSon châssis en carbone, ses protections d\'hélices et d\'antenne en font la machine idéale pour des vols ultra nerveux dans votre salon ! Le contrôleur de vol est F3 sous BetaFlight 3.1. la partie FPV est assuré par un combo caméra/émetteur CMOS 600TVL, 25mW 48 canaux en 5.8 Ghz.\r\nDisponible avec un récepteur FlySky.\r\n', '13', 48, 'CMOS 600 lignes', 110, 'eac129'),
(5, 1, 'IFLIGHT RACER IX3 V2 140MM BNF BY DFR', 299, '/D2D/products_pictures/iflight-racer.jpg', 'La nouvelle version de l&#39;ix3 d&#39;iflight avec des\r\nplaques 100% carbone,ici dans sa version BNF by DFR.', '15', 66, 'Camera FPV CCD HS1177 V2 - 600TVL', 100, 'ifl299'),
(6, 2, 'H520 + CAMÉRA THERMIQUE CGO-ET YUNEEC', 3499, '/D2D/products_pictures/yuneec-h520.jpg', '1 x Yuneec H520 homologué 1S &amp; S3 RTF\r\nYuneec dévoile son dernier multirotor : le H520. Ce drone destiné\r\naux professionnels, est une optimisation de son prédécesseur, le\r\nTyphon H Pro.\r\nGrâce à sa motorisation plus puissante, pouvant transporter une\r\ncharge de 500g ainsi qu&#39;un temps de vol pouvant atteindre 31\r\nminutes, ce nouveau drone vous promet de beaux vols.\r\nDe plus, sa couleur orange mat, a l&#39;avantage de le rendre bien\r\nvisible durant le vol. Il est également muni d’une fonction vol\r\nd’urgence, qui le rend capable de voler avec seulement 5 rotors\r\nen marche sur ses 6 initiaux.\r\n+\r\n1 x Gimbal CGO-ET Infra-Rouge et faible luminosité Yuneec H520', '30 minutes', 1890, '', 150, 'h52349'),
(7, 2, 'BEBOP-PRO THERMAL PARROT', 1319, '/D2D/products_images/bebop_pro.png', 'Solution de modélisation 3D accessible grâce au Bebop 2 et à\r\nPix4D. Développé pour les professionnels du batiments, le\r\ndrone aide à créer des contenus et modèles 3D\r\nphotoréalistes. Avec le logiciel Pix4Dmodel, le Bebop-Pro est\r\nun outil polyvalent permettant aux professionnels d&#39;identifier\r\nles travaux à effectuer, lancer de nouveaux projets et\r\npromouvoir les biens en ligne.', '25', 500, '- Caméra RGB Full HD 1080P\r\n- Caméra Thermique FLIR One Pro', 58, 'beb179'),
(8, 2, 'SPLASH DRONE AUTO+ COASTGUARD ORANGE RTF', 1799, '/D2D/products_pictures/spl_sp1a-9.png', 'Ce drone multifonction est totalement étanche. Il\r\npeut être utilisé pour des missions de prise de vue,\r\nd&#39;insepction, de sécurité, de largage, dans les\r\ncondition les plus humide. Sa coque étanche et son\r\ntratement particulier assure également la flotabilité\r\ndu drone en cas de chute dans l&#39;eau.\r\nIl dispose en outre de toutes les application moderne\r\nde vol assurant sa stabilité et sa sécurité. Depuis un\r\nsmartphone ou une tablette il vous sera possible\r\nd&#39;utiliser Follow me, Mode AUto Waypoint, Circle\r\nFlight, Guide mode...', '20', 2300, '', 76, 'spl179'),
(9, 2, 'Sous-marin PowerRay – PowerVision', 1699, '/D2D/products_pictures/Sous-marin.jpg', 'Powervision nous dévoile son drone sous-marin nommé\r\nPowerRay, capable d&#39;aller jusqu&#39;à une profondeur de 30\r\nmètres !\r\nIl dispose d&#39;une caméra UHD 4K intégrée permettant de\r\nréaliser des prises de vues sous l&#39;eau jusqu&#39;en 4K@30 i/s !\r\nCes drones sous-marins sont destinés aux professionnels et\r\nserviront notamment pour l&#39;inspection de coques de bâteaux,\r\npour réaliser des prises de vues sous-marines ou encore pour\r\ninspecter les coraux.\r\nLe PowerRay sera idéal pour l&#39;inspection sous-marine et pour\r\nles activités de pêche grâce à ses lumières LED permettant de\r\nmieux voir et d&#39;attirer les poissons.', '60 à 120', 3800, '', 7, 'pow169'),
(10, 3, 'DJI Phantom 4 Pro &amp; Pro+', 1699, '/D2D/products_pictures/dji-phantom.jpg', 'Le DJI Phantom 4 Pro est une version évoluée du drone\r\nPhantom 4 disposant d&#39;une caméra 4K @60ims, d&#39;une\r\nnouvelle radio plus compacte et de la détection\r\nd&#39;obstacles à 360°. Le DJI Phantom 4 Pro récupère les\r\nmeilleures caractéristiques de son prédécesseur et les\r\naméliore.\r\nDeux versions vous sont proposées : le DJI Phantom 4\r\nPro (radio avec support pour smartphone/tablette) et le\r\nDJI Phantom 4 Pro + (radio avec tablette 5&quot; intégrée).', '30', 1388, '4k', 70, 'dji169'),
(11, 4, 'Drone Star Wars Tie Advanced X1', 169, '/D2D/products_images/StarWars.jpg', 'Rejoignez le côté obscur de la force et pilotez le chasseur de Dark Vador. Affrontez des amis avec le drone X1, lancez -vous dans des figures aériennes et des combats épiques pour repousser l\'Alliance rebelle.\r\n\r\nÉquipé d’un gyroscope 6 axis, ce drone Star Wars est d’une stabilité incroyable. Il intègre de nombreux capteurs pour vous faire revivre les plus grands moments de cette saga spatiale aux commandes d\'un drone collector.', '8', 2300, 'aucune', 40, 'sta169'),
(12, 4, 'DJI spark', 499, '/D2D/products_images/dji-spark.jpg', 'DJI Spark est un mini drone spécialisé dans le selfie, un\r\ndronie, qui vous permettra de saisir l&#39;instant présent sous un\r\npoint de vue unique, depuis les airs.\r\nUltra portable, le Spark se pilote de trois façons différentes :\r\nsmartphone, radiocommande ou par gestes ! Doté d’une\r\nnacelle stabilisée 2 axes, le Spark dispose d’une caméra\r\nhaute performance capable de filmer en Full HD 1080p et de\r\nphotographier en 12MP.', '18', 230, 'HD', 78, 'dji499'),
(13, 4, 'Drone Transformer QimmiQ', 149, '/D2D/products_pictures/Qimmiq.jpg', 'Le QimmiQ Transformer est un drone hybride capable de voler\r\ndans les airs mais également de rouler sur la terre ferme une\r\nfois muni de roues.\r\nEquipé d&#39;une caméra HD 720P, le Transformer peut prendre\r\nphotos et vidéos depuis l&#39;application smartphone dédiée et\r\nprofitez également d&#39;un retour vidéo directement sur votre\r\nsmartphone grâce au module Wi-fi intégré.\r\nEnfin, le Transformer profite d&#39;assistances en vol comme le\r\nReturn to home, l&#39;atterrissage automatique ou encore Flip\r\n360°.', '13', 250, 'HD 720P 25 FPS', 90, 'qim149');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(132) COLLATE utf8_unicode_ci NOT NULL,
  `mail` text CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `adresse` text COLLATE utf8_unicode_ci NOT NULL,
  `code_postale` int(5) NOT NULL,
  `ville` text COLLATE utf8_unicode_ci NOT NULL,
  `idpublic` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mail`, `password`, `adresse`, `code_postale`, `ville`, `idpublic`) VALUES
(39, 'NEHLIG', 'Nepheline', 'nepheline@gmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5expIJYDr7nZEI9QsATOgrLPe8rEBG/Wi', '13 rue de l\'egalite', 77580, 'Crecy la chapelle', '5b2cdae7d9d3d'),
(40, 'ROBLEDA', 'Nadia', 'nadia@gmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5eAoZjjrNGtpHkG9ixlYw5JlRwmYWlDNq', '9 allée des chiens', 99453, 'Bussy', '5b2cdba63004f'),
(41, 'Teste', 'Teste', 'teste@gmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5eKnIrxbyYrqh.L4TrtbzkCogFzV.mUv.', 'Teste', 46789, 'Teste', '5b2e33be0a0be'),
(42, 'Choubidou', 'Choubidou', 'choubidou@gmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5eZG2JY4EAN4k.5qY6v0TNtkdrMxB1BvK', 'Choubidou', 12345, 'Choubidou', '5b2e4a6ef0302'),
(43, 'Emi', 'Emi@gmail.com', 'emi@gmail.com', '$2a$10$1qAz2wSx3eDc4rFv5tGb5e7cCeVryvX.fgwPY3vPHP63qzM848wEK', 'Prout', 77640, 'Pouet', '5b336476876f4');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_drone`),
  ADD KEY `id_cat_const` (`id_cat`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id_drone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `id_cat_const` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
