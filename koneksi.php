<?php
$servername = "localhost";
$user = "root";
$pass = "";
$database = "acc_management";

// Membuat koneksi
$conn = new mysqli($servername, $user, $pass, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
?>
