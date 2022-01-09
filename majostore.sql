-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2022 pada 05.07
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majostore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_usaha`
--

CREATE TABLE `jenis_usaha` (
  `id` int(11) NOT NULL,
  `jenis_usaha` varchar(110) NOT NULL,
  `craated_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_usaha`
--

INSERT INTO `jenis_usaha` (`id`, `jenis_usaha`, `craated_at`, `updated_at`) VALUES
(1, 'Makanan', NULL, NULL),
(2, 'Pakaian', NULL, NULL),
(3, 'Alat Elektronik', NULL, NULL),
(4, 'Kebutuhan Rumah Tangga', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `tanggal_pembelian` varchar(110) NOT NULL,
  `status_order` enum('keranjang','order','proses','kirim','selesai') NOT NULL DEFAULT 'keranjang',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id`, `id_pembeli`, `id_produk`, `jumlah_produk`, `tanggal_pembelian`, `status_order`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, 1, '9-January-2022', 'kirim', '2022-01-08 20:52:57', '2022-01-08 21:01:15'),
(2, NULL, 1, 4, 2, '9-January-2022', 'kirim', '2022-01-08 20:53:06', '2022-01-08 21:03:18'),
(3, NULL, 1, 11, 2, '9-January-2022', 'kirim', '2022-01-08 20:53:13', '2022-01-08 21:02:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_08_090050_create_jenis_table', 1),
(4, '2019_03_08_090224_create_ruang_table', 1),
(5, '2019_03_08_090326_create_inventaris_table', 1),
(6, '2019_03_08_090636_create_petugas_table', 1),
(7, '2019_03_08_090842_create_pinjam_table', 1),
(8, '2019_03_08_090939_create_peminjaman_table', 1),
(9, '2019_03_08_091241_create_pegawai_table', 1),
(10, '2019_03_08_092159_create_status_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `nama_produk` varchar(225) NOT NULL,
  `harga` varchar(110) NOT NULL,
  `desc` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `image` varchar(225) NOT NULL,
  `jumlah_terjual` int(11) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `id_pemilik`, `nama_produk`, `harga`, `desc`, `Quantity`, `status`, `image`, `jumlah_terjual`, `id_kategori`, `created_at`, `updated_at`) VALUES
