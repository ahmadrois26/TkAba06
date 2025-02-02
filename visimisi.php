<?php
include "pondasi/kepala.php";
include "admin/config/koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM profil");
$b = mysqli_fetch_assoc($sql);

?>

<body>

    <!-- MAIN WRAPPER START
        ============================================= -->
    <!-- HEADER END -->

    <!-- CONTENT START
            ============================================= -->
    <section id="content" class="single-wrapper">
        <!-- Page Title -->
        <div class="grey-background wow fadeIn">
            <div class="container">
                <div class="heading-block page-title wow fadeInUp">
                    <h1>Visi dan Misi</h1>
                </div>
            </div>
        </div>
        <div class="grey-background wow fadeIn">
            <div class="container">
                <div class="heading-block page-title wow fadeInUp">
                    <h1>Visi</h1>
                </div>
            </div>
        </div>
        <div class="class-feature grey-background clearfix">
            <div class="container">
                <div class="row">


                    <?php
                    include "admin/config/koneksi.php";
                    $sql = mysqli_query($conn, "SELECT * FROM visimisi");
                    while ($b = mysqli_fetch_assoc($sql)) {

                        ?>
                        <div class="feature-item col-md-4 wow fadeInUp">
                            <div class="feature-with-bg" style="background-color: #59bec9;">
                                <div class="feature-icon">
                                    <div class="icon icon-bars2"></div>
                                </div>
                                <div class="feature-desc">

                                    <p><?php echo $b['visi'] ?>.</p>
                                    <br /> <br /> <br />
                                    <p></p>
                                </div>
                            </div>
                        </div><?php } ?>
                </div>
            </div>
        </div>
        <!-- CLASS FEATURE END -->
        <div class="grey-background wow fadeIn">
            <div class="container">
                <div class="heading-block page-title wow fadeInUp">
                    <h1>Misi</h1>
                </div>
            </div>
        </div>
        <div class="class-feature grey-background clearfix">
            <div class="container">
                <div class="row">


                    <?php
                    include "admin/config/koneksi.php";
                    $sql = mysqli_query($conn, "SELECT * FROM visimisi");
                    while ($b = mysqli_fetch_assoc($sql)) {

                        ?>
                        <div class="feature-item col-md-4 wow fadeInUp">
                            <div class="feature-with-bg" style="background-color: #e57978;">
                                <div class="feature-icon">
                                    <div class="icon icon-favorite21"></div>
                                </div>
                                <div class="feature-desc">

                                    <p><?php echo $b['misi'] ?></p>
                                    <br /> <br /> <br /> <br />
                                </div>
                            </div>
                        </div><?php } ?>
                </div>
            </div>
        </div>
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
        <script type="text/javascript">
            jQuery(window).load(function() {
                var classDetailsHeight = jQuery('.class-item img').height();
                jQuery(".class-details").css("height", classDetailsHeight);
            });
        </script>
        <!-- RELATED CLASSES SCRIPT END -->

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