-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jun 2014 pada 16.10
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_admin`
--

CREATE TABLE IF NOT EXISTS `master_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `contact_person` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `user_agent` varchar(100) NOT NULL,
  `type_admin_id` int(3) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `master_admin`
--

INSERT INTO `master_admin` (`id`, `first_name`, `last_name`, `contact_person`, `email`, `username`, `password`, `session_id`, `ip_address`, `user_agent`, `type_admin_id`, `status`) VALUES
(6, 'sultans', 'permadi', '02195207177', 'sultans.permadi@gmail.com', 'sultans', '02195207177', '', '', '', 1, 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_file`
--

CREATE TABLE IF NOT EXISTS `master_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_type` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_size` varchar(100) NOT NULL,
  `file_images` varchar(100) NOT NULL,
  `file_status` enum('Enable','Disable') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_message`
--

CREATE TABLE IF NOT EXISTS `master_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `message` text,
  `user_email_id` int(3) NOT NULL,
  `date_message` timestamp NOT NULL,
  `reply` text,
  `admin_id` int(3) NOT NULL,
  `date_reply` date NOT NULL,
  `date` timestamp NOT  NULL,
  `status` enum('Reply','Complete') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_news`
--

CREATE TABLE IF NOT EXISTS `master_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tittle` text NOT NULL,
  `description` text NOT NULL,
  `images` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` int(3) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_type_admin`
--

CREATE TABLE IF NOT EXISTS `master_type_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `master_type_admin`
--

INSERT INTO `master_type_admin` (`id`, `name`) VALUES
(1, 'SUPER USER'),
(2, 'ADMIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_user`
--

CREATE TABLE IF NOT EXISTS `master_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_type_id` int(3) NOT NULL,
  `admin_id` int(3) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `last_modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `privilege`
--

INSERT INTO `privilege` (`id`, `admin_type_id`, `admin_id`, `menu`, `action`, `last_modified`) VALUES
(1, 1, 1, '', '', '2014-06-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `ip_address` text NOT NULL,
  `user_agent` text NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
(0, 'eff44e322cff5bd7c187c6013aa86511', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:30.0) Gecko/20100101 Firefox/30.0', '0000-00-00 00:00:00', ''),
(0, 'c78673e592fe7ea03307699eac87020d', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:30.0) Gecko/20100101 Firefox/30.0', '0000-00-00 00:00:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