(1, 2, 'Cordless Vacuum Cleaner Stick', '978000', '📌--- Gambaran ---\r\nPenyedot debu nirkabel ungu elegan yang ringan dan ramping untuk penanganan yang mudah dan kemudahan pergerakan untuk pembersihan furnitur rumah.\r\n\r\n📌--- Fitur ---\r\nPenyedot debu tanpa kabel untuk memastikan pembersihan tanpa masalah kabel yang kusut\r\nRingan, desain ramping untuk penanganan mudah\r\nDesain pegangan yang dioptimalkan untuk wanita\r\nFitur peredam bising untuk meminimalkan kebisingan selama pembersihan\r\nBaterai isi ulang dan waktu pembersihan hingga 34 menit\r\nlampu LED untuk memudahkan pemantauan status pengisian daya dan level baterai\r\nPaling baik digunakan untuk membersihkan sofa, kasur, tirai, keyboard, lemari\r\nKontrol kecepatan ganda dengan menekan sebuah tombol\r\nKecepatan Rendah (Untuk pembersihan cepat dan hemat energi dengan kebisingan minimum)\r\nKecepatan Tinggi (Untuk pembersihan lantai dalam)\r\nDurasi | Kecepatan rendah (34 menit); Kecepatan tinggi (15 menit)\r\nDaya hisap maks 19.000 Pa\r\n\r\n📌--- Tambahan Accesories Yang dapat Di Beli ---\r\nKuas Tungau\r\nPenyangga Vakum\r\nTabung/Selang Fleksibel\r\n\r\n📌--- Spesifikasi ---\r\nBerat Genggam | 1.6KG\r\nKapasitas cangkir debu | 0.6L\r\nKekuatan | 150W\r\nKapasitas baterai | Li-ion 2200 mAh\r\nTegangan | 110-240V AC, 50 / 60Hz\r\nUkuran paket | 680 x 185 x 145 mm\r\nTingkat suara | 50-60db\r\nTanda Keamanan\r\n\r\n📌--- T&C Garansi -\r\nGaransi secara otomatis diaktifkan saat produk dikirimkan ke pelanggan. Garansi Airbot mencakup komponen elektronik utama dan motor.\r\nNamun, itu tidak mencakup:\r\n1. Kerusakan yang disebabkan oleh kesalahan manusia, penyalahgunaan\r\n2. Goresan, penyok, bekas kotoran, atau kerusakan mekanis lainnya\r\n3. Degradasi baterai\r\n4. Bagian-bagian seperti sikat berbulu halus, filter HEPA, roda penggulung, penampung debu, yang merupakan bahan habis pakai dan dapat mengalami Kerusakan\r\n\r\n📌--- Isi di dalam kotak ---\r\nUnit genggam vakum\r\nBaterai tertanam\r\nCangkir debu (dapat dicuci, dapat digunakan kembali)\r\nFilter (dapat dicuci, dapat digunakan kembali)\r\nCup Filter \r\nBatang tenggorok\r\nSikat\r\nNosel celah\r\nDok pengisi daya\r\nKabel daya adaptor \r\nPanduan pengguna', 29, 'active', 'Cordless Vacuum Cleaner Stick.PNG', 1, 3, '2022-01-08 20:12:05', '2022-01-08 20:55:06'),
(2, 2, 'COOCAA 32 inch Digital Smart TV', '1952000', 'Changhong Google certified Android Smart TV 32 Inch Digital TV HD LED TV (Model：L32H4) \r\n\r\n[Harap membaca semua ketentuan packing & garansi, membeli berarti setuju]\r\n\r\n(BISA GOSEND, pilihan gosend otomatis muncul apabila jarak <40KM, pengiriman dari cikupa tangerang)\r\n\r\nKabar gembira untuk Sobat Shopee!\r\nper tgl 13 Januari 2021 setiap pembelian Android Smart TV Changhong tipe L32H4, L43H4 dan U58H7A akan mendapatkan GRATIS berlangganan aplikasi Vidio selama 3 bulan! keuntungan menjadi member VIP aplikasi vidio antara lain: \r\n-FREE akses 45 TV channel lokal & internasional\r\n-FREE live streaming sport event international\r\n-FREE akses film lokal & international dan juga kdrama! \r\n\r\n(Geser foto produk untuk tau cara aktifasi nya)\r\n\r\nGaransi Resmi Panel LED 5 thn\r\nGaransi Resmi Sparepart 1 thn\r\n\r\n- Certified Android 9.0（Pie） OS\r\n- resolution 1366*768\r\n- Ram 1 GB Rom 8GB\r\n- Netflix ready (Produksi baru pertengahan Mei 2020 bisa netflix semua)\r\n- Google assistant ready\r\n- Google play ready\r\n- Youtube ready\r\n- Bluetooth voice remote ready\r\n- Bluetooth 5.0\r\n- Built in Wifi dan Lan \r\n- Dolby sound ready\r\n- HDR ready\r\n- Chromcast bulit in\r\n- Port detail：[side: HDMI1.4*2、AV*1、RF *1、USB*1、Digital audio out*1、EARPHONE *1 ]\r\n- Android smart tv (tinggal connect Wifi) siaran tv biasa digital + analog (tinggal pasang antena)\r\n- LiveTV, Browser, Amazon prime video, Google Play Movies & TV, Google Play Music, Media, Google Play Game, etc. \r\n- Dimensi (with stand) (W*D*H) ：731.4*178.8*480.9mm\r\n- Dimensi (without stand) (W*D*H) ：731.4*80.4*434.9mm\r\n- Carton Dimension (W*D*H) ：815*135*515mm\r\n- VESA 200*200mm', 3, 'active', 'tv.PNG', NULL, 3, '2022-01-08 20:20:43', '2022-01-08 20:20:43'),
(3, 2, 'SETRIKA LISTRIK', '63000', 'Detail produk dari YAMAKAWA Setrika Iron Anti Lengket \r\nBahan teflon anti lengket\r\nDaya 300 Watt\r\nTerdapat lampu indikator kondisi panas\r\nTombol pengatur suhu\r\ndesain elegan\r\nmudah digunakan\r\n\r\nYAMAKAWA Setrika Kering adalah setrika yang fungsional sehingga Anda dapat dengan mudah menyetrika pakaian. Dengan alas yang terbuat dari bahan anti lengket, kegiatan menyetrika akan lebih mudah dan aman. Bagian bawah setrika didesain sedemikian rupa sehingga dapat menjangkau sisi baju yang sulit sekalipun. Setrika yang ringan ini dilengkapi dengan alas dari bahan teflon anti lengket.\r\n\r\nIndikator\r\nTerdapat lampu indikator yang akan menunjukan kondisi panas pada lempengan alas setrika dan menyala jika setrika siap dipakai. Terdapat pula pengatur suhu untuk segala jenis bahan pakaian dengan tingkat kepanasannya yang berbeda agar menghasilkan hasil setrikaan yang lebih maksimal.\r\n\r\nRingkasan Teknis\r\nSetrika ini mampu menjangkau bagian yang sulit pada pakaian Anda. Merapikan segala jenis pakaian bukanlah menjadi hal yang susah lagi bagi semua orang. Setrika Yamakawa hadir dengan lempengan alas yang terbuat dari bahan Teflon sehingga anti lengket dan licin. Kegiatan menyetrika akan menjadi lebih mudah, cepat dan menyenangkan.\r\n\r\nSpesifikasi :\r\n\r\nUkuran Produk (mm) : 240 x 100 x 110\r\nUkuran Kemasan (mm) : 240 x 110 x 110\r\nBerat Barang : 0.6 kg\r\nTegangan (v) : AC 220\r\nFrekuensi (Hz) : 50-60\r\nDaya : 300 Watt', 12, 'active', 'setrika.PNG', NULL, 3, '2022-01-08 20:22:41', '2022-01-08 20:22:41'),
(4, 2, 'Kipas Karakter Welhome', '53000', 'Hembusan angin yg di hasilkan kencang halus dan tidak berisik\r\nBisa 2 kecepatan (on 1 low. on 2 high speed)\r\nBerstandard SNI (aman)\r\n\r\nSpesifikasi:\r\nDaya : 28wat\r\nUkura10 inch / 25cm\r\nDimensi : (Dalam x Lebar x Tinggi)= 25x30x30cm3\r\nVoltase : 220volt / AC. 50hz\r\n\r\nDesain yang unik dan lucu, warna sesuai. praktis bisa di bawa kemana saja dan di pindah pindah kan.\r\npanjang kabel 1,8 meter\r\nCocok untuk di kamar dan ruang tamu. dan buat kado juga oke\r\n\r\nTersedia Karakter :\r\n- Hellokitty\r\n- Doraemon\r\n- Minion \r\n- Cars \r\n- pinguin\r\n- Keropy\r\n- Mario Bros\r\n( wajib berikan cadangan karakter, bila req kosong akan dikirim random, no complain/cancel )\r\n\r\nProduk Non Garansi , kami akan cek sebelum kirim\r\nNo Complain\r\nNo Retur', 6, 'active', 'kipas.PNG', 5, 3, '2022-01-08 20:24:06', '2022-01-08 20:55:06'),
(5, 2, 'Kellogg\'s Breakfast Cereal Coco Pops 220g', '21000', 'Kellogg Coco Pops Sereal terbuat dari beras berkualitas dan kakao Asli untuk sarapan pagi yang lezat dan renyah. Sereal Ini berisi 8 nutrisi penting (vitamin A, B1, B2, B3, B6, B9, C and zat besi) untuk kebutuhan tubuh. Jadi tidak hanya anak-anak Anda dapat menikmati kesenangan dan petualangan Coco dan gengnya akan tetapi kebutuhan nutrisinya juga terpenuhi. Anda bisa yakin bahwa mereka mendapatkan awal yang baik untuk memulai hari! \r\n\r\nBPOM ML 830510269030', 50, 'active', '1.PNG', NULL, 1, '2022-01-08 20:25:46', '2022-01-08 20:25:46'),
(6, 2, 'Coklat, Roti Maryam Cokelat Lumer Isi 5', '22000', 'Roti maryam atau bisa juga disebut dengan roti cane/canai dibawa masuk ke Indonesia oleh para pedagang Arab yang kemudian menjadi makanan sehari-hari di Indonesia. \r\nDengan rasa yang sangat gurih dan manis, roti maryam dengan mudah menjadi makanan favorit orang Indonesia. \r\nSetelah ribuan produk terjual, Tasaji Food masih setia mengeluarkan produk makanan favorit. Kali ini produk kami adalah Roti Maryam / Roti Cane Cokelat. \r\nMengapa kamu harus memilih produk tersebut? \r\n \r\n1. DIAMBIL DARI BAHAN PILIHAN TERBAIK, diambil dari tepung dan mentega pilihan, kami selalu menjaga kualitas rasa roti maryam sejak pertama kali dibuat sampai sekarang \r\n2. PERPADUAN MESIS COKELAT YANG SEMPURNA, kami menjaga hanya takaran gram mesis cokelat yang dicampurkan ke dalam roti maryam. Ini akan membuat rasa dari roti maryam terjaga kelezatan dan originalitasnya \r\n3. COCOK DIGUNAKAN UNTUK OLEH-OLEH, ingin memberikan oleh-oleh terhadap sanak saudara? Produk kami bakal sangat cocok untuk digunakan oleh-oleh karena rasa dan kemasannya yang baik \r\n4. KEMASAN YANG MENARIK DAN KUAT, kami menggunakan plastik khusus yang tebal dan ringan, agar rasa yang dikeluarkan oleh roti maryam ini bisa tahan lama \r\n5. TANPA BAHAN PENGAWET, kami tetap menjaga produk kami agar terus original, jadi kami tidak menggunakan satu pun bahan pengawet  \r\n6. SUDAH TERJUAL RIBUAN DI MARKETPLACE2 TERJEMUKA, kami bisa mengatakan bahwa produk kami merupakan yang terbaik di antara yang terbaik, karena sudah ribuan lebih produk yang terjual, dan terus berlanjut setiap harinya  \r\n \r\nDetail Roti Maryam/Roti Cane: \r\n-	Satu pack isi 5 buah roti maryam \r\n-	Diameter 11 cm \r\n-	Harap dihangatkan terlebih dahulu sebelum disantap \r\n \r\nUntuk informasi dan reseller bisa hubungi kami ya \r\n#tasaji #roticane #rotipratha#rotibakar #rotimaryam #rotimaryamkeju #rotimaryamcoklat#samosa \r\n \r\nPenting untuk di ketahui: \r\n- masa exp yg tercantum di tgl exp 6 bulan semenjak dari tgl produksi \r\n- masa exp untuk penyimpanan suhu ruang 3 hari dan dalam freezer bisa sampai 1thn \r\n-untuk flash sale di hari kerja kita kirim hari itu juga kecuali hari Sabtu dengan pengiriman JNE kita kirim di hari Senin', 5, 'active', '2.PNG', NULL, 1, '2022-01-08 20:28:05', '2022-01-08 20:28:05'),
(7, 2, 'Madu Murni 350 gr Safiya Herbal Premium Original', '25990', 'Madu murni memiliki khasiat yang sangat baik untuk kesehatan tubuh maupun kecantikan. Di negara Eropa dan Asia, madu menjadi salah satu asupan yang dianggap penting dalam menjaga kesehatan dan kecantikan.\r\n\r\nManfaat Madu Murni: \r\n- Bahan Pemanis Alami\r\n- Penurun Berat Badan \r\n- Sumber Energi\r\n- Melembabkan Kulit dan Bibir Kering\r\n- Menambah Stamina Ibu Hamil\r\n- Meredakan Batuk dan Radang Tenggorokan\r\n\r\nAgar paket safety add on Bubble dan Kardus ya kak 😊\r\n\r\nOperasional Toko :\r\n- Pengiriman Setiap Hari\r\n- Close order 14.00 pesanan yang masuk diatas jam tersebut masuk ke hari selanjutnya.', 700, 'active', '4.PNG', 1, 1, '2022-01-08 20:30:42', '2022-01-08 20:49:41'),
(8, 2, 'Saikoro Beef Wagyu Meltik Cubes Steak 2cm2cm pack 250gr', '48500', 'Saikoro Beef Wagyu Meltik Cubes Steak 2cm2cm pack 250gr\r\n\r\nDetail\r\nKemasan : vacuum packed\r\nBerat        : 250gr\r\nKondisi    : frozen\r\nUkuran     : rata 2cm2cm (tidak seperti saikoro lain yg ukuran besar2 dan bentuk tidak beraturan). \r\n\r\nSaikoro merupakan menu khas dari restaurant jepang yang sangat populer. Daging inilah bahan utamanya untuk membuat saikoro steak. \r\n\r\nCara buat saikoro steak pun sangat mudah, hanya cukup dioseng di pan 2-3menit saja api kecil/sedang. Bisa langsung dimasak dalam kondisi beku dan tanpa bumbu dan tanpa minyak KARENA POTONGAN SAIKORO INI SUDAH ADA RASANYA. Ingat masaknya cukup 2-3 menit saja ya..biar juicy dagingnya tetap bertahan dan daging tidak keras.\r\n\r\nBisa ditambahkan saos teriyaki/yakiniku apabila ingin lebih otentik Jepang. \r\n\r\nTekstur daging lembut dan dapat dimakan oleh semua kalangan. Dijamin bakal ketagihan!\r\n\r\nCocok utk jadi hidangan saikoro steak,topping ricebowl, sate saikoro,dll.\r\n\r\n\r\nNOTE:\r\nDaging ini agak berlemak ya, jadi ga perlu heran kalo hampir +- 30% lemak 70% daging . Namanya juga uda SAIKORO = DAGING khas jepang yg JUICY cara makannya hanya dipanggang sebentar aja lalu di makan langsung pakai nasi putih (bukan untuk di goreng\" rendem minyak ya).', 40, 'active', '5.PNG', NULL, 1, '2022-01-08 20:32:45', '2022-01-08 20:32:45'),
(9, 2, 'T-SHIRT KAOS CONVERSE CHEVRON ONE STAR PREMIUM', '65000', 'KAOS CONVERSE BEST ARTICLES \r\nLIMITED EDITION \r\nSO GRAB IT FAST GUYS\r\n\r\nFOTO ASLI BUKAN BOLEH NYOMOT \r\n\r\nSpesifikasi: \r\n\r\nBahan: katun combed 30s\r\nSablon: plastisol \r\n\r\nSize chart: \r\nLebar x panjang \r\nL (52x72cm) \r\nXL (54x74cm) \r\nXXL (56x76cm)\r\nXXL (58x76cm)\r\ntoleransi 1-2cm\r\n\r\nTersedia size jumbo juga, silahkan masuk ke toko kami dan search kaos jumbo / big size\r\n\r\nfull tag label \r\n\r\n* Jadwal pengiriman senin s/d sabtu \r\n* Order dibawah jam 3 sore akan ikut pengiriman  dihari yg sama. Lewat jam tsb ikut pengiriman keesokan harinya\r\n* Komplen harus disertai video unboxing, tanpa itu akan kami tolak \r\n* Tersedia harga grosir', 15, 'active', '6.PNG', NULL, 2, '2022-01-08 20:34:50', '2022-01-08 20:34:50'),
(10, 2, 'Kemeja Oversize Linen Pocket Outer Wanita 330 | Nindi Outer', '95000', 'Detail:\r\nBahan Linen Angel\r\nLingkar Dada : 114 cm \r\nPanjang Baju depan : 74 cm,  belakang 80cm\r\nPanjang Lengan : 52 cm \r\nLingkar Ketiak : 46 cm\r\n\r\n🔍 share and tag us \r\n\r\nNote order :\r\n1. Pesanan akan dikirim sesuai variasi yang dipilih, bukan dari catatan dan chat\r\n2. Barang bisa retur jika reject dan dibicarakan dengan baik tanpa memberi bintang 1-3\r\n3. Jika pembeli memberi bintang 1-3, maka barang tidak akan bisa diretur lagi dalam kondisi apapun\r\n4. Mohon foto produk yang telah diterima dan berikan bintang 5 ya serta komentarnya tentang produk dan pelayanan toko kita. Penilaian kalian akan sangat membantu dalam perkembangan toko kita. Terimakasih', 12, 'active', '7.PNG', NULL, 2, '2022-01-08 20:37:04', '2022-01-08 20:37:04'),
(11, 2, 'Vallina Enjog Dops Gation Sweater Crewneck Outerwear', '95000', 'Vallina Outfit saat ini merupakan salah satu lini outfit muslim terbaik dan berkualitas tinggi di antara Local Brand Indonesia. \r\n\r\nBahan: Fleece\r\nKarakter Bahan : Lembut, ketebalnya pas, sangat nyaman dipakai dan tidak gerah\r\nUkuran: One Size fit L\r\nLD 105 cm (-+)\r\nPanjang 60 - 63 cm (-+)\r\nToleransi ukuran 1-2 cm \r\n\r\n**Warna yang terlihat pada gambar mungkin tidak 100% sama dengan produk yang sebenarnya, disebabkan faktor lighting pada proses photoshoot, atau kondisi gadget yang digunakan untuk melihat gambar\r\n\r\n**Pastikan alamat yang di tulis ketika checkout diisi dengan sangan LENGKAP guna menghindari kendala pengiriman oleh kurir (Sertakan patokan bila perlu)\r\n**Pastikan nomor HP yang diisi dalam alamat ketika checkout mudah dihubungi (Tlp. & Sms) / (Sertakan 2 Nomor Hp bila perlu)', 31, 'active', '8.PNG', 2, 2, '2022-01-08 20:38:40', '2022-01-08 20:55:06'),
(12, 2, 'Embroidery Love Sweater Premium Outerwear', '87000', 'Vallina Outfit saat ini merupakan salah satu lini outfit muslim terbaik dan berkualitas tinggi di antara Local Brand Indonesia. \r\n\r\nBahan: Fleece (Bordir)\r\nUkuran: One Size Fit L \r\nLD: 102 cm (-+)\r\nKualitas Premium\r\n\r\n**Warna yang terlihat pada gambar mungkin tidak 100% sama dengan produk yang sebenarnya, disebabkan faktor lighting pada proses photoshoot, atau kondisi gadget yang digunakan untuk melihat gambar\r\n\r\n**Pastikan alamat yang di tulis ketika checkout diisi dengan sangan LENGKAP guna menghindari kendala pengiriman oleh kurir (Sertakan patokan bila perlu)\r\n**Pastikan nomor HP yang diisi dalam alamat ketika checkout mudah dihubungi (Tlp. & Sms) / (Sertakan 2 Nomor Hp bila perlu)', 6, 'active', '9.PNG', NULL, 2, '2022-01-08 20:39:59', '2022-01-08 20:39:59'),
(13, 2, 'Sprei Waterproof anti ompol anti tahan air size 180x200', '169000', 'SPREI SULTAN WATERPROOF\r\n🌼Ukuran ada variasi ya\r\n  banyak ukuran lain, klik variasi ya\r\n180 x 200 x 30 cm / 160x200x 30cm\r\n🌼Full karet keliling , jadi anti geser yaa ..\r\n🌼Tanpa sarung bantal/sarung guling\r\n🌼KUALITAS IMPORT yaa ..\r\n\r\n✅Material: 100% Rajut Serat Poliester \r\n✅ Tahan Air \r\n✅ Tahan 4 musim (semi, panas, dingin, gugur)\r\n✅ Anti Tungau\r\n\r\n🚫 Cara Merawat 🚫\r\n1. Bisa dicuci menggunakan mesin\r\n2. Gunakan deterjen tanpa pemutih / jangan gunakan pemutih\r\n3. Pengeringan tidak lebih dr 95 F/ 125° karena dapat mempengaruhi membran kedap air\r\n4. Sebaiknya gunakan air dingin untuk membersihkan\r\n5. JANGAN disetrika atau dryclean', 25, 'active', 'a.PNG', NULL, 4, '2022-01-08 20:42:21', '2022-01-08 20:42:21'),
(14, 2, 'GM Bear Alat Pel Lantai 1018 Hitam - Ultra Mop Aclima Black', '99900', 'GM Bear Spin Mop Hitam 1018-Ultra Mop Aclima Black\r\n\r\nJangan kotorkan tangan dan badan hanya untuk mengepel :)\r\n\r\nUltra Mop : Satu ciptaan baru, mop yang berputar 360 derajat. Ultra Mop membantu kita untuk gaya hidup yang bersih dan sehat dengan mudah pada harga yang murah. Ultra mop merupakan peralatan membersih yang mendatangkan berbagai manfaat yang menakjubkan dan mempermudah kita dalam mengepel\r\n\r\nKepala Ultra Mop dirancang khusus untuk berputar 360 derajat, membersihkan setiap sudut secara merata. Kain fiber pembersih khas membersih secara efektif, dan anti bakteri. Tidak merusakkan jenis lantai atau permukaan. .\r\n\r\nCara Pemasangan Kain Pel :\r\n1. Lepaskan dahulu sekrup paling atas dari kain pel,\r\n2. Masukan sekrup yang terlepas kedalam tongkat pel,\r\n3. Putar dan kencangkan,\r\n\r\nCara Pemasangan Tongkat Pel :\r\n1. Sambungkan kedua bagian tongkat pel,\r\n2. Putar dan kencangkan \r\n\r\nCara Penggunaan :\r\n1. Injak bagian bulat alat pel,\r\n2. Luruskan tongkat pel tegak lurus dengan kain pel\r\n3. Alat pel siap untuk digunakan,\r\n4. Buka pengunci pada tongkat,\r\n5. Tekan kebawah pelnya pada ember, Pel akan otomatis mutar\r\n\r\nCocok digunakan untuk :\r\n1. Lantai kayu,\r\n2. Lantai semen,\r\n3. Lantai keramik,\r\n4. Lantai batu\r\n\r\nSpesifikasi Produk :\r\n1 buah ember ( stainless )\r\n1 buah tongkat pel 125 cm\r\n1 buah kain pel 39 x 5 cm\r\nGratis 1 botol sabun', 20, 'active', 'd.PNG', NULL, 4, '2022-01-08 20:45:04', '2022-01-08 20:45:34'),
(15, 2, 'COOGER Tempat Sampah Tertutup Tempat Sampah Ruang Tamu 12L', '54900', 'Tempat Sampah Ruang Tamu Tertutup dengan Tombol Klik - 12L\r\nBahan: PP\r\nUkuran: 17 * 25.5 * 34cm\r\nKapasitas: 12L\r\nBerat: 650g\r\nWarna:  biru/pink /pink pastel/biru pastel\r\n\r\nNB : Mohon mengkonfirmasi atau mengirimakan feedback apabila barang sudah diterima. Terima kasih\r\nUntuk pembelian dalam jumlah banyak, langsung kontak kami, ya！（Pasti kita kasih diskon :)\r\nTambahkan ke Toko favorit kamu ya, biar tetep update sama barang-barang kita & promo menarik tentunya, Makasih banyak\r\n\r\nNB : Mohon mengkonfirmasi atau mengirimakan feedback apabila barang sudah diterima. Terima kasih\r\nUntuk pembelian dalam jumlah banyak, langsung kontak kami, ya！（Pasti kita kasih diskon :)\r\nTambahkan ke Toko favorit kamu ya, biar tetep update sama barang-barang kita & promo menarik tentunya, Makasih banyak\r\n\r\nGood Price, Good Service, Good Quality', 45, 'active', 'f.PNG', NULL, 4, '2022-01-08 20:46:33', '2022-01-08 20:46:33'),
(16, 2, 'Pot Bunga Mini Bahan Plastik Untuk Dekorasi Rumah / Pot Serbaguna', '5000', '🛒 Welcome to Rumah Sukses Bersama 🛒\r\n\r\nSpesifikasi :\r\n100% baru dan berkualitas tinggi\r\nBAHAN : Plastik\r\nDIAMETER POT : 5.8cm\r\nUKURAN POT : 7cm x 7,5cm\r\nBERAT POT : 26gr\r\n\r\nSerangkaian pot bunga ini sangat lucu, dengan warna yang berbeda,\r\ndan terbuat dari bahan berkualitas tinggi.\r\nPot bunga ini tidak hanya dapat digunakan untuk menanam bunga Anda,\r\ntetapi juga dapat menghias ruangan Anda, taman atau kantor Anda.\r\n\r\n📝 Kosong = Tidak bisa di Pilih \r\n📝 Ready = Jika bisa di Pilih\r\n\r\n⛔  PERATURAN TOKO  ⛔\r\n🎥Mohon Lakukan Video Unboxing  Saat Paket Diterima \r\n📦Jika ada kekurangan barang ,harap foto Label pengiriman dan Melampirkan  📹 video unboxing\r\n📜Tidak Menerima Sisipan Warna dan Variasi di CATATAN / VIA 📵CHAT\r\n🔂Cek dahulu sebelum Checkout kami tidak terima Ganti Nama, Nomor, Alamat, atau Barang setelah Checkout ⛔\r\n\r\nJangan Lupa Bintang 5 ⭐⭐⭐⭐⭐️\r\n\r\nHAPPY SHOPPING ❤️ ❤️ ❤️\r\n\r\n#pot #potminidekorasi #potrumah #potbungarumah #potrumahdekorasi #potbungamini #potmini #potbunga #potimport #potplastik #potmurahbatam #potkeren #potcute #pothiasan #potdekorasi', 550, 'active', 'g.PNG', 1, 4, '2022-01-08 20:47:55', '2022-01-08 20:49:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `namaRule` enum('Admin','master','Supplier','Pelanggan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `namaRule`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Supplier', NULL, NULL),
(3, 'Pelanggan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `subkategori` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_kategori`
--

INSERT INTO `sub_kategori` (`id`, `id_type`, `subkategori`, `created_at`, `update_at`) VALUES
(1, 1, 'Makanan Ringan', NULL, NULL),
(2, 1, 'Sembako', NULL, NULL),
(3, 1, 'Makanan Kaleng', NULL, NULL),
(4, 2, 'Kaus', NULL, NULL),
(5, 2, 'Kemeja', NULL, NULL),
(6, 2, 'Tunik', NULL, NULL),
(7, 2, 'Gamis', NULL, NULL),
(8, 3, 'Laptop/Komputer', NULL, NULL),
(9, 3, 'Kulkas', NULL, NULL),
(10, 3, 'TV', NULL, NULL),
(11, 4, 'Dekorasi Rumah', NULL, NULL),
(12, 4, 'Alat Kebersihan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(225) NOT NULL,
  `pemilik` int(11) NOT NULL,
  `alamat_toko` text NOT NULL,
  `email` varchar(110) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `info` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id`, `nama_toko`, `pemilik`, `alamat_toko`, `email`, `no_telp`, `info`, `created_at`, `updated_at`) VALUES
(1, 'toko mekar sari', 2, 'jln.padasuka indah 2', 'asrimarifah0402@gmail.com', '082246087096', 'Distributor resmi', '2022-01-08 20:09:22', '2022-01-08 20:09:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `remember_token` text DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `role_id`, `status`, `created_at`, `updated_at`, `alamat`, `no_telp`) VALUES
(1, 'asri nurul ma\'rifah', 'pelanggan', '$2y$10$k7n9e4xtT0JbTIEWuXPu/ewvEV8Wx/B1FBBvwbPrL0zKzdPcKGYIC', 'oqd83Jl6XoF44OjMmTLvfE0G2Fkn1ABt1ARkc2zoOOouN9fIkOgIrbMQK5v4', 3, 'active', '2022-01-08 20:01:23', '2022-01-08 20:54:55', 'jln.padasuka indah 2', '082246087096'),
(2, 'supplier', 'supplier', '$2y$10$7hH3q.xB9FhNwQFMZCK5XOyT5ihYM9Afh3CtCX9trla9VQJEYWmWq', 'D2irU4VfqAbdFLYqLpty8gjZzMvBCe78vepaSCdfcsMIiuAK4uRvEtemCMvu', 2, 'active', '2022-01-08 20:01:44', '2022-01-08 20:01:44', NULL, NULL),
(3, 'adminn', 'adminn', '$2y$10$.WDQmeHBtwFLqQDM7DCin.2hz7spg4Y8bnxbPY../bRzRecLTENFG', NULL, 1, 'active', '2022-01-08 20:02:01', '2022-01-08 20:02:01', NULL, NULL),
(4, 'pelanggan2', 'pelanggan2', '$2y$10$PiG.5Hyp9Uez1s7feRTAM..rywaYIqcC.DG64cTnlnJfPHQjQF3MC', NULL, 3, 'active', '2022-01-08 20:52:38', '2022-01-08 20:52:38', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_usaha`
--
ALTER TABLE `jenis_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_produk` (`nama_produk`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_usaha`
--
ALTER TABLE `jenis_usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
