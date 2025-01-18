<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:../index.php');
    exit;
} else {
    $username = $_SESSION['admin'];
}

require_once("../config/koneksi.php");
$query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
$hasil = mysqli_fetch_array($query);

$a = mysqli_real_escape_string($conn, $_POST['nama']);
$b = mysqli_real_escape_string($conn, $_POST['jabatan']);
$c = mysqli_real_escape_string($conn, $_POST['nbm']);

$ekstensi_diperbolehkan  = array('png', 'jpg', 'jpeg');
$nama = $_FILES['foto']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 10440070) {
        move_uploaded_file($file_tmp, '../foto/guru/' . $nama);

        // Query untuk insert ke tabel
        $query = mysqli_query($conn, "INSERT INTO guru (foto, nama, jabatan, nbm) VALUES ('$nama', '$a', '$b', '$c')");

        if ($query) {
            header("location:guru.php");
            exit;
        } else {
            echo 'GAGAL MENGUPLOAD GAMBAR';
        }
    } else {
        echo 'UKURAN FILE TERLALU BESAR';
    }
} else {
    echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
}
?>
