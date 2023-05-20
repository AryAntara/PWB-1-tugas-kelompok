-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2023 at 05:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teamp4t_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'anak'),
(2, 'pria'),
(6, 'wanita');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar_produk` varchar(225) NOT NULL,
  `type` varchar(100) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `jenis_kelamin` enum('1','2','3') NOT NULL,
  `bahan` varchar(100) NOT NULL,
  `negara_asal` varchar(100) NOT NULL,
  `dikirim_dari` varchar(100) NOT NULL,
  `berat_produk` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `harga`, `stok`, `gambar_produk`, `type`, `merek`, `jenis_kelamin`, `bahan`, `negara_asal`, `dikirim_dari`, `berat_produk`) VALUES
(2, 6, 'tas wanita - Faux Leather Crossbody', 'Size 25x14x9cm<br/>\r\nQUALITY VIP PLATINUM 1:1<br/>\r\n(Berdasarkan ORIGINAL)<br/><br/>\r\n<table>\r\n<tr><td>MATERIAL</td><td>: Lambskin Leather</td></tr>\r\n<tr><td>INCLUDE</td><td>: Invoice, Dustbag, Box Magnet</td></tr>\r\n<tr><td>BERAT</td><td>: 1.3 KG (INCLUDE BOX)</td></tr>\r\n</table>', 450000, 533, 'assets/img/product/tas/tas-8.jpg', 'tas', 'Tertasan', '2', 'lambskin leather', 'Indonesia', 'Bandung', 0.7),
(4, 2, 'Kemeja Flanel Lengan Panjang', '✓Keluaran Terbaik langsung dari konveksi Mempunyai Spesialis\\n Dalam Produksi Pakaian Pria Yang Mana Saat ini Memproduksi Kemeja \\nflanels Berbahan Semi Woll Premium, Dalam industri tekstil dan \\nkonveksi, bahan ini sering di sebut kain Flanel yang merupakan \\nsalah satu jenis kain dengan bahan dasar Woll Terbaik. inilah \\njenis bahan yang di sukai oleh orang2 di seluruh dunia, karna \\ntekstur dan permukaannya yang halus, sehingga sanggat lembut \\ndikulit saat digunakan. Cocok Bagi Keseharian Anda yang Ingin \\nTampil Trendi.\\n\\n\nESTIMASI SIZE : MUNGKIN ADA SEDIKIT PERBEDAAN UKURAN SEKITAR 1-2 CM\\n\nM ( 50cm x 70cm )\\n\nL ( 52cm x 72cm )\\n\nXL ( 54cm x 74cm )\\n', 100000, 0, 'assets/img/product/kemeja/kemeja-.jpg', 'Kemeja', 'Flanel', '3', 'Woll', 'Indonesia', 'Bandung', 0.5),
(5, 6, 'Kemeja Kasual Wanita', 'Kemeja wanita motif kotak kotak kasual, ready size M, L, XL\n\nKemeja berbahan kain kualitas tinggi dengan harga yang terjangkau, tidak gerah ketika di kenakan di bawah sinar matahari', 230000, 2283, 'assets/img/product/kemeja/kemeja-motif-kotakkotak.jpg', 'Kemeja', 'Jostar', '1', 'Kain', 'Jerman', 'Bandung', 0.5),
(6, 6, 'Celana pendek korea atau hot pents', 'PROUDLY PRESENT “spandek  premium” 🥺✨\nFINALLY OUT! 🥳\\n\nKode: celana cewe pendek\\n\nBahan: spandek premium\\n\nUkuran: \nAll size\\n lingkar pinggang: 60cm - 100cm (stretch / flexible) \\nRekomendasi BB: 40kg-60kg\\n\\n\npanjang celana 30 cm\n\\nlebar paha  kiri kanan 25 cm', 50000, 251, 'assets/img/product/celana-wanita/celana-pendek.jpg', 'Celana', 'Hot pants', '2', 'Spandek premium', 'Indonesia', 'Bali', 0.6),
(7, 2, 'Baju lengan panjang pria kayser martins keren', 'Feel the comfort, Kayser t- shirt terbuat dari bahan Premium combed kualitas terbaik yang sejuk dan lembut. nyaman dipakai, design Exclusive, Simple & Fashionable. \r\n\r\n- > Detail:\r\nBaju Lengan Panjang model Sweater\r\nBahan: Babyterry, kelebihannya mudah menyerap keringat.\r\nModel Slim Fit\r\nMotif sablon : Halus dan Lembut, warna Solid, Disablon dengan heat press sistem bukan manual (tangan)\r\nada kantong Sleting hidup di bagian kiri Lengan.\r\nLeher manset dan tangan manset menggunakan RIB Good Quality\r\nTidak Pudar (Tajam),Tahan Lama dan tidak mudah Melar\r\n\r\n- > Detail Size:\r\n- Size M - L : Lingkar Dada 104CM x Panjang Baju 70CM, \r\nLebar dada: 52CM\r\n\r\n- UKURAN XL\r\nLingkar Dada 110CM x panjang baju 72CM\r\nLebar Dada 55CM\r\n\r\n- UKURAN XXL\r\nLingkar Dada 114CM x panjang baju 74CM\r\nLebar Dada 57CM\r\n\r\nmengutamakan quality control sebelum pengiriman \r\n- Pengiriman 100% AMAN', 110000, -1, 'assets/img/product/baju/baju-kayser martins.jpg', 'Baju', 'Kayser martins', '1', 'Premium Combed', 'Indonesia', 'Jakarta', 0.6),
(8, 2, 'Topi Baseball Challenge Distro', 'Pengatur ukuran : clip besi <br/>\r\nLogo : bordir komputer (lebih rapi & kuat) <br/>\r\nLogo berbahan polyflex import korea<br/>\r\nDibelakang ada clipper untuk mengatur size topi agar muat ke kepala pengguna', 50000, 180, 'assets/img/product/topi/topi_challenge.jpg', 'Topi', 'Challenge', '3', 'Polyflex', 'Korea', 'Indonesia', 0.5),
(11, 2, 'Topi Brixton Premiun', 'Topi Baseball / Snapback / Trucker <br/>\r\nBahan drill / Cotton standar distro berkualitas<br/>\r\nJahitan rapi dan kuat nyaman untuk di pakai pria atau pun wanita<br/>\r\nLogo / gambar depan sablon Karet timbul hight Quality (flock / Bludru)', 100000, 45, 'assets/img/product/topi/topi_brixton.jpg', 'Topi', 'Brixton', '3', 'Beludru', 'USA', 'Indonesia', 0.5),
(12, 2, 'Topi Under Amour Original', 'UA Blitzing Adjustable Cap BNWT ( Brand New With Tag ) 100% Original', 400000, 97, 'assets/img/product/topi/under_armour.jpg', 'Topi', 'Under Armour', '3', 'Polyester', 'USA', 'Indonesia', 0.5),
(14, 2, 'Topi Los Angeles Lakers Import Premium', '*Material: Cotton <br/>\r\n*Bordir: Tebal <br/>\r\n*Lingkar kepala: 54-60 cm<br/>\r\n*Ukuran: Bisa diperbesar dan diperkecil<br/>\r\n*Unisex: Bisa dipakai Cewek dan Cowok', 300000, 309, 'assets/img/product/topi/topi_lakers.jpg', 'Topi', 'Los Angeles Lakers', '3', 'Cotton', 'China', 'Indonesia', 0.5),
(15, 6, 'ROK POLOS MAYUNG PREMIUM - BASIC SKIRT  - MAY SKIRT ROK', 'new arrival MAY SKIRT by Teampa4t Shoping !!\\n\nrok simple cantik feminim cocok untuk kerja kuliah hangout dan ootd-an\\n   \n\nbahan hyget\\n\n(nyaman tidak terawang dan adem)\\n\nmodel rok mayung\\n\nada kantong di 1 sisi\\n\nbelakang tidak ad belahan / jahitan \\n\npolos full\\n\npinggang karet\\n\nbgs bgt wajib punya !! \\n\\n\n\nukuran\\n\nP 90cm\\n\nLP 50 - 130cmn\\n\nbisa melar banyak\\n\nALLSIZE yaaa hanya 1 ukuran \\n\n\nsemua warna ad foto realpic yang digantung', 66000, 2904, 'assets/img/product/rok/ROK POLOS MAYUNG PREMIUM - BASIC SKIRT - MAY SKIRT ROK.jpg', 'Rok', 'Savier', '2', 'Hyget', 'Kore', 'Bandung', 0.6),
(16, 2, 'Topi Nike Original', 'Kain dengan efek pudar di bagian crown membuat Nike Sportswear Bucket Cap terasa nyaman dikenakan. Struktur crown dan brown berpotongan santai memberikan style laidback serta penutup kepala yang lebih lebar untuk melindungi dari cuaca.<br>\r\nBahan twill dengan efek pudar yang lembut dan tahan lama. Sweatband yang menyerap keringat menjagamu tetap sejuk dan kering. Aksen grafis dan embroidery di bagian depan tengah menambah tekstur dan kebanggaan pada brand.', 300000, 442, 'assets/img/product/topi/topi_nike.jpg', 'Topi', 'Nike', '3', 'Katun', 'USA', 'USA', 0.5),
(17, 6, 'ROK RAJUT KOREAN STYLE WANITA FEMININ TEBAL', 'Satu lagi model terbaru dari toko kami,Rok santai, Rok kerja yg dapat mendukung aktivitas anda sehari-hari,bahan rajut halus tidak membuat panas di badan, dengan pilihan warna warna yg menarik\r\n\r\nBahan Knit premium TEBAL\r\nPanjang : 63 cm\r\nLingkar pinggang : 64 - 110 cm max 80kg\r\nUntuk bagian pinggangnya,sudah di lengkapi karet ya ka\r\nUkuran Allsize fit to XL', 56000, 7660, 'assets/img/product/rok/rok-ROK RAJUT KOREAN STYLE WANITA FEMININ TEBAL.jpg', 'Rok', 'Spainves', '2', 'Knit', 'Korea', 'Bandung', 0.6),
(18, 2, 'Casual Bodycon Slip Knit Midi Rok Skirt 2128', 'Casual Bodycon Slip Knit Midi Rok Skirt 2128\r\n\r\nFabric : Knitt\r\n\r\n\r\nColor : Light Grey, Dark Blue, Dark Grey, Black\r\n\r\nDetail Size (cm) :\r\nLingkar Pinggang 60-100,  Panjang Rok 70', 60000, 4464, 'assets/img/product/rok/rok-Casual Bodycon Slip Knit Midi Rok Skirt 2128.jpg', 'Rok', 'Spainves', '2', 'Knit', 'Korea', 'Bandung', 0.6),
(19, 6, 'Topi Howler Bros Original', 'Crown height: Medium<br>\r\n\r\nCurved brim<br>\r\n\r\nFully adjustable hook and loop closure<br>\r\n\r\nHowler Monkey icon tag at back left<br>\r\n\r\nNavy under brim to reduce glare<br>\r\n\r\nSix panel design', 500000, 46, 'assets/img/product/topi/topi_howler.jpg', 'Topi', 'Howler Bros', '3', 'Polyester', 'USA', 'Indonesia', 0.5),
(20, 6, 'Rok Pendek Polos Wanita - ROK MIDI FLARE SKIRT', 'Rok Pendek Polos Wanita / ROK MIDI FLARE SKIRT\r\n\r\nBarang Ready Stok ya ka !\r\n\r\nDetail Produk :\r\n-Nama Bahan Scuba Premium\r\n-Material Bahan Tebal,melar,halus & tidak nerawang jadi sangat nyaman di pakai ya kak.\r\n-Pinggang Karet sangat elastis.\r\n\r\nDetail Size/Ukuran :\r\n-All Size fit to XL\r\n- Panjang rok    : -/+ 55 cm\r\n-Lingkar pinghang : 70 cm setelah melar full bisa sampai 100 cm.', 76000, 9986, 'assets/img/product/rok/rok-Rok Pendek Polos Wanita _ ROK MIDI FLARE SKIRT.jpg', 'Rok', 'Savier', '2', 'Scuba Premium', 'Indonesia', 'Bandung', 0.6),
(21, 2, 'Topi Chicago Bulls 66 Import Premium', '*Material: Cotton\r\n*Bordir: Tebal\r\n*Lingkar kepala: 54-60 cm\r\n*Ukuran: Bisa diperbesar dan diperkecil\r\n*Unisex: Bisa dipakai Cewek dan Cowok', 350000, 11, 'assets/img/product/topi/topi_chicago.jpg', 'Topi', 'Chicago Bulls 66', '3', 'Cotton', 'China', 'Indonesia', 0.5),
(22, 6, 'ROK JKT 48 - KOREAN MINI SKIRT - ROK LIPIT - ROK TENIS - ROK KOREA', 'Bahan katun semi woll tebal(bukan polyester) jadi kain lebih adem lebih nyaman lebih lembut , premium quality, ada zipper di samping\r\n\r\nuntuk abu bahan katun yanded \r\n\r\nsebelum membeli silahkan ukur pinggang anda agar tidak terjadi kesalahan ukuran dalam pembelian\r\n\r\nDetail Size (cm) :\r\nXS : Lingkar pinggang 60cm, lingkar pinggul 70 ,panjang 37cm\r\nS : Lingkar pinggang 64, Lingkar pinggul 76,panjang 37\r\nM : Lingkar Pinggang 68, Lingkar Pinggul 80 ,Panjang 37\r\nL : Lingkar Pinggang 73, Lingkar Pinggul 84, Panjang 38\r\nXL : Lingkar Pinggang 76, Lingkar Pinggul 88, Panjang 39', 57000, 4397, 'assets/img/product/rok/rok-ROK JKT 48 - KOREAN MINI SKIRT - ROK LIPIT - ROK TENIS - ROK KOREA.jpg', 'Rok', 'Spainves', '2', 'Katun', 'Jepang', 'Bandung', 0.6),
(23, 2, 'Topi Vans Original', 'Brand New dan Dijamin Original!!! Limited Stock..Grab it Fast', 400000, 99, 'assets/img/product/topi/topi_vans.jpg', 'Topi', 'Vans', '3', 'Cotton', 'USA', 'USA', 0.5),
(24, 6, 'Korean Mini Skirt Preppy Plaid Rok Lipit Motif Kotak Kotak 2145 ', 'Korean Mini Skirt Preppy Plaid Rok Lipit Motif Kotak Kotak 2145 (S-XXL)\r\n\r\nBahan : Polyester Import Premium Quality\r\n*Bahannya Tidak Melar\r\n*Ada Zipper Disamping\r\n*Ada Furing Celana \r\n\r\nDetail Size (cm) :\r\nS : Lingkar Pinggang 68, Lingkar Pinggul 78, Panjang 36\r\nM : Lingkar Pinggang 72, Lingkar Pinggul 80 ,Panjang 37\r\nL : Lingkar Pinggang 76, Lingkar Pinggul 84, Panjang 38\r\nXL : Lingkar Pinggang 80, Lingkar Pinggul 88, Panjang 39\r\nXXL : Lingkar Pinggang 84, Lingkar Pinggul 92, Panjang 40\r\n\r\nDisarankan untuk BB \r\nS    : 50-55 KG\r\nM   : 55-60 KG \r\nL    : 60-65 KG \r\nXL  : 65-70 KG\r\n\r\nCara Pencucian \r\n- Di sarankan tidak mencuci dengan mesin cuci \r\n- Tidak bisa di rendam terlalu lama\r\n- Tidak bisa di sikat', 50000, 8895, 'assets/img/product/rok/rok-Korean Mini Skirt Preppy Plaid Rok Lipit Motif Kotak Kotak 2145 (S-XXL).jpg', 'Rok', 'ANOS', '2', 'Polyester', 'Korea', 'Bandung', 0.6),
(25, 6, 'KARAKOREA 8201Korean Mini Skirt Preppy Plaid Rok Lipit - Rok Mini - Motif Garis', 'Produk Impor \r\n\r\nMaterial/Bahan Cotton Polyster\r\n\r\nAda celana furing di dalam \r\n\r\nAda 6 Size \r\n1. Size S \r\nUkuran Rok \r\nWaist/Lingkar Pinggang 66cm \r\nHip/Lingkar Pinggul 78cm \r\nLength/Pj Rok 40cm \r\nUkuran Celana di dalam \r\nHip/Lingkar Pinggul 78cm \r\n\r\n\r\n\r\n2. Size M\r\nUkuran Rok \r\nWaist/Lingkar Pinggang 70cm \r\nHip/Lingkar Pinggul 82cm \r\nLength/Pj Rok 40cm \r\nUkuran Celana di dalam \r\nHip/Lingkar Pinggul 82cm \r\n\r\n\r\n\r\n3. Size L\r\nUkuran Rok \r\nWaist/Lingkar Pinggang 74cm \r\nHip/Lingkar Pinggul 86cm \r\nLength/Pj Rok 41cm \r\nUkuran Celana di dalam \r\nHip/Lingkar Pinggul 86cm \r\n\r\n\r\n4. Size XL\r\nUkuran Rok \r\nWaist/Lingkar Pinggang 78cm \r\nHip/Lingkar Pinggul 90cm \r\nLength/Pj Rok 42cm \r\nUkuran Celana di dalam \r\nHip/Lingkar Pinggul 90cm \r\n\r\n\r\n\r\n5. Size XXL\r\nUkuran Rok \r\nWaist/Lingkar Pinggang 82cm \r\nHip/Lingkar Pinggul 96cm \r\nLength/Pj Rok 43cm \r\nUkuran Celana di dalam \r\nHip/Lingkar Pinggul 96cm \r\n\r\n\r\n\r\n6. Size XXXL\r\nUkuran Rok \r\nWaist/Lingkar Pinggang 86cm \r\nHip/Lingkar Pinggul 100cm \r\nLength/Pj Rok 43cm \r\nUkuran Celana di dalam \r\nHip/Lingkar Pinggul 100cm', 66000, 4454, 'assets/img/product/rok/rok-KARAKOREA 8201Korean Mini Skirt Preppy Plaid Rok Lipit - Rok Mini - Motif Garis.jpg', 'Rok', 'ANOS', '2', 'Polyester', 'Korea', 'Bandung', 0.6),
(26, 6, 'Premium - Korean Mini Skirt A-Line Plain Rok Pendek C655', '[Premium] Korean Mini Skirt A-Line Plain Rok Pendek C655 (S/M/L)\r\n\r\nBahan: Polyester Import Premium Quality\r\n*Terdapat Resleting Dibagian Belakang \r\n*Terdapat Furring  \r\n\r\nDetail Size (cm) :\r\nS : Lingkar Pinggang 62, Lingkar Paha 86, Panjang 37\r\nM : Lingkar Pinggang 66, Lingkar Paha 90  Panjang 38\r\nL : Lingkar Pinggang 70, Lingkar Paha 94, Panjang 39\r\n\r\nDisarankan untuk BB \r\nS    : 50-55 KG\r\nM   : 55-60 KG \r\nL    : 60-65 KG \r\n\r\nCara Pencucian \r\n- Di sarankan tidak mencuci dengan mesin cuci \r\n- Tidak bisa di rendam terlalu lama\r\n- Tidak bisa di sikat', 79000, 6668, 'assets/img/product/rok/rok-[Premium] Korean Mini Skirt A-Line Plain Rok Pendek C655 (S_M_L).jpg', 'Rok', 'ANOS', '2', 'Polyester', 'Indonesia', 'Bandung', 0.6),
(27, 6, 'KOREAN HIGH WAIST PLEATED MINI SKIRT STRIPE', 'PENTING!!!\r\nBACA DESKRIPSI SEBELUM ORDER \r\n\r\n-PRODUK PREE ORDER\r\n•Untuk Custom Size Waktu Pree Order 3 Harian\r\n\r\n•WARNA GARIS SESUAI DI GAMBAR\r\n•BISA REQUEST WARNA GARIS ( CANTUMKAN DI DESKRIPSI)\r\n•BISA CUSTOM UKURAN\r\n•ROK AJA (KHUSUS YANG PUTIH ADA FURINGNYA)\r\n\r\n-SIZE CHART -\r\n(S).      Lingkar Pinggang : 66 | Panjang : 36\r\n(M).     Lingkar Pinggang : 68 | Panjang : 37\r\n(L)       Lingkar Pinggang : 73 | Panjang : 38\r\n(XL)     Lingkar Pinggang : 76 | Panjang : 39\r\n(XXL)  Lingkar Pinggang : 80 | Panjang : 41\r\n(CUSTOM) : Ukuran Tulis Di Note(Maksimal ukuran Lingkar pinggang 100 & Panjang 50,jika custom melebihi dari batas ukuran maksimal,orderan tidak akan kami proses)\r\nRESLETING DI BAGIAN BELAKANG\r\n\r\n-PENGEMBALIAN BARANG/DANA-\r\n•Tidak di terima jika Pembeli Merasa Rok tidak Muat/Kegedean,Karena di deskripsi sudah ada Size chart.\r\n•Tidak Di Terima Jika Pembeli Memberikan Bintang 1-3.\r\n•Akan di terima jika memang itu kesalahan dari Kami.\r\n•Akan di Terima jika Produk Rusak (di sertakan vidio unboxing/Foto Produk)\r\n\r\nPRODUKSI SENDIRI ✓\r\nDI CEK SEBELUM PENGEMASAN✓\r\n\r\nTHAN', 70000, 1667, 'assets/img/product/rok/rok-KOREAN HIGH WAIST PLEATED MINI SKIRT STRIPE.jpg', 'Rok', 'Savier', '2', 'Polyester', 'Indonesia', 'Bandung', 0.6),
(28, 6, 'ROK MINI KOREA - ROK TENIS FLARE - PLEATED SKIRT KOREAN TENNIS SKIRT', 'Hello-!\r\nWelcome to Sunrise Shop 🔅\r\n\r\n- Mohon masukkan alamat yang lengkap dan nomor telfon yang bisa dihubungi saat order \r\n- Kami kirim sesuai pesanan, mohon order sesuai variasi yang diinginkan\r\n- TIDAK menerima perubahan warna di chat/note \r\n- WAJIB VIDEO UNBOXING 📹 Tanpa video unboxing, kerusakan / kekurangan produk TIDAK diterima \r\n- 90% Produk ready ya, akan kami konfirmasi dulu kalau ada produk yang kosong \r\n\r\nHappy Shopping ☺🙏\r\n\r\nTENNIS SKIRT SR-182\r\nBahan katun\r\n•Terdapat resleting/zipper di samping\r\n•Terdapat karet di bagian pinggang\r\n•Produk sesuai dengan gambar\r\n\r\nUkuran:\r\nSIZE S\r\nLingkar pinggang 50 cm melar sampai 60 cm\r\nPanjang 35 cm\r\n\r\nSIZE M\r\nLingkar Pinggang : 60 cm melar sampai 70 cm\r\nPanjang : 42 cm\r\n\r\nSIZE L\r\nLingkar pinggang : 70 cm melar sampai 85 cm\r\nPanjang : 42 cm\r\n\r\nSIZE XL\r\nLingkar Pinggang 80 cm melar sampai 100 cm\r\nPanjang 45 cm\r\n\r\nSAFETY PANTS\r\nLP 60 cm melar sampai 90 cm\r\nP 35-40 cm', 38000, 2003, 'assets/img/product/rok/rok-ROK MINI KOREA _ ROK TENIS FLARE _ PLEATED SKIRT KOREAN TENNIS SKIRT.jpg', 'Rok', 'Spainves', '2', 'Polyester', 'Indonesia', 'Bandung', 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `favorit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone_number`, `favorit`) VALUES
(1, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', '[\"3\",\"20\",\"8\",\"2\",\"4\",\"26\",\"25\",\"24\",\"28\",\"16\",\"5\",\"6\"]'),
(2, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(3, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(4, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(5, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(6, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(7, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(8, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(9, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(10, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(11, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(12, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(13, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111', ''),
(14, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111', ''),
(15, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111', ''),
(16, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111', ''),
(17, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111', ''),
(18, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '111111111111', ''),
(19, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(20, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary', '082399480587', ''),
(21, 'ary', 'c4ca4238a0b923820dcc509a6f75849b', 'ivankomang@ary', '082399480587', ''),
(22, 'mudle', 'c4ca4238a0b923820dcc509a6f75849b', 'Moodle_komang@ary', '082399480587', ''),
(23, 'ary123', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@aryasas', '082399480587', ''),
(24, 'aryarte', 'c4ca4238a0b923820dcc509a6f75849b', 'komang@ary123', '082399480587', ''),
(25, 'ary12_ary', '202cb962ac59075b964b07152d234b70', 'komang@ary.com', '082399480587', ''),
(26, 'aryantara', 'c20ad4d76fe97759aa27a0c99bff6710', 'komang@ary12', '019228931723', ''),
(27, 'Bebas', 'c4ca4238a0b923820dcc509a6f75849b', 'hsjhdakhskdhkajh@djkd.id', '78682637462873', '[\"1\",\"4\",\"21\"]'),
(28, 'gung sony ', '3da015fb8727d60123f0543d2e6a63fa', 'awaggen@gmail.com', '62718361237231', '[\"5\"]'),
(29, 'gung sony 2', '3da015fb8727d60123f0543d2e6a63fa', 'xinjiangcrosin@gmail.com', '90024892304290', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
