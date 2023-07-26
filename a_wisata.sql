-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 08:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminNama` varchar(30) NOT NULL,
  `adminUsername` varchar(60) NOT NULL,
  `adminPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminNama`, `adminUsername`, `adminPassword`) VALUES
('A001', 'Aldy Sukardi', 'IdrakusyDla', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaID` char(4) NOT NULL,
  `areaNama` char(35) NOT NULL,
  `areaWilayah` char(35) NOT NULL,
  `areaKeterangan` varchar(255) NOT NULL,
  `kecamatanID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaID`, `areaNama`, `areaWilayah`, `areaKeterangan`, `kecamatanID`) VALUES
('A001', 'Area 1', 'Wilayah 1', 'Keterangan 1', 'C001'),
('A002', 'Area 2', 'Wilayah 2', 'Keterangan 2', 'C002'),
('A003', 'Area 3', 'Wilayah 3', 'Keterangan 3', 'C003'),
('A004', 'Area 4', 'Wilayah 4', 'Keterangan 4', 'C004'),
('A005', 'Area 5', 'Wilayah 5', 'Keterangan 5', 'C005'),
('A006', 'Area 6', 'Wilayah 6', 'Keterangan 6', 'C006');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` char(5) NOT NULL,
  `destinasiNama` varchar(35) NOT NULL,
  `destinasiAlamat` varchar(255) NOT NULL,
  `kategoriID` char(4) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasiNama`, `destinasiAlamat`, `kategoriID`, `areaID`) VALUES
('D001', 'Candi Borobudur', ' Jl. Badrawati, Kw. Candi Borobudur', 'WK02', 'A002'),
('D002', 'Gunung Bromo', ' Bromoo', 'WK04', 'A003'),
('D003', 'Pantai Mutiara Pluit', ' Jl. Pantai Mutiara', 'WK03', 'A001');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` char(5) NOT NULL,
  `fotoNama` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotoFile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotoNama`, `destinasiID`, `fotoFile`) VALUES
('F001', 'Candi Borobudur', 'D001', 'candiborobudur.jpg'),
('F002', 'Gunung Bromo', 'D002', 'bromo.jpg'),
('F003', 'Pantai Mutiara Pluit', 'D003', 'pantai mutiara pluit.jpg'),
('F004', 'Pantai Mutiara Pluit 2', 'D003', 'pantai mutiara pluit 2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kabupatenID` char(4) NOT NULL,
  `kabupatenNama` varchar(35) NOT NULL,
  `provinsiID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`kabupatenID`, `kabupatenNama`, `provinsiID`) VALUES
('K001', 'Jakarta Barat', 'P001'),
('K002', 'Magelang', 'P002'),
('K003', 'Malang', 'P003'),
('K004', 'Halmahera Barat', 'P004'),
('K005', 'Kutai Kartanegara', 'P006'),
('K006', 'Toraja', 'P005');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` char(4) NOT NULL,
  `kategoriNama` char(30) NOT NULL,
  `kategoriKeterangan` varchar(255) NOT NULL,
  `kategoriReferensi` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategoriNama`, `kategoriKeterangan`, `kategoriReferensi`) VALUES
('WK01', 'Alam', 'Wisata dengan pemandangan pantai dan gunung', 'Buku Wisata'),
('WK02', 'Budaya', 'Wisata sejarah peninggalan masa lalu', 'Buku Sejarah'),
('WK03', 'Pantai', 'Destinasi wisata yang berada pada kawasan pinggir laut, merupakan wisiata yang menampilkan keidahan pantai dengan ombaknya', 'Buku Wisata'),
('WK04', 'Gunung', 'Macem-Macem Gunung', 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kecamatanID` char(4) NOT NULL,
  `kecamatanNama` varchar(35) NOT NULL,
  `kabupatenID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kecamatanID`, `kecamatanNama`, `kabupatenID`) VALUES
('C001', 'Penjaringan', 'K001'),
('C002', 'Borobudur', 'K002'),
('C003', 'Tosari', 'K003'),
('C004', 'Jailolo', 'K004'),
('C005', 'Muara Wis', 'K005'),
('C006', 'Nuha', 'K006');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `eventID` char(4) NOT NULL,
  `eventNama` varchar(255) NOT NULL,
  `kabupatenID` char(4) NOT NULL,
  `eventKet` text NOT NULL,
  `eventMulai` date NOT NULL,
  `eventSelesai` date NOT NULL,
  `eventPoster` varchar(225) NOT NULL,
  `eventSumber` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`eventID`, `eventNama`, `kabupatenID`, `eventKet`, `eventMulai`, `eventSelesai`, `eventPoster`, `eventSumber`) VALUES
