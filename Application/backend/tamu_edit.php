<?php
include '../db_connect.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Mendapatkan ID tamu dari URL
$id_tamu = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $alamat_email = $_POST['alamat_email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $tujuan_kedatangan = $_POST['tujuan_kedatangan'];

    // Update query untuk mengedit data tamu
    $sql = "UPDATE tamu SET 
            nama_lengkap='$nama_lengkap', 
            alamat='$alamat', 
            alamat_email='$alamat_email', 
            nomor_telepon='$nomor_telepon', 
            tujuan_kedatangan='$tujuan_kedatangan' 
            WHERE id_tamu=$id_tamu";

    if ($conn->query($sql) === TRUE) {
        header("Location: tamu_list.php");
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mengambil data tamu berdasarkan ID
$sql = "SELECT * FROM tamu WHERE id_tamu=$id_tamu";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tamu</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Tamu</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat_email">Email</label>
                <input type="email" class="form-control" id="alamat_email" name="alamat_email" value="<?php echo $row['alamat_email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Telepon</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?php echo $row['nomor_telepon']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tujuan_kedatangan">Tujuan Kedatangan</label>
                <input type="text" class="form-control" id="tujuan_kedatangan" name="tujuan_kedatangan" value="<?php echo $row['tujuan_kedatangan']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>
</body>

</html>