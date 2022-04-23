 <footer class="py-5 d-none">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-5">
            <div class="footer_link">
              <h1>LINKS</h1>
              <ul>
                <li><a href="#">Rigister your business</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Terms & Conditions</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-3">
            <div class="footer_link">
              <h1>LINKS</h1>
              <ul>
                <li><a href="#">Privicy Policy</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">FAQ </a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <div class="footer_link">
              <h1>CONNECT</h1>
              <div class="social_icons mb-3">
                <a href="#">
                  <img src="assets/images/facbook.svg">
                </a>
                <a href="#">
                  <img src="assets/images/insta.svg">
                </a>
                <a href="#">
                  <img src="assets/images/linkin.svg">
                </a>
                <a href="#">
                  <img src="assets/images/youtube.svg">
                </a>
              </div>
              <h1>CONTACT US</h1>
              <p class="footer_address">+92 345 123 4678  </p>
              <p class="footer_address">abc@email.com </p>
              <p class="footer_address">1- Industrial Area, City</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/611bc9fae4.js" crossorigin="anonymous"></script>
    <script src="assets/OwlCarousel/dist/owl.carousel.min.js"></script>
    <script src="assets/image-uploader/dist/image-uploader.min.js"></script>
    <script type="text/javascript">
      (function ($) {
        "use strict";
        $(document).ready(function () {
          $('.input-images-signup').imageUploader({
            maxFiles:1,
          });
    $(".input-images-signup>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="assets/images/fileuploadicon.svg"></div><p class="mb-0">Upload Your Picture </p><input type="file" size="60" ></label> ');
          $(".carousel_se_01_carousel").owlCarousel({
            loop:true,
            items:1,
            margin:10,
            nav:true,
            autoplay:true,
          });
        });
        $(document).ready(function () {
          $(".carousel_se_02_carousel").owlCarousel({
            items: 3,
            nav: false,
            loop: true,
            dots:true,
            mouseDrag: true,
            responsiveClass: true,
            responsive: {
              0: {
                items: 1,
              },
              768: {
                items: 2,
              },
              992: {
                items: 3,
              },
              1200: {
                items: 3,
              },
            },
          });
        });
      })(jQuery);
    </script>
  </body>
</html>