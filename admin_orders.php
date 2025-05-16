<?php
$ordersFile = 'orders.json';
$orders = [];

// Ambil data dari file JSON
if (file_exists($ordersFile)) {
    $jsonData = file_get_contents($ordersFile);
    $orders = json_decode($jsonData, true) ?? [];
}

// Update status jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'], $_POST['status'])) {
    $orderId = $_POST['order_id'];
    $newStatus = $_POST['status'];

    // Cari pesanan berdasarkan ID
    foreach ($orders as &$order) {
        if ($order['id'] == $orderId) {
            $order['status'] = $newStatus;
            break;
        }
    }
    unset($order); // Hapus referensi

    // Simpan kembali ke file JSON
    file_put_contents($ordersFile, json_encode($orders, JSON_PRETTY_PRINT));
    header("Location: " . $_SERVER['PHP_SELF']); // Hindari resubmit saat refresh
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesanan Masuk (Admin)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="admin.css">
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
</head>
<body>
  <div class="back-button-container">
  <a href="halaman_admin.php" class="btn-brown">
    &larr; Kembali
  </a>
</div>
<div class="container mt-5">
  <h2>Daftar Pesanan Masuk</h2>

  <?php if (!empty($orders)): ?>
    <?php foreach (array_reverse($orders) as $order): ?>
      <div class="card mb-3">
        <div class="card-header">
          <strong>ID:</strong> <?= $order['id'] ?> |
          <strong>Tanggal:</strong> <?= $order['tanggal'] ?> |
          <strong>Total:</strong> Rp <?= number_format($order['total'], 0, ',', '.') ?> |
          <strong>Status:</strong> <?= $order['status'] ?? 'Belum ditentukan' ?>
        </div>
        <div class="card-body">
          <ul class="list-group mb-3">
            <?php foreach ($order['items'] as $item): ?>
              <li class="list-group-item">
                <?= htmlspecialchars($item['name']) ?> -
                Jumlah: <?= $item['quantity'] ?> -
                Harga: Rp <?= number_format($item['price'], 0, ',', '.') ?> -
                Subtotal: Rp <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>
              </li>
            <?php endforeach; ?>
          </ul>

          <!-- Form ubah status -->
          <form method="POST" class="d-flex align-items-center">
            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
            <select name="status" class="form-select me-2" style="width: auto;">
              <option value="Segera dikirim" <?= ($order['status'] ?? '') === 'Segera dikirim' ? 'selected' : '' ?>>Segera dikirim</option>
              <option value="Dalam Perjalanan" <?= ($order['status'] ?? '') === 'Dalam Perjalanan' ? 'selected' : '' ?>>Dalam Perjalanan</option>
              <option value="Ditolak" <?= ($order['status'] ?? '') === 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
              <option value="Selesai" <?= ($order['status'] ?? '') === 'Selesai' ? 'selected' : '' ?>>Selesai</option>
            </select>
            <button type="submit" class="btn btn-primary">Ubah Status</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p>Belum ada pesanan.</p>
  <?php endif; ?>
</div>
</body>
</html>
