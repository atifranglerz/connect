 </div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/611bc9fae4.js" crossorigin="anonymous"></script>
<script src="assets/OwlCarousel/dist/owl.carousel.min.js"></script>
<script src="assets/image-uploader/dist/image-uploader.min.js"></script>
<script type="text/javascript">
  /*scrolling banner*/
  $(document).ready(function(){

         $('.input-images').imageUploader();
    $(".input-images>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="assets/images/fileuploadicon.svg"></div><p class="mb-0">Upload Car image</p><input type="file" size="60" ></label>  ');
    $('.input-images-2').imageUploader({
      extensions: ['.pdf'],
      mimes: ['application/pdf'],
      maxFiles:1,
    });
    $(".input-images-2>.image-uploader>.upload-text").append('<label class="img_wraper_label skip"><div class="file_icon_wraper"><img src="assets/images/fileuploadicon.svg"></div><p class="mb-0">Upload Police/Accident/Inspection Report</p><a href="#" class="skip">Skip</a><input type="file" size="60" ></label>   ');
    $('.input-images-3').imageUploader();
    $(".input-images-3>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="assets/images/fileuploadicon.svg"></div><p class="mb-0">Add Registration Copy Image</p><input type="file" size="60" ></label>   ');
    $('.image-uploader-edit').imageUploader();
    $(".image-uploader-edit>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="assets/images/fileuploadicon.svg"></div><p class="mb-0">Upload Your Picture To Update</p><input type="file" size="60" ></label>');
    $(document).on('click', '#menuToggle', function () {
      $("#dashboardSidebarRightContent").toggleClass("toggled");
      $("#dashboardSidebar").toggleClass("sidebar-toggle");
    });
    
    /*dashboard right side content toggle*/
    /*dashboard right side content and sidebar toggle switching*/
    sideBarToggleSwitch();
    /*dashboard right side content and sidebar toggle switching*/
    if($(window).width()<=991) {
      /*Side-nav-overlay*/
      sideNavOverlay();
      /*Side-nav-overlay*/
    }
    $(window).resize(function () {
      /*dashboard right side content and sidebar toggle switching*/
      sideBarToggleSwitch();
      /*dashboard right side content and sidebar toggle switching*/
      /*Side-nav-overlay*/
      sideNavOverlay();
      /*Side-nav-overlay*/
    });
    /*Side-nav-overlay*/
    function sideNavOverlay() {
      $(document).on('click', '#menuToggle', function () {
        $('#sideNavOverlay').removeClass('d-none');
      });
    }
    /*Side-nav-overlay*/
    /*dashboard right side content toggle*/
    function sideBarToggleSwitch() {
      $(document).on('click', function (event) {
        if ($(window).width()<=991 && !$(event.target).closest('#dashboardSidebar, #menuToggle').length) {
          $('#dashboardSidebar').addClass('sidebar-toggle');
          /*Side-nav-overlay*/
          $('#sideNavOverlay').addClass('d-none');
          /*Side-nav-overlay*/
        }
      });
      if ($(window).width()>=992) {
        $('#dashboardSidebar').removeClass('sidebar-toggle');
        $('#dashboardSidebarRightContent').removeClass('toggled');
      }
      else {
        $('#dashboardSidebar').addClass('sidebar-toggle');
        $('#sideNavOverlay').addClass('d-none');
      }
    }
    // $('.notification_tooltip').hide();
    $(document).on('click', '.notify-btn', function() {
      $('#notification_tolltip').toggle();
    });
    $(document).on('click', '#Logout_Profile', function() {
      $('#TopProfile').toggle();
    });
    $(document).on('click', '#chat_toggle', function () {
     
      $(".submenue").toggle();
    });
    window.addEventListener('click', function(e){
      if (document.getElementById('chat_toggle').contains(e.target)){
      // Clicked inside the  box
      // alert("inside clicked");
      $("#delet_message_toggle").css("display","block");
    }
    else{
      $("#delet_message_toggle").css("display","none");
      // alert("out side");
    }
  }); 

    $("#search_input").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".main_contact>a>.inbox_contact").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
   


    // code for message send
    $(document).on('click', '#sendMsg', function() {
      
      var typeMsg = $("#typeMsg").val();
      if(typeMsg =="") {
        return false;
      }
      else {
        $(".cahtting_messages").append('<div class="main_message"><div class="inbox_contact align-items-end justify-content-end top_main"><div class="message_txt_wraper"><p class="mb-2 text-end">11:20 AM, Today</p><p class="mb-0 message_txt second">'+typeMsg+'</p></div><div class="contact_img second_msg"><img src="assets/images/repair2.jpg"></div></div></div>');
        var chat_message = $(".cahtting_messages");
        chat_message.animate({scrollTop: chat_message[0].scrollHeight}, 1000);
        $("#typeMsg").val("");

      }
    });
    $(document).on('keypress',function(e) {
    if(e.which == 13) {
       $("#sendMsg").click();
    }
});
    $("input.messages_file[type=file]").before("<img src='assets/images/File.svg' class='messages_file_uploader_image' width='20' height='20' />");

    sidebarScrollHeight();
    $(window).resize(function(){
      sidebarScrollHeight();
    });
   
   
  });
 (function ($) {
  "use strict";
  $(document).ready(function () {
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
        0:{
          items: 1,
        },
        // 480: {
        //   items: 2,
        // },
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
  $(document).ready(function () {
    $(".carousel_se_03_carousel").owlCarousel({
      items: 3,
      nav: false,
      loop: true,
      dots:true,
      margin:10,
      mouseDrag: true,
      responsiveClass: true,
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
})(jQuery);
    function sidebarScrollHeight() {
      var dashboardSidebar= $("#dashboardSidebar").innerHeight();
      var topHeaght =$(".main_profile_img_name").innerHeight(); 
      var bottomHeaght =$(".soignou_plus_language_wraper").innerHeight();
      var sidebarHeight= dashboardSidebar - topHeaght - bottomHeaght - 50;
      $(".sidebar_navcigation").innerHeight(sidebarHeight);
    }
    $(function() {
     var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
     $(".sidebar_navcigation>li>a").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          $(this).addClass("active");
     })
     $(".navbar-nav>.nav-item>.nav-link").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          $(this).addClass("active");
     })

});
</script>
</body>
</html>