-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 07:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(15) NOT NULL,
  `nama_driver` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `poin` int(10) NOT NULL,
  `status` varchar(7) NOT NULL DEFAULT 'offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `nama_driver`, `id`, `pass`, `nohp`, `foto`, `poin`, `status`) VALUES
(1, 'Muhammad Kholis', 'driver', 'driver', '085161787501', '1679463886Screenshot_2023-03-15-22-21-58-996_com.whatsapp.w4b.png', 0, 'online');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `qty` int(15) NOT NULL,
  `tgl_diubah` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_produk`, `qty`, `tgl_diubah`) VALUES
(19, '7', '3', 3, '2023-02-28'),
(24, '8', '3', 2, '2023-03-07'),
(26, '8', '13', 2, '2023-03-08'),
(29, '7', '2', 1, '2023-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `id_merchant` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `latitude` varchar(80) NOT NULL,
  `longtitude` varchar(80) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `avatar` text NOT NULL,
  `banner` varchar(100) NOT NULL,
  `text_bio` text NOT NULL,
  `partner` varchar(5) NOT NULL DEFAULT 'false',
  `trusted` varchar(15) NOT NULL DEFAULT 'false',
  `tgl_daftar` date NOT NULL DEFAULT current_timestamp(),
  `konfirmasi` varchar(5) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`id_merchant`, `nama`, `lokasi`, `latitude`, `longtitude`, `nohp`, `avatar`, `banner`, `text_bio`, `partner`, `trusted`, `tgl_daftar`, `konfirmasi`) VALUES
('1', 'TSG Cafe', 'Jln T Fakinah', '4.47908', '97.95635', '085161787501', '1677399748849463.png', '', 'Ggggg', 'true', 'false', '2023-03-20', 'true'),
('2', 'MyCafe', 'Jln T Fakinah', '4.47908', '97.95635', '085161787502', '', '', '', 'true', 'false', '2023-03-20', 'false'),
('3', 'hjk', 'hjk', '4.47908', '97.95635', 'hjk', '', '', '', 'false', 'false', '2023-03-20', 'false'),
('4', 'tyu', 'tyu', '4.47908', '97.95635', '567', '', '', '', 'true', 'false', '2023-03-20', 'false'),
('5', 'wer', 'wer', '4.47908', '97.95635', '234', '', '', '', 'true', 'false', '2023-03-20', 'false'),
('6', 'fgh', 'fgh', '4.47908', '97.95635', '565', '', '', '', 'true', 'false', '2023-03-20', 'false'),
('7', 'xcv', 'xcv', '4.47908', '97.95635', '98089779', '', '', '', 'true', 'false', '2023-03-20', 'false'),
('h6kqwf6Xes5jIk7', 'Dalatte', 'Alue dua', '', '', '085161787501', '16793674143488f4dfa52aaed56cee725091c232c2.jpg', '', 'Bio', 'false', 'false', '2023-03-21', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `pay_method`
--

CREATE TABLE `pay_method` (
  `id_metode` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_method`
--

