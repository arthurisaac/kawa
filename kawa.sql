-- --------------------------------------------------------
-- Hôte:                         gi6kn64hu98hy0b6.chr7pe7iynqr.eu-west-1.rds.amazonaws.com
-- Version du serveur:           5.7.33-log - Source distribution
-- SE du serveur:                Linux
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour rwc5v1789xflwyyt
DROP DATABASE IF EXISTS `rwc5v1789xflwyyt`;
CREATE DATABASE IF NOT EXISTS `rwc5v1789xflwyyt` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `rwc5v1789xflwyyt`;

-- Listage de la structure de la table rwc5v1789xflwyyt. accesses
DROP TABLE IF EXISTS `accesses`;
CREATE TABLE IF NOT EXISTS `accesses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` bigint(20) unsigned NOT NULL,
  `services` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `accesses_role_foreign` (`role`),
  CONSTRAINT `accesses_role_foreign` FOREIGN KEY (`role`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.accesses : ~13 rows (environ)
DELETE FROM `accesses`;
/*!40000 ALTER TABLE `accesses` DISABLE KEYS */;
INSERT INTO `accesses` (`id`, `created_at`, `updated_at`, `role`, `services`) VALUES
	(1, '2020-10-12 14:58:02', '2020-10-12 14:58:02', 1, 'commercial,securité,caisse centrale,transport,regulation,virgile,comptabilité,logistique,rh,informatique,achat,ssb'),
	(2, '2020-10-12 15:07:00', '2020-10-12 15:07:00', 2, 'comptabilité'),
	(3, '2020-10-12 15:07:17', '2020-10-12 15:07:53', 7, 'caisse centrale'),
	(4, '2020-10-12 15:08:02', '2020-10-12 15:09:10', 5, 'caisse centrale'),
	(5, '2020-10-12 15:08:09', '2020-10-12 15:09:29', 6, 'transport'),
	(6, '2020-10-12 15:08:21', '2020-10-12 15:08:51', 7, 'regulation'),
	(7, '2020-10-12 15:08:29', '2020-10-12 15:08:29', 7, 'commercial'),
	(8, '2020-10-12 19:14:15', '2020-10-12 19:14:15', 8, 'virgile'),
	(9, '2020-10-12 19:14:22', '2020-10-12 19:14:22', 9, 'logistique'),
	(10, '2020-10-12 19:14:29', '2020-10-12 19:14:29', 10, 'rh'),
	(11, '2020-10-12 19:14:46', '2020-10-12 19:14:46', 11, 'informatique'),
	(12, '2020-10-12 19:15:15', '2020-10-12 19:15:15', 12, 'achat'),
	(13, '2020-10-12 19:15:33', '2020-10-12 19:15:33', 13, 'ssb');
/*!40000 ALTER TABLE `accesses` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. achat_bon_comandes
DROP TABLE IF EXISTS `achat_bon_comandes`;
CREATE TABLE IF NOT EXISTS `achat_bon_comandes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fournisseur_fk` bigint(20) unsigned NOT NULL,
  `numero_da` int(11) DEFAULT '0',
  `proforma` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `livraison` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `achat_bon_comandes_fournisseur_fk_foreign` (`fournisseur_fk`),
  CONSTRAINT `achat_bon_comandes_fournisseur_fk_foreign` FOREIGN KEY (`fournisseur_fk`) REFERENCES `achat_fournisseurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.achat_bon_comandes : ~0 rows (environ)
DELETE FROM `achat_bon_comandes`;
/*!40000 ALTER TABLE `achat_bon_comandes` DISABLE KEYS */;
/*!40000 ALTER TABLE `achat_bon_comandes` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. achat_bon_comande_items
DROP TABLE IF EXISTS `achat_bon_comande_items`;
CREATE TABLE IF NOT EXISTS `achat_bon_comande_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `achat_bon_fk` bigint(20) unsigned NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tva` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `achat_bon_comande_items_achat_bon_fk_foreign` (`achat_bon_fk`),
  CONSTRAINT `achat_bon_comande_items_achat_bon_fk_foreign` FOREIGN KEY (`achat_bon_fk`) REFERENCES `achat_bon_comandes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.achat_bon_comande_items : ~0 rows (environ)
DELETE FROM `achat_bon_comande_items`;
/*!40000 ALTER TABLE `achat_bon_comande_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `achat_bon_comande_items` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. achat_demandes
DROP TABLE IF EXISTS `achat_demandes`;
CREATE TABLE IF NOT EXISTS `achat_demandes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `identite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_demandeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone_demandeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_electronique_demandeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet_achat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `famille_achat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sous_famille_achat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fournisseur_retenu` int(11) DEFAULT NULL,
  `montant_retenu` bigint(20) DEFAULT NULL,
  `type_demande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nature_demande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_da` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centre_regional` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `demande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.achat_demandes : ~0 rows (environ)
DELETE FROM `achat_demandes`;
/*!40000 ALTER TABLE `achat_demandes` DISABLE KEYS */;
INSERT INTO `achat_demandes` (`id`, `created_at`, `updated_at`, `date`, `identite`, `service`, `nom_demandeur`, `telephone_demandeur`, `adresse_electronique_demandeur`, `objet_achat`, `famille_achat`, `sous_famille_achat`, `fournisseur_retenu`, `montant_retenu`, `type_demande`, `nature_demande`, `numero_da`, `centre`, `centre_regional`, `demande`) VALUES
	(1, '2021-08-19 16:38:22', '2021-08-19 16:38:22', '2021-08-19', 'Sondo Arthur', 'Informatique', 'Sawadogo Vladimir', '55000024', 'r.thur.light@gmail.com', 'Achat d\'ordinateur', '524000', 'Informatique', 1, 0, NULL, 'Investissement', '001', 'Abidjan', 'Abidjan Nord', 'Demande en cours');
/*!40000 ALTER TABLE `achat_demandes` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. achat_fournisseurs
DROP TABLE IF EXISTS `achat_fournisseurs`;
CREATE TABLE IF NOT EXISTS `achat_fournisseurs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `denomination` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sigle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `secteur_activite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rccm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnps` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_postale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_geo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone_entreprise` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_entreprise` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `siteweb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fonction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenoms` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `part_marche` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taux_croissance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chaine_valeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `certification` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sous_traitant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credit_30_jours` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credit_60_jours` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `condition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mode_paiement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.achat_fournisseurs : ~14 rows (environ)
DELETE FROM `achat_fournisseurs`;
/*!40000 ALTER TABLE `achat_fournisseurs` DISABLE KEYS */;
INSERT INTO `achat_fournisseurs` (`id`, `created_at`, `updated_at`, `denomination`, `sigle`, `secteur_activite`, `rccm`, `cnps`, `cpt`, `adresse_postale`, `adresse_geo`, `telephone_entreprise`, `email_entreprise`, `fax`, `siteweb`, `fonction`, `nom`, `prenoms`, `telephone`, `email`, `part_marche`, `taux_croissance`, `chaine_valeur`, `certification`, `sous_traitant`, `credit_30_jours`, `credit_60_jours`, `condition`, `mode_paiement`) VALUES
	(1, '2021-07-14 11:34:36', '2021-07-14 11:34:36', '3D SYSTÈME', '3D SYSTÈME', 'Fourniture et installation de matériel de sécurité', 'CI-ABJ-2016-B-9298', '01', '1619660Y', '12 BP 1211 Abidjan 12', 'Port-bouet quartier sogefiha 1', '21 27 58 33 / 88 49 74 49', '3dsystemes@gmail.com', '21275833', 'https://www.3d-system.ci', 'DIRECTEUR', 'BABLA', 'BABLA', '88 49 74 49', '3dsystemes@gmail.com', '5', '5', NULL, 'iso', NULL, '30 jours', NULL, NULL, NULL),
	(2, '2021-07-14 11:59:22', '2021-07-14 11:59:22', 'ATC COMAFRIQUE', 'ATC COMAFRIQUE', 'AUTOMOBILE', '271571', '02', '0421179 F', '01 bp 3727 Abj 01', 'Boulevard de Vridi;', '21 75 16 10', 'atc@comafrique.com', '21 25 45 09', 'https://www.atc.comafrique.com', 'commercial', 'M, AMENDE', 'FELIX', '21 75 16 10', 'atc@comafrique.com', '5', '5', '5', 'iso', NULL, NULL, NULL, NULL, NULL),
	(3, '2021-07-14 12:19:14', '2021-07-14 12:19:14', 'ATLANTIQUE TELECOM CI', 'MOOV AFRICA', 'TELECOMUNICATION', 'CI-ABJ-2005-B-1378', '3', '0521319 F', '01 BP 2347 Abidjan 01', 'Immeuble karat', '*225 20 25 01 01', 'info@moov.com', '*225 20 25 01 50', 'https://www.moov.comi', 'commercial', 'moov africa', 'moov', '20 25 01 01', 'info@moov.com', '5', '5', '5', 'iso', NULL, '30 jours', NULL, NULL, NULL),
	(4, '2021-07-14 15:46:15', '2021-07-14 15:46:15', 'CFAO MOTORS', 'CFAO MOTORS', 'AUTOMOBILE', 'CI-ABJ-1973-B11362', '25785', '0100432 G', '01 BP 2114 ABJ 01', 'Carrefour hopital de treichville', '21 75 11 11', 'bamani@cfao.com', '21 75 11 10', NULL, 'commercial', 'AMANI', 'BENOIT', '0504493650', 'bamani@cfao.com', '70', '70', '70', 'iso', NULL, '30 jours', NULL, NULL, NULL),
	(5, '2021-07-14 15:51:34', '2021-07-14 15:51:34', 'MATMED', 'MATMED', 'INFORMATIQUE', 'Abidjan 253430', '254', '0028110 F', '18 BP 2008 Abidjan 18', 'TREICHVILLE', '27 21 34 13 01', 'matmed@aviso.ci', NULL, NULL, 'commercial', NULL, NULL, '27 21 34 13 01', NULL, '60', '60', NULL, 'iso', NULL, '30 jours', NULL, NULL, NULL),
	(6, '2021-07-14 15:59:25', '2021-07-14 15:59:25', 'TECHNO MART', 'TECHNO MART', 'Fourniture de bureau', '274337', '25', '0204336 K', '05 BP 3592 Abidjan 05', 'TREICHVILLE', '27 21 24 87 60', 'infos.technomart@gmail.com', '27 21 24 87 60', 'https://www.infos.technomart@gmail.com', 'DIRECTEUR', 'HAMAD', NULL, '27 21 24 87 60', 'infos.technomart@gmail.com', '25', '25', '5', 'iso', NULL, '30 jours', NULL, NULL, NULL),
	(7, '2021-07-14 16:04:18', '2021-07-14 16:04:18', 'PAPIGRAPH CI', 'PAPIGRAPH CI', 'Fourniture de bureau', '81917', '25', '84 00 840 W', '01 BP 2294 ABIDJAN 01', 'Rue de l\'industrie zonz 3 rond point CHU de Treichville', '21 35 03 60                 21 35 43 17', 'papigraph@hotmail.fr', '21 35 07 04', NULL, 'DIRECTEUR COMMERCIAL', 'HUSSEIN', NULL, '21 35 03 60', 'papigraph@hotmail.fr', '35', '35', '2', 'iso', NULL, '30 jours', NULL, NULL, NULL),
	(8, '2021-07-14 16:08:26', '2021-07-14 16:08:26', 'TOTAL CI', 'TOTAL CI', 'CARBURANT', 'CI-ABJ-1976-B-17.247', '3255', '7603142 C', '01 BP 336 ABIDJAN 01.', 'Treichville Immeuble Rive Gauche 100, rue des brasseurs - Zone 3.', '27 21 22 23 24', 'service.clients@total.ci', NULL, NULL, 'commercial', 'TOTAL', NULL, '27 21 22 23 24', 'service.clients@total.ci', '80', '80', '80', 'iso', NULL, '30 jours', NULL, NULL, NULL),
	(9, '2021-08-11 11:09:38', '2021-08-11 11:09:38', 'ACTIV MAINTENANCE', 'ACTIV MAINTENANCE', 'FROID', 'CI-ABJ-2015-B26294', '023', '1552954Y', '08 BP 597 ABIDJAN 08', 'Route Bingerville', '27 22 47 27 28', 'info@activemaintenance.com', '27 22 47 27 28', 'https://www.activemaintenance.com', 'Responsable des Opérations', 'KOUASSI', 'Yann', '0757078928', 'yannkouassi@activmaintenance.com', '15', '10', '3', 'iso', NULL, '30 jours', NULL, NULL, NULL),
	(10, '2021-08-11 11:31:16', '2021-08-11 11:31:16', 'ALIFAT TECHNOLOGIE SARL', 'ALIFAT TECHNOLOGIE SARL', 'INFORMATIQUE', 'CI-ABJ-2012-B-3470', '235', '42 72 794 A', '05 BP 2828 Abidjan 05', 'Treichville - Avenue 8 rue 22 B', '21 24 73 05 - 21 24 73 55', 'info@alifat-ci.com', NULL, NULL, 'commercial', 'ALIFA', 'TECHNOLOGIE', '21 24 73 05 - 21 24 73 55', 'info@alifat-ci.com', '25', '25', '25', 'iso', NULL, '30 jours', NULL, NULL, NULL),
	(11, '2021-08-11 11:51:16', '2021-08-11 11:51:16', 'ANYTECH', 'ANYTECH', 'INFORMATIQUE', 'CI-ABJ-2017-B-16471', '250', '1729671 M', '25 BP 1484 Abidjan  25', 'Treichville Rue 38 montée du pont Degaule', '27 21 25 12 23 / 79 54 44 49', 'info@anytek.ci', NULL, NULL, 'commercial', 'anytek.ci', NULL, 'info@anytek.ci', 'info@anytek.ci', '23', '23', '23', 'iso', NULL, '30 jours', NULL, NULL, NULL),
	(12, '2021-08-11 11:57:14', '2021-08-11 11:57:14', 'AMK SARL', 'AMK SARL', 'SYSTÈME DE SECURITE', 'CI-ABJ-2014-B-20793', '2354', '1438056 V', '20 BP 771 Abidjan 20', 'Cocody Angré 8ieme tranche', '27 22 42 73 95 / 07 07 06 92 68', 'amksarl@gmail.com', '27 22 42 73 95', NULL, 'commercial', 'AMK', NULL, '27 22 42 73 95 / 07 07 06 92 68', 'amksarl@gmail.com', '12', '12', '12', 'iso', NULL, '30 jours', NULL, NULL, NULL),
	(13, '2021-08-11 12:31:16', '2021-08-11 12:31:16', 'BAROLD ASSURANCES', 'BAROLD ASSURANCES', 'ASSURANCE', '225414566', '289756', '5489', '546465', 'Abidjan', '21 27 58', 'BAROLD@ASSURANCES', NULL, NULL, 'BAROLD ASSURANCES', NULL, NULL, '0231547', NULL, '15', '15', '15', 'iso', NULL, '30 jours', NULL, NULL, NULL),
	(14, '2021-08-11 14:06:41', '2021-08-11 14:06:41', 'BP TECHNOLOGIE SARL', 'BP TECHNOLOGIE SARL', 'SYSTÈME DE SECURITE', 'CI-ABJ-2019-B-7819', '2155', '1920718 G', '28 BP 1457 Abidjan 28', 'Marcory sicogi', '07 09 124 641 / 05 75 567 131', 'techno@tecn.com', '1656', NULL, 'commercial', 'TECHNOLOGIE SARL', 'TECHNOLOGIE SARL', '07 09 124 641 / 05 75 567 131', 'techno@tecn.com', '45', '45', '45', 'iso', NULL, '30 jours', NULL, NULL, NULL);
/*!40000 ALTER TABLE `achat_fournisseurs` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. achat_fournisseur_consultes
DROP TABLE IF EXISTS `achat_fournisseur_consultes`;
CREATE TABLE IF NOT EXISTS `achat_fournisseur_consultes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fournisseur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cotation_technique` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix_propose` bigint(20) NOT NULL,
  `choix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `achat_demandes_fk` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `achat_fournisseur_consultes_achat_demandes_fk_foreign` (`achat_demandes_fk`),
  CONSTRAINT `achat_fournisseur_consultes_achat_demandes_fk_foreign` FOREIGN KEY (`achat_demandes_fk`) REFERENCES `achat_demandes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.achat_fournisseur_consultes : ~0 rows (environ)
DELETE FROM `achat_fournisseur_consultes`;
/*!40000 ALTER TABLE `achat_fournisseur_consultes` DISABLE KEYS */;
/*!40000 ALTER TABLE `achat_fournisseur_consultes` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. achat_fournisseur_c_a_s
DROP TABLE IF EXISTS `achat_fournisseur_c_a_s`;
CREATE TABLE IF NOT EXISTS `achat_fournisseur_c_a_s` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fournisseur_fk` bigint(20) unsigned NOT NULL,
  `ca` bigint(20) NOT NULL,
  `annee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `achat_fournisseur_c_a_s_fournisseur_fk_foreign` (`fournisseur_fk`),
  CONSTRAINT `achat_fournisseur_c_a_s_fournisseur_fk_foreign` FOREIGN KEY (`fournisseur_fk`) REFERENCES `achat_fournisseurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.achat_fournisseur_c_a_s : ~12 rows (environ)
DELETE FROM `achat_fournisseur_c_a_s`;
/*!40000 ALTER TABLE `achat_fournisseur_c_a_s` DISABLE KEYS */;
INSERT INTO `achat_fournisseur_c_a_s` (`id`, `created_at`, `updated_at`, `fournisseur_fk`, `ca`, `annee`) VALUES
	(1, '2021-07-14 11:34:36', '2021-07-14 11:34:36', 1, 5000000, '2020'),
	(2, '2021-07-14 11:59:22', '2021-07-14 11:59:22', 2, 50000000, '2020'),
	(3, '2021-07-14 12:19:14', '2021-07-14 12:19:14', 3, 1000000000, '2020'),
	(4, '2021-07-14 15:46:15', '2021-07-14 15:46:15', 4, 10000000000, '2020'),
	(5, '2021-07-14 15:51:34', '2021-07-14 15:51:34', 5, 25000000, '2020'),
	(6, '2021-07-14 15:59:25', '2021-07-14 15:59:25', 6, 30000000, '2020'),
	(7, '2021-07-14 16:04:18', '2021-07-14 16:04:18', 7, 40000000, '2020'),
	(8, '2021-07-14 16:08:26', '2021-07-14 16:08:26', 8, 4000000000, '2020'),
	(9, '2021-08-11 11:09:38', '2021-08-11 11:09:38', 9, 5000000, '2020'),
	(10, '2021-08-11 11:31:16', '2021-08-11 11:31:16', 10, 5000000, '2020'),
	(11, '2021-08-11 11:51:16', '2021-08-11 11:51:16', 11, 3000000, '2020'),
	(12, '2021-08-11 11:57:14', '2021-08-11 11:57:14', 12, 4000000, '2020'),
	(13, '2021-08-11 12:31:16', '2021-08-11 12:31:16', 13, 2000000, '2020'),
	(14, '2021-08-11 14:06:41', '2021-08-11 14:06:41', 14, 4000000, '2020');
/*!40000 ALTER TABLE `achat_fournisseur_c_a_s` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. achat_produits
DROP TABLE IF EXISTS `achat_produits`;
CREATE TABLE IF NOT EXISTS `achat_produits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `produit` bigint(20) unsigned NOT NULL,
  `affectationService` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affectationDirection` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affectationDirectionGenerale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `montantTTC` double DEFAULT NULL,
  `montantHT` double DEFAULT NULL,
  `suiviBudgetaire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `achat_produits_produit_foreign` (`produit`),
  CONSTRAINT `achat_produits_produit_foreign` FOREIGN KEY (`produit`) REFERENCES `logistique_produits` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.achat_produits : ~0 rows (environ)
DELETE FROM `achat_produits`;
/*!40000 ALTER TABLE `achat_produits` DISABLE KEYS */;
/*!40000 ALTER TABLE `achat_produits` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. arrivee_centres
DROP TABLE IF EXISTS `arrivee_centres`;
CREATE TABLE IF NOT EXISTS `arrivee_centres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `noTournee` bigint(20) unsigned NOT NULL,
  `heureArrivee` time NOT NULL,
  `kmArrive` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observation` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'RAS',
  PRIMARY KEY (`id`),
  KEY `arrivee_centres_notournee_foreign` (`noTournee`),
  CONSTRAINT `arrivee_centres_notournee_foreign` FOREIGN KEY (`noTournee`) REFERENCES `depart_tournees` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.arrivee_centres : ~2 rows (environ)
DELETE FROM `arrivee_centres`;
/*!40000 ALTER TABLE `arrivee_centres` DISABLE KEYS */;
INSERT INTO `arrivee_centres` (`id`, `created_at`, `updated_at`, `noTournee`, `heureArrivee`, `kmArrive`, `observation`) VALUES
	(1, '2020-12-17 15:03:23', '2020-12-17 15:03:23', 1, '20:29:00', '100', 'TEST OBSERVATON ARRIIVE'),
	(2, '2020-12-17 15:30:23', '2020-12-17 15:30:23', 2, '18:30:00', '562', 'OB7'),
	(3, '2020-12-28 14:53:44', '2020-12-28 14:53:44', 8, '19:53:00', '9900', 'observation29');
/*!40000 ALTER TABLE `arrivee_centres` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. arrivee_sites
DROP TABLE IF EXISTS `arrivee_sites`;
CREATE TABLE IF NOT EXISTS `arrivee_sites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `noTournee` int(11) NOT NULL,
  `site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noBordereau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `heureArrivee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kmArrivee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.arrivee_sites : ~2 rows (environ)
DELETE FROM `arrivee_sites`;
/*!40000 ALTER TABLE `arrivee_sites` DISABLE KEYS */;
INSERT INTO `arrivee_sites` (`id`, `created_at`, `updated_at`, `noTournee`, `site`, `noBordereau`, `heureArrivee`, `kmArrivee`, `observation`) VALUES
	(1, '2020-12-17 15:02:20', '2020-12-17 15:02:20', 1, '1', NULL, '15:04', '10', 'RAS'),
	(2, '2020-12-17 15:29:11', '2020-12-17 15:29:11', 2, '1', NULL, '16:29', '1700', 'OB2'),
	(3, '2020-12-21 14:48:07', '2020-12-21 14:48:07', 5, '2', NULL, '16:43', '1500', 'XXL');
/*!40000 ALTER TABLE `arrivee_sites` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. arrivee_tournees
DROP TABLE IF EXISTS `arrivee_tournees`;
CREATE TABLE IF NOT EXISTS `arrivee_tournees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `numeroTournee` int(11) NOT NULL,
  `convoyeur1` bigint(20) unsigned NOT NULL,
  `convoyeur2` bigint(20) unsigned NOT NULL,
  `convoyeur3` bigint(20) unsigned NOT NULL,
  `kmDepart` int(11) DEFAULT NULL,
  `heureDepart` time DEFAULT NULL,
  `kmArrivee` int(11) DEFAULT NULL,
  `heureArrivee` time DEFAULT NULL,
  `vidangeGenerale` int(11) DEFAULT NULL,
  `visiteTechnique` int(11) DEFAULT NULL,
  `vidangeCourroie` int(11) DEFAULT NULL,
  `patente` int(11) DEFAULT NULL,
  `assuranceFin` int(11) DEFAULT NULL,
  `assuranceHeurePont` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `arrivee_tournees_convoyeur1_foreign` (`convoyeur1`),
  KEY `arrivee_tournees_convoyeur2_foreign` (`convoyeur2`),
  KEY `arrivee_tournees_convoyeur3_foreign` (`convoyeur3`),
  CONSTRAINT `arrivee_tournees_convoyeur1_foreign` FOREIGN KEY (`convoyeur1`) REFERENCES `personnels` (`id`),
  CONSTRAINT `arrivee_tournees_convoyeur2_foreign` FOREIGN KEY (`convoyeur2`) REFERENCES `personnels` (`id`),
  CONSTRAINT `arrivee_tournees_convoyeur3_foreign` FOREIGN KEY (`convoyeur3`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.arrivee_tournees : ~0 rows (environ)
DELETE FROM `arrivee_tournees`;
/*!40000 ALTER TABLE `arrivee_tournees` DISABLE KEYS */;
/*!40000 ALTER TABLE `arrivee_tournees` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. caisse_billetages
DROP TABLE IF EXISTS `caisse_billetages`;
CREATE TABLE IF NOT EXISTS `caisse_billetages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ctv` bigint(20) unsigned NOT NULL,
  `ba_nb10000` int(11) DEFAULT NULL,
  `ba_nb5000` int(11) DEFAULT NULL,
  `ba_nb2000` int(11) DEFAULT NULL,
  `ba_nb1000` int(11) DEFAULT NULL,
  `ba_nb500` int(11) DEFAULT NULL,
  `ba_nb250` int(11) DEFAULT NULL,
  `ba_nb200` int(11) DEFAULT NULL,
  `ba_nb100` int(11) DEFAULT NULL,
  `ba_nb50` int(11) DEFAULT NULL,
  `ba_nb25` int(11) DEFAULT NULL,
  `ba_nb10` int(11) DEFAULT NULL,
  `ba_nb5` int(11) DEFAULT NULL,
  `ba_nb1` int(11) DEFAULT NULL,
  `br_nb10000` int(11) DEFAULT NULL,
  `br_nb5000` int(11) DEFAULT NULL,
  `br_nb2000` int(11) DEFAULT NULL,
  `br_nb1000` int(11) DEFAULT NULL,
  `br_nb500` int(11) DEFAULT NULL,
  `br_nb250` int(11) DEFAULT NULL,
  `br_nb200` int(11) DEFAULT NULL,
  `br_nb100` int(11) DEFAULT NULL,
  `br_nb50` int(11) DEFAULT NULL,
  `br_nb25` int(11) DEFAULT NULL,
  `br_nb10` int(11) DEFAULT NULL,
  `br_nb5` int(11) DEFAULT NULL,
  `br_nb1` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `caisse_billetages_ctv_foreign` (`ctv`),
  CONSTRAINT `caisse_billetages_ctv_foreign` FOREIGN KEY (`ctv`) REFERENCES `caisse_ctvs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.caisse_billetages : ~0 rows (environ)
DELETE FROM `caisse_billetages`;
/*!40000 ALTER TABLE `caisse_billetages` DISABLE KEYS */;
/*!40000 ALTER TABLE `caisse_billetages` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. caisse_ctvs
DROP TABLE IF EXISTS `caisse_ctvs`;
CREATE TABLE IF NOT EXISTS `caisse_ctvs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `operatriceCaisse` bigint(20) unsigned NOT NULL,
  `numeroBox` int(11) NOT NULL,
  `heurePriseBox` time DEFAULT NULL,
  `heureFinBox` time DEFAULT NULL,
  `tournee` bigint(20) unsigned NOT NULL,
  `bordereau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `convoyeurGarde` bigint(20) unsigned NOT NULL,
  `regulatrice` bigint(20) unsigned NOT NULL,
  `securipack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sacjute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreColis` int(11) DEFAULT NULL,
  `numeroScelleColis` int(11) DEFAULT NULL,
  `montantAnnonce` int(11) DEFAULT NULL,
  `client` bigint(20) unsigned NOT NULL,
  `site` bigint(20) unsigned NOT NULL,
  `expediteur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `destinataire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantReconnu` int(11) DEFAULT NULL,
  `ecartConstate` int(11) DEFAULT NULL,
  `montantFinal` int(11) DEFAULT NULL,
  `billetsCalcules` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billetsCalculesMontant` int(11) DEFAULT NULL,
  `billetsSansValeurs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billetsSansValeursMontant` int(11) DEFAULT NULL,
  `billetsUsages` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billetsUsagesMontant` int(11) DEFAULT NULL,
  `fauxBillets` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fauxBilletsMontant` int(11) DEFAULT NULL,
  `billetsDeparailles` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billetsDeparaillesMontant` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `caisse_ctvs_operatricecaisse_foreign` (`operatriceCaisse`),
  KEY `caisse_ctvs_tournee_foreign` (`tournee`),
  KEY `caisse_ctvs_convoyeurgarde_foreign` (`convoyeurGarde`),
  KEY `caisse_ctvs_regulatrice_foreign` (`regulatrice`),
  KEY `caisse_ctvs_client_foreign` (`client`),
  KEY `caisse_ctvs_site_foreign` (`site`),
  CONSTRAINT `caisse_ctvs_client_foreign` FOREIGN KEY (`client`) REFERENCES `commercial_clients` (`id`),
  CONSTRAINT `caisse_ctvs_convoyeurgarde_foreign` FOREIGN KEY (`convoyeurGarde`) REFERENCES `personnels` (`id`),
  CONSTRAINT `caisse_ctvs_operatricecaisse_foreign` FOREIGN KEY (`operatriceCaisse`) REFERENCES `personnels` (`id`),
  CONSTRAINT `caisse_ctvs_regulatrice_foreign` FOREIGN KEY (`regulatrice`) REFERENCES `personnels` (`id`),
  CONSTRAINT `caisse_ctvs_site_foreign` FOREIGN KEY (`site`) REFERENCES `commercial_sites` (`id`),
  CONSTRAINT `caisse_ctvs_tournee_foreign` FOREIGN KEY (`tournee`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.caisse_ctvs : ~0 rows (environ)
DELETE FROM `caisse_ctvs`;
/*!40000 ALTER TABLE `caisse_ctvs` DISABLE KEYS */;
/*!40000 ALTER TABLE `caisse_ctvs` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. caisse_entree_colis
DROP TABLE IF EXISTS `caisse_entree_colis`;
CREATE TABLE IF NOT EXISTS `caisse_entree_colis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `agentRegulation` bigint(20) unsigned NOT NULL,
  `observation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `caisse_entree_colis_agentregulation_foreign` (`agentRegulation`),
  CONSTRAINT `caisse_entree_colis_agentregulation_foreign` FOREIGN KEY (`agentRegulation`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.caisse_entree_colis : ~0 rows (environ)
DELETE FROM `caisse_entree_colis`;
/*!40000 ALTER TABLE `caisse_entree_colis` DISABLE KEYS */;
/*!40000 ALTER TABLE `caisse_entree_colis` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. caisse_entree_colis_items
DROP TABLE IF EXISTS `caisse_entree_colis_items`;
CREATE TABLE IF NOT EXISTS `caisse_entree_colis_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `totalColis` int(11) NOT NULL DEFAULT '0',
  `typeColisSecuripack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeColisSacjute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreColisSecuripack` int(11) DEFAULT NULL,
  `nombreColisSacjute` int(11) DEFAULT NULL,
  `numeroScelleSecuripack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroScelleSacjute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantAnnonceSecuripack` int(11) DEFAULT NULL,
  `montantAnnonceSacjute` int(11) DEFAULT NULL,
  `bordereau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expediteur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entreeColis` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `caisse_entree_colis_items_entreecolis_foreign` (`entreeColis`),
  CONSTRAINT `caisse_entree_colis_items_entreecolis_foreign` FOREIGN KEY (`entreeColis`) REFERENCES `caisse_entree_colis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.caisse_entree_colis_items : ~0 rows (environ)
DELETE FROM `caisse_entree_colis_items`;
/*!40000 ALTER TABLE `caisse_entree_colis_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `caisse_entree_colis_items` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. caisse_services
DROP TABLE IF EXISTS `caisse_services`;
CREATE TABLE IF NOT EXISTS `caisse_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chargeCaisse` bigint(20) unsigned NOT NULL,
  `chargeCaisseHPS` time DEFAULT NULL,
  `chargeCaisseHFS` time DEFAULT NULL,
  `chargeCaisseAdjoint` bigint(20) unsigned NOT NULL,
  `chargeCaisseAdjointHPS` time DEFAULT NULL,
  `chargeCaisseAdjointHFS` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `caisse_services_chargecaisse_foreign` (`chargeCaisse`),
  KEY `caisse_services_chargecaisseadjoint_foreign` (`chargeCaisseAdjoint`),
  CONSTRAINT `caisse_services_chargecaisse_foreign` FOREIGN KEY (`chargeCaisse`) REFERENCES `personnels` (`id`),
  CONSTRAINT `caisse_services_chargecaisseadjoint_foreign` FOREIGN KEY (`chargeCaisseAdjoint`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.caisse_services : ~0 rows (environ)
DELETE FROM `caisse_services`;
/*!40000 ALTER TABLE `caisse_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `caisse_services` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. caisse_service_operatrices
DROP TABLE IF EXISTS `caisse_service_operatrices`;
CREATE TABLE IF NOT EXISTS `caisse_service_operatrices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `caisseService` bigint(20) unsigned NOT NULL,
  `operatriceCaisse` bigint(20) unsigned NOT NULL,
  `numeroOperatriceCaisse` int(11) NOT NULL,
  `operatriceCaisseBox` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `caisse_service_operatrices_caisseservice_foreign` (`caisseService`),
  KEY `caisse_service_operatrices_operatricecaisse_foreign` (`operatriceCaisse`),
  CONSTRAINT `caisse_service_operatrices_caisseservice_foreign` FOREIGN KEY (`caisseService`) REFERENCES `caisse_services` (`id`),
  CONSTRAINT `caisse_service_operatrices_operatricecaisse_foreign` FOREIGN KEY (`operatriceCaisse`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.caisse_service_operatrices : ~0 rows (environ)
DELETE FROM `caisse_service_operatrices`;
/*!40000 ALTER TABLE `caisse_service_operatrices` DISABLE KEYS */;
/*!40000 ALTER TABLE `caisse_service_operatrices` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. caisse_sortie_colis
DROP TABLE IF EXISTS `caisse_sortie_colis`;
CREATE TABLE IF NOT EXISTS `caisse_sortie_colis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `agentRegulation` bigint(20) unsigned NOT NULL,
  `observation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `caisse_sortie_colis_agentregulation_foreign` (`agentRegulation`),
  CONSTRAINT `caisse_sortie_colis_agentregulation_foreign` FOREIGN KEY (`agentRegulation`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.caisse_sortie_colis : ~0 rows (environ)
DELETE FROM `caisse_sortie_colis`;
/*!40000 ALTER TABLE `caisse_sortie_colis` DISABLE KEYS */;
/*!40000 ALTER TABLE `caisse_sortie_colis` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. caisse_sortie_colis_items
DROP TABLE IF EXISTS `caisse_sortie_colis_items`;
CREATE TABLE IF NOT EXISTS `caisse_sortie_colis_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `totalColis` int(11) NOT NULL DEFAULT '0',
  `typeColisSecuripack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeColisSacjute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreColisSecuripack` int(11) DEFAULT NULL,
  `nombreColisSacjute` int(11) DEFAULT NULL,
  `numeroScelleSecuripack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroScelleSacjute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantAnnonceSecuripack` int(11) DEFAULT NULL,
  `montantAnnonceSacjute` int(11) DEFAULT NULL,
  `bordereau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expediteur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sortieColis` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `caisse_sortie_colis_items_sortiecolis_foreign` (`sortieColis`),
  CONSTRAINT `caisse_sortie_colis_items_sortiecolis_foreign` FOREIGN KEY (`sortieColis`) REFERENCES `caisse_sortie_colis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.caisse_sortie_colis_items : ~0 rows (environ)
DELETE FROM `caisse_sortie_colis_items`;
/*!40000 ALTER TABLE `caisse_sortie_colis_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `caisse_sortie_colis_items` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. caisse_video_surveillances
DROP TABLE IF EXISTS `caisse_video_surveillances`;
CREATE TABLE IF NOT EXISTS `caisse_video_surveillances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `heureDebut` time DEFAULT NULL,
  `heureFin` time DEFAULT NULL,
  `numeroBox` int(11) DEFAULT NULL,
  `operatrice` bigint(20) unsigned NOT NULL,
  `securipack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sacjute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroScelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ecart` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `erreur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `absence` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commentaire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `caisse_video_surveillances_operatrice_foreign` (`operatrice`),
  CONSTRAINT `caisse_video_surveillances_operatrice_foreign` FOREIGN KEY (`operatrice`) REFERENCES `caisse_service_operatrices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.caisse_video_surveillances : ~0 rows (environ)
DELETE FROM `caisse_video_surveillances`;
/*!40000 ALTER TABLE `caisse_video_surveillances` DISABLE KEYS */;
/*!40000 ALTER TABLE `caisse_video_surveillances` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. carburant_cartes
DROP TABLE IF EXISTS `carburant_cartes`;
CREATE TABLE IF NOT EXISTS `carburant_cartes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `numeroCarte` int(11) NOT NULL,
  `societe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idVehicule` int(11) NOT NULL,
  `dateAquisition` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.carburant_cartes : ~0 rows (environ)
DELETE FROM `carburant_cartes`;
/*!40000 ALTER TABLE `carburant_cartes` DISABLE KEYS */;
INSERT INTO `carburant_cartes` (`id`, `created_at`, `updated_at`, `numeroCarte`, `societe`, `idVehicule`, `dateAquisition`) VALUES
	(1, '2020-12-29 08:11:35', '2020-12-29 08:11:35', 58975, 'AVISO', 2, '2020-12-16');
/*!40000 ALTER TABLE `carburant_cartes` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. carburant_comptants
DROP TABLE IF EXISTS `carburant_comptants`;
CREATE TABLE IF NOT EXISTS `carburant_comptants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idVehicule` bigint(20) unsigned NOT NULL,
  `date` date NOT NULL,
  `montant` int(11) NOT NULL,
  `qteServie` int(11) NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `utilisation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `carburant_comptants_idvehicule_foreign` (`idVehicule`),
  CONSTRAINT `carburant_comptants_idvehicule_foreign` FOREIGN KEY (`idVehicule`) REFERENCES `vehicules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.carburant_comptants : ~0 rows (environ)
DELETE FROM `carburant_comptants`;
/*!40000 ALTER TABLE `carburant_comptants` DISABLE KEYS */;
/*!40000 ALTER TABLE `carburant_comptants` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. carburant_previsions
DROP TABLE IF EXISTS `carburant_previsions`;
CREATE TABLE IF NOT EXISTS `carburant_previsions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dateDu` date NOT NULL,
  `dateAu` date NOT NULL,
  `axe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typeVehicule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `distance` int(11) NOT NULL,
  `conso100` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `litrage` int(11) NOT NULL,
  `coutCarburant` int(11) NOT NULL,
  `dessSemaine` int(11) NOT NULL,
  `coutSemaine` int(11) NOT NULL,
  `dessMois` int(11) NOT NULL,
  `coutMois` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.carburant_previsions : ~0 rows (environ)
DELETE FROM `carburant_previsions`;
/*!40000 ALTER TABLE `carburant_previsions` DISABLE KEYS */;
/*!40000 ALTER TABLE `carburant_previsions` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. carburant_tickets
DROP TABLE IF EXISTS `carburant_tickets`;
CREATE TABLE IF NOT EXISTS `carburant_tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numeroTicket` int(11) NOT NULL,
  `numeroCarteCarburant` int(11) NOT NULL,
  `idVehicule` int(11) NOT NULL,
  `solde` int(11) NOT NULL,
  `soldePrecedent` int(11) NOT NULL,
  `utilisation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kilometrage` int(11) NOT NULL,
  `litrage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.carburant_tickets : ~0 rows (environ)
DELETE FROM `carburant_tickets`;
/*!40000 ALTER TABLE `carburant_tickets` DISABLE KEYS */;
INSERT INTO `carburant_tickets` (`id`, `created_at`, `updated_at`, `date`, `heure`, `lieu`, `numeroTicket`, `numeroCarteCarburant`, `idVehicule`, `solde`, `soldePrecedent`, `utilisation`, `kilometrage`, `litrage`) VALUES
	(1, '2020-12-29 08:13:30', '2020-12-29 08:13:30', '2020-12-29', '10:12:00', 'ABIDJAN', 455, 58975, 2, 2546, 10233, 'Vidange', 1200, '235');
/*!40000 ALTER TABLE `carburant_tickets` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. centres
DROP TABLE IF EXISTS `centres`;
CREATE TABLE IF NOT EXISTS `centres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.centres : ~3 rows (environ)
DELETE FROM `centres`;
/*!40000 ALTER TABLE `centres` DISABLE KEYS */;
INSERT INTO `centres` (`id`, `created_at`, `updated_at`, `centre`) VALUES
	(1, NULL, NULL, 'Abidjan'),
	(2, NULL, NULL, 'Bouaké'),
	(3, NULL, NULL, 'Daloa');
/*!40000 ALTER TABLE `centres` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. centre_regionals
DROP TABLE IF EXISTS `centre_regionals`;
CREATE TABLE IF NOT EXISTS `centre_regionals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `centre_regional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_centre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.centre_regionals : ~9 rows (environ)
DELETE FROM `centre_regionals`;
/*!40000 ALTER TABLE `centre_regionals` DISABLE KEYS */;
INSERT INTO `centre_regionals` (`id`, `created_at`, `updated_at`, `centre_regional`, `id_centre`) VALUES
	(1, NULL, NULL, 'Abidjan Nord', 1),
	(2, NULL, NULL, 'Abidjan Sud', 1),
	(3, NULL, NULL, 'Abengourou', 1),
	(4, NULL, NULL, 'Bouaké', 2),
	(5, NULL, NULL, 'Yamoussokro', 2),
	(6, NULL, NULL, 'Korogo', 2),
	(7, NULL, NULL, 'Man', 3),
	(8, NULL, NULL, 'Daloa', 3),
	(9, NULL, NULL, 'San Pedro', 3);
/*!40000 ALTER TABLE `centre_regionals` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. commercial_clients
DROP TABLE IF EXISTS `commercial_clients`;
CREATE TABLE IF NOT EXISTS `commercial_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_situation_geographique` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_regime_impot` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_boite_postale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_ville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_rc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_ncc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_portefeuille` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_fonction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_portable` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_secteur_activite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contrat_numero` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contrat_date_effet` date DEFAULT NULL,
  `contrat_duree` int(11) DEFAULT NULL,
  `contrat_objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contrat_desserte` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contrat_frequence_op` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contrat_regime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_tdf_vb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_tdf_vl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_mad_caisse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_collecte` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_petit_materiel_securipack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_petit_materiel_sacjute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_petit_materiel_scelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_garde_de_fonds_cout_unitaire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_garde_de_fonds_montant_garde_cu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_garde_de_fonds_cout_forfetaire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_garde_de_fonds_montant_garde_cf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_comptage_tri_cout_unitaire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_comptage_tri_montant_ctv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_gestion_atm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_maintenance_atm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `base_consommable_atm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.commercial_clients : ~43 rows (environ)
DELETE FROM `commercial_clients`;
/*!40000 ALTER TABLE `commercial_clients` DISABLE KEYS */;
INSERT INTO `commercial_clients` (`id`, `created_at`, `updated_at`, `client_nom`, `client_situation_geographique`, `client_tel`, `client_regime_impot`, `client_boite_postale`, `client_ville`, `client_rc`, `client_ncc`, `contact_nom`, `contact_email`, `contact_portefeuille`, `contact_fonction`, `contact_portable`, `contact_secteur_activite`, `contrat_numero`, `contrat_date_effet`, `contrat_duree`, `contrat_objet`, `contrat_desserte`, `contrat_frequence_op`, `contrat_regime`, `base_tdf_vb`, `base_tdf_vl`, `base_mad_caisse`, `base_collecte`, `base_petit_materiel_securipack`, `base_petit_materiel_sacjute`, `base_petit_materiel_scelle`, `base_garde_de_fonds_cout_unitaire`, `base_garde_de_fonds_montant_garde_cu`, `base_garde_de_fonds_cout_forfetaire`, `base_garde_de_fonds_montant_garde_cf`, `base_comptage_tri_cout_unitaire`, `base_comptage_tri_montant_ctv`, `base_gestion_atm`, `base_maintenance_atm`, `base_consommable_atm`) VALUES
	(1, '2020-12-15 16:23:40', '2020-12-15 16:23:40', 'BANK DE BEDI', 'ABIDJAN', '02557052', NULL, NULL, NULL, NULL, NULL, 'BDEDI CLAUDE NICOLAS', 'sawaad1@gmail.com', NULL, 'transitaire', '658999', 'transiteJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, '2020-12-15 16:24:34', '2020-12-15 16:24:34', 'BANK IVOIRE', 'MAN', '55555555', 'normalS', '01 BP 1048', 'ABIDJAN', '22222222', 'cc 02454v14M', 'BDEDI CLAUDE', 'asdoS@mail.com', 'dersklj', 'transitaire', '658999', 'transite1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, '2020-12-15 16:25:31', '2020-12-15 16:25:31', 'AFRIKA KANK DEV', 'DALOA -DAKOTA', '52478963', 'normal', '01 BP 1048', 'ABIDJAN', '22222222', NULL, 'BDEDI CLAUDE', 'asdoS@mail.com', 'derskl12', 'caissiere', '6589995', 'transiteK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, '2021-07-09 08:32:36', '2021-07-09 08:32:36', 'client coris b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'km piste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, '2021-08-04 14:10:56', '2021-08-04 14:12:06', 'DIS', NULL, NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'SAWADOGO ISSIAKA', 'isakas@yahoo.fr', 'DIRECTION COMMERCIALE', 'GERANT/ADMINISTRAEUR', '07 07 02 27 62/07 07 24 19 19', 'PETROLIER', NULL, NULL, NULL, 'TDF VL,Collecte,Petit matériel', NULL, 'Permanent', 'Intra muros', NULL, 'intra muros', NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, '2021-08-04 15:05:03', '2021-08-04 15:05:03', 'SICOGI', 'ADJAME MIRADOR', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'SIDIBE', 'Assetou.KONATE@sicogi.ci', 'DIRECTION COMMERCIALE', 'DAF', '20 01 12 99/07 07 40 60 24', 'LOGEMENT', NULL, NULL, NULL, 'TDF VB,Collecte,Petit matériel', NULL, 'Appel', 'Intra muros', 'intra muros', NULL, NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, '2021-08-04 18:10:18', '2021-08-04 18:11:20', 'PISAM COCODY', NULL, NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'KOUA RICHMOND', 'bkoua@pisam.ci', 'DIRECTION COMMERCIALE', 'COMPTABLE', '22 48 31 06/07 08 74 94 15', NULL, NULL, NULL, NULL, 'TDF VL,Collecte,Petit matériel', NULL, 'Permanent', NULL, NULL, NULL, NULL, '23333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, '2021-08-04 18:18:13', '2021-08-04 18:18:13', 'KAYDEN DISTRIBUTION', 'COCODY', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'MME KOUADIO MADELAINE', 'm.kouadio@adiscom.net', 'DIRECTION COMMERCIALE', 'GERANTE', '05 46 95 05 33', 'PETROLIER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8000', 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, '2021-08-04 18:26:22', '2021-08-04 18:26:22', 'IVT GOLF', 'COCODY RIVIERA 3', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'PHILIPPE MONIQUE', 'monikmph@gmail.com', 'DIRECTION COMMERCIALE', 'DIRECTRICE', '05 05 05 04 02', 'TOURISME', NULL, NULL, NULL, 'TDF VL,Collecte', NULL, 'Appel', 'Intra muros', NULL, 'intra muros', NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, '2021-08-04 18:37:47', '2021-08-04 18:37:47', 'POLYCLINIQUE FARAH', 'MARCORY', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'ABBAS ABDOUL', 'ab.abboud@polycliquefarah.com', 'DIRECTION COMMERCIALE', 'DAF', '21 26 00 93/07 48 92 47 45', NULL, NULL, NULL, NULL, 'TDF VL,Collecte', NULL, 'Permanent', NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(11, '2021-08-04 18:53:28', '2021-08-05 14:25:57', 'AMBASSADE DES USA', 'COCODY', NULL, 'normal', NULL, 'ABIDJAN', NULL, NULL, 'HARAWA GEOFFREY', 'harawagk@state.gov', 'DIRECTION COMMERCIALE', 'PRINCIPAL CASHIER', '22 49 40 55/05 55 56 21 22', 'CHANCELERIE', NULL, NULL, NULL, 'TDF VB,Collecte', NULL, 'Appel', NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(12, '2021-08-04 19:14:32', '2021-08-04 19:14:32', 'DOLIDOL', 'YOPOUGON ZONE INDUSTRIEL', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'MME DEYENE KHADIJA', 'kdeyene@dolidol.ci', 'DIRECTION COMMERCIALE', 'DIRECTRICE SUPPORT', '23 50 80 02/ 07 87 68 51 69', 'DISTRIBUTEUR', NULL, NULL, NULL, 'TDF VB,Collecte', NULL, 'Permanent', NULL, NULL, NULL, NULL, NULL, 'Grand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(13, '2021-08-04 19:21:27', '2021-08-04 19:21:27', 'SUITE COM', 'COCODY', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'MLLE KONAN YAHAUT', 'deenahk-yahaut@suitecom-ci.com', 'DIRECTION COMMERCIALE', 'DIRECTRICE OPERATIONS', '07 07 01 85 16', 'TELEPHONIE', NULL, NULL, NULL, 'TDF VB,Collecte', NULL, 'Permanent', NULL, NULL, NULL, NULL, NULL, 'Grand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(14, '2021-08-05 09:31:21', '2021-08-05 09:31:21', 'CLIENT BAFATAK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(15, '2021-08-05 10:54:10', '2021-08-05 10:54:10', 'UBA/CFCI', 'YOPOUGON', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'MME SAKO HADJA', 'hadja.sako@ubagroup.com', 'DIRECTION COMMERCIALE', 'CHARGE PORTEFEUILLE', '20 31 22 22/07 7962 28 03', 'DISTRIBUTEUR', NULL, NULL, NULL, 'TDF VL,Collecte', NULL, 'Permanent', NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(16, '2021-08-05 11:05:57', '2021-08-05 11:05:57', 'CDCI CI', 'TREICHVILLE PORT', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'MAACHI', NULL, 'DIRECTION COMMERCIALE', 'DAF', '21 24 01 51/21 24 26 82', 'DISTRIBUTEUR', NULL, NULL, NULL, 'TDF VL,Collecte', NULL, 'Permanent', NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(17, '2021-08-05 11:17:27', '2021-08-05 11:47:38', 'ecobank-bouaké', 'bouaké-commerce', NULL, NULL, NULL, 'bouaké', NULL, NULL, 'toualy kevin', 'ktoualy@ecobank.com', 'direction commerciale', 'chef de caisse', '0709249329', 'banque', NULL, NULL, NULL, 'TDF VB,MAD CAISSE,Garde de fonds,Comptage + tri,Petit matériel', NULL, 'Appel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(18, '2021-08-05 11:38:54', '2021-08-05 11:38:54', 'MOSAIK TELECOM', 'COCODY ANGRE', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'ALLAH ARSENE', 'aallahkouame@mosaiktelecom.com', 'DIRECTION COMMERCIALE', 'SG', '07  07 01 11 23', 'TELEPHONIE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(19, '2021-08-05 11:41:33', '2021-08-05 11:43:24', 'CORISBANK', 'bouaké-commerce', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'soro aboulaye', 'absoro@corisbank.com', 'direction commerciale', 'chef d\'agence', '0575237990', 'banque', NULL, NULL, NULL, 'TDF VB,Petit matériel', NULL, 'Appel', 'Intra muros,Extra muros', 'km bitume', NULL, NULL, NULL, 'Extra grand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(20, '2021-08-05 11:48:02', '2021-08-05 11:48:02', 'SII', 'COCODY DANGA', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'KOUAMELA EKISSI HERVE', 'ekissih@yahoo.fr', 'DIRECTION COMMERCIALE', 'DAF', '22 44 04 54/ 07 47 86 14 14', 'TELEPHONIE', NULL, NULL, NULL, 'TDF VB,TDF VL,Collecte', NULL, 'Permanent', NULL, NULL, NULL, NULL, NULL, 'Moyen', 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(21, '2021-08-05 12:18:22', '2021-08-05 12:25:10', 'QUIPUX GUICHET UNIQUE BOUAKE', 'BOUAKE-NIMBO', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'N\'ZUE INNOCENTE', NULL, 'DIRECTION COMMERCIALE', 'CHEF D\'AGENCE', '0707495111', NULL, NULL, NULL, NULL, 'TDF VL,Petit matériel', NULL, NULL, 'Intra muros', NULL, 'intra muros', NULL, NULL, 'Petit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(22, '2021-08-05 12:24:03', '2021-08-05 12:24:03', 'QUIPUX CGI BOUAKE', 'BOUAKE-COMMERCE', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'FOFANA SEKOU', NULL, 'DIRECTION COMMERCIALE', 'CHEF D\'AGENCE', '0747478337', NULL, NULL, NULL, NULL, 'TDF VL', NULL, 'Permanent', 'Intra muros', NULL, 'intra muros', NULL, NULL, 'Petit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(23, '2021-08-05 12:29:06', '2021-08-05 12:29:06', 'COOPEC BOUAKE1', 'BOUAKE-COMMERCE', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'GOME', 'cbouake@unacoopec.ci', 'DIRECTION COMMERCIALE', 'CHEF DE CAISSE', '0102036433', 'banque', NULL, NULL, NULL, 'TDF VB,Petit matériel', NULL, 'Appel', 'Intra muros', 'intra muros', NULL, NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(24, '2021-08-05 12:43:49', '2021-08-05 13:05:22', 'COOPEC SAKASSOU', 'SAKASSOU', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'SORO DOKPORO', 'csakassou@unacoopec.ci', 'DIRECTION COMMERCIALE', 'CHEF D\'AGENCE', '0708192503', NULL, NULL, NULL, NULL, 'TDF VB,MAD CAISSE,Petit matériel', NULL, 'Appel', 'Extra muros', 'km bitume', NULL, 'MIS A DISPOSITION DE CAISSIERE', NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(25, '2021-08-05 12:46:01', '2021-08-05 13:04:45', 'COOPEC DOUGOUBA', 'BOUAKE-DOUGOUBA', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'KOUASSI MARIE LAURE', 'cdougouba@unacoopec.ci', 'DIRECTION COMMERCIALE', 'CHEF D\'AGENCE', '0102502357', NULL, NULL, NULL, NULL, 'TDF VB,MAD CAISSE,Petit matériel', NULL, 'Appel', 'Intra muros', 'intra muros', NULL, 'MIS A DISPOSITION DE CAISSIERE', NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(26, '2021-08-05 12:51:01', '2021-08-05 12:59:04', 'COOPEC BEOUMI', 'BEOUMI', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'ANIBE', 'cbeoumi@unacoopec.ci', 'DIRECTION COMMERCIALE', 'CHEF D\'AGENCE', '0101623856', NULL, NULL, NULL, NULL, 'TDF VB,Petit matériel', NULL, 'Appel', 'Extra muros', 'km bitume', NULL, NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(27, '2021-08-05 12:53:25', '2021-08-05 12:59:32', 'COOPEC DABAKALA', 'DABAKALA', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'SANOGO', 'cdabakala@unacoopec.ci', 'DIRECTION COMMERCIALE', 'CHEF D\'AGENCE', '0102038499', NULL, NULL, NULL, NULL, 'TDF VB,MAD CAISSE,Petit matériel', NULL, 'Appel', 'Extra muros', 'km bitume', NULL, 'MIS A DISPOSITION DE CAISSIERE', NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(28, '2021-08-05 12:56:44', '2021-08-05 13:01:02', 'COOPEC NIAKARA', 'NIAKARA', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'KOIGNY BAKAN SERGE', 'cniakara@unacoopec.ci', 'DIRECTION COMMERCIALE', 'CHEF D\'AGENCE', '0140011145', NULL, NULL, NULL, NULL, 'TDF VB,Petit matériel', NULL, 'Appel', 'Extra muros', 'km bitume', NULL, NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(29, '2021-08-05 12:57:55', '2021-08-05 12:57:55', 'ATLANTIQUE  TELECOM', 'PLATEAU', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'MME NGUETTE KADJO', 'Augstine.KADJO@Moov.Com', 'DIRECTION COMMERCIALE', 'DAF', '20 21 01 01', 'TELEPHONIE', NULL, NULL, NULL, 'TDF VL,Collecte', NULL, 'Permanent', 'Intra muros,Extra muros', NULL, NULL, NULL, NULL, 'Petit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(30, '2021-08-05 13:03:49', '2021-08-05 13:03:49', 'COOPEC MANKONO', 'MANKONO', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'KOUASSI YAO PATRICE', 'cmankono@unacoopec.ci', NULL, 'CHEF D\'AGENCE', '0140011145', NULL, NULL, NULL, NULL, 'TDF VB,Petit matériel', NULL, 'Appel', 'Extra muros', 'km bitume', NULL, NULL, NULL, 'Petit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(31, '2021-08-05 13:28:20', '2021-08-05 13:28:20', 'MOOV BOUAKE', 'BOUAKE-COMMERCE', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'Mme DAGO', NULL, 'DIRECTION COMMERCIALE', 'DAF', '0101000434', NULL, NULL, NULL, NULL, 'TDF VL', NULL, 'Permanent', 'Intra muros', NULL, 'intra muros', NULL, NULL, 'Petit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(32, '2021-08-05 13:31:16', '2021-08-05 13:31:16', 'UNACOOPEC', 'COCODY', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'ETIBOA', 'etiboa@unacoopec.ci', 'DIRECTION COMMERCIALE', 'DIRECTEUR DES OPERATIONS', '01 02 02 13 26', 'BANQUE', NULL, NULL, NULL, 'TDF VB,Collecte', NULL, 'Permanent,Appel', NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(33, '2021-08-05 13:32:17', '2021-08-05 13:34:35', 'WAVE BOUAKE COMMERCE', 'BOUAKE-COMMERCE', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, NULL, NULL, 'DIRECTION COMMERCIALE', 'RESPONSABLE D\'AGENCE', NULL, NULL, NULL, NULL, NULL, 'TDF VB,MAD CAISSE,Garde de fonds,Petit matériel', NULL, 'Appel', 'Intra muros', 'intra muros', NULL, 'MIS A DISPOSITION DE CAISSIERE', NULL, 'Grand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(34, '2021-08-05 13:33:49', '2021-08-05 13:35:20', 'WAVE MARCHE DE GROS BOUAKE', 'BOUAKE-MARCHE DE GROS', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, NULL, NULL, 'DIRECTION COMMERCIALE', 'RESPONSABLE D\'AGENCE', NULL, NULL, NULL, NULL, NULL, 'TDF VB,MAD CAISSE,Garde de fonds,Petit matériel', NULL, 'Appel', 'Intra muros', 'intra muros', NULL, 'MIS A DISPOSITION DE CAISSIERE', NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(35, '2021-08-05 13:37:39', '2021-08-05 13:37:39', 'SGCI', 'PLATEAU', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'GRIS JEAN CHRISTIAN', 'Jean-christian.gris@socgen.com', 'DIRECTION COMMERCIALE', 'RESPO ADJOINT SUPLLY CHAIN', '20 25 99 49/ 05 46 94 14 57', 'BANQUE', NULL, NULL, NULL, 'TDF VB,Collecte,Gestion ATM,Maintenance ATM', NULL, 'Appel', 'Extra muros', NULL, NULL, NULL, NULL, 'Extra grand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(36, '2021-08-05 13:38:06', '2021-08-05 13:38:06', 'WAVE KATIOLA', 'KATIOLA', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, NULL, NULL, 'DIRECTION COMMERCIALE', 'RESPONSABLE D\'AGENCE', NULL, NULL, NULL, NULL, NULL, 'TDF VB,Garde de fonds,Petit matériel', NULL, 'Appel', 'Extra muros', 'km bitume', NULL, NULL, NULL, 'Grand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(37, '2021-08-05 13:41:03', '2021-08-05 13:41:03', 'WAVE TIENINGBOUE', 'TIENINGBOUE', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, NULL, NULL, 'DIRECTION COMMERCIALE', 'RESPONSABLE D\'AGENCE', NULL, NULL, NULL, NULL, NULL, 'TDF VB,Petit matériel', NULL, 'Appel', 'Extra muros', 'km bitume', NULL, NULL, NULL, 'Grand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(38, '2021-08-05 13:42:13', '2021-08-05 13:42:13', 'WAVE MANKONO', 'MANKONO', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, NULL, NULL, 'DIRECTION COMMERCIALE', 'RESPONSABLE D\'AGENCE', NULL, NULL, NULL, NULL, NULL, 'TDF VB,Garde de fonds,Petit matériel', NULL, NULL, NULL, 'km bitume', NULL, NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(39, '2021-08-05 13:42:32', '2021-08-05 13:42:32', 'PAMF', 'YOPOUGON', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'KONE PAHADJA', 'pahadja.kone@ci.pamfwa.org', 'DIRECTION COMMERCIALE', 'DAF', '07 49 19 96 88', 'MICROFINANCE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(40, '2021-08-05 13:47:58', '2021-08-05 13:47:58', 'SGCI BOUAKE', 'BOUAKE-COMMERCE', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'YAPO OLIVIER', 'olivier.yapo@socgen.com', 'DIRECTION COMMERCIALE', 'RESPONSABLE MONETIQUE', NULL, NULL, NULL, NULL, NULL, 'TDF VB,Gestion ATM,Maintenance ATM,Consommable ATM', NULL, 'Permanent', 'Intra muros', 'intra muros', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GESTION ATM', NULL, NULL),
	(41, '2021-08-05 13:47:59', '2021-08-05 13:47:59', 'SGCI BOUAKE', 'BOUAKE-COMMERCE', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'YAPO OLIVIER', 'olivier.yapo@socgen.com', 'DIRECTION COMMERCIALE', 'RESPONSABLE MONETIQUE', NULL, NULL, NULL, NULL, NULL, 'TDF VB,Gestion ATM,Maintenance ATM,Consommable ATM', NULL, 'Permanent', 'Intra muros', 'intra muros', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GESTION ATM', NULL, NULL),
	(42, '2021-08-05 13:53:21', '2021-08-05 13:53:21', 'ECOBANK CI', 'PLATEAU', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'KANGHAH FRANCK CESAR', 'akanghah@ecobank.com', 'DIRECTION COMMERCIALE', 'DIRECTEUR DES OPERATIONS', '20 31 93 11', 'BANQUE', NULL, NULL, NULL, 'TDF VB,MAD CAISSE,Collecte,Garde de fonds,Comptage + tri,Gestion ATM,Maintenance ATM', 'Banque centrale,Agence principale,Agence secondaire', 'Permanent,Appel', NULL, NULL, NULL, NULL, NULL, 'Extra grand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(43, '2021-08-05 13:57:31', '2021-08-05 13:57:31', 'LAJOY SARL', 'ZUENOULA', NULL, NULL, NULL, 'BOUAKE', NULL, NULL, 'DJEBI', NULL, 'DIRECTION COMMERCIALE', 'CHEF D\'AGENCE', '0748012769', 'micro-finance', NULL, NULL, NULL, 'TDF VB,Petit matériel', NULL, 'Appel', 'Extra muros', 'km bitume', NULL, NULL, NULL, 'Grand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(44, '2021-08-05 14:58:19', '2021-08-05 14:58:19', 'CORIS BANK', 'PLATEAU', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'KOFFI YAO EMERSON', 'kyao@coris-bank.com', 'DIRECTION COMMERCIALE', 'CHARGE DU PATRIMOINE', '20 20 94 87 /05 04 12 75 52', 'BANQUE', NULL, NULL, NULL, 'TDF VB,Collecte', NULL, 'Appel', NULL, NULL, NULL, NULL, NULL, 'Extra grand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(45, '2021-08-05 15:11:48', '2021-08-05 15:11:48', 'BNI \'', 'PLATEAU', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'COULIBALY KAMA PATRICK', 'patrice.coulibaly@bni.ci', 'DIRECTION COMMERCIALE', 'DIRECTEUR DES OPERATIONS', '20 31 51 43/01 03 43 80 69', NULL, NULL, NULL, NULL, 'TDF VB,Collecte,Garde de fonds,Comptage + tri,Gestion ATM,Maintenance ATM', 'Banque centrale,Agence principale,Agence secondaire', 'Appel', 'Intra muros,Extra muros', NULL, NULL, NULL, NULL, 'Extra grand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(46, '2021-08-05 16:36:05', '2021-08-05 16:36:05', 'BGFI', 'MARCORY', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'MME NGORAN MARIE LAURE', 'm-l-ngoran@bgfigroupe.com', 'DIRECTION COMMERCIALE', 'CHEF DES SERVICES MOYEN GENERAUX', '21 56 91 56 /58 51 30 10', 'BANQUE', NULL, NULL, NULL, 'Gestion ATM,Maintenance ATM', NULL, 'Appel', 'Intra muros', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(47, '2021-08-05 16:41:59', '2021-08-05 16:41:59', 'BANQUE POPULAIRE', 'PLATEAU', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'MME DAPA SEWA DEKI KOUAKOU', 'aadeki@caissepargne.ci', 'DIRECTION COMMERCIALE', 'DIRECTEUR DES MOYENS GENERAUX', '07 08 14 68 77', 'BANQUE', NULL, NULL, NULL, 'TDF VB,Collecte', NULL, 'Appel', 'Intra muros,Extra muros', NULL, NULL, NULL, NULL, 'Extra grand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(48, '2021-08-05 16:47:45', '2021-08-05 16:47:45', 'BACI', 'PLATEAU', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'KOUADIO JEAN BAPTISTE', 'jean-baptiste.kouadio@banqueatlatlantique.net', 'DIRECTION COMMERCIALE', 'DIRECTEUR DES OPERATIONS', '20 31 59 67/01 01 50 13 46', 'BANQUE', NULL, NULL, NULL, 'TDF VB,Collecte,Garde de fonds,Comptage + tri,Gestion ATM,Maintenance ATM', 'Banque centrale,Agence principale,Agence secondaire', 'Appel', 'Intra muros,Extra muros', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(49, '2021-08-05 16:51:14', '2021-08-05 16:51:14', 'AGIR FINANCE', 'PLATEAU', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'GOSSE FRANCK', 'gossfranck@gmail.com', 'DIRECTION COMMERCIALE', 'DAF', '07 08 02 24 40 08', 'MICROFINANCE', NULL, NULL, NULL, 'TDF VL,Collecte', NULL, 'Permanent', 'Intra muros', NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(50, '2021-08-05 16:59:42', '2021-08-05 16:59:42', 'QUIPUX CI', 'COCODY RIVIERA', NULL, NULL, NULL, 'ABIDJAN', NULL, NULL, 'YAO', NULL, 'DIRECTION COMMERCIALE', 'DAF', '05 54 01 19 58', 'DISTRIBUTEUR', NULL, NULL, NULL, 'TDF VL,Collecte', NULL, 'Permanent', 'Intra muros', NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `commercial_clients` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. commercial_sites
DROP TABLE IF EXISTS `commercial_sites`;
CREATE TABLE IF NOT EXISTS `commercial_sites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client` bigint(20) unsigned NOT NULL,
  `site` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_contact_site` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fonction_contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centre_regional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_carte` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_vb_extamuros_bitume` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_vb_extramuros_piste` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_vl_extramuros_bitume` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_vl_extramuros_piste` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_vb_intramuros` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_mad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_collecte` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_cctv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_collecte_caisse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_borne_cheque` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_borne_operation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_gestion_gab_niveau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_gestion_gab_prix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_maintenance_n2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_vente_location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_vente_consommables` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_vente_pieces_detachees` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_securipack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_sac_juste` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_scelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oo_total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forfait_mensuel_ctv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forfait_mensuel_gdf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forfait_mensuel_mad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tarif_bitume` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tarif_km_piste` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tarif_tdf_vb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tarif_tdf_vl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tarif_collecte_caissiere` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commercial_sites_client_foreign` (`client`),
  CONSTRAINT `commercial_sites_client_foreign` FOREIGN KEY (`client`) REFERENCES `commercial_clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.commercial_sites : ~21 rows (environ)
DELETE FROM `commercial_sites`;
/*!40000 ALTER TABLE `commercial_sites` DISABLE KEYS */;
INSERT INTO `commercial_sites` (`id`, `created_at`, `updated_at`, `client`, `site`, `nom_contact_site`, `fonction_contact`, `centre`, `centre_regional`, `telephone`, `no_carte`, `oo_vb_extamuros_bitume`, `oo_vb_extramuros_piste`, `oo_vl_extramuros_bitume`, `oo_vl_extramuros_piste`, `oo_vb_intramuros`, `oo_mad`, `oo_collecte`, `oo_cctv`, `oo_collecte_caisse`, `oo_borne_cheque`, `oo_borne_operation`, `oo_gestion_gab_niveau`, `oo_gestion_gab_prix`, `oo_maintenance_n2`, `oo_vente_location`, `oo_vente_consommables`, `oo_vente_pieces_detachees`, `oo_securipack`, `oo_sac_juste`, `oo_scelle`, `oo_total`, `forfait_mensuel_ctv`, `forfait_mensuel_gdf`, `forfait_mensuel_mad`, `regime`, `tarif_bitume`, `tarif_km_piste`, `tarif_tdf_vb`, `tarif_tdf_vl`, `tarif_collecte_caissiere`) VALUES
	(5, '2021-08-04 14:18:50', '2021-08-09 12:32:36', 5, 'SHELL PO ABATTA', 'BLAISE', 'Gérant piste', 'Abidjan', 'Abidjan Sud', '01 01 83 85 79', NULL, '8000', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(6, '2021-08-05 10:59:51', '2021-08-05 10:59:51', 15, 'UNIWAX PLATEAU', 'MORO', NULL, 'Abidjan', 'Abidjan Sud', '05 44 20 5678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(7, '2021-08-05 11:27:45', '2021-08-05 11:29:31', 17, 'BCEAO', 'TOUALY KEVIN', 'CHEF DE CAISSE', 'Bouaké', 'Bouaké', NULL, NULL, '127200', NULL, NULL, NULL, '21750', '50000', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Extra grand', 'Grand', '550', '0', NULL, NULL, NULL, 'Extra muros', NULL, NULL, NULL, NULL, NULL),
	(8, '2021-08-05 16:55:13', '2021-08-05 16:55:13', 49, 'CIL/AGIR FINANCE', 'GOSSE FRANCK', 'DAF', 'Abidjan', 'Abidjan Sud', '07 08 02 24 44 08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(9, '2021-08-05 17:13:34', '2021-08-05 17:13:34', 50, 'QUIPUX YOPOUGON BAE', 'KOMARA', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '07 08 00 26 31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Extra muros', NULL, NULL, NULL, NULL, NULL),
	(10, '2021-08-05 17:17:58', '2021-08-05 17:17:58', 50, 'QUIPUX CIL', 'KOMARA', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '07 08 00 26 31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(11, '2021-08-05 17:23:08', '2021-08-05 17:23:08', 50, 'QUIPUX PONT HB', 'KOMARA', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '07 08 00 26 31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(12, '2021-08-05 17:26:44', '2021-08-05 17:26:44', 50, 'QUIPUX SOLIBRA', 'KOMARA', 'CHARGE RECONNAISSANCE', 'Choisir centre', 'Choisir centre régional', '07 08 00 26 31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Extra muros', NULL, NULL, NULL, NULL, NULL),
	(13, '2021-08-05 17:29:49', '2021-08-05 17:29:49', 50, 'QUIPUX VALLON', 'KOMARA', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '07 08 00 26 31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(14, '2021-08-05 17:33:52', '2021-08-05 17:33:52', 50, 'QUIPUX STE CAMILLE', 'KOMARA', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '07 08 00 26 31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(15, '2021-08-05 17:37:57', '2021-08-05 17:37:57', 50, 'QUIPUX DOKUI', 'KOMARA', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '07 08 00 26 31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(16, '2021-08-05 17:54:25', '2021-08-05 17:54:25', 5, 'SHELL 7 TRANCHE', 'BLAISE', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '01 01 83 85 79', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(17, '2021-08-05 17:56:12', '2021-08-05 17:56:12', 5, 'SHELL FIGAYO', 'BLAISE', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '01 01 83 85 79', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(18, '2021-08-09 13:04:02', '2021-08-09 13:04:02', 15, 'UNIWAX Z.I', 'MORO', 'CHARGE RECONNAISSANCE', 'Choisir centre', 'Choisir centre régional', '05 44 20 5678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(19, '2021-08-09 13:18:59', '2021-08-09 13:18:59', 15, 'UNIWAX P.MARCORY', 'MORO', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '05 44 20 5678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(20, '2021-08-09 13:21:23', '2021-08-09 13:21:23', 15, 'UNIWAX P.PALMERAIE', 'MORO', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '05 44 20 5678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(21, '2021-08-09 13:22:48', '2021-08-09 13:22:48', 15, 'UNIWAX CAP SUD', 'MORO', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '05 44 20 5678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(22, '2021-08-09 13:23:57', '2021-08-09 13:23:57', 15, 'UNIWAX WOODIN', 'MORO', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '05 44 20 5678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(23, '2021-08-09 13:24:57', '2021-08-09 13:24:57', 15, 'UNIWAX VILSCO', 'MORO', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '05 44 20 5678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(24, '2021-08-09 13:26:27', '2021-08-09 13:26:27', 15, 'UNIWAX DJIBI', 'MORO', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '05 44 20 5678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL),
	(25, '2021-08-09 13:27:33', '2021-08-09 13:27:33', 15, 'UNIWAX CAP NORD', 'MORO', 'CHARGE RECONNAISSANCE', 'Abidjan', 'Abidjan Sud', '05 44 20 5678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moyen', NULL, NULL, '0', NULL, NULL, NULL, 'Intra muros', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `commercial_sites` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. comptabilite_degradations
DROP TABLE IF EXISTS `comptabilite_degradations`;
CREATE TABLE IF NOT EXISTS `comptabilite_degradations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dateDegradation` date DEFAULT NULL,
  `conteneur` bigint(20) unsigned NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `destinationProvenance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site` bigint(20) unsigned NOT NULL,
  `client` bigint(20) unsigned NOT NULL,
  `commentaire` text COLLATE utf8_unicode_ci,
  `conteneurEnleve` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conteneurAvecFonds` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `dateDeclaration` date DEFAULT NULL,
  `bordereau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comptabilite_degradations_conteneur_foreign` (`conteneur`),
  KEY `comptabilite_degradations_site_foreign` (`site`),
  KEY `comptabilite_degradations_client_foreign` (`client`),
  CONSTRAINT `comptabilite_degradations_client_foreign` FOREIGN KEY (`client`) REFERENCES `commercial_clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comptabilite_degradations_conteneur_foreign` FOREIGN KEY (`conteneur`) REFERENCES `conteneurs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comptabilite_degradations_site_foreign` FOREIGN KEY (`site`) REFERENCES `commercial_sites` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.comptabilite_degradations : ~0 rows (environ)
DELETE FROM `comptabilite_degradations`;
/*!40000 ALTER TABLE `comptabilite_degradations` DISABLE KEYS */;
/*!40000 ALTER TABLE `comptabilite_degradations` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. comptabilite_entree_caisses
DROP TABLE IF EXISTS `comptabilite_entree_caisses`;
CREATE TABLE IF NOT EXISTS `comptabilite_entree_caisses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `somme` int(11) NOT NULL,
  `motif` text COLLATE utf8_unicode_ci,
  `deposant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.comptabilite_entree_caisses : ~0 rows (environ)
DELETE FROM `comptabilite_entree_caisses`;
/*!40000 ALTER TABLE `comptabilite_entree_caisses` DISABLE KEYS */;
/*!40000 ALTER TABLE `comptabilite_entree_caisses` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. comptabilite_factures
DROP TABLE IF EXISTS `comptabilite_factures`;
CREATE TABLE IF NOT EXISTS `comptabilite_factures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `numeroFacture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client` bigint(20) unsigned NOT NULL,
  `periode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montant` double DEFAULT NULL,
  `dateDepot` date DEFAULT NULL,
  `dateEcheance` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comptabilite_factures_client_foreign` (`client`),
  CONSTRAINT `comptabilite_factures_client_foreign` FOREIGN KEY (`client`) REFERENCES `commercial_clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.comptabilite_factures : ~0 rows (environ)
DELETE FROM `comptabilite_factures`;
/*!40000 ALTER TABLE `comptabilite_factures` DISABLE KEYS */;
/*!40000 ALTER TABLE `comptabilite_factures` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. comptabilite_reglement_fatures
DROP TABLE IF EXISTS `comptabilite_reglement_fatures`;
CREATE TABLE IF NOT EXISTS `comptabilite_reglement_fatures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facture` bigint(20) unsigned NOT NULL,
  `date` date NOT NULL,
  `modeReglement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pieceComptable` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantVerse` double DEFAULT NULL,
  `montantRestant` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comptabilite_reglement_fatures_facture_foreign` (`facture`),
  CONSTRAINT `comptabilite_reglement_fatures_facture_foreign` FOREIGN KEY (`facture`) REFERENCES `comptabilite_factures` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.comptabilite_reglement_fatures : ~0 rows (environ)
DELETE FROM `comptabilite_reglement_fatures`;
/*!40000 ALTER TABLE `comptabilite_reglement_fatures` DISABLE KEYS */;
/*!40000 ALTER TABLE `comptabilite_reglement_fatures` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. comptabilite_sortie_caisses
DROP TABLE IF EXISTS `comptabilite_sortie_caisses`;
CREATE TABLE IF NOT EXISTS `comptabilite_sortie_caisses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `somme` int(11) DEFAULT NULL,
  `motif` text COLLATE utf8_unicode_ci,
  `beneficiaire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.comptabilite_sortie_caisses : ~0 rows (environ)
DELETE FROM `comptabilite_sortie_caisses`;
/*!40000 ALTER TABLE `comptabilite_sortie_caisses` DISABLE KEYS */;
/*!40000 ALTER TABLE `comptabilite_sortie_caisses` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. conteneurs
DROP TABLE IF EXISTS `conteneurs`;
CREATE TABLE IF NOT EXISTS `conteneurs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `conteneur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typeConteneur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateMiseVie` date NOT NULL,
  `dureeVie` int(11) NOT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateDegradation` date NOT NULL,
  `cause` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remplacePar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remplaceLe` date NOT NULL,
  `dateMaintenanceEffectuee` date NOT NULL,
  `dateImputation` date NOT NULL,
  `dateRenouvellement` date NOT NULL,
  `imputationRaport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.conteneurs : ~0 rows (environ)
DELETE FROM `conteneurs`;
/*!40000 ALTER TABLE `conteneurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `conteneurs` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. convoyeurs
DROP TABLE IF EXISTS `convoyeurs`;
CREATE TABLE IF NOT EXISTS `convoyeurs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nomPrenoms` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date DEFAULT NULL,
  `fonction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateEmbauche` date DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.convoyeurs : ~0 rows (environ)
DELETE FROM `convoyeurs`;
/*!40000 ALTER TABLE `convoyeurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `convoyeurs` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. depart_centres
DROP TABLE IF EXISTS `depart_centres`;
CREATE TABLE IF NOT EXISTS `depart_centres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `noTournee` bigint(20) unsigned NOT NULL,
  `heureDepart` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kmDepart` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `depart_centres_notournee_foreign` (`noTournee`),
  CONSTRAINT `depart_centres_notournee_foreign` FOREIGN KEY (`noTournee`) REFERENCES `depart_tournees` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.depart_centres : ~2 rows (environ)
DELETE FROM `depart_centres`;
/*!40000 ALTER TABLE `depart_centres` DISABLE KEYS */;
INSERT INTO `depart_centres` (`id`, `created_at`, `updated_at`, `noTournee`, `heureDepart`, `kmDepart`, `observation`) VALUES
	(1, '2020-12-17 15:14:34', '2020-12-17 15:14:34', 1, '15:16', '10', 'TEST OBSERVATION DEP CENTRE'),
	(2, '2020-12-17 15:28:18', '2020-12-17 15:28:18', 2, '15:28', '1200', 'BIEN'),
	(3, '2020-12-21 14:01:57', '2020-12-21 14:01:57', 3, '14:01', '1600', 'obs1'),
	(4, '2020-12-21 14:41:48', '2020-12-21 14:41:48', 5, '14:41', '1000', 'OBS2'),
	(5, '2020-12-28 14:50:55', '2020-12-28 14:50:55', 8, '14:50', '2500', 'observation du 28'),
	(6, '2021-08-17 07:58:18', '2021-08-17 07:58:18', 3, '07:57', '888', NULL),
	(7, '2021-08-17 08:00:59', '2021-08-17 08:00:59', 3, '08:00', '777', 'xxxxxxxxxxx');
/*!40000 ALTER TABLE `depart_centres` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. depart_sites
DROP TABLE IF EXISTS `depart_sites`;
CREATE TABLE IF NOT EXISTS `depart_sites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `noTournee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `heureDepart` time DEFAULT NULL,
  `site` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kmDepart` int(11) DEFAULT NULL,
  `bordereau` int(11) NOT NULL,
  `destination` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.depart_sites : ~2 rows (environ)
DELETE FROM `depart_sites`;
/*!40000 ALTER TABLE `depart_sites` DISABLE KEYS */;
INSERT INTO `depart_sites` (`id`, `created_at`, `updated_at`, `noTournee`, `heureDepart`, `site`, `kmDepart`, `bordereau`, `destination`, `observation`) VALUES
	(1, '2020-12-17 15:15:30', '2020-12-17 15:15:30', '1', '15:18:00', '1', 15, 1234678, 'TEST DESTINATION', 'TEST OBSERVATION DEPART SITE'),
	(2, '2020-12-17 15:29:42', '2020-12-17 15:29:42', '2', '17:29:00', '1', 1583, 63, 'MABV', 'OB3'),
	(3, '2020-12-21 14:47:58', '2020-12-21 14:47:58', '5', '15:47:00', '2', 15020, 2541, '236', 'XVB'),
	(4, '2020-12-28 14:53:01', '2020-12-28 14:53:01', '8', '17:52:00', '1', 9000, 852, 'oumr', 'observation du 28');
/*!40000 ALTER TABLE `depart_sites` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. depart_site_colis
DROP TABLE IF EXISTS `depart_site_colis`;
CREATE TABLE IF NOT EXISTS `depart_site_colis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `totalColis` int(11) NOT NULL DEFAULT '0',
  `typeColisSecuripack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeColisSacjute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreColisSecuripack` int(11) DEFAULT NULL,
  `nombreColisSacjute` int(11) DEFAULT NULL,
  `numeroScelleSecuripack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroScelleSacjute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantAnnonceSecuripack` int(11) DEFAULT NULL,
  `montantAnnonceSacjute` int(11) DEFAULT NULL,
  `departSite` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `depart_site_colis_departsite_foreign` (`departSite`),
  CONSTRAINT `depart_site_colis_departsite_foreign` FOREIGN KEY (`departSite`) REFERENCES `depart_sites` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.depart_site_colis : ~0 rows (environ)
DELETE FROM `depart_site_colis`;
/*!40000 ALTER TABLE `depart_site_colis` DISABLE KEYS */;
/*!40000 ALTER TABLE `depart_site_colis` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. depart_tournees
DROP TABLE IF EXISTS `depart_tournees`;
CREATE TABLE IF NOT EXISTS `depart_tournees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `numeroTournee` int(11) NOT NULL,
  `date` date NOT NULL,
  `idVehicule` bigint(20) unsigned NOT NULL,
  `chauffeur` int(11) DEFAULT NULL,
  `agentDeGarde` int(11) DEFAULT NULL,
  `chefDeBord` int(11) DEFAULT NULL,
  `coutTournee` int(11) DEFAULT NULL,
  `kmDepart` int(11) DEFAULT NULL,
  `heureDepart` time DEFAULT NULL,
  `kmArrivee` int(11) DEFAULT NULL,
  `heureArrivee` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `depart_tournees_idvehicule_foreign` (`idVehicule`),
  CONSTRAINT `depart_tournees_idvehicule_foreign` FOREIGN KEY (`idVehicule`) REFERENCES `vehicules` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.depart_tournees : ~8 rows (environ)
DELETE FROM `depart_tournees`;
/*!40000 ALTER TABLE `depart_tournees` DISABLE KEYS */;
INSERT INTO `depart_tournees` (`id`, `created_at`, `updated_at`, `numeroTournee`, `date`, `idVehicule`, `chauffeur`, `agentDeGarde`, `chefDeBord`, `coutTournee`, `kmDepart`, `heureDepart`, `kmArrivee`, `heureArrivee`) VALUES
	(1, '2020-12-17 15:01:36', '2020-12-17 15:01:36', 171220201, '2020-12-11', 2, 10, 11, 9, 12000, 0, NULL, NULL, NULL),
	(2, '2020-12-17 15:25:57', '2020-12-17 15:25:57', 171220202, '2020-12-17', 1, 1, 11, 7, 11200, 0, NULL, NULL, NULL),
	(3, '2020-12-21 13:58:13', '2020-12-21 13:58:13', 211220203, '2020-12-10', 3, 10, 11, 9, 25500, 0, NULL, NULL, NULL),
	(4, '2020-12-21 14:38:42', '2020-12-21 14:38:42', 211220204, '2020-12-21', 4, 7, 11, 7, 19300, 0, NULL, NULL, NULL),
	(5, '2020-12-21 14:40:32', '2020-12-21 14:40:32', 211220205, '2020-12-21', 2, 10, 11, 10, 14200, 0, NULL, NULL, NULL),
	(6, '2020-12-21 14:52:45', '2020-12-21 14:52:45', 211220206, '2020-12-25', 2, 10, 11, 7, 4500, 0, NULL, NULL, NULL),
	(7, '2020-12-28 13:49:24', '2020-12-28 13:49:24', 281220207, '2020-12-28', 3, 2, 11, 10, 14700, 0, NULL, NULL, NULL),
	(8, '2020-12-28 13:53:29', '2020-12-28 13:53:29', 281220208, '2020-12-28', 3, 2, 11, 10, 23900, 0, NULL, NULL, NULL);
/*!40000 ALTER TABLE `depart_tournees` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.failed_jobs : ~0 rows (environ)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. heure_supps
DROP TABLE IF EXISTS `heure_supps`;
CREATE TABLE IF NOT EXISTS `heure_supps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `typeDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idPersonnel` bigint(20) unsigned NOT NULL,
  `heureArrivee` time DEFAULT NULL,
  `heureArrivee1` time DEFAULT NULL,
  `heureArrivee2` time DEFAULT NULL,
  `heureArrivee3` time DEFAULT NULL,
  `heureDepart` time DEFAULT NULL,
  `heureDepart1` time DEFAULT NULL,
  `heureDepart2` time DEFAULT NULL,
  `heureDepart3` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `heure_supps_idpersonnel_foreign` (`idPersonnel`),
  CONSTRAINT `heure_supps_idpersonnel_foreign` FOREIGN KEY (`idPersonnel`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.heure_supps : ~0 rows (environ)
DELETE FROM `heure_supps`;
/*!40000 ALTER TABLE `heure_supps` DISABLE KEYS */;
/*!40000 ALTER TABLE `heure_supps` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. informatique_fournisseurs
DROP TABLE IF EXISTS `informatique_fournisseurs`;
CREATE TABLE IF NOT EXISTS `informatique_fournisseurs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `libelleFournisseur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `specialite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `localisation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationalite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.informatique_fournisseurs : ~0 rows (environ)
DELETE FROM `informatique_fournisseurs`;
/*!40000 ALTER TABLE `informatique_fournisseurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `informatique_fournisseurs` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. informatique_materiels
DROP TABLE IF EXISTS `informatique_materiels`;
CREATE TABLE IF NOT EXISTS `informatique_materiels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantite` int(11) NOT NULL DEFAULT '0',
  `prixUnitaire` double DEFAULT NULL,
  `montant` double NOT NULL DEFAULT '0',
  `factureJointe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.informatique_materiels : ~0 rows (environ)
DELETE FROM `informatique_materiels`;
/*!40000 ALTER TABLE `informatique_materiels` DISABLE KEYS */;
INSERT INTO `informatique_materiels` (`id`, `created_at`, `updated_at`, `centre`, `centreRegional`, `service`, `date`, `reference`, `libelle`, `quantite`, `prixUnitaire`, `montant`, `factureJointe`) VALUES
	(1, '2021-07-09 08:28:10', '2021-07-09 08:28:10', 'Bouaké', 'Bouaké', 'transportr', '2021-07-09', '4545454', 'achat onduleur', 1, 70000, 70000, NULL);
/*!40000 ALTER TABLE `informatique_materiels` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. informatique_missions
DROP TABLE IF EXISTS `informatique_missions`;
CREATE TABLE IF NOT EXISTS `informatique_missions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreDeJours` int(11) DEFAULT NULL,
  `debut` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `objetMission` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interventionEffectuee` text COLLATE utf8_unicode_ci,
  `rapportMission` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.informatique_missions : ~0 rows (environ)
DELETE FROM `informatique_missions`;
/*!40000 ALTER TABLE `informatique_missions` DISABLE KEYS */;
/*!40000 ALTER TABLE `informatique_missions` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. informatique_operations
DROP TABLE IF EXISTS `informatique_operations`;
CREATE TABLE IF NOT EXISTS `informatique_operations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `materielDefectueux` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rapportMateriel` text COLLATE utf8_unicode_ci,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `operationEffectuee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.informatique_operations : ~0 rows (environ)
DELETE FROM `informatique_operations`;
/*!40000 ALTER TABLE `informatique_operations` DISABLE KEYS */;
/*!40000 ALTER TABLE `informatique_operations` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_chargement_cartes
DROP TABLE IF EXISTS `logistique_chargement_cartes`;
CREATE TABLE IF NOT EXISTS `logistique_chargement_cartes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `carte` bigint(20) unsigned NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `somme` double DEFAULT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logistique_chargement_cartes_carte_foreign` (`carte`),
  CONSTRAINT `logistique_chargement_cartes_carte_foreign` FOREIGN KEY (`carte`) REFERENCES `carburant_cartes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_chargement_cartes : ~0 rows (environ)
DELETE FROM `logistique_chargement_cartes`;
/*!40000 ALTER TABLE `logistique_chargement_cartes` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_chargement_cartes` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_entree_approvision
DROP TABLE IF EXISTS `logistique_entree_approvision`;
CREATE TABLE IF NOT EXISTS `logistique_entree_approvision` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `fournisseur` bigint(20) unsigned NOT NULL,
  `prixUnitaire` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logistique_entree_approvision_fournisseur_foreign` (`fournisseur`),
  CONSTRAINT `logistique_entree_approvision_fournisseur_foreign` FOREIGN KEY (`fournisseur`) REFERENCES `logistique_fournisseurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_entree_approvision : ~0 rows (environ)
DELETE FROM `logistique_entree_approvision`;
/*!40000 ALTER TABLE `logistique_entree_approvision` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_entree_approvision` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_entree_bordereaux
DROP TABLE IF EXISTS `logistique_entree_bordereaux`;
CREATE TABLE IF NOT EXISTS `logistique_entree_bordereaux` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `fournisseur` bigint(20) unsigned NOT NULL,
  `prixUnitaire` double DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logistique_entree_bordereaux_fournisseur_foreign` (`fournisseur`),
  CONSTRAINT `logistique_entree_bordereaux_fournisseur_foreign` FOREIGN KEY (`fournisseur`) REFERENCES `logistique_fournisseurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_entree_bordereaux : ~0 rows (environ)
DELETE FROM `logistique_entree_bordereaux`;
/*!40000 ALTER TABLE `logistique_entree_bordereaux` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_entree_bordereaux` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_entree_carnet_caisses
DROP TABLE IF EXISTS `logistique_entree_carnet_caisses`;
CREATE TABLE IF NOT EXISTS `logistique_entree_carnet_caisses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `fournisseur` bigint(20) unsigned NOT NULL,
  `prixUnitaire` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logistique_entree_carnet_caisses_fournisseur_foreign` (`fournisseur`),
  CONSTRAINT `logistique_entree_carnet_caisses_fournisseur_foreign` FOREIGN KEY (`fournisseur`) REFERENCES `logistique_fournisseurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_entree_carnet_caisses : ~0 rows (environ)
DELETE FROM `logistique_entree_carnet_caisses`;
/*!40000 ALTER TABLE `logistique_entree_carnet_caisses` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_entree_carnet_caisses` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_entree_commande
DROP TABLE IF EXISTS `logistique_entree_commande`;
CREATE TABLE IF NOT EXISTS `logistique_entree_commande` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `fournisseur` bigint(20) unsigned NOT NULL,
  `prixUnitaire` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logistique_entree_commande_fournisseur_foreign` (`fournisseur`),
  CONSTRAINT `logistique_entree_commande_fournisseur_foreign` FOREIGN KEY (`fournisseur`) REFERENCES `logistique_fournisseurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_entree_commande : ~0 rows (environ)
DELETE FROM `logistique_entree_commande`;
/*!40000 ALTER TABLE `logistique_entree_commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_entree_commande` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_entree_maintenance
DROP TABLE IF EXISTS `logistique_entree_maintenance`;
CREATE TABLE IF NOT EXISTS `logistique_entree_maintenance` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `fournisseur` bigint(20) unsigned NOT NULL,
  `prixUnitaire` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logistique_entree_maintenance_fournisseur_foreign` (`fournisseur`),
  CONSTRAINT `logistique_entree_maintenance_fournisseur_foreign` FOREIGN KEY (`fournisseur`) REFERENCES `logistique_fournisseurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_entree_maintenance : ~0 rows (environ)
DELETE FROM `logistique_entree_maintenance`;
/*!40000 ALTER TABLE `logistique_entree_maintenance` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_entree_maintenance` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_entree_securipack
DROP TABLE IF EXISTS `logistique_entree_securipack`;
CREATE TABLE IF NOT EXISTS `logistique_entree_securipack` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `fournisseur` bigint(20) unsigned NOT NULL,
  `prixUnitaire` double DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logistique_entree_securipack_fournisseur_foreign` (`fournisseur`),
  CONSTRAINT `logistique_entree_securipack_fournisseur_foreign` FOREIGN KEY (`fournisseur`) REFERENCES `logistique_fournisseurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_entree_securipack : ~0 rows (environ)
DELETE FROM `logistique_entree_securipack`;
/*!40000 ALTER TABLE `logistique_entree_securipack` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_entree_securipack` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_entree_stocks
DROP TABLE IF EXISTS `logistique_entree_stocks`;
CREATE TABLE IF NOT EXISTS `logistique_entree_stocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `produit` bigint(20) unsigned NOT NULL,
  `dateApprovisionnement` date DEFAULT NULL,
  `fournisseur` bigint(20) unsigned NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prixAchat` double NOT NULL DEFAULT '0',
  `observation` text COLLATE utf8_unicode_ci,
  `facture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logistique_entree_stocks_produit_foreign` (`produit`),
  KEY `logistique_entree_stocks_fournisseur_foreign` (`fournisseur`),
  CONSTRAINT `logistique_entree_stocks_fournisseur_foreign` FOREIGN KEY (`fournisseur`) REFERENCES `logistique_fournisseurs` (`id`),
  CONSTRAINT `logistique_entree_stocks_produit_foreign` FOREIGN KEY (`produit`) REFERENCES `logistique_produits` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_entree_stocks : ~0 rows (environ)
DELETE FROM `logistique_entree_stocks`;
/*!40000 ALTER TABLE `logistique_entree_stocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_entree_stocks` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_entree_ticket_visite
DROP TABLE IF EXISTS `logistique_entree_ticket_visite`;
CREATE TABLE IF NOT EXISTS `logistique_entree_ticket_visite` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `fournisseur` bigint(20) unsigned NOT NULL,
  `prixUnitaire` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logistique_entree_ticket_visite_fournisseur_foreign` (`fournisseur`),
  CONSTRAINT `logistique_entree_ticket_visite_fournisseur_foreign` FOREIGN KEY (`fournisseur`) REFERENCES `logistique_fournisseurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_entree_ticket_visite : ~0 rows (environ)
DELETE FROM `logistique_entree_ticket_visite`;
/*!40000 ALTER TABLE `logistique_entree_ticket_visite` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_entree_ticket_visite` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_fournisseurs
DROP TABLE IF EXISTS `logistique_fournisseurs`;
CREATE TABLE IF NOT EXISTS `logistique_fournisseurs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `societe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `civilite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `domaine` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delaiLivraison` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conditionPaiement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_fournisseurs : ~0 rows (environ)
DELETE FROM `logistique_fournisseurs`;
/*!40000 ALTER TABLE `logistique_fournisseurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_fournisseurs` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_produits
DROP TABLE IF EXISTS `logistique_produits`;
CREATE TABLE IF NOT EXISTS `logistique_produits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fournisseur` bigint(20) unsigned NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seuil` int(11) DEFAULT '0',
  `stockAlert` int(11) DEFAULT '0',
  `ves` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prix` double DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `logistique_produits_fournisseur_foreign` (`fournisseur`),
  CONSTRAINT `logistique_produits_fournisseur_foreign` FOREIGN KEY (`fournisseur`) REFERENCES `logistique_fournisseurs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_produits : ~0 rows (environ)
DELETE FROM `logistique_produits`;
/*!40000 ALTER TABLE `logistique_produits` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_produits` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_sortie_approvision
DROP TABLE IF EXISTS `logistique_sortie_approvision`;
CREATE TABLE IF NOT EXISTS `logistique_sortie_approvision` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prixUnitaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_sortie_approvision : ~0 rows (environ)
DELETE FROM `logistique_sortie_approvision`;
/*!40000 ALTER TABLE `logistique_sortie_approvision` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_sortie_approvision` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_sortie_bordereaux
DROP TABLE IF EXISTS `logistique_sortie_bordereaux`;
CREATE TABLE IF NOT EXISTS `logistique_sortie_bordereaux` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prix` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_sortie_bordereaux : ~0 rows (environ)
DELETE FROM `logistique_sortie_bordereaux`;
/*!40000 ALTER TABLE `logistique_sortie_bordereaux` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_sortie_bordereaux` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_sortie_carnet_caisses
DROP TABLE IF EXISTS `logistique_sortie_carnet_caisses`;
CREATE TABLE IF NOT EXISTS `logistique_sortie_carnet_caisses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prixUnitaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_sortie_carnet_caisses : ~0 rows (environ)
DELETE FROM `logistique_sortie_carnet_caisses`;
/*!40000 ALTER TABLE `logistique_sortie_carnet_caisses` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_sortie_carnet_caisses` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_sortie_commande
DROP TABLE IF EXISTS `logistique_sortie_commande`;
CREATE TABLE IF NOT EXISTS `logistique_sortie_commande` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prixUnitaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_sortie_commande : ~0 rows (environ)
DELETE FROM `logistique_sortie_commande`;
/*!40000 ALTER TABLE `logistique_sortie_commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_sortie_commande` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_sortie_maintenance
DROP TABLE IF EXISTS `logistique_sortie_maintenance`;
CREATE TABLE IF NOT EXISTS `logistique_sortie_maintenance` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prixUnitaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_sortie_maintenance : ~0 rows (environ)
DELETE FROM `logistique_sortie_maintenance`;
/*!40000 ALTER TABLE `logistique_sortie_maintenance` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_sortie_maintenance` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_sortie_securipack
DROP TABLE IF EXISTS `logistique_sortie_securipack`;
CREATE TABLE IF NOT EXISTS `logistique_sortie_securipack` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prixUnitaire` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_sortie_securipack : ~0 rows (environ)
DELETE FROM `logistique_sortie_securipack`;
/*!40000 ALTER TABLE `logistique_sortie_securipack` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_sortie_securipack` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_sortie_stocks
DROP TABLE IF EXISTS `logistique_sortie_stocks`;
CREATE TABLE IF NOT EXISTS `logistique_sortie_stocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `produit` bigint(20) unsigned NOT NULL,
  `quantite` int(11) DEFAULT '0',
  `dateSortie` date DEFAULT NULL,
  `motif` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateSaisie` date DEFAULT NULL,
  `observation` text COLLATE utf8_unicode_ci,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logistique_sortie_stocks_produit_foreign` (`produit`),
  CONSTRAINT `logistique_sortie_stocks_produit_foreign` FOREIGN KEY (`produit`) REFERENCES `logistique_produits` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_sortie_stocks : ~0 rows (environ)
DELETE FROM `logistique_sortie_stocks`;
/*!40000 ALTER TABLE `logistique_sortie_stocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_sortie_stocks` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. logistique_sortie_ticket_visite
DROP TABLE IF EXISTS `logistique_sortie_ticket_visite`;
CREATE TABLE IF NOT EXISTS `logistique_sortie_ticket_visite` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debutSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finSerie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prixUnitaire` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.logistique_sortie_ticket_visite : ~0 rows (environ)
DELETE FROM `logistique_sortie_ticket_visite`;
/*!40000 ALTER TABLE `logistique_sortie_ticket_visite` DISABLE KEYS */;
/*!40000 ALTER TABLE `logistique_sortie_ticket_visite` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.migrations : ~92 rows (environ)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_11_000000_create_roles_table', 1),
	(2, '2014_10_12_000000_create_users_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2014_10_12_140255_create_accesses_table', 1),
	(5, '2019_08_19_000000_create_failed_jobs_table', 1),
	(6, '2020_09_09_131643_create_securite_services_table', 1),
	(7, '2020_09_09_231455_create_personnels_table', 1),
	(8, '2020_09_10_053002_create_vehicules_table', 1),
	(9, '2020_09_10_061905_create_depart_tournees_table', 1),
	(10, '2020_09_10_125733_create_site_depart_tournees_table', 1),
	(11, '2020_09_10_152656_create_arrivee_tournees_table', 1),
	(12, '2020_09_10_153134_create_site_arrivee_tournees_table', 1),
	(13, '2020_09_10_164756_create_vidange_generales_table', 1),
	(14, '2020_09_11_125712_create_centres_table', 1),
	(15, '2020_09_11_125927_create_centre_regionals_table', 1),
	(16, '2020_09_11_154634_create_commercial_clients_table', 1),
	(17, '2020_09_11_154635_create_commercial_sites_table', 1),
	(18, '2020_09_11_220908_create_vidange_huile_ponts_table', 1),
	(19, '2020_09_11_223129_create_vidange_courroies_table', 1),
	(20, '2020_09_12_091647_create_vidange_vignettes_table', 1),
	(21, '2020_09_12_095153_create_vidange_transports_table', 1),
	(22, '2020_09_12_100204_create_vidange_assurances_table', 1),
	(23, '2020_09_12_101908_create_vidange_patentes_table', 1),
	(24, '2020_09_12_102420_create_vidange_visites_table', 1),
	(25, '2020_09_12_103451_create_vidange_stationnements_table', 1),
	(26, '2020_09_12_114610_create_carburant_tickets_table', 1),
	(27, '2020_09_12_123948_create_carburant_cartes_table', 1),
	(28, '2020_09_12_133134_create_carburant_comptants_table', 1),
	(29, '2020_09_12_141359_create_carburant_previsions_table', 1),
	(30, '2020_09_12_151040_create_conteneurs_table', 1),
	(31, '2020_09_13_012836_create_convoyeurs_table', 1),
	(32, '2020_09_13_043456_create_heure_supps_table', 1),
	(33, '2020_09_13_121455_create_securite_materiels_table', 1),
	(34, '2020_09_14_055201_create_securite_materiel_beneficiaires_table', 1),
	(35, '2020_09_14_055353_create_securite_materiel_remettants_table', 1),
	(36, '2020_09_14_142805_create_depart_centres_table', 1),
	(37, '2020_09_14_163732_create_arrivee_sites_table', 1),
	(38, '2020_09_14_175752_create_depart_sites_table', 1),
	(39, '2020_09_15_142147_create_personnel_conges_table', 1),
	(40, '2020_09_15_142939_create_personnel_sanctions_table', 1),
	(41, '2020_09_16_171046_create_depart_site_colis_table', 1),
	(42, '2020_09_17_160958_create_arrivee_centres_table', 1),
	(43, '2020_09_17_174740_create_tournee_centres_table', 1),
	(44, '2020_09_21_112242_create_caisse_services_table', 1),
	(45, '2020_09_21_112811_create_caisse_service_operatrices_table', 1),
	(46, '2020_09_21_121127_create_caisse_ctvs_table', 1),
	(47, '2020_09_22_235907_create_caisse_billetages_table', 1),
	(48, '2020_09_23_051501_create_caisse_entree_colis_table', 1),
	(49, '2020_09_23_065149_create_caisse_entree_colis_items_table', 1),
	(50, '2020_09_23_092433_create_caisse_sortie_colis_table', 1),
	(51, '2020_09_23_092622_create_caisse_sortie_colis_items_table', 1),
	(52, '2020_09_23_113721_create_caisse_video_surveillances_table', 1),
	(53, '2020_09_23_214659_create_logistique_fournisseurs_table', 1),
	(54, '2020_09_24_141455_create_logistique_produits_table', 1),
	(55, '2020_09_24_155551_create_logistique_entree_stocks_table', 1),
	(56, '2020_09_24_201025_create_logistique_sortie_stocks_table', 1),
	(57, '2020_09_29_143302_create_logistique_entree_bordereaux', 1),
	(58, '2020_09_29_143403_create_logistique_sortie_bordereaux', 1),
	(59, '2020_09_29_143731_create_logistique_entree_securipack', 1),
	(60, '2020_09_29_143944_create_logistique_sortie_securipack', 1),
	(61, '2020_09_29_162654_create_logistique_entree_carnet_caisses', 1),
	(62, '2020_09_29_162942_create_logistique_sortie_carnet_caisses', 1),
	(63, '2020_09_29_163414_create_logistique_entree_maintenance', 1),
	(64, '2020_09_29_163503_create_logistique_sortie_maintenance', 1),
	(65, '2020_09_29_163654_create_logistique_entree_approvision', 1),
	(66, '2020_09_29_163757_create_logistique_sortie_approvision', 1),
	(67, '2020_09_29_164018_create_logistique_entree_commande', 1),
	(68, '2020_09_29_164117_create_logistique_sortie_commande', 1),
	(69, '2020_09_29_171940_create_logistique_entree_ticket_visite', 1),
	(70, '2020_09_29_172131_create_logistique_sortie_ticket_visite', 1),
	(71, '2020_09_29_181622_create_regulation_services', 1),
	(72, '2020_09_29_193301_create_regulation_bordereau', 1),
	(73, '2020_09_29_203957_create_regulation_securipacks', 1),
	(74, '2020_09_29_204707_create_regulation_scelles', 1),
	(75, '2020_09_29_211655_create_regulation_confirmation_clients', 1),
	(76, '2020_09_29_212321_create_regulation_facturations', 1),
	(77, '2020_09_29_212848_create_comptabilite_factures', 1),
	(78, '2020_09_29_214127_create_comptabilite_reglement_fatures', 1),
	(79, '2020_09_29_214438_create_comptabilite_entree_caisses', 1),
	(80, '2020_09_29_215723_create_comptabilite_sortie_caisses', 1),
	(81, '2020_09_29_215839_create_comptabilite_degradations', 1),
	(82, '2020_09_29_223207_create_virgilometries', 1),
	(84, '2020_09_29_224330_create_achat_produits', 1),
	(85, '2020_09_29_225034_create_ssb', 1),
	(86, '2020_09_30_075933_create_ssb_commercials', 1),
	(87, '2020_09_30_084603_create_informatique_materiels', 1),
	(88, '2020_09_30_085008_create_informatique_missions', 1),
	(89, '2020_09_30_085515_create_informatique_operations', 1),
	(90, '2020_09_30_090846_create_informatique_fournisseurs', 1),
	(91, '2020_10_01_134606_create_logistique_chargement_cartes_table', 1),
	(92, '2020_10_04_213510_create_ssb_sites_table', 1),
	(96, '2020_09_29_224011_create_achat_fournisseurs', 2),
	(97, '2020_12_29_134410_create_achat_demandes_table', 3),
	(98, '2020_12_29_155921_create_achat_fournisseur_consultes_table', 3),
	(99, '2020_12_30_160820_create_achat_fournisseur_c_a_s_table', 3),
	(100, '2021_01_06_151021_create_achat_bon_comandes_table', 4),
	(101, '2021_01_06_153814_create_achat_bon_comande_items_table', 4),
	(102, '2021_08_27_171115_create_personnel_gestion_missions_table', 5),
	(103, '2021_08_27_171658_create_personnel_gestion_absences_table', 5),
	(104, '2021_08_27_172111_create_personnel_gestion_contrats_table', 5),
	(105, '2021_08_27_172304_create_personnel_gestion_explications_table', 5),
	(106, '2021_08_27_172615_create_personnel_gestion_affectations_table', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.password_resets : ~0 rows (environ)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. personnels
DROP TABLE IF EXISTS `personnels`;
CREATE TABLE IF NOT EXISTS `personnels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `securite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transport` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caisse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regulation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `siegeService` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `siegeDirection` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `siegeDirectionGenerale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomPrenoms` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateEntreeSociete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateSortie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeSortie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fonction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `natureContrat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroCNPS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `situationMatrimoniale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreEnfants` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresseGeographique` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactPersonnel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomPere` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomMere` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomConjoint` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personneContacter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.personnels : ~71 rows (environ)
DELETE FROM `personnels`;
/*!40000 ALTER TABLE `personnels` DISABLE KEYS */;
INSERT INTO `personnels` (`id`, `created_at`, `updated_at`, `matricule`, `centre`, `centreRegional`, `securite`, `transport`, `caisse`, `regulation`, `siegeService`, `siegeDirection`, `siegeDirectionGenerale`, `nomPrenoms`, `dateNaissance`, `dateEntreeSociete`, `dateSortie`, `typeSortie`, `fonction`, `service`, `natureContrat`, `numeroCNPS`, `situationMatrimoniale`, `nombreEnfants`, `photo`, `adresseGeographique`, `contactPersonnel`, `nomPere`, `nomMere`, `nomConjoint`, `personneContacter`) VALUES
	(13, '2021-08-04 16:46:02', '2021-08-04 16:46:02', '0220', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'LOGISTIQUE', NULL, NULL, 'EHOUSSOU KOUADIO MARTIN', '1976-12-29', '2021-04-06', NULL, NULL, 'CHARGE DES ACHATS ET LOGISTIQUE', 'LOGISTIQUE', 'CDD', '176011205252', 'MARIE', '3', 'U2NhbiBwaG90byBFSE9VU1NPVS5wZGY=', NULL, '07-67-89-38-20', 'KOUAME EHOUSSOU', 'ATTA N\'DRI', 'DILAYE KACOU BOMO MARIE CLAIRE', '01-02-50-79-67'),
	(14, '2021-08-04 16:52:36', '2021-08-04 16:52:36', '0186', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'RESSOURCES HUMAINES', NULL, NULL, 'TRAORE FATOUMATA', '1997-05-18', '2020-12-01', NULL, NULL, 'ASSISTANTE RH', 'RESSOURCES HUMAINES', 'CDD', '297012036434', 'MARIE', '1', 'U2NhbiBwaG90byBUUkFPUkUucGRm', NULL, '07-89-09-68-09', 'TRAORE ZAKARIA', 'SALIMATA KONAN', 'TOURE ABDUL AZIZ', '07-09-57-81-39'),
	(18, '2021-08-05 08:39:39', '2021-08-05 08:39:39', '0005', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'RESSOURCES HUMAINES', NULL, NULL, 'OYA HANGUI ROGER EMMANUEL BENJAMIN', '1971-12-29', '2017-08-01', NULL, NULL, 'RESPONSABLE RESSOURCES HUMAINES', 'RESSOURCES HUMAINES', 'CDI', '171010611296', 'CELIBATAIRE', '2', '', NULL, '01-01-27-03-20', 'OYA JEROME', 'HANGUI CHI BEDA CHRISTINE', 'AKISSI SERAPHINE', '0101129516'),
	(19, '2021-08-05 09:24:01', '2021-08-05 09:24:01', '19', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, 'DIRECTION FINANCIERE ET COMPTABLE', NULL, 'ADAE KOUASSI ADOMAN OLIVIER', '1993-09-15', '2018-05-02', NULL, NULL, 'ASSISTANT COMPTABLE', 'COMPTABLE', 'CDI', NULL, 'CELIBATAIRE', '0', 'U2NhbiBwaG90byBBZGFlIG9saXZpZXIucGRm', NULL, '07-09-50-12-71', 'KOUAKOU ADAE', 'KOBENAN AFFOUA DATTE', NULL, NULL),
	(20, '2021-08-05 09:56:03', '2021-08-05 09:56:03', '20', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, 'DIRECTION FINANCIERE ET COMPTABLE', NULL, 'SIOMON AMMOUSO ELOGE', '1992-01-19', '2018-05-02', NULL, NULL, 'CHEF COMPTABLE', 'COMPTABLE', 'CDI', '192011755526', 'MARIE', '0', '', NULL, '07-48-75-48-10', 'SIOMON HONORE', 'DOUE GUELAYEAMIN MICHELINE', NULL, NULL),
	(21, '2021-08-05 10:00:21', '2021-08-05 10:00:21', '21', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SOUMAHORO LASSANA', '1973-07-06', '2017-08-01', NULL, NULL, 'DIRECTEUR GENERAL DELEGUE', 'DIRECTION GENERALE', 'CDI', '173019704968', 'MARIE', '3', 'U2NhbiBwaG90byBMYXNzYW5hIFNPVU1BSE9STy5wZGY=', NULL, '07-07-02-95-75', 'SOUMAHORO ALLASANE', 'KANTE DJENEBA', NULL, NULL),
	(22, '2021-08-05 10:08:47', '2021-08-05 10:08:47', '22', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, 'DIRECTION FINANCIERE ET COMPTABLE', NULL, 'MABEA OUME LISETTE', '1989-01-09', '2019-09-02', NULL, NULL, 'ASSISTANTE COMPTABLE', 'COMPTABLE', 'CDI', '289011421808', 'CELIBATAIRE', '1', '', NULL, '07-07-87-71-74', 'OUME DANIEL', 'OULAI SUZANNE', NULL, NULL),
	(23, '2021-08-05 10:14:17', '2021-08-05 10:14:17', '23', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'MONETIQUE', NULL, NULL, 'TOULO GNONSIGAN RICHMOND', '1992-11-26', '2019-03-01', NULL, NULL, 'TECHNICIEN MONETIQUE', 'MONETIQUE', 'CDI', '202100001452', 'CELIBATAIRE', '0', '', NULL, '07-47-01-53-54', 'TOULO FELIX', 'TOUZAHOIN KANEHAN MARCELLINE', NULL, NULL),
	(24, '2021-08-05 10:22:55', '2021-08-05 10:22:55', '24', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, 'DIRECTION FINANCIERE ET COMPTABLE', NULL, 'N\'GUESSAN AMOIN SANDRINE ESTHER', '1990-09-16', '2017-11-01', NULL, NULL, 'CAISSIERE COMPTABLE', 'COMPTABLE', 'CDI', '290011567844', 'CELIBATAIRE', '2', '', NULL, '07-49-25-76-45', 'N\'GUESSAN N\'DRI', 'KOUAME AMENAN', NULL, NULL),
	(25, '2021-08-05 10:28:01', '2021-08-05 10:28:01', '25', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'LOGISTIQUE', NULL, NULL, 'KPOMBO AMOIN ALIDA', '1991-04-26', '2019-07-01', NULL, NULL, 'ASSISTANTE LOGISTIQUE', 'LOGISTIQUE', 'CDI', '291012060854', 'CELIBATAIRE', '1', '', NULL, '05-55-12-15-72', 'KPOMBO KANGAH JULIEN', 'N\'DOUA GNAWA AKISSI', NULL, NULL),
	(26, '2021-08-05 10:38:47', '2021-08-05 10:38:47', '26', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, 'DIRECTION COMMERCIALE ET MARKETING', NULL, 'BOLOU ELIANE', '1978-07-15', '2017-08-01', NULL, NULL, 'RESPONSABLE COMMERCIALE ET MARKETING', 'COMMERCIAL', 'CDI', '278010608303', 'MARIE', '3', '', NULL, NULL, 'BOLOU DIGBEU RENE', 'BLABO TAHONON', 'MONOBOLOU CESAR', NULL),
	(27, '2021-08-05 10:45:21', '2021-08-05 10:45:21', '27', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'SSB', NULL, NULL, 'SOUROU JOANCE ROMEO', '1986-03-28', '2020-01-06', NULL, NULL, 'RESPONSABLE DSSB', 'MONETIQUE', 'CDD', '186010951848', 'MARIE', '2', '', NULL, '07-78-13-13-74', 'SOUROU EMILE AHOUANNOU', 'BOTO AKRE BRIGITTE ROSE VICTOIRE', 'BOSSON ELONORE CHIMENE', NULL),
	(28, '2021-08-05 12:27:13', '2021-08-05 12:27:13', '28', 'Abidjan', 'Choisir centre régional', NULL, 'Chauffeur', NULL, NULL, NULL, NULL, NULL, 'DOUMBIA KARAMOKO', '1978-07-24', '2019-08-26', NULL, NULL, 'CONVOYEUR CHAUFFEUR', 'TRANSPORT', 'CDI', '178011524429', 'CELIBATAIRE', '3', '', NULL, '05-05-54-82-47', 'DOUMBIA BRAHIMA', 'KOFFI AHOU', NULL, NULL),
	(29, '2021-08-05 13:16:13', '2021-08-05 13:16:13', '29', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EPONON ERIC', '1981-03-19', '2021-04-03', NULL, NULL, 'AGENT PCC', 'SECURITE', 'CDD', '181010859617', 'MARIE', '2', '', NULL, '01-01-90-54-37', 'EPONON ETTIEN', 'AKOUA QUENAN SOLANGE', NULL, NULL),
	(30, '2021-08-05 13:46:28', '2021-08-05 13:46:28', '30', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'DIE LOU GOUNAN ADELE', '1980-10-25', '2020-02-17', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', '280012036338', 'MARIE', '5', 'U2NhbiBwaG90byBESUUgTE9VIEdPVU5BTi5wZGY=', NULL, '07-08-88-70-23', 'IRIE BI DIE', 'GORE LOU GORE', NULL, NULL),
	(31, '2021-08-05 15:44:28', '2021-08-05 15:44:28', '31', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'MONETIQUE', NULL, NULL, 'KOUADIO KOFFI RODOLPHE', '1983-01-08', '2019-05-13', NULL, NULL, 'TECHNICIEN MONETIQUE', 'MONETIQUE', 'CDI', '183011150636', 'MARIE', '0', 'U2NhbiBwaG90byBLT1VBRElPIFJPRE9MUEhFLnBkZg==', NULL, '07-08-33-10-15', 'KOUADIO BROU', 'KRA KRA ESTHER', NULL, NULL),
	(32, '2021-08-05 16:15:06', '2021-08-05 16:15:06', '32', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'KAKOU BROU NADEGE', '1980-11-10', '2019-07-01', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', '280010902459', 'CELIBATAIRE', '0', '', NULL, '07-07-35-00-92', 'ANOH KAKOU', 'KOUAME KISSI', NULL, NULL),
	(33, '2021-08-05 16:23:53', '2021-08-05 16:23:53', '33', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Trieuse', NULL, NULL, NULL, NULL, 'MAHAN JOSIANE NOELLE', '1979-07-03', '2019-07-01', NULL, NULL, 'TRIEUSE', 'CAISSE', 'CDI', '279012057726', 'MARIE', '2', 'U2NhbiBwaG90byBNQUhBTiBKT1NJQU5FLnBkZg==', NULL, '07-87-03-12-94', 'MAHAN PAUL', 'KOSSA HELENE', NULL, NULL),
	(34, '2021-08-05 17:12:15', '2021-08-05 17:12:15', '34', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'KOUADIO ABENAN EVELYNE', '1988-01-26', '2021-04-01', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', '286011377871', 'CELIBATAIRE', '0', '', NULL, '07-12-89-69', 'KOUADIO LEON', 'AMANAMAN KOKO', NULL, NULL),
	(35, '2021-08-06 11:11:58', '2021-08-06 11:11:58', '35', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'YOH SAGOUHI RACHELLE', '1984-10-16', '2021-04-01', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', '284011568481', 'MARIE', '4', '', NULL, '07-77-24-70-81', 'YOH BOUAGNON', 'TAPE KOIDJO HORTENSE', NULL, NULL),
	(36, '2021-08-06 11:14:57', '2021-08-06 11:14:57', '36', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'BEDA JOSIANE ALIDA', '1983-07-17', '2021-04-01', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', '202100063211', 'MARIE', '2', '', NULL, '07-49-50-39-46', 'BEDA KOUADIO', 'ABOUA AFFOUE MARCELLINE', NULL, NULL),
	(37, '2021-08-06 11:18:20', '2021-08-06 11:18:20', '37', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'MOCKEY ANZEBA ANTOINETTE', '1984-11-07', '2020-11-19', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', '284011273902', 'MARIE', '3', '', NULL, '07-07-84-99-78', 'ASSOUAN MOCKEY ROBERT', 'JULIANA PREMPEH', NULL, NULL),
	(38, '2021-08-06 11:21:04', '2021-08-06 11:21:04', '38', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'KONAN MARYLINE NINA', '1971-10-09', '2021-04-01', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', NULL, 'CELIBATAIRE', '2', '', NULL, '07-07-91-20-45', 'KOUADIO KONAN ANTOINE', 'KOUAKOU AMOIN', NULL, NULL),
	(39, '2021-08-06 11:31:26', '2021-08-06 11:31:26', '39', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'ESMEL BEDI MELEM VANESSA', '1991-05-22', '2021-04-01', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', '202100065450', 'CELIBATAIRE', '1', '', NULL, '07-88-66-59', 'ESMEL BEDI JACQUES', 'MEKOUN GERMAINE', NULL, NULL),
	(40, '2021-08-06 11:35:10', '2021-08-06 11:35:10', '40', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'GARAGE', NULL, NULL, 'NIKIEME DESIRE', '1973-02-11', '2019-09-01', NULL, NULL, 'CHARGE GARAGE', 'GARAGE', 'CDD', '173021964706', 'MARIE', NULL, '', NULL, NULL, 'NIKIEMA KOUYOURE', 'ILBOUDO KOUDPOKO', NULL, NULL),
	(41, '2021-08-06 12:06:16', '2021-08-06 12:06:16', '41', 'Abidjan', 'Choisir centre régional', 'Responsable de sécurité', NULL, NULL, NULL, NULL, NULL, NULL, 'COULIBALY ABOU', '1964-01-01', NULL, NULL, NULL, 'RESPONSABLE SECURITE', 'SECURITE', 'PRESTATAIRE', NULL, 'MARIE', NULL, '', NULL, '07-67-78-52-75', 'MORY COULIBALY', 'OUAGA BAO', NULL, NULL),
	(42, '2021-08-06 12:19:20', '2021-08-06 12:19:20', '42', 'Abidjan', 'Choisir centre régional', NULL, 'Chef de bord', NULL, NULL, NULL, NULL, NULL, 'ADDI TANON KONE GILDAS', '1976-11-19', '2018-06-01', NULL, NULL, 'CONVOYEUR CHEF DE BORD', 'TRANSPORT', 'CDI', NULL, 'CELIBATAIRE', '5', '', NULL, '07-08-11-64-56', 'BILSON ADDI JACQUES', 'KOUASSI AYA JULIETTE', NULL, NULL),
	(43, '2021-08-06 12:23:23', '2021-08-06 12:23:23', '43', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'NATHALIE BAILLY', '1970-08-20', '2017-11-07', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDI', NULL, 'CELIBATAIRE', '1', '', NULL, '07-48-33-70-98', 'BAILLY TAGRO MATHIEU', 'DIMAN AUGUSTINE', NULL, NULL),
	(44, '2021-08-06 12:26:13', '2021-08-06 12:26:13', '44', 'Abidjan', 'Choisir centre régional', NULL, 'Chef de bord', NULL, NULL, NULL, NULL, NULL, 'ALBERT OLOUBI', '1971-04-08', '2018-06-01', NULL, NULL, 'CONVOYEUR CHEF DE BORD', 'TRANSPORT', 'CDI', NULL, 'CELIBATAIRE', '2', '', NULL, '01-01-16-82-52', 'OLOUBI ADJEBADE.P', 'TOURE OSSAMA ADEL', NULL, NULL),
	(45, '2021-08-06 12:29:16', '2021-08-06 12:29:16', '45', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'YAO LOUKOU YOBOUET OKA EDITH', NULL, '2021-04-01', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', NULL, 'MARIE', '1', '', NULL, '05-66-80-61-04', 'YAO YAO', 'KOUASSI AKISSI ROSE', NULL, NULL),
	(46, '2021-08-06 12:37:33', '2021-08-06 12:37:33', '46', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ASSI OYA ARCHANGE APPOLINAIRE', '1980-12-30', '2019-08-26', NULL, NULL, 'AGENT PCS', 'SECURITE', 'CDI', '202100001416', 'MARIE', '3', '', NULL, '07-48-47-75-64', 'ASSI CELESTIN', 'AKE CHI MAMBO', NULL, NULL),
	(47, '2021-08-06 12:44:53', '2021-08-06 12:44:53', '47', 'Abidjan', 'Choisir centre régional', NULL, 'Chauffeur', NULL, NULL, NULL, NULL, NULL, 'KONAN KOUASSI DESIRE', '1975-06-23', '2020-09-01', NULL, NULL, 'CONVOYEUR CHAUFFEUR', 'TRANSPORT', 'CDD', NULL, 'CELIBATAIRE', '0', '', NULL, '07-08-62-21-28', 'KONAN KAN FIRMIN', 'KONO AKISSI', NULL, NULL),
	(48, '2021-08-09 09:29:14', '2021-08-09 09:29:14', '48', 'Abidjan', 'Choisir centre régional', NULL, 'Chauffeur', NULL, NULL, NULL, NULL, NULL, 'ADJEHI YAO BLAISE', '1973-04-13', '2018-05-01', NULL, NULL, 'CONVOYEUR CHAUFFEUR', 'TRANSPORT', 'CDI', NULL, 'CELIBATAIRE', '3', '', NULL, '07-07-72-59-50', 'ADJEHI YAPI ANTOINE', 'AKA ADJOUA', NULL, NULL),
	(49, '2021-08-09 13:43:16', '2021-08-09 13:43:16', '49', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'TAUTHUI AKISSI MARIE DES', '1995-02-06', '2019-01-21', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDI', '295012057573', 'CELIBATAIRE', NULL, '', NULL, '07-79-92-97-23', 'TAUTHUI MARIUS', 'ESSOH LATTE MELEME MATHILDE', NULL, NULL),
	(50, '2021-08-09 13:57:40', '2021-08-09 13:57:40', '50', 'Abidjan', 'Choisir centre régional', NULL, 'Garde', NULL, NULL, NULL, NULL, NULL, 'N\'GUESSAN ANOUMAN KOUADIO NICAISE', '1986-10-11', '2019-02-20', NULL, NULL, 'CONVOYEUR GARDE', 'TRANSPORT', 'CDI', '180010605724', 'CELIBATAIRE', '4', '', NULL, '07-58-87-79-30', 'N\'GUESSAN YAO MICHEL', 'KOFFI AHOU', NULL, NULL),
	(51, '2021-08-09 14:05:03', '2021-08-09 14:05:03', '51', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'KOFFI LOU YOUNA CYNTHIA', '1986-01-26', '2019-02-01', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDI', '286011805477', 'CELIBATAIRE', '1', '', NULL, '01-02-34-03-66', 'KOFFI KOFFI BERTIN', 'KOFFI LOU GBOGLOU JULIETTE', NULL, NULL),
	(52, '2021-08-09 14:13:23', '2021-08-09 14:13:23', '52', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Trieuse', NULL, NULL, NULL, NULL, 'ANZARA ASSOH SOLANGE', '1978-11-27', '2019-07-01', NULL, NULL, 'TRIEUSE', 'CAISSE', 'CDI', '278010227589', 'CELIBATAIRE', '1', '', NULL, '01-02-26-16-52', 'YOBOUA ANZARA', 'AKA ETCHE', NULL, NULL),
	(53, '2021-08-09 14:19:57', '2021-08-09 14:19:57', '53', 'Abidjan', 'Choisir centre régional', NULL, 'Chauffeur', NULL, NULL, NULL, NULL, NULL, 'KOUASSI KOFFI FERDINAND', '1972-11-04', '2018-06-01', NULL, NULL, 'CONVOYEUR CHAUFFEUR', 'TRANSPORT', 'CDI', '172011444548', 'CELIBATAIRE', '2', '', NULL, '05-06-03-58-77', 'KONAN KOUASSI', 'KANAN AHOU', NULL, NULL),
	(54, '2021-08-09 14:26:23', '2021-08-09 14:26:23', '54', 'Abidjan', 'Choisir centre régional', 'Chargé de sécurité', NULL, NULL, NULL, NULL, NULL, NULL, 'ASSOUMOU KOFFI BIENVENUE', '1972-06-19', '2018-06-01', NULL, NULL, 'CHARGE SECURITE', NULL, 'CDI', NULL, 'CELIBATAIRE', '4', '', NULL, '07-08-08-00-49', 'KOFFI ASSOUMOU GERMAIN', 'ADJOUA YOBOUET FRANCOISE', NULL, NULL),
	(55, '2021-08-09 14:31:12', '2021-08-09 14:31:12', '55', 'Bouaké', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'LINGUE YAO AYA GISELLE', '1981-05-05', '2020-02-17', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', '281011139507', 'CELIBATAIRE', '2', '', NULL, '07-47-02-10-08', 'LINGUE YAO', 'YAO ADJOUA EMILIENNE', NULL, NULL),
	(56, '2021-08-09 14:37:18', '2021-08-09 14:37:18', '56', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'MONETIQUE', NULL, NULL, 'N\'GUESSAN KOUASSI JULES', '1990-12-08', '2020-05-02', NULL, NULL, 'TECHNICIEN MONETIQUE', 'MONETIQUE', 'CDD', '190012035291', 'CELIBATAIRE', NULL, '', NULL, '07-59-97-43-24', 'KOFFI N\'GUESSAN JEAN', 'DJE AKISSI AMELIE', NULL, NULL),
	(57, '2021-08-09 14:42:27', '2021-08-09 14:42:27', '57', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'GOFOHI CHRISTELLE BENEDICTE ANNICK', '1988-12-09', '2020-02-17', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', '288011652975', 'CELIBATAIRE', NULL, '', NULL, '0708575807', 'GOFOHI PATRICE', 'GOFOYOU GEOGETTE', NULL, NULL),
	(58, '2021-08-09 14:47:28', '2021-08-09 14:47:28', '58', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Trieuse', NULL, NULL, NULL, NULL, 'ADJA APIA NATHALIE', '1976-07-22', '2018-09-10', NULL, NULL, 'TRIEUSE', 'CAISSE', 'CDI', NULL, 'CELIBATAIRE', '02', '', NULL, '07-08-83-62-78', 'ADJA ADJA LEON', 'AKOUE CHADON JEANNE-D\'ARC', NULL, NULL),
	(59, '2021-08-09 14:54:59', '2021-08-09 14:54:59', '59', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'KOUYO DIDIER', '1974-01-01', '2017-10-05', NULL, NULL, 'CHARGE TRANSPORT', 'TRANSPORT', 'CDI', NULL, 'MARIE', '4', '', NULL, '07-07-94-95-73', 'KOUYO BAHI RAPHAEL', 'DEGBOU ZIA PAULINE', NULL, NULL),
	(60, '2021-08-09 15:07:09', '2021-08-09 15:07:09', '60', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'AGOH STELLE NADEGE', '1982-10-10', '2021-04-01', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', '202100043396', 'CELIBATAIRE', NULL, '', NULL, '07-08-13-81-81', 'AGOH FRANCIS', 'FLORENTINE N\'GUESSAN', NULL, NULL),
	(61, '2021-08-09 15:19:05', '2021-08-09 15:19:05', '61', 'Abidjan', 'Choisir centre régional', NULL, 'Chauffeur', NULL, NULL, NULL, NULL, NULL, 'KONAN ALLOUFOU DENIS', '1974-12-29', '2020-10-01', NULL, NULL, 'CONVOYEUR CHAUFFEUR', 'CHAUFFEUR', 'CDD', '174019614381', 'MARIE', '7', '', NULL, '07-08-02-14-39', NULL, NULL, NULL, NULL),
	(62, '2021-08-09 15:45:08', '2021-08-09 15:45:08', '62', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'KOFFI AHOU MONIQUE', '1976-06-17', '2020-02-17', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', '276010129606', 'CELIBATAIRE', '1', '', NULL, '07-48-81-10-14', 'KONAN KOFFI', 'KOFFI AMENAN', NULL, NULL),
	(63, '2021-08-09 16:12:04', '2021-08-09 16:12:04', '63', 'Daloa', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'AHING KOFFI ADJOUA INNOCENTE', '1978-07-25', '2019-02-18', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDI', '202100001425', 'CELIBATAIRE', '2', '', NULL, '07-07-29-60-74', 'KOFFI YAO', 'KONAN AKISSI BERNADETTE', NULL, NULL),
	(64, '2021-08-09 16:17:54', '2021-08-09 16:17:54', '64', 'Daloa', 'Choisir centre régional', NULL, 'Chef de bord', NULL, NULL, NULL, NULL, NULL, 'ABE DJOMAN EMMANUEL', '1978-12-23', '2018-06-01', NULL, NULL, 'CONVOYEUR CHEF DE BORD', 'TRANSPORT', 'CDI', NULL, 'CELIBATAIRE', NULL, '', NULL, '07-08-79-38-88', 'DJOMAN ABE JACQUES', 'AHOUADJA YOUA EUGENIE', NULL, NULL),
	(65, '2021-08-09 16:25:23', '2021-08-09 16:25:23', '65', 'Daloa', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TANOH YAO ROGER', '1988-12-18', '2019-08-26', NULL, NULL, 'AGENT PCS', 'SECURITE', 'CDI', NULL, 'CELIBATAIRE', '1', '', NULL, '05-06-07-74-62', NULL, NULL, NULL, NULL),
	(66, '2021-08-09 16:31:51', '2021-08-09 16:31:51', '66', 'Daloa', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'KOHI ESSANE THERESE YOLANDE', '1980-04-13', '2018-11-01', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDI', NULL, 'MARIE', '1', '', NULL, '07-07-38-16-23', 'KOHI DJEDJANGNE JOSEPH', 'AKA ESSIOU PAULETTE', NULL, NULL),
	(67, '2021-08-09 16:35:55', '2021-08-09 16:35:55', '67', 'Daloa', 'Choisir centre régional', NULL, 'Convoyeur', NULL, NULL, NULL, NULL, NULL, 'FANNY DAOUDA', '1975-01-01', '2018-01-16', NULL, NULL, 'CONVOYEUR CHAUFFEUR', 'TRANSPORT', 'CDI', NULL, 'CELIBATAIRE', '5', '', NULL, '05-05-58-47-87', 'FANNY FANTILE', 'KONATE KARTIA', NULL, NULL),
	(68, '2021-08-09 16:45:44', '2021-08-09 16:45:44', '68', 'Choisir centre', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PENAN DJAO SERGES', '1986-07-13', '2018-06-01', NULL, NULL, 'AGENT PCS', 'SECURITE', 'CDI', '186012067203', 'CELIBATAIRE', '3', '', NULL, '07-09-87-82-21', 'PENAN ROBERT', 'BLE JEANNETTE', NULL, NULL),
	(69, '2021-08-10 10:01:04', '2021-08-10 10:01:04', '69', 'Daloa', 'Choisir centre régional', NULL, 'Convoyeur', NULL, NULL, NULL, NULL, NULL, 'YAOHOURI SERGE ALBAN', '1974-06-22', '2019-06-24', NULL, NULL, 'CONVOYEUR CHAUFFEUR', 'TRANSPORT', 'CDD', '174011213039', 'CELIBATAIRE', '1', '', NULL, '07-48-94-49-68', 'YAOHIROU PAUL', 'BOBIA BOUDEROU BERTINE', NULL, NULL),
	(70, '2021-08-12 11:23:47', '2021-08-12 11:23:47', '70', 'Daloa', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DJESSO FIRMIN FAUSTIN ERIC', '1982-11-22', '2018-06-01', NULL, NULL, 'CHEF DE CENTRE', NULL, 'CDI', NULL, NULL, NULL, '', NULL, '07-07-92-20-06', 'DJESSO GNOUFLE VICTOR', 'SENEKO OUOMBLEGNON', NULL, NULL),
	(71, '2021-08-12 11:34:28', '2021-08-12 11:34:28', '71', 'Daloa', 'Choisir centre régional', NULL, 'Garde', NULL, NULL, NULL, NULL, NULL, 'GOUAMENE ZATO JULES', '1976-01-01', '2019-02-13', NULL, NULL, 'CONVOYEUR GARDE', 'TRANSPORT', 'CDI', NULL, 'CELIBATAIRE', '4', '', NULL, '01-03-73-55-69', 'GOUAMENE BERNARD', 'GBAGBE OTTITRO', NULL, NULL),
	(72, '2021-08-12 11:39:36', '2021-08-12 11:39:36', '72', 'Daloa', 'Choisir centre régional', NULL, 'Garde', NULL, NULL, NULL, NULL, NULL, 'OUATTARA YIRANI', '1972-06-15', '2018-12-15', NULL, NULL, 'CONVOYEUR GARDE', 'TRANSPORT', 'CDI', NULL, 'CELIBATAIRE', '3', '', NULL, '01-02-24-18-09', 'OUATTARA BABAPLE', 'PONATIENLIN OUATTARA', NULL, NULL),
	(73, '2021-08-12 11:51:17', '2021-08-12 11:51:17', '73', 'Daloa', 'Choisir centre régional', NULL, 'Chauffeur', NULL, NULL, NULL, NULL, NULL, 'KOUADIO KOFFI KABEYO', '1977-10-20', '2018-12-22', NULL, NULL, 'CONVOYEUR CHAUFFEUR', 'TRANSPORT', 'CDI', NULL, NULL, NULL, '', NULL, '07-08-80-40-31', 'KONAN KOUADIO', 'BOASSA KRA', NULL, NULL),
	(74, '2021-08-12 12:06:42', '2021-08-12 12:06:42', '74', 'Abidjan', 'Choisir centre régional', NULL, 'Garde', NULL, NULL, NULL, NULL, NULL, 'ABASSAON DOLLO JEAN PACOME', '1983-03-25', '2020-01-08', NULL, NULL, 'CONVOYEUR GARDE', 'TRANSPORT', 'CDD', NULL, 'CELIBATAIRE', '3', '', NULL, '05-06-75-19-72', 'AYENON ABASSON JACQUES', 'DOLLO APIE', NULL, NULL),
	(75, '2021-08-12 12:08:50', '2021-08-12 12:08:50', '75', 'Abidjan', 'Choisir centre régional', NULL, 'Garde', NULL, NULL, NULL, NULL, NULL, 'DIARRA SOUMAILA', '61981-02-20', '2021-04-01', NULL, NULL, 'CONVOYEUR GARDE', 'TRANSPORT', 'CDD', NULL, 'CELIBATAIRE', '2', '', NULL, '05-04-70-78-28', 'DIARRA KOLO', 'ODJOUA MARTINE', NULL, NULL),
	(76, '2021-08-12 12:20:23', '2021-08-12 12:20:23', '76', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'KONE KADJO STANISLAS', '1986-12-15', '2019-08-26', NULL, NULL, 'AGENT PCS', 'SECURITE', 'CDD', NULL, 'CELIBATAIRE', '3', '', NULL, '01-42-00-73-00', NULL, NULL, NULL, NULL),
	(77, '2021-08-12 12:24:12', '2021-08-12 12:24:12', '77', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'KONAN KOUAKOU FRANCK ARMAND', '1979-07-05', '2018-06-01', NULL, NULL, 'AGENT PCS', 'SECURITE', 'CDI', NULL, 'CELIBATAIRE', '1', '', NULL, '07-09-82-79-85', NULL, NULL, NULL, NULL),
	(78, '2021-08-12 12:31:06', '2021-08-12 12:31:06', '78', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'AYEKOUE PAULE CARINE', '1989-08-05', '2018-04-09', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDI', NULL, 'CELIBATAIRE', NULL, '', NULL, '07-08-64-90-64', NULL, NULL, NULL, NULL),
	(79, '2021-08-12 12:34:29', '2021-08-12 12:34:29', '79', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, 'Chargée de la régulation', NULL, NULL, NULL, 'KAKPE LEHIHON LAURENCE', '1977-12-20', '2018-02-01', NULL, NULL, 'CHARGE DE LA REGULATION', 'REGULATION', 'CDI', NULL, 'MARIE', '4', '', NULL, '07-07-73-23-33', 'DIAGBRO KAKPE REMY', 'DJEDJE GOUHIRI JEANNETTE', NULL, NULL),
	(80, '2021-08-13 09:00:40', '2021-08-13 09:00:40', '80', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Trieuse', NULL, NULL, NULL, NULL, 'KOFFI CHI CHO GLWADYS', '1982-12-28', '2019-09-02', NULL, NULL, 'TRIEUSE', 'CAISSE', 'CDD', '282012058571', 'MARIE', NULL, '', NULL, '07-09-51-32-90', 'SONAN KOFFI VINCENT', 'ALLECHI ABOUEU BERNADETTE', NULL, NULL),
	(81, '2021-08-13 09:04:54', '2021-08-13 09:04:54', '81', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'INFORMATIQUE', NULL, NULL, 'BEDI CLAUDE JUSTIN', '1980-02-12', '2018-12-05', NULL, NULL, 'CHARGE INFORMATIQUE', 'INFORMATIQUE', 'CDI', NULL, 'CELIBATAIRE', '3', '', NULL, '07-89-78-77-66', 'GBOAWILI BEDI REMI', 'LALION OBOU CHRISTINE', NULL, NULL),
	(82, '2021-08-13 09:09:34', '2021-08-13 09:09:34', '82', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'GOLI AMENAN JULIETTE', '1978-01-04', '2020-02-17', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', '278012041505', 'MARIE', '5', '', NULL, '07-08-48-9275', 'KONAN GOLI', 'KOUADIO AKISSI', NULL, NULL),
	(83, '2021-08-13 09:13:01', '2021-08-13 09:13:01', '83', 'Abidjan', 'Choisir centre régional', NULL, 'Chef de bord', NULL, NULL, NULL, NULL, NULL, 'COULIBALY OUSMANE', '1967-06-12', '2019-09-01', NULL, NULL, 'CONVOYEUR CHEF DE BORD', 'TRANSPORT', 'CDD', NULL, 'CELIBATAIRE', '5', '', NULL, '05-05-87-62-45', 'MORY COULIBALY', 'MINATA DIARRA', NULL, NULL),
	(84, '2021-08-13 09:17:21', '2021-08-13 09:17:21', '84', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'KACOU KOFFI LAURENT', '1973-07-28', '2017-08-01', NULL, NULL, 'CHAUFFEUR', NULL, 'CDI', NULL, 'CELIBATAIRE', '3', '', NULL, '07-47-34-81-31', 'KOFFI EBY', 'BOUADOU ALLOU JACQUELINE', NULL, NULL),
	(85, '2021-08-13 09:21:02', '2021-08-13 09:21:02', '85', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'MONETIQUE', NULL, NULL, 'TANOH FRAM DENIS', '1986-05-21', '2018-04-03', NULL, NULL, 'CHARGE GABS', 'MONETIQUE', 'CDI', '202100001690', 'CELIBATAIRE', NULL, '', NULL, '07-07-80-43-08', 'TANOH FRAM', 'BROU AMA THERESE', NULL, NULL),
	(86, '2021-08-13 09:26:56', '2021-08-13 09:26:56', '86', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'KAPET MARIE CHANTALE', '1977-06-13', '2020-11-19', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', '277010121995', 'CELIBATAIRE', '2', '', NULL, '07-09-98-92-63', 'KAPET TAKOUO', 'HONZELE CATHERINE', NULL, NULL),
	(88, '2021-08-13 09:34:51', '2021-08-13 09:34:51', '87', 'Abidjan', 'Choisir centre régional', NULL, 'Garde', NULL, NULL, NULL, NULL, NULL, 'AHOUCHI NIANGUI PAUL', '1981-01-12', '2020-01-08', NULL, NULL, 'CONVOYEUR GARDE', 'TRANSPORT', 'CDD', '181011677511', 'CELIBATAIRE', '1', '', NULL, '07-47-35-82-30', 'OGUIE AHOUCHI', 'DEKI KACHI EMILIE', NULL, NULL),
	(89, '2021-08-13 09:38:03', '2021-08-13 09:38:03', '89', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'MONETIQUE', NULL, NULL, 'AWO RUBEN TCHIMON', NULL, '2020-07-17', NULL, NULL, 'TECHNICIEN MONETIQUE', 'MONETIQUE', 'CDD', NULL, 'CELIBATAIRE', '0', '', NULL, '05-56-58-40-39', NULL, NULL, NULL, NULL),
	(90, '2021-08-13 09:45:26', '2021-08-13 09:45:26', '90', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Chargée de caisse', NULL, NULL, NULL, NULL, 'N\'GOUAN ANO MARIE ODILE', '1973-01-12', '2019-03-01', NULL, NULL, 'CHARGE CAISSE', 'CAISSE', 'CDI', '273010419849', 'CELIBATAIRE', '2', '', NULL, '07-08-14-44-04', 'N\'GOUAN SANHOU', 'ETTIEGNE ASSOUAMA', NULL, NULL),
	(91, '2021-08-13 09:51:58', '2021-08-13 09:51:58', '91', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'MIEZAN BENIE VANESSA FLORENCE', '1989-06-13', '2018-06-01', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDI', '202100001687', 'CELIBATAIRE', '0', '', NULL, '07-08-88-13-33', 'MIEZAN MICHEL', 'KADJOMOU VADJO VALENTINE', NULL, NULL),
	(92, '2021-08-13 09:56:41', '2021-08-13 09:56:41', '92', 'Abidjan', 'Choisir centre régional', NULL, 'Chauffeur', NULL, NULL, NULL, NULL, NULL, 'AMARA OUATTARA', '1975-08-25', '2019-09-01', NULL, NULL, 'CONVOYEUR CHAUFFEUR', 'TRANSPORT', 'CDD', NULL, 'MARIE', '3', '', NULL, '05-45-89-04-05', 'OUELEDOU OUATTARA', 'KOUA AYA', NULL, NULL),
	(93, '2021-08-13 10:02:33', '2021-08-13 10:02:33', '93', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SOUMAHORO DON CHARLES', NULL, '2018-02-14', NULL, NULL, 'CHEF DE CENTRE', NULL, 'CDI', '173010305250', 'MARIE', '4', '', NULL, '07-07-81-94-91', 'SOUMAHORO TIEMOKO', 'KONE ATTA MARGUERITE', NULL, NULL),
	(94, '2021-08-13 10:13:41', '2021-08-13 10:13:41', '94', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'KOUASSI MONEY ELODIE FLORA', '1981-12-20', '2018-07-01', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDI', NULL, 'MARIE', '2', '', NULL, '07-77-77-76-64', 'KOUASSI BROU', 'CHONOU ESSIN', NULL, NULL),
	(95, '2021-08-13 10:19:03', '2021-08-13 10:19:03', '95', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'MONETIQUE', NULL, NULL, 'KOUASSI JANDRY LEOPOLD', '1972-11-02', '2017-10-05', NULL, NULL, 'TECHNICIEN MONETIQUE', 'MONETIQUE', 'CDI', '172011510220', 'MARIE', '2', '', NULL, '01-41-07-79-43', 'KOUADIO KOUASSI', 'OURA AFFOUE', NULL, NULL),
	(96, '2021-08-13 10:22:58', '2021-08-13 10:22:58', '96', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Trieuse', NULL, NULL, NULL, NULL, 'OUATTARA MAFIRI NATACHA', '1988-08-09', '2019-11-01', NULL, NULL, 'TRIEUSE', 'CAISSE', 'CDD', NULL, 'CELIBATAIRE', NULL, '', NULL, '07-77-13-08-44', 'MAMADOU OUATTARA', 'N\'GUESSAN AHOU THERESE', NULL, NULL),
	(97, '2021-08-13 11:17:33', '2021-08-13 11:17:33', '97', 'Daloa', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'GARAGE', NULL, NULL, 'COULIBALY SOULEYMANE', '1991-10-26', '2019-11-01', NULL, NULL, 'ASSISTANT GARAGE', 'GARAGE', 'CDD', NULL, 'CELIBATAIRE', '0', '', NULL, '05-55-04-99-08', 'COULIBALY ZANA', 'COULIBALY MINATA', NULL, NULL),
	(98, '2021-08-13 11:22:18', '2021-08-13 11:22:18', '98', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'KOUASSI KOUADIO CLOVIS', '1988-12-20', '2021-04-04', NULL, NULL, 'AGENT PCC', 'SECURITE', 'CDD', '188012027303', 'CELIBATAIRE', '0', '', NULL, '07-47-12-19-32', 'ANDO KOUAME', 'OKA AFFOUE', NULL, NULL),
	(99, '2021-08-13 11:24:41', '2021-08-13 11:24:41', '99', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Caissière', NULL, NULL, NULL, NULL, 'KOUAME AHOU ESTELLE', '1995-12-27', '2021-04-01', NULL, NULL, 'CAISSIERE', 'CAISSE', 'CDD', NULL, 'CELIBATAIRE', '0', '', NULL, '07-58-27-52-24', 'YAO KOUAME', 'KOUAME AMOIN RUTH', NULL, NULL),
	(100, '2021-08-13 11:30:04', '2021-08-13 11:30:04', '100', 'Abidjan', 'Choisir centre régional', NULL, NULL, 'Trieuse', NULL, NULL, NULL, NULL, 'KEHO TIEPORO OPPORTUNE', '1977-09-29', '2019-07-01', NULL, NULL, 'TRIEUSE', 'CAISSE', 'CDI', '277012057752', 'CELIBATAIRE', '2', '', NULL, '07-07-77-03-34', 'NANOUROU KEHO', 'KONE MASSIBERY', NULL, NULL),
	(101, '2021-08-13 11:33:23', '2021-08-13 11:33:23', '101', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'MONETIQUE', NULL, NULL, 'DOUEU GONZREU ARMAND', '1993-06-05', '2021-05-01', NULL, NULL, 'TECHNICIEN MONETIQUE', 'MONETIQUE', 'CDD', '202100063831', 'CELIBATAIRE', '0', '', NULL, '07-08-19-34-00', 'KPAN PIERRE', 'YAN YVONNE', NULL, NULL),
	(102, '2021-08-13 11:37:08', '2021-08-13 11:37:08', '102', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'MONETIQUE', NULL, NULL, 'KOUADIO AMBEH GISLAIN', '1989-08-01', '2021-04-01', NULL, NULL, 'TECHNICIEN MONETIQUE', 'MONETIQUE', 'CDD', NULL, 'CELIBATAIRE', '1', '', NULL, '07-08-91-00-46', NULL, NULL, NULL, NULL),
	(103, '2021-08-13 12:35:30', '2021-08-13 12:35:30', '103', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'MONETIQUE', NULL, NULL, 'SERY KOUDOU ARNAUD WILFRIED', '1991-07-23', '2020-07-17', NULL, NULL, 'TECHNICIEN MONETIQUE', 'MONETIQUE', 'CDD', '191012034039', 'CELIBATAIRE', '0', '', NULL, '07-09-34-92-94', NULL, NULL, NULL, NULL),
	(104, '2021-08-13 12:38:16', '2021-08-13 12:38:16', '104', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'MONETIQUE', NULL, NULL, 'N\'GUESSAN KOUASSI PASCAL', '1995-10-10', '2021-04-01', NULL, NULL, 'TECHNICIEN MONETIQUE', 'MONETIQUE', 'CDD', NULL, 'CELIBATAIRE', NULL, '', NULL, '07-57-50-28-66', 'N\'GUESSAN KONAN PASCAL', 'KAMENAN ABLAN', NULL, NULL),
	(105, '2021-08-13 13:09:57', '2021-08-13 13:09:57', '105', 'Abidjan', 'Choisir centre régional', NULL, 'Chauffeur', NULL, NULL, NULL, NULL, NULL, 'DAGO RABE JEAN PHILIPPE', '1993-01-07', '2021-04-01', NULL, NULL, 'CONVOYEUR CHAUFFEUR', 'TRANSPORT', 'CDD', NULL, 'CELIBATAIRE', '1', '', NULL, '07-79-90-28-16', 'DAGO BEUGRE HENRI', 'MOMO AFFI', NULL, NULL),
	(106, '2021-08-13 13:15:41', '2021-08-13 13:15:41', '106', 'Abidjan', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GNAKAMENE PATRICK HERVE', '1987-08-29', '2021-01-01', NULL, NULL, 'AGENT PCC', 'SECURITE', 'CDD', NULL, 'CELIBATAIRE', NULL, '', NULL, '07-59-49-51-50', 'GNAKAMENE GBAKA EMMANUEL', 'GBALLOU SAHONE BESSEHON SOLANGE', NULL, NULL),
	(107, '2021-08-16 16:07:29', '2021-08-16 16:07:29', '107', 'Bouaké', 'Choisir centre régional', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TOKASSEU DEUKEU MARCEL', '1990-12-04', '2018-08-01', NULL, NULL, 'AGENT PCS', NULL, 'CDI', NULL, 'CELIBATAIRE', '1', '', NULL, '07-57-88-66-04', 'KPEA TOKASSEU PIERRE', 'MASSOUO MEUYO LOUISE', NULL, NULL),
	(108, '2021-08-16 16:17:46', '2021-08-16 16:17:46', '108', 'Bouaké', 'Choisir centre régional', NULL, NULL, NULL, NULL, 'MONETIQUE', NULL, NULL, 'YAO MOHARY PAULIN', '1971-12-20', '2018-04-03', NULL, NULL, 'CHARGE DES GABS', 'MONETIQUE', 'CDI', '171010633395', 'CELIBATAIRE', '2', '', NULL, '05-05-05-56-98', 'YAO KA', 'BOHUE AKISSI EUGENIE', NULL, NULL),
	(109, '2021-08-16 16:27:28', '2021-08-16 16:27:28', '109', 'Bouaké', 'Choisir centre régional', NULL, 'Convoyeur', NULL, NULL, NULL, NULL, NULL, 'KEITA MOUSSA', '1975-04-24', '2017-12-04', NULL, NULL, 'CHARGE TRANSPORT', 'TRANSPORT', 'CDI', '175010202600', 'CELIBATAIRE', '2', '', NULL, '07-07-94-57-47', 'KEITA IBRAHIMA', 'ASSETOU SY', NULL, NULL);
/*!40000 ALTER TABLE `personnels` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. personnel_conges
DROP TABLE IF EXISTS `personnel_conges`;
CREATE TABLE IF NOT EXISTS `personnel_conges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `personnel` bigint(20) unsigned NOT NULL,
  `dateDernierDepartConge` date DEFAULT NULL,
  `dateProchainDepartConge` date DEFAULT NULL,
  `nombreJourPris` int(11) DEFAULT NULL,
  `nombreJourRestant` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_conges_personnel_foreign` (`personnel`),
  CONSTRAINT `personnel_conges_personnel_foreign` FOREIGN KEY (`personnel`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.personnel_conges : ~0 rows (environ)
DELETE FROM `personnel_conges`;
/*!40000 ALTER TABLE `personnel_conges` DISABLE KEYS */;
/*!40000 ALTER TABLE `personnel_conges` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. personnel_gestion_absences
DROP TABLE IF EXISTS `personnel_gestion_absences`;
CREATE TABLE IF NOT EXISTS `personnel_gestion_absences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `debut_absence` date DEFAULT NULL,
  `fin_absence` date DEFAULT NULL,
  `nombre_jours` int(11) NOT NULL DEFAULT '0',
  `motif` text COLLATE utf8_unicode_ci,
  `frais` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personnel` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_gestion_absences_personnel_foreign` (`personnel`),
  CONSTRAINT `personnel_gestion_absences_personnel_foreign` FOREIGN KEY (`personnel`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.personnel_gestion_absences : ~0 rows (environ)
DELETE FROM `personnel_gestion_absences`;
/*!40000 ALTER TABLE `personnel_gestion_absences` DISABLE KEYS */;
/*!40000 ALTER TABLE `personnel_gestion_absences` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. personnel_gestion_affectations
DROP TABLE IF EXISTS `personnel_gestion_affectations`;
CREATE TABLE IF NOT EXISTS `personnel_gestion_affectations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_affectation` date DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motif` text COLLATE utf8_unicode_ci,
  `personnel` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_gestion_affectations_personnel_foreign` (`personnel`),
  CONSTRAINT `personnel_gestion_affectations_personnel_foreign` FOREIGN KEY (`personnel`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.personnel_gestion_affectations : ~0 rows (environ)
DELETE FROM `personnel_gestion_affectations`;
/*!40000 ALTER TABLE `personnel_gestion_affectations` DISABLE KEYS */;
/*!40000 ALTER TABLE `personnel_gestion_affectations` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. personnel_gestion_contrats
DROP TABLE IF EXISTS `personnel_gestion_contrats`;
CREATE TABLE IF NOT EXISTS `personnel_gestion_contrats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type_contrat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `debut_contrat` date DEFAULT NULL,
  `fin_contrat` date DEFAULT NULL,
  `nombre_jours` int(11) NOT NULL DEFAULT '0',
  `fonction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salaire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personnel` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_gestion_contrats_personnel_foreign` (`personnel`),
  CONSTRAINT `personnel_gestion_contrats_personnel_foreign` FOREIGN KEY (`personnel`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.personnel_gestion_contrats : ~0 rows (environ)
DELETE FROM `personnel_gestion_contrats`;
/*!40000 ALTER TABLE `personnel_gestion_contrats` DISABLE KEYS */;
/*!40000 ALTER TABLE `personnel_gestion_contrats` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. personnel_gestion_explications
DROP TABLE IF EXISTS `personnel_gestion_explications`;
CREATE TABLE IF NOT EXISTS `personnel_gestion_explications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_demande` date DEFAULT NULL,
  `motif` text COLLATE utf8_unicode_ci,
  `sanctions` text COLLATE utf8_unicode_ci,
  `personnel` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_gestion_explications_personnel_foreign` (`personnel`),
  CONSTRAINT `personnel_gestion_explications_personnel_foreign` FOREIGN KEY (`personnel`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.personnel_gestion_explications : ~0 rows (environ)
DELETE FROM `personnel_gestion_explications`;
/*!40000 ALTER TABLE `personnel_gestion_explications` DISABLE KEYS */;
/*!40000 ALTER TABLE `personnel_gestion_explications` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. personnel_gestion_missions
DROP TABLE IF EXISTS `personnel_gestion_missions`;
CREATE TABLE IF NOT EXISTS `personnel_gestion_missions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `debut_mission` date DEFAULT NULL,
  `fin_mission` date DEFAULT NULL,
  `nombre_jours` int(11) NOT NULL DEFAULT '0',
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motif` text COLLATE utf8_unicode_ci,
  `frais` double DEFAULT NULL,
  `personnel` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_gestion_missions_personnel_foreign` (`personnel`),
  CONSTRAINT `personnel_gestion_missions_personnel_foreign` FOREIGN KEY (`personnel`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.personnel_gestion_missions : ~0 rows (environ)
DELETE FROM `personnel_gestion_missions`;
/*!40000 ALTER TABLE `personnel_gestion_missions` DISABLE KEYS */;
/*!40000 ALTER TABLE `personnel_gestion_missions` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. personnel_sanctions
DROP TABLE IF EXISTS `personnel_sanctions`;
CREATE TABLE IF NOT EXISTS `personnel_sanctions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `personnel` bigint(20) unsigned NOT NULL,
  `licenciement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `miseAPied` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avertissement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_sanctions_personnel_foreign` (`personnel`),
  CONSTRAINT `personnel_sanctions_personnel_foreign` FOREIGN KEY (`personnel`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.personnel_sanctions : ~0 rows (environ)
DELETE FROM `personnel_sanctions`;
/*!40000 ALTER TABLE `personnel_sanctions` DISABLE KEYS */;
/*!40000 ALTER TABLE `personnel_sanctions` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. regulation_bordereau
DROP TABLE IF EXISTS `regulation_bordereau`;
CREATE TABLE IF NOT EXISTS `regulation_bordereau` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `heure` time DEFAULT NULL,
  `stockInitial` int(11) DEFAULT NULL,
  `numeroDebut` int(11) DEFAULT NULL,
  `numeroFin` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `stockTotal` double DEFAULT NULL,
  `seuilAlerte1` int(11) DEFAULT NULL,
  `seuilAlerte2` int(11) DEFAULT NULL,
  `seuilAlerte3` int(11) DEFAULT NULL,
  `dateAffection` date DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeAffectation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsable` bigint(20) unsigned NOT NULL,
  `numeroDebutAffection` int(11) DEFAULT NULL,
  `numeroFinAffection` int(11) DEFAULT NULL,
  `quantiteAffectee` int(11) DEFAULT NULL,
  `stockActuel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regulation_bordereau_responsable_foreign` (`responsable`),
  CONSTRAINT `regulation_bordereau_responsable_foreign` FOREIGN KEY (`responsable`) REFERENCES `personnels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.regulation_bordereau : ~0 rows (environ)
DELETE FROM `regulation_bordereau`;
/*!40000 ALTER TABLE `regulation_bordereau` DISABLE KEYS */;
/*!40000 ALTER TABLE `regulation_bordereau` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. regulation_confirmation_clients
DROP TABLE IF EXISTS `regulation_confirmation_clients`;
CREATE TABLE IF NOT EXISTS `regulation_confirmation_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bordereau` int(11) DEFAULT NULL,
  `destination` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `scelle` int(11) DEFAULT NULL,
  `expediteur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client` bigint(20) unsigned NOT NULL,
  `destinataire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateReception` date DEFAULT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regulation_confirmation_clients_client_foreign` (`client`),
  CONSTRAINT `regulation_confirmation_clients_client_foreign` FOREIGN KEY (`client`) REFERENCES `commercial_clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.regulation_confirmation_clients : ~0 rows (environ)
DELETE FROM `regulation_confirmation_clients`;
/*!40000 ALTER TABLE `regulation_confirmation_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `regulation_confirmation_clients` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. regulation_facturations
DROP TABLE IF EXISTS `regulation_facturations`;
CREATE TABLE IF NOT EXISTS `regulation_facturations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `typeFacturation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroDebut` int(11) DEFAULT NULL,
  `numeroFin` int(11) DEFAULT NULL,
  `site` bigint(20) unsigned NOT NULL,
  `client` bigint(20) unsigned NOT NULL,
  `prixUnitaire` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prixTotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regulation_facturations_site_foreign` (`site`),
  KEY `regulation_facturations_client_foreign` (`client`),
  CONSTRAINT `regulation_facturations_client_foreign` FOREIGN KEY (`client`) REFERENCES `commercial_clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `regulation_facturations_site_foreign` FOREIGN KEY (`site`) REFERENCES `commercial_sites` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.regulation_facturations : ~0 rows (environ)
DELETE FROM `regulation_facturations`;
/*!40000 ALTER TABLE `regulation_facturations` DISABLE KEYS */;
/*!40000 ALTER TABLE `regulation_facturations` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. regulation_scelles
DROP TABLE IF EXISTS `regulation_scelles`;
CREATE TABLE IF NOT EXISTS `regulation_scelles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `numeroDebut` int(11) DEFAULT NULL,
  `numeroFin` int(11) DEFAULT NULL,
  `site` bigint(20) unsigned NOT NULL,
  `client` bigint(20) unsigned NOT NULL,
  `prixUnitaire` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prixTotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regulation_scelles_site_foreign` (`site`),
  KEY `regulation_scelles_client_foreign` (`client`),
  CONSTRAINT `regulation_scelles_client_foreign` FOREIGN KEY (`client`) REFERENCES `commercial_clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `regulation_scelles_site_foreign` FOREIGN KEY (`site`) REFERENCES `commercial_sites` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.regulation_scelles : ~0 rows (environ)
DELETE FROM `regulation_scelles`;
/*!40000 ALTER TABLE `regulation_scelles` DISABLE KEYS */;
/*!40000 ALTER TABLE `regulation_scelles` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. regulation_securipacks
DROP TABLE IF EXISTS `regulation_securipacks`;
CREATE TABLE IF NOT EXISTS `regulation_securipacks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `typeSecuripack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroDebut` int(11) DEFAULT NULL,
  `numeroFin` int(11) DEFAULT NULL,
  `site` bigint(20) unsigned NOT NULL,
  `client` bigint(20) unsigned NOT NULL,
  `prixUnitaire` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prixTotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regulation_securipacks_site_foreign` (`site`),
  KEY `regulation_securipacks_client_foreign` (`client`),
  CONSTRAINT `regulation_securipacks_client_foreign` FOREIGN KEY (`client`) REFERENCES `commercial_clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `regulation_securipacks_site_foreign` FOREIGN KEY (`site`) REFERENCES `commercial_sites` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.regulation_securipacks : ~0 rows (environ)
DELETE FROM `regulation_securipacks`;
/*!40000 ALTER TABLE `regulation_securipacks` DISABLE KEYS */;
/*!40000 ALTER TABLE `regulation_securipacks` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. regulation_services
DROP TABLE IF EXISTS `regulation_services`;
CREATE TABLE IF NOT EXISTS `regulation_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chargeeRegulation` bigint(20) unsigned NOT NULL,
  `chargeeRegulationHPS` time DEFAULT NULL,
  `chargeeRegulationHFS` time DEFAULT NULL,
  `chargeeRegulationAdjointe` bigint(20) unsigned NOT NULL,
  `chargeeRegulationAdjointeHPS` time DEFAULT NULL,
  `chargeeRegulationAdjointeHFS` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regulation_services_chargeeregulation_foreign` (`chargeeRegulation`),
  KEY `regulation_services_chargeeregulationadjointe_foreign` (`chargeeRegulationAdjointe`),
  CONSTRAINT `regulation_services_chargeeregulation_foreign` FOREIGN KEY (`chargeeRegulation`) REFERENCES `personnels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `regulation_services_chargeeregulationadjointe_foreign` FOREIGN KEY (`chargeeRegulationAdjointe`) REFERENCES `personnels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.regulation_services : ~0 rows (environ)
DELETE FROM `regulation_services`;
/*!40000 ALTER TABLE `regulation_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `regulation_services` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.roles : ~13 rows (environ)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'Administrateur', '2020-10-12 14:57:23', '2020-10-12 14:57:23'),
	(2, 'Comptabilite', '2020-10-12 15:04:45', '2020-10-12 15:04:45'),
	(3, 'Sécurité', '2020-10-12 15:04:58', '2020-10-12 15:04:58'),
	(4, 'Caisse centrale', '2020-10-12 15:05:28', '2020-10-12 15:05:28'),
	(5, 'transport', '2020-10-12 15:05:42', '2020-10-12 15:05:42'),
	(6, 'Régulation', '2020-10-12 15:05:56', '2020-10-12 15:05:56'),
	(7, 'Commercial', '2020-10-12 15:07:08', '2020-10-12 15:07:08'),
	(8, 'Virgil', '2020-10-12 19:13:36', '2020-10-12 19:13:36'),
	(9, 'Logistique', '2020-10-12 19:13:48', '2020-10-12 19:13:48'),
	(10, 'RH', '2020-10-12 19:13:58', '2020-10-12 19:13:58'),
	(11, 'informatique', '2020-10-12 19:14:07', '2020-10-12 19:14:07'),
	(12, 'Achat', '2020-10-12 19:15:08', '2020-10-12 19:15:08'),
	(13, 'SSB', '2020-10-12 19:15:21', '2020-10-12 19:15:21');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. securite_materiels
DROP TABLE IF EXISTS `securite_materiels`;
CREATE TABLE IF NOT EXISTS `securite_materiels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `cbNom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cbPrenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cbFonction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cbMatricule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ccNom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ccPrenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ccFonction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ccMatricule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cgNom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cgPrenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cgFonction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cgMatricule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehiculeVB` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehiculeVL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noTournee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operateurRadio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operateurRadioNom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operateurRadioPrenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operateurRadioFonction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operateurRadioMatricule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operateurRadioHeurePrise` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operateurRadioHeureFin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.securite_materiels : ~0 rows (environ)
DELETE FROM `securite_materiels`;
/*!40000 ALTER TABLE `securite_materiels` DISABLE KEYS */;
/*!40000 ALTER TABLE `securite_materiels` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. securite_materiel_beneficiaires
DROP TABLE IF EXISTS `securite_materiel_beneficiaires`;
CREATE TABLE IF NOT EXISTS `securite_materiel_beneficiaires` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idMateriel` bigint(20) unsigned NOT NULL,
  `beneficiairePieceVehicule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiairePieceVehiculeQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiairePieceVehiculeHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiairePieceVehiculeConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireCleVehicule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireCleVehiculeQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireCleVehiculeHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireCleVehiculeConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireTelephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireTelephoneHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireTelephoneConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireRadio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireRadioQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireRadioHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireRadioConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireGBP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireGBPQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireGBPHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireGBPConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiairePA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiairePAQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiairePAHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiairePAConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireFP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireFPQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireFPHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireFPConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiairePM` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiairePMQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiairePMHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiairePMConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireMunition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireMunitionQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireMunitionHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireMunitionConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireTAG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireTAGQuanite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireTAGHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaireTAGConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `securite_materiel_beneficiaires_idmateriel_foreign` (`idMateriel`),
  CONSTRAINT `securite_materiel_beneficiaires_idmateriel_foreign` FOREIGN KEY (`idMateriel`) REFERENCES `securite_materiels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.securite_materiel_beneficiaires : ~0 rows (environ)
DELETE FROM `securite_materiel_beneficiaires`;
/*!40000 ALTER TABLE `securite_materiel_beneficiaires` DISABLE KEYS */;
/*!40000 ALTER TABLE `securite_materiel_beneficiaires` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. securite_materiel_remettants
DROP TABLE IF EXISTS `securite_materiel_remettants`;
CREATE TABLE IF NOT EXISTS `securite_materiel_remettants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idMateriel` bigint(20) unsigned NOT NULL,
  `remettantPieceVehicule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantPieceVehiculeQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantPieceVehiculeHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantPieceVehiculeConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantCleVehicule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantCleVehiculeQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantCleVehiculeHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantCleVehiculeConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantTelephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantTelephoneQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantTelephoneHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantTelephoneConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantRadio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantRadioQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantRadioHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantRadioConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantGBP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantGBPQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantGBPHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantGBPConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantPA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantPAQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantPAHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantPAConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantFP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantFPQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantFPHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantFPConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantPM` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantPMQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantPMHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantPMConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantMunition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantMunitionQuantite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantMunitionHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantMunitionConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantTAG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantTAGQuanite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantTAGHeureRetour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remettantTAGConvoyeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `securite_materiel_remettants_idmateriel_foreign` (`idMateriel`),
  CONSTRAINT `securite_materiel_remettants_idmateriel_foreign` FOREIGN KEY (`idMateriel`) REFERENCES `securite_materiels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.securite_materiel_remettants : ~0 rows (environ)
DELETE FROM `securite_materiel_remettants`;
/*!40000 ALTER TABLE `securite_materiel_remettants` DISABLE KEYS */;
/*!40000 ALTER TABLE `securite_materiel_remettants` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. securite_services
DROP TABLE IF EXISTS `securite_services`;
CREATE TABLE IF NOT EXISTS `securite_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chargeDeSecurite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hps_cs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hfs_cs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eop11` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hps_eop11` time DEFAULT NULL,
  `hfs_eop11` time DEFAULT NULL,
  `eop12` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hps_eop12` time DEFAULT NULL,
  `hfs_eop12` time DEFAULT NULL,
  `eop21` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hps_eop21` time DEFAULT NULL,
  `hfs_eop21` time DEFAULT NULL,
  `eop22` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hps_eop22` time DEFAULT NULL,
  `hfs_eop22` time DEFAULT NULL,
  `eop31` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hps_eop31` time DEFAULT NULL,
  `hfs_eop31` time DEFAULT NULL,
  `eop32` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hps_eop32` time DEFAULT NULL,
  `hfs_eop32` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.securite_services : ~0 rows (environ)
DELETE FROM `securite_services`;
/*!40000 ALTER TABLE `securite_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `securite_services` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. site_arrivee_tournees
DROP TABLE IF EXISTS `site_arrivee_tournees`;
CREATE TABLE IF NOT EXISTS `site_arrivee_tournees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `montant` int(11) NOT NULL,
  `idTourneeArrivee` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `site_arrivee_tournees_idtourneearrivee_foreign` (`idTourneeArrivee`),
  CONSTRAINT `site_arrivee_tournees_idtourneearrivee_foreign` FOREIGN KEY (`idTourneeArrivee`) REFERENCES `arrivee_tournees` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.site_arrivee_tournees : ~0 rows (environ)
DELETE FROM `site_arrivee_tournees`;
/*!40000 ALTER TABLE `site_arrivee_tournees` DISABLE KEYS */;
/*!40000 ALTER TABLE `site_arrivee_tournees` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. site_depart_tournees
DROP TABLE IF EXISTS `site_depart_tournees`;
CREATE TABLE IF NOT EXISTS `site_depart_tournees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `heure` time DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bordereau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `idTourneeDepart` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `site_depart_tournees_idtourneedepart_foreign` (`idTourneeDepart`),
  CONSTRAINT `site_depart_tournees_idtourneedepart_foreign` FOREIGN KEY (`idTourneeDepart`) REFERENCES `depart_tournees` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.site_depart_tournees : ~18 rows (environ)
DELETE FROM `site_depart_tournees`;
/*!40000 ALTER TABLE `site_depart_tournees` DISABLE KEYS */;
INSERT INTO `site_depart_tournees` (`id`, `created_at`, `updated_at`, `site`, `heure`, `type`, `bordereau`, `montant`, `idTourneeDepart`) VALUES
	(1, '2020-12-17 15:01:36', '2020-12-17 15:01:36', '1', '15:02:00', 'oo_vb_extamuros_bitume', NULL, NULL, 1),
	(2, '2020-12-17 15:01:36', '2020-12-17 15:01:36', '2', '15:02:00', 'oo_vl_extramuros_bitume', NULL, NULL, 1),
	(3, '2020-12-17 15:25:57', '2020-12-17 15:25:57', '1', '15:25:00', 'oo_vb_extamuros_bitume', NULL, NULL, 2),
	(4, '2020-12-17 15:25:57', '2020-12-17 15:25:57', '2', '17:25:00', 'oo_vb_extamuros_bitume', NULL, NULL, 2),
	(5, '2020-12-21 13:58:13', '2020-12-21 13:58:13', '3', '14:57:00', 'oo_vb_extamuros_bitume', NULL, NULL, 3),
	(6, '2020-12-21 13:58:13', '2020-12-21 13:58:13', '1', '14:58:00', 'oo_vb_extramuros_piste', NULL, NULL, 3),
	(7, '2020-12-21 13:58:13', '2020-12-21 13:58:13', '1', '14:58:00', 'oo_vl_extramuros_piste', NULL, NULL, 3),
	(8, '2020-12-21 14:38:42', '2020-12-21 14:38:42', '4', '14:38:00', 'oo_vb_extramuros_piste', NULL, NULL, 4),
	(9, '2020-12-21 14:38:42', '2020-12-21 14:38:42', '2', '14:38:00', 'oo_vb_intramuros', NULL, NULL, 4),
	(10, '2020-12-21 14:40:32', '2020-12-21 14:40:32', '2', '15:40:00', 'oo_vb_extamuros_bitume', NULL, NULL, 5),
	(11, '2020-12-21 14:40:32', '2020-12-21 14:40:32', '4', '19:40:00', 'oo_vb_extramuros_piste', NULL, NULL, 5),
	(12, '2020-12-21 14:52:45', '2020-12-21 14:52:45', '2', '14:53:00', 'oo_vl_extramuros_piste', NULL, NULL, 6),
	(13, '2020-12-28 13:49:24', '2020-12-28 13:49:24', '2', NULL, 'oo_vb_extamuros_bitume', NULL, NULL, 7),
	(14, '2020-12-28 13:49:24', '2020-12-28 13:49:24', '1', NULL, 'oo_vb_intramuros', NULL, NULL, 7),
	(15, '2020-12-28 13:49:24', '2020-12-28 13:49:24', '3', NULL, 'oo_vl_extramuros_bitume', NULL, NULL, 7),
	(16, '2020-12-28 13:53:29', '2020-12-28 13:56:38', '1', '13:52:00', 'oo_vb_extamuros_bitume', '120', 55000, 8),
	(17, '2020-12-28 13:53:29', '2020-12-28 13:56:38', '2', '15:53:00', 'oo_vb_extramuros_piste', '2145', 23000000, 8),
	(18, '2020-12-28 13:53:29', '2020-12-28 13:56:38', '3', '16:53:00', 'oo_vl_extramuros_bitume', '11', 630000, 8),
	(19, '2020-12-28 13:53:29', '2020-12-28 13:56:38', '4', '16:53:00', 'oo_vl_extramuros_piste', '123', 22000, 8);
/*!40000 ALTER TABLE `site_depart_tournees` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. ssb
DROP TABLE IF EXISTS `ssb`;
CREATE TABLE IF NOT EXISTS `ssb` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `numeroIncident` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroBordereau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site` bigint(20) unsigned NOT NULL,
  `banque` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intervention` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dabiste1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dabiste2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `heureDeclaration` time DEFAULT NULL,
  `heureReponse` time DEFAULT NULL,
  `heureArrivee` time DEFAULT NULL,
  `debutIntervention` time DEFAULT NULL,
  `finIntervention` time DEFAULT NULL,
  `dateCloture` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ssb_site_foreign` (`site`),
  CONSTRAINT `ssb_site_foreign` FOREIGN KEY (`site`) REFERENCES `commercial_sites` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.ssb : ~0 rows (environ)
DELETE FROM `ssb`;
/*!40000 ALTER TABLE `ssb` DISABLE KEYS */;
/*!40000 ALTER TABLE `ssb` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. ssb_commercials
DROP TABLE IF EXISTS `ssb_commercials`;
CREATE TABLE IF NOT EXISTS `ssb_commercials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nomClient` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `situationGeographique` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephoneClient` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regimeImpot` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boitePostale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ncc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomContact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailContact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `portefeuilleClient` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fonction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephoneContact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `secteurActivite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroContrat` int(11) DEFAULT NULL,
  `dateEffet` date DEFAULT NULL,
  `dureeContrat` int(11) DEFAULT NULL,
  `objetArretePhysique` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objetArreteComptable` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objetApprovisionnement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objetNiveau1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objetNiveau2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objetNiveau3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objetAccompagnement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `baseArretePhysique` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `baseArreteComptable` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `baseApprovisionnement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `baseNiveau1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `baseNiveau2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `baseNiveau3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `baseAccompagnement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coutUnitaire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coutForfaitaire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montant` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.ssb_commercials : ~0 rows (environ)
DELETE FROM `ssb_commercials`;
/*!40000 ALTER TABLE `ssb_commercials` DISABLE KEYS */;
/*!40000 ALTER TABLE `ssb_commercials` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. ssb_sites
DROP TABLE IF EXISTS `ssb_sites`;
CREATE TABLE IF NOT EXISTS `ssb_sites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etrags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banque` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filiale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client` bigint(20) unsigned NOT NULL,
  `site` bigint(20) unsigned NOT NULL,
  `nomContact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fonctionContact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreGab` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `muros` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ssb_sites_client_foreign` (`client`),
  KEY `ssb_sites_site_foreign` (`site`),
  CONSTRAINT `ssb_sites_client_foreign` FOREIGN KEY (`client`) REFERENCES `commercial_clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ssb_sites_site_foreign` FOREIGN KEY (`site`) REFERENCES `commercial_sites` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.ssb_sites : ~0 rows (environ)
DELETE FROM `ssb_sites`;
/*!40000 ALTER TABLE `ssb_sites` DISABLE KEYS */;
/*!40000 ALTER TABLE `ssb_sites` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. tournee_centres
DROP TABLE IF EXISTS `tournee_centres`;
CREATE TABLE IF NOT EXISTS `tournee_centres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `noTournee` bigint(20) unsigned NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tournee_centres_notournee_foreign` (`noTournee`),
  CONSTRAINT `tournee_centres_notournee_foreign` FOREIGN KEY (`noTournee`) REFERENCES `depart_tournees` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.tournee_centres : ~0 rows (environ)
DELETE FROM `tournee_centres`;
/*!40000 ALTER TABLE `tournee_centres` DISABLE KEYS */;
INSERT INTO `tournee_centres` (`id`, `created_at`, `updated_at`, `noTournee`, `centre`, `centreRegional`, `dateDebut`, `dateFin`) VALUES
	(1, '2020-12-17 15:03:33', '2020-12-17 15:03:33', 1, 'Abidjan', 'Abidjan Nord', '2020-12-09', NULL),
	(2, '2020-12-28 14:54:36', '2020-12-28 14:54:36', 8, 'Abidjan', 'Abidjan Sud', '2020-12-29', NULL);
/*!40000 ALTER TABLE `tournee_centres` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `compte` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` bigint(20) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_foreign` (`role`),
  CONSTRAINT `users_role_foreign` FOREIGN KEY (`role`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.users : ~12 rows (environ)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nom`, `compte`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'burval', 'burval', 'r.thur.light@gmail.com', NULL, 'burval', 1, NULL, '2020-10-12 15:04:28', '2020-10-12 15:04:28'),
	(2, 'Commercial', 'commercial', 'commercial@mail.com', NULL, 'commercial', 7, NULL, '2020-10-12 15:10:36', '2020-10-12 15:10:36'),
	(3, 'Securite', 'sécurité', 'sécurité', NULL, 'sécurité', 3, NULL, '2020-10-12 15:11:54', '2020-10-12 15:11:54'),
	(4, 'Caisse', 'caisse', 'caisse@mail.com', NULL, 'caisse', 4, NULL, '2020-10-12 15:12:23', '2020-10-12 15:12:23'),
	(5, 'Transport', 'transport', 'transport@mail.com', NULL, 'transport', 5, NULL, '2020-10-12 15:12:51', '2020-10-12 15:12:51'),
	(6, 'Régulation', 'regulation@mail.com', 'regulation', NULL, 'regulation', 6, NULL, '2020-10-12 15:13:33', '2020-10-12 15:13:33'),
	(7, 'Virgil', 'virgil', 'virgil@mail.com', NULL, 'virgil', 8, NULL, '2020-10-12 19:16:12', '2020-10-12 19:16:12'),
	(8, 'Logistique', 'logistique', 'logistique@mail.com', NULL, 'logistique', 9, NULL, '2020-10-12 19:16:54', '2020-10-12 19:16:54'),
	(9, 'rh', 'rh', 'rh@mail.com', NULL, 'rh', 10, NULL, '2020-10-12 19:17:11', '2020-10-12 19:17:11'),
	(10, 'informatique', 'informatique', 'informatique@mail.com', NULL, 'informatique', 11, NULL, '2020-10-12 19:17:38', '2020-10-12 19:17:38'),
	(11, 'achat', 'achat', 'achat@mail.com', NULL, 'achat', 12, NULL, '2020-10-12 19:17:58', '2020-10-12 19:17:58'),
	(12, 'ssb', 'ssb', 'ssb@mail.com', NULL, 'ssb', 13, NULL, '2020-10-12 19:18:25', '2020-10-12 19:18:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. vehicules
DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE IF NOT EXISTS `vehicules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `immatriculation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marque` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_chassis` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DPMC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateAcquisition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chauffeurTitulaire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chauffeurSuppleant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.vehicules : ~5 rows (environ)
DELETE FROM `vehicules`;
/*!40000 ALTER TABLE `vehicules` DISABLE KEYS */;
INSERT INTO `vehicules` (`id`, `created_at`, `updated_at`, `immatriculation`, `marque`, `type`, `code`, `num_chassis`, `DPMC`, `dateAcquisition`, `centre`, `centreRegional`, `photo`, `chauffeurTitulaire`, `chauffeurSuppleant`) VALUES
	(1, '2020-12-15 16:34:58', '2020-12-15 16:34:58', 'AF CI 2020', 'toyota', 'VL', 'COLBIS', '02222', '2020-12-15', '2020-12-01', 'Bouaké', 'Bouaké', 'user.png', '1', '2'),
	(2, '2020-12-15 16:36:04', '2020-12-15 16:36:04', '5m8988', 'PEUGEAOT', 'VL', 'zender', '7545585', '2020-12-15', '2020-12-03', 'Daloa', 'Daloa', 'user.png', '10', '9'),
	(3, '2020-12-21 13:27:58', '2020-12-21 13:27:58', 'jfk421', 'MERCEDES', 'VL', 'zender', '526', '2020-12-21', '2020-12-22', 'Abidjan', 'Abidjan Sud', 'user.png', '10', '2'),
	(4, '2020-12-21 13:28:38', '2020-12-21 13:28:38', '452', 'renault xxl', 'VL', '547', NULL, '2020-12-22', '2020-12-22', 'Bouaké', 'Korogo', 'user.png', '7', '9'),
	(5, '2021-01-05 10:12:25', '2021-01-05 10:12:25', 'VEHICULES BXZ', 'TOGEOT', 'VL', 'DDD44', '412K', '2021-01-05', '2021-01-05', 'Abidjan', 'Abidjan Sud', 'user.png', '2', '1'),
	(7, '2021-07-15 10:03:57', '2021-07-15 10:03:57', '321HS 01', 'TOYOTA LAND CRUSER', 'VL', 'BRAVO 01', '111111', '2021-07-15', '2021-07-16', 'Abidjan', 'Abidjan Nord', 'user.png', '11', '2');
/*!40000 ALTER TABLE `vehicules` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. vidange_assurances
DROP TABLE IF EXISTS `vidange_assurances`;
CREATE TABLE IF NOT EXISTS `vidange_assurances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `idVehicule` int(11) NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateRenouvellement` date NOT NULL,
  `prochainRenouvellement` date NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.vidange_assurances : ~0 rows (environ)
DELETE FROM `vidange_assurances`;
/*!40000 ALTER TABLE `vidange_assurances` DISABLE KEYS */;
/*!40000 ALTER TABLE `vidange_assurances` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. vidange_courroies
DROP TABLE IF EXISTS `vidange_courroies`;
CREATE TABLE IF NOT EXISTS `vidange_courroies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `idVehicule` int(11) NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kmActuel` int(11) NOT NULL,
  `prochainKm` int(11) NOT NULL,
  `courroie` int(11) NOT NULL,
  `courroieMarque` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courroieKm` int(11) NOT NULL,
  `courroieFournisseur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courroieMontant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.vidange_courroies : ~0 rows (environ)
DELETE FROM `vidange_courroies`;
/*!40000 ALTER TABLE `vidange_courroies` DISABLE KEYS */;
/*!40000 ALTER TABLE `vidange_courroies` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. vidange_generales
DROP TABLE IF EXISTS `vidange_generales`;
CREATE TABLE IF NOT EXISTS `vidange_generales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `idVehicule` bigint(20) unsigned NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kmActuel` int(11) DEFAULT NULL,
  `prochainKm` int(11) DEFAULT NULL,
  `huileMoteur` int(11) DEFAULT NULL,
  `huileMoteurMarque` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `huileMoteurKm` int(11) DEFAULT NULL,
  `huileMoteurFournisseur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `huileMoteurmontant` int(11) DEFAULT NULL,
  `filtreHuile` int(11) DEFAULT NULL,
  `filtreHuileMontant` int(11) DEFAULT NULL,
  `filtreGazoil` int(11) DEFAULT NULL,
  `filtreGazoilMontant` int(11) DEFAULT NULL,
  `filtreAir` int(11) DEFAULT NULL,
  `filtreAirMontant` int(11) DEFAULT NULL,
  `autresConsommables` int(11) DEFAULT NULL,
  `autresConsommablesMontant` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vidange_generales_idvehicule_foreign` (`idVehicule`),
  CONSTRAINT `vidange_generales_idvehicule_foreign` FOREIGN KEY (`idVehicule`) REFERENCES `vehicules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.vidange_generales : ~0 rows (environ)
DELETE FROM `vidange_generales`;
/*!40000 ALTER TABLE `vidange_generales` DISABLE KEYS */;
/*!40000 ALTER TABLE `vidange_generales` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. vidange_huile_ponts
DROP TABLE IF EXISTS `vidange_huile_ponts`;
CREATE TABLE IF NOT EXISTS `vidange_huile_ponts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `idVehicule` int(11) NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kmActuel` int(11) NOT NULL,
  `prochainKm` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.vidange_huile_ponts : ~0 rows (environ)
DELETE FROM `vidange_huile_ponts`;
/*!40000 ALTER TABLE `vidange_huile_ponts` DISABLE KEYS */;
/*!40000 ALTER TABLE `vidange_huile_ponts` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. vidange_patentes
DROP TABLE IF EXISTS `vidange_patentes`;
CREATE TABLE IF NOT EXISTS `vidange_patentes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `idVehicule` int(11) NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateRenouvellement` date NOT NULL,
  `prochainRenouvellement` date NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.vidange_patentes : ~0 rows (environ)
DELETE FROM `vidange_patentes`;
/*!40000 ALTER TABLE `vidange_patentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `vidange_patentes` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. vidange_stationnements
DROP TABLE IF EXISTS `vidange_stationnements`;
CREATE TABLE IF NOT EXISTS `vidange_stationnements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `idVehicule` int(11) NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateRenouvellement` date NOT NULL,
  `prochainRenouvellement` date NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.vidange_stationnements : ~0 rows (environ)
DELETE FROM `vidange_stationnements`;
/*!40000 ALTER TABLE `vidange_stationnements` DISABLE KEYS */;
/*!40000 ALTER TABLE `vidange_stationnements` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. vidange_transports
DROP TABLE IF EXISTS `vidange_transports`;
CREATE TABLE IF NOT EXISTS `vidange_transports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `idVehicule` int(11) NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateRenouvellement` date NOT NULL,
  `prochainRenouvellement` date NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.vidange_transports : ~0 rows (environ)
DELETE FROM `vidange_transports`;
/*!40000 ALTER TABLE `vidange_transports` DISABLE KEYS */;
/*!40000 ALTER TABLE `vidange_transports` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. vidange_vignettes
DROP TABLE IF EXISTS `vidange_vignettes`;
CREATE TABLE IF NOT EXISTS `vidange_vignettes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `idVehicule` int(11) NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateRenouvellement` date NOT NULL,
  `prochainRenouvellement` date NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.vidange_vignettes : ~0 rows (environ)
DELETE FROM `vidange_vignettes`;
/*!40000 ALTER TABLE `vidange_vignettes` DISABLE KEYS */;
/*!40000 ALTER TABLE `vidange_vignettes` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. vidange_visites
DROP TABLE IF EXISTS `vidange_visites`;
CREATE TABLE IF NOT EXISTS `vidange_visites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `idVehicule` int(11) NOT NULL,
  `centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `centreRegional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateRenouvellement` date NOT NULL,
  `prochainRenouvellement` date NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.vidange_visites : ~0 rows (environ)
DELETE FROM `vidange_visites`;
/*!40000 ALTER TABLE `vidange_visites` DISABLE KEYS */;
/*!40000 ALTER TABLE `vidange_visites` ENABLE KEYS */;

-- Listage de la structure de la table rwc5v1789xflwyyt. virgilometries
DROP TABLE IF EXISTS `virgilometries`;
CREATE TABLE IF NOT EXISTS `virgilometries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `nomPrenoms` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `heureArrivee` time DEFAULT NULL,
  `typePiece` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personneVisitee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motif` text COLLATE utf8_unicode_ci,
  `heureDepart` time DEFAULT NULL,
  `observation` text COLLATE utf8_unicode_ci,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table rwc5v1789xflwyyt.virgilometries : ~0 rows (environ)
DELETE FROM `virgilometries`;
/*!40000 ALTER TABLE `virgilometries` DISABLE KEYS */;
/*!40000 ALTER TABLE `virgilometries` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
