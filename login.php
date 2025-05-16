<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sign.css">
    <title>Sign UPt</title>
    <style>
         
        .header {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px 0;
            background-color: rgb(116, 71, 13); /* Brown */
            text-align: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        body {
            background-color: rgb(108, 41, 58); /* Pink */
        }
        .form {
            width: 230px;
            height: 280px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form input[type="submit"] {
            background-color: rgb(210, 105, 30); /* Chocolate */
            color: white;
        }
        .title p {
            color: rgb(165, 42, 42); /* Brown */
        }
    </style>
</head>
<body>

<?php
require('./conection.php');
session_start(); // Penting! Biar session bisa jalan

if (isset($_POST['login_button'])) {
    $_SESSION['validate'] = false;
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Ambil data user berdasarkan name dan pass
    $p = crud::conect()->prepare('SELECT * FROM crudtable WHERE name = :n AND pass = :p');
    $p->bindValue(':n', $name);
    $p->bindValue(':p', $password);
    $p->execute();
    $d = $p->fetch(PDO::FETCH_ASSOC);

    if ($p->rowCount() > 0) {
        $_SESSION['name'] = $d['name'];
        $_SESSION['pass'] = $d['pass'];
        $_SESSION['role'] = $d['role'];
        $_SESSION['validate'] = true;

        // Cek role dan redirect sesuai
        if (strtolower($d['role']) === 'admin') {
            header('Location: halaman_admin.php');
        } else {
            header('Location: website.php');
        }
        exit;
    } else {
        echo "<script>alert('Make sure that you are registered!');</script>";
    }
}
?>

    <div class="form">
        <div class="title">
            <p>Login form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login" name="login_button"> 
            <a href="./signUP.php" style="position:relative; left:50px;top:-8px; font-size:14px">Click here to sign up</a>
        </form>
    </div>
</body>
</html>
