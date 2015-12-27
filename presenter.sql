-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2015 at 04:51 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `presenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `abbr` varchar(10) NOT NULL,
  `ord` smallint(6) NOT NULL,
  `book_group_id` tinyint(4) NOT NULL,
  `testament` varchar(2) NOT NULL,
  `osis_end` varchar(300) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `book_group_id` (`book_group_id`,`testament`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `abbr`, `ord`, `book_group_id`, `testament`, `osis_end`, `status`) VALUES
('eng-KJVA:1Chr', '1 Chronicles', '1Chr', 13, 0, 'OT', 'eng-KJVA:1Chr.29.30', 1),
('eng-KJVA:1Cor', '1 Corinthians', '1Cor', 57, 0, 'NT', 'eng-KJVA:1Cor.16.24', 1),
('eng-KJVA:1John', '1 John', '1John', 73, 0, 'NT', 'eng-KJVA:1John.5.21', 1),
('eng-KJVA:1Kgs', '1 Kings', '1Kgs', 11, 0, 'OT', 'eng-KJVA:1Kgs.22.53', 1),
('eng-KJVA:1Macc', '1 Maccabees', '1Macc', 49, 0, 'DE', 'eng-KJVA:1Macc.16.24', 1),
('eng-KJVA:1Pet', '1 Peter', '1Pet', 71, 0, 'NT', 'eng-KJVA:1Pet.5.14', 1),
('eng-KJVA:1Sam', '1 Samuel', '1Sam', 9, 0, 'OT', 'eng-KJVA:1Sam.31.13', 1),
('eng-KJVA:1Thess', '1 Thessalonians', '1Thess', 63, 0, 'NT', 'eng-KJVA:1Thess.5.28', 1),
('eng-KJVA:1Tim', '1 Timothy', '1Tim', 65, 0, 'NT', 'eng-KJVA:1Tim.6.21', 1),
('eng-KJVA:2Chr', '2 Chronicles', '2Chr', 14, 0, 'OT', 'eng-KJVA:2Chr.36.23', 1),
('eng-KJVA:2Cor', '2 Corinthians', '2Cor', 58, 0, 'NT', 'eng-KJVA:2Cor.13.14', 1),
('eng-KJVA:2John', '2 John', '2John', 74, 0, 'NT', 'eng-KJVA:2John.1.13', 1),
('eng-KJVA:2Kgs', '2 Kings', '2Kgs', 12, 0, 'OT', 'eng-KJVA:2Kgs.25.30', 1),
('eng-KJVA:2Macc', '2 Maccabees', '2Macc', 50, 0, 'DE', 'eng-KJVA:2Macc.15.39', 1),
('eng-KJVA:2Pet', '2 Peter', '2Pet', 72, 0, 'NT', 'eng-KJVA:2Pet.3.18', 1),
('eng-KJVA:2Sam', '2 Samuel', '2Sam', 10, 0, 'OT', 'eng-KJVA:2Sam.24.25', 1),
('eng-KJVA:2Thess', '2 Thessalonians', '2Thess', 64, 0, 'NT', 'eng-KJVA:2Thess.3.18', 1),
('eng-KJVA:2Tim', '2 Timothy', '2Tim', 66, 0, 'NT', 'eng-KJVA:2Tim.4.22', 1),
('eng-KJVA:3John', '3 John', '3John', 75, 0, 'NT', 'eng-KJVA:3John.1.14', 1),
('eng-KJVA:Acts', 'Acts', 'Acts', 55, 0, 'NT', 'eng-KJVA:Acts.28.31', 1),
('eng-KJVA:AddEsth', 'Esther (Additions)', 'AddEsth', 42, 0, 'DE', 'eng-KJVA:AddEsth.7.24', 1),
('eng-KJVA:Amos', 'Amos', 'Amos', 30, 0, 'OT', 'eng-KJVA:Amos.9.15', 1),
('eng-KJVA:Bar', 'Baruch', 'Bar', 45, 0, 'DE', 'eng-KJVA:Bar.6.73', 1),
('eng-KJVA:Bel', 'Bel and the Dragon', 'Bel', 48, 0, 'DE', 'eng-KJVA:Bel.1.42', 1),
('eng-KJVA:Col', 'Colossians', 'Col', 62, 0, 'NT', 'eng-KJVA:Col.4.18', 1),
('eng-KJVA:Dan', 'Daniel', 'Dan', 27, 0, 'OT', 'eng-KJVA:Dan.12.13', 1),
('eng-KJVA:Deut', 'Deuteronomy', 'Deut', 5, 0, 'OT', 'eng-KJVA:Deut.34.12', 1),
('eng-KJVA:Eccl', 'Ecclesiastes', 'Eccl', 21, 0, 'OT', 'eng-KJVA:Eccl.12.14', 1),
('eng-KJVA:Eph', 'Ephesians', 'Eph', 60, 0, 'NT', 'eng-KJVA:Eph.6.24', 1),
('eng-KJVA:Esth', 'Esther', 'Esth', 17, 0, 'OT', 'eng-KJVA:Esth.10.3', 1),
('eng-KJVA:Exod', 'Exodus', 'Exod', 2, 0, 'OT', 'eng-KJVA:Exod.40.38', 1),
('eng-KJVA:Ezek', 'Ezekiel', 'Ezek', 26, 0, 'OT', 'eng-KJVA:Ezek.48.35', 1),
('eng-KJVA:Ezra', 'Ezra', 'Ezra', 15, 0, 'OT', 'eng-KJVA:Ezra.10.44', 1),
('eng-KJVA:Gal', 'Galatians', 'Gal', 59, 0, 'NT', 'eng-KJVA:Gal.6.18', 1),
('eng-KJVA:Gen', 'Genesis', 'Gen', 1, 0, 'OT', 'eng-KJVA:Gen.50.26', 1),
('eng-KJVA:Hab', 'Habakkuk', 'Hab', 35, 0, 'OT', 'eng-KJVA:Hab.3.19', 1),
('eng-KJVA:Hag', 'Haggai', 'Hag', 37, 0, 'OT', 'eng-KJVA:Hag.2.23', 1),
('eng-KJVA:Heb', 'Hebrews', 'Heb', 69, 0, 'NT', 'eng-KJVA:Heb.13.25', 1),
('eng-KJVA:Hos', 'Hosea', 'Hos', 28, 0, 'OT', 'eng-KJVA:Hos.14.9', 1),
('eng-KJVA:Isa', 'Isaiah', 'Isa', 23, 0, 'OT', 'eng-KJVA:Isa.66.24', 1),
('eng-KJVA:Jas', 'James', 'Jas', 70, 0, 'NT', 'eng-KJVA:Jas.5.20', 1),
('eng-KJVA:Jdt', 'Judith', 'Jdt', 41, 0, 'DE', 'eng-KJVA:Jdt.16.25', 1),
('eng-KJVA:Jer', 'Jeremiah', 'Jer', 24, 0, 'OT', 'eng-KJVA:Jer.52.34', 1),
('eng-KJVA:Job', 'Job', 'Job', 18, 0, 'OT', 'eng-KJVA:Job.42.17', 1),
('eng-KJVA:Joel', 'Joel', 'Joel', 29, 0, 'OT', 'eng-KJVA:Joel.3.21', 1),
('eng-KJVA:John', 'John', 'John', 54, 0, 'NT', 'eng-KJVA:John.21.25', 1),
('eng-KJVA:Jonah', 'Jonah', 'Jonah', 32, 0, 'OT', 'eng-KJVA:Jonah.4.11', 1),
('eng-KJVA:Josh', 'Joshua', 'Josh', 6, 0, 'OT', 'eng-KJVA:Josh.24.33', 1),
('eng-KJVA:Jude', 'Jude', 'Jude', 76, 0, 'NT', 'eng-KJVA:Jude.1.25', 1),
('eng-KJVA:Judg', 'Judges', 'Judg', 7, 0, 'OT', 'eng-KJVA:Judg.21.25', 1),
('eng-KJVA:Lam', 'Lamentations', 'Lam', 25, 0, 'OT', 'eng-KJVA:Lam.5.22', 1),
('eng-KJVA:Lev', 'Leviticus', 'Lev', 3, 0, 'OT', 'eng-KJVA:Lev.27.34', 1),
('eng-KJVA:Luke', 'Luke', 'Luke', 53, 0, 'NT', 'eng-KJVA:Luke.24.53', 1),
('eng-KJVA:Mal', 'Malachi', 'Mal', 39, 0, 'OT', 'eng-KJVA:Mal.4.6', 1),
('eng-KJVA:Mark', 'Mark', 'Mark', 52, 0, 'NT', 'eng-KJVA:Mark.16.20', 1),
('eng-KJVA:Matt', 'Matthew', 'Matt', 51, 0, 'NT', 'eng-KJVA:Matt.28.20', 1),
('eng-KJVA:Mic', 'Micah', 'Mic', 33, 0, 'OT', 'eng-KJVA:Mic.7.20', 1),
('eng-KJVA:Nah', 'Nahum', 'Nah', 34, 0, 'OT', 'eng-KJVA:Nah.3.19', 1),
('eng-KJVA:Neh', 'Nehemiah', 'Neh', 16, 0, 'OT', 'eng-KJVA:Neh.13.31', 1),
('eng-KJVA:Num', 'Numbers', 'Num', 4, 0, 'OT', 'eng-KJVA:Num.36.13', 1),
('eng-KJVA:Obad', 'Obadiah', 'Obad', 31, 0, 'OT', 'eng-KJVA:Obad.1.21', 1),
('eng-KJVA:Phil', 'Philippians', 'Phil', 61, 0, 'NT', 'eng-KJVA:Phil.4.23', 1),
('eng-KJVA:Phlm', 'Philemon', 'Phlm', 68, 0, 'NT', 'eng-KJVA:Phlm.1.25', 1),
('eng-KJVA:PrAzar', 'The Three Holy Children', 'PrAzar', 46, 0, 'DE', 'eng-KJVA:PrAzar.1.68', 1),
('eng-KJVA:Prov', 'Proverbs', 'Prov', 20, 0, 'OT', 'eng-KJVA:Prov.31.31', 1),
('eng-KJVA:Ps', 'Psalm', 'Ps', 19, 0, 'OT', 'eng-KJVA:Ps.150.6', 1),
('eng-KJVA:Rev', 'Revelation', 'Rev', 77, 0, 'NT', 'eng-KJVA:Rev.22.21', 1),
('eng-KJVA:Rom', 'Romans', 'Rom', 56, 0, 'NT', 'eng-KJVA:Rom.16.27', 1),
('eng-KJVA:Ruth', 'Ruth', 'Ruth', 8, 0, 'OT', 'eng-KJVA:Ruth.4.22', 1),
('eng-KJVA:Sir', 'Ecclesiasticus', 'Sir', 44, 0, 'DE', 'eng-KJVA:Sir.51.30', 1),
('eng-KJVA:Song', 'Song of Solomon', 'Song', 22, 0, 'OT', 'eng-KJVA:Song.8.14', 1),
('eng-KJVA:Sus', 'Susanna', 'Sus', 47, 0, 'DE', 'eng-KJVA:Sus.1.64', 1),
('eng-KJVA:Titus', 'Titus', 'Titus', 67, 0, 'NT', 'eng-KJVA:Titus.3.15', 1),
('eng-KJVA:Tob', 'Tobit', 'Tob', 40, 0, 'DE', 'eng-KJVA:Tob.14.15', 1),
('eng-KJVA:Wis', 'Wisdom of Solomon', 'Wis', 43, 0, 'DE', 'eng-KJVA:Wis.19.22', 1),
('eng-KJVA:Zech', 'Zechariah', 'Zech', 38, 0, 'OT', 'eng-KJVA:Zech.14.21', 1),
('eng-KJVA:Zeph', 'Zephaniah', 'Zeph', 36, 0, 'OT', 'eng-KJVA:Zeph.3.20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE IF NOT EXISTS `screens` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`id`, `name`, `slug`, `status`) VALUES
(1, 'Default', 'default', 1),
(2, 'Side Screens', 'side-screens', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `screen` bigint(20) NOT NULL,
  `name` varchar(300) NOT NULL,
  `body` longtext NOT NULL,
  `bg` varchar(300) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `screen` (`screen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `screen`, `name`, `body`, `bg`, `status`) VALUES
