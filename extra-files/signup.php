 <?php include 'headersignup.php';?>
    <section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
      <div class="container-lg container-fluid">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="main_content_wraper pt-5">
              <h1 class="sec_main_heading text-center">SIGN UP</h1>
              <p class="sec_main_para text-center">Choose your role to signup</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="row g-4">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card">
                  <div class="sing_up_img_wraper card-img-top">
                    <img src="assets/images/vendorsingupimg.jpg"  alt="image">
                  </div>
                  <div class="card-body text-center">
                    <p class="card-text text-center sing_up_card_txt">Vendors across the country are providing their amazing services, Join in to register your self as one of them.
                    </p>
                    <a href="vendoradmin/vendorsignup.php" class="btn btn-secondary Signup_btn">VENDOR</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card">
                  <div class="sing_up_img_wraper card-img-top">
                    <img src="assets/images/usersignupimg.jpg"  alt="image">
                  </div>
                  <div class="card-body text-center">
                    <p class="card-text text-center sing_up_card_txt">Get list of vendors providing their services, based on best pricing select quote and get your work done.
                    </p>
                    <a href="customersignhup.php" class="btn btn-secondary Signup_btn">CUSTOMER</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <h4 class="my-4 text-center login_link_heading">Already have an account ?<a href="login.php"> Login</a>
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 <?php include 'footersignup.php';?>   
   