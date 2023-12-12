<?php
include 'koneksi.php';

if (isset($_GET["id"])) {
    $siswa_id = $_GET["id"];
    $query = "DELETE FROM Siswa WHERE Siswa_ID = $siswa_id";

    if ($conn->query($query) === TRUE) {
        // Data berhasil dihapus, redirect ke manajemen_siswa.php
        header("Location: manajemen_siswa.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else {
    echo "ID Siswa tidak diberikan.";
}

$conn->close();
?>
