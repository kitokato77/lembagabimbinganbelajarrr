<?php
// Sesuaikan dengan kebutuhan dan hubungkan ke database jika diperlukan
include 'koneksi.php';

// Contoh data pengguna (guru, siswa, orang tua)
$guru_id = 1;
$siswa_id = 2;
$orang_tua_id = 3;

// Query untuk mendapatkan pesan
$query = "SELECT * FROM Komunikasi WHERE Penerima_ID IN ($guru_id, $siswa_id, $orang_tua_id) ORDER BY Waktu_Pengiriman DESC";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komunikasi - ACC Bimbingan Belajar</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        header {
            background-color: #007bff;
            padding: 10px;
            color: #fff;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            background-color: #343a40;
            overflow: hidden;
            text-align: center; /* Center the menu */
        }

        nav li {
            display: inline-block; /* Display the list items horizontally */
        }

        nav a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        nav a#logout {
            background-color: #dc3545; /* Red background color */
            color: white;
        }

        section {
            padding: 20px;
            margin: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            border: 1px solid #ddd;
            margin: 5px 0;
            padding: 10px;
            border-radius: 8px;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Komunikasi - ACC Bimbingan Belajar</h1>
    </header>

    <nav>
        <ul>
            <li><a href="manajemen_siswa.php">Manajemen Siswa</a></li>
            <li><a href="jadwal_bimbingan.php">Manajemen Jadwal Bimbingan</a></li>
            <li><a href="materi_pelajaran.php">Pengelolaan Materi Pembelajaran</a></li>
            <li><a href="komunikasi.php">Komunikasi</a></li>
            <li><a href="dashboard_laporan.php">Dashboard dan Laporan</a></li>
            <li><a href="keamanan_akses.php">Keamanan dan Akses</a></li>
            <li><a id="logout" href="login.php">Logout</a></li>
        </ul>
    </nav>

    <section>
        <!-- Menampilkan formulir untuk mengirim pesan -->
        <h2>Kirim Pesan</h2>
        <form action="kirim_pesan.php" method="post">
            <div class="form-group">
                <label for="penerima_id">Penerima:</label>
                <select class="form-control" name="penerima_id" required>
                    <option value="<?php echo $guru_id; ?>">Guru</option>
                    <option value="<?php echo $siswa_id; ?>">Siswa</option>
                    <option value="<?php echo $orang_tua_id; ?>">Orang Tua</option>
                </select>
            </div>

            <div class="form-group">
                <label for="pesan">Pesan:</label>
                <textarea class="form-control" name="pesan" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
        </form>

        <!-- Menampilkan daftar pesan -->
        <h3>Daftar Pesan</h3>
        <ul>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "<strong>Dari:</strong> " . $row["Pengirim_ID"];
                echo "<br>";
                echo "<strong>Waktu:</strong> " . $row["Waktu_Pengiriman"];
                echo "<br>";
                echo "<strong>Pesan:</strong> " . $row["Isi_Pesan"];
                echo "</li>";
            }
            ?>
        </ul>
    </section>

    <footer>
        <p>&copy; 2023 ACC Bimbingan Belajar</p>
    </footer>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
