<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Dashboard Admin</h2>
        <div class="text-center">
            <a href="tamu_list.php" class="btn btn-primary">Kelola Data Buku Tamu</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>

</html>