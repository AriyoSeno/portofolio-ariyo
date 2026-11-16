<?php
// ---------- 1. Ambil data & hitung stok ----------
$daftar_produk = require __DIR__ . '/data/produk.php';

foreach ($daftar_produk as &$p) {
    // Stok barang = barang masuk - barang keluar
    $p['jml_barang'] = $p['barang_masuk'] - $p['barang_keluar'];
}
unset($p);

// ---------- 2. Fungsi bantu ----------
function rupiah(int $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function e(string $teks): string
{
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}

/** Status stok: [label, kelas CSS] */
function status_stok(int $stok): array
{
    if ($stok <= 0) return ['Habis', 'status-out'];
    if ($stok <= 5) return ['Menipis', 'status-low'];
    return ['Tersedia', 'status-ok'];
}

// ---------- 3. Ringkasan ----------
$total_produk = count($daftar_produk);
$total_stok   = array_sum(array_column($daftar_produk, 'jml_barang'));
$total_keluar = array_sum(array_column($daftar_produk, 'barang_keluar'));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - Ariyo Seno</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="container">
            <a href="index.html" class="logo"><span>&lt;</span>ARIYO SENO<span>&gt;</span></a>
            <nav class="nav-links">
                <a href="index.html">CV</a>
                <a href="katalog.php" class="active">Katalog Produk</a>
                <a href="index.html#contact">Kontak</a>
            </nav>
            <a href="index.html#contact" class="btn btn-primary">Hubungi Saya</a>
        </div>
    </header>

    <!-- HEADER KATALOG -->
    <section class="catalog-hero">
        <div class="container">
            <div class="badge-pill"><span class="pulse-dot"></span> Produk Fashion</div>
            <h1>Katalog <span class="gradient-text">Produk</span></h1>
            <p>Daftar produk fashion beserta deskripsi, harga, dan stok barang yang selalu diperbarui dari data barang masuk dan barang keluar.</p>

            <div class="catalog-summary">
                <div class="summary-item"><strong><?= $total_produk ?></strong><span>Jenis Produk</span></div>
                <div class="summary-item"><strong><?= $total_stok ?></strong><span>Total Stok</span></div>
                <div class="summary-item"><strong><?= $total_keluar ?></strong><span>Barang Terjual</span></div>
            </div>
        </div>
    </section>

    <!-- DAFTAR PRODUK -->
    <section class="section">
        <div class="container">
            <?php if (empty($daftar_produk)): ?>
                <p class="empty-state">Belum ada produk yang tersedia.</p>
            <?php else: ?>
            <div class="product-grid">
                <?php foreach ($daftar_produk as $produk):
                    [$label, $kelas] = status_stok($produk['jml_barang']);
                ?>
                <article class="product-card <?= $produk['jml_barang'] <= 0 ? 'sold-out' : '' ?>">
                    <div class="product-img">
                        <img src="assets/img/produk/<?= e($produk['gambar_barang']) ?>" alt="<?= e($produk['nama_barang']) ?>">
                        <span class="product-id">ID <?= str_pad((string) $produk['id_barang'], 3, '0', STR_PAD_LEFT) ?></span>
                    </div>

                    <div class="product-body">
                        <h3><?= e($produk['nama_barang']) ?></h3>
                        <p class="product-desc"><?= e($produk['deskripsi_barang']) ?></p>
                        <div class="product-price"><?= rupiah($produk['harga_barang']) ?></div>
                    </div>

                    <div class="stock-box">
                        <div class="stock-flow">
                            <div class="in"><i class="fa-solid fa-arrow-down"></i> Masuk: <?= $produk['barang_masuk'] ?></div>
                            <div class="out"><i class="fa-solid fa-arrow-up"></i> Keluar: <?= $produk['barang_keluar'] ?></div>
                        </div>
                        <div class="stock-count">
                            <span class="stock-label">Stok Barang</span>
                            <strong><?= $produk['jml_barang'] ?></strong>
                            <span class="stock-status <?= $kelas ?>"><?= $label ?></span>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="copyright" style="margin-top:0; border-top:0;">&copy; <?= date('Y') ?> Ariyo Seno. All rights reserved.</div>
        </div>
    </footer>

</body>
</html>
