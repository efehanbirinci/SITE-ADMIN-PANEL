-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Nis 2023, 16:41:59
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `jetkolay`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(1) NOT NULL,
  `ayar_logo` varchar(250) NOT NULL,
  `ayar_whitelogo` varchar(255) NOT NULL,
  `ayar_titlelogo` varchar(250) NOT NULL,
  `ayar_title` varchar(250) NOT NULL,
  `ayar_description` varchar(250) NOT NULL,
  `ayar_blog_baslik` varchar(155) NOT NULL,
  `ayar_blog_aciklama` varchar(255) NOT NULL,
  `ayar_keywords` varchar(50) NOT NULL,
  `ayar_author` varchar(50) NOT NULL,
  `ayar_footeryazi` varchar(155) NOT NULL,
  `ayar_tel` varchar(50) NOT NULL,
  `ayar_mail` varchar(50) NOT NULL,
  `ayar_ilce` varchar(50) NOT NULL,
  `ayar_il` varchar(50) NOT NULL,
  `ayar_adres` varchar(250) NOT NULL,
  `ayar_mesai` varchar(500) NOT NULL,
  `ayar_maps` varchar(1200) NOT NULL,
  `ayar_analystic` varchar(50) NOT NULL,
  `ayar_zopim` varchar(250) NOT NULL,
  `ayar_facebook` varchar(50) NOT NULL,
  `ayar_instagram` varchar(50) NOT NULL,
  `ayar_whatsapp` varchar(15) NOT NULL,
  `ayar_smtphost` varchar(50) NOT NULL,
  `ayar_smtppassword` varchar(50) NOT NULL,
  `ayar_smtpport` varchar(50) NOT NULL,
  `ayar_bakim` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_whitelogo`, `ayar_titlelogo`, `ayar_title`, `ayar_description`, `ayar_blog_baslik`, `ayar_blog_aciklama`, `ayar_keywords`, `ayar_author`, `ayar_footeryazi`, `ayar_tel`, `ayar_mail`, `ayar_ilce`, `ayar_il`, `ayar_adres`, `ayar_mesai`, `ayar_maps`, `ayar_analystic`, `ayar_zopim`, `ayar_facebook`, `ayar_instagram`, `ayar_whatsapp`, `ayar_smtphost`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakim`) VALUES
(0, '', '', '', 'Jetkolay', 'Jet Kolay kamu kurumlarına, ticari firmalara, şahıslara ihtiyaç duydukları web tasarım, yazılım, kurumsal kimlik, ürün ve marka tanıtım hizmetlerini vermektedir.', 'JETBLOG', 'DİGİTAL İŞLERİNİZ ARTIK JET KOLAY', 'ASDSAD', 'JETKOLAY', 'Jet Kolay kamu kurumlarına, ticari firmalara, şahıslara ihtiyaç duydukları web tasarım, yazılım, kurumsal kimlik, ürün ve marka tanıtım hizmetlerini vermek', '+905013785502', 'jetkolaybilisim@gmail.com', 'İlkadım', 'Samsun', '<p>Saitbey Mahallesi Demirciler Caddesi Vakıf İşhanı No:7 Kat:1 Daire:8 İlkadım/Samsun</p>\r\n', '<p>Pazartesi:&nbsp; &nbsp; 09.00-18.30</p>\r\n\r\n<p>Salı:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;09.00-18.30</p>\r\n\r\n<p>&Ccedil;arşamba:&nbsp; 09.00-18.30</p>\r\n\r\n<p>Perşembe:&nbsp; 09.00-18.30</p>\r\n\r\n<p>Cuma:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;09.00-18.30</p>\r\n\r\n<p>Cumartesi:&nbsp; 09.00-18.30</p>\r\n\r\n<p>Pazar:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Kapalı</p>\r\n', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1498.8853532738854!2d36.32924360978176!3d41.29209452620703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4088773a98f2cecd%3A0x37b4c95581f90d21!2sJetKolay%20Bili%C5%9Fim!5e0!3m2!1str!2str!4v1679726183916!5m2!1str!2str\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'SADSADSAD', 'SADSDSDA', 'sadsasdas', 'dsasadsadsda', '5013785502', 'SAFDSDAFS', 'SADSASDS', 'SADSDASAD', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_ad` varchar(255) NOT NULL,
  `blog_resimyol` varchar(255) NOT NULL,
  `blog_sira` varchar(55) NOT NULL,
  `blog_url` varchar(255) NOT NULL,
  `blog_durum` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_ad`, `blog_resimyol`, `blog_sira`, `blog_url`, `blog_durum`) VALUES
