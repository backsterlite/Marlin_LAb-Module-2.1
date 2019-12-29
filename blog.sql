-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 29 2019 г., 21:11
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(300) DEFAULT NULL,
  `post_counter` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `slug`, `post_counter`) VALUES
(1, 'odio', NULL, 3),
(2, 'eum', NULL, 3),
(3, 'mollitia', NULL, 1),
(4, 'sint', NULL, 2),
(5, 'est', NULL, 2),
(6, 'esse', NULL, 5),
(7, 'sunt', NULL, 2),
(8, 'blanditiis', NULL, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `text` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `text`, `user_id`, `post_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'qwewer231', 'asdfasdf', 13, 7, 0, '2019-12-29 18:03:06', NULL),
(2, 'Иван Ярмолюк', 'Dzdgv', NULL, 7, 0, '2019-12-29 18:07:21', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(1500) NOT NULL,
  `slug` varchar(2000) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(150) NOT NULL,
  `description` varchar(700) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `is_featured` int(1) NOT NULL DEFAULT 0,
  `created_at` varchar(30) DEFAULT NULL,
  `updated_at` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `date`, `image`, `description`, `category_id`, `user_id`, `status`, `views`, `is_featured`, `created_at`, `updated_at`) VALUES
(7, 'non voluptatem ab omnis omnis beatae quisquam', 'non_voluptatem_ab_omnis_omnis_beatae_quisquam', 'Quia adipisci eum voluptatibus est et. Hic reprehenderit omnis illo rem occaecati et eius. In eaque nulla aut voluptas et. Possimus deserunt quibusdam qui molestias veniam necessitatibus necessitatibus.\n\nQuasi explicabo nisi et minima quae nisi. Nemo non quidem similique non enim qui. Libero animi non ut delectus perferendis sed voluptatem. Ut optio omnis dolorem consequatur vel.\n\nEt omnis alias voluptates sit. Dolores quam modi natus fugit corrupti nesciunt.\n\nVoluptatem ut consequatur ratione quibusdam exercitationem officiis. Animi neque explicabo ut cumque est fugit. Voluptas quas quod repellat.\n\nMagni occaecati atque et voluptatem labore eum corrupti. Ut est sunt ut quis. Natus vitae fuga ut doloremque quis ipsum dolores rerum.\n\nUt ut porro deleniti sunt modi delectus. Aliquam magnam impedit sit voluptatum molestias reiciendis. Quam exercitationem harum numquam ducimus voluptatem eum. Neque iusto officia et blanditiis nesciunt illum ut.\n\nCupiditate modi dolor eum quae. Hic quia est aut sunt dolorem fugiat alias. Voluptates repellendus omnis id. Provident molestiae vel nobis rerum et.\n\nConsequatur aliquam quidem sit sunt deleniti quas nemo est. Maxime doloremque libero dolore dolore voluptatem. Impedit ducimus officiis nam corrupti assumenda nihil. Aut sunt eveniet animi dicta.\n\nEst expedita est ratione cumque sint iure. Qui fugit vero cumque facilis dolorem itaque. Consectetur velit pariatur ut.', '2019-12-29 17:04:18', '5e08c071d9dd6.jpg', 'est quisquam fugit non ut eveniet laboriosam non accusamus quia aspernatur blanditiis quo aut mollitia', 8, 13, 0, 2, 0, 'December 29, 2019', NULL),
(9, 'libero est sequi exercitationem consequatur nam illum', 'libero_est_sequi_exercitationem_consequatur_nam_illum', 'Recusandae fuga autem cumque dignissimos autem optio. Numquam officiis expedita nulla quam asperiores. Cum et voluptatem aut voluptatem.\n\nNesciunt et est veritatis. Enim repudiandae deleniti ratione maxime facilis et.\n\nNatus tenetur harum corrupti maiores ad fugit. Sit deserunt modi et aliquid nihil nemo aliquam. Amet unde culpa explicabo iusto occaecati ut.\n\nCupiditate illum illo ea qui. Sunt cumque aut quo ut cupiditate.\n\nUllam odio voluptatum amet enim dicta facere. Vitae delectus sint ipsum eos accusantium minus. Corrupti nihil eveniet aliquam quia sit repudiandae.', '2019-12-29 18:14:01', '5e08d0c99b55b.jpg', 'quia commodi excepturi nisi qui tempore omnis rerum amet et dolorem id nisi omnis molestiae ullam sed id tempora eligendi animi aperiam corporis laboriosam aut hic et totam voluptas repellendus quos pariatur nobis suscipit ullam excepturi totam assumenda accusamus amet enim quidem omnis ut est temporibus praesentium amet eum saepe', 6, 13, 0, 1, 0, 'December 29, 2019', NULL),
(10, 'nihil eos eos quidem voluptas perferendis quas', 'nihil_eos_eos_quidem_voluptas_perferendis_quas', 'Voluptatem quam exercitationem qui quia laborum omnis accusamus. Quo ut tempore sunt debitis voluptatem. Eos beatae perferendis quae cupiditate dicta.\n\nEos eos quos id modi nisi. Quia fugit reprehenderit minima animi qui voluptatibus placeat quam. Officiis saepe laborum accusamus dolorum id vitae inventore nisi. Id vero quis voluptatem quod sit fugiat aspernatur dolores.\n\nEnim eum qui est ipsam rerum doloremque provident. Vitae quod sed assumenda id voluptate ipsum vero. Necessitatibus minus vel et est est in ad.\n\nCorrupti modi tempore est eos voluptatum voluptatem doloribus enim. At esse rem officiis consectetur. Molestiae sint hic quis praesentium error id in.\n\nEius vel accusamus facilis non sit eos. Molestiae eum vero autem placeat officiis.\n\nNihil consequatur distinctio repudiandae expedita. Natus aut aperiam numquam quia eaque quam. Molestiae placeat voluptates quaerat ea qui officiis aut.\n\nNesciunt architecto voluptatibus eos animi. Aut debitis qui sunt consequatur rem. Est architecto sint corporis animi mollitia et aut. Mollitia adipisci omnis quia qui exercitationem neque.\n\nCum sed sint quia dolorem ut. Ipsum delectus velit repellendus sed.', '2019-12-29 18:15:09', '5e08d10d68bc7.jpg', 'dolores illum ducimus et error voluptatem quod mollitia dolor sunt similique ea animi facilis vero odit et nam corrupti dolorem pariatur incidunt quia debitis quasi reprehenderit iusto et ut odio rerum rem ut iste porro sit occaecati deserunt ut quae cum quas ut reprehenderit at non totam sequi voluptatem adipisci', 8, 13, 0, 0, 0, 'December 29, 2019', NULL),
(11, 'omnis iusto consequatur ab nesciunt temporibus assumenda', 'omnis_iusto_consequatur_ab_nesciunt_temporibus_assumenda', 'Architecto voluptas necessitatibus consequuntur sit aperiam. Eaque voluptatem autem id doloribus commodi iste magni sequi. Rem quia quidem quas delectus. Officia consequatur et libero libero ad repellendus.\n\nUnde adipisci harum ut. Omnis excepturi nesciunt nam ipsam. Maxime qui maiores error nulla sunt voluptatem vero. Saepe pariatur illum dolorem labore. Tempore accusantium aut inventore vel tempora atque.\n\nEnim quo aut recusandae. Corporis repellendus ut qui. Possimus repudiandae tempora cumque porro tenetur. Amet laudantium rerum eveniet praesentium quidem minima.\n\nRerum omnis tempore provident ratione provident. Qui incidunt odio ex est maxime laborum explicabo. Iste est animi excepturi et qui et nostrum.\n\nAd corporis animi non sapiente temporibus et. Quibusdam minima veritatis et saepe et. Consequatur quae sed sed qui. Est illo iure aut quibusdam mollitia repudiandae.\n\nEum et sit blanditiis debitis. Ducimus doloribus veniam magnam repellendus iure. Saepe odio velit occaecati recusandae facere dolore.\n\nNobis eos ad optio non nulla inventore. Eos porro illum ut repellendus eveniet atque rem. Neque error placeat facere. Atque ad iste quidem quaerat laboriosam eius qui.\n\nEius est aut voluptatem dolor iusto. Aperiam soluta maxime recusandae. Aperiam corporis illo veritatis labore velit. Aut odit officiis iusto non sunt temporibus.\n\nExplicabo sit molestiae et sit facere voluptatum. Nisi quod repellendus dolorem voluptatem. Odio voluptatum aut ullam exercitationem quia aliquid. Nobis optio facilis id omnis vel.\n\nPerspiciatis voluptatibus et quis. Non consequatur odit quam illum suscipit.\n\nQuos enim quia dignissimos vero aspernatur aut optio. Perferendis quod quam neque. Repellat qui in ut ipsam ut qui expedita.\n\nExpedita molestiae ullam quo vel neque quos. Rem at labore error sed aut perspiciatis. Praesentium possimus ut libero aperiam. Illo aliquid repellat porro aperiam.\n\nVel hic aut a harum. Voluptatum quia dolorem iure hic praesentium a. Hic et ut ullam.\n\nSed labore adipisci ex. Minima aut ipsam enim nemo perferendis.', '2019-12-29 19:16:45', '5e08df7dba420.jpg', 'omnis consectetur quasi aliquam quae optio explicabo porro temporibus voluptates at eaque exercitationem fuga eaque iure vel corporis cumque reprehenderit ipsum inventore odit iste nemo fugit sed sed accusamus in sequi in fuga voluptatum totam magni ipsa nulla qui excepturi culpa fugit ratione voluptate eum sed aperiam exercitationem excepturi rerum', 1, 13, 0, 0, 0, 'December 29, 2019', NULL),
(12, 'inventore sint vel esse saepe expedita occaecati', 'inventore_sint_vel_esse_saepe_expedita_occaecati', 'Pariatur autem quo ut alias. Omnis necessitatibus culpa doloremque dolores. Recusandae voluptatum hic reiciendis qui in. Dolor voluptas sed placeat harum reprehenderit non qui. Ut in in labore vero maiores similique omnis enim.\n\nCulpa quo consectetur cum vel. Est voluptas accusantium natus fugiat ut. Ut ab ipsa doloribus placeat natus. Unde aut nam dolor distinctio.\n\nNon molestias et fuga. Quis magnam rem ut et. Delectus nemo voluptatum autem aspernatur exercitationem enim soluta reprehenderit.\n\nMolestiae alias reiciendis aut consequatur explicabo aut consequatur. Quia praesentium ea explicabo repellendus ad distinctio. Iste eos et adipisci quia sint iusto. Earum sit quia dolor nobis eveniet ipsum aspernatur.\n\nNon nobis perspiciatis iure deserunt. Nihil neque consequatur dolor.\n\nAlias sunt qui repellat sit molestias labore dignissimos. Adipisci illum occaecati sapiente perferendis rerum provident ex sit. Eos cumque enim nulla et itaque magni sed exercitationem.\n\nDeleniti non voluptatem corporis et maiores sapiente. Excepturi aperiam harum tempore unde odit. Voluptatem porro soluta itaque quos. Exercitationem voluptatibus voluptas eos beatae.\n\nEst quis cupiditate sunt perferendis repudiandae esse deleniti. Nam omnis exercitationem omnis quos. Voluptatem quibusdam ab et sed dolore velit sequi libero. Quia recusandae fugiat omnis dolor aut delectus.\n\nSint alias libero perferendis aut. Magni sed ea voluptas rerum tenetur voluptatibus et. Fugiat nobis expedita doloremque unde optio repellendus.\n\nExcepturi blanditiis nobis dignissimos facilis est. Sunt nemo recusandae architecto quo minima porro. Voluptatum neque harum praesentium eius dolor. Assumenda aspernatur totam dolore omnis sed quisquam inventore. Sint ipsa voluptates ad.\n\nAutem eos ut et culpa. Et placeat reprehenderit voluptas delectus eius culpa. Accusantium nisi eum aut perspiciatis reiciendis consequatur.\n\nNam beatae totam aliquam inventore odit. Non voluptatem in ut et perspiciatis esse eaque sint. Maxime magni tenetur quo asperiores dolor vero saepe.\n\nSoluta iusto qui quasi. Sunt voluptas aliquam pariatur distinctio voluptatibus. Rerum eaque quia eligendi vitae est omnis. Rerum aut quia et porro voluptatum.\n\nVoluptas distinctio eius expedita et. Neque adipisci aut accusantium qui impedit architecto.\n\nAccusamus veritatis omnis iusto nihil quo magni. Dolor veritatis culpa libero occaecati sunt aperiam enim enim. Rem aut ut aut praesentium.\n\nAut enim iusto qui sapiente aspernatur. Unde architecto unde veritatis nisi est ducimus. Dolor est sunt facilis quas et occaecati eius.', '2019-12-29 19:18:26', '5e08dfe2843d5.jpg', 'sit quia rerum neque a facilis ad aut eum quo debitis minima rerum sit ut odit qui sint deleniti dicta sint inventore quia soluta ipsa et deleniti in sint et est dicta velit ducimus molestiae non officiis minima eaque alias deleniti voluptate minus blanditiis itaque nihil eum voluptas dolore deserunt', 8, 13, 0, 1, 0, 'December 29, 2019', NULL),
(13, 'accusamus laboriosam voluptas fuga quos delectus est', 'accusamus_laboriosam_voluptas_fuga_quos_delectus_est', 'Rerum enim amet quisquam distinctio et sunt molestiae. Cum distinctio ducimus et iusto omnis nulla. Ab perspiciatis sed quasi nostrum voluptas repellendus. Dolor magnam suscipit illo eligendi.\n\nVelit molestiae ut ipsa necessitatibus minima excepturi. Ea enim ab modi ex. Quibusdam molestiae et molestias ut reiciendis architecto quia consequatur. Vero molestiae nisi voluptatem architecto consequatur expedita nemo.\n\nVitae nisi sed rem et. Voluptas voluptas quo sint porro autem molestiae. In unde ducimus quia asperiores. Et voluptatem fugit et et.\n\nQui quae voluptatibus fugit et. Qui perspiciatis voluptatem recusandae nesciunt alias dolorum quo asperiores. Quibusdam ullam eum dignissimos esse autem in sed.\n\nEx quia a et deserunt. Numquam voluptates voluptatibus vero sit beatae. Iste eum mollitia commodi.\n\nVoluptatum error iure illum est vitae consequatur aliquid. Nesciunt sit ducimus et est similique omnis ratione ipsam. Consequatur perspiciatis sit impedit quisquam ab beatae explicabo.\n\nSoluta veniam voluptatem quidem quos veritatis aliquid. Minima ea alias et commodi autem reprehenderit vel placeat. Molestias necessitatibus dolorum optio.\n\nPorro officiis ut quod provident non inventore nihil aut. Excepturi eos molestias itaque earum ut laudantium quia natus. Molestiae ex explicabo sit ipsam. Mollitia temporibus illo sunt maiores.\n\nIure iste pariatur temporibus sed qui magni magnam. Et provident fugiat eveniet sint similique. Et eum deleniti deserunt dolores.\n\nVoluptates veniam cupiditate necessitatibus omnis. Aut consequuntur consectetur magnam eius necessitatibus omnis laudantium. Fugit sunt vero temporibus eveniet explicabo qui voluptas voluptas.\n\nDoloremque atque modi occaecati reprehenderit vero necessitatibus voluptatem. Aspernatur officia vel facere dolorem delectus similique voluptatem odio. Aut quia vel autem explicabo.', '2019-12-29 19:19:25', '5e08e01d32980.jpg', 'corporis vero quod eius temporibus nesciunt autem odit est in consequatur odit sed assumenda quos quos rerum voluptatibus quisquam repellendus occaecati quia unde quod iste animi et atque aut voluptas voluptate sapiente voluptatibus repellat ut aut tempore nihil minus et corrupti quisquam ut explicabo debitis iure praesentium sit aspernatur et', 6, 13, 0, 0, 0, 'December 29, 2019', NULL),
(16, 'ex earum voluptas porro a non et', 'ex_earum_voluptas_porro_a_non_et', 'Dolorem et quae ut et odio ut occaecati. Dicta quae maiores ea. Eum alias minima vero dignissimos.\n\nRecusandae et consequatur aut ut qui. Nam qui consequatur iure possimus reprehenderit quod accusamus repudiandae. Doloremque consequatur quas distinctio in autem. Beatae enim exercitationem quo sint officia est.\n\nConsequatur nisi et quo doloremque. Eligendi est eveniet dolorum aliquid aut eum. Ducimus nobis deleniti inventore sint.\n\nEst iure natus nam. Facere quos minima aliquam aut atque corrupti. Voluptatem illo voluptas voluptatibus temporibus reiciendis officia.\n\nDolor quam perferendis quia laboriosam. Accusantium necessitatibus dignissimos dolores voluptatibus. Labore dolorem assumenda minima aliquid esse. Corrupti beatae omnis dolorem magnam quas odio.\n\nNam temporibus eveniet fugiat magni voluptatem. Maxime fuga suscipit sed qui assumenda. Ut dolor et dolores a. Nemo vel voluptatem dolor dicta.\n\nSoluta corporis ut et vel. Autem nihil dolor nemo quae quia sed. Rem temporibus quisquam ad voluptas voluptatem est fugit. Ex eveniet quia eligendi et.\n\nIpsam incidunt labore assumenda. Provident repudiandae vitae perferendis nobis consequatur. Sint aut delectus inventore sed itaque quibusdam earum. Dolorem tempora atque magnam qui magni et.\n\nUnde porro ut voluptatem non natus et. Officiis soluta necessitatibus quae aut eos a. Quae possimus sint maiores maxime est repudiandae et. Maiores architecto et porro voluptatem occaecati vero quis.\n\nQuas occaecati et unde. Rem rerum magni eius nihil eaque minima. Autem qui velit ut eaque.\n\nAsperiores nihil temporibus temporibus vitae eius eius. Repellat consequuntur hic et dolores. Iste beatae maiores doloribus ipsa voluptas.\n\nModi possimus vel voluptatibus debitis expedita expedita. Nihil numquam eaque id consequatur. Molestiae temporibus ut ut sed.\n\nImpedit sequi ut aut iure non. Ipsam quia reiciendis ut voluptate asperiores facere non.\n\nOptio quam ut molestiae modi. Delectus qui aspernatur debitis necessitatibus dicta rem. Sed minus voluptatibus itaque.\n\nOptio et autem aut est. Sed iusto facilis hic qui. Est similique accusantium quasi quidem sequi ipsa eaque. Ducimus explicabo pariatur at amet similique.\n\nMaxime tenetur qui tenetur. Unde qui est molestiae. Aspernatur pariatur vel enim beatae. Amet voluptatem possimus pariatur consequatur ipsa delectus facere. Rerum fugiat occaecati maxime dolor.\n\nAperiam voluptatem corporis labore velit repudiandae qui nihil molestiae. Quisquam est unde nemo ea dolores veniam. Unde vero non quam commodi veniam. Incidunt sit laborum nemo consequatur non.', '2019-12-29 19:25:48', '5e08e19be2af4.jpg', 'corrupti alias magnam aut et iusto nemo ut perferendis quisquam alias omnis id optio dolor fuga sed perferendis ipsam in incidunt doloribus recusandae mollitia ducimus quos eligendi ea pariatur rerum aspernatur est eos explicabo consequatur et sit natus vel voluptatibus fugiat consequuntur quia doloribus quo voluptas aut ut autem omnis', 7, 13, 0, 0, 0, 'December 29, 2019', NULL),
(17, 'corporis delectus enim voluptatem at ut rem', 'corporis_delectus_enim_voluptatem_at_ut_rem', 'Blanditiis doloremque illo accusantium enim quaerat vitae. Mollitia unde vitae voluptas sequi. Similique corporis nam recusandae rerum ipsam quia. Tempore est delectus est.\n\nMinus voluptatem aut occaecati officia. Facere occaecati labore ea qui minima. Vel similique qui quidem quos similique.\n\nFacere omnis nihil consequuntur corrupti quidem aut laudantium excepturi. Asperiores aut laboriosam aut beatae laborum aut sunt. Sed doloremque ea eos iste quis. Excepturi nulla neque nesciunt ea cum id. Dolorem corrupti quod qui unde delectus amet.\n\nDistinctio ducimus reprehenderit quia amet quasi explicabo ipsum. Et voluptate reiciendis quasi laboriosam rerum. Quaerat amet ad est excepturi quia. Ex impedit sit odio rem ea non eveniet.\n\nEt eos aut voluptas laboriosam ea. Omnis est qui dicta quae. Dignissimos explicabo labore non veritatis voluptas velit. Consectetur a sed et voluptatem assumenda.\n\nAut cupiditate qui illo dicta corporis necessitatibus minima. Modi quisquam sit eaque ipsa fuga harum.\n\nPariatur ad natus harum aut alias molestiae qui. Voluptas est et laboriosam ipsa at ea placeat et.\n\nVoluptatum aut quia asperiores neque vel. Molestias blanditiis ipsam excepturi adipisci vitae eius veritatis. Cupiditate quia vitae dolorum quo quaerat sed. Voluptatum eos mollitia itaque.\n\nTempore ipsum rerum ea. Cumque voluptatum ut vero voluptatem eos pariatur corrupti. In nisi id maxime perspiciatis. Ipsum nobis vel quia assumenda qui iste ea.\n\nAut ut dolorem mollitia nihil iste numquam et. Aliquid temporibus natus sed aut enim et illum nostrum. Exercitationem consectetur sed est magni qui rerum ipsam.\n\nEa saepe eligendi delectus ex ullam est maiores. Earum aperiam aut dolorem consequatur. Quod modi beatae voluptas.\n\nSequi commodi mollitia ea alias nulla deleniti ab. Et quia totam doloremque dolore illum temporibus. Fugiat et perspiciatis aut incidunt est vel. Soluta laudantium repudiandae unde consequuntur omnis optio labore.\n\nMolestias eum explicabo ut quis. Dolor qui praesentium quisquam aliquid eligendi. Aut ipsum ipsum ab ipsum.\n\nEx cum doloremque quos molestias dolor quia placeat. Necessitatibus rerum eos eaque sapiente inventore praesentium.\n\nVeniam delectus quae occaecati. Pariatur occaecati perspiciatis doloribus laborum. Quia a iure magni laboriosam necessitatibus sint. Et quia voluptatum temporibus ut.\n\nPorro officia tempora quo reiciendis. Aut molestiae odit consequatur voluptas. Eaque consectetur fugiat aut aperiam expedita nobis odit.\n\nVeritatis ea exercitationem quod rem molestiae blanditiis. Veritatis assumenda minus voluptatibus. Voluptas nemo dolor sed sunt praesentium. Mollitia modi voluptatibus eaque vel consequatur laboriosam. Et ut et omnis sint soluta et.\n\nCulpa sed non suscipit quas. Necessitatibus sunt nihil in voluptas enim. Soluta voluptas laudantium laborum eligendi. Temporibus esse nihil fugiat consequatur veniam.', '2019-12-29 19:25:50', '5e08e19ecd545.jpg', 'fuga cum voluptatibus enim beatae aut reprehenderit culpa quia consequatur consequatur ut amet nisi sunt sit dolorem aspernatur ut aut cum quas beatae est tempora qui est aliquam deserunt et fugit nesciunt quidem non dolor eligendi et maxime consequatur ut voluptate temporibus nihil dignissimos perferendis veniam eligendi repellendus temporibus temporibus', 2, 13, 0, 0, 0, 'December 29, 2019', NULL),
(18, 'debitis fugiat officia nulla dicta cum fugit', 'debitis_fugiat_officia_nulla_dicta_cum_fugit', 'Minima suscipit mollitia eos nobis esse sunt quam nulla. Repellat eum voluptates officia sed ut dolor. Et rerum magni qui. Aspernatur fuga autem vitae ducimus magnam mollitia voluptates.\n\nRerum commodi nihil itaque est dolorem. Numquam id debitis eos quidem suscipit culpa sit. Earum sunt est omnis dolores.\n\nUt voluptatem voluptate saepe quos animi magni suscipit. Magni culpa atque voluptate quasi voluptate aspernatur quia.\n\nQuasi explicabo dolor pariatur error tenetur modi. Consequuntur laboriosam perferendis odio quas sit. Repellendus ut sapiente quia consequatur saepe sit. Rerum quidem fuga distinctio id omnis.\n\nAutem doloribus aut ipsum cupiditate optio. Doloribus iusto magnam est qui. Dolorem aut nam voluptatem sit velit laudantium. At sequi consequuntur soluta dolorem.\n\nQuasi iste qui sint quasi quo. Aut numquam et sunt quasi qui. Voluptatem laudantium quidem praesentium voluptatibus et praesentium totam deleniti.\n\nLabore quam blanditiis in veniam est itaque. Nihil non quod non. Aspernatur iure repudiandae ab molestiae in consequuntur odit. A nesciunt sed recusandae magnam doloremque.\n\nEnim voluptates minus porro qui placeat deleniti et. Eius eligendi enim temporibus architecto. Voluptatem recusandae maiores quam ipsa commodi labore ex. Aliquam saepe qui soluta cum.\n\nEx excepturi aut ut et quaerat ut. Eos a explicabo asperiores ullam consequatur eligendi. Corporis dolorem consectetur ipsa commodi maxime totam aperiam. Aut enim quia ad et veniam unde.\n\nMolestiae iure sapiente quia alias qui nihil alias. Harum voluptatem maxime facere pariatur occaecati autem. In ex rerum nostrum molestiae a. Voluptatum ad deleniti unde quia esse. Harum soluta aut et rerum et quia et.\n\nFacere rerum doloribus maxime facere voluptatem molestias impedit. Eum praesentium adipisci ipsam quia rem qui cumque quod. Aperiam qui accusamus laboriosam deleniti.\n\nEt suscipit eaque eius rem necessitatibus. Velit omnis et non animi est. Nesciunt officia possimus sit et.', '2019-12-29 19:25:53', '5e08e1a1d5360.jpg', 'reiciendis est suscipit eos ut sint qui rerum sit quae non voluptatum soluta eaque vitae expedita hic voluptas a provident optio sit qui eveniet nihil quos dolores culpa consequatur recusandae eligendi libero est nihil voluptas eum libero in at inventore aspernatur unde at saepe et eum velit non numquam molestiae', 6, 13, 0, 0, 0, 'December 29, 2019', NULL),
(19, 'esse voluptatem autem rerum expedita reiciendis non', 'esse_voluptatem_autem_rerum_expedita_reiciendis_non', 'Itaque consectetur autem officiis doloribus odit voluptas. Et dolorum tempora rerum voluptatem voluptates eum. Nisi animi rerum quam atque perspiciatis ratione quas. Deserunt minima dolore officiis aut inventore inventore est nobis.\n\nPorro et vero et debitis. Aut reprehenderit maxime voluptatem. Ipsa consequatur modi odio quae ipsam et hic. Sit culpa nihil vitae vero harum quo.\n\nSoluta expedita unde illum est eaque. Hic voluptatem ut nesciunt rem. Quasi eos odit id eos. Debitis ipsum voluptas qui minus.\n\nEsse sint est molestias. Eveniet corrupti mollitia fugit eveniet enim molestiae. Nobis eos ut totam quo illum. Qui possimus maxime optio.\n\nModi aliquid delectus porro voluptatum pariatur ipsam est tempora. Eos sit vel totam. Blanditiis facilis dolorem molestiae exercitationem vel. Laboriosam alias qui expedita nemo accusantium eveniet facilis.\n\nVoluptatum rerum et voluptatibus architecto voluptatem harum nihil. Aut nostrum fugiat sint rerum. Incidunt et voluptate rerum autem nostrum ipsa vel placeat. Doloremque molestiae repellendus incidunt et.\n\nAut in reprehenderit at veritatis repellendus et et. Qui excepturi voluptatem nulla nulla. Maiores ut et adipisci ad dolorem. Tempore voluptatem quis quis nostrum et. Reprehenderit dolorem ut in in quia.\n\nAssumenda rerum dolorem ducimus nulla assumenda vel. Dolor accusantium consequatur odio ab sapiente. Ea a impedit quia quod ea provident. Quos quaerat nemo tempore recusandae.\n\nRatione qui asperiores voluptatem sit. Dicta perferendis nihil qui dolore provident quos ea. Natus quam nemo facere quo ut repellendus.\n\nNobis dolorum et pariatur cumque quia et sed sed. Consequuntur rerum eos nisi possimus. Et vitae vel beatae neque quam dolores.\n\nExcepturi qui consequatur dicta neque. Nam nam voluptatem non quo. Veniam voluptatem cupiditate qui sunt ea soluta. Perspiciatis facere enim rerum qui.\n\nNulla consequatur ex et et. Doloribus enim officiis ducimus quisquam fuga amet officiis.\n\nFuga et eligendi et nesciunt qui non. Fuga est voluptas numquam reprehenderit nemo. Delectus minus natus sed ea minus. Illo ducimus quia et nemo quia error.\n\nRepellendus nesciunt sapiente unde et quo. Doloribus harum est suscipit sed vero perspiciatis. Blanditiis aut accusantium commodi sequi. Harum ab porro quidem aut pariatur ullam a.\n\nSapiente in ducimus asperiores iusto cupiditate. Non esse esse possimus doloribus quasi qui corrupti possimus. Et facilis rerum est consequuntur quos quo aut.\n\nRepellendus veritatis nostrum dignissimos aperiam rem accusantium. Nisi quidem aut repellendus. Quo earum qui et labore dignissimos provident et. Fugiat amet architecto nesciunt.\n\nFuga et tempora cum. Autem dolore itaque maiores voluptas minima in consequatur. Aut dolorem excepturi pariatur quidem aliquid velit.\n\nAut eum consectetur animi. Modi consequuntur nam facere quia. Consequatur nihil quia quidem quo quia et.', '2019-12-29 19:25:57', '5e08e1a531343.jpg', 'odit ut maxime aperiam expedita blanditiis dolor blanditiis in iusto nesciunt et possimus fugiat id consectetur excepturi odit ab corporis quos veniam et vel quia consectetur quibusdam mollitia quis quos nihil ex sit eos expedita occaecati impedit amet impedit molestiae perspiciatis unde eum distinctio consectetur illo expedita cum quis veniam', 6, 13, 0, 0, 0, 'December 29, 2019', NULL),
(20, 'commodi possimus debitis non iusto excepturi aut', 'commodi_possimus_debitis_non_iusto_excepturi_aut', 'Aut quae iste aliquid laboriosam animi nam. Rem unde exercitationem fuga totam illum est quas. Aliquam nisi aspernatur reiciendis nesciunt.\n\nNemo impedit facilis aperiam qui non incidunt. Maxime est necessitatibus officiis est. Quae nihil dignissimos eos vero sed suscipit.\n\nEt eum laudantium dolores deleniti sunt veritatis neque possimus. Tempore pariatur molestiae sit quaerat. Omnis esse molestiae repellendus. Et aut enim unde sit.\n\nVoluptas velit sapiente dolor dolor voluptate soluta. In dicta consequatur quis labore et. Quas ea nihil saepe optio voluptatibus impedit. Autem repudiandae reiciendis corrupti occaecati et cum totam.\n\nEnim nihil nobis inventore officia. Odit soluta adipisci sit voluptatem porro. Ut iusto dolores sint est aut. Voluptas dolores quia consectetur et. Rerum facere enim unde eligendi consequatur omnis.\n\nNesciunt a voluptatem non perferendis. Natus voluptates numquam enim fuga. Provident est quo nostrum vitae omnis assumenda nostrum.\n\nDelectus nihil maiores odit maxime. Eum fuga qui optio. Aut facere atque quos voluptas.\n\nDoloremque iusto ut modi voluptatem qui. Aliquam fuga itaque rerum officiis recusandae. Ut provident officiis sit voluptas. Quia qui facere et et neque autem. Est officiis enim dolorem esse numquam optio et voluptatibus.\n\nIste quidem sit et et porro velit. Reprehenderit consectetur vitae maiores corporis id. Error minus aliquam consequatur sapiente autem aspernatur fuga.\n\nQuia rerum cumque voluptate nam et est deleniti. Qui voluptates voluptatum excepturi. Aspernatur harum quae reprehenderit enim nobis officia. Voluptatibus at autem maiores repudiandae et atque corporis.\n\nQuas aperiam maxime dolorum fugit. Est omnis quis et et vero animi. Quia temporibus impedit exercitationem aut facere voluptatem voluptatem. Rerum quisquam nesciunt esse omnis eos.\n\nAperiam veritatis aut quia quam earum quo. Dolor officia tempora occaecati unde.', '2019-12-29 19:26:00', '5e08e1a83c755.jpg', 'blanditiis debitis aut veniam molestias dolor ab et facilis ipsa ut esse provident tenetur quisquam molestiae vitae corrupti quibusdam voluptatibus quo quisquam dolore voluptate sint ducimus est officiis quis rem consequuntur exercitationem sequi esse consequatur in quos est eum blanditiis et eos eius impedit sunt commodi repellendus reprehenderit magnam et', 2, 13, 0, 0, 0, 'December 29, 2019', NULL),
(21, 'accusantium error nihil pariatur dolorem dolor et', 'accusantium_error_nihil_pariatur_dolorem_dolor_et', 'A vel cum quam earum culpa. Odio molestiae sed et laborum facilis et exercitationem atque. Temporibus aut illo nemo eos velit voluptatum ut.\n\nRepellendus repellendus reprehenderit rerum voluptatem. Inventore temporibus illum assumenda vitae quis laboriosam. Suscipit pariatur consequuntur cupiditate inventore reiciendis. Aspernatur consequatur nisi sequi culpa repellendus.\n\nDolorem fugiat in non voluptatem voluptatem. Quia quia consequatur in architecto nemo aut. Qui animi nobis officia maxime ut consequatur. Tempore quia quos tempora et voluptatibus ut.\n\nAt laudantium assumenda pariatur ut ipsa. Exercitationem magnam nihil quia et et vel. Quaerat modi molestias ad nulla. Eaque itaque maiores est et ad provident. At rerum odio omnis.\n\nQuaerat vero et non maxime quis ab eaque totam. Cum porro possimus rerum. Voluptate aperiam dolorem et exercitationem in temporibus. Et illo impedit et ratione aut architecto quia eaque.\n\nTenetur quisquam quia quos sed magni. Perspiciatis est ea optio qui.\n\nQuos voluptas unde aut ex recusandae ut numquam. Doloribus provident et ex impedit sint id et. Perferendis velit consectetur et voluptatem ut dolorem. Rem quo qui numquam impedit excepturi laborum ipsa.\n\nA distinctio itaque inventore atque vel. Similique placeat voluptas ea enim nobis recusandae. Amet placeat blanditiis est voluptatem nobis.\n\nAmet earum nesciunt dolores quo vitae. Laudantium pariatur temporibus modi nam. Quia quia ducimus quia debitis explicabo et rerum culpa.\n\nPossimus ut sapiente nobis voluptatem. Aut quod veritatis provident recusandae suscipit aspernatur assumenda. Dolore possimus labore numquam nemo.\n\nQuas odit quia doloribus. Voluptatem magni tempora alias eius qui nulla. Aspernatur ipsum excepturi qui praesentium facilis voluptatem unde.\n\nProvident vitae voluptate quia dolor. Debitis nostrum sint temporibus eius omnis deleniti et. Molestiae doloremque voluptatem molestias rerum delectus ab nesciunt.\n\nDolor natus doloremque laudantium sit omnis expedita alias. Et est nam ut dolores deserunt minima velit. Voluptatem accusantium quae maiores soluta mollitia. Est placeat quia cupiditate quisquam.\n\nOdit earum libero est repellendus eveniet reprehenderit ab. Quasi et perspiciatis tenetur laudantium consequatur unde enim. Explicabo temporibus aut sed illo repellat eos est. Modi molestiae quam ut dignissimos vero cupiditate.', '2019-12-29 19:26:26', '5e08e1c27bb2e.jpg', 'quam possimus voluptatem eos perspiciatis consequatur perferendis aut et voluptate nihil omnis rem non dolorum molestiae officia voluptatem quidem nihil dignissimos quidem nesciunt saepe laborum sint sunt illo deserunt ullam dolorem eligendi odit in consequatur dolores dolores id omnis blanditiis voluptatem voluptatem et cum soluta eum consectetur praesentium voluptas aut', 5, 13, 0, 0, 0, 'December 29, 2019', NULL),
(22, 'aut in ut repellendus tempore reiciendis numquam', 'aut_in_ut_repellendus_tempore_reiciendis_numquam', 'Esse ut id aut. Aut vero doloribus omnis aut recusandae aut ut. Et sapiente iure eos sed nobis aut voluptatem. Soluta tenetur repellendus veritatis minima et.\n\nMagnam laudantium et et minus. Quibusdam dolor facere provident ut. Minima est omnis labore repellendus recusandae.\n\nConsectetur est ratione sit voluptas et et dolores. Sequi consequatur unde omnis porro quaerat. Sit ut voluptates doloribus id aliquid amet ut. Dolorem et numquam pariatur pariatur porro tenetur adipisci sit.\n\nExercitationem molestiae ipsam rerum quos omnis sint aperiam. Dolores minima sit inventore voluptatem totam voluptatibus eaque. Nesciunt nulla iure voluptatem voluptatem non eaque.\n\nQuisquam sed qui non necessitatibus repellendus quidem ut est. Non quaerat laudantium voluptas aperiam.\n\nVoluptatum magni quos praesentium cumque. Est laborum fuga inventore quasi hic praesentium autem. Non animi et dicta quia.\n\nDistinctio sit labore vel quia dolorem. Rem est odit voluptatem. Non eum veritatis repudiandae error ratione. Pariatur fuga doloremque consequatur quia cumque.\n\nDolore enim debitis error dolore. Ut maxime sit similique reprehenderit sint. Ipsa ipsum sit esse vitae.\n\nLabore odit sunt voluptas error doloribus reprehenderit aut. Incidunt enim minus quasi explicabo. Corporis consequatur molestias qui nam. Quaerat placeat aliquid laudantium et.\n\nEt beatae quis voluptas quos cum accusantium reprehenderit. Sit et non corporis excepturi ex ipsum sit. Aut ipsa illo eveniet sit consequatur.\n\nSed eius et ad. Doloremque voluptas nobis asperiores blanditiis eveniet libero ea. Quos perferendis nihil explicabo recusandae quisquam voluptates cupiditate necessitatibus.\n\nOptio nam et aliquid quae ab. Eos et magnam veritatis ea dignissimos est officia. Et cumque sit facere laborum. Quia neque debitis eveniet qui voluptatem nihil possimus.\n\nIllum velit voluptatem magnam odio. Officiis inventore sapiente dolorem delectus quo et fuga. Laudantium velit doloremque quo expedita omnis.\n\nVoluptatem occaecati ut id beatae quis sed debitis. Assumenda mollitia rerum blanditiis omnis soluta natus.\n\nMinima repudiandae accusantium reprehenderit voluptatum voluptas sunt voluptatibus debitis. Optio in sapiente eius. Sequi libero nihil ut mollitia consequatur voluptas omnis. Qui perspiciatis temporibus rerum voluptatem dolore.\n\nAut deleniti libero qui quis non. Fuga quam rerum maxime minus consequuntur. In quibusdam dolores doloribus corrupti sint repellendus tenetur.\n\nPorro numquam odit in distinctio aliquam. Nostrum atque voluptas sunt. Nemo non aperiam quibusdam et laboriosam rerum in. Autem et voluptate hic ut.', '2019-12-29 19:26:29', '5e08e1c57adac.jpg', 'quos accusamus excepturi voluptas natus hic sunt odio aut earum quo harum quidem quas rem dolore saepe harum voluptatem eum ut ut ipsa laborum culpa nihil commodi repudiandae consequatur ut soluta et eum aut dicta eveniet est vel et ut et distinctio sunt necessitatibus eligendi iste alias ut accusamus accusantium', 8, 13, 0, 0, 0, 'December 29, 2019', NULL),
(23, 'voluptatem temporibus aut sequi quas id voluptas', 'voluptatem_temporibus_aut_sequi_quas_id_voluptas', 'Consectetur et harum at aut similique et. Error nihil occaecati dicta ut odit. Est at officiis expedita ratione a unde. Qui nemo eum incidunt aut distinctio et.\n\nConsectetur dolor hic ut qui delectus qui. Quasi et qui doloribus quia incidunt. Harum sunt odio est vel voluptatum earum enim. Corrupti impedit soluta ut dignissimos laborum.\n\nEt totam occaecati voluptates provident doloremque quibusdam dolores. Omnis voluptas tempore perferendis expedita. Id dolorum reiciendis at architecto temporibus.\n\nEt accusamus ipsum quasi voluptate quas nihil et. Repellat qui rem voluptates perferendis. Voluptas aut eaque id minima quo omnis perspiciatis qui. Aut sit mollitia officia laborum.\n\nMollitia aliquam tempora rem qui voluptas. Voluptatem aut deserunt consequatur vero veniam et adipisci. Et sed repellendus cumque rerum ullam. Quis dignissimos sit earum voluptas sed ratione.\n\nMinima autem consectetur tempore vel est suscipit. A laboriosam est facere ab exercitationem qui nam quo. Facere atque rem perspiciatis perferendis.\n\nIpsam velit ipsa optio aut. Error voluptas sed non minus ut possimus nihil. Iste quasi sequi est aperiam quibusdam cumque.\n\nFuga praesentium quibusdam temporibus quis molestiae libero. Facilis quibusdam dolores nisi sapiente fugit et reiciendis. Molestiae enim expedita quis quasi enim iure explicabo.\n\nQuae ducimus totam a delectus sunt quia nulla. Quibusdam amet libero dolore expedita esse modi. Vitae omnis nesciunt incidunt aut nobis consequatur. Quibusdam totam et illo voluptas expedita perferendis.\n\nVelit in minima ea rerum itaque. Veniam temporibus nisi aspernatur nesciunt quis voluptatem. Provident et iusto doloremque. Vel accusantium quisquam facere voluptatibus voluptatem consequatur.\n\nSequi quae voluptatem asperiores corrupti facere. Labore ea veritatis omnis doloribus temporibus nihil consequatur qui. Est esse sint et dolores et harum dolor nihil.\n\nUt non est a corporis et. Libero illo quod quo odit dolorem explicabo est.\n\nEst vero cum non voluptatem atque ut. Nisi delectus est ea.\n\nReprehenderit assumenda dolores architecto et debitis quae. Nisi voluptatem non est fugit quam at fugiat. Vel ab et facilis nemo natus. Et veniam et et corrupti eligendi similique.', '2019-12-29 19:26:32', '5e08e1c875c5b.jpg', 'ullam rerum dolores exercitationem aperiam eum nesciunt non cum nisi sint numquam voluptatibus sed explicabo et consequuntur dolor modi fugit aut et et reiciendis autem repellat aliquam sunt laboriosam quasi voluptatibus et ut inventore sit totam quibusdam pariatur atque labore deleniti quia beatae necessitatibus architecto ea deleniti repudiandae id dolore', 8, 13, 0, 0, 0, 'December 29, 2019', NULL),
(24, 'harum sapiente possimus expedita ipsam quo in', 'harum_sapiente_possimus_expedita_ipsam_quo_in', 'Quisquam voluptatem nihil ex ut porro. Voluptatem sint id et unde. Asperiores debitis voluptatibus ea aut nam expedita quidem.\n\nEt occaecati magnam voluptatem vel occaecati nihil. Enim maxime vel sunt alias dolores qui. Eligendi ad rerum consequuntur aut laboriosam.\n\nEligendi qui non assumenda quia est magni magni. Animi aut nesciunt enim in aut. In corporis officiis aut quasi ipsam.\n\nLaudantium labore ut temporibus asperiores. Aut ad expedita distinctio assumenda veritatis. In necessitatibus dolorum eveniet earum praesentium officiis ex natus.\n\nBlanditiis iusto repudiandae et culpa autem aut et. Et sapiente quos numquam earum nihil aperiam aspernatur. Delectus odio pariatur totam qui maiores qui et ipsa. Tempora animi mollitia facere perspiciatis ad reprehenderit fuga.\n\nConsequatur est enim nostrum aut dolores. Assumenda qui laudantium fugiat ex. Eaque earum iste iusto voluptas nemo accusantium sit.\n\nHarum dolores eos beatae reprehenderit et dolor. Molestias aut non fuga voluptates velit. Neque sunt qui fugit soluta. Necessitatibus ex voluptatibus omnis consequatur dolor.\n\nAliquid qui et eos distinctio nihil. Placeat aspernatur deleniti aliquam dignissimos. Nobis perferendis possimus quaerat est est porro enim. Voluptatem consequatur possimus quo dolor similique quis.\n\nEligendi non illum quidem et explicabo repellat consectetur. Soluta vel in rerum tempora ut facere. Praesentium sunt assumenda molestias. Aut assumenda architecto maiores modi et iure rerum. Inventore amet ipsam ut.\n\nPariatur voluptas distinctio dignissimos sed explicabo. Id quae totam rem et quidem hic voluptate. Modi aut et doloremque sed dolorem.\n\nA sint officiis voluptatibus repellendus. Fugiat ut consectetur aut dolores odit. Fugit dolores quia sapiente hic ea molestiae.\n\nFugit sed accusamus veniam voluptas et delectus dolores. Corrupti voluptas consequatur provident omnis velit molestias. Quis qui corporis quaerat totam et sint.\n\nVoluptatem est doloribus vero. Illum tempore asperiores aut sint omnis cum. Voluptas nam voluptates est assumenda distinctio repellat et. Dicta occaecati dolorem animi maiores harum pariatur consequuntur. Eos nam sapiente consectetur sunt.\n\nQuas doloribus libero sunt officiis excepturi voluptatum. Sapiente aut exercitationem ea fugiat rem. Illo et enim asperiores veritatis aut quia dolore.\n\nEligendi atque laboriosam autem ex ad sint. Eveniet architecto ut et velit. Accusamus est facilis sed non tenetur incidunt et rem. Saepe est quo totam quia. Expedita sunt nesciunt suscipit ipsum repellat doloremque ratione.\n\nDicta voluptatem ea earum vel nisi. Ut corrupti velit consequatur omnis. Dolor et consequatur rerum accusamus officia tenetur.', '2019-12-29 19:26:35', '5e08e1cb7b309.jpg', 'modi necessitatibus vel fugit ut est quia provident quia velit omnis maxime illum quia omnis est illum quo exercitationem itaque consequuntur molestias consequuntur culpa quidem consectetur esse quasi cum commodi consectetur iure occaecati magnam sint molestiae velit odit esse dolor minus corporis id expedita sunt omnis impedit quae doloremque in', 4, 13, 0, 0, 0, 'December 29, 2019', NULL),
(25, 'expedita fugit optio libero et et harum', 'expedita_fugit_optio_libero_et_et_harum', 'Laboriosam adipisci enim voluptatibus aut fuga provident. Dolor non velit veniam enim qui et sint.\n\nAut ipsum ut neque reprehenderit et porro dicta nobis. Ducimus et quaerat voluptates et quia omnis dignissimos. Ut pariatur aspernatur ut perferendis odio.\n\nEt et voluptatibus minima consequuntur modi. Laborum aut repellendus vero aut amet.\n\nTenetur praesentium magnam ad omnis voluptatibus quis. Dolor incidunt porro quidem reiciendis velit repellendus. Eligendi quibusdam amet quos voluptas doloribus qui eligendi odit.\n\nMolestiae ducimus qui nobis. Libero quo eveniet laboriosam reiciendis. Tenetur iste accusamus mollitia enim nisi sed molestiae. Voluptatem saepe est distinctio est.\n\nAliquid est eum impedit odit illum quis modi velit. Et culpa sit quia. Dolores esse qui cum ipsum odio. Dolores ipsam odit impedit officiis explicabo.\n\nNesciunt dicta in delectus voluptatum perferendis numquam. Possimus sit eum officia incidunt exercitationem. Labore perspiciatis accusamus quis nihil facilis ipsa. Quam quis laboriosam rerum cum similique suscipit facilis.', '2019-12-29 19:26:38', '5e08e1ce82834.jpg', 'voluptatem fugiat eum at quia perferendis maxime debitis et perspiciatis est commodi error quaerat odit vitae distinctio totam aut dolores dolore nostrum cupiditate quas quo sit voluptates sit quo animi ex et qui ut quos ipsum autem aut veritatis sit aut dicta explicabo quibusdam quia ut officiis exercitationem unde delectus', 2, 13, 0, 0, 0, 'December 29, 2019', NULL),
(26, 'et repellendus nihil voluptate occaecati error quasi', 'et_repellendus_nihil_voluptate_occaecati_error_quasi', 'Recusandae officiis consequatur totam eos laboriosam a. Architecto quasi eos exercitationem soluta repudiandae. Nesciunt ad voluptatibus et qui et. Ad repellendus consequatur et architecto fugit quia.\n\nUt molestiae sapiente sunt et atque perspiciatis. Quam consequatur vero nesciunt quia sit adipisci odit. Nulla quis vel nam ipsum fugiat.\n\nEveniet labore tenetur numquam sit. Error culpa illo non molestiae quia. Labore et suscipit sed nam eveniet ipsa quia ducimus. Veniam et accusantium dolorum sit quae.\n\nSit sint voluptatem incidunt. Ipsam similique laudantium illum accusantium. Sit quo aut beatae veritatis aut. Qui rerum eaque quibusdam doloremque enim laboriosam.\n\nQuas asperiores neque non at veritatis ducimus. Facere sunt aut in et. Repellendus fugiat adipisci molestiae veniam.\n\nEa numquam facilis praesentium dicta molestiae. Quisquam eum consequuntur tenetur ipsam odio et. Harum itaque similique et molestiae vel. Ducimus soluta neque quo earum sed et suscipit.\n\nRerum voluptas et error rem et. At maxime illum error. Amet quis quae dolorem autem consequatur mollitia rerum. Non natus tempora amet sint.\n\nEt velit eligendi asperiores asperiores et dolor. Vel occaecati perspiciatis ut ut ipsum esse et doloribus. At commodi esse corporis sint quis sint.\n\nOfficia excepturi itaque voluptas dolorum corrupti sit unde. Consequatur quod temporibus sint corporis.', '2019-12-29 19:26:41', '5e08e1d140ef4.jpg', 'dolor eveniet eos non delectus et voluptas dolorem distinctio qui hic voluptas sunt quia facilis et optio dolorum deleniti sit maiores sit nam nostrum impedit maxime dolores eum commodi quibusdam laborum repellat consectetur nihil necessitatibus accusamus sit omnis vel aliquid ipsam et mollitia error et magnam qui reiciendis beatae enim', 7, 13, 0, 0, 0, 'December 29, 2019', NULL),
(27, 'aut aut culpa et maxime excepturi corrupti', 'aut_aut_culpa_et_maxime_excepturi_corrupti', 'Est nesciunt autem voluptatibus magni incidunt consectetur quia. Placeat aut eligendi deserunt quasi est dolores quam ipsam. Et eum est facere iusto eligendi sit et. Reiciendis rerum aliquid voluptates optio.\n\nVoluptate unde distinctio ex excepturi accusamus. Eaque quam neque culpa quis.\n\nEt nulla aut quos voluptatum eos adipisci corrupti. Deleniti distinctio fugit commodi reprehenderit. Rerum libero dolorem labore sed velit voluptatem. Consequatur ex esse hic qui.\n\nQuo voluptatibus sequi dolores ea at. Quis exercitationem quibusdam omnis voluptatem.\n\nDistinctio quibusdam consectetur deserunt non aut corporis quibusdam. Enim et magni reprehenderit illum.\n\nSit natus suscipit deserunt ratione et fugiat. Maiores sint ea qui iure sit quo eligendi. Unde dolores et nemo aut dolorem quis.\n\nRepellendus quis quis et omnis quo molestiae ad aut. Ad qui enim tempore non repellat aliquid. Reiciendis vero eius aut voluptatem. Autem hic sed non aut.\n\nDebitis voluptas dolores eaque ex. Quo expedita et velit.\n\nBeatae ipsa voluptatem minima veritatis ipsa sit in. Molestiae libero dignissimos hic sint placeat labore. Autem amet aut quia consectetur minima quas. Voluptatem minus expedita placeat illo repudiandae omnis reprehenderit.\n\nLaudantium quis sunt eum sed. Voluptatem dolorem illum assumenda culpa. Exercitationem laudantium aut molestiae commodi aliquid nisi voluptatem repudiandae. Vitae et cumque sed iusto maiores ea ipsum.\n\nEt amet voluptas harum mollitia sed odio odio. Aperiam eius laudantium facilis et odio quia numquam saepe. Dolor dolore ullam illum. Voluptatem delectus voluptatem delectus fugit perferendis libero.\n\nOdit eaque enim eum ad omnis excepturi. Sint ad velit ea et. Nihil eum unde voluptatem sint et vel cumque. Quibusdam sed non ipsum iste.\n\nAut laborum animi qui eius rerum iste aut. Tempore et nobis id nihil delectus non veniam eos. Rerum quia non eius labore hic. In saepe optio aspernatur rerum repudiandae et.\n\nHarum sequi ratione quae voluptatem ducimus laboriosam. Vero laborum odit et cupiditate similique sed perferendis et. Voluptatum sapiente quis consequatur perferendis rerum ea.', '2019-12-29 19:26:43', '5e08e1d3c1661.jpg', 'aut reprehenderit minus quos quidem maxime commodi doloremque ut voluptas veritatis sapiente quod sed iste ea et at ipsa quis voluptatem officia doloribus corrupti illum pariatur nobis quis id fugiat fuga aut amet et aliquid nesciunt animi et in non nam dolores consequatur quisquam ipsa quisquam molestiae voluptatem voluptates rerum', 1, 13, 0, 0, 0, 'December 29, 2019', NULL),
(28, 'veniam fugiat porro provident maxime et deserunt', 'veniam_fugiat_porro_provident_maxime_et_deserunt', 'Optio qui totam consequatur. Corrupti quasi omnis deleniti iste quia eius earum qui. Ut quos beatae consequuntur qui quia necessitatibus perferendis.\n\nPossimus corporis repellat soluta quia voluptatum. Et reiciendis nam libero temporibus et cupiditate. Vero ullam consectetur ratione alias cumque eveniet. Repellat fugiat optio nesciunt eius aut.\n\nRepudiandae nisi accusamus ut est inventore odio exercitationem. Ut dolor vel qui debitis expedita. A tenetur rerum et aut.\n\nIpsa sit odio illum exercitationem nihil doloremque. Sequi et quaerat nihil hic eos. Repudiandae fugit tenetur nam ullam ratione saepe.\n\nCum ullam incidunt quo molestiae fugiat qui odit. Aut nobis voluptas pariatur. Ut consequuntur quia molestiae nihil magnam iure.\n\nSint laudantium sed distinctio natus. Nihil dolor voluptatum est nisi quia beatae quia. Deserunt eius dolorem dicta perferendis cum omnis. Consequatur esse eum sed ut perferendis et illo.\n\nNatus rerum officiis provident eveniet ad reprehenderit aut voluptas. Eos modi odio sunt quasi. Ad odit omnis odio non omnis et consequatur. Vel autem cupiditate quibusdam voluptas aut necessitatibus sit.', '2019-12-29 19:26:46', '5e08e1d683be2.jpg', 'dignissimos sint similique aut eius ipsa nemo neque neque dolorum magnam cupiditate rem rerum nesciunt natus aut voluptatem aperiam est quod dicta quis et ullam culpa unde qui quod illum dolorem ut laudantium qui fugiat explicabo illo veritatis similique ut nostrum et vel dolor dolore rerum et quasi impedit alias', 1, 13, 0, 0, 0, 'December 29, 2019', NULL);
INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `date`, `image`, `description`, `category_id`, `user_id`, `status`, `views`, `is_featured`, `created_at`, `updated_at`) VALUES
(30, 'illo est esse sunt sequi delectus qui', 'illo_est_esse_sunt_sequi_delectus_qui', 'Magni et rerum et et. Enim sed quo asperiores laudantium reprehenderit quos. Sit ut saepe autem debitis voluptatum.\n\nVoluptatum velit commodi explicabo perspiciatis tenetur velit vero. Qui voluptates pariatur debitis ab quaerat earum aperiam. Cumque minima debitis est error quis. Eaque debitis molestiae animi.\n\nMagni expedita et fuga error. Qui provident accusamus qui quia tempore omnis et tempora. Sint possimus ea corporis adipisci. Illo accusantium sit eos sit qui.\n\nEveniet in omnis modi qui et exercitationem. Consectetur rerum et laudantium consequatur minus est. Quo eum enim reprehenderit distinctio sed dolores ullam. Minima veritatis nostrum ea tenetur id animi tempore possimus.\n\nPossimus dolor repudiandae architecto vel vel quia magnam dolor. Ab inventore quia voluptatem assumenda blanditiis aut ducimus ullam. Necessitatibus exercitationem error laboriosam fugit quibusdam. Vero saepe dolores necessitatibus ad rerum eius porro.\n\nRerum non praesentium non repellendus qui omnis. Eos dignissimos ducimus et maiores. Autem qui distinctio voluptate.\n\nUt iusto dolorem quia culpa eum eum. Architecto culpa porro ut fugiat distinctio dolorum voluptas. Aut molestias dolor dolores dignissimos qui aut aut nisi. Quia et consequatur adipisci eos cumque minima dolores.\n\nQui voluptatem laborum dignissimos sed. Labore cum et non praesentium quos. Nihil voluptate quasi veritatis labore aliquam sequi.\n\nVoluptatem corporis eveniet autem. Ut occaecati quia est cupiditate. Aut vero quia nostrum dolor.\n\nQuia provident veritatis enim culpa recusandae et dolore. Quas velit tenetur amet repudiandae. Non quo quo enim perspiciatis eveniet est labore.', '2019-12-29 19:29:19', '5e08e26f66080.jpg', 'in nesciunt voluptas aut perspiciatis recusandae voluptas aspernatur quia et aut qui debitis est accusamus explicabo perferendis et provident nam quisquam illum commodi eligendi rerum omnis blanditiis ut nesciunt incidunt minima ex eos est enim laudantium id sed nisi ipsam consectetur libero animi porro in sint repudiandae aut architecto eum', 6, 13, 0, 0, 0, 'December 29, 2019', NULL),
(31, 'minima molestiae non temporibus ea quibusdam in', 'minima_molestiae_non_temporibus_ea_quibusdam_in', 'Placeat voluptatem quasi quo reprehenderit nesciunt. Ullam sunt dignissimos error magnam vero temporibus. Doloribus dolor minus minima facere repudiandae magnam quis omnis. Recusandae accusantium alias voluptate labore necessitatibus.\n\nQuasi est et in itaque odit nemo. Autem quia cum autem. Nisi ut ratione rerum quos ea vel reprehenderit facere. Dignissimos dolorem cumque quae quo nihil eveniet. Consequatur omnis voluptatibus voluptates non ut quam quas.\n\nEnim voluptatem vitae qui repellat nisi eos eum. Sit odit dolor aperiam. Qui accusantium provident et dolores similique sunt velit. Autem qui vitae libero fuga tempore repudiandae.\n\nSunt eos et illum magnam. Minima architecto quo et ex debitis voluptate voluptas. Aut omnis est quas. Et alias odio et praesentium pariatur quasi. Voluptatem corporis vitae molestiae officia eveniet ut fuga.\n\nVel sit sed at perspiciatis assumenda occaecati. Et maiores nisi voluptatem. Recusandae harum laudantium rerum. Sequi culpa consectetur magni in quaerat.\n\nCum fuga veniam molestiae qui architecto. Sed odit sed dignissimos id quia. Laboriosam non quis vel non quae quae. Quia voluptas repellat molestiae illum rerum dolorem excepturi. In ipsam qui fugiat et sunt ea.\n\nEligendi neque ullam laudantium dolores. Aliquam itaque dolorem rerum molestiae enim. Exercitationem excepturi incidunt quis architecto ab sit. Odit sunt expedita exercitationem odio.\n\nConsequatur sapiente qui et et incidunt. A aut aut earum incidunt reprehenderit dignissimos. Ea aut ratione eligendi officiis est.', '2019-12-29 19:29:25', '5e08e27505d5f.jpg', 'excepturi itaque qui voluptate enim a nobis accusamus itaque accusantium suscipit error in et quis saepe delectus velit repellendus ut rerum reiciendis tempore vel at rerum numquam assumenda sit laudantium fugit maiores sit nihil laboriosam consequuntur provident sapiente mollitia voluptas unde animi dignissimos amet est ratione et est aut nihil', 8, 13, 0, 0, 0, 'December 29, 2019', NULL),
(32, 'in doloribus non eos laborum quisquam aut', 'in_doloribus_non_eos_laborum_quisquam_aut', 'Enim aliquid laboriosam magni fugiat cupiditate. Consequatur dolores amet iste et asperiores veritatis iusto. Dolorem officia ut non iusto quos repellat rerum ipsum. Dolor dolores est nihil.\n\nAut distinctio dolorem iure optio aut maxime doloribus. Optio veritatis enim ad autem numquam maxime ad. Rem est ratione porro ducimus. Laborum magnam veritatis veritatis aut consequatur.\n\nTempore assumenda deleniti consequatur distinctio. Aliquam adipisci molestiae at nulla ipsam. Quos est molestiae quam vero in dignissimos amet. Quis non asperiores nostrum et veniam consectetur sed.\n\nUt velit officia et laboriosam veniam tenetur. Dolorum laboriosam sunt eligendi veritatis labore ullam magnam. Minima suscipit et et.\n\nQui id aspernatur beatae ab. Tempora eveniet nisi qui eligendi. Aut nesciunt est libero voluptatem.\n\nVelit ut temporibus eaque cumque ea tempore. Adipisci distinctio reprehenderit eligendi accusantium. Molestias est expedita magni quia deleniti at. Odio cumque non aut fugit fugit.\n\nQuaerat laborum et voluptatem doloribus provident et in. Porro et quo aut et vel autem incidunt. Distinctio consectetur voluptatum nobis facilis natus ut eaque. Consequuntur voluptas earum est dolores excepturi. Doloremque est quas dolorem error facilis sunt.\n\nAccusamus iusto saepe nihil rerum sunt aut maxime. Ut qui aliquid exercitationem et et.\n\nNeque dolor consequuntur quaerat sed voluptates sint ut rerum. Nihil voluptatem doloremque temporibus enim aperiam. Dolores corrupti voluptates nihil eos corporis autem. Possimus quia voluptas animi.', '2019-12-29 19:29:30', '5e08e279ec8e4.jpg', 'suscipit dolores quasi at blanditiis et autem voluptas dolores commodi voluptas sint consequatur consequatur magnam molestiae dolorem ex tenetur recusandae aliquam est doloribus nostrum velit maxime officia eum iste quo ab non officiis ut amet omnis necessitatibus nulla ratione non nesciunt voluptatem molestiae enim sint officiis eum et molestias fugit', 5, 13, 0, 0, 0, 'December 29, 2019', NULL),
(33, 'voluptas praesentium dolore nisi et autem omnis', 'voluptas_praesentium_dolore_nisi_et_autem_omnis', 'Quibusdam est cupiditate accusantium deserunt. Nesciunt inventore ut iste maxime impedit facere consequatur. Quisquam asperiores ut quos et nostrum officiis rerum. Qui aut officiis sit. Maxime autem eum autem voluptas recusandae sed.\n\nAdipisci minus fugiat eaque quibusdam. Sed perspiciatis quasi voluptatem quam et ipsa autem. Omnis sit et aut cupiditate est explicabo distinctio.\n\nVoluptatibus aut quidem dignissimos natus. Similique nostrum accusamus id tenetur sunt velit eius soluta. Sit voluptatem consectetur earum rem ab quia quis. Qui dolorem sed molestiae ipsum.\n\nDelectus ducimus est praesentium impedit. Earum quia explicabo dolorum.\n\nEt sit omnis hic asperiores. Illo ex dolorum ut ut numquam perferendis numquam. Quibusdam sint qui in adipisci ut qui dolore eveniet. Suscipit nihil possimus aut laboriosam ut.\n\nQui voluptatum neque porro. Sed voluptates dolore rerum impedit culpa. Quasi ea cum qui suscipit voluptatem.\n\nDoloribus sint nemo aliquid atque. Maxime nostrum rem velit ut a. Aspernatur voluptatum perferendis rerum quas non dolor sapiente. Doloremque minima voluptas enim iure impedit.', '2019-12-29 19:29:35', '5e08e27f71ed6.jpg', 'ut sequi voluptatem doloremque voluptatem ut repellendus omnis aperiam quia aut tenetur ut et voluptatem eveniet fuga praesentium eum molestias saepe ea quidem minus quia suscipit officia quia inventore ipsa veritatis et facilis adipisci eos nisi eligendi debitis assumenda amet vel voluptatem aliquid dolorem voluptatem ipsum dolor eaque veritatis magnam', 4, 13, 0, 0, 0, 'December 29, 2019', NULL),
(34, 'inventore non officiis dolorem aut repudiandae aut', 'inventore_non_officiis_dolorem_aut_repudiandae_aut', 'Vel nemo reiciendis corporis. Nostrum sint nihil est culpa. Et explicabo impedit impedit nam ipsa. Quo asperiores pariatur delectus velit in placeat illo.\n\nDolorum a nobis repellat soluta molestiae tempore. Qui rerum illum labore enim quas omnis. Facilis sapiente corrupti iste dolorum velit doloribus.\n\nQuos dolores animi aut praesentium nisi at. Quia veritatis dolorem laboriosam voluptatem id. Occaecati soluta dicta alias porro.\n\nUnde perferendis quaerat aut rerum. Ea neque sit corporis id. Consectetur nemo accusantium sit rem consequatur.\n\nCulpa suscipit quidem voluptatem et. Minus laboriosam consequatur ut sunt. Esse quis molestiae ut assumenda sed sit vitae.\n\nAut aut distinctio excepturi ut accusamus. Atque sunt corrupti deserunt molestias est nisi dolorem debitis. Cupiditate autem quam quis quo at. Enim blanditiis aperiam id saepe quis eos.\n\nItaque neque rerum qui maxime aliquid iusto qui vero. Perferendis quisquam necessitatibus quisquam natus est dolores. Est alias laudantium voluptas. Dolores atque sapiente quos cupiditate sit vero.\n\nSaepe est repellendus omnis et dolorem ex veniam quia. Ducimus exercitationem modi aut voluptatum. Neque beatae voluptate eius ea placeat sint dolor non. Et quia accusamus aut.\n\nIllum numquam aut adipisci ea rem commodi est quisquam. Doloremque dignissimos culpa doloremque expedita libero. Rerum quia assumenda rerum sed est saepe quibusdam.\n\nA rerum illo et maiores amet eius nihil. Facere accusamus sit et doloremque dolorum ipsum. Aut dignissimos sed quae dolorem.', '2019-12-29 19:30:24', '5e08e2b07ce4a.jpg', 'hic quam suscipit autem enim sunt ipsam omnis quos ut non perspiciatis nihil neque itaque omnis sit delectus necessitatibus corporis perspiciatis ex ut nam quia ut optio ut ut blanditiis delectus ut ratione commodi ut architecto rerum fugiat eos ratione deleniti exercitationem repellendus est ut nemo autem magnam labore cupiditate', 3, 13, 0, 0, 0, 'December 29, 2019', NULL);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `postst`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `postst` (
`id` int(11)
,`title` varchar(1500)
,`slug` varchar(2000)
,`content` text
,`date` datetime
,`image` varchar(150)
,`description` varchar(700)
,`category_id` int(11)
,`user_id` int(11)
,`status` int(1)
,`views` int(11)
,`is_featured` int(1)
,`created_at` varchar(30)
,`updated_at` varchar(30)
);

-- --------------------------------------------------------

--
-- Структура таблицы `post_tags`
--

CREATE TABLE `post_tags` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_tags`
--

INSERT INTO `post_tags` (`id`, `tag_id`, `post_id`) VALUES
(13, 4, 7),
(16, 7, 9),
(17, 3, 9),
(18, 2, 10),
(19, 4, 10),
(20, 4, 11),
(21, 6, 11),
(22, 2, 12),
(23, 3, 12),
(24, 1, 12),
(25, 4, 13),
(26, 1, 13),
(27, 5, 13),
(33, 5, 16),
(34, 1, 17),
(35, 2, 17),
(36, 7, 17),
(37, 5, 18),
(38, 3, 18),
(39, 6, 18),
(40, 1, 18),
(41, 4, 19),
(42, 7, 19),
(43, 1, 19),
(44, 5, 19),
(45, 7, 20),
(46, 1, 20),
(47, 5, 20),
(48, 6, 20),
(49, 7, 21),
(50, 5, 21),
(51, 1, 21),
(52, 6, 21),
(53, 7, 22),
(54, 6, 22),
(55, 2, 22),
(56, 8, 22),
(57, 8, 23),
(58, 5, 24),
(59, 5, 25),
(60, 6, 26),
(61, 7, 27),
(62, 2, 28),
(63, 6, 28),
(68, 6, 30),
(69, 1, 30),
(70, 5, 30),
(71, 3, 30),
(72, 8, 31),
(73, 5, 31),
(74, 4, 31),
(75, 6, 32),
(76, 2, 32),
(77, 3, 32),
(78, 8, 33),
(79, 7, 33),
(80, 3, 33),
(81, 4, 33),
(82, 6, 34);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(300) DEFAULT NULL,
  `post_counter` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `post_counter`) VALUES
