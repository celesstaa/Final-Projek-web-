<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

$ordersFile = 'orders.json';
$pesananDiproses = false;
$errorMsg = '';

// Ambil data orders lama dari file JSON
$orders = [];
if (file_exists($ordersFile)) {
    $orders = json_decode(file_get_contents($ordersFile), true) ?? [];
}

// Proses checkout jika cart ada dan tidak kosong
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Hitung total harga
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Buat ID pesanan unik (timestamp + random)
    $orderId = time() . rand(100, 999);

    // Susun data pesanan baru
    $newOrder = [
        'id' => $orderId,
        'tanggal' => date('Y-m-d H:i:s'),
        'status' => 'Menunggu Konfirmasi',
        'total' => $total,
        'items' => $_SESSION['cart']
    ];

    // Tambahkan ke daftar orders
    $orders[] = $newOrder;

    // Simpan ke file JSON
    if (file_put_contents($ordersFile, json_encode($orders, JSON_PRETTY_PRINT))) {
        // Berhasil simpan, hapus cart dan set flag sukses
        unset($_SESSION['cart']);
        $pesananDiproses = true;
    } else {
        // Gagal simpan file
        $errorMsg = 'Gagal menyimpan data pesanan. Silakan coba lagi.';
    }
} else {
    $errorMsg = 'Keranjang belanja Anda kosong. Tidak bisa checkout.';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
  <?php if ($pesananDiproses): ?>
    <div class="alert alert-success">
      <h4 class="alert-heading">Pesanan Telah Selesai Dibuat!</h4>
      <p>Terima kasih telah berbelanja. Anda dapat melihat riwayat pesanan Anda melalui tombol di bawah ini.</p>
      <hr>
      <a href="history.php" class="btn btn-primary">Lihat Riwayat Pesanan</a>
    </div>
  <?php else: ?>
    <div class="alert alert-warning">
      <h4 class="alert-heading">Checkout Gagal</h4>
      <p><?= htmlspecialchars($errorMsg) ?></p>
      <a href="website.php" class="btn btn-secondary">Kembali ke Beranda</a>
    </div>
  <?php endif; ?>
</div>
</body>
</html>
