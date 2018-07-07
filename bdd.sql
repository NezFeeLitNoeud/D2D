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
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id_com` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `code_drone` text NOT NULL,
  `prix` int(100) NOT NULL,
  `couleur` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `id_drones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id_drone` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `nom_drone` varchar(100) NOT NULL,
  `prix` float(8,2) NOT NULL,
  `image` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `image4` text NOT NULL,
  `image5` text NOT NULL,
  `logo` text NOT NULL,
  `description` text NOT NULL,
  `caracteristiques` text NOT NULL,
  `autonomie` text NOT NULL,
  `poids` int(11) NOT NULL,
  `camera` varchar(100) NOT NULL,
  `vitesse` int(11) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id_drone`, `id_cat`, `nom_drone`, `prix`, `image`, `image2`, `image3`, `image4`, `image5`, `logo`, `description`, `caracteristiques`, `autonomie`, `poids`, `camera`, `vitesse`, `code`) VALUES
(1, 1, 'TBS OBVLIVION PNP', 330.90, '/D2D/products_pictures/tbs-oblivion-pnp.jpg', '/D2D/products_pictures/pictures_foreach/drone_rc/drone_oblivion/tbs-oblivion-pnp.jpg', '/D2D/products_pictures/pictures_foreach/drone_rc/drone_oblivion/tbs-oblivion-pnp2.jpg', '/D2D/products_pictures/pictures_foreach/drone_rc/drone_oblivion/tbs-oblivion-pnp3.jpg', '', '/D2D/products_pictures/pictures_foreach/drone_rc/drone_oblivion/logo_oblivion.png', 'Le premier drone racer monocorps en polymère composite injecté.\r\nRace Ready, 120 km/h de vitesse maximale et jusqu\'à 11 minutes de temps de vol hors de la boîte.', 'Temps de vol: 3-4 minutes typique, jusqu\'à 11 minutes avec 1300mAh 4S.\r\n\r\nPoids: 315g sans batterie\r\n\r\nMoteurs: Custom Cobra CT-2205-2400kV\r\n\r\nBatterie: 4S LiPo 1300mAh - 2200mAh\r\nHélice: Hélices HQ 5 × 4.5 × 3 V3 Tri-Blade\r\nContrôleur de vol: TBS Colibri F3 avec BetaFlight 3.3\r\nESC: BLHeli-S Multishot TBS PowerCube 20A 6S ESC\r\nCaméra TBS Oblivion 650TVL FPV\r\nTransmetteur vidéo: TBS FPVision\r\nCompatibilité du récepteur: compatible CRSF, S-Bus, Spektrum ™', '11', 315, 'Caméra TBS Oblivion 650TVL FPV', 120, 'tbs330'),
(2, 1, 'SKITZO NOVA BNF BY DFR', 599.00, '/D2D/products_pictures/skitzo-nova-bnf-by-dfr.jpg', '/D2D/products_pictures/pictures_foreach/drone_rc/drone_skitzo/skitzo-nova-bnf-by-dfr2.jpg', '/D2D/products_pictures/pictures_foreach/drone_rc/drone_skitzo/skitzo-nova-bnf-by-dfr3.jpg', '/D2D/products_pictures/pictures_foreach/drone_rc/drone_skitzo/skitzo-nova-bnf-by-dfr4.jpg', '', '/D2D/products_pictures/pictures_foreach/drone_rc/drone_skitzo/logo_skitzo.jpg', 'Le SKITZO Nova est conçu pour la FPV freestyle et dispose d\'une conception avec batterie sur le dessus et d\'un corps symétrique en fibre de carbone.\r\nNous avons équipé cette version avec les composant skitzo ,moteur Lumenier Skitzo et Carte de vol FlightOne Skitzo OSD, des composant tous aussi excellent une predator mini et une esc Lunenier BlHeli 32.', 'Cellule en fibre de carbone True-X 3K avec bras amovibles de 4mm.\r\nBatterie sur le dessus  pour un excellent équilibre pendant le vol freestyle.\r\nPress Nut pour un retrait rapide des bras.\r\nFibre de carbone japonaise ultra légère, durable, sablée et chanfreinée.\r\nEntretoises de 20 mm pour un design élégant à profil bas - Système de montage GoPro intégré.\r\nEntretoises anodisées noires à prise facile.\r\nPrend en charge des formats 20 et 30 mm pour une grande variété de contrôleurs de vol.\r\nBras de verrouillage uniques en spirale pour un maintien et une stabilité de vol optimaux.\r\nQuincaillerie en titane traité thermiquement.\r\nPointes de bras pour une protection extrême du moteur lors d\'accidents.\r\nPersonnalisez votre cadre Nova avec des skins uniques supplémentaires (vendues séparément).', '15', 240, '', 100, 'ski599'),
(3, 1, 'Eachine E010S BNF', 75.00, '/D2D/products_pictures/eachine.jpg', '/D2D/products_pictures/pictures_foreach/drone_rc/drone _eachine/eachine-e010s-bnf-p-image-187437-grande.jpg', '/D2D/products_pictures/pictures_foreach/drone_rc/drone _eachine/eachine-e010s-bnf-vue-de-derssus-p-image-187441-grande.jpg', '/D2D/products_pictures/pictures_foreach/drone_rc/drone _eachine/eachine-e010s-bnf-vue-de-dessous-p-image-187443-grande.jpg', '', '/D2D/products_pictures/pictures_foreach/drone_rc/drone _eachine/logo-eachine.png', 'Le E010S de Eachine est un E010 transformé en Tiny Whoop. Vous n\'avez rien à faire, tout à été préparé pour vous.\r\n\r\nEachine reprend son E010 et lui ajoute un combo caméra/émetteur EF-02 de 40 canaux 25mW posé sur un contrôleur de vol F303 pour moteurs brushed. Pour alimenter tout ça, une batterie LiPo 1S 150mAh 45C est fournie. Le tout affiche un poids de 25 grammes sur la balance !\r\n\r\nDisponible avec un récepteur FrSky (en D8), FlySky ou DSM2\r\nDisponible avec un récepteur FlySky.\r\n', 'Type de châssis Châssis en X.\r\nMatériaux Plastique.\r\nPoids 25 grammes.\r\nMoteurs 15946 Kv.\r\nRécepteur FRSky, FlySky ou DSM2 au choix.\r\nContrôleur de vol Contrôleur de vol F303.\r\nBatterie Lipo 1S 3,7V 150mAh 45C.', '13', 25, '1/3 CMOS ', 110, 'eac129'),
(4, 1, 'IFLIGHT RACER IX3 V2 140MM BNF BY DFR', 323.70, '/D2D/products_pictures/iflight-racer.jpg', '/D2D/products_pictures/pictures_foreach/drone_rc/drone_iflight/iflight-racer-ix3-v2-140mm-bnf-by-dfr.jpg', '/D2D/products_pictures/pictures_foreach/drone_rc/drone_iflight/iflight-racer-ix3-v2-140mm-bnf-by-dfr 2.jpg', '/D2D/products_pictures/pictures_foreach/drone_rc/drone_iflight/iflight-racer-ix3-v2-140mm-bnf-by-dfr 3.jpg', '', '/D2D/products_pictures/pictures_foreach/drone_rc/drone_iflight/logo_iflight.jpg', 'La nouvelle version de l&#39;ix3 d&#39;iflight avec des\r\nplaques 100% carbone,ici dans sa version BNF by DFR.', 'Moteur à moteur : 140mm.\r\nEpaisseur top plate: 2 mm.\r\nEpaisseur main plate:4 mm.\r\nPoids: environ 66 g.\r\nInclus:\r\n1x Chassis Iflight iX3 V2.\r\n1x FC Omnibus F4 nano v3.\r\n1x Wave 4in1 ESC 4x10A – 2020.\r\n4x Moteur Emax RS1306 - 3300 Kv \"Race spec\".\r\n1x Recepteur Frsky R-XSR.\r\n1x émetteur mini ATX 03 - 72ch – 0-25-50-200mw.\r\n1x Camera FPV CCD HS1177 V2 – 600TVL.\r\n1x set d\'helices gemfan 3052.', '15', 66, 'Camera FPV CCD HS1177 V2 - 600TVL', 100, 'ifl323'),
(5, 2, 'H520 + CAMÉRA THERMIQUE CGO-ET', 3499.00, '/D2D/products_pictures/h520.jpg', '/D2D/products_pictures/pictures_foreach/drone_pro/drone_h520/BDL-H520CGOETDS-2.jpg', '/D2D/products_pictures/pictures_foreach/drone_pro/drone_h520/h.png', '/D2D/products_pictures/pictures_foreach/drone_pro/drone_h520/BDL-H520CGOETDS-9.jpg', '', '/D2D/products_pictures/pictures_foreach/drone_pro/drone_h520/logo_yuneec.png', '1 x Yuneec H520 homologué 1S &amp; S3 RTF\r\nYuneec dévoile son dernier multirotor : le H520. Ce drone destiné\r\naux professionnels, est une optimisation de son prédécesseur, le\r\nTyphon H Pro.\r\nGrâce à sa motorisation plus puissante, pouvant transporter une\r\ncharge de 500g ainsi qu&#39;un temps de vol pouvant atteindre 31\r\nminutes, ce nouveau drone vous promet de beaux vols.\r\nDe plus, sa couleur orange mat, a l&#39;avantage de le rendre bien\r\nvisible durant le vol. Il est également muni d’une fonction vol\r\nd’urgence, qui le rend capable de voler avec seulement 5 rotors\r\nen marche sur ses 6 initiaux.\r\n+\r\n1 x Gimbal CGO-ET Infra-Rouge et faible luminosité Yuneec H520', ' Poids : 1890g.\r\n Portée : 1,6km.\r\n Autonomie en vol : 30 minutes.\r\nTélécommande ST16 avec retour vidéo HD 720P et ge', '30 minutes', 1890, '', 150, 'h52349'),
(6, 2, 'BEBOP-PRO 3D MODELING PARROT', 1319.00, '/D2D/products_pictures/bebop_pro.png', '/D2D/products_pictures/pictures_foreach/drone_pro/drone_bebop_3D/parrot-bebop_pro-3d-model-beboppro3d.png', '/D2D/products_pictures/pictures_foreach/drone_pro/drone_bebop_3D/parrot-bebop_pro-3d-model-beboppro3d-1.png', '/D2D/products_pictures/pictures_foreach/drone_pro/drone_bebop_3D/parrot-bebop_pro-3d-model-beboppro3d-4.png', '', '/D2D/products_pictures/pictures_foreach/drone_pro/drone_bebop_3D/logo_parro.png', 'Solution de modélisation 3D accessible grâce au Bebop 2 et à\r\nPix4D. Développé pour les professionnels du batiments, le\r\ndrone aide à créer des contenus et modèles 3D\r\nphotoréalistes. Avec le logiciel Pix4Dmodel, le Bebop-Pro est\r\nun outil polyvalent permettant aux professionnels d&#39;identifier\r\nles travaux à effectuer, lancer de nouveaux projets et\r\npromouvoir les biens en ligne.', 'Capteur CMOS 14Mps.\r\n- Objetcif fisheye 180° .\r\n- Ouvertur 1/2,3\".\r\n- Stabilisation numérique sur 3 axes.\r\n- Résolution vidéo 1920x1080p 30fps.\r\n- Résolution photo 4096x3072 pixels.\r\n- Encodage vidéo H264.\r\n- Format photo : JPEG / RAW / DNG.\r\n- Mémoire interne : flash 8Go.\r\n- Autonomie de vol : 25 minutes.\r\n- Poids : 500g.\r\n- Portée 2 km.\r\n', '25', 500, '- Caméra RGB Full HD 1080P\r\n- Caméra Thermique FLIR One Pro', 58, 'beb179'),
(7, 2, 'SPLASH DRONE AUTO+ COASTGUARD ORANGE RTF', 1799.00, '/D2D/products_pictures/spl_sp1a.jpg', '/D2D/products_pictures/pictures_foreach/drone_pro/splash_drone/2016-04-07_143625.png', '/D2D/products_pictures/pictures_foreach/drone_pro/splash_drone/2016-04-07_150608.png', '/D2D/products_pictures/pictures_foreach/drone_pro/splash_drone/2016-04-07_143344.png', '', '/D2D/products_pictures/pictures_foreach/drone_pro/splash_drone/logo_splash.png', 'Ce drone multifonction est totalement étanche. Il\r\npeut être utilisé pour des missions de prise de vue,\r\nd&#39;insepction, de sécurité, de largage, dans les\r\ncondition les plus humide. Sa coque étanche et son\r\ntratement particulier assure également la flotabilité\r\ndu drone en cas de chute dans l&#39;eau.\r\nIl dispose en outre de toutes les application moderne\r\nde vol assurant sa stabilité et sa sécurité. Depuis un\r\nsmartphone ou une tablette il vous sera possible\r\nd&#39;utiliser Follow me, Mode AUto Waypoint, Circle\r\nFlight, Guide mode...', 'Poids : 2300g.\r\n- Vitesse maximum : 21m/s.\r\n- Autonomie en vol : 20 minutes.\r\n- Température d\'utilisation : -10 à +40°C.\r\n- Emetteur vidéo 600mW.\r\n- Contrôleur de vol avec OSD intégré.', '20', 2300, '', 76, 'spl179'),
(8, 2, 'Sous-marin PowerRay – PowerVision', 1699.00, '/D2D/products_pictures/Sous-marin.jpg', '/D2D/products_pictures/pictures_foreach/drone_pro/drone_sous_marin/drone-sous-marin-powerray-explorer-p-image-187839-grande.jpg', '/D2D/products_pictures/pictures_foreach/drone_pro/drone_sous_marin/sous-marin-powerray-explorer-p-image-187965-grande.jpg', '/D2D/products_pictures/pictures_foreach/drone_pro/drone_sous_marin/sous-marin-powerray-explorer-p-image-187964-grande.jpg', '', '/D2D/products_pictures/pictures_foreach/drone_pro/drone_sous_marin/logo_smarin.jpg', 'Powervision nous dévoile son drone sous-marin nommé\r\nPowerRay, capable d&#39;aller jusqu&#39;à une profondeur de 30\r\nmètres !\r\nIl dispose d&#39;une caméra UHD 4K intégrée permettant de\r\nréaliser des prises de vues sous l&#39;eau jusqu&#39;en 4K@30 i/s !\r\nCes drones sous-marins sont destinés aux professionnels et\r\nserviront notamment pour l&#39;inspection de coques de bâteaux,\r\npour réaliser des prises de vues sous-marines ou encore pour\r\ninspecter les coraux.\r\nLe PowerRay sera idéal pour l&#39;inspection sous-marine et pour\r\nles activités de pêche grâce à ses lumières LED permettant de\r\nmieux voir et d&#39;attirer les poissons.', 'SOUS-MARIN\r\nDimensions 465 x 270 x 126 mm.\r\nPoids Environ 3.8kg.\r\nProfondeur Jusqu\'à 30m.\r\nTempérature de fonctionnement -10°C à 50°C.\r\nVitesse max de croisière 2m/s.\r\nVitesse max de remontée 0.4m/s.\r\nVitesse max en descente 0.3m/s.\r\nTemps de navigation max À vitesse max : 1 heure / À vitesse moyenne : 2 heures / À vitesse lente : 4 heures\r\nRésistance 2m/s.\r\nBatterie 6400mAh – 94.72Wh.\r\nCAPTEUR SONAR\r\nDimensions 68mm de diamètre.\r\nPoids 100 grammes.\r\nFréquence 125KHz.\r\nAngle sonde 30° .\r\nProfondeur d\'action 0.6 – 40m.\r\nTempérature de fonctionnement -20°C à 65°C.\r\nConnexion WiFi.\r\nPortée Jusqu\'à 80 mètres.\r\nLED 6 (bleues).\r\nAutonomie Environ 2 heures.', '60 à 120', 3800, '', 7, 'pow169'),
(9, 3, 'DJI Phantom 4 Pro &amp; Pro+', 1699.00, '/D2D/products_pictures/dji-phantom.jpg', '/D2D/products_pictures/pictures_foreach/drone_cam/drone dji/dji-phantom-4-pro---pro--p-image-184036-grande.jpg', '/D2D/products_pictures/pictures_foreach/drone_cam/drone dji/dji-phantom-4-pro---pro--p-image-184037-grande.jpg', '/D2D/products_pictures/pictures_foreach/drone_cam/drone dji/dji-phantom-4-pro---pro--p-image-184042-grande.jpg', '', '/D2D/products_pictures/pictures_foreach/drone_cam/drone dji/logo_dji.png', 'Le DJI Phantom 4 Pro est une version évoluée du drone\r\nPhantom 4 disposant d&#39;une caméra 4K @60ims, d&#39;une\r\nnouvelle radio plus compacte et de la détection\r\nd&#39;obstacles à 360°. Le DJI Phantom 4 Pro récupère les\r\nmeilleures caractéristiques de son prédécesseur et les\r\naméliore.\r\nDeux versions vous sont proposées : le DJI Phantom 4\r\nPro (radio avec support pour smartphone/tablette) et le\r\nDJI Phantom 4 Pro + (radio avec tablette 5&quot; intégrée).', 'Type de châssis X.\r\nDimensions 350 mm de diagonale.\r\nMatériaux ABS.\r\nModule de stabilisation GPS GPS / GLONASS.\r\nPoids 1388g.\r\nMoteurs Brushless.\r\nRécepteur 2.4GHz / 5.8GHz.\r\nContrôleur de vol Naza P4P.\r\nTemps de vol Jusqu\'à 30 minutes.\r\nHélices 9450.\r\nBatterie 15.2V (4S) 5870mAh LiPo.\r\nVitesse maximale Jusqu\'à 72 Km/h en mode sport.\r\nVitesse max en descente Jusqu\'à 4 m/s en mode sport.\r\nVitesse max en montée Jusqu\'à 6 m/s en mode sport.\r\nTemperature de fonctionnement de 0°C à 40°C.\r\nCouleur Blanc.\r\nPrécision du stationnaire 0.1 m en vertical et 0.3 m en horizontal (avec Vision Positioning).\r\nInclinaison max du tilt Jusqu\'à 42° en mode sport.\r\nAltitude max. de vol 6000 m.\r\nVol en intérieur Possible avec Vision positioning.\r\nCaméra Intégrée.\r\nPortée Jusqu\'à 3.5 kilomètres (CE).\r\nAutonomie Jusqu\'à 30 minutes.', '30', 1388, '4k', 70, 'dji169'),
(10, 4, 'Drone Star Wars Tie ', 169.00, '/D2D/products_pictures/StarWars.jpg', '/D2D/products_pictures/pictures_foreach/drone_loisir/drone_starwars/drone-propel-starwars-tie-advanced-x1---p-image-193040-grande.jpg', '/D2D/products_pictures/pictures_foreach/drone_loisir/drone_starwars/drone-propel-starwars-tie-advanced-x1---p-image-193044-grande.jpg', '/D2D/products_pictures/pictures_foreach/drone_loisir/drone_starwars/drone-propel-starwars-tie-advanced-x1---p-image-193046-grande.jpg', '', '/D2D/products_pictures/pictures_foreach/drone_loisir/drone_starwars/logo_propel.png', 'Rejoignez le côté obscur de la force et pilotez le chasseur de Dark Vador. Affrontez des amis avec le drone X1, lancez -vous dans des figures aériennes et des combats épiques pour repousser l\'Alliance rebelle.\r\n\r\nÉquipé d’un gyroscope 6 axis, ce drone Star Wars est d’une stabilité incroyable. Il intègre de nombreux capteurs pour vous faire revivre les plus grands moments de cette saga spatiale aux commandes d\'un drone collector.', 'Type de châssis Quad en X.\r\nHélices Inversée et transparente.\r\nBatterie LiPo.\r\nVol en intérieur Oui.\r\nCompatibilité Autres drones. Starwars pour combat IR (Infrarouge).\r\nAutonomie 8 minutes.\r\nAutres spécifications Mode musique : la marche impériale, la mort de ben et l’attaque des chasseurs tie, attaque impériale, le champ d’astéroïdes, la salle du trône de l’empereur, les étoiles attendent.\r\nModes 3 modes de vol, un mode \"T\" d\'entraînement, mode combat, décollage et atterrissage auto.\r\nPrécision Gyroscope 6 axes.', '8', 2300, 'aucune', 40, 'sta169'),
(11, 4, 'DJI spark', 499.00, '/D2D/products_pictures/dji-spark.jpg', '/D2D/products_pictures/pictures_foreach/drone_loisir/drone dji-spark/dji-spark-p-image-189801-grande.jpg', '/D2D/products_pictures/pictures_foreach/drone_loisir/drone dji-spark/dji-spark-p-image-189802-grande.jpg', '/D2D/products_pictures/pictures_foreach/drone_loisir/drone dji-spark/dji-spark-p-image-189798-grande.jpg', '/D2D/products_pictures/pictures_foreach/drone_loisir/drone dji-spark/dji-spark-p-image-189800-grande.jpg', '/D2D/products_pictures/pictures_foreach/drone_loisir/drone dji-spark/logo_dji.png', 'DJI Spark est un mini drone spécialisé dans le selfie, un\r\ndronie, qui vous permettra de saisir l&#39;instant présent sous un\r\npoint de vue unique, depuis les airs.\r\nUltra portable, le Spark se pilote de trois façons différentes :\r\nsmartphone, radiocommande ou par gestes ! Doté d’une\r\nnacelle stabilisée 2 axes, le Spark dispose d’une caméra\r\nhaute performance capable de filmer en Full HD 1080p et de\r\nphotographier en 12MP.', 'Type de châssis Quadricoptère.\r\nDimensions 143 × 143 × 55 mm / Diagonale : 170 mm.\r\nModule de stabilisation GPS Oui.\r\nPoids 190 grammes (sans la batterie) / 300 grammes (poids au décollage).\r\nMoteurs Brushless.\r\nTemps de vol 16 minutes (sans vent, à une vitesse constante de 20 km/h (12,4 mph)) / Temps de vol en stationnaire : 15 minutes (sans vent).\r\nVitesse max en descente 3 m/s (9,8 ft/s) en mode atterrissage automatique.\r\nVitesse max en montée 3 m/s (9,8 ft/s) en mode Sport sans vent.\r\nTemperature de fonctionnement De 0 à 40 °C (de 32 à 104 °F).\r\nMode GPS GPS / GLONASS.\r\nAltitude max. de vol 4 000 m (13 123 pieds) max par rapport au niveau de la mer.\r\nEmetteur 2,4 GHz : FCC : 25 dBm, CE : 18 dBm, SRRC : 18 dBm / 5,8 GHz : FCC : 27 dBm, CE : 14 dBm, SRRC : 27 dBm.\r\nCompatibilité DJI GO 4 (Android et iOS).\r\nPrécision Vol stationnaire (verticale) : +/- 0,1 m (avec le Vision Positioning actif) ou +/- 0,5 . m / Vol stationnaire (horizontale) : +/- 0,3 m (avec le Vision Positioning actif) ou +/- 1,5 m, .\r\nFréquence de fonctionnement 2,400-2,483 GHz; 5,725-5,825 GHz.', '18', 230, 'HD', 78, 'dji499'),
(12, 4, 'Drone Transformer QimmiQ', 149.90, '/D2D/products_pictures/Qimmiq.jpg', '/D2D/products_pictures/pictures_foreach/drone_loisir/drone_qimmiq/drone-transformer-qimmiq-p-image-188349-grande.jpg', '/D2D/products_pictures/pictures_foreach/drone_loisir/drone_qimmiq/qimmiq.jpeg', '/D2D/products_pictures/pictures_foreach/drone_loisir/drone_qimmiq/drone-transformer-qimmiq-p-image-188348-grande.jpg', '', '/D2D/products_pictures/pictures_foreach/drone_loisir/drone_qimmiq/logo.png', 'Le QimmiQ Transformer est un drone hybride capable de voler\r\ndans les airs mais également de rouler sur la terre ferme une\r\nfois muni de roues.\r\nEquipé d&#39;une caméra HD 720P, le Transformer peut prendre\r\nphotos et vidéos depuis l&#39;application smartphone dédiée et\r\nprofitez également d&#39;un retour vidéo directement sur votre\r\nsmartphone grâce au module Wi-fi intégré.\r\nEnfin, le Transformer profite d&#39;assistances en vol comme le\r\nReturn to home, l&#39;atterrissage automatique ou encore Flip\r\n360°.', 'Type de châssis Quadricoptère hybride.\r\nPoids En vol : 150 grammes / sur roues : 308 grammes.\r\nMoteurs Brushed.\r\nBatterie Lipo 1S 900 mAh.\r\nCaméra HD 720P 25 FPS.\r\nAutonomie En vol : 9 min / sur roues : 16 min.\r\nPortée Radio : 100 mètres / Wi-Fi : 60 mètres.\r\nModes Return to Home, Flip 360° et Auto landing.', '13', 250, 'HD 720P 25 FPS', 90, 'qim149'),
(13, 4, 'Nano drone TinyFly (Différents coloris)', 29.90, '/D2D/products_pictures/nanodron.jpg', '/D2D/products_pictures/pictures_foreach/drone_loisir/nanodrone/nano2.jpg', '/D2D/products_pictures/pictures_foreach/drone_loisir/nanodrone/nano3.jpg', '/D2D/products_pictures/pictures_foreach/drone_loisir/nanodrone/nano4.jpg', '', '/D2D/products_pictures/pictures_foreach/drone_loisir/nanodrone/logo_nano.png', 'Nano drone TinyFly - Différents coloris\r\nL\'un des drones les plus cool et plus petit du moment ! Vous permet de faire des virages acrobatiques en appuyant simplement sur un bouton. Mesurant à 5,5 x 5,5 cm, il est minuscule mais ne manque de puissance ou de vitesse. Il est doté d\'une batterie lithium-ion rechargeable 3.7V 100mAh et de quatres moteur auxiliaire.', 'Modele : CX 10.\r\nFréquence : 2.4G.\r\nGyro : axe 6.\r\nMatériau : ABS.\r\nTaille: 40 x 40 x 22mm.\r\nHeure de vol : environ 5-8 minutes.\r\nTemps de charge : 30 minutes.\r\nDistance de contrôle: environ 20-50M.\r\nBatterie : 3.7V 100mah.\r\nPile télécommande : 2 piles AAA (non incluses).', '5', 11, '', 0, 'Nan299');

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
  `idpublic` text CHARACTER SET utf8 NOT NULL,
  `rang` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;