('E001', 'Festival Teluk Jailolo', 'K004', 'Udah pernah nonton festival dari tepi pantai belum, nih? Kalau belum pernah dan penasaran gimana sensasi serunya, yuk kenalan sama Festival Teluk Jailolo! Event yang berlokasi di Halmahera Barat, Maluku Utara tersebut menyajikan ragam budaya masyarakat lokalnya yang dilengkapi dengan pemandangan alam ciamik nan asri. Sebut saja seperti Sasadu On The Sea di panggung pertunjukan di atas laut yang pernah memecahkan rekor MURI pada tahun 2013 dan jadi ikon utama FTJ, serta acara Dance in The Sunset yang menyajikan tarian daerah berlatar senja.', '2021-11-26', '2022-11-09', 'event1.jpg', 'indonesia.travel'),
('E002', 'Toraja Highland Festival', 'K005', 'Segera hadir secara perdana di tahun 2021 ini, Toraja Highland Festival siap menyuguhkan budaya masyarakat Toraja yang sangat kaya. Event Gagasan Masyarakat Sadar Wisata dan Geopark Toraja ini bakal memamerkan desa-desa tradisional, Geopark Toraja, dan juga Danau Matano. Danau ini merupakan danau purba yang terbentuk secara tektonik dan menurut World Wide Fund for Nature (WWF), Danau Matano adalah danau terdalam di Asia Tenggara serta danau terdalam kedelapan di dunia! Nggak hanya puas sama wisata budaya dan alamnya yang masih asri, tapi juga ada pameran UMKM di To\'Tombi-Lolai yang menjual berbagai produk #BeliKreatifLokal yang menarik banget.', '2021-09-08', '2021-09-30', 'event2.jpg', 'indonesia.travel'),
('E003', 'Festival 3 Danau', 'K006', 'Bukan satu tempat, tapi Festival 3 Danau dari Kalimantan Timur ini menggarap acara di 3 danau sekaligus nih! Dengan latar Danau Semayang, Danau Melintang, dan Danau Jempang yang menjadi habitat pesut mahakam satwa langka endemik khas Kalimantan, festival ini menyuguhkan berbagai acara seru. Beberapa di antaranya seperti, pembuatan Tenun Ulap Doyo secara langsung oleh para pengrajin dari Tanjung Isuy hingga arak-arakan menggunakan kapal di danau menuju ke tempat acara dan musikalisasi puisi.', '2021-11-10', '2021-12-23', 'event3.jpg', 'indonesia.travel');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsiID` char(4) NOT NULL,
  `provinsiNama` char(35) NOT NULL,
  `provinsiTglBerdiri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`provinsiID`, `provinsiNama`, `provinsiTglBerdiri`) VALUES
('P001', 'Jakarta', '2021-11-01'),
('P002', 'Jawa Tengah', '1950-08-15'),
('P003', 'Jawa Timur', '1948-11-26'),
('P004', 'Maluku Utara', '1999-10-04'),
('P005', 'Sulawesi Selatan', '1950-08-17'),
('P006', 'Kalimantan Timur', '1957-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `tourguide`
--

CREATE TABLE `tourguide` (
  `pemanduID` char(4) NOT NULL,
  `pemanduNama` varchar(35) NOT NULL,
  `pemanduTL` date NOT NULL,
  `pemanduFoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourguide`
--

INSERT INTO `tourguide` (`pemanduID`, `pemanduNama`, `pemanduTL`, `pemanduFoto`) VALUES
('P001', 'Ernest', '2021-11-03', 'ernes.jpg'),
('P002', 'Liko', '2001-10-16', 'liko.jpg'),
('P003', 'Melanie', '2002-10-04', 'melanie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `translator`
--

CREATE TABLE `translator` (
  `translatorID` char(4) NOT NULL,
  `translatorNama` varchar(35) NOT NULL,
  `translatorTL` date NOT NULL,
  `translatorFoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `translator`
--

INSERT INTO `translator` (`translatorID`, `translatorNama`, `translatorTL`, `translatorFoto`) VALUES
('T001', 'Ernest', '2021-11-09', 'ernes.jpg'),
('T002', 'Faraditya', '2002-01-23', 'faraditya.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kabupatenID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kecamatanID`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsiID`);

--
-- Indexes for table `tourguide`
--
ALTER TABLE `tourguide`
  ADD PRIMARY KEY (`pemanduID`);

--
-- Indexes for table `translator`
--
ALTER TABLE `translator`
  ADD PRIMARY KEY (`translatorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
