<?php
// Halaman dashboard admin dengan 4 kotak navigasi
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    body {
      background-color: #fefaf6;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .container {
      max-width: 900px;
      margin: 50px auto;
      text-align: center;
    }
    h1 {
      color: #8b6d4b;
      margin-bottom: 40px;
      font-weight: 700;
    }
    .card {
      background-color: #faf6f0;
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(150, 110, 60, 0.15);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
      padding: 30px;
      color: #5a4729;
      font-weight: 600;
      text-decoration: none;
      display: block;
      height: 160px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 25px rgba(150, 110, 60, 0.25);
      color: #8b6d4b;
    }
    .card i {
      font-size: 3.5rem;
      margin-bottom: 15px;
      color: #a89a7f;
      transition: color 0.3s ease;
    }
    .card:hover i {
      color: #8b6d4b;
    }
    .row > div[class*='col-'] {
      margin-bottom: 30px;
    }
  </style>
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
  <a href="login.php" class="btn-brown">
    &larr; Kembali
  </a>
</div>
  <div class="container">
    <h1>Dashboard Admin</h1>
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <a href="produk.php" class="card">
          <i class="fa fa-boxes"></i>
          <div>Kelola Produk</div>
        </a>
      </div>
      <div class="col-md-3 col-sm-6">
        <a href="users.php" class="card">
          <i class="fa fa-users"></i>
          <div>Kelola Pengguna</div>
        </a>
      </div>
      <div class="col-md-3 col-sm-6">
        <a href="updateProduk.php" class="card">
          <i class="fa fa-edit"></i>
          <div>Update Produk</div>
        </a>
      </div>
      <div class="col-md-3 col-sm-6">
        <a href="admin_orders.php" class="card">
          <i class="fa fa-receipt"></i>
          <div>Pantau Pesanan</div>
        </a>
      </div>
    </div>
  </div>
</body>
</html>
