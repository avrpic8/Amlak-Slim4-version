-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 10:50 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_ads`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `amount` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `floor` varchar(191) NOT NULL,
  `year` tinyint(5) NOT NULL,
  `storeroom` tinyint(1) NOT NULL,
  `balcony` tinyint(1) NOT NULL,
  `area` tinyint(5) NOT NULL,
  `room` tinyint(5) NOT NULL,
  `toilet` enum('ایرانی','فرنگی','ایرانی و فرنگی','') NOT NULL,
  `parking` tinyint(5) NOT NULL,
  `tag` varchar(191) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `status` tinyint(5) NOT NULL,
  `sell_status` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `description`, `address`, `amount`, `image`, `floor`, `year`, `storeroom`, `balcony`, `area`, `room`, `toilet`, `parking`, `tag`, `user_id`, `cat_id`, `status`, `sell_status`, `type`, `view`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2 واحد آپارتمان در مجموعه آسیا', 'این مجموعه تمام امکانات آپارتمان های امروزی رو داره و خیلی وقته روی اون کار میشه\r\nمن توصیه میکنم اگر قصد خرید خانه دارید حتما سر بزنید و دیدن کنید', 'تهران - خیابان شریعتی - مجموعه آسیا', '42000 تومان', '/images/ads/2020/Jul/17/2020_07_17_10_06_15_87.jpg', 'سرامیک', 127, 1, 1, 114, 3, 'ایرانی و فرنگی', 1, 'مجموعه آسیا, آپارتمان', 1, 2, 0, 0, 0, 0, '0000-00-00 00:00:00', '2020-07-17 12:36:15', '0000-00-00 00:00:00'),
(2, 'خانه ویلای در نیاوران', 'تمام امکانات به روز یک خانه ویلایی مدرن توی این ساختمان پیاده شده و جای بسیار قشنگی برای زندگی کردنه', 'تهران - نیاوران - خیابان گلشن ', '650000 تومان', '/images/ads/2020/Jul/17/2020_07_17_10_06_34_25.jpg', 'سرامیک', 127, 1, 1, 127, 5, 'ایرانی و فرنگی', 1, 'ویلایی, نیاوران', 1, 3, 0, 0, 0, 0, '0000-00-00 00:00:00', '2020-07-17 12:36:34', '0000-00-00 00:00:00'),
(3, 'آپارتمان 65 متری - صادقیه', 'جای قشنگی برای زندگی کردنه', 'تهران - صادقیه - فلکه دوم صادقیه - کوچه آفتاب شرقی', 'توافقی', '/images/ads/2020/Jul/17/2020_07_17_10_07_03_64.jpg', 'سرامیک', 127, 1, 1, 75, 2, 'ایرانی و فرنگی', 1, 'آپارتمان, صادقیه, 75متری', 1, 3, 0, 0, 0, 0, '2020-07-12 13:09:12', '2020-07-17 12:37:03', '0000-00-00 00:00:00'),
(4, 'آپارتمان 80 متری در ایران زمین', 'جای خیلی قشنگی برای زندگی کردنه', 'ارین زمین - مجتمع رویال - بوک A - پلاک 12', 'توافقی', '/images/ads/2020/Jul/17/2020_07_17_11_18_18_70.jpg', 'سرامیک', 127, 1, 1, 127, 2, 'ایرانی و فرنگی', 1, 'آپارتمان, ایران زمین', 1, 3, 0, 1, 0, 0, '2020-07-17 13:48:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ورزش', NULL, '2020-07-09 23:01:44', '2020-07-14 02:14:15', NULL),
(2, 'فرهنگی', NULL, '2020-07-10 00:00:00', NULL, NULL),
(3, 'اخبار مسکن', NULL, '2020-07-10 17:50:39', '2020-07-14 02:13:47', NULL),
(4, 'اقتصاد', NULL, '2020-07-10 17:52:42', '2020-07-14 02:14:02', NULL),
(5, 'فرهنگ و هنر', 1, '2020-07-10 17:53:14', '2020-07-14 02:14:27', '2020-07-14 02:14:38'),
(6, 'test name', NULL, '2020-07-19 00:08:09', '2020-07-19 00:30:28', NULL),
(7, 'Sport', NULL, '2020-07-19 00:15:58', NULL, NULL),
(8, 'سال اول دبیرستان', 1, '2020-07-19 00:16:35', NULL, NULL),
(9, 'Sport', 3, '2020-07-19 01:23:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `status` tinyint(5) NOT NULL DEFAULT '0',
  `approved` tinyint(5) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `parent_id`, `status`, `approved`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, 'test', NULL, 0, 1, '2020-07-11 00:00:00', '2020-07-18 00:09:20', NULL),
(2, 1, 2, 'پاسخ ادمین', 1, 0, 1, '2020-07-13 00:00:00', '2020-07-18 00:09:26', NULL),
(3, 5, 2, 'پست بسیار عالی بود', NULL, 0, 1, '2020-07-13 23:48:26', NULL, NULL),
(4, 1, 2, 'سپاس از شما!', 1, 0, 1, '2020-07-17 15:51:51', NULL, NULL),
(5, 1, 2, 'بازم ممنون', NULL, 0, 1, '2020-07-17 15:53:16', NULL, NULL),
(6, 1, 2, 'باز هم ممنون از شما', 1, 0, 1, '2020-07-17 15:54:46', NULL, NULL),
(7, 1, 2, 'این کامنت تستی است\r\n', 1, 0, 0, '2020-07-17 15:56:46', '2020-07-19 00:32:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) NOT NULL,
  `image` varchar(191) NOT NULL,
  `advertise_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `advertise_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '/images/gallery/2020/Jul/17/2020_07_17_16_56_33_93.jpg', 1, '2020-07-17 19:26:34', NULL, NULL),
(2, '/images/gallery/2020/Jul/17/2020_07_17_16_56_37_93.jpg', 1, '2020-07-17 19:26:37', NULL, NULL),
(3, '/images/gallery/2020/Jul/17/2020_07_17_16_56_41_96.jpg', 1, '2020-07-17 19:26:42', NULL, NULL),
(4, '/images/gallery/2020/Jul/17/2020_07_17_16_56_59_57.jpg', 2, '2020-07-17 19:26:59', NULL, NULL),
(5, '/images/gallery/2020/Jul/17/2020_07_17_16_57_07_54.jpg', 2, '2020-07-17 19:27:07', NULL, NULL),
(6, '/images/gallery/2020/Jul/17/2020_07_17_16_57_12_25.jpg', 2, '2020-07-17 19:27:12', NULL, NULL),
(7, '/images/gallery/2020/Jul/17/2020_07_17_16_57_27_72.jpg', 3, '2020-07-17 19:27:27', NULL, NULL),
(8, '/images/gallery/2020/Jul/17/2020_07_17_16_57_31_37.jpg', 3, '2020-07-17 19:27:31', NULL, NULL),
(9, '/images/gallery/2020/Jul/17/2020_07_17_16_57_36_75.jpg', 3, '2020-07-17 19:27:36', NULL, NULL),
(10, '/images/gallery/2020/Jul/17/2020_07_17_16_57_42_90.jpg', 3, '2020-07-17 19:27:42', NULL, NULL),
(11, '/images/gallery/2020/Jul/17/2020_07_17_17_00_59_48.jpg', 4, '2020-07-17 19:30:59', NULL, NULL),
(12, '/images/gallery/2020/Jul/17/2020_07_17_17_01_13_12.jpg', 4, '2020-07-17 19:31:13', NULL, NULL),
(13, '/images/gallery/2020/Jul/17/2020_07_17_17_01_30_75.jpg', 4, '2020-07-17 19:31:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `title` varchar(191) NOT NULL,
  `body` text NOT NULL,
  `image` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `published_at` datetime NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `image`, `user_id`, `cat_id`, `published_at`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ساخت یک میلیون مسکن از آرزو تا واقعیت', 'به نظر می رسد هدف&zwnj;گذاری مجلس و دولت برای ساخت سالیانه یک میلیون واحد مسکونی، تنها به پشتوانه تزریق پول پرقدرت توسط بانک مرکزی ارائه شده که آن هم با توجه به اثرات مخرب اقتصادی و همچنین نبود منابع لازم قابل تحقق نیست؛ شاید به همین دلیل است که پس از جلسه امروز وزیر با اعضای کمیسیون عمران مجلس، خروجی خاصی درباره نحوه تامین بودجه این طرح به دست نیامد.\r\n\r\nبه گزارش ایسنا، جلسه&zwnj;ای که روز یکشنبه در خصوص نهایی شدن نحوه تامین مالی طرح احداث سالانه یک میلیون واحد مسکن ملی تا ۶ سال آینده منتظرش بودیم، امروز سه شنبه ۲۴ تیرماه برگزار شد. با این تفاوت که نه خبری از تزریق پول پرقدرت بانک مرکزی و نه جزئیاتی از چگونگی مشارکت بخش خصوصی در این طرح اعلام شد.\r\n\r\nامروز نمایندگان عضو کمیسیون عمران مجلس با محمد اسلامی وزیر راه و شهرسازی نشستی را برگزار کردند. پیش از این برخی نمایندگان گفته بودند که طرحی را با همکاری دولت تحت عنوان احداث یک میلیون واحد مسکونی در سال مد نظر دارند. محمودزاده معاون وزیر راه و شهرسازی هم ضمن تایید بر این تعامل، به ایسنا گفت که دولت قصد ورود به ساخت و ساز را ندارد و این موضوع توسط بخش خصوصی انجام می&zwnj;شود. قرار بود یکشنبه ۲۲ تیرماه نحوه تامین مالی این طرح نهایی شود. به هر حال امروز سه&zwnj;شنبه نشست کمیسیون عمران با وزیر راه و شهرسازی انجام شد.\r\n\r\nپس از این جلسه، محمد اسلامی وزیر راه و شهرسازی گفت: طرح ملی مسکن با مدل&zwnj;های گوناگونی تامین مالی خواهد شد که هم&zwnj;اکنون نیز در حال اجراست. در عین حال، این مدل&zwnj;ها با طرحی که در مجلس پیشنهاد شده است می&zwnj;تواند نیاز جامعه به مسکن را تامین کند و التهابات حباب گونه بخش مسکن را که در حال حاضر شاهد آن هستیم، از بین ببرد.\r\n\r\nشاید منظور اسلامی استفاده از ابزارهایی همچون صندوق سرمایه گذاری زمین و ساختمان، صندوقهای سرمایه گذاری املاک و مستغلات، حسابهای امانی، بازار رهن ثانویه، لیزینگ مسکن، توسعه ای شدن بانک مسکن، موسسات پس انداز و تسهیلات مسکن و صندوق پس انداز یکم باشد که برخی از آنها یا اصلاً اجرا نمی&zwnj;شود و یا کارایی چندانی ندارد.\r\n\r\nاین صحبت&zwnj;های وزیر که البته واقع بینانه تر است دست اندازی به منابع بانک مرکزی است نشان می&zwnj;دهد دولت در شرایط فعلی که رسیدن به تورم ۲۲ درصد را هدف&zwnj;گذاری کرده قصد ندارد همانند آنچه در پروژه مسکن مهر دولت های قبلی انجام شد با تزریق پول پرقدرت، تورم مجددی را به جامعه تحمیل کند.\r\n\r\nسید البرز حسینی، سخنگوی کمیسیون عمران مجلس هم که درباره جزئیات جلسه امروز صحبت کرد، به موضوع بازآفرینی شهری و تامین قیر برای راهسازی پرداخت و اشاره خاصی به تامین مالی پروژه های بزرگ مقیاس در بخش مسکن نداشت.\r\n\r\nوی البته گفت: یکی از مسائل مهم اجرای طرح اقدام ملی مسکن است که در این رابطه نمایندگان مجلس نیز طرحی را تدوین کرده&zwnj;اند، از این رو با اجرای این طرح و تولید مسکن امیدواریم که بخشی از التهابات و حباب بازار کاهش یابد.\r\n\r\nساخت یک میلیون خانه در سال واقع&zwnj;بینانه نیست\r\n\r\nمهدی سلطان محمدی - کارشناس اقتصاد مسکن - درباره طرح مجلس و دولت برای احداث سالیانه یک میلیون واحد مسکونی به ایسنا گفت:  تولید یک میلیون خانه در سال نیاز به ۲۵۰ هزار میلیارد تومان نقدینگی دارد. کل بودجه عمرانی دولت کمتر از ۵۰ هزار میلیارد تومان است؛ لذا صحبت از طرح&zwnj;های بزرگ مقیاس مسکن در حد شعار خواهد بود و قابلیت تحقق ندارد.\r\n\r\nوی افزود: دولت به دلیل کاهش درآمدهای نفتی، کاهش صادرات و رکود ناشی از کرونا دچار کمبود منابع شده و نوساناتی که در بازارهای مسکن، بورس، ارز و طلا می&zwnj;بینیم در واقع انعکاسی از خشکی منابع دولتی است.\r\n\r\nبه گفته سلطان محمدی، دولت مجبور است به اطراف شهرها برود که بحث آماده&zwnj;سازی و زیرساخت&zwnj;ها را خواهد داشت؛ لذا در خوشبینانه&zwnj;ترین حالت معادل همین ۲۵۰ هزار میلیارد تومان را باید خرج زیرساخت&zwnj;ها کند. چنین منابعی موجود نیست؛ پس نباید شعارهایی مثل احداث یک میلیون خانه در سال بدهیم که امکان تحقق آن وجود ندارد.', 's:52:\"/images/posts/2020/Jul/17/2020_07_17_10_44_29_50.jpg\";', 1, 3, '2020-07-09 00:00:00', 0, '2020-07-09 23:08:13', '2020-07-17 13:14:29', NULL),
(2, 'تعیین قیمت&zwnj;های دل&zwnj;خواه در بازار مسکن', 'راه های جایگزین برای تعیین قیمت\r\n\r\nدر این بین روز ۲۱ اردیبهشت ماه بنا به دستور قضایی، ممنوعیت سایت های فروش ملک از درج قیمت مسکن اجرا شد. هرچند آمار خرداد نشان داد این اقدام در کنترل قیمت ها تاثیر چندانی نداشته است. از طرف دیگر به نظر می رسد سایت ها برای دور زدن قانون و تعیین قیمت، راه های جایگزین مثل استفاده از فضای مجازی و سایر اپلیکیشن ها را در پیش گرفته اند.\r\n\r\nبر این اساس گروهی از کارشناسان معتقدند با با توجه به گسترش وسایل ارتباط جمعی، حذف قیمت از بازار ها امکان پذیر نیست. مضافاً اینکه برداشتن قیمت، شفافیت را از بازار می گیرد و متعاملین را سردرگم می&zwnj;کند.\r\n\r\nدر سوی مقابل، عده&zwnj;ای دیگر از جمله رئیس اتحادیه مشاوران املاک، هرج و مرج قیمتی در سایت&zwnj;های​ فروش مسکن را از عوامل اصلی التهابات بازار ملک می دانند. مصطفی قلی خسروی می&zwnj;گوید که ممنوعیت نرخ گذاری در سایت ها بازار را در میان مدت به آرامش می رساند.\r\n\r\nکاهش آگهی های مجازی بعد از حذف قیمت ها\r\n\r\nاما از زمان آغاز این محدودیت، مدیران سایتها که به نظر می رسد با کاهش عرضه کنندگان و متقاضیان مسکن روبرو شده&zwnj;اند از این دستور قضایی دلخورند. گذشته از اینکه بعضاً تلاش می کنند با تکنیک های مختلف مثل امکان مشاهده قیمت در آگهی های نشان دار یا استفاده از تلگرام و دیگر اپلیکیشن ها برای تعیین قیمت استفاده کنند، محدودیت نرخ گذاری را برای متعاملین دردسرساز می دانند.\r\n\r\nتا جایی که یکی از اپلیکیشن ها ذیل تمامی آگهی&zwnj;های خود نوشته: &laquo;این موضوع باعث افزایش هزینه&zwnj;های کاربران در جستجو، برقراری تماس های بیهوده و طولانی تر شدن زمان مذاکرات شده که بر خلاف اهداف ما در تسریع و ساده سازی معاملات شما و ایجاد شفافیت در بازار است&raquo;.\r\n\r\nپایین آگهی&zwnj;های یکی دیگر از سایتها نوشته شده است: &laquo;با توجه به دستور مقام قضایی، امکان نمایش قیمت ها وجود ندارد. با پوزش نسبت به مشکلاتی که این اقدام برای شما به وجود آورده، تا پایان این محدودیت ناخواسته، برای اطلاع از قیمت با فروشنده تماس بگیرید.&raquo;\r\n\r\nیک نماینده: سایت ها مجددا نرخ&zwnj;گذاری را آغاز کرده&zwnj;اند\r\n\r\nدر این زمینه امروز یک عضو کمیسیون برنامه و بودجه مدعی شد که نرخ گذاری مسکن و خودرو در سایت ها مجدداً آغاز شده است. رحیم زارع اظهار کرد: سودجویان با سوء استفاده از وضعیت افزایش نرخ ارز و طلا در کشور بار دیگر قیمت گذاری را در سایت ها آغاز کرده&zwnj;اند که این اقدام روی التهاب بازار مسکن و خودرو و افزایش قیمت ها تاثیر گذار است اما قوه قضاییه می&zwnj;تواند با چارچوب تعیین شده خود جلوی افزایش قیمت&zwnj;های یک&zwnj;شبه را بگیرد.\r\n\r\nبه دنبال این سخنان، برخی از سایت&zwnj;های مشهور فروش مسکن را بررسی کردیم که نشان می دهد هم اکنون قیمت ها قابل مشاهده نیست. ممکن است برای مدت کوتاهی مشاهده نرخ ها را امکان&zwnj;پذیر کرده باشند. هرچند با استفاده از دیگر فضا ها و ابزارها اقدام به تعیین نرخ می&zwnj;کنند.\r\n\r\nاز طرف دیگر گزارش های میدانی از دفاتر املاک نشان می دهد با وجود آنکه فایل&zwnj;های متعارف از طرف فروشندگان واقعی به وفور دیده می&zwnj;شود، برخی مالکان تحت تاثیر نوسانات بازارهای ارز و طلا نرخ های نجومی برای املاک خود تعیین می کنند.\r\n\r\nاین در حالی است که کارشناسان معتقدند بخش مسکن علاوه بر اینکه باید نسبت به تحولات، دیر واکنش نشان دهد این بازار را فاقد ظرفیت لازم برای رشد قیمت می دانند؛ چراکه سالهاست توان متقاضیان واقعی پایین این بازار پایین آمده است.', 's:52:\"/images/posts/2020/Jul/17/2020_07_17_10_56_04_54.jpg\";', 1, 3, '2020-07-10 00:00:00', 0, '2020-07-10 18:32:48', '2020-07-17 13:26:05', NULL),
(3, 'بررسی راهکارهای ساماندهی بازار مسکن در کمیسیون عمران', 'یک عضو کمیسیون عمران مجلس شورای اسلامی از برگزاری چندمین جلسه این کمیسیون برای ساماندهی بازار مسکن و راهکارهای کنترل قیمت&zwnj;ها خبر داد.\r\n\r\nرحمت الله فیروزی پوربادی در گفت&zwnj;وگو با ایسنا، ضمن تشریح جلسه امروز کمیسیون عمران مجلس بیان کرد: کمیسیون عمران تاکنون چندین جلسه در خصوص ساماندهی بازار مسکن و راه&zwnj;های مختلف برای شکستن قیمت&zwnj;ها برگزار کرده است. در جلسه امروز نیز حول ساماندهی بازار مسکن بحث و بررسی صورت گرفت.\r\n\r\nاین عضو کمیسیون عمران مجلس در ادامه اظهار کرد: تاکنون راهکارهای مختلفی نظیر ارائه تسهیلات یا موظف کردن دستگاه&zwnj;ها برای ساخت مسکن یا بهره گیری از امکانات مختلف برای ساماندهی بازار مسکن در کمیسیون مطرح شده است.\r\n\r\nنماینده مردم نطنز در مجلس تصریح کرد: ان&zwnj;شاءالله در روز سه&zwnj;شنبه قرار است وزیر راه و شهرسازی نیز در جلسه کمیسیون حضور یابد تا تصمیم نهایی برای ساماندهی بازار مسکن اتخاذ شود. نمایندگان نیز طرحی را برای ساماندهی بازار مسکن آماده کردند که ان&zwnj;شاءالله به زودی نهایی شده و اعلام می&zwnj;شود.', 's:52:\"/images/posts/2020/Jul/17/2020_07_17_10_56_55_51.jpg\";', 1, 3, '2020-07-12 00:00:00', 0, '2020-07-12 15:18:59', '2020-07-19 00:58:15', NULL),
(4, 'اینفوگرافیک / تغییر قیمت مسکن در تهران، از پارسال تا امسال', 'بر اساس گزارش مرکز آمار ایران، درصد تغییر قیمت ماهانه مسکن در خرداد پارسال، ۳/۷ درصد بوده که این رقم در خرداد ۱۳۹۹ به ۱۱/۳ درصد رسیده است. همچنین تورم نقطه&zwnj;ای در خردادماه ۱۳۹۹ به عدد ۴۴/۶ درصد رسیده است و این یعنی خریداران مسکن برای خرید یک واحد مسکونی در شهر تهران نسبت به خرداد ۱۳۹۸ باید ۴۴/۶ درصد پول بیشتری پرداخت کنند. اینفوگرافیک پیش رو میزان تغییرات قیمت مسکن در ماه&zwnj;های مختلف تا خرداد ۱۳۹۹ را به روایت آمارهای مرکز آمار ایران نشان می&zwnj;دهد.\r\nبر اساس گزارش مرکز آمار ایران، درصد تغییر قیمت ماهانه مسکن در خرداد پارسال، ۳/۷ درصد بوده که این رقم در خرداد ۱۳۹۹ به ۱۱/۳ درصد رسیده است. همچنین تورم نقطه&zwnj;ای در خردادماه ۱۳۹۹ به عدد ۴۴/۶ درصد رسیده است و این یعنی خریداران مسکن برای خرید یک واحد مسکونی در شهر تهران نسبت به خرداد ۱۳۹۸ باید ۴۴/۶ درصد پول بیشتری پرداخت کنند. اینفوگرافیک پیش رو میزان تغییرات قیمت مسکن در ماه&zwnj;های مختلف تا خرداد ۱۳۹۹ را به روایت آمارهای مرکز آمار ایران نشان می&zwnj;دهد.\r\n\r\nبر اساس گزارش مرکز آمار ایران، درصد تغییر قیمت ماهانه مسکن در خرداد پارسال، ۳/۷ درصد بوده که این رقم در خرداد ۱۳۹۹ به ۱۱/۳ درصد رسیده است. همچنین تورم نقطه&zwnj;ای در خردادماه ۱۳۹۹ به عدد ۴۴/۶ درصد رسیده است و این یعنی خریداران مسکن برای خرید یک واحد مسکونی در شهر تهران نسبت به خرداد ۱۳۹۸ باید ۴۴/۶ درصد پول بیشتری پرداخت کنند. اینفوگرافیک پیش رو میزان تغییرات قیمت مسکن در ماه&zwnj;های مختلف تا خرداد ۱۳۹۹ را به روایت آمارهای مرکز آمار ایران نشان می&zwnj;دهد.', 's:52:\"/images/posts/2020/Jul/17/2020_07_17_10_58_00_68.jpg\";', 1, 3, '2020-07-11 00:00:00', 0, '2020-07-12 15:20:04', '2020-07-17 13:28:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) NOT NULL,
  `title` varchar(191) NOT NULL,
  `url` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `url`, `address`, `amount`, `body`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'خانه ویلای در نیاوران', 'http://localhost:8000', 'تهران - نیاوران - خیابان گلشن', '650000 تومان', 'تمام امکانات به روز یک خانه ویلایی مدرن توی این ساختمان پیاده شده و جای بسیار قشنگی برای زندگی کردنه. ', '/images/slides/2020/Jul/17/2020_07_17_11_24_57_45.jpg', '2020-07-12 13:53:46', '2020-07-17 13:54:57', NULL),
(2, 'آپارتمان 65 متری - صادقیه', 'http://localhost:8000/ads/3', 'تهران - صادقیه - فلکه دوم صادقیه - کوچه آفتاب شرقی', '650000 تومان', 'جای قشنگی برای زندگی کردنه. جای قشنگی برای زندگی کردنه. جای قشنگی برای زندگی کردنه', '/images/slides/2020/Jul/17/2020_07_17_11_25_24_96.jpg', '2020-07-12 13:54:50', '2020-07-17 13:55:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(191) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `avatar` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT '0',
  `is_active` tinyint(5) NOT NULL DEFAULT '0',
  `verify_token` varchar(191) DEFAULT NULL,
  `user_type` varchar(191) NOT NULL,
  `remember_token` varchar(191) DEFAULT NULL,
  `remember_token_expire` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `avatar`, `password`, `status`, `is_active`, `verify_token`, `user_type`, `remember_token`, `remember_token_expire`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'raminfaramarzi@gmail.com', 'رامین', 'فرامرزی', '/images/avatar/2020/Jul/20/2020_07_20_22_18_41_44.jpg', '$2y$10$TMu34.395SD1GS2JSzT4v.1pDVP2PlA4ejRyvj2/F1wz9An1eqkQW', 0, 1, 'efefaosulchife6tg6fj8f467gft38hr4h89204r937nfyrh', 'admin', NULL, NULL, '2020-07-09 00:00:00', '2020-07-21 00:48:43', NULL),
(2, 'hassan.kh@gmail.com', 'حسن', 'خسروجردی', '/images/avatar/2020/Jul/12/2020_07_12_23_07_23_13.jpg', '$2y$10$nzNQlinmiJ5cVCjzd/8p1Oz3oDDUCY7gaYRWeDjRjTincYh9J1ukq', 0, 0, '1ea43c5ba95f56b295ec6adaf1bdfceeb01784bff9f66ca03cf65e3018b63ca5', 'user', NULL, NULL, '2020-07-13 01:37:24', '2020-07-21 00:48:57', NULL),
(5, 'raminfaramarzi93@gmail.com', 'رامین 2', 'فرامرزی', '/images/avatar/2020/Jul/12/2020_07_12_23_28_50_88.jpg', '$2y$10$aIBlWNYxeGDPRH0UbbslGeIWFtp5BuesiT9.vaw6BsbXs18gIIvei', 0, 1, '3302152ea5fae98fafe616f446dce82dc191a31b9ef31bff1d2cfa538d8ec311', 'user', '8f5955823fad4a89b8ba87632ea32f2e83f00846ef7cc0c1b37c197b4ca43c52', '2020-07-13 00:47:32', '2020-07-13 01:58:50', '2020-07-13 03:07:55', NULL),
(6, 'user@example.com', 'testi', 'testi', '/images/avatar/2020/Jul/19/2020_07_19_23_21_53_51.jpg', '$2y$10$XAlFDQ7J6oaKiwuGU1IRX.lf3sy7maAOXOq3PjPpGuNJuS.YXQ.f6', 0, 0, 'c648d798f99a09c48b5220eabf8f3c5fbf75c95e56c81d50b2b64b944dadb99f', 'user', NULL, NULL, '2020-07-20 01:51:54', '2020-07-21 00:16:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
