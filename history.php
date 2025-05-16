<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

$ordersFile = 'orders.json';
$orders = [];

if (file_exists($ordersFile)) {
    $orders = json_decode(file_get_contents($ordersFile), true) ?? [];
}

// Balik urutan supaya transaksi terbaru di atas
$ordersReversed = array_reverse($orders);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Pembelian</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="history.css">
</head>
<body>
 <style>
  .back-button-container {
    position: fixed;
    top: 15px;
    right: 15px;
    z-index: 1030;
  }
  .back-button-container a.btn-brown {
    display: inline-block;
    color: #A67B5B;
    border: 2px solid #A67B5B;
    border-radius: 6px;
    padding: 6px 14px;
    font-weight: 500;
    box-shadow: 0 2px 6px rgba(166, 123, 91, 0.3);
    text-decoration: none;
    transition: all 0.3s ease;
  }
  .back-button-container a.btn-brown:hover {
    background-color: #A67B5B;
    color: white;
    box-shadow: 0 4px 12px rgba(166, 123, 91, 0.6);
  }
</style>

<div class="back-button-container">
  <a href="website.php" class="btn-brown">
    &larr; Kembali
  </a>
</div>

<div class="container mt-5">
  
  <h2>Riwayat Pembelian</h2>

  <?php if (!empty($ordersReversed)): ?>
    <?php foreach ($ordersReversed as $index => $order): ?>
      <h5>Transaksi #<?= htmlspecialchars($order['id'] ?? ($index+1)) ?> - <?= htmlspecialchars($order['tanggal'] ?? '-') ?></h5>
      <p><strong>Status:</strong> <?= htmlspecialchars($order['status'] ?? 'Menunggu Konfirmasi') ?></p>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $totalOrder = 0;
          foreach ($order['items'] as $item):
            $total = $item['price'] * $item['quantity'];
            $totalOrder += $total;
          ?>
            <tr>
              <td><?= htmlspecialchars($item['name']) ?></td>
              <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
              <td><?= $item['quantity'] ?></td>
              <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <strong>Total Transaksi: Rp <?= number_format($totalOrder, 0, ',', '.') ?></strong>
      <hr>
    <?php endforeach; ?>
  <?php else: ?>
    <p>Belum ada riwayat pembelian.</p>
  <?php endif; ?>
</div>
</body>
</html>
