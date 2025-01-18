<?php
include "pondasi/kepala.php";
include "pondasi/kiri.php";
require_once("../config/koneksi.php");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Data Alasan</h3>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Form Edit Alasan</h4>
                    </div>

                    <?php
                    // Pastikan id dikirim melalui GET
                    if (isset($_GET['id'])) {
                        $id = intval($_GET['id']);
                        $sql = "SELECT * FROM alasan WHERE id = $id";
                        $result = mysqli_query($conn, $sql);

                        if ($data = mysqli_fetch_assoc($result)) {
                    ?>
                            <form class="form" action="alasan-act-edit.php" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Nomor</label>
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                                        <input type="text" name="nomor" value="<?php echo htmlspecialchars($data['nomor']); ?>" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" name="judul" value="<?php echo htmlspecialchars($data['judul']); ?>" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" rows="5" class="form-control" required><?php echo htmlspecialchars($data['deskripsi']); ?></textarea>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="alasan.php" class="btn btn-danger btn-outline"><i class="ti-arrow-alt"></i> Batal</a>
                                    <button type="submit" class="btn btn-primary btn-outline"><i class="ti-save-alt"></i> Simpan</button>
                                </div>
                            </form>
                    <?php
                        } else {
                            echo "Data tidak ditemukan.";
                        }
                    } else {
                        echo "ID tidak ditemukan.";
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
