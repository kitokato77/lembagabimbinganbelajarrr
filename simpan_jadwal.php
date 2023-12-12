<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jadwal_id = isset($_POST["jadwal_id"]) ? $_POST["jadwal_id"] : null;
    $cabang_id = $_POST["cabang_id"];
    $guru_id = $_POST["guru_id"];
    $mata_pelajaran = $_POST["mata_pelajaran"];
    $hari_jam_bimbingan = $_POST["hari_jam_bimbingan"];

    // Lakukan UPDATE jika Jadwal_ID sudah ada, jika tidak, lakukan INSERT
    if ($jadwal_id) {
        $query = "UPDATE Jadwal_Bimbingan SET Cabang_ID=$cabang_id, Guru_ID=$guru_id, Mata_Pelajaran='$mata_pelajaran', Hari_Jam_Bimbingan='$hari_jam_bimbingan' WHERE Jadwal_ID=$jadwal_id";
    } else {
        $query = "INSERT INTO Jadwal_Bimbingan (Cabang_ID, Guru_ID, Mata_Pelajaran, Hari_Jam_Bimbingan) VALUES ($cabang_id, $guru_id, '$mata_pelajaran', '$hari_jam_bimbingan')";
    }

    if ($conn->query($query) === TRUE) {
        header("Location: jadwal_bimbingan.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();
?>
