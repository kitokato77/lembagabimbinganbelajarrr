<?php include 'koneksi.php'; ?>

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

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
        }

        th, td {
            padding: 12px;
        }

        th {
            background-color: #007bff;
            color: white;
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
            <li><a href="materi_pelajaran.php">Pengelolaan Materi Pembelajaran</a></li>
            <li><a href="komunikasi.php">Komunikasi</a></li>
            <li><a href="dashboard_laporan.php">Dashboard dan Laporan</a></li>
            <li><a href="keamanan_akses.php">Keamanan dan Akses</a></li>
            <li><a id="logout" href="login.php">Logout</a></li>
        </ul>
    </nav>

    <section>
        <h2>Daftar Siswa</h2>

        <!-- Tampilkan daftar siswa -->
        <?php
            $query_siswa = "SELECT * FROM Siswa";
            $result_siswa = $conn->query($query_siswa);

            if ($result_siswa->num_rows > 0) {
                echo "<table class='table table-bordered table-striped'>
                        <thead class='thead-dark'>
                            <tr>
                                <th>Siswa ID</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Alamat</th>
                                <th>Data Kontak</th>
                                <th>Riwayat Belajar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>";

                while($row_siswa = $result_siswa->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row_siswa["Siswa_ID"]."</td>
                            <td>".$row_siswa["Nama"]."</td>
                            <td>".$row_siswa["Usia"]."</td>
                            <td>".$row_siswa["Alamat"]."</td>
                            <td>".$row_siswa["Data_Kontak"]."</td>
                            <td>".$row_siswa["Riwayat_Belajar"]."</td>
                            <td>
                                <a href='edit_siswa.php?id=".$row_siswa["Siswa_ID"]."' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='hapus_siswa.php?id=".$row_siswa["Siswa_ID"]."' class='btn btn-danger btn-sm'>Hapus</a>
                            </td>
                          </tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "Tidak ada data siswa.";
            }

            $conn->close();
        ?>

        <!-- Formulir untuk menambah/mengedit siswa -->
        <h2>Tambah/Mengedit Siswa</h2>
        <form action="simpan_siswa.php" method="post">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="usia">Usia:</label>
                <input type="number" class="form-control" id="usia" name="usia" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>

            <div class="form-group">
                <label for="data_kontak">Data Kontak:</label>
                <input type="text" class="form-control" id="data_kontak" name="data_kontak" required>
            </div>

            <div class="form-group">
                <label for="riwayat_belajar">Riwayat Belajar:</label>
                <textarea class="form-control" id="riwayat_belajar" name="riwayat_belajar" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
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
