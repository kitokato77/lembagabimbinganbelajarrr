<?php
include 'koneksi.php';

if (isset($_GET["id"])) {
    $jadwal_id = $_GET["id"];
    $query = "DELETE FROM Jadwal_Bimbingan WHERE Jadwal_ID = $jadwal_id";

    if ($conn->query($query) === TRUE) {
        // Data berhasil dihapus, redirect ke jadwal_bimbingan.php
        header("Location: jadwal_bimbingan.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else {
    echo "ID Jadwal Bimbingan tidak diberikan.";
}

$conn->close();
?>
