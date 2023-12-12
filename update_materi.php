<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $materi_id = $_POST["materi_id"];
    $mata_pelajaran = $_POST["mata_pelajaran"];
    $tingkat_kelas = $_POST["tingkat_kelas"];
    $sumber_belajar = $_POST["sumber_belajar"];

    $query = "UPDATE Materi_Pelajaran SET Mata_Pelajaran='$mata_pelajaran', Tingkat_Kelas='$tingkat_kelas', Sumber_Belajar='$sumber_belajar' WHERE Materi_ID=$materi_id";

    if ($conn->query($query) === TRUE) {
        header("Location: materi_pelajaran.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();
?>
