<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:../index.php');
    exit;
}

require_once("../config/koneksi.php");

// Pastikan input form terisi dengan benar
if (isset($_POST['id'], $_POST['nomor'], $_POST['judul'], $_POST['deskripsi'])) {
    $id = intval($_POST['id']);
    $nomor = mysqli_real_escape_string($conn, $_POST['nomor']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    // Update data pada tabel alasan
    $query = "UPDATE alasan SET nomor = '$nomor', judul = '$judul', deskripsi = '$deskripsi' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        header('location:alasan.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Pastikan semua data telah diisi.";
}
?>
