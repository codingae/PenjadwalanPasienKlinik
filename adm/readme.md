- a = dokter
- b = lopen
- c = lobat
- d = pasien

periksa - tanggal daftar ganti tanggal periksa

table periksa tambah status (untuk mengetahui status sudah di periksa atau belum)
table layanan id_penyakit diganti penyakit untuk efisiensi coding
table layanan tambah field layanan_tambahan dan biaya_layanan_tambahan
PR->cari logika untuk batas akhir layanan pasien

<!-- tabel periksa -->
stts
1 artinya belum dilayani
2 artinya sudah dilayani
3 artinya tidak datang berobat
4 artinya selesai periksa

<!-- tabel layanan -->
penambahan field nama pasien

<!-- tabel periksa, layanan, pendapatan -->
ditambah field pj untuk mengetahui siapa yang menginput

<!-- tabel obat -->
-tambah pj
-ganti id_obat jadi nama_obat1,nama_obat2,nama_obat3,nama_obat4 (belum)

<!-- untuk fitur obat masuk -->
1. Untuk Fungsi Tambah
	Akan menambahkan stok sesuai yang di masukkan
2. Untuk Fungsi Edit
	Akan digunakan untuk mengedit obat sesuai dengan yang dipilih
3. Untuk Fungsi Warning
	Akan digunakan untuk meng-update stok dan membuang stok yang sudah kadaluarsa

Disini Juga Ada Beberapa Seleksi Peringatan
1. Peringatan 1 (Rentang Kadaluarsa Antara > 15 hari - < 30 hari)
2. Peringatan 2 (Rentang Kadaluarsa Antara > 3 hari - < 16 hari)
3. Peringatan 3 (Rentang Kadaluarsa Antara > 0 hari - < 4 hari)
4. KADALUARSA (Rentang Kadaluarsa Antara <= 0 Hari)
NB: Selain itu berarti obat masih bisa dipakai

<!-- penambahan tabel obat kadaluarsa -->
fungsinya untuk merecord obat yang sudah kadaluarsa dan tidak dipakai lagi

PR
-> record obat salah select data
-> input gaji (dokter)
-> tampilan pemberitahuan tidak datang periksa (pasien)
-> input keperluan lain (ternyata ada yang kelewatan??)

-> ada logika untuk periksa yang kurang
-> tooltip langsung saja isi peringatannya

<!-- record gaji -->
-> id_mg ganji jabatan
-> total gaji ganti bonus

<!-- konsultasi -->
tambah tabel konsultasi untuk konsultasi kesehatan

<!-- tabel testimoni -->
tabel testimoni untuk membuat feedback dari pasien ke klien
Untuk tabel FAQ d hapus soalnya ndak kanggo

NB: BERHUBUNG NDEK UPLOAD FOTO BELUM DI KASI CROPPING, USAHAKAN KHUSUS UNTUK DOKTER FOTONYA UPLOAD DENGAN UKURAN 300x300px