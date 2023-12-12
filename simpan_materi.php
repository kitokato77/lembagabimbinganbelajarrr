<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mata_pelajaran = $_POST["mata_pelajaran"];
    $tingkat_kelas = $_POST["tingkat_kelas"];
    $sumber_belajar = $_POST["sumber_belajar"];

    $query = "INSERT INTO Materi_Pelajaran (Mata_Pelajaran, Tingkat_Kelas, Sumber_Belajar) VALUES ('$mata_pelajaran', '$tingkat_kelas', '$sumber_belajar')";

    if ($conn->query($query) === TRUE) {
        header("Location: materi_pelajaran.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();
?>
