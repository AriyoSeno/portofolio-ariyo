<?php
/**
 * DATA PRODUK  (representasi "Tabel Produk")
 * ------------------------------------------------------------
 * Atribut           | Tipe Data
 * id_barang         | Number
 * nama_barang       | String
 * deskripsi_barang  | String
 * harga_barang      | Number
 * barang_masuk      | Number   -> total barang yang masuk gudang
 * barang_keluar     | Number   -> total barang yang terjual / keluar
 * gambar_barang     | String   -> nama file di assets/img/produk/
 *
 * jml_barang (stok) TIDAK disimpan, tapi dihitung di katalog.php:
 *     jml_barang = barang_masuk - barang_keluar
 */
return [
    [
        'id_barang'        => 1,
        'nama_barang'      => 'Kemeja Flanel Kotak',
        'deskripsi_barang' => 'Kemeja flanel lengan panjang bermotif kotak merah. Bahan katun lembut, nyaman untuk santai maupun kuliah.',
        'harga_barang'     => 185000,
        'barang_masuk'     => 50,
        'barang_keluar'    => 32,
        'gambar_barang'    => 'kemeja-flanel.svg',
    ],
    [
        'id_barang'        => 2,
        'nama_barang'      => 'Kaos Oversize Polos',
        'deskripsi_barang' => 'Kaos oversize putih bahan cotton combed 24s. Potongan longgar, adem dan mudah dipadukan.',
        'harga_barang'     => 99000,
        'barang_masuk'     => 120,
        'barang_keluar'    => 85,
        'gambar_barang'    => 'kaos-oversize.svg',
    ],
    [
        'id_barang'        => 3,
        'nama_barang'      => 'Hoodie Zipper',
        'deskripsi_barang' => 'Hoodie abu-abu dengan resleting depan dan kantong kangguru. Bahan fleece tebal, hangat dan tidak mudah kusut.',
        'harga_barang'     => 249000,
        'barang_masuk'     => 40,
        'barang_keluar'    => 36,
        'gambar_barang'    => 'hoodie-zipper.svg',
    ],
    [
        'id_barang'        => 4,
        'nama_barang'      => 'Celana Chino Slim Fit',
        'deskripsi_barang' => 'Celana chino warna khaki dengan potongan slim fit. Bahan twill stretch yang fleksibel untuk dipakai seharian.',
        'harga_barang'     => 215000,
        'barang_masuk'     => 60,
        'barang_keluar'    => 41,
        'gambar_barang'    => 'celana-chino.svg',
    ],
    [
        'id_barang'        => 5,
        'nama_barang'      => 'Jaket Denim',
        'deskripsi_barang' => 'Jaket jeans biru klasik dengan dua kantong dada. Bahan denim washed yang awet dan tampil timeless.',
        'harga_barang'     => 325000,
        'barang_masuk'     => 25,
        'barang_keluar'    => 25,
        'gambar_barang'    => 'jaket-denim.svg',
    ],
    [
        'id_barang'        => 6,
        'nama_barang'      => 'Topi Baseball',
        'deskripsi_barang' => 'Topi baseball hitam dengan strap belakang yang bisa diatur. Cocok untuk aktivitas outdoor sehari-hari.',
        'harga_barang'     => 65000,
        'barang_masuk'     => 80,
        'barang_keluar'    => 52,
        'gambar_barang'    => 'topi-baseball.svg',
    ],
];
