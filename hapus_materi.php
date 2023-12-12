<?php
include 'koneksi.php';

if (isset($_GET["id"])) {
    $materi_id = $_GET["id"];
    $query = "DELETE FROM Materi_Pelajaran WHERE Materi_ID = $materi_id";

    if ($conn->query($query) === TRUE) {
        header("Location: materi_pelajaran.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else {
    echo "ID Materi tidak diberikan.";
}

$conn->close();
?>
