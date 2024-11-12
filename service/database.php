<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $port = "3308";
    $database_name = "buku_tamu";

    $db = mysqli_connect($hostname, $username, $password, $database_name, $port);

    if ($db->connect_error) {
        echo "koneksi database error";
        die("error!");
    }

?>