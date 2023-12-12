<?php
include 'koneksi.php';

// Inisialisasi nilai default
$jadwal_id = "";
$cabang_id = "";
$guru_id = "";
$mata_pelajaran = "";
$hari_jam_bimbingan = "";

// Jika ID disertakan di URL, ambil data untuk diedit
if (isset($_GET["id"])) {
    $jadwal_id = $_GET["id"];
    $query_jadwal = "SELECT * FROM Jadwal_Bimbingan WHERE Jadwal_ID = $jadwal_id";
    $result_jadwal = $conn->query($query_jadwal);

    if ($result_jadwal->num_rows > 0) {
        $row_jadwal = $result_jadwal->fetch_assoc();
        $cabang_id = $row_jadwal["Cabang_ID"];
        $guru_id = $row_jadwal["Guru_ID"];
        $mata_pelajaran = $row_jadwal["Mata_Pelajaran"];
        $hari_jam_bimbingan = $row_jadwal["Hari_Jam_Bimbingan"];
    } else {
        echo "Jadwal bimbingan tidak ditemukan.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Siswa - ACC Bimbingan Belajar</title>

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
        <h1>Manajemen Siswa - ACC Bimbingan Belajar</h1>
    </header>

    <nav>
        <ul>
            <li><a href="manajemen_siswa.php">Manajemen Siswa</a></li>
            <li><a href="jadwal_bimbingan.php">Manajemen Jadwal Bimbingan</a></li>
            <li><a href="materi_pembelajaran.php">Pengelolaan Materi Pembelajaran</a></li>
            <li><a href="komunikasi.php">Komunikasi</a></li>
            <li><a href="dashboard_laporan.php">Dashboard dan Laporan</a></li>
            <li><a href="keamanan_akses.php">Keamanan dan Akses</a></li>
            <li><a id="logout" href="login.php">Logout</a></li>
        </ul>
    </nav>

    <section id="edit-jadwal-section">
        <div class="container">
            <h2><?php echo $jadwal_id ? "Edit" : "Tambah"; ?> Jadwal Bimbingan</h2>
            <form action="simpan_jadwal.php" method="post">
                <input type="hidden" name="jadwal_id" value="<?php echo $jadwal_id; ?>">

                <div class="form-group">
                    <label for="cabang_id">Cabang ID:</label>
                    <input type="text" class="form-control" id="cabang_id" name="cabang_id" value="<?php echo $cabang_id; ?>" required>
                </div>

                <div class="form-group">
                    <label for="guru_id">Guru ID:</label>
                    <input type="text" class="form-control" id="guru_id" name="guru_id" value="<?php echo $guru_id; ?>" required>
                </div>

                <div class="form-group">
                    <label for="mata_pelajaran">Mata Pelajaran:</label>
                    <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" value="<?php echo $mata_pelajaran; ?>" required>
                </div>

                <div class="form-group">
                    <label for="hari_jam_bimbingan">Hari Jam Bimbingan:</label>
                    <input type="datetime-local" class="form-control" id="hari_jam_bimbingan" name="hari_jam_bimbingan" value="<?php echo date('Y-m-d\TH:i:s', strtotime($hari_jam_bimbingan)); ?>" required>
                </div>

                <button type="submit" class="btn btn-primary"><?php echo $jadwal_id ? "Simpan" : "Tambah"; ?></button>
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
