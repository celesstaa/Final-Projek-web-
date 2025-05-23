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
        if (isset($_POST['signUP_button'])) {
            $name=$_POST['name'];
            $lastName=$_POST['lastName'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $confPassword=$_POST['confiPassword'];
           if (!empty($_POST['name'])&& !empty($_POST['lastName'])&& !empty($_POST['email'])&&!empty($_POST['password'])) {
            if ($password== $confPassword) {
                $p=crud::conect()->prepare('INSERT INTO crudtable(name,lastName,email,pass) VALUES(:n,:l,:e,:p)');
                $p->bindValue(':n', $name);
                $p->bindValue(':l', $lastName);
                $p->bindValue(':e', $email);
                $p->bindValue(':p',$password);
                $p->execute();
                echo 'User added successfully!';
            }else{
                echo 'Password does not match!';
            }
           }
        }

    ?>
    <div class="form">
        <div class="title">
            <p>Sign UP form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="lastName" placeholder="Last name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confiPassword" placeholder="Confrim password">
            
            <input type="submit" value="Sign UP" name="signUP_button"> 
            <a href="./login.php">Do you have account? Sign in</a>
        </form>
    </div>
</body>
</html>