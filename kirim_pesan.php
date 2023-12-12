<?php
// Sesuaikan dengan kebutuhan dan hubungkan ke database jika diperlukan
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $penerima_id = $_POST["penerima_id"];
    $pesan = $_POST["pesan"];
    $pengirim_id = 1; // Ganti dengan ID pengguna yang sedang login

    // Query untuk menyimpan pesan ke database
    $query = "INSERT INTO Komunikasi (Pengirim_ID, Penerima_ID, Isi_Pesan) VALUES ($pengirim_id, $penerima_id, '$pesan')";

    if ($conn->query($query) === TRUE) {
        // Redirect kembali ke halaman komunikasi setelah mengirim pesan
        header("Location: komunikasi.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

// Tutup koneksi ke database jika diperlukan
$conn->close();
?>
