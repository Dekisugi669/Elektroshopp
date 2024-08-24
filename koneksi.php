<?php

include "order.php";
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "elektroshopp";

$db = mysqli_connect($servername, $username, $password, $database);
if($db->connect_error){
    echo "connect rusak";
    die("error");
}

echo "koneksi berhasil";