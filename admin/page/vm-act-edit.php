<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:../index.php');
} else {
    $username = $_SESSION['admin'];
}

require_once("../config/koneksi.php");

// Ambil data admin yang login
$query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
$hasil = mysqli_fetch_array($query);

// Proses update data kontak
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $alamat = $_POST['visi'];
    $email = $_POST['misi'];
    $whatsapp = $_POST['whatsapp'];
    // Query untuk memperbarui data kontak
    $sql = mysqli_query($conn, "UPDATE visimisi SET visi = '$visi', misi = '$misi' WHERE id = $id");

    if ($sql) {
        // Redirect ke halaman kontak setelah berhasil diperbarui
        header('location:visimisi.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Metode request tidak valid.";
    exit();
}
?>
