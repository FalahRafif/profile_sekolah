-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 09:59 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profile_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pw` varchar(192) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_admin`
--

INSERT INTO `akun_admin` (`id_admin`, `username`, `pw`, `id_user_level`) VALUES
(5, 'adminin', '801aa6b12efd82c6e6862add168eb399ae876a6e9d9f8995cf7915edaf564b717b055e452366b37dbdff9e81de59f2a5bef06835618d035858fab6634e64ec21/4f2MSIeraRgCZADw6aWRK4VckHNr35Kjl1aZJH1v5s=', 3),
(8, 'admin', 'dcf8d9d9f288641ecc42a2a9e6f01e997b4800a64d3a8d9fdcb57d7fe5de9d94aa18e66724b9aedf63d47bc3d8aa9543099b32117db0751e3314947f5e950302oP9nRO/Sw8r8K5KVkBThLQYUja30ijM+KgaxC1Z6oPc=', 3),
(9, 'admin reiner', 'e707b5628f0dfda8896b03b0e875cc2e1370c4bfdd64616555ad3b4d224e68694b12a9ae991979de475be33359b929721916f8cbb2521800498d5176ab79b745N+uWPOLyvDcmIqLs/o+xYkVMESpFh+C+nUBAiZOhcq4=', 3);

-- --------------------------------------------------------

--
-- Table structure for table `akun_guru`
--

CREATE TABLE `akun_guru` (
  `id_akun_guru` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pw` varchar(192) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_guru`
--

INSERT INTO `akun_guru` (`id_akun_guru`, `nip`, `username`, `pw`, `id_user_level`) VALUES
(1, 12312303, 'pepen', '2943c5f6bf679892768964071005fa954acb5c3cc8479fea83e18d2f126c24fbdfdff704dbe65479cc664a8434e4a0ee3c05891077bef3ee621866310b4622c7+j5cxaqqRKDEasaKZYWePAPWXN8xgzyHHr85IgKV8oM=', 2),
(2, 12312301, 'tony', 'b8457ccb719c3ca0102570c27cc4f02d0473718e209616a385df03a46e09ab686d0d8f090e5b93be9b76ef52a93bf616c3750c571fe835f0b15d88fb696de54e0uQED+pZw8ExuiMNRgsr+GMVy2LslAfJiqkmXeWN/zU=', 2),
(3, 12312302, 'heri', 'f886f1036dca9b7dcfb11c6a6ad8925883b79bd434e3428ed6f0bc40c96520e44ca2d41e93e6a694b619b95356bed6e747291af162ae6f0a7a7d2c340d94d75eXjaD8o8LfqfyBFNFENr4wFmp8M9rXtoCTX+XNOqLVMI=', 2),
(4, 12312311, 'kenody', '3238e148ba851fe92ec5cb71d0f97c465e579f5c22c177811efb0a61601166ce3328032be98ff40e98a4148b2a98269eedccb16c01d376e7596dc1843e826bc3wnjSBnpQqFBt41SAvG9UJUHsJjx248x4KaMQRkdRc8Q=', 2),
(6, 12312322, 'megi', 'cc9083ee7f27c912d08b97c60b6a0391800eea42e2769af7a1bd140cccb747c7ecd3ddf6068f98f49465e8e05e85347f95fb2cc0ef0256e7ecb0746cfe528790Dk9UhaKxmvAaEF7KM5GRRXXiWf6I+DOw4L/CeuYE+ls=', 2),
(7, 12312333, 'zudan', 'd4dd6ef1e714f01454a2df62ccab8dc90c950c62df289fd8e4b51ae9a81a59ff47ffae87b2a42546d875d5bfe1e70c1c2d6af4941daa4dd0ddd93eb3a7a0841dUXXUawPNXgamLQSwkMB/68+wA6oH2ttwpJIlCkNmrVY=', 2),
(9, 123, 'kenoda', '81ecb6376e5719cab7d107c51d9c4d823d88a62f3ed3047c5db8b1c4abf4480f003159d8afbb96645fa852c59f958f7cc9a70f68abe924fa64175c8ef9abb50bTsEzpu4PA6JutqKQj/OJZdTeY+DlD8ptYXDcFlj7UYU=', 2);

-- --------------------------------------------------------

--
-- Table structure for table `akun_siswa`
--

CREATE TABLE `akun_siswa` (
  `id_akun_siswa` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pw` varchar(192) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_siswa`
--

INSERT INTO `akun_siswa` (`id_akun_siswa`, `nisn`, `username`, `pw`, `id_user_level`) VALUES
(11, 30997547, 'solei', '0a604ab54a8d0eb018f92d1f74299252dce847929921d28be228cf5f936c81c32d10fad7c6753ceef2eb5958952f20f69441112a664a705092b0d111be508b1e4aG4DyRBZYV31Bz8fpSYQ+2+MFi+IOujoAGAMugWVTE=', 1),
(12, 30997534, '1', '1383ae3a17a2ec237fd8c349383e5356a52502b862e3226f535b7fd1be15e14beebc64500bfba1d149f52d477a4677115037a0b680f151c89e5a0752e2f1db541qsXwQbwRJm+zMXGLxOuWbToUyUAgYUOsULaVZFd51g=', 1),
(13, 30997535, 'falah', '2b8c95ff25e39674b80eea233d7cfd234bc42ec800a536609fc30f80da3f0dbd38b833687bce6e7dbb830f5d47676a3724c2f46a040d883124a2c48f43142171r8eoW0QX5jQXUE9QKq+Cr1siQw+utH0XIwQr2XwRhwM=', 1),
(15, 30997537, 'ami', '5ed53fbd3df68d0b71ea96760cdb18845615d34bd08dc4af9b6d1781a827d631433c1742fb20566df5cc5ba592a0a418350bdaa065d3aaf919d86788f34cbd28zxYAePGW0qECaBTeYzXfgPZafAvrxeDQh4DCMDNiOZc=', 1),
(23, 11112222, 'jeremy', 'b749c2d18b78855f7400d830e366f4c67e7df610c7fadab4a9f16f8320e13228104fa15f7e32a68bf8b898ef5025718d61ee60df3a19d5f26469800cbfc09944akMbs/kOiGFtvGmrSLO8OKBr7rkyuwNG2QyHIHBKXj4=', 1);

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `id_anak` int(11) NOT NULL,
  `id_ortu` int(11) NOT NULL,
  `nisn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id_anak`, `id_ortu`, `nisn`) VALUES
(1, 2, 30997547),
(2, 3, 30997534),
(3, 2, 30997535),
(5, 4, 30997537),
(12, 7, 11112222);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` int(11) NOT NULL,
  `nisekolah` int(11) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `pend_akh` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `mapel_diajar` varchar(100) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nisekolah`, `nama_guru`, `jk`, `tanggal_lahir`, `tempat_lahir`, `pend_akh`, `agama`, `jabatan`, `mapel_diajar`, `gambar`) VALUES
