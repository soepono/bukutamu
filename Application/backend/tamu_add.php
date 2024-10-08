<?php
include '../db_connect.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $alamat_email = $_POST['alamat_email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $tujuan_kedatangan = $_POST['tujuan_kedatangan'];

    $sql = "INSERT INTO tamu (nama_lengkap, alamat, alamat_email, nomor_telepon, tujuan_kedatangan)
            VALUES ('$nama_lengkap', '$alamat', '$alamat_email', '$nomor_telepon', '$tujuan_kedatangan')";

    if ($conn->query($sql) === TRUE) {
        header("Location: tamu_list.php");
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tamu</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Tambah Tamu</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="alamat_email">Email</label>
                <input type="email" class="form-control" id="alamat_email" name="alamat_email" required>
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Telepon</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
            </div>
            <div class="form-group">
                <label for="tujuan_kedatangan">Tujuan Kedatangan</label>
                <input type="text" class="form-control" id="tujuan_kedatangan" name="tujuan_kedatangan" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Tambah</button>
        </form>
    </div>
</body>

</html>