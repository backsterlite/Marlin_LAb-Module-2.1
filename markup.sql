-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 14 2019 г., 11:27
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `markup`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `title`, `content`, `date`) VALUES
(11, 'Hello3', 'Hello1', '2019-12-12 08:22:34'),
(13, 'zeus', '1234rf', '2019-12-12 11:42:52'),
(14, 'I am Superman', 'BLA BLA BLA BLA', '2019-12-12 12:27:40'),
(15, 'facere ea sed', 'Sit est est placeat vitae quo voluptatem. Id quasi at deleniti. Qui ratione accusamus ipsa non expedita sed. Eos consectetur labore et accusantium.', '2019-12-13 20:34:57'),
(16, 'eius consequatur quia', 'Dolorem natus qui aut aut. Assumenda est aut totam. Et et quibusdam magnam repudiandae dolorem.', '2019-12-13 20:34:57'),
(17, 'quae ducimus quidem', 'Facere id quia ea error. Temporibus possimus assumenda omnis deserunt ut culpa. Nesciunt unde dolores consequatur harum deleniti cumque omnis. Quia omnis libero dignissimos vero porro officia hic.', '2019-12-13 20:34:57'),
(18, 'ipsa vel iste', 'Voluptatem possimus odio ea culpa est. Officia reiciendis est autem temporibus fugiat qui enim. Asperiores ad ut iure ab mollitia. Sapiente tempore explicabo enim eius similique et facere aut.', '2019-12-13 20:34:57'),
(19, 'illo corrupti quis', 'Accusamus dolorum sequi et vitae laboriosam et. Vitae qui odio ipsa et. Rem quis rem ut harum voluptas esse quam. Maiores ut vel eum.', '2019-12-13 20:34:57'),
(20, 'ab sunt explicabo', 'Cumque sed placeat quisquam fuga nam. Blanditiis eligendi quae odit et eos adipisci. Aut molestias velit dolor. Ullam qui ut laborum et tempora perferendis eveniet.', '2019-12-13 20:34:57'),
(21, 'nam sed eveniet', 'Quia ut recusandae ea labore ut. Beatae laboriosam qui illum natus.', '2019-12-13 20:34:57'),
(22, 'rerum sit est', 'Fuga et provident ipsum fugiat. Optio excepturi ut modi praesentium molestiae placeat rerum. Eaque possimus eius sequi.', '2019-12-13 20:34:57'),
(23, 'quam vitae delectus', 'Minus dignissimos non occaecati veniam ut quidem accusamus. Ut tempora in aliquid quo omnis. Fugiat rerum ratione dolor animi voluptatem eligendi illum.', '2019-12-13 20:34:57'),
(24, 'et qui quae', 'Earum et voluptatum officia nesciunt autem corporis dicta. Autem magni quia qui quia placeat consequatur. Saepe officiis blanditiis dolorem vel voluptas dolores. Ratione sit assumenda quod.', '2019-12-13 20:34:57'),
(25, 'voluptatibus eum molestiae', 'Aut fugiat consequuntur rerum est. Aliquid sequi incidunt aliquam voluptatem sapiente aliquid. Officiis ut deserunt est et doloribus cum.', '2019-12-13 20:34:57'),
(26, 'velit unde ut', 'Qui molestiae consequatur quibusdam tempora natus quos. Quos sit eos et temporibus accusantium maxime tempora. Consequatur tempore in dignissimos est eum possimus vel. Amet quas et hic in.', '2019-12-13 20:34:57'),
(27, 'placeat rerum vel', 'Natus voluptatem dolores est consequatur. Amet dolorem in consequatur voluptatem et aut.', '2019-12-13 20:34:57'),
(28, 'non aspernatur et', 'Quia illo quam et vero vel. Dolores quis corrupti dolore alias cum consequatur. Earum est enim delectus voluptatum illo deleniti beatae itaque.', '2019-12-13 20:34:57'),
(29, 'ut ut expedita', 'Vitae non explicabo et ut ex laudantium eligendi dignissimos. Fuga repellat dolorum rem quae id. Quo explicabo illo rerum quo.', '2019-12-13 20:34:57'),
(30, 'ducimus esse officiis', 'Tenetur et sunt consectetur possimus doloribus alias. Sint quidem autem reprehenderit libero ut repellendus qui. Ut consequatur voluptas provident quam iure architecto recusandae.', '2019-12-13 20:34:57'),
(31, 'culpa et nulla', 'Non dolor ut ipsum nisi dicta possimus autem. Fugiat a mollitia qui labore nisi et sed. Laborum animi porro nihil reiciendis nulla illo. Libero aperiam nobis odio nisi iure.', '2019-12-13 20:34:57'),
(32, 'rerum ea quaerat', 'Numquam iusto in sit culpa. Architecto minima voluptas fuga aliquid officia cumque. Dolore et facilis ab consectetur odio voluptas. At magnam voluptates aliquam quia error expedita deserunt.', '2019-12-13 20:34:57'),
(33, 'molestias omnis necessitatibus', 'Possimus in sit nobis dolore odit. Blanditiis hic id tenetur. Officia consequuntur modi magni facilis sit similique et.', '2019-12-13 20:34:57'),
(34, 'eveniet harum qui', 'Voluptas nihil qui libero inventore ex ut. Omnis culpa eos est aliquid quos maiores. Placeat et deleniti esse ex. Quod tempora veritatis rerum consequatur voluptate cum.', '2019-12-13 20:34:57'),
(35, 'blanditiis consectetur molestias', 'Est pariatur ea ea architecto quisquam magni. Cumque aliquid nulla omnis eos sit incidunt. Dolor molestiae est accusamus ullam inventore.', '2019-12-13 20:34:57'),
(36, 'corporis aspernatur ex', 'Mollitia aspernatur repellendus nobis ipsam omnis sit. Cumque non iste ea dicta. Quia earum qui ipsa rerum libero harum ut.', '2019-12-13 20:34:57'),
(37, 'non sit commodi', 'Et et quaerat accusamus sed est repudiandae. Voluptatibus fugiat architecto doloremque aut. Ea repudiandae consectetur ea et numquam voluptas. Nisi quisquam voluptas corporis et ab.', '2019-12-13 20:34:57'),
(38, 'voluptatem vero consequatur', 'Sapiente eaque aliquid quod consequatur est. Similique libero illo commodi beatae.', '2019-12-13 20:34:57'),
(39, 'autem dolores consequatur', 'Distinctio est fugiat officiis maiores excepturi delectus. Sed corporis molestiae soluta velit. Perspiciatis rerum similique alias aperiam.', '2019-12-13 20:34:57'),
(40, 'est possimus aliquam', 'Dolore tenetur maxime modi incidunt ad exercitationem vero. Nisi aut quia necessitatibus. Aut reiciendis aut aut temporibus. Eius numquam mollitia et labore facere.', '2019-12-13 20:34:57'),
(41, 'eligendi ea quia', 'Est rerum totam ratione eos eveniet quidem porro. Unde magni ut iusto eveniet perferendis ea repellendus. Similique vitae hic ratione distinctio eaque voluptate nesciunt.', '2019-12-13 20:34:57'),
(42, 'sint qui est', 'Et voluptas expedita ut atque dolorum placeat aliquid. Repellat voluptas repellat dolore eum ex quibusdam vel. Dignissimos iusto consectetur in itaque culpa dolorum sit.', '2019-12-13 20:34:57'),
(43, 'adipisci et omnis', 'Est cumque officia incidunt asperiores ea enim. Voluptatem illum ipsum molestias in est. Dolore autem aut aspernatur nulla eos quo vero.', '2019-12-13 20:34:57'),
(44, 'et debitis molestiae', 'Aliquam libero quibusdam non asperiores eos maiores. Quas voluptates repudiandae et fuga autem sed asperiores.', '2019-12-13 20:34:57'),
(45, 'sit a facere', 'Explicabo quasi quos nisi tempore quia. Cumque velit nobis non facilis sint blanditiis delectus. Magnam voluptas ad debitis minus ex.', '2019-12-13 21:27:46'),
(46, 'molestiae ea ut', 'Ipsam quis ea molestiae aperiam sunt iste sunt. Laudantium non quis esse magnam quas. Sit libero minus totam voluptatem amet. In aut illo voluptates distinctio.', '2019-12-13 21:27:46'),
(47, 'similique ipsam sed', 'Sit aliquam vero impedit accusantium quod voluptatibus quo voluptatem. Assumenda ut autem perspiciatis blanditiis. Et sint illo eaque rerum consequatur quas.', '2019-12-13 21:27:46'),
(48, 'earum eum vero', 'Quis accusamus ut et. Aut atque totam asperiores. Quo sunt praesentium cumque delectus pariatur id. Fugit possimus aut expedita dolore sit porro qui.', '2019-12-13 21:27:46'),
(49, 'ipsa qui accusantium', 'Reiciendis minus numquam earum consectetur perferendis modi modi. Illo illo consectetur aut enim fugit voluptatibus excepturi. Harum perspiciatis quam ipsum nisi debitis.', '2019-12-13 21:27:46'),
(50, 'aspernatur quas et', 'Error eligendi dolores distinctio fuga nemo aut. Possimus quos omnis nihil dolores voluptas ut. Repellat quos ut doloribus culpa recusandae. Itaque culpa est error aspernatur sed.', '2019-12-13 21:27:46'),
(51, 'iste a officiis', 'Molestiae eligendi ipsam accusantium facere excepturi. Qui error consectetur natus voluptate dolorem corporis sapiente. Sunt nihil est voluptatibus asperiores expedita.', '2019-12-13 21:27:46'),
(52, 'animi dolor officia', 'Modi quae ea illum sit voluptatem voluptas quis. Sed ea nulla magnam illum recusandae impedit. Sint nihil qui ut eum sint aliquid. Ut dolore pariatur ratione a.', '2019-12-13 21:27:46'),
(53, 'cum et doloremque', 'Enim facere sint similique quo. A qui perferendis sit suscipit possimus necessitatibus voluptatem est. Enim beatae modi non in.', '2019-12-13 21:27:46'),
(54, 'eius sunt omnis', 'Omnis fuga et quas quis architecto dolore. Nemo iste dolore culpa eligendi. Hic dolore aut expedita enim itaque.', '2019-12-13 21:27:46'),
(55, 'quo corporis quas', 'Quod qui delectus autem sit maxime placeat corrupti quisquam. Voluptas nihil natus praesentium architecto voluptates rem. Non voluptatum omnis perspiciatis.', '2019-12-13 21:27:46'),
(56, 'esse autem ea', 'Quia unde est qui libero. Est voluptatem illo velit consectetur minima atque distinctio molestiae. Commodi exercitationem aliquid aut sequi. Cupiditate eligendi ut sequi aut dolore aperiam sit.', '2019-12-13 21:27:46'),
(57, 'id eveniet ipsam', 'Quisquam dolorum voluptatem quia distinctio. Voluptatibus accusantium similique sit. Nisi consequatur optio nobis quia corrupti omnis dolor ea. Possimus rerum qui omnis neque et praesentium.', '2019-12-13 21:27:46'),
(58, 'at et a', 'Nemo possimus doloremque nam illo ut doloribus qui. Vitae est dolorum sit dolores atque. Similique excepturi iure aliquam delectus.', '2019-12-13 21:27:46'),
(59, 'nobis repudiandae consequatur', 'Dolore qui harum et quos est. Ullam inventore voluptas porro quos cum facilis ipsum. Quia aut provident rerum non.', '2019-12-13 21:27:46'),
(60, 'aperiam iusto eos', 'Ut voluptate voluptas quis labore magnam reiciendis. A quam aut ex est omnis sit nobis. Voluptatum natus aut voluptatem voluptate. Asperiores rem adipisci itaque porro accusantium.', '2019-12-13 21:27:46'),
(61, 'illo ea dolor', 'Dolorem aspernatur eius quisquam laudantium porro. Quaerat ut voluptatum eos distinctio dolore officia odit. Vel repellendus est sit qui aut.', '2019-12-13 21:27:46'),
(62, 'fugit impedit minima', 'Asperiores quos dolores sed aperiam magnam. Alias dolorem aspernatur incidunt sit quod. Non fuga fugiat quibusdam quia qui nihil molestiae eum.', '2019-12-13 21:27:46'),
(63, 'quas ipsa accusantium', 'Quisquam ea consequuntur eos tempora aspernatur similique vel et. Aut blanditiis ab quo placeat. In et aperiam et alias a accusamus.', '2019-12-13 21:27:46'),
(64, 'est voluptatem iste', 'Iste quia qui dolor nostrum error amet. Id perferendis omnis architecto id aut itaque. Sit quasi incidunt iure ipsa pariatur. Quia sunt repellat aspernatur. Minus in eum optio voluptas.', '2019-12-13 21:27:46'),
(65, 'voluptatem eum at', 'Beatae ad labore saepe enim provident similique excepturi. Quisquam ut tempora quia doloremque sit sapiente placeat. Quis aut dignissimos voluptatem esse possimus.', '2019-12-13 21:27:46'),
(66, 'deleniti dolore non', 'Facere ut eligendi autem doloremque dignissimos nam. Laboriosam ea repudiandae officiis. Quaerat omnis aut aliquam veniam ea vel id itaque.', '2019-12-13 21:27:46'),
(67, 'odit impedit excepturi', 'Exercitationem voluptas harum aut suscipit nihil quod rerum reprehenderit. Minima eum enim libero inventore. Quo atque ipsum dolorem iste voluptatum.', '2019-12-13 21:27:46'),
(68, 'quam distinctio commodi', 'Sapiente doloribus aut sed sint. Ipsa maxime ex perspiciatis delectus velit. Dolorem alias vero dicta sed voluptatibus. Quasi assumenda blanditiis et.', '2019-12-13 21:27:46'),
(69, 'deleniti facere quasi', 'Veritatis sunt quis quis eveniet id. Odit doloribus ea recusandae dolorem veritatis enim. Et optio sapiente aperiam eos.', '2019-12-13 21:27:46'),
(70, 'eaque repudiandae molestiae', 'Libero est eum vero impedit. Ad illo aliquam ea aut. Impedit commodi officiis est est impedit in. Enim cum totam blanditiis et officiis sunt quas.', '2019-12-13 21:27:46'),
(71, 'ullam culpa expedita', 'Asperiores id harum odit voluptatem aliquid eligendi. Velit ipsam sint necessitatibus reiciendis maiores neque distinctio voluptas. Accusantium pariatur minima accusantium rerum velit eum.', '2019-12-13 21:27:46'),
(72, 'nostrum rem adipisci', 'Maxime suscipit ducimus dolor labore et eum unde. Eos harum est perferendis. Consequatur et ut eius qui assumenda. Omnis ipsam rerum ut voluptas adipisci sapiente illo.', '2019-12-13 21:27:46'),
(73, 'ad aut quia', 'In iste quidem exercitationem reiciendis rerum quia eius. Enim reiciendis quo consequuntur officia harum. Eum dicta inventore occaecati. Commodi voluptates nisi explicabo eum accusamus molestias.', '2019-12-13 21:27:46'),
(74, 'sit omnis est', 'Consequuntur nisi perspiciatis et quidem sed dolorem. Aperiam aut quo modi ut quidem qui. Provident amet quis quaerat veniam recusandae voluptatem magni.', '2019-12-13 21:27:46'),
(75, 'maxime molestiae non', 'Non doloremque et adipisci et. Velit tenetur quam sint ducimus corporis sit deleniti. Doloribus et voluptatem sint. Ea dolores odio cum unde corporis maxime. Eius fuga autem et enim.', '2019-12-13 21:27:51'),
(76, 'nulla molestiae voluptatem', 'Est omnis iure velit iure assumenda. Praesentium voluptatem tempora illum voluptas accusamus. Et temporibus animi adipisci modi rerum. Aut id harum ullam eaque.', '2019-12-13 21:27:51'),
(77, 'maxime vel tempore', 'Qui nihil odit suscipit et explicabo. Natus et est quam praesentium ut.', '2019-12-13 21:27:51'),
(78, 'repellat cupiditate quis', 'Sed non qui facere molestias sint ut. Repudiandae dignissimos qui iste necessitatibus sit nobis nihil. Dolores alias id quis aut. Voluptate eveniet nulla laboriosam.', '2019-12-13 21:27:51'),
(79, 'perferendis pariatur sint', 'Ab voluptatibus sit debitis et qui error qui. A ullam sit enim non corporis quo. Provident consequatur perspiciatis dolorem sit quam enim dolores.', '2019-12-13 21:27:51'),
(80, 'repellat molestias et', 'Harum natus culpa in et eos voluptas. Et iusto cum illo quibusdam sed. At vitae doloribus officia animi illo. Laborum non rem sunt nihil. Sequi aperiam laborum aut sunt quibusdam fuga.', '2019-12-13 21:27:51'),
(81, 'pariatur culpa recusandae', 'Sint cupiditate repellendus molestiae quidem. Similique in voluptas ratione harum error. Animi nobis tenetur deleniti similique nulla voluptas.', '2019-12-13 21:27:51'),
(82, 'commodi sit dolorem', 'Fuga tenetur tenetur fugit ut. Inventore nihil fugiat deleniti ipsa. Minima sapiente sed odio. Omnis eum at aut molestiae quidem.', '2019-12-13 21:27:51'),
(83, 'aut unde esse', 'Corporis facere reiciendis et neque. Minima corporis dolor id aut provident. Suscipit quisquam officia assumenda quas. Alias incidunt impedit consectetur voluptates.', '2019-12-13 21:27:51'),
(84, 'tenetur temporibus rerum', 'Autem et omnis voluptatibus velit a suscipit et. Consequatur quia quae sed modi. Harum omnis enim modi et id. Corporis aut et voluptas voluptatem id sed distinctio quod.', '2019-12-13 21:27:51'),
(85, 'doloribus aut sequi', 'Suscipit illum vero et voluptate ut natus labore. Fuga qui tempore facere et. Voluptas consequuntur atque aut enim ut.', '2019-12-13 21:27:51'),
(86, 'hic officiis repellat', 'Molestiae incidunt harum sed. At ut non perspiciatis similique facere perferendis id. Aspernatur architecto nulla neque autem non quis.', '2019-12-13 21:27:51'),
(87, 'debitis repellendus nobis', 'Ratione vitae explicabo eos ab quod aut assumenda. Ea voluptatem sed cum ab ullam nemo velit. Dolorem eius pariatur porro facilis. Ut vel ab quasi qui tempore mollitia.', '2019-12-13 21:27:51'),
(88, 'quia omnis sapiente', 'Eum porro magni facilis tempore qui molestiae corporis soluta. Quisquam at nulla soluta eum laudantium. Voluptatum soluta et aut autem et vel at.', '2019-12-13 21:27:51'),
(89, 'ut est voluptate', 'Voluptatum ea ipsa quod nobis. Rerum repudiandae error consectetur rem nobis laborum voluptatem. In illum nostrum velit perspiciatis maxime et. Neque a temporibus molestiae.', '2019-12-13 21:27:51'),
(90, 'est consectetur maxime', 'Voluptatem saepe voluptas eos autem qui dolorem. Neque ad odit quis eligendi omnis excepturi qui. Optio quam nihil nesciunt quo quia asperiores alias.', '2019-12-13 21:27:51'),
(91, 'omnis velit et', 'Praesentium ad reprehenderit laborum alias aut facere cupiditate. Dignissimos rerum est qui quam qui qui. Unde voluptas adipisci quia. Consectetur qui reprehenderit enim ea asperiores.', '2019-12-13 21:27:51'),
(92, 'accusantium rem ut', 'Ab aut perspiciatis labore. Minima quam numquam sed omnis quibusdam quia aliquam. Voluptatem ut maxime facilis modi enim. Aut voluptas et qui eaque nam perspiciatis.', '2019-12-13 21:27:51'),
(93, 'dolores saepe occaecati', 'Libero veniam autem sit ex eius. Qui sit rerum cum harum suscipit culpa aut. Et voluptas et aut veritatis aliquid quibusdam eum deleniti. Molestiae rerum adipisci est cupiditate et enim.', '2019-12-13 21:27:51'),
(94, 'distinctio occaecati qui', 'Totam facere impedit nisi sequi et. Consequatur voluptatum voluptatem similique commodi voluptatem molestiae.', '2019-12-13 21:27:51'),
(95, 'quo id eum', 'Et commodi consequatur necessitatibus recusandae est voluptas. Animi eius architecto qui rerum.', '2019-12-13 21:27:51'),
(96, 'recusandae enim fugiat', 'Vero repellat tenetur non voluptatum a odio. Nihil neque ex quod voluptatum. Est inventore unde repudiandae necessitatibus. Odio doloremque et consequatur nisi.', '2019-12-13 21:27:51'),
(97, 'dolores aut autem', 'Quas in est totam voluptates qui provident expedita quam. Omnis nemo perspiciatis esse neque voluptatem mollitia. Veritatis error et voluptates dolores quas.', '2019-12-13 21:27:51'),
(98, 'molestiae et qui', 'Eos quia commodi voluptatem repudiandae aut. Voluptatem illum laboriosam molestiae temporibus officia. Ut et aperiam nam reiciendis quaerat.', '2019-12-13 21:27:51'),
(99, 'assumenda dolor quis', 'Consectetur quam et labore commodi aut. Natus sed facere natus rem. Vero eligendi quisquam ea eum deleniti. Tempora minus ea possimus consequatur enim. Mollitia deleniti voluptatibus quasi et.', '2019-12-13 21:27:51'),
(100, 'illo qui est', 'Cumque non dolorem mollitia aut ratione sed. Quisquam harum est repellat. Commodi et qui tenetur non magni. Inventore similique iste eveniet qui.', '2019-12-13 21:27:51'),
(101, 'quae saepe quas', 'Delectus error voluptatem aliquid atque vel. Doloremque rerum beatae optio dicta facilis qui. Blanditiis quis magni cupiditate porro quo est aut.', '2019-12-13 21:27:51'),
(102, 'corrupti natus et', 'Exercitationem error ipsa et deleniti et qui vel. Eaque velit nisi cumque. Assumenda enim eligendi et alias non sunt dolor.', '2019-12-13 21:27:51'),
(103, 'nisi rerum vitae', 'Enim molestiae reprehenderit aliquid recusandae omnis aliquid molestias. Non ipsa natus totam soluta. Similique quo ipsum tempora. Facilis a velit ipsam quas optio blanditiis accusamus praesentium.', '2019-12-13 21:27:51'),
(104, 'voluptas ut tempora', 'Doloribus esse sunt quas dolor. Voluptas non maxime consequatur amet. Quidem suscipit et non debitis facere nam esse.', '2019-12-13 21:27:51');

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
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(23, 'viktoria@gmail.com', '$2y$10$mcGxPiRjqpoGi6sl..BamO.ta29TiifSn45oOmpQvH8GjrNDqniL6', 'vik', 0, 1, 1, 0, 1576263326, 1576303174, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_confirmations`
--

INSERT INTO `users_confirmations` (`id`, `user_id`, `email`, `selector`, `token`, `expires`) VALUES
(10, 10, 'viktoria@gmail.com', '9QeKcxbZLP2Npqbx', '$2y$10$HgyH42emPGQhOrbZIEEkHuI9BuF0dzkbFutm02GcLDJt1JK5lOzMW', 1576344905),
(9, 9, 'viktoria@gmail.com', 'ZkXogrM1ZUF22sPJ', '$2y$10$nbwdV.M3HqBNBk//HZ04OeiBvWNdgsA8gy6MS9E71JTPLDdgcq1eC', 1576344761),
(8, 8, 'viktoria@gmail.com', 'KhDxn69mAgfs8jNj', '$2y$10$1HrLmxdTz5EQhaTYFiQro.voEjnH5EXBb38z8hfCcZdFup2RFGvhe', 1576344520),
(12, 12, 'viktoria@gmail.com', 'UQ3KqDwUcxlHp0BI', '$2y$10$8YgqtoDilVzwLuI1ZwambumXBTLPwKsUiFGvoxr329MRibvvR85Xq', 1576345302),
(13, 13, 'viktoria@gmail.com', '1so8kU6oroOQErvB', '$2y$10$8OggoCZe3vJPebG0TgbX9uTVYugkXUWsRvfN80YD9gBCzrMhf.F76', 1576347197),
(14, 14, 'viktoria@gmail.com', '_l27-WHPfJ-63Zum', '$2y$10$JeR1vlc9wmgXHLmT0MVH4.Dt6K0S1ZFaGyfgJxoqCMqat0Ohi862u', 1576347361),
(15, 15, 'viktoria@gmail.com', 'j52C9Xh_LxLte4OD', '$2y$10$HXWQigoA9ta.V217EGD28.Q/ddPc9P.EcTy7RFOiFoxRwYEqVEWeC', 1576347430),
(16, 16, 'viktoria@gmail.com', 'F8NpELFyhN92x2N4', '$2y$10$AgnPSm6iYz3Wnx7lb9Gn.OlFIitfNBmjfUpVxlMGTKonVsz2ViGkK', 1576347458),
(17, 17, 'viktoria@gmail.com', 'Q9TzpVYSINIHvh3B', '$2y$10$MhlZW6InFFMVdklA5fFFZu/XuOjq9OQNwDue31YepsCQI2z8DMUwS', 1576348057),
(18, 18, 'viktoria@gmail.com', 'fWzWdhY70ESQSd33', '$2y$10$SDteJo6Jc8CB14k8FrIl6emubfV/FsZFRy8Wzet8.zQLeLPuUSbyq', 1576348879),
(19, 19, 'viktoria@gmail.com', '1lZWwX-QpAM1oTPs', '$2y$10$cq6qPMx0svM7l5SetXuF2.CUHtylScoBkvz9JaiCXrLujopPe4ZDK', 1576348933),
(21, 21, 'viktoria@gmail.com', 'IFrwyZ59EYgTg3sh', '$2y$10$BCuXj/6IrcySM586OgIoteYaIWVKRzkH4hD.6Q40lpZ..plTjW8Vq', 1576349566),
(22, 22, 'viktoria@gmail.com', 'o8bqu2BFvLxiVtKH', '$2y$10$YgNTbrKZ0tNdF7Li9bMnwuCLx8xuz96INQ57YRpmbtFu.aMUPRT9a', 1576349629);

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
('T7y6s_Gs-v_ZxxfSl7U3sEVXi9FMZt2rAvynLABSoYk', 29, 1576263342, 1576335342),
('_tOrzcS52hfcCIJYmN3WxrizFEvWyoat03rXCodoPQw', 29, 1576263342, 1576335342),
('Xp3G4E-nI_XhSTz3JQ33nduZ9xIrgmwNEkzfP9BRLlM', 29, 1576262910, 1576334910),
('fWw4mHeK9DuiNnb127NJsu1_8VFFB0gJGPGHnB44n2Y', 29, 1576262910, 1576334910),
('HIJQJPUQ2qyyTt0Q7_AuZA0pXm27czJnqpJsoA5IFec', 48.6, 1576263342, 1576335342),
('PZ3qJtO_NLbJfRIP-8b4ME4WA3xxc6n9nbCORSffyQ0', 1.00997, 1576263328, 1576695328),
('QduM75nGblH2CDKFyk0QeukPOwuEVDAUFE54ITnHM38', 74, 1576303174, 1576843174);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