(1, 1, 'Verse 1', '          <h2><span style="line-height: 1.1;">1 There was a man of the Pharisees, named NicodeÂ´mus, a ruler of the Jews:</span><br></h2><h2>2 the same came to Jesus by night, and said unto him, Rabbi, we know that thou art a teacher come from God: for no man can do these miracles that thou doest, except God be with him.</h2>', 'default.jpg', 0),
(2, 2, 'Verse 2', '          <p><span style="line-height: 1.1;">The book of the generation of Jesus Christ, the son of David, the son of Abraham.</span><br></p> ', 'default.jpg', 0),
(3, 1, 'Verse 3', '          <h2 style="text-align: right;"><span style="line-height: 1.1;">dom of God.4NicodeÂ´mus saith unto him, How can a man be born when he is old? can he enter the second time into his mother''s womb, and be born?5Jesus answered, Verily, verily, I say unto thee, Except a man be born of water and of the Spirit, he cannot enter into the kingdom of God.6That which is born of the flesh is flesh; and that which is born of the Spirit is spirit.7Marvel not that I said unto thee, Ye must be born again.8The wind bloweth where it listeth, and thou hearest the sound thereof, but canst not tell whence it cometh, and whither it goeth: so is every one that is born of the Spirit.9NicodeÂ´mus answered and said unto him, How can these things be?10Jesus answered and said unto him, Art thou a master of Israel, and knowest not these things?11Verily, verily, I say unto thee, We speak that we do know, and testify that we have seen; and ye receive not our witness.12If I have told you earthly things, and ye believe not, how shall ye believe, if I tell you of heavenly things?13And no man hath ascended up to heaven, but he that came down from heaven, even the Son of man which is in heaven.14 And as Moses lifted up the serpent in the wilderness, even so must the Son of man be lifted up:15that whosoever believeth in him should not perish, but have eternal life.</span><br></h2><h2 style="text-align: start;">God So Loved the World<span style="line-height: 1.1;">.</span><br></h2>\n     ', 'default.jpg', 1),
(4, 2, 'Untitled 2', '', '', 0),
(5, 2, 'Untitled 21', '<p>Test</p><hr><p><br></p>', 'default.jpg', 1),
(6, 2, 'Untitled 1', '2', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