(123, 121221, 'Kenoda', 'Laki-Laki', '2021-08-03', 'Jakarta', 'SMA', 'Islam', 'Guru', 'MTK', NULL),
(12312301, 121221, 'Tony', 'Laki-Laki', '1987-07-08', 'jakarta', 'S3', 'Islam', 'Kepala Sekolah', 'Bahasa Inggris', ''),
(12312302, 121221, 'Heri', 'Laki-Laki', '1995-07-21', 'depok', 'S2', 'Islam', 'Guru', 'MTK', ''),
(12312303, 121222, 'Pepen', 'Laki-Laki', '1975-07-22', 'semarang', 'S3', 'Islam', 'Kepala Sekolah', 'PKN', NULL),
(12312311, 121221, 'Kenody', 'Laki-Laki', '1987-07-01', 'Jakarta', 'D4', 'Protestan', 'Guru', 'Basis Data', NULL),
(12312322, 121221, 'Meggie', 'Perempuan', '1997-07-01', 'Jakarta', 'S2', 'khonghucu', 'Wakil Kepala Sekolah', 'MTK', ''),
(12312333, 121221, 'zudan', 'Perempuan', '1987-07-09', 'Jakarta', 'SMK', 'Hindu', 'Guru', 'Bahasa Sunda', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`) VALUES
(1, 'tk'),
(2, 'sd'),
(3, 'smp'),
(4, 'sma'),
(5, 'smk');

-- --------------------------------------------------------

--
-- Table structure for table `orangtua`
--

CREATE TABLE `orangtua` (
  `id_ortu` int(11) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `tanggal_lahir_ayh` date NOT NULL,
  `tempat_lahir_ayh` varchar(100) NOT NULL,
  `pekerjaan_ayh` varchar(100) NOT NULL,
  `pend_akh_ayh` varchar(5) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `tanggal_lahir_ibu` date NOT NULL,
  `tempat_lahir_ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `pend_akh_ibu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orangtua`
--

INSERT INTO `orangtua` (`id_ortu`, `nama_ayah`, `tanggal_lahir_ayh`, `tempat_lahir_ayh`, `pekerjaan_ayh`, `pend_akh_ayh`, `nama_ibu`, `tanggal_lahir_ibu`, `tempat_lahir_ibu`, `pekerjaan_ibu`, `pend_akh_ibu`) VALUES
(2, 'Reiner', '2021-07-02', 'Jakarta', 'PNS', 'D3', 'Rania', '2021-07-01', 'Jakarta', 'Ibu Rumah Tangga', 'D4'),
(3, 'Mamud', '2021-07-05', 'Jakarta', 'PNS', 'S3', 'Amelia', '2021-07-09', 'Jakarta', 'Ibu Rumah Tangga', 'S3'),
(4, 'Mamud', '2021-07-09', 'Jakarta', 'Karyawan Swasta', 'S3', 'Mamud', '2021-07-20', 'Jakarta', 'Ibu Rumah Tangga', 'S3'),
(5, 'Kelp', '2021-07-14', 'Jakarta', 'PNS', 'S2', 'Keila', '2021-07-22', 'Jakarta', 'PNS', 'D2'),
(6, '1', '2021-08-20', '1', '1', 'SMK', '1', '2021-08-04', '1', '1', 'SMA'),
(7, 'Jamanda', '2021-08-04', 'Jakarta', 'PNS', 'S2', 'Jamila', '2021-08-07', 'Jakarta', 'Ibu Rumah Tangga', 'D4');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `nisekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `waktu_peneylenggaraan_sekolah` varchar(100) NOT NULL,
  `akreditasi` varchar(1) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `bentuk_sekolah` varchar(10) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`nisekolah`, `nama_sekolah`, `id_jenjang`, `waktu_peneylenggaraan_sekolah`, `akreditasi`, `alamat`, `no_telp`, `no_hp`, `kelurahan`, `kecamatan`, `kota`, `bentuk_sekolah`, `gambar`) VALUES
(121221, 'SMKN Kerjid', 5, 'Pagi', 'A', 'gg. Kerjad', '8762349', '98764537689', 'Cimpaeun', 'Tapos', 'Depok', 'Negeri', '1.jpg'),
(121222, 'SMP IT Talimaya', 3, 'Pagi', 'A', 'gg. Bimantara', '3987589', '87654879876', 'Sukatani', 'Cimanggis', 'Depok', 'Swasta', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` int(11) NOT NULL,
  `nisekolah` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nisekolah`, `nama_siswa`, `jk`, `tanggal_lahir`, `tempat_lahir`, `agama`, `kelas`, `jurusan`, `gambar`) VALUES
(11112222, 121221, 'jeremy', 'Laki-Laki', '2021-08-01', 'Jakarta', 'Islam', 'XII 2', 'MM', NULL),
(30997534, 121221, 'Dava Afija', 'Laki-Laki', '2021-07-04', 'Jakarta', 'Katolik', 'X 2', 'MM', ''),
(30997535, 121221, 'Falah Korid', 'Laki-Laki', '2021-07-06', 'Jakarta', 'Budha', 'XI 2', 'MM', NULL),
(30997537, 121221, 'ami', 'Perempuan', '2021-07-09', 'Jakarta', 'Budha', 'XII 2', 'MM', NULL),
(30997547, 121221, 'Solei Afif', 'Laki-Laki', '2021-07-05', 'Jakarta', 'Islam', 'XII 2', 'TKR', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indexes for table `akun_guru`
--
ALTER TABLE `akun_guru`
  ADD PRIMARY KEY (`id_akun_guru`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indexes for table `akun_siswa`
--
ALTER TABLE `akun_siswa`
  ADD PRIMARY KEY (`id_akun_siswa`),
  ADD KEY `id_user_level` (`id_user_level`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id_anak`),
  ADD KEY `id_ortu` (`id_ortu`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `nisekolah` (`nisekolah`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`nisekolah`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `nisekolah` (`nisekolah`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `akun_guru`
--
ALTER TABLE `akun_guru`
  MODIFY `id_akun_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `akun_siswa`
--
ALTER TABLE `akun_siswa`
  MODIFY `id_akun_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun_guru`
--
ALTER TABLE `akun_guru`
  ADD CONSTRAINT `akun_guru_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `akun_guru_ibfk_2` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id_user_level`);

--
-- Constraints for table `akun_siswa`
--
ALTER TABLE `akun_siswa`
  ADD CONSTRAINT `akun_siswa_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`),
  ADD CONSTRAINT `akun_siswa_ibfk_2` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id_user_level`);

--
-- Constraints for table `anak`
--
ALTER TABLE `anak`
  ADD CONSTRAINT `anak_ibfk_1` FOREIGN KEY (`id_ortu`) REFERENCES `orangtua` (`id_ortu`),
  ADD CONSTRAINT `anak_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`nisekolah`) REFERENCES `sekolah` (`nisekolah`);

--
-- Constraints for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`nisekolah`) REFERENCES `sekolah` (`nisekolah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
