<?php
include "pondasi/kepala.php";
include "pondasi/kiri.php";

// Menyimpan data jika ada permintaan POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alamat = $_POST["alamat"];
    $email = $_POST["email"];
    $whatsapp = $_POST["whatsapp"];

    $sql = "INSERT INTO kontak (alamat, email, whatsapp) VALUES ('$alamat', '$email', '$whatsapp')";

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
                <h3 class="page-title">Data Kontak</h3>
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
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="whatsapp">No WhatsApp</label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp">
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabel Data Kontak -->
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Daftar Kontak</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>No WhatsApp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query data kontak
                                    $sql = mysqli_query($conn, "SELECT * FROM kontak");
                                    while ($b = mysqli_fetch_assoc($sql)) {
                                        echo "
                                        <tr>
                                            <td>" . $b['id'] . "</td>
                                            <td>" . $b['alamat'] . "</td>
                                            <td>" . $b['email'] . "</td>
                                            <td>" . $b['whatsapp'] . "</td>
                                            <td>
                                                <a href='con-edit.php?id=" . $b['id'] . "' class='btn btn-primary'>
                                                    <i class='fa fa-edit'></i> Edit
                                                </a>
                                                <a href='con-hapus.php?id=" . $b['id'] . "' class='btn btn-danger' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">
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
