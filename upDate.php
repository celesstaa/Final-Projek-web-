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
             background-color: rgb(111, 49, 64); /* Pink */
         }
         .form {
             width: 300px;
             height: 400px;
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
        if (isset($_GET['id'])) {
            $id_up=$_GET['id'];
            $data=crud::userDataPerId($id_up);
        }
        if (isset($_POST['signUP_button'])) {
            $name=$_POST['name'];
            $lastName=$_POST['lastName'];
            $email=$_POST['email'];
            $password=$_POST['password'];
           if (!empty($_POST['name'])&& !empty($_POST['lastName'])&& !empty($_POST['email'])&&!empty($_POST['password'])) {
    
                $p=crud::conect()->prepare('UPDATE crudtable SET name=:n,lastName=:l,email=:e,pass=:p where id=:id');
                $p->bindValue(':id',$id_up);
                $p->bindValue(':n', $name);
                $p->bindValue(':l', $lastName);
                $p->bindValue(':e', $email);
                $p->bindValue(':p',$password);
                $p->execute();
              // Sebelum redirect
                session_start();
                $_SESSION['message'] = "User updated successfully!";
                header("Location: users.php");
                exit();

                

            }
           }
        

    ?>
    <div class="form">
        <div class="title">
            <p>Updating user data</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name" value="<?php if(isset($data)){
echo $data['name'];
            } ?>">
            <input type="text" name="lastName" placeholder="Last name" value="<?php if(isset($data)){
echo $data['lastName'];
            } ?>">
            <input type="email" name="email" placeholder="Email" value="<?php if(isset($data)){
echo $data['email'];
            } ?>">
            <input type="text" name="password" placeholder="Password" value="<?php if(isset($data)){
echo $data['pass'];
            } ?>">
            <input type="submit" value="UPDATE" name="signUP_button">
        </form>
    </div>
</body>
</html>