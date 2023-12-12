<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $usia = $_POST["usia"];
    $alamat = $_POST["alamat"];
    $data_kontak = $_POST["data_kontak"];
    $riwayat_belajar = $_POST["riwayat_belajar"];

    // Jika terdapat ID, lakukan UPDATE, jika tidak, lakukan INSERT
    if (isset($_POST["siswa_id"])) {
        $siswa_id = $_POST["siswa_id"];
        $query = "UPDATE Siswa SET Nama='$nama', Usia=$usia, Alamat='$alamat', Data_Kontak='$data_kontak', Riwayat_Belajar='$riwayat_belajar' WHERE Siswa_ID=$siswa_id";
    } else {
        $query = "INSERT INTO Siswa (Nama, Usia, Alamat, Data_Kontak, Riwayat_Belajar) VALUES ('$nama', $usia, '$alamat', '$data_kontak', '$riwayat_belajar')";
    }

    if ($conn->query($query) === TRUE) {
        header("Location: manajemen_siswa.php"); // Redirect kembali ke halaman manajemen siswa setelah penyimpanan berhasil
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>
