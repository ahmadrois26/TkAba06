<?php

include "pondasi/kepala.php";
?>
<!-- HEADER END -->

<!-- SLIDER START
            ============================================= -->
<div class="our-features grey-background">
</div>
<section id="slider" class="flexslider-wrap fullscreen clearfix">
    <div class="flex-content vertical-center" style="background-image: url(image/h0.png); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh; position: relative;">
    </div>
</section>


<!-- SLIDER END -->

<!-- CONTENT START
            ============================================= -->
<section id="content">

    <!-- BANNER START
                ============================================= -->
    <?php
    include "admin/config/koneksi.php";
    $sql = mysqli_query($conn, "SELECT * FROM moto");
    while ($b = mysqli_fetch_assoc($sql)) {

        ?>
        <div class="banner large text-center wow fadeInUp">
            <div class="container">
                <div class="row">
                    <h1 class="no-margin"><?php echo $b['moto'] ?></h1>
                </div>
            </div>
        </div><?php } ?>
    <!-- BANNER END -->

    <!-- ABOUT US SECTION START
                ============================================= -->
    <div class="about-us no-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeIn">
                    <div class="heading-block">
                        <h2>TK ‘Aisyiyah Bustanul Athfal 06</h2>
                    </div>
                    <?php
                    include "admin/config/koneksi.php";
                    $sql = mysqli_query($conn, "SELECT * FROM profil");
                    while ($b = mysqli_fetch_assoc($sql)) {

                        ?>
                        <p><p><?php echo $b['profil'] ?></p>
                    <?php } ?><div class="button-normal green">
                        <a href="profil.php">Selengkapnya</a>
                    </div>
                </div>

                <div class="about-img col-md-6 wow fadeInLeft">
                    <img src="" alt="" />
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION: Kenapa Harus Sekolah Disini -->
    <section style="background-image: url('image/h.png'); background-size: cover; background-position: center; padding: 50px 20px; font-family: Arial, sans-serif;">
    <div style="text-align: center; margin-bottom: 40px;">
        <h2 style="color: #333;">Kenapa Harus Sekolah disini?</h2>
    </div>
    <div class="carousel-container" style="overflow: hidden; width: 100%; position: relative;">
        <div class="carousel-slide" style="display: flex; transition: transform 0.5s ease-in-out; width: 100%;">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM alasan");
            if ($result) {
                $items = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $items[] = $row;
                }
                $chunks = array_chunk($items, 2); // Group items into slides
                foreach ($chunks as $chunk) {
                    echo '<div class="carousel-item" style="display: flex; gap: 20px; justify-content: center; width: 100%; flex-shrink: 0;">';
                    foreach ($chunk as $item) {
                        echo '
                            <div style="background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 300px; text-align: center;">
                                <h3 style="color: #333;">' . htmlspecialchars($item['nomor']) . '</h3>
                                <p style="color: #555; font-weight: bold;">' . htmlspecialchars($item['judul']) . '</p>
                                <p style="color: #555;">' . nl2br(htmlspecialchars($item['deskripsi'])) . '</p>
                            </div>';
                    }
                    echo '</div>';
                }
            } else {
                echo '<p style="text-align: center; color: red;">Gagal mengambil data dari database.</p>';
            }
            ?>
        </div>
    </div>
        <div class="navigation-dots" style="text-align: center; margin-top: 20px;">
            <?php
            for ($i = 0; $i < count($chunks); $i++) {
                $active = $i === 0 ? '#333' : '#ddd';
                echo '<span class="dot" style="display: inline-block; width: 15px; height: 15px; background: ' . $active . '; margin: 0 5px; border-radius: 50%; cursor: pointer;"></span>';
            }
            ?>
        </div>
    </section>
    <!-- END: Kenapa Harus Sekolah Disini -->

    <!-- JS for Carousel -->
    <script>
        const carouselSlide = document.querySelector('.carousel-slide');
        const dots = document.querySelectorAll('.dot');
        let currentSlide = 0;

        function goToSlide(index) {
            carouselSlide.style.transform = `translateX(-${index * 100}%)`;
            dots.forEach((dot, i) => {
                dot.style.background = i === index ? '#333' : '#ddd';
            });
            currentSlide = index;
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                goToSlide(index);
            });
        });
    </script>
</section>




    <!-- FEATURES SECTION START
                ============================================= -->
    <div class="our-features grey-background">
        <div class="container">
            <div class="heading-block wow fadeIn">
                <h2>Intrakulikuler</h2>
                <h4 class="tagline"></h4>
            </div>
            
            <div class="class-feature grey-background clearfix">
                <div class="container">
                    <div class="row">
                        <?php
                        include "admin/config/koneksi.php";
                        $sql = mysqli_query($conn, "SELECT * FROM intra");
                        while ($b = mysqli_fetch_assoc($sql)) {

                            ?>
                            <div class="feature-item col-md-4 wow fadeInUp">
                                <div class="feature-with-bg" style="background-color:rgb(81, 217, 97);">
                                
                                    <div class="feature-desc">
                                        <h4><?php echo $b['nama'] ?></h4>
                                        <p><?php echo $b['detail'] ?>.</p>
                                    </div>
                                </div>
                            </div><?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our-features grey-background">
        <div class="container">
            <div class="heading-block wow fadeIn">
                <h2>Ekstrakulikuler</h2>
                <h4 class="tagline"></h4>
            </div>
            
            <div class="class-feature grey-background clearfix">
                <div class="container">
                    <div class="row">
                        <?php
                        include "admin/config/koneksi.php";
                        $sql = mysqli_query($conn, "SELECT * FROM ekstra");
                        while ($b = mysqli_fetch_assoc($sql)) {

                            ?>
                            <div class="feature-item col-md-4 wow fadeInUp">
                                <div class="feature-with-bg" style="background-color:rgb(81, 217, 97);">
                                
                                    <div class="feature-desc">
                                        <h4><?php echo $b['nama'] ?></h4>
                                        <p><?php echo $b['detail'] ?>.</p>
                                    </div>
                                </div>
                            </div><?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURES SECTION END -->

    <!-- FACILITY SECTION START
                ============================================= -->

 



    <!-- OUR TEACHER SECTION START
                ============================================= -->



    <!-- OUR TEACHER SECTION END -->

    <!-- BANNER SECTION START
                ============================================= -->
    <div class="banner small wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-8 pull-left wow fadeInUp">
                    <h3>Ayo Daftar Anak Anda Sekarang Juga?</h3>
                </div>

                <div class="col-md-4 wow fadeInUp">
                    <div class="button-normal white pull-right">
                        <a href="info.php" class="no-margin">Daftar!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER SECTION END -->

    <!-- OUR CLASSES SECTION START
                ============================================= -->

    <!-- OUR CLASSES SECTION END -->

    <!-- OUR CLASSES SCRIPT START -->
    <script type="text/javascript">
        jQuery(window).load(function() {
            var classDetailsHeight = jQuery('.class-item img').height();
            jQuery(".class-details").css("height", classDetailsHeight);
        });
    </script>
    <!-- OUR CLASSES SCRIPT END -->

    <!-- TESTIMONIAL SECTION START
                ============================================= -->

    <!-- TESTIMONIAL SECTION END -->

</section>
<!-- CONTENT END -->

<!-- FOOTER START
            ============================================= -->

<!-- FOOTER END -->

<!-- COPYRIGHT START
            ============================================= -->

<?php
include "pondasi/kaki.php";
?>