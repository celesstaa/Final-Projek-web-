<?php
require('./conection.php');

// Delete user jika ada query param user_id
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    crud::deleteUser($user_id);
    header("Location: users.php");
    exit();
}

$users = crud::SelectUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Tabel Pengguna</title>
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
<h2>Tabel Pengguna</h2>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if (count($users) > 0) {
        foreach ($users as $user) {
            echo '<tr>';
            echo '<td>'.htmlspecialchars($user['name']).'</td>';
            echo '<td>'.htmlspecialchars($user['lastName']).'</td>';
            echo '<td>'.htmlspecialchars($user['email']).'</td>';
            echo '<td>'.htmlspecialchars($user['pass']).'</td>';
            echo '<td>'.htmlspecialchars($user['role']).'</td>';
            echo '<td class="edit-cell"><a href="upDate.php?id='.urlencode($user['id']).'"><img src="./editData.svg" alt="Edit"></a></td>';
            echo '<td class="delete-cell"><a href="users.php?user_id='.urlencode($user['id']).'" onclick="return confirm(\'Yakin ingin menghapus pengguna ini?\')"><img src="./simbolSampah.svg" alt="Delete"></a></td>';
            echo '</tr>';
        }
    }
    ?>
    </tbody>
</table>

</body>
</html>
