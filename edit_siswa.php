<?php
include 'koneksi.php';

if (isset($_GET["id"])) {
    $siswa_id = $_GET["id"];
    $query_siswa = "SELECT * FROM Siswa WHERE Siswa_ID = $siswa_id";
    $result_siswa = $conn->query($query_siswa);

    if ($result_siswa->num_rows > 0) {
        $row_siswa = $result_siswa->fetch_assoc();
        $nama = $row_siswa["Nama"];
        $usia = $row_siswa["Usia"];
        $alamat = $row_siswa["Alamat"];
        $data_kontak = $row_siswa["Data_Kontak"];
        $riwayat_belajar = $row_siswa["Riwayat_Belajar"];
    } else {
        echo "Siswa tidak ditemukan.";
        exit();
    }
} else {
    echo "ID Siswa tidak diberikan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa - ACC Bimbingan Belajar</title>

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

        footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Edit Siswa - ACC Bimbingan Belajar</h1>
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

    <section id="edit-siswa-section">
        <div class="container">
            <h2>Edit Siswa</h2>
            <form action="simpan_siswa.php" method="post">
                <input type="hidden" name="siswa_id" value="<?php echo $siswa_id; ?>">

                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                </div>

                <div class="form-group">
                    <label for="usia">Usia:</label>
                    <input type="number" class="form-control" id="usia" name="usia" value="<?php echo $usia; ?>" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>" required>
                </div>

                <div class="form-group">
                    <label for="data_kontak">Data Kontak:</label>
                    <input type="text" class="form-control" id="data_kontak" name="data_kontak" value="<?php echo $data_kontak; ?>" required>
                </div>

                <div class="form-group">
                    <label for="riwayat_belajar">Riwayat Belajar:</label>
                    <textarea class="form-control" id="riwayat_belajar" name="riwayat_belajar" required><?php echo $riwayat_belajar; ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
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
