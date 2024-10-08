<?php
include '../db_connect.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Mendapatkan ID tamu dari URL
$id_tamu = $_GET['id'];

// Query untuk menghapus data tamu berdasarkan ID
$sql = "DELETE FROM tamu WHERE id_tamu=$id_tamu";

if ($conn->query($sql) === TRUE) {
    header("Location: tamu_list.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
