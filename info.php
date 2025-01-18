<?php
include "pondasi/kepala.php";

include "admin/config/koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM info");
$b = mysqli_fetch_assoc($sql);

?>

<body>

    <!-- MAIN WRAPPER START
        ============================================= -->
    <!-- HEADER END -->

    <!-- CONTENT START
            ============================================= -->
    <section id="content" class="single-wrapper">

        <div class="our-features grey-background">
            <div class="container">

                <div class="about-us">
                    <div class="container">
                        <div class="row">
                            <!-- Accordion Start -->
                            <div class="heading-block">
                                    <h2>Informasi Pendaftaran</h2>
                                </div>
                            <div class="accordion col-md-6">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">Jadwal</h4>
                                            </div>
                                        </a>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <?php echo $b['jadwal'] ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">Persyaratan</h4>
                                            </div>
                                        </a>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <ul>
                                                    <?php
                                            // Asumsikan $b['syarat'] adalah string dengan daftar persyaratan dipisahkan oleh karakter tertentu, misalnya titik atau baris baru.
                                                    $persyaratan = explode('.', $b['syarat']); // Ganti '.' dengan karakter pemisah yang sesuai
                                                        foreach ($persyaratan as $item) {
                                                            if (trim($item) !== '') { // Menghindari elemen kosong
                                                            echo "<li>" . htmlspecialchars(trim($item)) . "</li>";
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="panel panel-default">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <h4 class="panel-title">Biaya</h4>
                                            </div>
                                        </a>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Rincian</th>
                                                            <th>Biaya (Rp)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $biayaItems = explode("\n", $b['biaya']); // Asumsikan data biaya berbentuk teks dipisahkan oleh baris baru
                                                            $no = 1;
                                                            $totalBiaya = 0; // Variabel untuk menyimpan total biaya

                                                        foreach ($biayaItems as $item) {
                                                            $detail = explode(":", $item); // Memisahkan rincian dan jumlah biaya dengan delimiter ":"
                                                            if (count($detail) === 2) {
                                                                $biaya = intval(trim($detail[1])); // Mengonversi biaya menjadi integer
                                                                $totalBiaya += $biaya; // Menambahkan biaya ke total
                                                                    echo "<tr>";
                                                                    echo "<td>{$no}</td>";
                                                                    echo "<td>" . htmlspecialchars(trim($detail[0])) . "</td>";
                                                                    echo "<td>" . number_format($biaya, 0, ',', '.') . "</td>";
                                                                    echo "</tr>";
                                                                    $no++;
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="2" style="text-align:right;">Total</th>
                                                            <th>Rp <?= number_format($totalBiaya, 0, ',', '.'); ?></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- Accordion End -->

                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURES SECTION END -->

        <!-- CLASS AND COURSE SECTION START
    
     
      
      

    
                ============================================= -->

        <!-- PRICING TABLE SECTION END -->

    </section>
    <!-- CONTENT END -->

    <!-- FOOTER START
            ============================================= -->
    <footer id="footer">
        <div class="container">

        </div>
    </footer>
    <!-- FOOTER END -->

    <!-- COPYRIGHT START
            ============================================= -->

    <?php
    include "pondasi/kaki.php";
    ?>
    <!-- COPYRIGHT END -->

    </div>
    <!-- MAIN WRAPPER END -->

    <!-- Footer Scripts
        ============================================= -->
    <!-- External -->
    <script type="text/javascript" src="js/plugin.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>