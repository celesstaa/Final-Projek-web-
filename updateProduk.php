<?php
require('./conection.php');

// Create Produk
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    if (!empty($image)) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    $insert = crud::insertProduct($name, $description, $price, $image);
    header("Location: produk.php");
    exit;
}

// Update Produk
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Cek jika gambar baru diupload
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $image = $_POST['old_image'];
    }

    // Panggil fungsi untuk memperbarui produk
    $update = crud::updateProduct($id, $name, $description, $price, $image);
    header("Location: produk.php");
    exit;
}


// Delete Produk
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = crud::deleteProducts($id);
    header("Location: produk.php");
    exit;
}

// Select Semua Produk
$products = crud::Selectproducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Produk Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            padding: 20px;
        }
        h2 {
            margin-top: 30px;
            text-align: center;
        }
        form {
            width: 50%;
            margin: auto;
            margin-bottom: 40px;
            background: white;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        form input, form textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
        }
        form button {
            background: rebeccapurple;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background: rebeccapurple;
            color: white;
            height: 50px;
        }
        td {
            padding: 10px;
            text-align: center;
            word-break: break-word;
        }
        img.product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
    </style>
    
</head>
<body>

<h2>Tambah Produk Baru</h2>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Nama Produk" required>
    <textarea name="description" placeholder="Deskripsi Produk" required></textarea>
    <input type="number" step="0.01" name="price" placeholder="Harga Produk" required>
    <input type="file" name="image" required>
    <button type="submit" name="add">Tambah Produk</button>
</form>

<h2>Daftar Produk</h2>
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
    <?php foreach ($products as $p): ?>
        <tr>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                <input type="hidden" name="old_image" value="<?= $p['image'] ?>">
                <td><input type="text" name="name" value="<?= htmlspecialchars($p['name']) ?>"></td>
                <td><textarea name="description"><?= htmlspecialchars($p['description']) ?></textarea></td>
                <td><input type="number" step="0.01" name="price" value="<?= htmlspecialchars($p['price']) ?>"></td>
                <td>
                    <img src="uploads/<?= $p['image'] ?>" class="product-img">
                    <input type="file" name="image">
                </td>
                <td><button type="submit" name="update">Update</button></td>
                <td><a href="?delete=<?= $p['id'] ?>" onclick="return confirm('Yakin ingin hapus produk ini?')">Hapus</a></td>
            </form>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
