<?php
include "pondasi/kepala.php";
include "pondasi/kiri.php";
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Data Info Pendaftaran</h3>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Informasi Pendaftaran</h4>
                    </div>
                    <!-- /.box-header -->

                    <?php
                    // Validasi Input ID
                    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

                    // Pastikan ID valid
                    if ($id > 0) {
                        $stmt = $conn->prepare("SELECT * FROM info WHERE id = ?");
                        $stmt->bind_param("i", $id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $b = $result->fetch_assoc();
                            ?>

                            <form class="form" action="info-edit.php" method="post">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Jadwal</label>
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($b['id']); ?>">
                                                <textarea rows="5" class="form-control" name="jadwal" required><?php echo htmlspecialchars($b['jadwal']); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Persyaratan</label>
                                                <textarea rows="5" class="form-control" name="syarat" required><?php echo htmlspecialchars($b['syarat']); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat</label>
                                                <input type="text" name="tempat" value="<?php echo htmlspecialchars($b['tempat']); ?>" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Biaya</label>
                                                <textarea rows="5" class="form-control" name="biaya" required><?php echo htmlspecialchars($b['biaya']); ?></textarea>
                                                <small>Format: <b>Rincian:Biaya</b> per baris (misal: "Pendaftaran:500000")</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti-save-alt"></i> Simpan
                                    </button>
                                </div>
                            </form>

                            <?php
                        } else {
                            echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>ID tidak valid!</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include "pondasi/kaki.php";
?>
