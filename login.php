<?php
// Sesuaikan dengan kebutuhan dan hubungkan ke database jika diperlukan
include 'koneksi.php';

// Fungsi untuk memulai sesi
session_start();

// Fungsi untuk memeriksa apakah pengguna telah login
function cekLogin() {
    if (isset($_SESSION['user_id'])) {
        header("Location: keamanan_akses.php"); // Redirect ke halaman keamanan dan akses jika sudah login
        exit();
    }
}

// Fungsi untuk melakukan login
function login($username, $password) {
    global $conn;

    // Lakukan validasi login (contoh sederhana, sesuaikan dengan kebutuhan dan keamanan yang sesuai)
    $query = "SELECT * FROM keamanan_akses WHERE nama_pengguna = '$username' AND kata_sandi = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Simpan informasi pengguna ke dalam sesi
        $_SESSION['user_id'] = $row['admin_id'];
        $_SESSION['peran'] = 'admin'; // Sesuaikan dengan peran pengguna yang sesuai

        header("Location: manajemen_siswa.php"); // Redirect ke halaman manajemen siswa setelah login berhasil
        exit();
    } else {
        // Login gagal, mungkin tampilkan pesan kesalahan
        echo "Login gagal. Periksa kembali username dan password Anda.";
    }
}


// Pemeriksaan apakah pengguna sudah login, jika ya, redirect ke halaman keamanan dan akses
cekLogin();

// Pemeriksaan apakah form login sudah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan proses login
    login($username, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Learning Management System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-container label {
            font-weight: bold;
        }

        .login-container button {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post" action="login.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
