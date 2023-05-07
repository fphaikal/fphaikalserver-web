<?php
         include "./koneksi.php";

         $ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
         $tanggal = date("Ymd");
         $waktu = time();
         $bln=date("m");
         $tgl=date("d");
         $blan=date("Y-m");
         $thn=date("Y");
         $tglk=$tgl-1;
         $s = mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE ip='$ip' AND tanggal='$tanggal'");

         if(mysqli_num_rows($s) == 0)
         {
            mysqli_query($koneksi,"INSERT INTO tbvisit(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
         } else {
          mysqli_query($koneksi,"UPDATE tbvisit SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");

             if($tglk=='1' | $tglk=='2' | $tglk=='3' | $tglk=='4' | $tglk=='5' | $tglk=='6' | $tglk=='7' | $tglk=='8' | $tglk=='9'){
                $kemarin=mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE tanggal='$thn-$bln-0$tglk'");
             } else {
                $kemarin=mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE tanggal='$thn-$bln-$tglk'");
             }

             $bulan=mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE tanggal LIKE '%$blan%'");
             $bulan1=mysqli_num_rows($bulan);
             $tahunini=mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE tanggal LIKE '%$thn%'");
             $tahunini1=mysqli_num_rows($tahunini);
             $pengunjung = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE tanggal='$tanggal' GROUP BY ip"));
             $totalpengunjung = mysqli_fetch_array(mysqli_query($koneksi,"SELECT COUNT(hits) FROM tbvisit"));
             $hits = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT SUM(hits) as hitstoday FROM tbvisit WHERE tanggal='$tanggal' GROUP BY tanggal"));
             $totalhits1 =mysqli_query($koneksi,"SELECT SUM(hits) FROM tbvisit");
             $test=mysqli_fetch_array($totalhits1);
             $totalhits=$test[0];
             $bataswaktu = time() - 900;
             $pengunjungonline = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbvisit WHERE online > '$bataswaktu'"));
             $kemarin1 = mysqli_num_rows($kemarin);
          }

        ?>
<!-- Footer -->
<footer
    class="text-center text-lg-start text-white"
    style="background-color: #1c2331">
    <!-- Section: Social media -->
    <section class="text-center" style="background-color: #27DEBF;">
        <div class="container d-flex justify-content-between p-4">
            <!-- Left -->
            <div class="me-5 text-dark d-none d-sm-block">
                <span>Get connected with me on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div class="">
                <a href="https://www.facebook.com/profile.php?id=100011664742907" target="_blank" class="text-dark me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/fp_haikal/" target="_blank" class="text-dark me-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/in/fp-haikal/" target="_blank" class="text-dark me-4">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://github.com/fphaikal" target="_blank" class="text-dark me-4">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->    
        </div>
        
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold">FPHaikal Server</h6>
                    <hr
                        class="mb-4 mt-0 d-inline-block mx-auto bg-primary"
                        style="width: 60px; height: 2px"/>
                    <p>
                    Tempat untuk menaruh hasil dari pekerjaan Fahreza Pasha Haikal mulai dari video, photo,
                    document dan lain-lain. 
                </p>
                
                
                
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">NavBar</h6>
                    <hr
                        class="mb-4 mt-0 d-inline-block mx-auto bg-primary"
                        style="width: 60px; height: 2px"/>
                    <p>
                        <a href="#!" class="text-white">Video Project</a>
                    </p>
                    <p>
                        <a href="#!" class="text-white">Photo Project</a>
                    </p>
                    <p>
                        <a href="#!" class="text-white">Document Center</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Others</h6>
                    <hr
                        class="mb-4 mt-0 d-inline-block mx-auto bg-primary"
                        style="width: 60px; height: 2px"
                        />
                    <p>
                    <a href="#!" class="text-white">About Me</a>
                    </p>
                    <p>
                    <a href="../index.php?page=kris" class="text-white">Kritik & Saran</a>
                    </p>
                    <p>
                    <a href="../admin/fph-admin.php" class="text-white">Admin</a>
                    </p>
                    <p>
                    <a href="#!" class="text-white">Help</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 ">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Contact</h6>
                    <hr
                        class="mb-4 mt-0 d-inline-block mx-auto bg-primary"
                        style="width: 60px; height: 2px"
                        />
                    <p><i class="fas fa-home mr-3"></i> Bantul, DI Yogyakarta</p>
                    <p><i class="fas fa-envelope mr-3"></i> abufahreza@gmail.com</p>
                    <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div
    class="text-center p-3"
    style="background-color: rgba(0, 0, 0, 0.2)"
    >
    © 2023 Copyright
    <a class="text-white" href="index.php">FPHaikal</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

