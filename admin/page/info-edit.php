<?php
session_start();

// Validasi session
if (!isset($_SESSION['admin'])) {
    header('location:../index.php');
    exit;
}

require_once("../config/koneksi.php");

// Validasi input dari POST
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$jadwal = isset($_POST['jadwal']) ? trim($_POST['jadwal']) : '';
$syarat = isset($_POST['syarat']) ? trim($_POST['syarat']) : '';
$tempat = isset($_POST['tempat']) ? trim($_POST['tempat']) : '';
$biaya = isset($_POST['biaya']) ? trim($_POST['biaya']) : '';

if ($id > 0 && $jadwal && $syarat && $tempat && $biaya) {
    // Menggunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("UPDATE info SET jadwal = ?, syarat = ?, tempat = ?, biaya = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $jadwal, $syarat, $tempat, $biaya, $id);

    if ($stmt->execute()) {
        // Redirect ke halaman utama dengan pesan sukses
        header('location:index.php?status=success');
    } else {
        // Redirect dengan pesan error
        header('location:info-edit.php?id=' . $id . '&status=error');
    }

    $stmt->close();
} else {
    // Jika input tidak valid
    header('location:info-edit.php?id=' . $id . '&status=invalid');
}

$conn->close();
?>
