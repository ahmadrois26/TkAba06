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

    <div class="grey-background wow fadeIn">
            <div class="container">
                <div class="heading-block page-title wow fadeInUp">
                    <h1>Data Guru</h1>
                </div>
            </div>
        </div>
        <div class="class-course">
            <div class="container">
                <div class="row">
                    <!-- Nav Tabs -->
                    <div class="teacher-nav wow fadeInUp" role="tablist" id="planTabs">
                        <ul class="no-margin no-padding">
                            <?php
                            include "admin/config/koneksi.php";
                            $sql = mysqli_query($conn, "SELECT * FROM guru");
                            while ($b = mysqli_fetch_assoc($sql)) {

                                ?>
                                <li role="presentation" class="col-md-3 active">
                                    <a href="#stelarobson" aria-controls="stelarobson" role="tab" data-toggle="tab">
                                        <img src="admin/foto/guru/<?php echo $b['foto'] ?>" alt="" />

                                    </a> <a class="btn btn-primary"><i class="fa fa-user"></i> <?php echo $b['nama'] ?></a>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                    <!-- Nav Tabs End -->
                </div>

                <!-- Tab panes -->




                <!-- Tab Panes End -->

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