create view `view_om` AS select 
				`obat_masuk`.`id_om` AS `id_om`,
				`master_obat`.`id_obat` AS `id_obat`,
				`master_obat`.`nama_obat` AS `nama_obat`,
				`obat_masuk`.`jml_om` AS `jml_om`,
				`obat_masuk`.`total_biaya_om` AS `total_biaya_om`,
				`obat_masuk`.`kadaluarsa` AS `kadaluarsa`
				from (`obat_masuk` join `master_obat` on((`obat_masuk`.`id_obat` = `master_obat`.`id_obat`)));

create view `view_layanan_belum` AS select 
				`periksa`.`id_periksa` AS `id_periksa`,
				`pengguna`.`uname` AS `uname`,
				`periksa`.`tanggal_periksa` AS `tanggal_periksa`,
				`periksa`.`no_antrian` AS `no_antrian`,
				`periksa`.`waktu_periksa` AS `waktu_periksa`,
				`periksa`.`stts` AS `stts`
				from (`periksa` left join `pengguna` on(`periksa`.`id_pengguna` = `pengguna`.`id_pengguna`));

create view `view_layanan_sudah` AS select 
				`periksa`.`id_periksa` AS `id_periksa`,
				`pengguna`.`uname` AS `uname`,
				`periksa`.`tanggal_periksa` AS `tanggal_periksa`,
				`layanan`.`penyakit` AS `penyakit`,
				`periksa`.`stts` AS `stts`
				from (`periksa` left join `pengguna` on(`periksa`.`id_pengguna` = `pengguna`.`id_pengguna`)
								left join `layanan` on(`periksa`.`id_periksa` = `layanan`.`id_periksa`));

create view `view_layanan_full` AS select 
				`layanan`.`id_periksa` AS `id_periksa`,
				`layanan`.`nama_pasien` AS `nama_pasien`,
				`layanan`.`id_masterlayanan1` AS `id_masterlayanan1`,
				`layanan`.`id_masterlayanan2` AS `id_masterlayanan2`,
				`layanan`.`id_masterlayanan3` AS `id_masterlayanan3`,
				`layanan`.`id_masterlayanan4` AS `id_masterlayanan4`,
				`layanan`.`layanan_tambahan` AS `layanan_tambahan`,
				`layanan`.`penyakit` AS `penyakit`,
				`layanan`.`pj` AS `pj`,
				`obat_keluar`.`nama_obat` AS `nama_obat`,
				`obat_keluar`.`jml_ok` AS `jml_ok`,
				`obat_keluar`.`pj` AS `pj`
				from (`layanan` left join `obat_keluar` on(`layanan`.`id_periksa` = `obat_keluar`.`id_periksa`));

create view `view_layanan_sudah_pj` AS select 
				`periksa`.`id_periksa` AS `id_periksa`,
				`pengguna`.`uname` AS `uname`
				from (`periksa` join `pengguna` on(`periksa`.`pj` = `pengguna`.`id_pengguna`));

create view `view_pendapatan` AS select 
				`pendapatan`.`tgl_pendapatan` AS `tgl_pendapatan`,
				`pendapatan`.`jml_pendapatan` AS `jml_pendapatan`,
				`pengguna`.`uname` AS `uname`
				from (`pendapatan` join `pengguna` on(`pendapatan`.`pj` = `pengguna`.`id_pengguna`));

create view `view_rg` AS select 
				`record_gaji`.`tanggal_gaji` AS `tanggal_gaji`,
				`pengguna`.`id_pengguna` AS `id_pengguna`,
				`pengguna`.`level` AS `level`,
				`pengguna`.`nama_depan` AS `nama_depan`,
				`pengguna`.`nama_belakang` AS `nama_belakang`
				from (`record_gaji` join `pengguna` on(`record_gaji`.`id_pengguna` = `pengguna`.`id_pengguna`));
-- enes --
DROP TABLE IF EXISTS `view_mapel`;
create view `view_mapel` AS select 
				`tbl_nilai`.`id_nilai` AS `id_nilai`,
				`tbl_nilai`.`id_siswa` AS `id_siswa`,
				`data_siswa`.`nama_siswa` AS `nama_siswa`,
				`tbl_nilai`.`id_periode` AS `id_periode`,
				`tbl_nilai`.`nilai_tugas` AS `nilai_tugas`,
				`tbl_nilai`.`nilai_uts` AS `nilai_uts`,
				`tbl_nilai`.`nilai_uas` AS `nilai_uas`,
				`tbl_nilai`.`id_matapelajaran` AS `id_matapelajaran`,
				`setup_matapelajaran`.`nama_matapelajaran` AS `nama_matapelajaran`
				from (`tbl_nilai` left join `setup_matapelajaran` on(`tbl_nilai`.`id_matapelajaran` = `setup_matapelajaran`.`id_matapelajaran`)
								  left join `data_siswa` on(`tbl_nilai`.`id_siswa` = `data_siswa`.`id_siswa`));