<?php
include '../db_connect.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM tamu";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tamu</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Daftar Buku Tamu</h2>
        <!-- Link untuk kembali ke Dashboard -->
        <div class="text-left mb-3">
            <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
        <div class="text-right mb-3">
            <a href="tamu_add.php" class="btn btn-success">Tambah Tamu</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Tujuan</th>
                    <th>Waktu Kedatangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['id_tamu']; ?></td>
                        <td><?php echo $row['nama_lengkap']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['alamat_email']; ?></td>
                        <td><?php echo $row['nomor_telepon']; ?></td>
                        <td><?php echo $row['tujuan_kedatangan']; ?></td>
                        <td><?php echo $row['waktu_kedatangan']; ?></td>
                        <td>
                            <a href="tamu_edit.php?id=<?php echo $row['id_tamu']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="tamu_delete.php?id=<?php echo $row['id_tamu']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>