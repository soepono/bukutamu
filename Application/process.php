<?php
// Memasukkan file koneksi database
include 'db_connect.php';

// Mendapatkan data dari form
$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$alamat_email = $_POST['alamat_email'];
$nomor_telepon = $_POST['nomor_telepon'];
$tujuan_kedatangan = $_POST['tujuan_kedatangan'];

// Query untuk memasukkan data ke dalam tabel tamu
$sql = "INSERT INTO tamu (nama_lengkap, alamat, alamat_email, nomor_telepon, tujuan_kedatangan)
        VALUES ('$nama_lengkap', '$alamat', '$alamat_email', '$nomor_telepon', '$tujuan_kedatangan')";

if ($conn->query($sql) === TRUE) {
    $success_message = "Data tamu berhasil disimpan!";
} else {
    $error_message = "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku Tamu</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <!-- Jika data berhasil disimpan, tampilkan pesan sukses -->
        <?php if (isset($success_message)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php elseif (isset($error_message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <!-- Tombol kembali ke form -->
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">Kembali ke Form</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (Optional for interactive elements) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>