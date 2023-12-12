<?php
include 'koneksi.php';

// Periksa apakah parameter id Materi_ID sudah diberikan
if (isset($_GET["id"])) {
    $materi_id = $_GET["id"];

    // Ambil data materi berdasarkan Materi_ID
    $query = "SELECT * FROM Materi_Pelajaran WHERE Materi_ID = $materi_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Formulir untuk mengedit materi
        echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Edit Materi Pembelajaran</title>
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
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

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Edit Materi Pembelajaran</h1>
    </header>";

        echo "<form action='update_materi.php' method='post'>";
        echo "<input type='hidden' name='materi_id' value='" . $row["Materi_ID"] . "'>";
        echo "<div class='form-group'>";
        echo "<label for='mata_pelajaran'>Mata Pelajaran:</label>";
        echo "<input type='text' class='form-control' name='mata_pelajaran' value='" . $row["Mata_Pelajaran"] . "' required>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='tingkat_kelas'>Tingkat Kelas:</label>";
        echo "<input type='text' class='form-control' name='tingkat_kelas' value='" . $row["Tingkat_Kelas"] . "' required>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='sumber_belajar'>Sumber Belajar:</label>";
        echo "<input type='text' class='form-control' name='sumber_belajar' value='" . $row["Sumber_Belajar"] . "' required>";
        echo "</div>";

        echo "<button type='submit' class='btn btn-primary'>Simpan Perubahan</button>";
        echo "</form>";
        echo "</body></html>";
    } else {
        echo "Materi tidak ditemukan.";
    }
} else {
    echo "ID Materi tidak diberikan.";
}

$conn->close();
?>