INSERT INTO `pay_method` (`id_metode`, `nama`, `type`) VALUES
(1, 'Saldo Max', 'saldo'),
(2, 'Cash On Delivery', 'cod');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(15) NOT NULL,
  `id_pesanan` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `jumlah` int(13) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status` varchar(7) NOT NULL DEFAULT 'keluar',
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `waktu` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesanan`, `id_user`, `jumlah`, `keterangan`, `status`, `tgl`, `waktu`) VALUES
('4', '12', '', 47000, 'Bayar pemesanan', 'success', '2023-03-08', ''),
('4KaccjskonAg2aT', '913cCvyAHGCmacV', '8', 47000, 'Bayar pemesanan', 'keluar', '2023-03-08', '17:53'),
('8WjJa4KKW43pxLA', 'DPSEbcMnGK2r6QW', '8', 32000, 'Bayar pemesanan', 'keluar', '2023-03-08', '17:24'),
('bw4QZcB8hksR4Q2', '50Wl9dXDtQBIh3z', '8', 47000, 'Bayar pemesanan', 'keluar', '2023-03-08', '17:37'),
('DdwKbg02BIHJxeo', 'DPSEbcMnGK2r6QW', '8', 32000, 'Batalkan pemesanan', 'masuk', '2023-03-08', '17:25'),
('eyW6xPg8qrTVS3A', 'Ri8j7q6wGpgASUi', '7', 29000, 'Bayar pemesanan', 'keluar', '2023-03-21', '22:16'),
('FGow1F1u8zavqP7', '4w4xGcCQINVy1yq', '8', 32000, 'Bayar pemesanan', 'keluar', '2023-03-08', '16:57'),
('ggKOpYv0B1YhWei', 'IhYMChXUyVTWChz', '8', 55000, 'Bayar pemesanan', 'keluar', '2023-03-08', '17:54'),
('hkkWRZD6WredK80', '913cCvyAHGCmacV', '8', 47000, 'Batalkan pemesanan', 'masuk', '2023-03-08', '17:54'),
('HnTd07y1KZGOoeo', 'xqjkqzO7JCPTBPf', '7', 29000, 'Batalkan pemesanan', 'masuk', '2023-03-21', '22:19'),
('iQGAW5706AMA1Vx', '6l9tCOIiqreqhTX', '7', 80000, 'Batalkan pemesanan', 'masuk', '2023-03-20', '19:42'),
('JKhIE74fpa2EoG3', 'Ri8j7q6wGpgASUi', '7', 29000, 'Batalkan pemesanan', 'masuk', '2023-03-21', '22:18'),
('L2YaHxstIqNndY9', 'GnCfi1R6Mg7vte1', '8', 47000, 'Bayar pemesanan', 'keluar', '2023-03-08', '17:40'),
('Lgtfk3blAFnbEFt', 'eVClp0WVFF4FYJD', '7', 52000, 'Bayar pemesanan', 'keluar', '2023-03-20', '22:28'),
('M7o02zdLNaRVfXg', 'eVClp0WVFF4FYJD', '7', 52000, 'Batalkan pemesanan', 'masuk', '2023-03-20', '22:29'),
('mIjmfZsTFyeZn4F', '50Wl9dXDtQBIh3z', '8', 47000, 'Batalkan pemesanan', 'masuk', '2023-03-08', '17:39'),
('pyZoc4FViP9dCbS', 'GnCfi1R6Mg7vte1', '8', 47000, 'Batalkan pemesanan', 'masuk', '2023-03-08', '17:53'),
('TOPZtpHIrauKHp5', '4ZzvayCAQkiPzB8', '7', 52000, 'Batalkan pemesanan', 'masuk', '2023-03-20', '22:56'),
('ZDUpYtE3sSnNZti', 'xqjkqzO7JCPTBPf', '7', 29000, 'Bayar pemesanan', 'keluar', '2023-03-21', '22:19');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longtitude` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `produk` text NOT NULL,
  `metode_pembayaran` varchar(15) NOT NULL,
  `total_produk` int(15) NOT NULL,
  `total_pengiriman` int(15) NOT NULL,
  `total_pembayaran` int(15) NOT NULL,
  `tgl_pemesanan` date NOT NULL DEFAULT current_timestamp(),
  `waktu_pemesanan` varchar(15) NOT NULL,
  `status_pesanan` varchar(50) NOT NULL,
  `catatan` varchar(250) NOT NULL,
  `bayar` varchar(15) NOT NULL DEFAULT 'false',
  `id_pembayaran` varchar(15) NOT NULL,
  `id_driver` varchar(15) NOT NULL,
  `selesai` varchar(20) NOT NULL DEFAULT 'false',
  `tgl_selesai` date NOT NULL,
  `waktu_selesai` varchar(7) NOT NULL,
  `bukti_kirim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `latitude`, `longtitude`, `alamat`, `produk`, `metode_pembayaran`, `total_produk`, `total_pengiriman`, `total_pembayaran`, `tgl_pemesanan`, `waktu_pemesanan`, `status_pesanan`, `catatan`, `bayar`, `id_pembayaran`, `id_driver`, `selesai`, `tgl_selesai`, `waktu_selesai`, `bukti_kirim`) VALUES
