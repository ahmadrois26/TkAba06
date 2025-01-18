<?php
include "pondasi/kepala.php";
include "pondasi/kiri.php";

// Menyimpan data jika ada permintaan POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $visi = $_POST["visi"]; // Mengambil data dari form input
    $misi = $_POST["misi"]; // Mengambil data dari form input

    $sql = "INSERT INTO visimisi (visi, misi) VALUES ('$visi', '$misi')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Data berhasil disimpan!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Data Visi dan Misi</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <!-- Breadcrumb atau navigasi lain -->
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

        
    <div class="row">
            <!-- Form Tambah Kontak -->
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Tambah Data Kontak</h4>
                    </div>
                    <div class="box-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="visi">Visi</label>
                                <input type="text" class="form-control" id="visi" name="visi" >
                            </div>
                            <div class="form-group">
                                <label for="misi">Misi</label>
                                <input type="text" class="form-control" id="misi" name="misi">
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Tabel Data Visi dan Misi -->
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Daftar Visi dan Misi</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Visi</th>
                                        <th>Misi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query data visi dan misi
                                    $sql = mysqli_query($conn, "SELECT * FROM visimisi");
                                    while ($b = mysqli_fetch_assoc($sql)) {
                                        echo "
                                        <tr>
                                            <td>" . $b['id'] . "</td>
                                            <td>" . $b['visi'] . "</td>
                                            <td>" . $b['misi'] . "</td>
                                            <td>
                                                <a href='vm-edit.php?id=" . $b['id'] . "' class='btn btn-primary'>
                                                    <i class='fa fa-edit'></i> Edit
                                                </a>
                                                <a href='vm-hapus.php?id=" . $b['id'] . "' class='btn btn-danger' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">
                                                    <i class='fa fa-trash'></i> Hapus
                                                </a>
                                            </td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<?php
include "pondasi/kaki.php";
?>
