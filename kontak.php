<?php
// Koneksi ke database
include "admin/config/koneksi.php";

// Query data kontak
$sql = "SELECT * FROM kontak ORDER BY id DESC";
$result = $conn->query($sql);

// Data default jika tidak ada data
$kontak = [
    [
        "alamat" => "Data belum tersedia.",
        "email" => "Data belum tersedia.",
        "whatsapp" => "Data belum tersedia."
    ]
];

// Ambil semua data jika tersedia
if ($result->num_rows > 0) {
    $kontak = $result->fetch_all(MYSQLI_ASSOC); // Ambil semua data
}
?>

<?php
// Menyisipkan file kepala
include "pondasi/kepala.php";
?>

<body>

<!-- MAIN WRAPPER START -->
<section id="content" class="single-wrapper">
    <!-- Page Title -->
 
        <div class="container">
            <div class="heading-block wow fadeIn">
                <h2>Kontak Kami</h2>
            </div>
        </div>


    <!-- CONTACT INFO START -->
    <div class="contact-info">
        <div class="container">
            <div class="row">
                <div style="display: flex; align-items: flex-start; gap: 20px; flex-wrap: wrap;">
                    <!-- Google Maps -->
                    <div style="flex: 1; min-width: 300px;">
                        <h3>Lokasi Kami</h3>
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.791936120588!2d112.781258!3d-7.264503900000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f98a04390665%3A0x73387e0e7cb5eee6!2sJl.%20Mulyorejo%20No.100%2C%20RT.004%2FRW.01%2C%20Mulyorejo%2C%20Kec.%20Mulyorejo%2C%20Surabaya%2C%20Jawa%20Timur%2060115!5e0!3m2!1sid!2sid!4v1733729485367!5m2!1sid!2sid" 
                            width="100%" 
                            height="350" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>

                    <!-- Contact Details -->
                    <div style="flex: 1; min-width: 300px;">
                        <h3>Informasi Kontak</h3>
                        <?php foreach ($kontak as $item) { ?>
                            <div class="contact-item" style="margin-bottom: 20px;">
                                <h4>Alamat:</h4>
                                <p><?php echo $item['alamat']; ?></p>
                                <h4>Email:</h4>
                                <p><a href="mailto:<?php echo $item['email']; ?>"><?php echo $item['email']; ?></a></p>
                                <h4>WhatsApp:</h4>
                                <p><a href="https://wa.me/<?php echo $item['whatsapp']; ?>">+<?php echo $item['whatsapp']; ?></a></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT INFO END -->

</section>

<!-- FOOTER START -->
<footer id="footer">
    <div class="container">
        <div class="row">
            <!-- Tambahkan elemen footer sesuai kebutuhan -->
        </div>
    </div>
</footer>
<!-- FOOTER END -->

<?php
// Menyisipkan file kaki
include "pondasi/kaki.php";
?>
