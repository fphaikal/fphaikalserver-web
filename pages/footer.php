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
                <div id="website-counter" class="badge text-bg-light"></div>
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
                    <a href="#!" class="text-white">Become an Affiliate</a>
                    </p>
                    <p>
                    <a href="#!" class="text-white">Shipping Rates</a>
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

<script>
  var counterContainer = document.querySelector("#website-counter");
  var resetButton = document.querySelector("#reset");
  var visitCount = localStorage.getItem("page_view");
 
  // Periksa apakah entri page_view ada
  if (visitCount) {
    visitCount = Number(visitCount) + 1;
    localStorage.setItem("page_view", visitCount);
  } else {
    visitCount = 1;
    localStorage.setItem("page_view", 1);
  }
  counterContainer.innerHTML = visitCount;
 
  // Menambahkan jumlah view ketika onClick
  resetButton.addEventListener("click", () => {
    visitCount = 1;
    localStorage.setItem("page_view", 1);
    counterContainer.innerHTML = visitCount;
  });
</script>