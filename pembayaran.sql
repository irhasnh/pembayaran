-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `tempatLahir` varchar(255) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `dosen` (`id`, `nama`, `password`, `jk`, `agama`, `tempatLahir`, `tanggalLahir`, `alamat`) VALUES
('Y05y1q',	'Rizky Sasri, S. Kom',	'e10adc3949ba59abbe56e057f20f883e',	'Pria',	'islam',	'Bandar Lampung',	'2016-06-04',	'Teluk Betung');

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kelas` (`id`, `nama`, `keterangan`) VALUES
(1,	'wp-01',	'2 orang');

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nirm` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `agama` varchar(25) DEFAULT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `tahun_lulus` varchar(5) NOT NULL,
  `alamat_sekolah` varchar(255) DEFAULT NULL,
  `tahun_masuk_kuliah` varchar(10) NOT NULL,
  `id_kelas` varchar(25) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `mahasiswa` (`id`, `nirm`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat`, `asal_sekolah`, `tahun_lulus`, `alamat_sekolah`, `tahun_masuk_kuliah`, `id_kelas`, `nama_ayah`, `nama_ibu`) VALUES
(4,	'16010101666',	'ANGGI SAPUTRA',	'Babatan',	'1992-02-09',	'pria',	'islam',	'081373401284',	'Dusun Manunggal Desa Babatan',	'SMKN 1 Kalianda',	'2010',	'Lampung Selatan',	'2016',	'10',	'',	''),
(5,	'16010102667',	'ANNISA NAVALINA.P',	'Jakarta',	'1995-04-27',	'wanita',	'islam',	'089506700171',	'Kp.Mulya Jaya 1 Panjang B.Lampung\r\n',	'SMKIN 1 B.Lampung',	'2013',	'B.Lampung',	'2016',	'10',	'',	''),
(6,	'16010102668',	'APRILIA INDAH',	'Bandar Lampung',	'1993-04-19',	'wanita',	'islam',	'082282979888',	'Jl.Nangka 1 No.28 Kel.Korpri Jaya Kec.Sukarame B.Lampung\r\n',	'SMKN 1 B.Lampung',	'2013',	'B.Lampung',	'2016',	'10',	'',	''),
(7,	'16010102669',	'FIKA YULITA',	'Tanjung Agung',	'1991-07-25',	'wanita',	'islam',	'08136968387622',	'Jl.Pandan No.76 LK.1 Kel.Waydadi Kec.Sukarame\r\n',	'Gajah Mada B.Lampung',	'2009',	'B.Lampung',	'2016',	'10',	'',	''),
(8,	'16010101670',	'HENDRA LUKMANA',	'Bandar Lampung',	'1991-08-07',	'pria',	'islam',	'081271170451',	'Jl.Dr.Susilo Gg.Pusri Baru No.21 Kel.Sumur Batu Kec.Teluk Betung Utara \r\n',	'SMAN 8 B.Lampung',	'2009',	'B.Lampung',	'2016',	'10',	'',	''),
(9,	'16010101671',	'KAMRUS',	'Negeri Besar',	'1993-08-07',	'pria',	'islam',	'089604382508',	'Jatimulyo Kec.Jati Agung Lam-Sel\r\n',	'-',	'0',	'-',	'2016',	'10',	'',	''),
(10,	'16010101672',	'MEMET RIANTO',	'Ikatan Saudara,',	'1997-01-02',	'pria',	'islam',	'089653112439',	'Dusun Ikatan Saudara Kel.Kota Agung Kec.Tegineneng Pesawaran\r\n',	'SMAN 1 Gunung Sugih Kbupaten Lampung Selatan',	'2015',	'Lampung Tengah',	'2016',	'10',	'',	''),
(11,	'16010101673',	'RIAN SAPUTRA',	'Tanjung Karang',	'1996-04-09',	'pria',	'islam',	'0',	'Jl.Sisingamangaraja Gg.Sarikam LK.III Kel.Kelapa Tiga Permai T.Karang Barat\r\n',	'SMK Persada B.Lampung',	'2015',	'B.Lampung',	'2016',	'10',	'',	''),
(12,	'16010102674',	'RAHMA PENI SETIANI',	'Tukorejo',	'1994-03-25',	'wanita',	'islam',	'085783429370',	'Tukorejo  RT/RW : 008/003 Batu Agung Merbau Mataram\r\n',	'SMA Swasta Teladan 1 Metro',	'2012',	'Tukerejo Metro',	'2016',	'10',	'',	''),
(13,	'16010101675',	'RENDY WIJAYA',	'Palembang',	'1996-09-09',	'pria',	'islam',	'089621033057',	'Jl.Bijaksana IV No.3 Griya Sejahtera LK.III\r\n',	'SMK Muhammadiyah 1 Terbanggi Besar Lampung Tengah',	'2015',	'Terbanggi Besar Lam-Teng',	'2016',	'10',	'',	''),
(14,	'16010102676',	'ROTIJAH',	'Blitarejo',	'1997-06-28',	'wanita',	'islam',	'085789889043',	'Blitarejo Kel.Blitarejo Kec.Gading Rejo, Pringsewu\r\n',	'SMA PGRI 2 PGRI 2 Pringsewu ',	'2015',	'Pringsewu',	'2016',	'10',	'',	''),
(15,	'16010102677',	'SAKDIAH',	'Bandar Lampung',	'1997-01-05',	'wanita',	'islam',	'0',	'Jl.Sisingamangaraja Gg.Sarikam LK.III Kel.Kelapa Tiga Permai T.Karang Pusat\r\n',	'MAN 2 B.Lampung',	'2015',	'B.Lampung',	'2016',	'10',	'',	''),
(16,	'16010102678',	'SANTIANA AHDA',	'Bandar Lampung',	'1996-02-04',	'wanita',	'islam',	'08976129177',	'Jl.Nangka 1 No.28 Kel.Korpri Jaya Kec.Sukarame B.Lampung\r\n',	'SMA Utama 2 B.lampung',	'2015',	'B.Lampung',	'2016',	'10',	'',	''),
(17,	'16010101679',	'TOPAN SANJAYA',	'Bandar Lampung',	'1995-02-22',	'pria',	'islam',	'082280561680',	'Jl.H.Komarudin Gg.Abadi II Rajabasa Raya\r\n',	'SMA Mutiara Natar',	'2013',	'Natar',	'2016',	'10',	'',	''),
(18,	'16010101680',	'YOGA ANDIKA PUTRA',	'Natar',	'1997-07-22',	'pria',	'islam',	'0895333926826',	'Jl.Setasiun Lama Kel.Citerep Merak Batin Kec.Natar Lam-Sel\r\n',	'SMK Budi Karya Lam-Sel',	'2015',	'Natar Lampung Selatan',	'2016',	'10',	'',	''),
(19,	'16010101681',	'ZULKIFLI',	'Bumi Agung',	'1992-10-05',	'pria',	'islam',	'081272157789',	'Desa Bumi Agung Kec.Tegineneng Kab.Pesawaran\r\n',	'SMK Mutiara 2 Natar',	'2010',	'Natar Lam-Sel',	'2016',	'10',	'',	''),
(20,	'16010101682',	'AGUS SETIAWAN',	'Bandar Lampung ',	'1993-08-28',	'pria',	'islam',	'082281185383',	'JL.Dr.Setia Budi No.65 LK.1 RT.004 Kuripan, Teluk Betung Barat \r\n',	'SMA Muhammadiyah B.Lampung',	'2011',	'B.Lampung',	'2016',	'11',	'Mukhtari',	'Suaini'),
(24,	'16010101684',	'ANDI AHMAD GAZALI',	'Maspul',	'1997-03-08',	'pria',	'islam',	'085342993664',	'JL.Teuku Umar No.80A Kedaton\r\n',	'SMAN 1 MARE KABUPATEN BONE',	'2015',	'Bone',	'2016',	'11',	'A.Iskandar',	'A.Muliyati'),
(25,	'16010102717',	'ANITA PRATAMA SARI',	'Tanjung Karang ',	'1998-12-28',	'wanita',	'islam',	'082373785628',	'JL.H.Nasir No.23 LK.1 Kel.Kota baru Kec.T.Karang Timur\r\n',	'SMA Nusantara',	'2008',	'Enggal',	'2016',	'12',	'Bambang Dwi Putranto',	'Yulianah'),
(27,	'16010102718',	'ARNA PURI',	'Suka Marga',	'1997-08-15',	'wanita',	'islam',	'085379487944',	'Sukamarga Kec.Bengkunat Belimbing Kab.Pesisir Barat\r\n',	'MAN 1 Pesisir Barat',	'2016',	'Pesisir barat Lampung Selatan',	'2016',	'12',	'M. Mazran',	'Rohaya'),
(28,	'16010101686',	'CHANDRA',	'Bandar Lampung',	'1991-11-10',	'pria',	'islam',	'089674542483',	'Jl.Hos Cokro Aminoto gg.kamboja IV No.25 RT/RW 002/- Kel.Enggal Kec.Enggal\r\n',	'SMK N 4 B.Lampung',	'2010',	'B.Lampung',	'2016',	'11',	'Aman',	'Yenni'),
(30,	'16010102687',	'DEWI SEPTI ANJANI',	'Bandar Lampung ',	'1996-09-24',	'wanita',	'islam',	'089653477432',	'JL.H.Mad Kedaung Atas No.85 Kemiling Bandar Lampung\r\n',	'SMAN 7 B.Lampung',	'2014',	'B.Lampung',	'2016',	'11',	'Marzuki',	'Kesi Kusrini'),
(31,	'16010101689',	'EKO FIRDAUS',	'Way Kerap',	'1998-02-18',	'pria',	'islam',	'089607737841',	'Jl.Pamuka Gg.Alpukat Kemiling B.Lampung\r\n',	'SMAN 7 B.Lampung',	'2016',	'B.Lampung',	'2016',	'11',	'Suhairi',	'Irdawati'),
(32,	'16010101690',	'ESTI RESTU KURNIADI',	'Bandar Lampung',	'1993-09-02',	'wanita',	'islam',	'089618470079',	'JL.Pagar Alam Perum Griya Sejahtera No.45\r\n',	'SMA Perintis 1 B.Lampung',	'2011',	'B.Lampung',	'2016',	'11',	'Sunardi',	'Sulastri Arsyad'),
(33,	'16010102691',	'GITA AYUMA NINGRUM',	'Bandar Lampung',	'1997-11-30',	'wanita',	'islam',	'08980233295',	'Jl.Sanurat RT.005 Lk.1 Sumber Agung Kemiling\r\n',	'SMAN 7 B.Lampung',	'2015',	'B.Lampung',	'2016',	'11',	'Wawan',	'Rina Sukesi'),
(34,	'16010101692',	'HERMANSYAH',	'Panjang',	'1988-02-10',	'pria',	'islam',	'0',	'Kebon sayur LK.II RT/RW 010/- Kel.Panjang Utara Kec.Panjang\r\n',	'Dinas Pendidikan B.Lampung (Paket C)',	'2008',	'B.Lampung',	'2016',	'11',	'Parto',	'Katimah'),
(35,	'16010101693',	'HIDAYAT',	'Blitarejo',	'1993-05-12',	'pria',	'islam',	'085841042355',	'Blitarejo Kec.Gading Rejo, Pringsewu \r\n',	'SMA Bina Mulya Gading Rejo, Pringsewu',	'2011',	'Pringsewu',	'2016',	'11',	'Boidin',	'Sugiyem'),
(36,	'16010101694',	'HYDEN RISMAN',	'Bandar Lampung',	'1997-05-03',	'pria',	'islam',	'089618296799',	'Kp.Sinar Laut Gg.Anyar LK.I\r\n',	'SMK Taman Karya TanjungKarang',	'2015',	'Bandar Lampung',	'2016',	'11',	'Sukirno',	'Tati Suwarti'),
(37,	'16010101722',	'IRFAN ZULFIKAR AMINUDDIN',	'Terbanggi Subing',	'1996-11-14',	'pria',	'islam',	'082375185668',	'Terbanggi Subing Gunung Sugih, Lampung Tengah\r\n',	'Paket C Nusantara',	'2016',	'-',	'2016',	'12',	'Ikhsan',	'Marsyiati'),
(38,	'16010101724',	'KRISTIAN EKO WALUYO',	'Terbanggi Subing',	'1994-03-13',	'pria',	'katolik',	'085268404587',	'Gotong Rotong 1 RT/RW 006/- Gunung Sugih Lam-teng\r\n',	'SMAN 1 Punggur Kabupaten lampung Tengah',	'2012',	'Lam-Teng',	'2016',	'12',	'Iswanto',	'Sunari'),
(39,	'16010101755',	'KUSWANTO',	'-',	'0000-00-00',	'pria',	'islam',	'0',	'-',	'-',	'0',	'-',	'2016',	'11',	'aa',	'bb'),
(40,	'16010101696',	'MUHAMMAD HAFIDH SATRIO',	'NATAR',	'1997-11-16',	'pria',	'islam',	'081272379082',	'Dusun VII (Sukamaju) Natar RT/RW 029/011 KEL.NATAR KEC.NATAR \r\n',	'MAN Kalianda',	'2014',	'Kalianda',	'2016',	'11',	'Widiyo Pranoto',	'Pustiko Ningsih'),
(41,	'16010101697',	'MARIYANTO',	'Simpang Agung',	'1996-03-20',	'pria',	'islam',	'089517192210',	'Simpang Agung Dusun 1 RT/RW 003/001 Seputih Agung\r\n',	'SMA Perintis 1 B.Lampung',	'2014',	'B.lampung',	'2016',	'11',	'Sutriman',	'Sukinem'),
(42,	'16010102728',	'NEVI SAPTA GUSTIA',	'Banjar Manis',	'1996-08-07',	'wanita',	'islam',	'0085768830049',	'Banjar Manis Kecamatan gisting kab.tanggamus\r\n',	'SMAN 1 Gunung Alif',	'2015',	'Tanggamus',	'2016',	'12',	'Ardison',	'Desyana'),
(43,	'16010102698',	'NURHIDAYATI',	'Bandar Lampung ',	'1996-04-10',	'wanita',	'islam',	'089657160792',	'Jl.Sanurat RT.004 Lk.1 No.79 Sumber Agung Kemiling B.Lampung\r\n',	'SMA Perintis 1 B.Lampung',	'2014',	'B.Lampung',	'2016',	'11',	'Kruduk',	'Misinem'),
(44,	'16010102700',	'OKTAVIA PRATIWI',	'Bandar Lampung',	'1992-10-03',	'wanita',	'islam',	'081273552600',	'Jl.P.Polem Gg.P.Polem 1 NO.46 Sukamenanti B.Lampung\r\n',	'SMA Negeri 7 B.Lampung',	'2010',	'B.Lampung',	'2016',	'11',	'Supranowo',	'Sri Lestari'),
(45,	'16010102702',	'PUTRIYANI LESTARI ',	'Panjang',	'1995-03-02',	'wanita',	'islam',	'082281330531',	'Kp.Teluk Harapan RT 005 LK I Panjang Selatan\r\n',	'MAN 2 Tanjung Karang',	'2013',	'B.Lampung',	'2016',	'11',	'Anang Suryanto',	'Sutini Juria'),
(46,	'16010102730',	'RADHA DIABORA',	'Curup',	'1996-06-17',	'wanita',	'islam',	'082375185667',	'Terbanggi Subing Gunung Sugih, Lampung Tengah\r\n',	'SMAN 3 Metro',	'2014',	'Metro',	'2016',	'12',	'Suratno',	'Yurida'),
(47,	'16010102732',	'RISMA AGUSTINA',	'Kadupandak',	'1997-08-25',	'wanita',	'islam',	'085783414100',	'Kadupandak  Kel.Kertasana Kec.Kedondong\r\n',	'MAN 1 PESAWARAN',	'2016',	'Kedondong Pesawaran',	'2016',	'12',	'-',	'Irmah'),
(48,	'16010101705',	'RIZKO DWI SAPUTRA',	'Kota Agung',	'1991-10-26',	'pria',	'islam',	'08982200387',	'Jl.P.Damar No.57 LK.III RT/RW 005/- Kel.Perumnas Waykandis Kec.tanjung Senang\r\n',	'SMA AL-Azhar 3 B.Lampung',	'2009',	'B.Lampung',	'2016',	'11',	'Norman Yusuf',	'Wijayawati'),
(49,	'16010101704',	'RIZKY KURNIAWAN',	'Bandar Lampung',	'1994-06-06',	'pria',	'islam',	'082175848245',	'Jl.Bukit 3 No.105 LK.II RT/RW 011/- Kotabaru T.Karang Timur\r\n',	'Dinas Pendidikan B.Lampung (Paket C)',	'2013',	'B.Lampung',	'2016',	'11',	'Amir Syafirudin ',	'Yuslinawati Zein'),
(50,	'16010101706',	'SAIPUR RIZAL',	'Bandar Lampung',	'1991-08-30',	'pria',	'islam',	'0',	'Jl.Balok LK.II RT/RW 025/- Kel.Garuntang Kec.Teluk Betung Selatan\r\n',	'SMK PGRI 2 B.Lampung',	'2011',	'B.Lampung',	'2016',	'11',	'Hori',	'Tarminah'),
(51,	'16010101707',	'SAYID KOSIM',	'Kutodalom',	'1995-09-28',	'pria',	'islam',	'085609516028',	'Kuta Dalom, Gisting Kab.Tanggamus\r\n',	'MA Aliyah Mathla\'ul Anwar Gisting Tanggamus',	'2014',	'Gisting, tanggamus',	'2016',	'11',	'Sunarmo',	'Asnawati'),
(52,	'16010101708',	'SELAMAT',	'PARDASUKA',	'1997-05-08',	'pria',	'islam',	'08980615908',	'DUSUN WONODADI,KEL.PARDASUKA,KAB.LAMPUNG SELATAN',	'SMA N1 KATIBUNG',	'2015',	'KATIBUNG,KABUPATEN LAMPUNG SELATAN',	'2016',	'11',	'Suko',	'Sudarni'),
(53,	'16010101683',	'ALI MUSTHOFA',	'Blitarejo',	'1996-02-17',	'pria',	'islam',	'085768247306',	'Blitarejo Kec.Gadingrejo Pringsewu',	'SMKN 1 GADING REJO',	'2014',	'Pringsewu',	'2016',	'11',	'Boidin',	'Sugiyem'),
(54,	'16010101685',	'ARI KURNIAWAN',	'SUKARAJA',	'1997-02-28',	'pria',	'islam',	'085269757678',	'Jl.Natar Pemanggilan',	'SMAN 1 SEMAKA',	'2016',	'Jl. Alim Ulama Karang Rejo Kec.Semaka Kab.Tanggamus',	'2016',	'11',	'Zubirman',	'Azeni Susanti'),
(55,	'16010101688',	'DIAN SETIANTO',	'BANDAR LAMPUNG',	'1996-09-20',	'pria',	'islam',	'08988987137',	'JL.SUMURAT S.AGUNG, KEMILING BANDAR LAMPUNG',	'SMA N14 BANDAR LAMPUNG',	'2015',	'BANDAR LAMPUNG',	'2016',	'11',	'Sudadi',	'Sundawati'),
(56,	'16010101695',	'JULIAN AJI PRAKASA',	'TANJUNG KARANG',	'1997-07-01',	'pria',	'islam',	'08990046370',	'PERUMAHAN BKP BLOK Y NO 162 LK III KEL.KEMILING PERMAI',	'SMA N 14 BANDAR LAMPUNG',	'2015',	'BANDRA LAMPUNG',	'2016',	'11',	'Sukono',	'Mardiah Ningsih'),
(57,	'16010101699',	'OKTA ADE ARIANTO',	'BANDAR LAMPUNG',	'1996-10-21',	'pria',	'islam',	'089611741102',	'JL.SAMURATNO 17 LK I,KEC.KEMILING',	'SMK N6 BANDAR LAMPUNG',	'2014',	'BANDAR LAMPUNG',	'2016',	'11',	'Sumarmo',	'Purwati'),
(58,	'16010101701',	'PARSITO',	'WAY GELAM',	'1990-01-31',	'pria',	'islam',	'082280542977',	'WAY GELAM CANDIPURO,LAMPUNG SELATAN',	'PON PES NURUL FALAH',	'2008',	'CINTAMULYA CANDIPURO',	'2016',	'11',	'Paino',	'Tujinem'),
(59,	'16010101703',	'RAPIUDIN',	'WILAGA SUBAN',	'0000-00-00',	'pria',	'islam',	'082310923167',	'LINK.PEGANTUNGAN, DESA JOMBANG WETAN',	'SMK MIFTAHUL ULUM',	'2015',	'BANDAR LAMPUNG',	'2016',	'11',	'Gaos',	'Iyah'),
(60,	'16010102709',	'SITI AMINAH',	'LAMPUNG SELATAN',	'1991-11-10',	'wanita',	'islam',	'081271789424',	'DESA KARANG SARI KEC.JATI AGUNG LAM-SEL',	'AW',	'2009',	'DSA',	'2016',	'11',	'Ansori',	'Sarimah'),
(61,	'16010101710',	'SUHERLAN',	'WAY LAYAP',	'1992-05-05',	'pria',	'islam',	'085384343404',	'DUSUN INDUK KELURAHAN WAY LAYAP',	'MA HASANUDIN TELUK BETUNG',	'2010',	'TELUK BETUNG',	'2016',	'11',	'Ahmad Yani',	'Sumirah'),
(62,	'16010101711',	'UNUT',	'Sindang anom',	'1995-12-15',	'pria',	'islam',	'0852',	'Dusun II',	'SMK N 1 Baradatu',	'2014',	'Baradatu Way Kanan',	'2016',	'11',	'Madsupi',	'Mariam'),
(63,	'16010102712',	'YAYAH SAFITRI',	'Bandar Lampung',	'1998-03-26',	'wanita',	'islam',	'0895363681663',	'JL. Teuku cikditiro Gg. Kesuma, Kemiling Bandar Lampung',	'SMA Utama 2 Bandar Lampung',	'2015',	'Pahoman, Bandar Lampung',	'2016',	'11',	'Ansori',	'Dwi Aryani'),
(64,	'16010102713',	'YESSI AFRILIA',	'Tanjung Karang',	'1996-04-24',	'wanita',	'islam',	'0895339713008',	'Jl. Airan raya no. 17 Way Hui,lampung Selatan',	'SMKN 1 Bandar Lampung',	'2014',	'Jl. Urip Sumoharjo Sukarame Bandar lampung',	'2016',	'11',	'Admad Yani',	'Sri Sudariyah'),
(65,	'16010101714',	'YOHANES AGUNG SEPTIAN',	'BANDAR LAMPUNG',	'1994-09-30',	'pria',	'katolik',	'08995552062',	'Jl. kelelawar no. 18. Sidodadi Kedaton',	'SMA Wijaya ',	'2013',	'Bandar Lampung',	'2016',	'11',	'A. Kusman',	'Lucia Untari'),
(66,	'16010102715',	'YULIYANTI FITRI ASTUTI',	'TANJUNG KARANG',	'1987-06-11',	'wanita',	'islam',	'085273743231',	'Jl. Ratu dibalau Gg. Kenanga III ',	'SMA Swasta Pangundi Luhur',	'2004',	'Bandar Lampung',	'2016',	'11',	'Supardi',	'Sutinah'),
(67,	'16010101716',	'A QODIR KHARFI',	'Cimanuk',	'1996-08-13',	'pria',	'islam',	'08',	'Desa Cimanuk , Kecamatan Way Lima',	'SMK 17 ',	'2014',	'Kedondong',	'2016',	'12',	'Khoirul Amri',	'Evi Yanti'),
(68,	'16010102719',	'BUNGA INTANIA',	'Bandar Lampung',	'1998-04-23',	'wanita',	'islam',	'082280184952',	'Jl. pembangunan LK I Korpri Jaya',	'SMAN 12',	'2016',	'Bandar Lampung',	'2016',	'12',	'Isfan Effendi',	'Zuhraria'),
(69,	'16010101720',	'EKA DWI PRASETYO',	'Gadingrejo',	'1998-02-20',	'pria',	'islam',	'085840626652',	'Tulung Agung, Gading Rejo. Pringsewu',	'MA Nurul Ulum Gading Rejo',	'2016',	'Gadingrejo, Pringsewu',	'2016',	'12',	'Kiswanto',	'Susanti'),
(70,	'16010102721',	'ESTI PUSPITA DIANSI',	'Tanjung Karang',	'1997-08-09',	'wanita',	'islam',	'089631526867',	'JL.Kulit LK.III Kemiling',	'SMKN 4 B.Lampung',	'2015',	'B.Lampung',	'2016',	'12',	'Eko Prastono',	'Sringatin'),
(71,	'16010101739',	'AGUNG RAHMADI',	'Panjang',	'0000-00-00',	'pria',	'islam',	'089630872491',	'kp baru III LK I Bandar Lampung',	'SMK DHARMAPALA Panjang',	'2013',	'panjang',	'2016',	'13',	'aaa',	'bbb'),
(72,	'16010101723',	'IRPANSYAH',	'Way Harong',	'1997-06-13',	'pria',	'islam',	'081532328851',	'Wayharong',	'SMK Yapema Gadingrejo, Pringsewu',	'2015',	'Pringsewu',	'2016',	'12',	'Bakhtiar',	'Ira Wati'),
(73,	'16010101726',	'LUKMAN NUL HAKIM',	'Bandar Lampung',	'1998-07-29',	'pria',	'islam',	'081271956588',	'Dsn.Sidoharjo 1/2 Rt/Rw 012/004 Desa Negara Ratu, Natar',	'SMK Yadika Natar',	'2016',	'Natar Lamsel',	'2016',	'11',	'Suparno',	'Sa\'diah'),
(74,	'16010102725',	'LIA MARLIANTI',	'Panjang',	'1996-03-10',	'wanita',	'islam',	'0895337763140',	'Jl.Yos Sudarso Gg.Taufik III Kp.Sukabaru Panjang Utara B.Lampung',	'SMK SMTI B.Lampung',	'2014',	'B.Lampung',	'2016',	'11',	'Rasja',	'Euis'),
(75,	'16010101741',	'ANDI ABIL QASIM',	'salotimpoe',	'1992-04-03',	'pria',	'islam',	'085378753333',	'jl.teuku umar no 80 A Kedaton',	'SMA N1 CINA',	'2010',	'BONE',	'2016',	'13',	'Andi Iskandar',	'A.Muliyati'),
(76,	'16010101740',	'AHMAD HENDRA KUSUMA W',	'Pekalongan',	'1996-09-13',	'pria',	'islam',	'089622540518',	'Jl.Flamboyan raya LK I RT.006 Labuhan dalam tj.senang',	'mathlaul anwar bandar lampung',	'2015',	'bandar lampung',	'2016',	'13',	'Wahyudin',	'Siti Komariah'),
(77,	'16010102727',	'MIFTAKHUL JANNAH',	'Bandar Lampung',	'1999-01-16',	'wanita',	'islam',	'089696224096',	'Jl.Pramuka Gg.Jambu 2',	'SMK 2 Mei B.Lampung',	'2016',	'B.Lampung',	'2016',	'12',	'Saring Wahyudi',	'Yuliani'),
(78,	'16010102729',	'PUTRI RAHMAWATI',	'Tanjung Raja',	'1998-10-23',	'wanita',	'islam',	'08127984673',	'Jl.Purnawirawan Swadaya 5A Gunter B.Lampung',	'SMAN 1 Tanjung Raja',	'2016',	'Tanjung Raja Lam-ut',	'2016',	'12',	'Firman Hadi',	'Elianah'),
(79,	'16010102731',	'RESTI APRIANA SARI',	'Lampung Selatan ',	'1997-04-08',	'wanita',	'islam',	'089694272672',	'Jl.Pulau Baru Gg.Cuek',	'SMKN 4 B.Lampung ',	'2015',	'B.Lampung',	'2016',	'12',	'Suhadri',	'Fatonah'),
(80,	'16010102733',	'SHINTIA FEBI UTAMI',	'Banjarmanis',	'1997-02-27',	'wanita',	'islam',	'081368711017',	'Banjar Manis Gisting Tanggamus',	'MAN 1 Pringsewu',	'2015',	'Pringsewu',	'2016',	'12',	'Murzan',	'Mis Marita'),
(82,	'16010101734',	'UNTUNG SAPUTRA SUROPATI',	'Batu Raja',	'1994-06-05',	'pria',	'islam',	'089674881744',	'Ds.Tanjung Ratu Kec.Katibung Lam-Sel',	'MA Ma\'arif Katibung',	'2012',	'Lam-Sel',	'2016',	'12',	'Usman',	'Astina Malawati'),
(83,	'16010102745',	'DWI MAYLANI',	'sukajaya',	'0000-00-00',	'wanita',	'islam',	'081311343472',	'jl.yos sudarso no 34 gudang gaam tbs',	'SMAN 6',	'2013',	'BANDAR LAMPUNG',	'2016',	'13',	'AA',	'AA'),
(84,	'16010101735',	'WAHYU NUSLIFAR',	'Serang',	'1978-07-04',	'pria',	'islam',	'085367773914',	'Jl.Tritura No.10 Kedondong',	'SMU Swasta K.H.Wasyid',	'1998',	'Cilegon Serang',	'2016',	'12',	'Atik Tamami',	'Sri Hartati'),
(85,	'16010101746',	'EDO AGUSTINO FIRMANSYAH',	'Jakarta',	'1994-08-12',	'pria',	'islam',	'085694129416',	'Lingkungancipayung rt 01 rw 002 abdi jaya depok',	'SMKYAPEMRI depok',	'2013',	'depok',	'2016',	'13',	'Matsani',	'Eli Fitriati'),
(86,	'16010101736',	'WAWAN TRICAHYO',	'Tanjunganom',	'1994-08-13',	'pria',	'islam',	'083170797813',	'Talang Rejo Kec.Kota agung Kec. Tanggamus',	'SMK Erlangga Kotaagung Tanggamus',	'2012',	'Tanggamus',	'2016',	'12',	'Ujang Purwanto',	'Imronah'),
(87,	'16010102747',	'EKA META MERLIANA',	'-',	'0000-00-00',	'wanita',	'islam',	'081278616640',	'-',	'-',	'0',	'-',	'2016',	'13',	'aa',	'bb'),
(88,	'16010101737',	'YASIR ABDUL GOPUR',	'Sinar Bandung',	'1995-09-26',	'pria',	'islam',	'085658691022',	'Tegineneng Kab.Pesawaran',	'SMA Muhammadiyah Wonorejo Tegineneng',	'2015',	'Tegineneng',	'2016',	'12',	'Ruba\'i',	'Wusriyati'),
(89,	'16010101738',	'YOGI SAPUTRA',	'Kotaagung',	'1996-12-07',	'pria',	'islam',	'085269761796',	'Talang Rejo Kec.Kotaagung Timur Tanggamus',	'SMK Erlangga Kotaagung Tanggamus',	'2014',	'Tanggamus',	'2016',	'12',	'Maryadi',	'Kayati'),
(90,	'16010101748',	'FAJAR RAMDANI',	'pekon balak',	'0000-00-00',	'pria',	'kristen',	'00',	'untung siropati labuan dalam',	'SMK N 1 LIWA',	'2015',	'LIWA',	'2016',	'13',	'aa',	'bb'),
(92,	'16010101749',	'FERRY SETIAWAN',	'teluk betung',	'0000-00-00',	'pria',	'islam',	'08990393606',	'jl.ikan sepat',	'bandar lampung',	'2013',	'teluk betung',	'2016',	'13',	'aa',	'bb'),
(93,	'16010101750',	'GUSTI ADE KURNIAWAN',	'Bandar Lampung',	'1996-12-10',	'pria',	'islam',	'089631486892',	'Desa Sindang Sari Natar Lam-Sel',	'SMAN 1 Natar Lam-Sel',	'2015',	'Natar Lampung Selatan',	'2016',	'13',	'Agus Rosidi',	'Rahayuti'),
(94,	'16010101751',	'H. GILANG PRATAMA RAMADHAN',	'Bandar Lampung',	'1995-02-24',	'pria',	'islam',	'08961878471',	'Jl.Teluk Ambon Pidada III Kec.Panjang Kel.Pidada',	'SMKN 5 B.Lampung',	'2012',	'B.Lampung',	'2016',	'13',	'Tomi Sukandi',	'Sunanti'),
(95,	'16010102752',	'INDRI MARIANA SAFITRI',	'Bandar Lampung',	'1995-10-25',	'wanita',	'islam',	'089526143259',	'Jl.Imam Bonjol Gg.satria No.5',	'MA Nurul Iman',	'2012',	'Tanggamus',	'2016',	'13',	'Imam',	'Mar\'fuah'),
(96,	'16010102753',	'ISTIKOMAH',	'Toba',	'1994-01-01',	'wanita',	'islam',	'085788533802',	'Jl.Jend Suprapto Gg.H.Thasim II No.50',	'SMK Ma\'arif 2 Penajawa lam-tim',	'2013',	'Lam-Tim',	'2016',	'13',	'rahman raja agung',	'pipah'),
(97,	'16010102754',	'IVAN CINDY SAPUTRA',	'Bandar Lampung',	'0000-00-00',	'pria',	'islam',	'089632554897',	'Jl.Dokter Susilo Gg.Pusri 2 B.Lampung',	'SMK TRISAKTI B.Lampung',	'2013',	'B.Lampung',	'2016',	'13',	'',	''),
(98,	'16010102756',	'MIA AUDINA',	'Teluk Betung',	'0000-00-00',	'wanita',	'islam',	'08992775535',	'Jl.Ikan Sepat',	'SMA Islamiyah Teluk Betung',	'2013',	'Bandar Lampung',	'2016',	'13',	'',	''),
(99,	'16010101757',	'MUHAMMAD ALDI',	'Bandar Lampung',	'0000-00-00',	'pria',	'islam',	'089631101141',	'Jl.Ikan Sebelah No.49/N Lk.III Pesawahan Teluk Betung Selatan',	'SMKN 4 B.Lampung',	'2013',	'B.Lampung',	'2016',	'13',	'',	''),
(100,	'16010102743',	'DEASY RAHMA HARDIYANTI',	'bandar lampung',	'1992-12-26',	'wanita',	'islam',	'085609488848',	'pondok permata birublok b2 no 12 LK1 sukarame',	'MAN 1 Bandar lampung',	'2010',	'bandar l;ampung',	'2016',	'13',	'Suhartono',	'Yuniar'),
(101,	'16010102758',	'NI GUSTI MADE EVA HANDINI',	'gaya baru',	'0000-00-00',	'wanita',	'hindu',	'082176545696',	'jl.untung suropati gg mataram',	'SMK 2 MEI',	'2014',	'BANDAR LAMPUNG',	'2016',	'13',	'I Gusti Ketut S',	'Ni Nyoman Sutri'),
(102,	'16010101759',	'PANJI YANA SAPUTRA',	'Telukbetung',	'0000-00-00',	'pria',	'islam',	'089654598016',	'jl.wr monginsidi gg muria no 4',	'SMAN 11 BANDAR LAMPUNG',	'2013',	'BANDAR LAMPUNG',	'2016',	'13',	'',	''),
(103,	'16010101760',	'RIZKY ADI PRATAMA',	'Tanjung Karang',	'1995-01-27',	'pria',	'islam',	'082373679714',	'Jl.Suhada Bagelen 4 Gedong Tataan Pesawaran no 283',	'SMK WIDYA YAHYA',	'2013',	'GADING REJO',	'2016',	'13',	'Sapta Dewa',	'Endang Rosawati'),
(104,	'16010101761',	'SAMBARA IKO YUKANA',	'Serang',	'1997-06-06',	'wanita',	'islam',	'085369841696',	'Banjar Agung, Kecamatan : jati agung. Lampung Selatan',	'SMA AL - Huda Jati Agung ',	'2015',	'Jati Agung, Lampung Selatan',	'2016',	'13',	'Thio Fulton',	'Mujiati'),
(105,	'16010102762',	'YOAN TANTI BALI',	'Rangkas Bitung',	'1992-08-01',	'wanita',	'islam',	'085219700506',	'KP. Empang 002/ 005 Muara Ciujung Barat Rangkas Bitung',	'SMK Bhakti Utama 2 Bandar lampung',	'2011',	'GG.Pu Segala Mider',	'2016',	'13',	'Roni Asrani',	'Yos Tanti Bali'),
(106,	'16010101764',	'MUHAMMAD FAUZI AMRIZAL',	'Bandung baru',	'1994-09-14',	'pria',	'islam',	'08154183532',	'jl.teuku cik ditiro',	'MA DARUL ULUM',	'2012',	'PRINGSEWU',	'2016',	'11',	'Tasmaji',	'Sri Wasikin'),
(107,	'16010101765',	'NURHAMID',	'Kotagajah',	'0000-00-00',	'pria',	'islam',	'085769620268',	'purwodadi, kec.kota gajah Lam-teng',	'SMAN 1 Kotagajah, Lampung Tengah',	'2008',	'Lam-Teng',	'2016',	'11',	'Margono',	'Minah'),
(108,	'16010101763',	'ADITYO HARU PRATOMO',	'Bandar Lampung',	'1994-12-08',	'pria',	'islam',	'089631625691',	'Jl.Komarudin Perum Glora Persada Blok E 1 No.11 Lk.II',	'MAN 1 B.Lampung',	'2012',	'B.Lampung',	'2016',	'14',	'Suwardan',	'Suherni'),
(109,	'16010102766',	'ALYA TUNISYAH',	'Panjang',	'1996-12-01',	'wanita',	'islam',	'089628904186',	'Panjang, Kp.Baru 1',	'SMAN 8 B.Lampung',	'2014',	'B.Lampung',	'2016',	'11',	'Apandi Kozim',	'Siti Unainah'),
(110,	'16010101767',	'RIZKI NANDA DWI SAPUTRA',	'Bandar Lampung',	'1995-12-01',	'pria',	'islam',	'085383536000',	'Jl.Wr.Supratman No.125 Gedung Pakuon Teluk Betung Selatan B.Lampung\r\n',	'SMAN 8 B.Lampung',	'2014',	'B.Lampung',	'2016',	'11',	'Ansori',	'Sunarsiti'),
(111,	'16010102768',	'TIA APRILYANA',	'Bandar Lampung',	'1997-04-27',	'wanita',	'islam',	'089664952414',	'Jl.sukarno hatta no 21 KP sinar baru',	'SMKN 4 Bandar Lampung',	'2015',	'Bandar lampung',	'2016',	'13',	'Sudarsono',	'Sulis Tia Wati'),
(112,	'16010102744',	'DEPI SUSANTI',	'Sindang Sari',	'1995-10-03',	'wanita',	'kristen',	'085783828382',	'Siondang sari Rt/Rw 001/005 Tanjung Bintang Lamsel\r\n',	'-SMA KRISTEN INDONESIA REGIONAL',	'2013',	'MAGELANG',	'2016',	'13',	'Sujari',	'Satiyem'),
(113,	'16010102742',	'APRIYANI',	'Tanjung Karang',	'1997-04-03',	'wanita',	'islam',	'089674730669',	'JL.Imam Bonjol Gg.Kelana Langkapura, Kemiling\r\n',	'MAN 2 B.Lampung',	'2015',	'B.Lampung',	'2016',	'13',	'Tohadi',	'Sukinem'),
(114,	'16010102769',	'AYU PUSPITA SARI',	'Bandar Lampung',	'1995-09-28',	'wanita',	'islam',	'0852',	'J. Kapten Abdul Haq Gg. Ibrahim LK II',	'SMK Muhammadiyah 2 Bandar Lampung',	'2013',	'JL. Zainal Abidin Pagar Alam ',	'2016',	'13',	'Sudarno',	'Lina Wati'),
(115,	'16010102770',	'RISA FEBRIANTI',	'Serang',	'1996-02-27',	'wanita',	'islam',	'085789995066',	'Jl.Penatih Tuho No.50 Kotabumi Lampung Utara',	'SMKN 3 Kotabumi',	'2013',	'Kotabumi',	'2016',	'13',	'Johan Akipli',	'Marlia'),
(116,	'16010101771',	'MUHAMMAD IRSAD MAULANA',	'Bandar Lampung',	'1995-01-19',	'pria',	'islam',	'082240095388',	'Jl.Cut Mutia Gg.Puskesmas No.30',	'SMK PGRI 2 B.Lampung',	'2013',	'B.Lampung',	'2016',	'13',	'Didi Junaidi',	'Ningsih'),
(117,	'16010102772',	'PERA ANTIKA',	'Sidodadi',	'1997-02-24',	'wanita',	'islam',	'085267335263',	'Pgar Bukit Bengkunat Belimbing',	'SMKN 1 Ngambur Ka.Pesisir Barat',	'2016',	'Ngambur Pesisir Barat',	'2016',	'12',	'M.Subari',	'Husmaida'),
(118,	'16010101773',	'YULIAN FEBY RAMADHAN',	'Tanjung Karang',	'1997-02-04',	'pria',	'islam',	'08982050770',	'Jl.Samratulangi Gg.Bukit Sadar No.43 Kedaton\r\n',	'SMKN 2 B.Lampung',	'2014',	'B.Lampung',	'2016',	'13',	'Supariyanto, S.H',	'Sri Yuliani'),
(119,	'16010101774',	'IHSAN RAMADONI',	'Suban',	'1998-01-28',	'pria',	'islam',	'085783006758',	'Jl. Ampera RT 002 RW 002 Dusun Suban Kecamatan Mataram',	'SMKN Tanjung Sari Kabupaten Lampung Selatan',	'2015',	'Lampung Selatan',	'2016',	'13',	'Triono',	'Nurjanah'),
(120,	'16010102775',	'FESTA NOVITASARI SIRAIT',	'Natar',	'1996-11-05',	'wanita',	'islam',	'089607041276',	'DSN X (Natar I) Kec.Natar\r\n',	'Swadhipa Natar Lampung Selatan',	'2014',	'Natar Lamsel',	'2016',	'13',	'David Sirait',	'Sri Wahyuni'),
(122,	'16010102789',	'NIMAS SEKAR PALUPI',	'SUNGAI LANGKA ',	'1995-09-30',	'wanita',	'islam',	'089655923486',	'DUSUN II SUNGAI LANGKA KEC. GEDONGTATAAN PESAWARAN',	'SMK 2 Mei B.Lampung',	'2013',	'JL.ZA. PAGAR ALAM',	'2016',	'13',	'PRASTYO HANDOKO',	'Sri Hartati'),
(124,	'16010101790',	'RINO ALBAROKAH PUTRA',	'Bandar Lampung',	'1996-04-09',	'pria',	'islam',	'088210341647',	'JL. PULAU DAMAR NO. 86 PERUMNAS WAY KANDIS',	'MAN 2 TANJUNG KARANG',	'2014',	'PAHOMAN BANDAR LAMPUNG',	'2016',	'13',	'SURATNO',	'RIGAWATI'),
(125,	'16010102779',	'SURANI	',	'-',	'0001-01-01',	'--pilih--',	'islam',	'0',	'-',	'-',	'0',	'-',	'2016',	'12',	'-',	'-'),
(127,	'16020102793',	'AGITA PUTRI LISTIA',	'BANDAR LAMPUNG',	'1997-07-18',	'wanita',	'islam',	'081271648181',	'JL.IMAM BONJOL GG.MARGA SUMBER REJO KEMILING\r\n',	'SMA 7 B.LAMPUNG',	'2016',	'B.LAMPUNG',	'2016',	'14',	'MUHISI',	'SARIYAH'),
(129,	'16020101795',	'AJI PRASETIAWAN',	'BANDAR LAMPUNG',	'1996-01-10',	'pria',	'islam',	'089643426237',	'JL.PAGAR ALAM NO 11 GUNUNG AGUNG LK I SEGALA MIDER  TKB\r\n',	'SMK 2 MEI BANDAR LAMPUNG',	'2014',	'B.LAMPUNG',	'2016',	'14',	'PAIMAN',	'MARSINEM'),
(131,	'16020101795',	'AJI PRASETIAWAN',	'BANDAR LAMPUNG',	'1996-01-10',	'pria',	'islam',	'089643426237',	'JL.PAGAR ALAM NO 11 GUNUNG AGUNG LK I SEGALA MIDER  TKB\r\n',	'SMK 2 MEI BANDAR LAMPUNG',	'2014',	'B.LAMPUNG',	'2016',	'14',	'PAIMAN',	'MARSINEM'),
(132,	'16020101800',	'DENDY FATHUL AZIZI',	'BANDAR LAMPUNG',	'1997-10-23',	'pria',	'islam',	'082281833309',	'JL.DANAU TOBA GG.RUKUN NO 24 G.SULAH\r\n',	'SMK BHAKTI UTAMA B.LAMPUNG',	'2015',	'SMK BHAKTI UTAMA B.LAMPUNG\r\n',	'2016',	'14',	'LILI HAMBALI',	'SOLEHA'),
(133,	'16020102801',	'DIWANTI DESVIANTI AGUS',	'BANDAR LAMPUNG',	'1995-12-09',	'wanita',	'islam',	'089666000954',	'JL. MS BATU BARA GG.AKASIA NO 22 TELUK BETUNG UTARA\r\n',	'SMA PERINTIS 2 B. LAMPUNG',	'2013',	'B.LAMPUNG',	'2016',	'14',	'AGUS SUROTO',	'MAISAROH'),
(134,	'16020102802',	'DWI RATNA SARI',	'BRANTI',	'1994-12-11',	'wanita',	'islam',	'082184014422',	'JL.RAYA CANDIMAS,GG.PIONER NATAR\r\n',	'SMK 1 SWADIPA NATAR LAMSEL',	'2012',	'LAMSEL',	'2016',	'14',	'LEGIMAN',	'SUMARYATI'),
(135,	'16020101803',	'DWI JANARKO WIBOWO',	'B.LAMPUNG',	'1996-07-24',	'pria',	'islam',	'08975417152',	'PERUM GLORA PERSADA BLOK F 1-9 LK II RAJABASA\r\n',	'SMA ARJUNA B.LAMPUNG',	'2016',	'B.LAMPUNG',	'2016',	'14',	'DADYO WIBOWO',	'RUSMI HARTINI'),
(136,	'16020101795',	'AJI PRASETIAWAN',	'BANDAR LAMPUNG',	'1996-01-10',	'pria',	'islam',	'089643426237',	'JL.PAGAR ALAM NO 11 GUNUNG AGUNG LK I SEGALA MIDER  TKB\r\n',	'SMK 2 MEI BANDAR LAMPUNG',	'2014',	'B.LAMPUNG',	'2016',	'14',	'PAIMAN',	'MARSINEM'),
(143,	'16020101810',	'MUHAMMAD PRAYOGI',	'BANDAR LAMPUNG',	'1995-07-01',	'pria',	'islam',	'089650272153',	'JL.MELATI LK II SUMBER REJO KEMILING\r\n',	'SMK PELITA GETONG TATAAN PESAWARAN',	'2014',	'TATAAN PESAWARAN',	'2016',	'14',	'WAHONO',	'MISNU'),
(144,	'16020102811',	'PIPIT RAHAYU',	'BANDAR LAMPUNG',	'1998-06-03',	'wanita',	'islam',	'089631011130',	'KP.SUKAJAYA SUKABUMI INDAH LK I  \r\n',	'SMK NEGERI 4 BANDAR LAMPUNG',	'2016',	'B.LAMPUNG',	'2016',	'14',	'SUJITO',	'SUYANI'),
(145,	'16020101812',	'RUDI SAYLINDRA',	'BANDAR LAMPUNG',	'1995-01-14',	'pria',	'islam',	'089663461528',	'KP.SUKA INDAH PIDADA PANJANG\r\n',	'SMAN 6 B.LAMPUNG',	'2012',	'B.LAMPUNG',	'2016',	'14',	'NURAKHMAD',	'SATITI RAHAYU'),
(146,	'16020101813',	'SEPTIAN HARIYADI',	'BANDAR LAMPUNG',	'1994-09-12',	'pria',	'islam',	'081532789668',	'JL. PAGAR ALAM  GUNUNG AGUNG NO 19 BANDAR LAMPUNG\r\n',	'SMK BHAKTI UTAMA B.LAMPUNG',	'2013',	'B.LAMPUNG',	'2016',	'14',	'SUYADI',	'SUGIRAH'),
(147,	'16020102814',	'SHELY SUKMAWATI',	'BUMISARI',	'1994-03-31',	'wanita',	'islam',	'089652832913',	'JL.BIMA BUMISARI NATAR LAMSEL\r\n',	'SMK 1 SWADIPA NATAR LAMSEL',	'2012',	'natar lamsel',	'2016',	'14',	'SUKIMAN',	'RUSIAH'),
(148,	'16020101815',	'TAQWA WALESA SIHITE',	'SIHORBO',	'1995-06-21',	'pria',	'islam',	'081368727402',	'JL.ASAHAN BLOK H2 NO.21 SUKABUMI\r\n',	'SMA N 1 SILIMA PUNGGA PUNGGA DAIRI',	'2013',	'LAMPUNG',	'2016',	'14',	'MAROLOP SIHITE',	'ERDINA R PAKPAHAN'),
(149,	'16020101816',	'TONI KURNIAWAN',	'TANGGERANG',	'1995-10-27',	'pria',	'islam',	'082280558810',	'DSN.4 RAWA SELATAN CANDIPURO\r\n',	'SMK 1 CANDI PURO LAMSEL',	'2014',	'LAMPUNG SELATAN',	'2016',	'14',	'ACONG',	'YATI SUHERTINI'),
(150,	'16020101817',	'TRI WANTORO',	'BANDAR LAMPUNG',	'1996-05-12',	'pria',	'islam',	'0895354298998',	'JL.SULTAN HAJI N0.47 KEDATON\r\n',	'SMK 2 MEI B. LAMPUNG',	'2014',	'B.LAMPUNG',	'2016',	'14',	'JASWAN',	'TUGIEM'),
(151,	'16020101818',	'YUDI YANTO',	'BANDAR LAMPUNG',	'1990-06-11',	'pria',	'islam',	'081274500529',	'JL.H.AGUS SALIM GG.RATUS JAYA NO.07 TKB\r\n',	'SMK BHAKTI UTAMA B. LAMPUNG',	'2009',	'B.LAMPUNG',	'2016',	'14',	'M.TUSNI',	'TUSNAWATI'),
(152,	'16020102819',	'YUNI ANDENI',	'TANJUNG BERINGIN',	'1996-06-07',	'wanita',	'islam',	'081287760950',	'SUMBER HARAPAN MAJE TANJUNG BERINGIN\r\n',	'MAN BINTUHAN',	'2014',	'BINTUHAN',	'2016',	'14',	'AGUS SARIPUDIN',	'SUTRI'),
(153,	'16020102798',	'CLARA DEASYANITA',	'BANDAR LAMPUNG',	'1994-12-06',	'wanita',	'islam',	'089516026694',	'JL.WAY SEMANGKA NO.40 PAHOMAN B.LAMPUNG',	'SMA ARJUNA B.LAMPUNG',	'2012',	'B.LAMPUNG',	'2016',	'14',	'A. HALIMI',	'RINI DHIAN NUKIYANTI'),
(154,	'16020101808',	'IMAM RUKMANA PUTRA',	'BANDAR LAMPUNG',	'1997-11-25',	'pria',	'islam',	'089631500082',	'JL. PANGERAN EMIR M. NOER Gg. LAKSANA NO. 41',	'SMA MUHAMMADIYAH 1 B. LAMPUNG',	'2015',	'JL. ZA PAGAR ALAM',	'2016',	'14',	'ABU HASANUDDIN',	'FARIDAH'),
(155,	'16020101807',	'HARIANSYAH',	'BANDAR LAMPUNG',	'1997-04-12',	'pria',	'islam',	'08998865907',	'JL. IKAN KITER KEC. BUMI WARAS TELUK BETUNG NO. 65',	'SMK TAMAN SISWA B. LAMPUNG',	'2014',	'TELUK BETUNG',	'2016',	'14',	'AHMAD  SUTISNA',	'SOPIANA'),
(156,	'16020101806',	'FIKRI HIDAYAT',	'JAKARTA',	'1993-09-23',	'pria',	'islam',	'082372881881',	'JL.KARIMUN JAWA NO 5 SUKARAME BANDAR LAMPUNG',	'MAN 1 B.LAMPUNG',	'2011',	'JL. ENDRO SURATMIN SUKARAME',	'2016',	'14',	'SUMALI',	'HJ. SOBIROH'),
(157,	'16020101805',	'EKI ADI SAPUTRA',	'BATURAJA ',	'1991-07-05',	'pria',	'islam',	'081367215855',	'JL.R.FATTAH GG SATRIA 2 LK II KALIAWI TKP\r\n',	'SMA KARTIKATAMA METRO',	'2010',	'METRO',	'2016',	'14',	'OYON',	'KAMARNI'),
(158,	'16020101805',	'EKI ADI SAPUTRA',	'BATURAJA ',	'1991-07-05',	'pria',	'islam',	'081367215855',	'JL.R.FATTAH GG SATRIA 2 LK II KALIAWI TKP\r\n',	'SMA KARTIKATAMA METRO',	'2010',	'METRO',	'2016',	'14',	'OYON',	'KAMARNI'),
(159,	'16020101792',	'AGIL TRI HATMOKO',	'BANDAR LAMPUNG',	'1995-05-03',	'pria',	'islam',	'081379363565',	'JL. RANDU GG.DERMAWAN LK II KEMILING\r\n',	'SMA NEGERI 7 B.LAMPUNG',	'2013',	'B.LAMPUNG',	'2016',	'14',	'BUDI PURNOMO',	'SUPRIYANTI'),
(160,	'16020101794',	'AHMAD DIKA MANDALA',	'PANGKUL',	'1997-07-31',	'pria',	'islam',	'082332952258',	'JL.PAGAR ALAM GG ULANGAN II LK I SEGALA MIDER TKB\r\n',	'SMA NEGERI 1 B. LAMPUNG',	'2014',	'B.LAMPUNG',	'2016',	'14',	'SUHAIPI',	'MASIAH'),
(161,	'16020101796',	'ANDHIKA PRAHMANA SYAHPUTRA',	'BANDAR LAMPUNG',	'1993-10-28',	'pria',	'islam',	'081248780904',	'JL.PENDAWA I NO.21 LK.I GARUNTANG\r\n',	'SMA DIRGANTARA B.LAMPUNG',	'2012',	'B.LAMPUNG',	'2016',	'14',	'ASMANI',	'SUSWIYANI'),
(162,	'16020101797',	'ANUGRAH NURHIDAYAT',	'BANDAR LAMPUNG',	'1996-10-08',	'pria',	'islam',	'082179927664',	'JL. URIP SUMOHARJO GG SUNGAI 8 LK I G.SULAH WAY HALIM\r\n',	'SMK SMTI B.LAMPUNG',	'2014',	'B.LAMPUNG',	'2016',	'14',	'EKO',	'RINA SATRIANA'),
(163,	'16020101799',	'DANU SAPUTRA',	'B.LAMPUNG',	'1994-06-12',	'pria',	'islam',	'08973518851',	'JL.ST BADARUDDIN GG WALET NO 14 LK II G.AER TKB\r\n',	'SMA N 16 B.LAMPUNG',	'2013',	'B.LAMPUNG',	'2016',	'14',	'SUMARDI',	'MASNAH'),
(164,	'16020101804',	'EDI SURYANA',	'SERANG',	'1981-02-13',	'pria',	'islam',	'081369472950',	'JL.DURIAN II NO.13 LK I DURIAN PAYUNG TKP\r\n',	'SMK SWASTA HASANUDDIN SERANG',	'1999',	'SERANG',	'2016',	'14',	'A.MANYUR',	'AMIH SOPIAH'),
(165,	'16020101809',	'JULIUS AKBAR ISMAIL',	'TANJUNG KARANG',	'1988-07-23',	'pria',	'islam',	'08984305352',	'JL.IMAM BONJOL NO.319 LK II B.LAMPUNG',	'SMA PERINTIS 1 B.LAMPUNG',	'2007',	'B.LAMPUNG',	'2016',	'14',	'MUHIDIN YUSUP',	'SAMIYEM'),
(166,	'16020102820',	'RAHMAWATI',	'SUKA RAMAI',	'1995-06-24',	'wanita',	'islam',	'082173033436',	'SUKA RAMAI NATAR',	'SMAN 1 SEBERIDA',	'2014',	'INDRAGIRI HULU',	'2016',	'14',	'ASRIL',	'SILVANA'),
(167,	'16020101821',	'RENDI',	'PALEMBANG',	'1995-09-30',	'pria',	'islam',	'085767000832',	'JL.CEMARA GG.BASRI NO.32 B.LAMPUNG',	'SMAN 1 PULAU PINANG KABUPATEN LAHAT',	'2013',	'LAHAT',	'2016',	'14',	'HADRIAN',	'MURNI'),
(168,	'16020101822',	'RONNI NOPRIANSYAH',	'KOTABUMI',	'1993-11-05',	'pria',	'islam',	'089628228505',	'JL.BETIA UTAMA NO.48 WAYHALIM PERMAI',	'SMK 2MEI B.LAMPUNG',	'2012',	'B.LAMPUNG',	'2016',	'14',	'RUSLAN IBRAHIM',	'SUYATI'),
(169,	'16020101823',	'RYAN KURNIAWAN',	'BANJAR MANIS',	'1996-10-05',	'pria',	'islam',	'085768663863',	'BANJAR MANIS GISTING KAB.TANGGAMUS',	'SMAN 1 GUNUNG ALIP',	'2015',	'TANGGAMUS',	'2016',	'14',	'FAISOL',	'ERMA SURI'),
(170,	'16010102841',	'Dwi ratna wati',	'sukoharjo',	'1995-11-24',	'wanita',	'islam',	'081369061311',	'sukoharjo III Desa Keputran RT/ RW 001/ 002 Pringsewu (lampung)',	'SMK Muhammadiyah Pringsewu',	'2013',	'Pringsewu',	'2016',	'14',	'kasmuni',	'kasrini'),
(171,	'16020102824',	'ADE LISWANTI',	'BANDAR LAMPUNG',	'1993-05-14',	'wanita',	'islam',	'089510517738',	'KAMPUNG SAWAH LK II RT 030 KELURAHAN WAY LUNIK KECAMATAN TELUK BETUNG SELATAN',	'SMAN 6 B.LAMPUNG',	'2011',	'TELUK BETUNG',	'2016',	'14',	'ISWAN EFENDI',	'MASIAM'),
(172,	'16010101776',	'IRWAN SUSANTO',	'Rejomulyo',	'1991-05-15',	'pria',	'islam',	'08988440223',	'Rejomulyo RT/RW : 004/002 Kec.Jati Agung Kab.Lamsel\r\n',	'SMK Bhakti Utama B.Lampung',	'2010',	'B.Lampung',	'2016',	'13',	'Juniwan',	'Poniyah'),
(173,	'17010101826',	'BAYU RENALDI',	'BANDAR LAMPUNG',	'1995-11-13',	'pria',	'islam',	'0',	'-',	'SMK 2 MEI B.LAMPUNG',	'2014',	'BANDAR LAMPUNG',	'2017',	'15',	'RUSMANTO',	'SRI LESTARI'),
(174,	'17010102827',	'DESI INAYATI',	'SRIMULYO',	'1993-12-18',	'wanita',	'islam',	'088268050064',	'SRI MULYO II NATAR LAMSEL',	'SMAN 1 NATAR LAMSEL',	'2012',	'NATAR LAMPUNG SELATAN',	'2017',	'15',	'KARMIDI',	'ROFIAH'),
(175,	'17010102828',	'DHIAH AYU ALPRILIANI',	'METRO',	'1995-07-14',	'wanita',	'islam',	'081278655950',	'KP.JAMBU LK.II WAY LUNIK PANJANG',	'SMA PERINTIS 2 B.LAMPUNG',	'2013',	'B.LAMPUNG',	'2017',	'15',	'SODIQ',	'SUSMININGSIH'),
(176,	'17010102829',	'EKA FUZNA SHABRINA',	'PONOROGO JAWA TIMUR',	'1995-04-30',	'wanita',	'islam',	'0',	'JL.WORASIRI DE.NGANDU KEC.MIARAK',	'-',	'0',	'-',	'2017',	'15',	'KHOFIDDIN',	'SITI NURLAILY'),
(177,	'17010102830',	'HENI RIKAHAYATI',	'PADANG TAMBAK',	'1995-07-31',	'pria',	'islam',	'082269115672',	'JL.LINTAS LIWA KEC.WAY TENONG KAB.LAMPUNG BARAT',	'SMAN 1 WAY TENONG LAMPUNG BARAT',	'2014',	'LAMPUNG BARAT',	'2017',	'15',	'SUBRI RAHMAN',	'HAIRUNISA'),
(178,	'17010102831',	'IIS NIA JUNIARTI HAMZANI',	'BANDAR LAMPUNG',	'1998-06-02',	'wanita',	'islam',	'089687524334',	'JL.TELUK SEMANGKA 1 KP.KARANG INDAH PANJANG',	'SMAN 6 B.LAMPUNG',	'2016',	'B.LAMPUNG',	'2017',	'15',	'TONI BASARMAN',	'SISNAWATI'),
(179,	'17010102832',	'KARINA',	'JATIMULYO',	'1992-12-28',	'wanita',	'islam',	'089651393870',	'JL.GAJAH MADA JATIMULYO LAMSEL',	'SMA SUNAN KALIJAGA JATI AGUNG',	'2015',	'JATI AGUNG LAMSEL',	'2017',	'15',	'SUMARNO',	'MUJIRAH'),
(180,	'17010102833',	'MEISARI',	'RERANGAI',	'1993-05-30',	'wanita',	'islam',	'089662127312',	'KP.SAWAH RT/RW: 001/004 RANGAI TRITUNGGAL TARAHAN',	'SMKN 3 B.LAMPUNG',	'2011',	'B.LAMPUNG',	'2017',	'15',	'SUHARI',	'SALINAH'),
(181,	'17010101834',	'MUHAMMAD ROZALI',	'GUNUNG SINAR',	'1993-08-10',	'pria',	'islam',	'0823748364',	'KP.KROY LK.I WAY LAGA SUKABUMI B.LAMPUNG',	'SMKN TANJUNG SARI LAMSEL',	'2014',	'TANJUNG SARI LAMSEL',	'2017',	'15',	'ASMAN',	'DARIKAH'),
(182,	'17010102835',	'NURIAH',	'BANDAR LAMPUNG',	'1997-02-21',	'wanita',	'islam',	'089633997929',	'JL.CHAIRIL ANWAR GG.HJ.BUANG NO.40 LK.III',	'SMAN 3 B.LAMPUNG',	'2015',	'BANDAR LAMPUNG',	'2017',	'15',	'NURDIN',	'SURYATI'),
(183,	'17010102836',	'RESTI AYUNI',	'WAY GALIH',	'1996-05-10',	'wanita',	'islam',	'08964618616',	'WAYGALIH KEC.TANJUNG BINTANG',	'SMA UTAMA 2 B.LAMPUNG',	'2014',	'B.LAMPUNG',	'2017',	'15',	'SUPRAPTO',	'SUYATMI'),
(184,	'17010102837',	'SISKA AYU WINDARI',	'SRISAWAHAN',	'1993-05-15',	'wanita',	'islam',	'08984386049',	'LAMPUNG TENGAH',	'SMAN 1 PUNGGUR KAB.LAMPUNG TENGAH',	'2011',	'LAMPUNG TENGAH',	'2017',	'15',	'SUYOTO',	'RUSMINI'),
(185,	'17010102838',	'SRI LINDAWATI',	'BANDAR LAMPUNG',	'1994-10-18',	'wanita',	'islam',	'085669991094',	'JL.SISINGA MANGARAJA GG.AR-RAHMAN INDAH',	'SMAN 14 B.LAMPUNG',	'2013',	'BANDAR LAMPUNG',	'2017',	'15',	'UJANG EFENDI',	'SITI AISYAH'),
(186,	'17010101839',	'WAHYU ADJI PAMBUDI',	'DIPASENA AGUNG',	'1994-10-24',	'pria',	'islam',	'085768855211',	'BLOK 5 JLR 37 NO.1 RAWAJITU TIMUR',	'-',	'2014',	'-',	'2017',	'15',	'DAMIN HADI S',	'TUSMIATI'),
(187,	'17010102840',	'WIDYA FITALOKA',	'BANDAR LAMPUNG',	'1995-04-14',	'wanita',	'islam',	'082297363491',	'JL.AMD TUMENGGUNG GG.TURUNAN 2',	'SMK N 4 B.LAMPUNG',	'2013',	'BANDAR LAMPUNG',	'2017',	'15',	'SAKIP',	'LENI MARLINA'),
(188,	'17010102842',	'RIZKY PUTRI ANANDA',	'BENGKULU',	'1997-08-25',	'wanita',	'islam',	'085267519093',	'JL.PAGAR ALAM GG.PU',	'SMK PERSADA B.LAMPUNG',	'2015',	'BANDAR LAMPUNG',	'2017',	'15',	'RONI',	'ROSIDA'),
(189,	'17010102843',	'KHURFATUL JANNAH',	'LAMPUNG TIMUR',	'1998-02-16',	'wanita',	'islam',	'081278140367',	'SIDANG SIDORAHAYU KEC.RAWAJITU UTARA KAB.MESUJI',	'SMKN 1 BANDAR LAMPUNG',	'2016',	'BANDAR LAMPUNG',	'2017',	'15',	'A. NASRAN',	'DALILATUL ILMIAH'),
(190,	'17010102844',	'YULIYA SARI',	'PANJANG',	'1993-12-10',	'wanita',	'islam',	'089674574906',	'KAMPUNG TELUK JAYA NO.71 PANJANG',	'SMK PGRI 2 BANDAR LAMPUNG',	'2010',	'BANDAR LAMPUNG',	'2017',	'15',	'JONI',	'ILAWATI'),
(191,	'17010102845',	'KOMANG SANTINI',	'BATUMARTA VII',	'1997-10-23',	'wanita',	'hindu',	'081273183329',	'PERUM BKP BLOK S NO.137',	'SMAN 8 OGAN KOMERING ULU',	'2015',	'KAB.OGAN KOMERING ULU ',	'2017',	'15',	'PUTU SUMBER TAWAN',	'PUTU DAMAYANTI'),
(192,	'17010102846',	'DESI TRIANA',	'SUMBER AGUNG',	'0000-00-00',	'wanita',	'islam',	'089654034342',	'SUMBER AGUNG JALAN PONPES NO.199',	'PAKET C DINAS PENDIDIKAN',	'2016',	'BANDAR LAMPUNG',	'2017',	'15',	'MIRAN',	'SUTRI'),
(193,	'17010101849',	'FERDIAN',	'BANDAR LAMPUNG',	'1992-04-23',	'pria',	'islam',	'08982232228',	'JL.PRAMUKA RAGOM GAWI II',	'SMA PERINTIS 2 B.LAMPUNG',	'2010',	'BANDAR LAMPUNG',	'2017',	'15',	'JONI',	'YUSNAH'),
(194,	'17010101850',	'CHOLIS SEPTIAWAN',	'CIMANUK',	'1997-08-31',	'pria',	'islam',	'0',	'JL.RADEN SALEH DUSUN II WAY HUWI JATI AGUNG LAMSEL',	'SMK GAJAH MADA BANDAR LAMPUNG',	'2015',	'BANDAR LAMPUNG',	'2017',	'15',	'ACHMAD RIFA\'I',	'NAFSIAH'),
(195,	'17010101851',	'MUHAMMAD REDHO RIYANTO',	'KOTA BUMI',	'1997-08-15',	'pria',	'islam',	'0',	'PEMANGGILAN NATAR LAMPUNG SELATAN',	'SMK GAJAH MADA BANDAR LAMPUNG',	'2015',	'BANDAR LAMPUNG',	'2017',	'15',	'KI AGUS AHMAD FIRDAUS',	'SARMILA DEVI'),
(196,	'17010101847',	'RISKA RIYAN EFFENDI',	'TANJUNG KARANG',	'1998-11-14',	'pria',	'islam',	'08972220073',	'JL. CENGKEH NO. 8 RT 2 GEDUNG MENENG. RAJA BASA',	'SMK 2 MEI B. LAMPUNG',	'2015',	'JL . ZAINAL ABIDIN PAGAR ALAM BANDAR LAMPUNG',	'2017',	'15',	'SARPENDI',	'LASTUTI'),
(197,	'17010102852',	'BETI OKTARIANA',	'TATAKARYA',	'1996-10-22',	'wanita',	'islam',	'082281150973',	'TATA KARYA ABUNG SURAKARTA LAMPUNG UTARA',	'SMKN 1 ABUNG SURAKARTA KAB.LAMPUNG UTARA',	'2014',	'LAMPUNG UTARA',	'2017',	'15',	'HERMAN AKIP',	'BAYANA'),
(198,	'17010102853',	'LAS WIDI ASTARI',	'METRO',	'1992-04-30',	'wanita',	'islam',	'08527999993',	'Gg. Morotai Gg. M. Saleh',	'SMK PGRI 1 BANDAR LAMPUNG',	'2010',	'BANDAR LAMPUNG',	'2017',	'15',	'Boniman',	'Sutarti');

DROP TABLE IF EXISTS `matakuliah`;
CREATE TABLE `matakuliah` (
  `idMk` int(11) NOT NULL AUTO_INCREMENT,
  `namaMk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`idMk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `matakuliah` (`idMk`, `namaMk`, `keterangan`) VALUES
(1,	'Desain Web',	''),
(2,	'Web II',	'');

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenisPembayaran` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pembayaran` (`id`, `jenisPembayaran`, `biaya`) VALUES
(1,	'Uang Pendaftaran',	'100000'),
(2,	'Biaya Kursus',	'350000');

DROP TABLE IF EXISTS `soal`;
CREATE TABLE `soal` (
  `idSoal` varchar(255) NOT NULL,
  `noSoal` varchar(255) NOT NULL,
  `detailSoal` text NOT NULL,
  `jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `soal` (`idSoal`, `noSoal`, `detailSoal`, `jawaban`) VALUES
('KoaiJtxwd0',	'1',	'gg\'sdjjdjd<sjjhd>',	'--pilih--'),
('KoaiJtxwd0',	'2',	'gg\'sdjjdjd<sjjhd>',	'--pilih--'),
('KoaiJtxwd0',	'3',	'gg\'sdjjdjd<sjjhd>',	'--pilih--'),
('5m8caYitjZ',	'1',	'',	'--pilih--'),
('5m8caYitjZ',	'2',	'',	'--pilih--'),
('5m8caYitjZ',	'3',	'',	'--pilih--'),
('5m8caYitjZ',	'4',	'',	'--pilih--'),
('5m8caYitjZ',	'5',	'',	'--pilih--');

DROP TABLE IF EXISTS `trx`;
CREATE TABLE `trx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(255) NOT NULL,
  `idPembayaran` varchar(255) NOT NULL,
  `jenisPembayaran` varchar(255) NOT NULL,
  `nirm` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `idPetugas` varchar(255) NOT NULL,
  `namaPetugas` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `denda` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `trx` (`id`, `invoice`, `idPembayaran`, `jenisPembayaran`, `nirm`, `nama`, `idPetugas`, `namaPetugas`, `biaya`, `denda`, `kategori`, `tanggal`, `waktu`) VALUES
(1,	'Wn3QpNb0iC',	'1',	'Uang Pendaftaran',	'1011080037',	'Okta Pilopa',	'pilopa',	'okta pilopa',	'100000',	'25000',	'pelunasan',	'2016-01-12',	'15:39:14'),
(2,	'r2bUleOoWz',	'1',	'Uang Pendaftaran',	'1605010001',	'Tumin Jefriansyah',	'pilopa',	'okta pilopa',	'100000',	'0',	'pelunasan',	'2016-02-23',	'04:32:12'),
(3,	'r2bUleOoWz',	'2',	'Biaya Kursus',	'1605010001',	'Tumin Jefriansyah',	'pilopa',	'okta pilopa',	'350000',	'0',	'pelunasan',	'2016-02-23',	'04:32:22'),
(4,	'ltNW5Xumwc',	'1',	'Uang Pendaftaran',	'1605010002',	'Herman Susanto',	'pilopa',	'okta pilopa',	'100000',	'0',	'pelunasan',	'2016-02-23',	'04:32:57'),
(5,	'3082574619',	'1',	'Uang Pendaftaran',	'1605010002',	'Herman Susanto',	'pilopa',	'okta pilopa',	'100000',	'0',	'pelunasan',	'2016-06-04',	'09:16:09'),
(6,	'SACt5yHciP',	'1',	'Uang Pendaftaran',	'',	'okta pilopa',	'pilopa',	'okta pilopa',	'100000',	'0',	'pelunasan',	'2017-05-08',	'05:03:47'),
(7,	'SACt5yHciP',	'1',	'Uang Pendaftaran',	'',	'okta pilopa',	'pilopa',	'okta pilopa',	'100000',	'0',	'pelunasan',	'2017-05-08',	'05:03:51'),
(8,	'vL6nE0uaUm',	'1',	'Uang Pendaftaran',	'',	'test',	'pilopa',	'okta pilopa',	'100000',	'0',	'pelunasan',	'2017-05-08',	'05:16:31'),
(9,	'vL6nE0uaUm',	'2',	'Biaya Kursus',	'',	'test',	'pilopa',	'okta pilopa',	'350000',	'350000',	'pelunasan',	'2017-05-08',	'05:16:39'),
(10,	'2863057941',	'1',	'Uang Pendaftaran',	'',	'asdf',	'pilopa',	'okta pilopa',	'100000',	'0',	'pelunasan',	'2017-05-09',	'05:47:05'),
(11,	'0892165473',	'1',	'Uang Pendaftaran',	'',	'test',	'pilopa',	'okta pilopa',	'100000',	'0',	'pelunasan',	'2017-05-09',	'06:09:30'),
(12,	'0892165473',	'1',	'Uang Pendaftaran',	'',	'test',	'pilopa',	'okta pilopa',	'100000',	'0',	'pelunasan',	'2017-05-09',	'06:09:32');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`username`, `nama`, `password`, `level`) VALUES
('iqbal1',	'muhammad iqbal',	'e10adc3949ba59abbe56e057f20f883e',	'admin'),
('pilopa',	'okta pilopa',	'29f407c056a49df82ff273a37a82999f',	'admin');

DROP TABLE IF EXISTS `waktu`;
CREATE TABLE `waktu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSoal` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `waktu` (`id`, `idSoal`, `waktu`, `keterangan`) VALUES
(1,	'KoaiJtxwd0',	'20',	'tes'),
(2,	'5m8caYitjZ',	'20',	'res');

-- 2017-05-09 15:24:12
