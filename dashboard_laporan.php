<?php
// Sesuaikan dengan kebutuhan dan hubungkan ke database jika diperlukan
include 'koneksi.php';

// Contoh data pengguna (guru, siswa, orang tua)
$guru_id = 1;
$siswa_id = 2;
$orang_tua_id = 3;

// Contoh query untuk mengambil statistik
$query_statistik_siswa = "SELECT COUNT(*) as total_siswa FROM Siswa";
$result_statistik_siswa = $conn->query($query_statistik_siswa);
$row_statistik_siswa = $result_statistik_siswa->fetch_assoc();

$query_statistik_guru = "SELECT COUNT(*) as total_guru FROM Guru";
$result_statistik_guru = $conn->query($query_statistik_guru);
$row_statistik_guru = $result_statistik_guru->fetch_assoc();

$query_statistik_pesan = "SELECT COUNT(*) as total_pesan FROM Komunikasi";
$result_statistik_pesan = $conn->query($query_statistik_pesan);
$row_statistik_pesan = $result_statistik_pesan->fetch_assoc();

// Contoh query untuk mengambil laporan
$query_laporan_siswa = "SELECT * FROM Siswa ORDER BY Nama ASC LIMIT 5";
$result_laporan_siswa = $conn->query($query_laporan_siswa);

$query_laporan_guru = "SELECT * FROM Guru ORDER BY Nama ASC LIMIT 5";
$result_laporan_guru = $conn->query($query_laporan_guru);

$query_laporan_pesan = "SELECT * FROM Komunikasi ORDER BY Waktu_Pengiriman DESC LIMIT 5";
$result_laporan_pesan = $conn->query($query_laporan_pesan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard dan Laporan - ACC Bimbingan Belajar</title>

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
            margin-bottom: 20px;
        }

        section {
            padding: 20px;
            margin: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        h3 {
            color: #007bff;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Dashboard dan Laporan - ACC Bimbingan Belajar</h1>
    </header>

    <section>
        <h2>Dashboard</h2>

        <!-- Statistik -->
        <div>
            <h3>Statistik</h3>
            <ul>
                <li>Total Siswa: <?php echo $row_statistik_siswa['total_siswa']; ?></li>
                <li>Total Guru: <?php echo $row_statistik_guru['total_guru']; ?></li>
                <li>Total Pesan: <?php echo $row_statistik_pesan['total_pesan']; ?></li>
            </ul>
        </div>

        <!-- Laporan -->
        <div>
            <h3>Laporan</h3>

            <div>
                <h4>Laporan Siswa (5 Teratas)</h4>
                <ul>
                    <?php while ($row_siswa = $result_laporan_siswa->fetch_assoc()) : ?>
                        <li><?php echo $row_siswa['Nama']; ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <div>
                <h4>Laporan Guru (5 Teratas)</h4>
                <ul>
                    <?php while ($row_guru = $result_laporan_guru->fetch_assoc()) : ?>
                        <li><?php echo $row_guru['Nama']; ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <div>
                <h4>Laporan Pesan (5 Teratas)</h4>
                <ul>
                    <?php while ($row_pesan = $result_laporan_pesan->fetch_assoc()) : ?>
                        <li><?php echo $row_pesan['Isi_Pesan']; ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>
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