(5, 'Google Adwords Nedir? Faydaları Nelerdir?', '22153.jpg', '1', '', '1'),
(6, 'Dijital Pazarlama Nedir? Faydaları Nelerdir?', '26859.png', '2', '', '1'),
(7, 'Kurumsal Kimlik Nedir?', '24713.jpg', '3', '', '1'),
(9, 'Kep Nedir? Faydaları Nelerdir?', '29506.png', '4', '', '1'),
(10, 'Google Adwords Nedir? Faydaları Nelerdir?', '25198.jpg', '5', '', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(55) NOT NULL,
  `contact_mail` varchar(155) NOT NULL,
  `contact_tel` varchar(11) NOT NULL,
  `contact_message` text NOT NULL,
  `contact_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_mail`, `contact_tel`, `contact_message`, `contact_time`) VALUES
(1, 'Efehan ', 'efehan.birinci61@gmail.com', '5378793061', 'adssadasdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2023-04-01 12:04:21'),
(4, 'Abdulkadir', 'abdulkadir@info.com.tr', '05012345678', 'ASDASDDSASADSADSDASADSDASADSADSADSADSADSAD', '2023-04-01 12:29:20'),
(5, 'Mert Karaman', 'mert@info.com', '05012345678', 'sadsadasdsa', '2023-04-01 17:07:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(250) NOT NULL,
  `hakkimizda_icerik` text NOT NULL,
  `hakkimizda_video` varchar(50) NOT NULL,
  `hakkimizda_vizyon` varchar(1000) NOT NULL,
  `hakkimizda_misyon` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_video`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(0, 'MARKANIZ İÇİN DİJİTAL ÇÖZÜMLER', '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'jeDBZpT7-RI', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

CREATE TABLE `hizmetler` (
  `hizmet_id` int(11) NOT NULL,
  `hizmet_baslik` varchar(55) NOT NULL,
  `hizmet_icon` varchar(95) NOT NULL,
  `hizmet_aciklama` varchar(255) NOT NULL,
  `hizmet_url` varchar(55) NOT NULL,
  `hizmet_sira` varchar(2) NOT NULL,
  `hizmet_durum` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hizmetler`
--

INSERT INTO `hizmetler` (`hizmet_id`, `hizmet_baslik`, `hizmet_icon`, `hizmet_aciklama`, `hizmet_url`, `hizmet_sira`, `hizmet_durum`) VALUES
(6, 'E-İmza', '<i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>', 'E-İmza ile İşlerinizi Kolaylaştırabilirsiniz', '', '1', '1'),
(8, 'E-Fatura', '<i class=\"fa fa-paperclip\"></i>', 'E-Fatura ile İşlerinizi Kolaylaştırabilirsiniz', '', '3', '1'),
(9, 'E-Kasa', '<i class=\"fa fa-inbox\"></i>', 'E-Kasa ile İşlerinizi Kolaylaştırabilirsiniz', '', '4', '1'),
(10, 'E-Arşiv Fatura', '<i class=\"fa fa-share-from-square\"></i>', 'E-Kasa ile İşlerinizi Kolaylaştırabilirsiniz', '', '5', '1'),
(11, 'E-Smm', '<i class=\"fa-solid fa-folder-open\"></i>', 'E-Smm ile İşlerinizi Kolaylaştırabilirsiniz', '', '6', '1'),
(12, 'E-Müstahsil', '<i class=\"fa fa-comment\" aria-hidden=\"true\"></i>', 'E-Müstahsil ile İşlerinizi Kolaylaştırabilirsiniz', '', '7', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL DEFAULT current_timestamp(),
  `kullanici_resim` varchar(250) NOT NULL,
  `kullanici_tc` varchar(50) NOT NULL,
  `kullanici_ad` varchar(50) NOT NULL,
  `kullanici_mail` varchar(100) NOT NULL,
  `kullanici_gsm` varchar(50) NOT NULL,
  `kullanici_password` varchar(50) NOT NULL,
  `kullanici_adsoyad` varchar(50) NOT NULL,
  `kullanici_adres` varchar(250) NOT NULL,
  `kullanici_il` varchar(100) NOT NULL,
  `kullanici_ilce` varchar(100) NOT NULL,
  `kullanici_unvan` varchar(100) NOT NULL,
  `kullanici_yetki` varchar(50) NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_resim`, `kullanici_tc`, `kullanici_ad`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_unvan`, `kullanici_yetki`, `kullanici_durum`) VALUES
(172, '2023-03-14 13:12:06', '', '', '', 'abdulkadir@info.com', '05012345678', '1234', 'Abdulkadir Erdoğan', '', '', '', '', '5', 1),
(174, '2023-03-14 14:57:32', '', '', '', 'efehan.birinci61@gmail.com', '05378793061', '1234', 'Efehan Birinci', '', '', '', '', '5', 1),
(181, '2023-03-15 13:38:33', '', '', '', 'celil@info.com', '05012345678', '12345678', 'Celil', '', '', '', '', '1', 1),
(182, '2023-03-16 08:33:34', '', '', '', 'mertkaraman@info.com', '05012345678', '1234', 'Mert Karaman', '', '', '', '', '5', 1),
(184, '2023-04-01 16:00:17', '', '', '', 'seyfettin@info.com', '05012345678', '1234', 'Seyfettin Kaan', '', '', '', '', '1', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logo`
--

CREATE TABLE `logo` (
  `logo_id` int(11) NOT NULL,
  `logo_resimyol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `logo`
--

INSERT INTO `logo` (`logo_id`, `logo_resimyol`) VALUES
(1, '26899.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referans`
--

CREATE TABLE `referans` (
  `referans_id` int(11) NOT NULL,
  `referans_ad` varchar(255) NOT NULL,
  `referans_resimyol` varchar(255) NOT NULL,
  `referans_sira` varchar(20) NOT NULL,
  `referans_url` varchar(255) NOT NULL,
  `referans_durum` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `referans`
--

INSERT INTO `referans` (`referans_id`, `referans_ad`, `referans_resimyol`, `referans_sira`, `referans_url`, `referans_durum`) VALUES
(4, 'edm', '23551.png', '1', '', '1'),
(5, 'medikal logo', '31058.png', '2', '', '1'),
(6, 'mysoft', '25471.png', '3', '', '1'),
(7, 'turktrust', '26440.png', '4', '', '1'),
(8, 'e logo', '27252.png', '5', '', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(100) NOT NULL,
  `slider_resimyol` varchar(250) NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_url` varchar(250) NOT NULL,
  `slider_durum` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `titlelogo`
--

CREATE TABLE `titlelogo` (
  `titlelogo_id` int(11) NOT NULL,
  `titlelogo_resimyol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `titlelogo`
--

INSERT INTO `titlelogo` (`titlelogo_id`, `titlelogo_resimyol`) VALUES
(1, 'titlelogo.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `whitelogo`
--

CREATE TABLE `whitelogo` (
  `whitelogo_id` int(11) NOT NULL,
  `whitelogo_resimyol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `whitelogo`
--

INSERT INTO `whitelogo` (`whitelogo_id`, `whitelogo_resimyol`) VALUES
(1, 'whitelogo.png');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `hizmetler`
--
ALTER TABLE `hizmetler`
  ADD PRIMARY KEY (`hizmet_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Tablo için indeksler `referans`
--
ALTER TABLE `referans`
  ADD PRIMARY KEY (`referans_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `titlelogo`
--
ALTER TABLE `titlelogo`
  ADD PRIMARY KEY (`titlelogo_id`);

--
-- Tablo için indeksler `whitelogo`
--
ALTER TABLE `whitelogo`
  ADD PRIMARY KEY (`whitelogo_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `hizmetler`
--
ALTER TABLE `hizmetler`
  MODIFY `hizmet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- Tablo için AUTO_INCREMENT değeri `logo`
--
ALTER TABLE `logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `referans`
--
ALTER TABLE `referans`
  MODIFY `referans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Tablo için AUTO_INCREMENT değeri `titlelogo`
--
ALTER TABLE `titlelogo`
  MODIFY `titlelogo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `whitelogo`
--
ALTER TABLE `whitelogo`
  MODIFY `whitelogo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
