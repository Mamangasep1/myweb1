<?php 

    //koneksi db
    $server = "localhost";
    $user = "root";
    $password = "";
    $database  = "dbcrud";

    //buat koneksi
    $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));