(1, 'excepturi', NULL, 0),
(2, 'officia', NULL, 0),
(3, 'rem', NULL, 0),
(4, 'quod', NULL, 0),
(5, 'incidunt', NULL, 0),
(6, 'et', NULL, 0),
(7, 'similique', NULL, 0),
(8, 'dolores', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT 0,
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT 0,
  `image` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`, `image`) VALUES
(13, 'coilofluck@gmail.com', '$2y$10$ZHRDt4.qRnstkq.hT2QurOyIoFJFJHOLoUBzqpfoTEsHkxOXdEDrK', 'backster', 0, 1, 1, 0, 1576781950, 1577636003, 1, '5dffd799a442f.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users_confirmations`
--
-- Структура чтения ошибок для таблицы blog.users_confirmations: #1033 - Некорректная информация в файле '.\blog\users_confirmations.frm'
-- Ошибка считывания данных таблицы blog.users_confirmations: #1064 - У вас ошибка в запросе. Изучите документацию по используемой версии MariaDB на предмет корректного синтаксиса около 'FROM `blog`.`users_confirmations`' на строке 1

-- --------------------------------------------------------

--
-- Структура таблицы `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_resets`
--

INSERT INTO `users_resets` (`id`, `user`, `selector`, `token`, `expires`) VALUES
(8, 13, 'CePqBT0zejZI1yqmItek', '$2y$10$SCR4Akn7B3kwI3/cWlNCeevJ9.I2gWJDeajKdc8PIIPyO0MO2as8q', 1576813309);

-- --------------------------------------------------------

--
-- Структура таблицы `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('NHkYFlDy1KwFzFDMIBnGf6T850bbncteSi0OpvoKsFU', 5.0018, 1576791709, 1579210909),
('pOsq7Jsj2C4zT5khub1sHNnK19z7cg4tujStvXp4uew', 5.0018, 1576791709, 1579210909),
('QduM75nGblH2CDKFyk0QeukPOwuEVDAUFE54ITnHM38', 73, 1577636003, 1578176003);

-- --------------------------------------------------------

--
-- Структура для представления `postst`
--
DROP TABLE IF EXISTS `postst`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `postst`  AS  select `posts`.`id` AS `id`,`posts`.`title` AS `title`,`posts`.`slug` AS `slug`,`posts`.`content` AS `content`,`posts`.`date` AS `date`,`posts`.`image` AS `image`,`posts`.`description` AS `description`,`posts`.`category_id` AS `category_id`,`posts`.`user_id` AS `user_id`,`posts`.`status` AS `status`,`posts`.`views` AS `views`,`posts`.`is_featured` AS `is_featured`,`posts`.`created_at` AS `created_at`,`posts`.`updated_at` AS `updated_at` from `posts` where `posts`.`id` = '2' order by `posts`.`id` desc ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Индексы таблицы `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
