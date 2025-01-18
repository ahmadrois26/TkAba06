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
        <div class="our-features grey-background">
            <div class="container">
                <div class="heading-block wow fadeIn">
                    <h2>Prestasi</h2> 
                </div>
        </div>
        <div class="class-feature grey-background clearfix">
            <div class="container">
                <div class="row">


                    <?php
                    include "admin/config/koneksi.php";
                    $sql = mysqli_query($conn, "SELECT * FROM prestasi");
                    while ($b = mysqli_fetch_assoc($sql)) {

                        ?>
                        <div class="feature-item col-md-4 wow fadeInUp">
                            <div class="feature-with-bg" style="background-color:rgb(89, 201, 108);">
                                <div class="feature-icon">
                                    <div class="icon icon-bars2"></div>
                                </div>
                                <div class="feature-desc">

                                    <p><?php echo $b['prestasi'] ?>.</p>
                                    <br /> <br /> <br />
                                    <p></p>
                                </div>
                            </div>
                        </div><?php } ?>
                </div>
            </div>
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
    <div class="container" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
       
        <div style="flex: 1; margin-right: 20px;">
            <h3>TK ‘Aisyiyah Bustanul Athfal 06 Surabaya</h3>
            <p>
                Jl. Mulyorejo No.100, Mulyorejo, Kec. Mulyorejo, Kota SBY, <br>
                Jawa Timur 60115, Surabaya, Indonesia, 60115
            </p>
            <p>Contact:</p>
            <p>Email:</p>
        </div>

        <!-- Useful Links -->
        <div style="flex: 1; margin-right: 20px;">
            <h3>Useful Links</h3>
            <ul style="list-style: none; padding: 0;">
                <li><a href="#" style="color: #ffcc00; text-decoration: none;">Home</a></li>
                <li><a href="#" style="color: #ffcc00; text-decoration: none;">Tentang</a></li>
                <li><a href="#" style="color: #ffcc00; text-decoration: none;">Acara</a></li>
                <li><a href="#" style="color: #ffcc00; text-decoration: none;">Pelajaran</a></li>
                <li><a href="#" style="color: #ffcc00; text-decoration: none;">Kontak</a></li>
            </ul>
        </div>

        <!-- Maps -->
        
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