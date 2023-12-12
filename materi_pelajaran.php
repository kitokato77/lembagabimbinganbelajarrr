<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Materi Pembelajaran</title>

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
            text-align: center;
        }

        nav li {
            display: inline-block;
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
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
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
        <h1>Pengelolaan Materi Pembelajaran</h1>
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

    <section id="materi-pembelajaran-section">
        <div class="container">
            <h2>Pengelolaan Materi Pembelajaran</h2>

            <!-- Daftar materi yang sudah ada -->
            <h3>Daftar Materi Pembelajaran</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Materi</th>
                        <th>Mata Pelajaran</th>
                        <th>Tingkat Kelas</th>
                        <th>Sumber Belajar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM Materi_Pelajaran";
                    $result = $conn->query($query);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Materi_ID"] . "</td>";
                        echo "<td>" . $row["Mata_Pelajaran"] . "</td>";
                        echo "<td>" . $row["Tingkat_Kelas"] . "</td>";
                        echo "<td>" . $row["Sumber_Belajar"] . "</td>";
                        echo "<td>
                                <a href='edit_materi.php?id=" . $row["Materi_ID"] . "'>Edit</a> |
                                <a href='hapus_materi.php?id=" . $row["Materi_ID"] . "'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Formulir untuk menambah materi -->
            <h3>Tambah Materi</h3>
            <form action="simpan_materi.php" method="post">
                <div class="form-group">
                    <label for="mata_pelajaran">Mata Pelajaran:</label>
                    <input type="text" class="form-control" name="mata_pelajaran" required>
                </div>

                <div class="form-group">
                    <label for="tingkat_kelas">Tingkat Kelas:</label>
                    <input type="text" class="form-control" name="tingkat_kelas" required>
                </div>

                <div class="form-group">
                    <label for="sumber_belajar">Sumber Belajar:</label>
                    <input type="text" class="form-control" name="sumber_belajar" required>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Materi</button>
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

<?php $conn->close(); ?>
