<?php
include "pondasi/kepala.php";
include "pondasi/kiri.php";

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Data Visi dan Misi</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <!-- Optional breadcrumb navigation -->
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Form Visi dan Misi</h4>
                        <ul class="box-controls pull-right">
                            <li><a class="box-btn-close" href="#"></a></li>
                            <li><a class="box-btn-slide" href="#"></a></li>
                            <li><a class="box-btn-fullscreen" href="#"></a></li>
                        </ul>
                    </div>
                    <!-- /.box-header -->
                    <?php
                    require_once("../config/koneksi.php");

                    $id = $_GET['id'];
                    $sql = mysqli_query($conn, "SELECT * FROM visimisi WHERE id='$id'");
                    $data = mysqli_fetch_assoc($sql);

                    if (!$data) {
                        echo "Data tidak ditemukan.";
                        exit();
                    }
                    ?>
                    <form class="form" action="vm-act-edit.php" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Visi</label>
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" class="form-control">
                                        <textarea rows="5" name="visi" class="form-control" required><?php echo $data['visi']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Misi</label>
                                        <textarea rows="5" name="misi" class="form-control" required><?php echo $data['misi']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-danger btn-outline">
                                <a href="visimisi.php"> <i class="ti-arrow-alt"></i> Batal</a>
                            </button>
                            &nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary btn-outline">
                                <i class="ti-save-alt"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php

include "pondasi/kaki.php";

?>
