-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 26 mars 2018 à 13:10
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ocp5_catbot`
--

-- --------------------------------------------------------

--
-- Structure de la table `ocp5_actualite`
--

DROP TABLE IF EXISTS `ocp5_actualite`;
CREATE TABLE IF NOT EXISTS `ocp5_actualite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `updateAt` datetime NOT NULL,
  `actualite_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3F38DADEA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ocp5_actualite`
--

INSERT INTO `ocp5_actualite` (`id`, `user_id`, `title`, `content`, `updateAt`, `actualite_image`) VALUES
(1, 1, 'Atque nulla necessitatibus.', 'Nihil quis non optio veniam dolores quod perspiciatis. Possimus veniam dolorem dignissimos optio ab ut dignissimos. Officiis eius qui eaque doloribus. Earum autem ipsum ut veritatis eum molestiae voluptatibus. Occaecati consequatur voluptatem modi quaerat. Veritatis impedit ut est tempore. Atque quam et impedit illum consequuntur. Reprehenderit quasi et quae quod ea. Est voluptas dolorum omnis nostrum quia ut qui. Est ab impedit rerum velit. Omnis voluptas provident beatae aperiam labore error velit.', '2018-02-27 18:28:33', 'actualite4.jpg'),
(2, 1, 'Possimus voluptas beatae.', 'Qui soluta fugiat excepturi atque qui esse. Iusto corrupti libero est atque accusamus maiores architecto. Ut et ut provident qui. Sit corrupti voluptas et ipsum laboriosam fugit est vitae. Fuga neque enim nostrum consequatur. Expedita suscipit et et. Repudiandae sed omnis fugiat qui cumque. Iure quaerat delectus saepe doloremque est. Dolore velit impedit eum deserunt quia. Voluptatem omnis magni ullam impedit quasi soluta sunt.', '2018-02-17 20:38:58', 'actualite2.jpg'),
(3, 1, 'Dolor et sapiente perspiciatis sunt.', 'Maiores adipisci magni aut animi praesentium voluptatem molestiae odio. Et ut quis enim sit et et ipsa. Facere voluptatum et et ex est quasi aspernatur. Et cupiditate molestiae explicabo cum distinctio doloremque laboriosam. Quis nihil quo tempore cum provident quasi qui cum. Sit aut quasi soluta minus. Et voluptas quasi expedita quia. Quas ut at magnam. Quidem aliquid aut ducimus velit dolorum ad. Non ex aliquid eveniet harum temporibus. Et eligendi aperiam molestiae odit corrupti. Earum esse ab veniam distinctio velit. Nulla culpa est velit et. Laboriosam explicabo praesentium aliquid est dicta velit voluptatem.', '2018-02-25 10:43:01', 'actualite2.jpg'),
(4, 1, 'Natus sint qui consequuntur.', 'Ex repellat quasi dolor aut et. Praesentium ullam minus iure dignissimos. Voluptatem perferendis repudiandae numquam. Dolor ipsum eum sit ut aut enim. Aperiam omnis et consequatur aut. Ipsam numquam a consequatur perferendis alias sit minus. Et aperiam veritatis accusamus voluptatum eum et et. Exercitationem doloremque quia vel quasi aut. Ipsa minus nostrum atque dolor ab. Harum repellat rerum vel sit illum et laboriosam. Totam iure eum et autem.', '2018-02-12 21:54:55', 'actualite2.jpg'),
(5, 1, 'Recusandae eos atque.', 'Omnis consequatur et nostrum. Suscipit fugiat ullam provident. Est laborum sapiente deserunt libero placeat rem ut voluptas. Fugiat esse quasi in aspernatur. Ipsa explicabo aut recusandae quas sit possimus molestias. Nemo inventore ut aliquam cumque. Itaque corrupti dolorem quisquam iusto. Et vel porro et architecto inventore. Quis id officiis harum laborum cumque. Nostrum corporis hic sit sit soluta veniam illum. Voluptatibus ducimus labore assumenda eveniet ad officia. Eos blanditiis laborum molestiae consequatur error.', '2018-01-25 17:21:23', 'actualite4.jpg'),
(6, 1, 'Rerum fugit omnis quis magnam.', 'Ratione quas debitis non corrupti delectus dolorum. Voluptas et non assumenda id. Quis quis velit optio. Deserunt qui veniam eligendi enim asperiores. Saepe et natus voluptas quo qui earum. Accusamus nihil odit provident est nemo vel amet. Enim ipsam recusandae omnis id nostrum nobis doloribus recusandae.', '2018-01-25 16:57:53', 'actualite4.jpg'),
(7, 1, 'Numquam fuga reprehenderit et et esse.', 'Magni beatae esse aut et consequatur similique. Nisi quas cupiditate quae repellendus eaque et itaque amet. Enim laborum autem repellat et dignissimos rem ea. Enim vitae exercitationem voluptatem et magnam dolorem saepe. Quis vel tenetur est iure nihil. Voluptatem aut aut autem accusantium voluptatem. Molestias quam consequatur maxime velit molestiae. Eos iure dolor error odit. Consectetur aut exercitationem cupiditate ullam tempore nesciunt cum. Labore minima nihil fugiat et et occaecati facilis. Magni ab aut qui. Consectetur laborum necessitatibus aut sed est amet eaque iusto. Vel quo eligendi mollitia est sit iste magnam. Nihil dignissimos libero facere aliquid.', '2018-02-11 04:16:28', 'actualite3.jpg'),
(8, 1, 'Non vel ut.', 'Cupiditate corrupti aut debitis voluptatum consequatur. Officia doloribus id et expedita ut. Tenetur rem in praesentium. Nam ipsa ut accusantium assumenda et fugit. Rem aut ipsa dolorem corrupti eligendi error consequuntur. Velit reiciendis voluptas voluptatem magni sunt consequatur sit. Ad aliquam ut omnis velit ad excepturi.', '2017-12-30 23:29:15', 'actualite2.jpg'),
(9, 1, 'Rerum nulla iste rerum.', 'Veniam ut adipisci cumque maiores non maxime. Minima blanditiis et earum quia. Dolorum molestiae aspernatur ullam accusantium corrupti nihil cupiditate. Debitis soluta consequatur nihil vel. Consequatur mollitia sint et esse aliquam. Esse omnis aperiam sit velit accusantium. Minima nisi est tempore commodi qui. Sapiente recusandae ipsam voluptas odio.', '2018-01-06 22:52:04', 'actualite4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `ocp5_bird`
--

DROP TABLE IF EXISTS `ocp5_bird`;
CREATE TABLE IF NOT EXISTS `ocp5_bird` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taxref_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `plumage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pattes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `couleur_bec` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forme_bec` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B8D492BE18F55814` (`taxref_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ocp5_bird`
--

INSERT INTO `ocp5_bird` (`id`, `taxref_id`, `name`, `url`, `description`, `plumage`, `pattes`, `couleur_bec`, `forme_bec`, `image`) VALUES
(1, NULL, 'Nettie', 'http://www.koss.com/', 'Consequatur sint et officia debitis tenetur voluptatem provident omnis enim sapiente enim enim ut quisquam cum et vel sed et enim eos quod molestiae incidunt sint id autem provident et autem dolore dolorum facilis dicta quae beatae sequi et nemo minima minima id consequuntur molestias repudiandae ipsa eum labore officiis et quis totam sed vero eos culpa doloremque amet nobis ut necessitatibus atque et voluptas provident deleniti molestias veritatis est nesciunt cum omnis.', 'vert', 'marrons', 'noir', 'long', 'oiseau_6.jpg'),
(2, NULL, 'Ellen', 'http://bogisich.net/eos-quis-impedit-quos-reiciendis-libero', 'Et voluptas eveniet ut excepturi quia fugit quas assumenda animi molestias tempora ullam earum accusantium at ad quasi nam explicabo quia voluptatem ea illum impedit rerum labore omnis rerum enim voluptate aut in velit molestiae numquam facere dolore maxime quasi molestiae error voluptatem iure eum corporis maxime distinctio velit ut aut ratione recusandae neque adipisci quod dolorem quo dolorem fugiat non minus dicta nobis eveniet dicta dolor quia dolorem consequatur itaque est labore molestiae enim officia inventore sit voluptates reiciendis libero ea blanditiis rerum sit sint voluptas laboriosam tempora rem nostrum deleniti.', 'rouge', 'gris', 'jaune', 'pointu', 'oiseau_5.jpg'),
(3, NULL, 'Melba', 'http://blick.com/dicta-reprehenderit-quo-cupiditate-optio-quae-repudiandae-quis-ut', 'Sit quia dignissimos deleniti ut vel optio ut alias voluptatem omnis perspiciatis asperiores et illo qui sunt ut et delectus optio ut dicta earum enim velit quam accusantium officiis ut rerum distinctio exercitationem fugit saepe et aut velit eius laboriosam aperiam neque aliquam sint nisi nulla aut vel facilis tempore ut natus eaque deleniti optio et est quidem iure et sed fugiat voluptas unde quasi assumenda sint quia a est magni iure eos molestiae et quis esse sint placeat ducimus recusandae aut quia accusantium qui temporibus qui nihil iusto.', 'rouge', 'gris', 'jaune', 'pointu', 'oiseau_6.jpg'),
(4, NULL, 'Telly', 'https://moen.org/tempore-sequi-assumenda-esse-ut-architecto-sapiente.html', 'Iusto optio possimus laboriosam quis rerum sapiente inventore accusantium ipsum quod omnis tempora omnis ut maiores aperiam deserunt dolore sint quo esse est qui nulla nisi sed tempora aut aut quam occaecati ut quas et voluptatum voluptates eaque et ab asperiores qui quos vero et aperiam reiciendis consectetur nisi labore molestias sequi quas ea et corporis temporibus delectus quisquam sed a ut nisi minus illo iure enim quo occaecati beatae rerum quos occaecati sequi quia praesentium quod facere velit est eligendi quo sed tempore rerum quos expedita voluptatem sed et laborum assumenda voluptas corrupti voluptatem ut ut velit.', 'rouge', 'gris', 'jaune', 'pointu', 'oiseau_3.jpg'),
(5, NULL, 'Ima', 'http://www.koelpin.biz/est-et-qui-quis-ut', 'Et sit deserunt quasi non minima recusandae aspernatur quod aut aut nam sint debitis sunt blanditiis voluptas aut et eligendi ut repudiandae amet sunt non ex neque provident ad cupiditate rerum quibusdam reiciendis doloremque et dicta impedit quod voluptatibus quaerat provident eius id reiciendis corporis harum fugiat voluptatibus reprehenderit expedita sequi perspiciatis eaque explicabo quam tenetur totam recusandae natus porro corrupti ratione magnam iure quo.', 'vert', 'marrons', 'noir', 'long', 'oiseau_5.jpg'),
(6, NULL, 'Karen', 'http://torphy.com/', 'Ipsum consequuntur rem inventore qui eum officiis pariatur aut inventore in aut possimus aperiam velit molestias libero quia similique laborum qui autem voluptatem omnis quos autem rem nostrum molestias ut ea voluptatem ut fuga eaque quam nam velit ut iste quibusdam omnis alias eum debitis eos in nisi quos maxime maiores qui dolore est consequatur et ipsam et et iusto molestiae rem accusantium cumque fugiat in voluptas omnis quod molestias maiores explicabo minus quia consequatur unde nisi esse dolorem et et ullam reprehenderit quis.', 'jaune', 'noir', 'noir', 'long', 'oiseau_5.jpg'),
(7, NULL, 'Damaris', 'http://parker.com/rerum-qui-nam-quae-et.html', 'Voluptatibus aspernatur corrupti temporibus quam expedita rerum distinctio quos praesentium mollitia rem repellat impedit eos est commodi et ex et et vel similique architecto perferendis eligendi rerum aut ratione eum aut provident impedit dolores qui minus voluptatum ut repellendus perferendis omnis et quidem eos voluptatibus eligendi voluptas consequatur saepe impedit et delectus occaecati sapiente qui et tempora quas eveniet inventore distinctio non at aut molestiae.', 'rouge', 'gris', 'jaune', 'pointu', 'oiseau_2.jpg'),
(8, NULL, 'Marquise', 'http://www.prohaska.com/', 'Iste dolor architecto non incidunt veritatis cupiditate est sit ea modi voluptatem sed sit iusto possimus repudiandae itaque ut cumque repellendus sed cupiditate autem soluta magnam quod ducimus laborum qui amet numquam cupiditate vel laudantium rerum deleniti aperiam eveniet qui est et ipsam placeat ea earum in corrupti in quisquam similique ipsum reprehenderit quos assumenda quas id qui optio sit aut amet cupiditate aperiam eos libero dignissimos eveniet eos optio ut illo voluptatem totam quas aspernatur libero et optio libero.', 'rouge', 'gris', 'jaune', 'pointu', 'oiseau_9.jpg'),
(9, NULL, 'Margaret', 'http://www.sauer.biz/vitae-maiores-repudiandae-dignissimos-animi-est', 'Minus sequi voluptates est id delectus rerum dolorum voluptas ducimus repellendus id autem optio officiis officiis reprehenderit voluptas cumque quia quae est rerum dolor molestias sed consequatur itaque ut quia ea fugit cum voluptatum voluptatem quis repudiandae ullam in enim rerum magnam eum magni libero sunt qui consequatur quia rerum laudantium inventore quia.', 'jaune', 'noir', 'noir', 'long', 'oiseau_9.jpg'),
(10, NULL, 'Noemi', 'http://www.hammes.org/nihil-eum-unde-voluptatem-maxime-voluptatibus', 'Minus suscipit aliquam id minus harum et itaque officiis similique necessitatibus dolorem mollitia accusantium provident consectetur iusto et dolor magni perspiciatis perferendis id consequatur est illo et veritatis molestiae qui id iusto molestiae quis dolore quam ut illum dolor sed inventore ut ut adipisci est earum repellat vitae reprehenderit assumenda necessitatibus eos totam et aut assumenda quod minus magni quam eaque nihil officiis fugiat et illum dolor facilis facere et consequatur consequatur facilis doloremque occaecati quod minima.', 'jaune', 'noir', 'noir', 'long', 'oiseau_3.jpg'),
(11, NULL, 'Alvera', 'https://ratke.org/voluptate-sit-cupiditate-qui-et-nisi-quis.html', 'Voluptas vel sapiente accusantium tempora sed excepturi eveniet optio iste et quis earum quaerat quaerat eum officia unde temporibus officiis est deserunt et rerum beatae aliquid explicabo molestias dolore officiis commodi atque amet in vel facere et amet quisquam doloremque incidunt eius voluptatem atque aut et qui sit perspiciatis temporibus ad dolorem voluptas hic ullam hic dolores blanditiis sunt provident aut porro rem aut hic id totam facere dolore explicabo esse ratione consequatur ratione sunt maxime et autem quos commodi id quaerat cupiditate dignissimos quis distinctio quidem aperiam et molestias labore aliquam facilis.', 'rouge', 'gris', 'jaune', 'pointu', 'oiseau_8.jpg'),
(12, NULL, 'Mariana', 'http://pfannerstill.com/eligendi-facere-dicta-voluptatem-sed-voluptate', 'Id et sed incidunt eum reprehenderit eos consectetur ipsam incidunt sit aut minima dolore nihil quisquam aut voluptas velit praesentium qui laborum ut officiis earum itaque vel consequatur ipsum minima nulla accusamus quo sit asperiores deleniti veritatis rerum et ex hic quos eaque eum ut nostrum cum et dignissimos velit distinctio sit qui debitis minus qui id est ut exercitationem eos animi provident corporis quidem ut pariatur laboriosam quasi optio et et officia ipsam architecto id excepturi fuga incidunt aut quos debitis ut aut sequi veritatis esse iusto consequatur et facilis eius delectus possimus nesciunt corrupti magnam asperiores dolores ullam hic quod eos iste aut laudantium expedita provident enim sunt.', 'jaune', 'noir', 'noir', 'long', 'oiseau_3.jpg'),
(13, NULL, 'Mylene', 'http://schroeder.com/neque-iure-sequi-optio-eaque', 'Repellat voluptate id amet enim sit necessitatibus consequatur minus totam illo iure repellat eveniet sunt nihil blanditiis dolorum cumque neque facilis quasi quaerat in sed nihil rem vitae exercitationem aliquam vitae est architecto modi dolores dolorum voluptatem et in quae porro qui doloremque molestiae harum minus nulla iste aut magnam sit nisi sint non rerum alias eum et tenetur aut velit vel aperiam voluptas rerum reiciendis qui aperiam aspernatur distinctio nihil sit nam tenetur et iste sed facilis enim non nam eveniet iste iure quidem inventore odio ut sed rerum minima sed est nihil repudiandae corrupti laboriosam praesentium accusantium nulla cumque exercitationem ipsam veritatis mollitia voluptatem cumque laborum et officia temporibus.', 'rouge', 'gris', 'jaune', 'pointu', 'oiseau_4.jpg'),
(14, NULL, 'Edna', 'http://www.windler.com/mollitia-quaerat-eum-quibusdam-minus', 'Voluptatem aspernatur laboriosam doloremque reprehenderit praesentium occaecati non labore quia voluptatibus omnis rerum asperiores perspiciatis sit blanditiis alias nisi cupiditate rerum consectetur maiores sint nihil consequatur quidem eligendi ut porro aliquam distinctio sed voluptates voluptatem ex asperiores atque qui minima consequatur pariatur itaque ab deserunt labore eius aspernatur odio voluptas minima recusandae explicabo consectetur esse illum nam nobis velit consequatur quos voluptate recusandae sint ipsum corrupti tempore omnis quod quas amet ex ut quaerat ducimus nobis cumque earum et quas enim neque aliquam perferendis quia ducimus non quia rerum delectus qui aspernatur quis.', 'rouge', 'gris', 'jaune', 'pointu', 'oiseau_4.jpg'),
(15, NULL, 'Cordia', 'http://schuster.info/', 'Sit incidunt cupiditate voluptates eum voluptatem fuga reprehenderit vel libero voluptatum consequatur dolores est est quas suscipit laboriosam modi aperiam consequatur ea accusantium deleniti odio deserunt temporibus et perferendis quia vero voluptatem ratione illo assumenda possimus omnis ratione consequatur ea repudiandae dicta exercitationem est numquam ut nesciunt ipsam excepturi nesciunt neque quas quidem quis aut illo distinctio modi et qui dignissimos non inventore dolor et omnis enim nobis doloremque rerum non dolores ut blanditiis debitis autem quae nam animi tempore molestiae culpa officiis ut unde est unde et sint aliquam laudantium aut eum porro esse natus enim necessitatibus ad ab ut velit dolores praesentium et autem sit perspiciatis exercitationem.', 'jaune', 'noir', 'noir', 'long', 'oiseau_7.jpg'),
(16, NULL, 'Edna', 'http://www.eichmann.biz/alias-iure-consequatur-vel.html', 'Ipsum laboriosam placeat accusantium ut corrupti facilis sit provident repellat aut eaque nobis nesciunt dolores esse enim sunt nemo laborum corporis id voluptatem rerum mollitia et quisquam voluptatem adipisci provident accusantium rerum error nihil neque asperiores minima asperiores voluptatem in et est sint quae voluptas occaecati non ut similique atque commodi sit qui molestias non reprehenderit voluptatum qui labore molestias sed voluptatem corrupti aut beatae hic facere omnis deleniti qui laboriosam dolorum voluptatem qui ut non accusamus et animi qui et enim et sit ipsa odio consequatur adipisci eos qui necessitatibus rerum voluptas enim quia architecto itaque expedita et ullam suscipit minus et debitis pariatur quia totam odio.', 'rouge', 'gris', 'jaune', 'pointu', 'oiseau_9.jpg'),
(17, NULL, 'Avis', 'https://www.jerde.com/natus-nostrum-ut-temporibus-tempore-aut', 'Assumenda tenetur natus voluptas id fuga tenetur consequatur animi vel quisquam dolorem quos animi nulla id quia voluptatem aperiam illum vel ea amet exercitationem qui possimus distinctio natus pariatur molestias id magnam animi odio vero ab modi ut animi itaque et velit et voluptatibus assumenda cum veniam soluta iusto esse iste neque nihil cum magnam temporibus quos expedita cum aspernatur nesciunt eum dicta amet est officiis delectus nobis et quo nihil ipsa mollitia ratione.', 'rouge', 'gris', 'jaune', 'pointu', 'oiseau_9.jpg'),
(18, NULL, 'Marjolaine', 'http://www.yundt.com/quae-odit-voluptatibus-delectus-omnis', 'Dolores nam quod ab voluptatem error ad nesciunt minus sed odit omnis a est similique error quis voluptatem voluptatem enim quis quae est fugit unde iste nemo voluptatem optio labore rem ut vitae autem aut ullam distinctio dolorem dolorem facere modi iste iusto voluptate dolores id voluptatum quidem eos asperiores aut quaerat et sit non dolor id voluptatem occaecati autem non illum eum soluta facilis numquam atque aliquid amet qui ea sit blanditiis quod adipisci quae eligendi et natus incidunt a dolorem distinctio quia assumenda corrupti voluptates nesciunt qui veniam voluptates blanditiis culpa voluptatem voluptatibus at tempora eveniet consequatur suscipit quasi occaecati.', 'vert', 'marrons', 'noir', 'long', 'oiseau_3.jpg'),
(19, NULL, 'Roslyn', 'https://dare.com/fugit-amet-culpa-qui-quo-est-ratione.html', 'Distinctio minus tempore minima quia voluptatem exercitationem est ducimus unde ratione facere adipisci consequatur dolore aut laudantium aut eligendi sunt quo reiciendis aspernatur sequi doloribus fugiat aut laborum rerum aut et sed sunt magnam in voluptas reprehenderit voluptatum libero consequatur sint non sapiente tenetur omnis voluptatum saepe doloremque quia eaque ut magni corporis repudiandae aut totam molestias nam dignissimos et enim doloribus quo enim doloribus et quam rerum enim qui quos a.', 'vert', 'marrons', 'noir', 'long', 'oiseau_4.jpg'),
(20, NULL, 'Prudence', 'http://www.ryan.com/quasi-sit-illum-occaecati-a-rerum-ut', 'Magnam laborum dolores vel ratione dolor sunt qui in nesciunt et pariatur sed et ex molestias quis quo consectetur rerum sed consectetur quos voluptas consequatur incidunt ut et voluptates doloremque temporibus dolorem voluptatem vitae laborum nemo et odit est ea ut aut repellat earum voluptatem commodi sed voluptatum beatae saepe aspernatur odio quibusdam possimus aperiam fugit qui in nulla alias aut velit natus rem reprehenderit veritatis hic et amet nihil et dignissimos consequuntur eius explicabo doloremque libero sed expedita nulla eos eligendi perspiciatis dolorem labore quaerat esse sapiente ut voluptatem et aut architecto totam ut totam aut saepe blanditiis sed ipsa.', 'vert', 'marrons', 'noir', 'long', 'oiseau_5.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `ocp5_comment`
--

DROP TABLE IF EXISTS `ocp5_comment`;
CREATE TABLE IF NOT EXISTS `ocp5_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `observation_id` int(11) DEFAULT NULL,
  `actualite_id` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updateAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FFD4A952A76ED395` (`user_id`),
  KEY `IDX_FFD4A9521409DD88` (`observation_id`),
  KEY `IDX_FFD4A952A2843073` (`actualite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ocp5_comment`
--

INSERT INTO `ocp5_comment` (`id`, `user_id`, `observation_id`, `actualite_id`, `content`, `updateAt`) VALUES
(1, 15, NULL, 2, 'Ex id nam in id.', '2018-03-16 06:21:24'),
(2, 9, NULL, 4, 'Et et temporibus iste atque sit necessitatibus voluptates.', '2018-03-12 15:51:45'),
(3, 19, NULL, 8, 'Non id eos facere quae dolor fuga sunt.', '2018-03-12 12:32:57'),
(4, 16, NULL, 3, 'Nulla quis autem ipsa earum.', '2018-03-23 00:37:08'),
(5, 2, NULL, 2, 'Consectetur quo reiciendis voluptatem et veniam in provident.', '2018-03-16 08:30:58'),
(6, 9, NULL, 3, 'Recusandae ad reiciendis architecto tempore adipisci impedit.', '2018-03-25 23:10:41'),
(7, 8, NULL, 2, 'Neque magnam qui ipsum ut qui.', '2018-03-09 14:43:48'),
(8, 8, NULL, 1, 'Nisi ex reiciendis dolores laborum quo exercitationem repudiandae nihil.', '2018-03-10 12:23:11'),
(9, 8, NULL, 4, 'Amet laborum sunt tempore et accusantium.', '2018-03-10 06:30:21'),
(10, 3, NULL, 3, 'Quae sapiente omnis harum maxime quae.', '2018-03-12 21:59:52'),
(11, 2, NULL, 6, 'Perferendis neque facere reiciendis vero esse est fugiat.', '2018-03-19 12:21:24'),
(12, 5, NULL, 1, 'Sit voluptatem temporibus magni ratione quasi perferendis.', '2018-03-16 11:34:04'),
(13, 14, NULL, 9, 'Officiis quas non nisi laborum tempore ipsa autem.', '2018-03-18 12:04:57'),
(14, 14, NULL, 9, 'Vero sint eius est ut sit minima.', '2018-03-10 12:33:54'),
(15, 2, NULL, 1, 'Consequatur fuga voluptatem dolorum.', '2018-03-24 14:18:30'),
(16, 5, NULL, 3, 'Numquam ducimus facilis tempora nemo sunt ullam voluptatem.', '2018-03-23 15:30:54'),
(17, 3, NULL, 7, 'Libero omnis veritatis qui enim voluptas aut.', '2018-03-17 21:32:22'),
(18, 7, NULL, 6, 'Fugiat expedita aut voluptatem sapiente earum facere.', '2018-03-11 00:19:02'),
(19, 17, NULL, 1, 'Consequatur error dolorem neque sunt ipsam sunt.', '2018-03-11 10:13:32'),
(20, 4, NULL, 2, 'Rerum nesciunt optio veniam ratione.', '2018-03-22 15:33:24'),
(21, 17, 21, NULL, 'Qui nihil ipsum quia esse pariatur vero.', '2018-03-24 03:58:12'),
(22, 12, 8, NULL, 'Fugiat magnam quam officiis similique.', '2018-03-25 10:23:37'),
(23, 7, 17, NULL, 'Quis est autem saepe hic quam consequuntur officiis.', '2018-03-16 05:45:18'),
(24, 6, 29, NULL, 'Veritatis dignissimos non unde nam.', '2018-03-08 18:35:16'),
(25, 10, 1, NULL, 'Reprehenderit voluptates alias soluta odit.', '2018-03-26 07:54:22'),
(26, 10, 29, NULL, 'Aut est aliquam itaque dolor.', '2018-03-25 14:18:16'),
(27, 7, 13, NULL, 'Adipisci ipsam temporibus voluptas sequi dolorem corrupti.', '2018-03-09 13:35:38'),
(28, 20, 7, NULL, 'Eius qui velit consequatur sit.', '2018-03-09 00:57:51'),
(29, 19, 18, NULL, 'Ea ut maxime qui magnam natus sed.', '2018-03-16 08:35:27'),
(30, 9, 28, NULL, 'Nisi esse nihil quia ad aut.', '2018-03-12 22:26:28'),
(31, 9, 2, NULL, 'Enim et ut error quas facilis.', '2018-03-09 12:01:35'),
(32, 3, 21, NULL, 'Sint est maxime placeat et corporis.', '2018-03-15 07:53:27'),
(33, 12, 30, NULL, 'Deleniti dolorem doloremque vitae.', '2018-03-17 22:41:41'),
(34, 14, 30, NULL, 'Commodi repellat non dignissimos officia.', '2018-03-08 21:38:34'),
(35, 3, 18, NULL, 'Vel magnam reiciendis quo dicta.', '2018-03-18 03:08:09'),
(36, 5, 14, NULL, 'Odio nemo delectus commodi itaque rem ut.', '2018-03-21 13:40:24'),
(37, 4, 19, NULL, 'Odit voluptatem exercitationem voluptate nesciunt.', '2018-03-12 13:58:49'),
(38, 8, 12, NULL, 'Recusandae voluptatem itaque qui aut placeat quidem voluptatem.', '2018-03-21 23:05:24'),
(39, 10, 16, NULL, 'Alias culpa autem laborum commodi qui sequi.', '2018-03-15 11:05:23'),
(40, 9, 1, NULL, 'Incidunt optio ut quia qui.', '2018-03-22 15:07:09'),
(41, 4, 9, NULL, 'Et libero dicta ad ut aut rerum nobis.', '2018-03-18 22:50:14'),
(42, 20, 16, NULL, 'Nesciunt ut vel nihil nulla aliquid sunt.', '2018-03-09 16:41:22'),
(43, 11, 16, NULL, 'Impedit deserunt fugiat voluptate.', '2018-03-25 17:06:02'),
(44, 18, 30, NULL, 'Natus quis modi voluptas.', '2018-03-25 13:04:36'),
(45, 1, 14, NULL, 'Repudiandae optio qui deleniti molestiae suscipit ipsa.', '2018-03-14 23:34:25'),
(46, 1, 9, NULL, 'Accusamus iste exercitationem consequatur laudantium incidunt aut voluptatum.', '2018-03-13 05:16:26'),
(47, 13, 16, NULL, 'Quisquam perferendis nobis voluptatum enim veritatis fuga.', '2018-03-13 07:08:24'),
(48, 17, 22, NULL, 'Autem voluptas maiores est sint.', '2018-03-14 02:59:31'),
(49, 17, 26, NULL, 'Animi quos fugit animi asperiores qui hic fuga quasi.', '2018-03-16 11:19:22'),
(50, 5, 4, NULL, 'Eos molestias omnis aliquam.', '2018-03-13 18:06:50'),
(51, 4, 13, NULL, 'Non eum nihil ut sunt dolor.', '2018-03-11 13:57:29'),
(52, 13, 7, NULL, 'Ut ratione ut aperiam voluptatibus ut esse consequatur.', '2018-03-18 03:21:44'),
(53, 7, 3, NULL, 'Facere vitae eum neque est et.', '2018-03-10 17:58:01'),
(54, 17, 23, NULL, 'Expedita ut omnis facilis quis velit deserunt id recusandae.', '2018-03-25 08:14:19'),
(55, 8, 29, NULL, 'Nam cupiditate corrupti sed nulla perspiciatis dolores maiores.', '2018-03-14 01:04:06'),
(56, 10, 18, NULL, 'Aut qui omnis architecto occaecati.', '2018-03-22 09:04:02'),
(57, 12, 2, NULL, 'Voluptatem numquam est quis.', '2018-03-09 23:58:16'),
(58, 10, 18, NULL, 'Qui nam voluptatem maiores assumenda ratione.', '2018-03-17 09:42:50'),
(59, 19, 24, NULL, 'Dolore ipsam ipsa doloremque eum sint voluptatum pariatur.', '2018-03-14 14:10:00'),
(60, 20, 4, NULL, 'Est qui magnam omnis aliquid dolores soluta molestiae veritatis.', '2018-03-18 11:43:14');

-- --------------------------------------------------------

--
-- Structure de la table `ocp5_observation`
--

DROP TABLE IF EXISTS `ocp5_observation`;
CREATE TABLE IF NOT EXISTS `ocp5_observation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bird_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `taxref_id` int(11) DEFAULT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `isValidated` tinyint(1) NOT NULL,
  `updateAt` datetime NOT NULL,
  `observedAt` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty_birds` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1874CC7AE813F9` (`bird_id`),
  KEY `IDX_1874CC7AA76ED395` (`user_id`),
  KEY `IDX_1874CC7A18F55814` (`taxref_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ocp5_observation`
--

INSERT INTO `ocp5_observation` (`id`, `bird_id`, `user_id`, `taxref_id`, `latitude`, `longitude`, `isValidated`, `updateAt`, `observedAt`, `image`, `qty_birds`, `description`) VALUES
(1, 1, 1, NULL, 47.264728, 5.471475, 0, '2018-03-18 19:00:09', '2018-02-16 22:31:45', 'observation_5.jpg', 4, 'Quia numquam itaque ut molestiae quis qui iste dolorem id veritatis voluptatem reiciendis quam possimus et rerum voluptas molestiae ipsa in amet ut.'),
(2, 2, 1, NULL, 46.058169, 1.957288, 1, '2018-03-08 21:41:51', '2018-02-20 13:54:11', 'observation_9.jpg', 8, 'Numquam similique non omnis voluptatibus in et voluptatem laboriosam recusandae voluptas architecto ducimus cupiditate mollitia fugit quam nisi deleniti accusantium.'),
(3, 3, 1, NULL, 45.417196, 2.948113, 0, '2018-03-18 10:08:08', '2018-02-23 06:48:46', 'observation_8.jpg', 8, 'Et quae esse dicta sed soluta quod vel libero quasi molestiae quia quis tempora eum repudiandae at.'),
(4, 4, 13, NULL, 47.972972, -0.233153, 0, '2018-03-10 16:22:37', '2018-02-25 11:16:51', 'observation_9.jpg', 6, 'Quaerat voluptatem assumenda deserunt cupiditate quidem debitis autem aliquam explicabo placeat molestiae nobis.'),
(5, 5, 16, NULL, 47.800844, 3.933471, 0, '2018-03-23 15:17:40', '2018-02-17 11:16:19', 'observation_1.jpg', 2, 'Aut laboriosam ut reprehenderit vel sequi non expedita sit provident perspiciatis doloremque iure magnam perferendis veritatis.'),
(6, 6, 1, NULL, 48.506726, 1.408895, 0, '2018-03-21 15:33:46', '2018-02-28 16:37:48', 'observation_10.jpg', 8, 'Et natus quod ab est ut dignissimos aut dolores dignissimos molestias adipisci amet nobis facere.'),
(7, 7, 6, NULL, 47.987257, 3.738713, 1, '2018-03-24 15:52:04', '2018-02-24 21:33:45', 'observation_1.jpg', 4, 'Voluptatum dolorem error eum laudantium dolores dolorum tempora non vitae animi eum nobis aperiam dolorem rerum explicabo deserunt ut et voluptas deleniti delectus quos.'),
(8, 8, 4, NULL, 46.470998, 0.008159, 1, '2018-03-09 15:47:10', '2018-03-04 18:37:02', 'observation_2.jpg', 7, 'Est porro eligendi unde accusamus molestias harum animi neque minima fugiat nam unde magni illum porro assumenda reprehenderit sint aut quis.'),
(9, 9, 11, NULL, 47.427054, -3.974735, 0, '2018-03-18 20:55:26', '2018-02-18 03:55:12', 'observation_5.jpg', 5, 'Eligendi consequuntur modi vel cumque vel ut quaerat quis nam impedit ut possimus quidem ipsam repudiandae.'),
(10, 3, 20, NULL, 48.361363, -3.215704, 1, '2018-03-23 20:33:47', '2018-02-23 04:04:00', 'observation_10.jpg', 7, 'Nobis impedit quos et neque nostrum eum consequatur iste debitis laboriosam eaque maiores animi odio est cumque voluptate beatae fugiat sed aliquid.'),
(11, 10, 5, NULL, 48.662589, 4.428405, 1, '2018-03-24 13:29:54', '2018-02-20 12:37:06', 'observation_2.jpg', 9, 'Asperiores sunt ut repellat molestiae ut ut excepturi eum ut repellat delectus sequi natus rerum neque in dolorem itaque.'),
(12, 11, 14, NULL, 46.547331, -3.817665, 1, '2018-03-21 09:20:06', '2018-02-20 15:10:11', 'observation_4.jpg', 2, 'Non ducimus voluptatem voluptatum quia consequuntur quasi fugiat et iste eius vitae id aut sunt ut dolore consequatur aliquid esse molestiae aut optio quisquam.'),
(13, 2, 5, NULL, 46.843708, 5.847864, 0, '2018-03-17 21:07:24', '2018-03-03 09:10:28', 'observation_2.jpg', 4, 'Fuga atque id sequi asperiores aut unde expedita molestias eos sint eveniet tempore alias est est odit tempora itaque saepe est.'),
(14, 2, 5, NULL, 47.154812, 4.632916, 0, '2018-03-16 21:27:12', '2018-03-02 01:14:53', 'observation_1.jpg', 1, 'Excepturi iste quam odit ut consequatur nesciunt incidunt qui quasi deleniti asperiores molestiae sapiente ab delectus.'),
(15, 9, 20, NULL, 48.646864, -3.645848, 0, '2018-03-09 21:09:54', '2018-02-22 22:51:49', 'observation_10.jpg', 6, 'Nulla tenetur nesciunt quibusdam aliquid dolores voluptatibus iste autem enim vel minus eaque quia accusantium consequatur sint eveniet.'),
(16, 12, 19, NULL, 47.216051, -0.120914, 0, '2018-03-11 03:02:14', '2018-02-20 06:10:58', 'observation_7.jpg', 4, 'Laudantium voluptatem molestiae rerum et iure exercitationem veritatis laudantium veritatis qui aut in voluptatem amet.'),
(17, 13, 6, NULL, 46.578048, 5.60375, 0, '2018-03-23 11:32:09', '2018-02-14 20:58:38', 'observation_3.jpg', 1, 'Quia fugiat consequatur nihil molestias corrupti nostrum eos ut reiciendis dolore ut nulla repellat eum ipsa.'),
(18, 3, 13, NULL, 47.160695, 5.255644, 0, '2018-03-12 13:08:54', '2018-02-23 07:54:29', 'observation_7.jpg', 8, 'Eos voluptas harum veritatis earum totam modi quaerat voluptate eligendi ut deleniti nulla officiis modi omnis.'),
(19, 14, 7, NULL, 47.958557, 3.526399, 1, '2018-03-23 07:34:01', '2018-02-20 13:54:03', 'observation_9.jpg', 2, 'Modi aut quae id aut optio possimus quo velit itaque magnam magnam enim necessitatibus voluptatem nihil culpa.'),
(20, 11, 13, NULL, 47.187727, 5.205484, 0, '2018-03-11 20:16:32', '2018-02-26 05:51:25', 'observation_3.jpg', 3, 'Natus a qui minus odit sit et commodi debitis ut quasi occaecati est eos odio dolores ipsa nostrum maiores molestiae ut impedit neque.'),
(21, 15, 18, NULL, 46.492914, 2.244594, 1, '2018-03-10 08:16:04', '2018-03-02 05:56:46', 'observation_6.jpg', 3, 'Nobis est distinctio hic unde voluptas praesentium cum aut dolore consequatur ut assumenda sint qui voluptas.'),
(22, 16, 14, NULL, 47.548615, 2.772747, 0, '2018-03-23 06:11:44', '2018-03-04 22:30:57', 'observation_3.jpg', 4, 'Vel placeat voluptate possimus et quia ut non quis nesciunt sed facere alias odio magnam suscipit.'),
(23, 17, 14, NULL, 44.30843, 5.04836, 1, '2018-03-07 21:09:20', '2018-02-17 03:34:05', 'observation_10.jpg', 8, 'Cum fugiat sed labore voluptas quasi qui dolorem quia unde ad ipsum libero dolores omnis in impedit eum.'),
(24, 18, 19, NULL, 49.586344, 6.972335, 1, '2018-03-22 09:27:53', '2018-02-27 09:56:09', 'observation_4.jpg', 3, 'Voluptatem ullam vero optio aut delectus nisi non vitae sint ad voluptatum dolore deleniti id et ad illum est.'),
(25, 5, 3, NULL, 49.8265, 5.447103, 1, '2018-03-17 07:42:17', '2018-02-15 08:12:19', 'observation_9.jpg', 9, 'Non laboriosam doloribus veritatis corrupti sed omnis qui incidunt minima culpa pariatur magni sequi facilis alias provident rem.'),
(26, 13, 10, NULL, 48.564815, -2.436043, 0, '2018-03-17 12:28:52', '2018-03-06 01:13:31', 'observation_6.jpg', 7, 'Dolore quo temporibus nisi quis ut nesciunt sunt neque esse corporis et et nobis officiis voluptate laboriosam consectetur aut quia eos.'),
(27, 2, 14, NULL, 45.854755, 2.595996, 1, '2018-03-12 04:58:48', '2018-02-16 23:54:02', 'observation_1.jpg', 5, 'Veniam vel libero vel et recusandae occaecati aut quis fugit repellat et quaerat totam possimus aut et nostrum sed exercitationem expedita rerum et suscipit qui quis debitis placeat.'),
(28, 7, 18, NULL, 44.305365, -0.645066, 1, '2018-03-20 11:01:38', '2018-03-04 12:33:21', 'observation_1.jpg', 6, 'Quia minima voluptas nihil atque exercitationem et qui alias voluptatem nemo voluptates et quo deleniti magni cupiditate quibusdam repellendus soluta dolorem et vel officia est pariatur.'),
(29, 13, 6, NULL, 49.533903, 2.489154, 1, '2018-03-18 20:37:48', '2018-03-05 02:29:44', 'observation_9.jpg', 3, 'Aliquam voluptatem deleniti rerum reprehenderit ut minus quia vel aliquid doloribus sed aut impedit atque sequi odit quos sit autem omnis cupiditate harum quidem.'),
(30, 5, 19, NULL, 45.154095, 0.343705, 1, '2018-03-19 18:47:21', '2018-02-23 16:26:55', 'observation_7.jpg', 8, 'Ducimus qui impedit repellat optio excepturi debitis autem similique et nisi praesentium rerum ut.');

-- --------------------------------------------------------

--
-- Structure de la table `ocp5_taxref`
--

DROP TABLE IF EXISTS `ocp5_taxref`;
CREATE TABLE IF NOT EXISTS `ocp5_taxref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_scientifique` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cd_nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `famille` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_observation` datetime NOT NULL,
  `last_observation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ocp5_user`
--

DROP TABLE IF EXISTS `ocp5_user`;
CREATE TABLE IF NOT EXISTS `ocp5_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json_array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_95FCEAF9F85E0677` (`username`),
  UNIQUE KEY `UNIQ_95FCEAF9E7927C74` (`email`),
  UNIQUE KEY `UNIQ_95FCEAF99BE8FD98` (`facebook_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ocp5_user`
--

INSERT INTO `ocp5_user` (`id`, `username`, `email`, `password`, `profile_picture`, `token`, `level`, `is_active`, `newsletter`, `facebook_id`, `roles`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$13$cbEwGnAX66Nz.XAAHPUk..p1QD2RdcegxD6RkBjGRhHWjp8hwADLi', 'img/profilePictures/admin.png', 'ab3c9826ecc129a39dc95b7d64c2db8385097d85c4b9ebf60f5f55e0824e64336c97c0560a790beaad773bcecb79cbbe5710acbb30a9abdeb9addeb38daadb7b', 'condor', 1, 1, NULL, '[\"ROLE_ADMIN\"]'),
(2, 'naturaliste2', 'naturaliste2@gmail.com', '$2y$13$YdZEjDLj7sQ1GDLkqU8jS.ySBDuYStBEWypaWrHBZ1CaZPxv6hLfC', 'img/profilePictures/naturaliste4.jpg', '37498958f4d7d3dc2c59e49f6d3cd0ad25fe6e7d988a8c0af43ea6d67600ee23f7c972c9d5dfbb332e7111f7bb651c16ff179f048ed9e34065f3bd0f2b931e78', 'aigle royal', 1, 1, NULL, '[\"ROLE_NATURALISTE\"]'),
(3, 'naturaliste3', 'naturaliste3@gmail.com', '$2y$13$qh3f1teT1vmUY/bTkb4HgO6nJoD8sWGLoVo5A1Ruvxhw2BYUiTYBa', 'img/profilePictures/naturaliste1.jpg', '28f8c7015011452e792a7a0351d1d9ac3daa70c7dc857eee675b9ecae24b170f3f07b190f171033003597ec42039933e0a9a75095aefb6158ca9aa03f3b7ae66', 'aigle royal', 1, 0, NULL, '[\"ROLE_NATURALISTE\"]'),
(4, 'naturaliste4', 'naturaliste4@gmail.com', '$2y$13$xv1Ck4vfX2OyjvkLTun.h.J93qn7WMFBmG/.DAx94EZXNjmiM26xO', 'img/profilePictures/naturaliste2.jpg', 'b0df4a6f246294b03f1ef53fc293678c5c461e93e4e6f376aca577bbb31ec7e74181b032494e18f4ec14772cf1c08defb1c25929c8d439870f5b8d8ff8b74b3e', 'aigle royal', 1, 0, NULL, '[\"ROLE_NATURALISTE\"]'),
(5, 'naturaliste5', 'naturaliste5@gmail.com', '$2y$13$0iVNNp3pbQcQHm1EWRdlyeeD04Fsp11YP75WN0uD1W810Z4HRPVSy', 'img/profilePictures/naturaliste2.jpg', '8be88102f1c707f4c97b476bde984f2b87f550a30bcbd50a36726f3d13acde8237177fcfa17aaa5a509fe1bcf5461c2148d693d7ed1becbd18e2d7f969c33b0a', 'aigle royal', 1, 0, NULL, '[\"ROLE_NATURALISTE\"]'),
(6, 'gulgowski.ofelia', 'keanu.luettgen@hotmail.com', '$2y$13$jfhm9xq/HkmWP.b/.sMSnOUC0tf3XbM4eN6pag8BQhDdbx77PPpfG', 'img/profilePictures/user7.jpg', '30ddc00a3527ef2536187d639f637395bc212a24ed2d2543d8f8482b4e0674a160fa4a4ccd05ac7f0d6ac24d9a19c1699447a2f10fdfee28b1e1bf02c2b74f64', 'moineau', 1, 0, NULL, '[\"ROLE_USER\"]'),
(7, 'howard.kihn', 'gerson54@jaskolski.biz', '$2y$13$UrXdtcNTFf9fXcA.i6bjEe3c9roajFtWR2HjBmDIKREQ6nSlckJSS', 'img/profilePictures/user8.jpg', '745eef8b278b4dc0e65d60ad3132692234925562d4e7b2b0859b8e93253047e037b35bdb5aa1988ad4b0d0d5681949ea0f491320e3848cca450ac09bb59f06ed', 'moineau', 1, 1, NULL, '[\"ROLE_USER\"]'),
(8, 'emmie.cartwright', 'claudie85@damore.com', '$2y$13$COivUbUrY.s/ZDPaU4CHY.8B8EnB0BJeeDBqiS1k5xZL4HafY.12C', 'img/profilePictures/user6.jpg', 'f93d27d217d18619c336d859e27c95411f5ddd8a8d46444e5b5103562ff1d010f0a9e1304325efd10b398df5dd7b5723966ba37cc5695ba5c3ad3d1b20d7672f', 'moineau', 1, 0, NULL, '[\"ROLE_USER\"]'),
(9, 'elisha.gleichner', 'schuppe.cordia@hotmail.com', '$2y$13$KkjQny71RE7xlQ.Pph3tsOimP7jNukl0RIbn/OEH.rtVwkV9mCEbe', 'img/profilePictures/user5.jpg', '1d91af37e0d4c46e2adee07cb590455a26302da26741469db21720f95f50b523669040e261795f1867a83da24382498476335f108f1f2cdb6b39db9106bdbd84', 'moineau', 1, 1, NULL, '[\"ROLE_USER\"]'),
(10, 'roberts.corene', 'kallie.gottlieb@hoppe.net', '$2y$13$eXciL1PsnnN140mR9Q9pke2kuC/eGhdnGUtQqJuOa.8FiaAUcoz12', 'img/profilePictures/user10.jpg', '1d39ddadb40a4cc48e6ebd8eaa53c1b38a921f7c3a572cc447e14de30219c06f520bd1ba4a1bcb148d0bc72ec268122756072ca9fc56d20b30b94f79c0c1cd38', 'moineau', 1, 1, NULL, '[\"ROLE_USER\"]'),
(11, 'erdman.jordy', 'cferry@gmail.com', '$2y$13$3Y9jEzy3WfP4PdN/kia2WuNIv5gO91ef0cbN693QYMSzLNMKYvC9O', 'img/profilePictures/user3.jpg', 'e7e5dc7bb371666cbb369e2fcce3b446f8aa4d59f7020c481bcd09a04d51cbc626ab4fa46750b80e312af87f1365c5697002f730350dac97b5e33c234d39eea8', 'moineau', 1, 1, NULL, '[\"ROLE_USER\"]'),
(12, 'marielle.rolfson', 'raphaelle18@yahoo.com', '$2y$13$7yvgkWJYGusAgi1i29ERTuUp3JlrJrR6DTkcRfOGl/sI5r1Wi2aOW', 'img/profilePictures/user8.jpg', '11f1c99641e72a7ff8d330fdb9b750e220b9b789c2195a345dc83ce3c7d57fc1ee3f27e66c24d5d040d40de62ded03abdcd9ebd7fb853b47d69a25f9708b70a3', 'moineau', 1, 1, NULL, '[\"ROLE_USER\"]'),
(13, 'shaylee52', 'rylee.orn@yahoo.com', '$2y$13$FfmnH4K6aFYl9Nxa/f79g.y8hpC4ydYtVfE6C5i/juizSHa9u/q9u', 'img/profilePictures/user7.jpg', '205edac47ddbbbe089989875182925f84d035adc6a24d5dde2905cc4eea951518962c8066830648a80cad8f558c4cceb7719a8c5079762b69e613bceb53af975', 'moineau', 1, 1, NULL, '[\"ROLE_USER\"]'),
(14, 'melissa83', 'beth.ebert@gmail.com', '$2y$13$LgYmTsNQo1NXKbEJRQRqVuWw1iUk.1GrDMbNNjnTkOuJscp7RZbBq', 'img/profilePictures/user1.jpg', '1e3d46c27c66198ae6489db1fd99a4c61fd9a70278fa2566fdfa35683264d18beeaff6c5fa120899784cdbf2afe3eda883a8fcf6d8a3d16fc1c04a2235b5976e', 'moineau', 1, 0, NULL, '[\"ROLE_USER\"]'),
(15, 'dach.eleanore', 'daphne.breitenberg@yahoo.com', '$2y$13$bo8CXb/wizUEnW/FoIwtOeMzlbgTNiGjxIgr2VfJF3NmLv3E3SUvO', 'img/profilePictures/user2.jpg', 'ed438ca5c6deeb4f4c23e91f34c945701042f8779eac82a803b61da384828c16e10b0397b40a9affdb2d603e987cfe4a149fa57bb0be2123c8109420b8b61bd7', 'moineau', 1, 1, NULL, '[\"ROLE_USER\"]'),
(16, 'harvey78', 'hills.norma@kunze.info', '$2y$13$ufAc317M9KLzspTpc/4yce/hWaLLM8z6bLRciTR17MVKsfgVmSGpe', 'img/profilePictures/user3.jpg', 'd3dccc05c609db62147b14c46670083ca33b3b0396cd59b4fffdf3e399aa8e1c233f75f244404e7f8a8ea2e9557f7128688c78e39b6c1fe0808aa7621732c1ff', 'moineau', 1, 1, NULL, '[\"ROLE_USER\"]'),
(17, 'sawayn.gardner', 'nmccullough@lang.com', '$2y$13$/WXMOe2J.2e/6/PYesAkCuVIDLAyhhD9rRXCDW33sE7yo7w0D5VQW', 'img/profilePictures/user3.jpg', '5b5544e34d004ef2d2bf72589ff50c931aea75a72d0a41ff9784b67c92f341221021299856cf8a85bbcbfcc6f5f6ce6c0f4e738568ca654b30ce0d44d99c41bf', 'moineau', 1, 1, NULL, '[\"ROLE_USER\"]'),
(18, 'clinton82', 'kreiger.kelli@yahoo.com', '$2y$13$a.G/f/ZOSNKnYA.6xhCxku98OZs4NW.Fy.tO33pcbNdVF6VT7hBwq', 'img/profilePictures/user5.jpg', 'b32eb7a2e5f757edccc40ff647c7dca193f1e0852c78523149b5c577dba729e744d529a7e5e3f1c9d9e04277af41aadbe3427e697036fd34942207b23c36a790', 'moineau', 1, 1, NULL, '[\"ROLE_USER\"]'),
(19, 'weissnat.lucio', 'hackett.frederick@jacobson.com', '$2y$13$iyDBGLRSDMZHeB01B7AZcO5fO8EFZxLb3RYZn2QU1Ws.ZTc47Zufm', 'img/profilePictures/user5.jpg', 'bf2cb6bbaad2a69f5ef82f5394de7728dbccacf0d7001024caaa1fc5ae5c4ce6e1feb11831f03da08ebb67b03c79ee827469d640cc10ad216626bca8e5f3f500', 'moineau', 1, 0, NULL, '[\"ROLE_USER\"]'),
(20, 'anderson.braxton', 'williamson.freeman@reynolds.net', '$2y$13$K1N/SaS2tSHChTTxfBFdr.i0L2tw0JOXLRPsuTfGZy4oFwQkYuFTK', 'img/profilePictures/user10.jpg', 'd4e629a9b517ee9af928a7f9f86500cc00dfd8fdcf8eb3a5abb5de14bc102c92d1942ec8754386b3b24bb8bd8d1532eb31b18c66e57f8866cc70fa5c9117e804', 'moineau', 1, 0, NULL, '[\"ROLE_USER\"]');

-- --------------------------------------------------------

--
-- Structure de la table `ocp5_user_voted`
--

DROP TABLE IF EXISTS `ocp5_user_voted`;
CREATE TABLE IF NOT EXISTS `ocp5_user_voted` (
  `observation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`observation_id`,`user_id`),
  KEY `IDX_3FF1573F1409DD88` (`observation_id`),
  KEY `IDX_3FF1573FA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ocp5_actualite`
--
ALTER TABLE `ocp5_actualite`
  ADD CONSTRAINT `FK_3F38DADEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `ocp5_user` (`id`);

--
-- Contraintes pour la table `ocp5_bird`
--
ALTER TABLE `ocp5_bird`
  ADD CONSTRAINT `FK_B8D492BE18F55814` FOREIGN KEY (`taxref_id`) REFERENCES `ocp5_taxref` (`id`);

--
-- Contraintes pour la table `ocp5_comment`
--
ALTER TABLE `ocp5_comment`
  ADD CONSTRAINT `FK_FFD4A9521409DD88` FOREIGN KEY (`observation_id`) REFERENCES `ocp5_observation` (`id`),
  ADD CONSTRAINT `FK_FFD4A952A2843073` FOREIGN KEY (`actualite_id`) REFERENCES `ocp5_actualite` (`id`),
  ADD CONSTRAINT `FK_FFD4A952A76ED395` FOREIGN KEY (`user_id`) REFERENCES `ocp5_user` (`id`);

--
-- Contraintes pour la table `ocp5_observation`
--
ALTER TABLE `ocp5_observation`
  ADD CONSTRAINT `FK_1874CC7A18F55814` FOREIGN KEY (`taxref_id`) REFERENCES `ocp5_taxref` (`id`),
  ADD CONSTRAINT `FK_1874CC7AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `ocp5_user` (`id`),
  ADD CONSTRAINT `FK_1874CC7AE813F9` FOREIGN KEY (`bird_id`) REFERENCES `ocp5_bird` (`id`);

--
-- Contraintes pour la table `ocp5_user_voted`
--
ALTER TABLE `ocp5_user_voted`
  ADD CONSTRAINT `FK_3FF1573F1409DD88` FOREIGN KEY (`observation_id`) REFERENCES `ocp5_observation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3FF1573FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `ocp5_user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
