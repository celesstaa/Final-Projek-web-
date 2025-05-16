<?php
require('./conection.php');

// Delete produk jika ada query param id
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    crud::deleteproducts($id);
    header("Location: produk.php");
    exit();
}

$p = crud::Selectproducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Tabel Produk</title>
<style>
    * { padding: 0; margin: 0; box-sizing: border-box; }
    body { background: white; font-family: Arial, sans-serif; }
    h2 { text-align: center; margin: 20px 0; }
    table {
        width: 90%;
        margin: auto;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        border-collapse: collapse;
    }
    table, th, td { border: 1px solid rgb(200, 200, 200); }
    th {
        background: rebeccapurple;
        color: white;
        height: 50px;
    }
    td {
        text-align: center;
        padding: 5px;
        vertical-align: middle;
        word-break: break-word;
    }
    a { text-decoration: none; }
    img { width: 20px; height: 20px; object-fit: contain; }
    .product-img {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
    td.description {
        white-space: normal;
        max-width: 150px;
        word-wrap: break-word;
        height: auto;
    }
    td.product-img-cell { width: 150px; padding: 10px; }
    td.edit-cell, td.delete-cell {
        width: 80px; padding: 10px;
    }
</style>
<style>
  .back-button-container {
    position: fixed;
    top: 15px;
    right: 15px;
    z-index: 1030;
  }
  .back-button-container a.btn-purple {
    display: inline-block;
    color: #8a6bc1;
    border: 2px solid #8a6bc1;
    border-radius: 6px;
    padding: 6px 14px;
    font-weight: 500;
    box-shadow: 0 2px 6px rgba(138, 107, 193, 0.3);
    text-decoration: none;
    transition: all 0.3s ease;
  }
  .back-button-container a.btn-purple:hover {
    background-color: #8a6bc1;
    color: white;
    box-shadow: 0 4px 12px rgba(138, 107, 193, 0.6);
  }
</style>

</head>
<body>
<div class="back-button-container">
  <a href="halaman_admin.php" class="btn-purple">Kembali</a>
</div>

<h2>Tabel Produk</h2>
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if (count($p) > 0) {
        foreach ($p as $product) {
            echo '<tr>';
            foreach ($product as $key => $value) {
                if ($key != 'id' && $key != 'image') {
                    if ($key == 'description') {
                        echo '<td class="description">'.htmlspecialchars($value).'</td>';
                    } else {
                        echo '<td>'.htmlspecialchars($value).'</td>';
                    }
                }
            }
            $imagePath = 'uploads/' . $product['image'];
            echo '<td class="product-img-cell"><img src="' . htmlspecialchars($imagePath) . '" alt="Product Image" class="product-img"></td>';
            echo '<td class="edit-cell"><a href="updateProduk.php?id_up='.urlencode($product['id']).'"><img src="./editData.svg" alt="Edit"></a></td>';
            echo '<td class="delete-cell"><a href="produk.php?id='.urlencode($product['id']).'" onclick="return confirm(\'Yakin ingin menghapus produk ini?\')"><img src="./simbolSampah.svg" alt="Delete"></a></td>';
            echo '</tr>';
        }
    }
    ?>
    </tbody>
</table>

</body>
</html>
