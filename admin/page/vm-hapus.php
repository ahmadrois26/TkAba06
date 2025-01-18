<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:../index.php');
    exit();
}

require_once("../config/koneksi.php");

// Ambil ID dari parameter URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query hapus data kontak
    $query = mysqli_query($conn, "DELETE FROM visimisi WHERE id='$id'") or die(mysqli_error($conn));

    // Redirect ke halaman utama kontak
    header("location:visimisi.php");
    exit();
} else {
    echo "ID tidak ditemukan.";
    exit();
}
