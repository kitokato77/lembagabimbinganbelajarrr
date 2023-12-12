<?php
// Sesuaikan dengan kebutuhan dan hubungkan ke database jika diperlukan
include 'koneksi.php';

// Fungsi untuk memulai sesi
session_start();

// Fungsi untuk memeriksa apakah pengguna telah login
function cekLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); // Redirect ke halaman login jika belum login
        exit();
    }
}

// Fungsi untuk memeriksa peran pengguna
function cekPeran($peran_diizinkan) {
    cekLogin();

    // Ambil peran pengguna dari sesi atau database
    $peran_pengguna = isset($_SESSION['peran']) ? $_SESSION['peran'] : null;

    // Periksa apakah peran pengguna diizinkan untuk mengakses halaman
    if (!in_array($peran_pengguna, $peran_diizinkan)) {
        header("Location: akses_tidak_diizinkan.php"); // Redirect ke halaman akses tidak diizinkan jika tidak memiliki peran yang sesuai
        exit();
    }
}

// Contoh penggunaan:
// Cek apakah pengguna sudah login dan memiliki peran admin untuk mengakses halaman ini
cekPeran(['admin']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keamanan dan Akses</title>
</head>
<body>
    <h2>Halaman Keamanan dan Akses</h2>
    <!-- Konten halaman keamanan dan akses -->
<div>
    <h3>Data Siswa</h3>
    <?php
    // Cek peran pengguna untuk menampilkan konten sesuai dengan perannya
    if (in_array('admin', $peran_pengguna)) {
        // Konten yang hanya dapat diakses oleh admin
        echo "<p>Anda memiliki akses untuk melihat dan mengelola data siswa.</p>";
    } elseif (in_array('guru', $peran_pengguna)) {
        // Konten yang hanya dapat diakses oleh guru
        echo "<p>Anda memiliki akses untuk melihat data siswa yang terdaftar dalam kelas Anda.</p>";
    } elseif (in_array('orang_tua', $peran_pengguna)) {
        // Konten yang hanya dapat diakses oleh orang tua
        echo "<p>Anda memiliki akses untuk melihat data siswa yang terkait dengan anak Anda.</p>";
    }
    ?>
</div>

<div>
    <h3>Data Guru</h3>
    <?php
    // Cek peran pengguna untuk menampilkan konten sesuai dengan perannya
    if (in_array('admin', $peran_pengguna)) {
        // Konten yang hanya dapat diakses oleh admin
        echo "<p>Anda memiliki akses untuk melihat dan mengelola data guru.</p>";
    } elseif (in_array('guru', $peran_pengguna)) {
        // Konten yang hanya dapat diakses oleh guru
        echo "<p>Anda memiliki akses untuk melihat data guru yang terdaftar dalam kelas Anda.</p>";
    } elseif (in_array('orang_tua', $peran_pengguna)) {
        // Konten yang hanya dapat diakses oleh orang tua
        echo "<p>Anda tidak memiliki akses untuk melihat data guru.</p>";
    }
    ?>
</div>

<div>
    <h3>Data Pesan</h3>
    <?php
    // Cek peran pengguna untuk menampilkan konten sesuai dengan perannya
    if (in_array('admin', $peran_pengguna)) {
        // Konten yang hanya dapat diakses oleh admin
        echo "<p>Anda memiliki akses untuk melihat dan mengelola data pesan.</p>";
    } elseif (in_array('guru', $peran_pengguna) || in_array('orang_tua', $peran_pengguna)) {
        // Konten yang hanya dapat diakses oleh guru atau orang tua
        echo "<p>Anda memiliki akses untuk melihat data pesan yang terkait dengan siswa atau kelas Anda.</p>";
    }
    ?>
</div>

</body>
</html>

<?php
// Tutup koneksi ke database jika diperlukan
$conn->close();
?>
