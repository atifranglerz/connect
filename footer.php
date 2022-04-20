<footer class="py-5">
  <div class="container-lg container-fluid">
    <div class="row">
      <div class="col-lg-5 col-md-5 col-sm-5">
        <div class="footer_link">
          <h1>LINKS</h1>
          <ul>
            <li><a href="signup.php">Rigister your business</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-3 col-sm-3">
        <div class="footer_link">
          <h1>LINKS</h1>
          <ul>
            <li><a href="#">Privicy Policy</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="faq.php">FAQ </a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-4">
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
          <h1 class="footer_contact_heading">CONTACT US</h1>
          <p class="footer_address">+92 345 123 4678  </p>
          <p class="footer_address">abc@email.com </p>
          <p class="footer_address">1- Industrial Area, City</p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Top Searches</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="garage_name">
        <p>Fields Required From Clint Side</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
        
      </div>
    </div>
  </div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/611bc9fae4.js" crossorigin="anonymous"></script>
<!-- <script src="/path/to/jquery.min.js"></script> -->
<!-- <script src="assets/slick-master/slick/slick.js"></script> -->
<!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
<!-- <script src="jquery.min.js"></script> -->
<script src="assets/OwlCarousel/dist/owl.carousel.min.js"></script>

<script type="text/javascript">
  /*scrolling banner*/
(function ($) {
  "use strict";

  $(document).ready(function () {
    
    $(".carousel_se_01_carousel").owlCarousel({
      loop:true,
      items:1,
      margin:10,
      nav:true,
      autoplay:true,
      // responsive:{
      //     0:{
      //         items:1
      //     },
      //     600:{
      //         items:3
      //     },
      //     1000:{
      //         items:5
      //     }
      // }
      
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
         margin:10,
      // navText: ["<i class='icofont-bubble-left'></i>", "<i class='icofont-bubble-right'></i>"],
      responsive: {
        0: {
          items: 1,
        },
        576: {
          items: 2,
        },
        768: {
          items: 3,
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

  // $(document).ready(function () {
  //   $(".carousel_se_03_carousel").owlCarousel({
  //     items: 4,
  //     nav: true,
  //     dots: false,
  //     loop: true,

  //     mouseDrag: true,
  //     responsiveClass: true,
  //     autoplay: true,
  //     autoplayTimeout: 3000,
  //     autoplayHoverPause: true,
  //     navText: ["<i class='icofont-scroll-left'></i>", "<i class='icofont-scroll-right'></i>"],
  //     responsive: {
  //       0: {
  //         items: 1,
  //       },
  //       480: {
  //         items: 2,
  //       },
  //       767: {
  //         items: 3,
  //       },
  //       992: {
  //         items: 3,
  //       },
  //       1200: {
  //         items: 4,
  //       },
  //     },
  //   });
  // });
})(jQuery);
//  $(document).ready(function(){
//   $('.owl-carousel').owlCarousel({
//     loop:true,
//     items:1,
//     margin:10,
//     nav:true,
//     autoplay:true,
// responsive:{
//     0:{
//         items:1
//     },
//     600:{
//         items:3
//     },
//     1000:{
//         items:5
//     }
// }
// });
// });
</script>
</body>
</html>