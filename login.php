<?php

    include "service/database.php";
    
    session_start();

    $login_message ="";

    if (isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }

    if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hash_password = hash("sha256", $password);


    $sql = "SELECT * FROM users WHERE username='$username' AND password ='$hash_password'
    ";

    $result = $db->query($sql);

    if($result->num_rows > 0) {
       $data = $result->fetch_assoc();
       $_SESSION["username"] = $data ["username"];
       $_SESSION["is_login"] = "true";

       header("location: dashboard.php");
       
    } else {
        $login_message = "akun tidak ditemukan";
    }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <div class="login">
    <?php include "layout/header.html"?>

    <h3>Masuk akun</h3>
    <i><?= $login_message ?></i>

    <form action="login.php" method="POST">
        <div class="input_box">
            <input type="text" placeholder="username" name="username"/>
            <i class='bx bx-user'></i>
        </div> 
        <div class="input_box">
            <input type="password" placeholder="password" name="password"/>
            <i class='bx bx-lock-alt' ></i>
        </div>
        <div class="remember_forgot">
            <label><input type="checkbox">remember me</label>
        <a href="#">forgot password ?</a>
        </div>
        <div class="input_box">
        <button type="submit" name="login">Masuk sekarang</button>
        </div>
    </form>

    <?php include "layout/footer.html"?>
    </div>
</body>
</html>