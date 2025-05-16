<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $quantity = $_POST['quantity'];

    // Siapkan item
    $item = [
        'id' => $productId,
        'name' => $productName,
        'price' => $productPrice,
        'quantity' => $quantity
    ];

    // Cek apakah cart sudah ada, lalu update atau tambahkan item
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Jika produk sudah ada, update jumlah
    $found = false;
    foreach ($_SESSION['cart'] as &$cartItem) {
        if ($cartItem['id'] === $productId) {
            $cartItem['quantity'] += $quantity;
            $found = true;
            break;
        }
    }
    unset($cartItem); // break reference

    // Jika belum ada, tambahkan baru
    if (!$found) {
        $_SESSION['cart'][] = $item;
    }

    // Redirect ke cart.php agar tidak memproses ulang saat refresh
    header('Location: cart.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Keranjang Belanja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="cart.css">
</head>
<body>
<div class="container mt-5">
  <h2>Daftar Belanja</h2>
  <?php if (!empty($_SESSION['cart'])): ?>
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
        $grandTotal = 0;
        foreach ($_SESSION['cart'] as $item):
          $total = $item['price'] * $item['quantity'];
          $grandTotal += $total;
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
    <h4>Total Belanja: Rp <?= number_format($grandTotal, 0, ',', '.') ?></h4>
    <a href="checkout.php" class="btn btn-success">Checkout</a>
  <?php else: ?>
    <p>Keranjang kosong.</p>
  <?php endif; ?>
</div>
</body>
</html>
