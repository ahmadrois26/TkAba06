<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:../index.php');
    exit;
}

require_once("../config/koneksi.php");

// Pastikan input form terisi dengan benar
if (isset($_POST['nomor'], $_POST['judul'], $_POST['deskripsi'])) {
    $nomor = mysqli_real_escape_string($conn, $_POST['nomor']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    // Insert data ke tabel alasan
    $query = "INSERT INTO alasan (nomor, judul, deskripsi) VALUES ('$nomor', '$judul', '$deskripsi')";
    if (mysqli_query($conn, $query)) {
        header('location:alasan.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Pastikan semua data telah diisi.";
}
?>