('1', '7', '5.1183288', '97.1599211', '', '[{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":2,\"id_merchant\":1},{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":2,\"id_merchant\":3}]', '2', 2, 9000, 55000, '2023-03-03', '22:04', 'selesai', 'Pesan COD', 'true', '', '1', 'true', '2023-03-03', '22:18', '16778566811.png'),
('10', '7', '5.1183289', '97.1599188', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":2,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":1,\"id_merchant\":2}]', '2', 2, 9000, 30000, '2023-03-05', '11:48', 'dibatalkan', '', 'true', '', '', 'false', '0000-00-00', '', ''),
('11', '8', '5.1206919', '97.1577707', '', '[{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":1,\"id_merchant\":1}]', '2', 1, 8000, 23000, '2023-03-07', '14:20', 'dibatalkan', 'Jjj', 'true', '', '', 'false', '0000-00-00', '', ''),
('12', '8', '5.1206919', '97.1577707', '', '[{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":2,\"id_merchant\":1},{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3}]', '1', 2, 9000, 47000, '2023-03-07', '14:21', 'dibatalkan', 'Ddftr', 'true', '', '', 'false', '0000-00-00', '', ''),
('13', '8', '5.1206738', '97.1577591', '', '[{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":2,\"id_merchant\":1},{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":6,\"id_merchant\":2}]', '2', 3, 10000, 78000, '2023-03-07', '15:06', 'dibatalkan', '', 'true', '', '', 'false', '0000-00-00', '', ''),
('14', '8', '5.1205469', '97.1588892', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3},{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":1,\"id_merchant\":1}]', '1', 2, 9000, 32000, '2023-03-08', '16:50', 'dibatalkan', 'Hehehehehe', 'false', '', '', 'false', '0000-00-00', '', ''),
('2', '7', '5.1183288', '97.1599211', '', '[{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":2,\"id_merchant\":1},{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":2,\"id_merchant\":3}]', '1', 2, 9000, 55000, '2023-03-03', '22:05', 'dibatalkan', 'Pesan Dana', 'false', '', '', 'false', '0000-00-00', '', ''),
('3', '7', '5.1172342', '97.1606013', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":2,\"id_merchant\":3},{\"id\":5,\"produk\":\"Laptop 2\",\"harga\":5000,\"qty\":1,\"id_merchant\":1}]', '1', 2, 9000, 30000, '2023-03-04', '18:11', 'dibatalkan', '', 'false', '', '', 'false', '0000-00-00', '', ''),
('4', '7', '5.1183272', '97.1599233', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":2,\"id_merchant\":3},{\"id\":5,\"produk\":\"Laptop 2\",\"harga\":5000,\"qty\":1,\"id_merchant\":1}]', '2', 2, 9000, 30000, '2023-03-05', '00:06', 'selesai', '', 'true', '', '1', 'true', '2023-03-05', '00:18', '167795032616779503125723850291681889829869.jpg'),
('4w4xGcCQINVy1yq', '8', '5.1205469', '97.1588892', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3},{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":1,\"id_merchant\":1}]', '1', 2, 9000, 32000, '2023-03-08', '16:53', 'dibatalkan', 'Hehehehe', 'true', '', '', 'false', '0000-00-00', '', ''),
('4ZzvayCAQkiPzB8', '7', '4.4791001', '97.9564895', 'Uhd', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":7,\"id_merchant\":2}]', '1', 2, 9000, 52000, '2023-03-20', '22:28', 'dibatalkan', '', 'false', '', '', 'false', '0000-00-00', '', ''),
('5', '7', '5.1183302', '97.1599232', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3}]', '2', 1, 8000, 16000, '2023-03-05', '11:11', 'dibatalkan', '', 'true', '', '', 'false', '0000-00-00', '', ''),
('50Wl9dXDtQBIh3z', '8', '5.1205371', '97.1588843', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3},{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":2,\"id_merchant\":1}]', '1', 2, 9000, 47000, '2023-03-08', '17:36', 'dibatalkan', 'Hehehe', 'true', '', '', 'false', '0000-00-00', '', ''),
('6', '7', '5.1183251', '97.1599233', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3}]', '2', 1, 8000, 16000, '2023-03-05', '11:15', 'dibatalkan', '', 'true', '', '', 'false', '0000-00-00', '', ''),
('6l9tCOIiqreqhTX', '7', '4.4743463', '97.958076', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":7,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":3,\"id_merchant\":2}]', '1', 2, 9000, 80000, '2023-03-20', '18:06', 'dibatalkan', '', 'false', '', '', 'false', '0000-00-00', '', ''),
('7', '7', '5.1183289', '97.159921', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":2,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":1,\"id_merchant\":2}]', '2', 2, 9000, 30000, '2023-03-05', '11:23', 'dibatalkan', 'Hjdhhdhd', 'true', '', '', 'false', '0000-00-00', '', ''),
('8', '7', '5.1183289', '97.159921', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":2,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":1,\"id_merchant\":2}]', '2', 2, 9000, 30000, '2023-03-05', '11:24', 'dibatalkan', '', 'true', '', '', 'false', '0000-00-00', '', ''),
('9', '7', '5.1183289', '97.159921', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":2,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":1,\"id_merchant\":2}]', '2', 2, 9000, 30000, '2023-03-05', '11:24', 'dibatalkan', 'Jidjijdhjd', 'true', '', '', 'false', '0000-00-00', '', ''),
('913cCvyAHGCmacV', '8', '5.1205544', '97.1588922', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":2,\"id_merchant\":3},{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":2,\"id_merchant\":1}]', '1', 2, 9000, 47000, '2023-03-08', '17:53', 'dibatalkan', '', 'true', '4KaccjskonAg2aT', '', 'false', '0000-00-00', '', ''),
('cG5EObG9SJidzUE', '7', '4.476083', '97.9574133', 'Alamamamama', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":1,\"id_merchant\":2}]', '2', 2, 9000, 22000, '2023-03-20', '19:43', 'dibatalkan', 'Pean', 'true', '', '', 'false', '0000-00-00', '', ''),
('CiUL7AyMwDXTCq6', '7', '4.476083', '97.9574133', 'Ggg', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":1,\"id_merchant\":2}]', '2', 2, 9000, 22000, '2023-03-20', '20:14', 'dibatalkan', '', 'true', '', '', 'false', '0000-00-00', '', ''),
('DPSEbcMnGK2r6QW', '8', '5.1205509', '97.1588885', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3},{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":1,\"id_merchant\":1}]', '1', 2, 9000, 32000, '2023-03-08', '17:24', 'dibatalkan', '', 'true', '', '', 'false', '0000-00-00', '', ''),
('ejRl91FOxOOEuuD', '8', '5.1205509', '97.1588885', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3},{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":1,\"id_merchant\":1}]', '2', 2, 9000, 32000, '2023-03-08', '17:26', 'dibatalkan', '', 'true', '', '', 'false', '0000-00-00', '', ''),
('eVClp0WVFF4FYJD', '7', '4.4791076', '97.9565145', 'Hsjshhshe', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":7,\"id_merchant\":2}]', '1', 2, 9000, 52000, '2023-03-20', '22:27', 'dibatalkan', 'Hhehhe', 'true', 'Lgtfk3blAFnbEFt', '', 'false', '0000-00-00', '', ''),
('FSmlKCEgX6csNok', '7', '4.4789547', '97.9574133', 'Gg', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":7,\"id_merchant\":2}]', '2', 2, 9000, 52000, '2023-03-20', '22:27', 'dibatalkan', '', 'true', '', '', 'false', '0000-00-00', '', ''),
('GnCfi1R6Mg7vte1', '8', '5.1205414', '97.1588939', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3},{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":2,\"id_merchant\":1}]', '1', 2, 9000, 47000, '2023-03-08', '17:40', 'dibatalkan', 'Hehehehe', 'true', '', '', 'false', '0000-00-00', '', ''),
('IhYMChXUyVTWChz', '8', '5.1205392', '97.1588848', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":2,\"id_merchant\":3},{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":2,\"id_merchant\":1}]', '1', 2, 9000, 55000, '2023-03-08', '17:54', 'selesai', '', 'true', 'ggKOpYv0B1YhWei', '1', 'true', '2023-03-08', '18:13', '16782740291678274018107687287629876614506.jpg'),
('lsRGSw93Z7ktYfB', '7', '4.474349', '97.9580856', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":7,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":3,\"id_merchant\":2}]', '2', 2, 9000, 80000, '2023-03-20', '18:35', 'dibatalkan', 'Pesanananananana', 'true', '', '', 'false', '0000-00-00', '', ''),
('Ri8j7q6wGpgASUi', '7', '4.4743473', '97.9580859', 'Disini', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":3,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":1,\"id_merchant\":2}]', '1', 2, 0, 29000, '2023-03-21', '22:13', 'dibatalkan', 'Pesan nih', 'true', 'eyW6xPg8qrTVS3A', '', 'false', '0000-00-00', '', ''),
('Rk45HZrAI7HQhlk', '7', '4.4743496', '97.9580866', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":7,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":3,\"id_merchant\":2}]', '2', 2, 9000, 80000, '2023-03-20', '18:08', 'selesai', '', 'true', '', '1', 'true', '2023-03-20', '22:31', '167932628216793262626509009249898350600119.jpg'),
('sWsiG4AJHnKttzK', '8', '5.1205604', '97.1588802', '', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":2,\"id_merchant\":3},{\"id\":13,\"produk\":\"Sippin\",\"harga\":15000,\"qty\":2,\"id_merchant\":1}]', '1', 2, 9000, 55000, '2023-03-08', '18:26', 'menunggu', '', 'false', '', '', 'false', '0000-00-00', '', ''),
('v0uh07okHzR2Dgm', '7', '4.4791129', '97.9564932', 'Tgyhg', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":1,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":7,\"id_merchant\":2}]', '2', 2, 9000, 52000, '2023-03-20', '22:57', 'selesai', '', 'true', '', '1', 'true', '2023-03-20', '22:59', '167932794416793279316246981290213314564960.jpg'),
('xqjkqzO7JCPTBPf', '7', '4.4743501', '97.9580867', 'Disini', '[{\"id\":3,\"produk\":\"Nescafe\",\"harga\":8000,\"qty\":3,\"id_merchant\":3},{\"id\":2,\"produk\":\"Produk 2\",\"harga\":5000,\"qty\":1,\"id_merchant\":2}]', '1', 2, 0, 29000, '2023-03-21', '22:19', 'dibatalkan', 'Pesan nih', 'true', 'ZDUpYtE3sSnNZti', '', 'false', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(15) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(25) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `gambar` text NOT NULL,
  `jenis` varchar(40) NOT NULL,
  `sub_jenis` varchar(35) NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_edit` datetime NOT NULL,
  `tgl_hapus` datetime NOT NULL,
  `id_diskon` varchar(15) NOT NULL,
  `bintang` int(5) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_ulasan` varchar(15) NOT NULL,
  `stock` int(15) NOT NULL,
  `id_merchant` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `deskripsi`, `gambar`, `jenis`, `sub_jenis`, `tgl_dibuat`, `tgl_edit`, `tgl_hapus`, `id_diskon`, `bintang`, `status`, `id_ulasan`, `stock`, `id_merchant`) VALUES
(1, 'Bakso', 2000, 'Deskripsi', '21.png', 'food', 'Makanan', '2023-01-28 16:30:50', '2023-02-26 00:00:00', '2023-01-28 10:30:25', '', 3, '', '', 50, '1'),
(2, 'Produk 2', 5000, '', '19.png', 'food', 'drink', '2023-01-28 16:50:52', '2023-01-28 10:50:05', '2023-01-28 10:50:05', '', 4, '', '', 19, '2'),
(3, 'Nescafe', 8000, '', '18.png', 'food', 'drink', '2023-02-02 13:05:14', '2023-02-02 07:04:09', '2023-02-02 07:04:09', '', 4, '', '', 19, '3'),
(5, 'Laptop 2', 5000, 'Laptop 2', 'Screenshot_2023-02-06-15-02-32-399-edit_com.instagram.android.jpg', 'elektronik', 'Makanan', '2023-02-26 11:43:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', '', 69, '1'),
(13, 'Sippin', 15000, 'Gg', '1677388834IMG_20230118_211142.jpg', 'food', 'Minuman', '2023-02-26 12:20:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', '', 56, '1');

-- --------------------------------------------------------

--
-- Table structure for table `progress_pesanan`
--

CREATE TABLE `progress_pesanan` (
  `id_progress` int(15) NOT NULL,
  `id_pesanan` varchar(15) NOT NULL,
  `id_driver` varchar(15) NOT NULL,
  `diambil` varchar(5) NOT NULL DEFAULT 'true',
  `waktu_diambil` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `dikemas` varchar(5) NOT NULL DEFAULT 'false',
  `waktu_dikemas` varchar(20) NOT NULL,
  `diantar` varchar(5) NOT NULL DEFAULT 'false',
  `waktu_diantar` varchar(20) NOT NULL,
  `selesai` varchar(5) NOT NULL DEFAULT 'false',
  `waktu_selesai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progress_pesanan`
--

INSERT INTO `progress_pesanan` (`id_progress`, `id_pesanan`, `id_driver`, `diambil`, `waktu_diambil`, `dikemas`, `waktu_dikemas`, `diantar`, `waktu_diantar`, `selesai`, `waktu_selesai`) VALUES
(1, '8', '2', 'true', '2023-02-27', 'true', '28 Feb 2023 - 08:57', 'true', '28 Feb 2023 - 08:57', 'false', '0000-00-00'),
(2, '13', '1', 'true', '28 Feb 2023 - 10:33', 'true', '28 Feb 2023 - 10:42', 'true', '28 Feb 2023 - 10:42', 'false', ''),
(3, '1', '1', 'true', '03 Mar 2023 - 22:06', 'true', '03 Mar 2023 - 22:08', 'true', '03 Mar 2023 - 22:13', 'false', ''),
(4, '4', '1', 'true', '05 Mar 2023 - 00:15', 'true', '05 Mar 2023 - 00:16', 'true', '05 Mar 2023 - 00:18', 'false', ''),
(5, 'IhYMChXUyVTWChz', '1', 'true', '08 Mar 2023 - 18:02', 'true', '08 Mar 2023 - 18:13', 'true', '08 Mar 2023 - 18:13', 'false', ''),
(6, 'Rk45HZrAI7HQhlk', '1', 'true', '20 Mar 2023 - 18:08', 'true', '20 Mar 2023 - 18:09', 'true', '20 Mar 2023 - 18:33', 'false', ''),
(7, 'v0uh07okHzR2Dgm', '1', 'true', '20 Mar 2023 - 22:58', 'true', '20 Mar 2023 - 22:58', 'true', '20 Mar 2023 - 22:58', 'false', '');

-- --------------------------------------------------------

--
-- Table structure for table `task_driver`
--

CREATE TABLE `task_driver` (
  `id_task` int(15) NOT NULL,
  `id_driver` varchar(15) NOT NULL,
  `id_pesanan` varchar(15) NOT NULL,
  `waktu_ambil` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(15) NOT NULL DEFAULT 'diproses',
  `waktu_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_driver`
--

INSERT INTO `task_driver` (`id_task`, `id_driver`, `id_pesanan`, `waktu_ambil`, `status`, `waktu_selesai`) VALUES
(1, '1', '8', '2023-02-27', 'selesai', '0000-00-00'),
(3, '1', '13', '0000-00-00', 'selesai', '0000-00-00'),
(4, '1', '1', '0000-00-00', 'selesai', '0000-00-00'),
(5, '1', '4', '0000-00-00', 'selesai', '0000-00-00'),
(6, '1', 'IhYMChXUyVTWChz', '0000-00-00', 'selesai', '0000-00-00'),
(7, '1', 'Rk45HZrAI7HQhlk', '0000-00-00', 'selesai', '0000-00-00'),
(8, '1', 'v0uh07okHzR2Dgm', '0000-00-00', 'selesai', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan_produk`
--

CREATE TABLE `ulasan_produk` (
  `id_ulasan` int(15) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_merchant` varchar(15) NOT NULL,
  `bintang` int(5) NOT NULL,
  `ulasan` text NOT NULL,
  `waktu` varchar(15) NOT NULL,
  `tgl` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasan_produk`
--

INSERT INTO `ulasan_produk` (`id_ulasan`, `id_produk`, `id_user`, `id_merchant`, `bintang`, `ulasan`, `waktu`, `tgl`) VALUES
(1, '1', '1', '1', 4, 'okawokaowkakowkaow', '21:24', '2023-02-11'),
(2, '1', '7', '1', 4, 'Yahaha', '21:59', '2023-02-11'),
(3, '1', '7', '1', 1, 'Wew', '22:00', '2023-02-11'),
(4, '1', '7', '1', 2, 'Gg', '22:00', '2023-02-11'),
(5, '1', '7', '1', 3, 'Mweehhehehe', '22:03', '2023-02-11'),
(6, '1', '7', '1', 2, 'Yolooooo', '23:57', '2023-02-11'),
(7, '13', '7', '1', 4, 'Ntaps', '22:02', '2023-03-03'),
(8, '13', '8', '1', 4, ':) ', '20:28', '2023-03-05'),
(9, '5', '7', '1', 4, 'Gg', '12:12', '2023-03-21'),
(10, '2', '7', '2', 4, 'Wew', '22:47', '2023-03-21'),
(11, '3', '7', '3', 5, 'Wew', '22:47', '2023-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `referal` varchar(15) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `foto` varchar(200) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `id_merchant` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `nohp`, `referal`, `role`, `foto`, `alamat`, `id_merchant`) VALUES
(1, 'Muhammad Kholis', 'itprzvl', 'kholis', 'kholis@gmail.com', '085161787501', 'ITSPRZVL', 'user', '', '', ''),
(2, '', 'Tissu_Galon', '', 'realparzival7@gmail.com', '', '', 'user', '', '', ''),
(3, '', '', '', '', '', '', 'user', '', '', ''),
(4, '', 'ImVengence25', 'kk', 'parzivalxddd@gmail.com', '', '', 'user', '', '', ''),
(5, 'Muhammad Kholis', 'Gg', 'gg', 'gg@gmail.com', '085161787501', '', 'user', '', 'Jln T Fakinah Perumahan PTPN 1', ''),
(6, '', 'Ggq', 'gg', 'ggs@gmail.com', '', '', 'user', '', '', ''),
(7, 'Muhammad Kholis', 'Kholis', '123', 'parzivalxdd@gmail.com', '085161787501', '', 'user', 'IMG-20230212-WA0016.jpg', 'Jln T Fakinah Perumahan PTPN 1', '1'),
(8, 'Linda Nisrina', 'Linda Nisrina', '123', 'linda@gmail.com', '085161787501', '', 'user', '20230305_080346.png', 'Jln T Fakinah Perumahan PTPN 1', 'h6kqwf6Xes5jIk7'),
(10, 'Bogeng', 'Bogeng', '123', 'bogeng@gmail.com', '085161787501', '', 'user', 'IMG_20220219_125127_676.webp', 'Jln T Fakinah Perumahan PTPN 1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id_wallet` int(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `saldo` int(13) NOT NULL,
  `alamat_wallet` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id_wallet`, `id_user`, `saldo`, `alamat_wallet`) VALUES
(1, '10', 0, 'C6yU5Yzx3tjWovYNNlNCP4zAZ8fsJd'),
(2, '7', 132000, 'A3IuCXyX11TGm7B059x6qaDlCxqkAQ'),
(3, '8', 398000, 'EMAfAACfDIUKGbQtv1wlv91n3w2J5h'),
(4, '1', 0, 'AtGn0R3JrpnIA63KZfMlB5C2ek8j1C');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(15) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `tgl_wishlist` date NOT NULL DEFAULT current_timestamp(),
  `waktu_wishlist` varchar(7) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_produk`, `id_user`, `tgl_wishlist`, `waktu_wishlist`) VALUES
(23, '13', '8', '2023-03-06', '00:33'),
(31, '13', '7', '2023-03-22', '00:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id_merchant`);

--
-- Indexes for table `pay_method`
--
ALTER TABLE `pay_method`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `progress_pesanan`
--
ALTER TABLE `progress_pesanan`
  ADD PRIMARY KEY (`id_progress`);

--
-- Indexes for table `task_driver`
--
ALTER TABLE `task_driver`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `ulasan_produk`
--
ALTER TABLE `ulasan_produk`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id_wallet`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id_driver` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pay_method`
--
ALTER TABLE `pay_method`
  MODIFY `id_metode` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `progress_pesanan`
--
ALTER TABLE `progress_pesanan`
  MODIFY `id_progress` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `task_driver`
--
ALTER TABLE `task_driver`
  MODIFY `id_task` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ulasan_produk`
--
ALTER TABLE `ulasan_produk`
  MODIFY `id_ulasan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id_wallet` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
