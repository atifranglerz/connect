 <?php include 'headersignup.php';?>
 <section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
  <div class="container-lg container-fluid" >
    <div class="row">
      <div class="col-lg-6 col-md-8 col-sm-8 mx-auto">
        <div class="cuatomer_signup_form_wraper mt-5 mt-lg-5 ">
          <div class="main_content_wraper">
            <h1 class="sec_main_heading text-center mb-0">WELCOME!</h1>
            <p class="sec_main_para text-center mb-0">Fill Up your details to Create New Account</p>
          </div>

          <form class="pt-5">
            <div class="col-12 mb-3  signup_input_wraper">
              <div class="input-images-signup"></div>
              <!-- <label class="img_wraper_label">
                <div class="file_icon_wraper">
                  <img src="assets/images/fileuploadicon.svg">
                </div>
                <p class="mb-0">Upload Your Picture To Update</p>
                <input type="file" size="60" >
              </label> --> 
            </div>

            <div class="col-12 mb-3  signup_input_wraper">
              <input type="email" class="form-control" id="inputName" placeholder="Full Name">
            </div>
            <div class="col-12 mb-3 signup_input_wraper">
              <input type="text" class="form-control" id="inputNumber" placeholder="Mobile Number">
            </div>
            <div class="col-12 mb-3 signup_input_wraper">
              <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="col-12 mb-3 signup_input_wraper">
              <input type="text" class="form-control" id="inputNumber" placeholder="Country">
            </div>
            <div class="col-12 mb-3 signup_input_wraper">
              <input type="text" class="form-control" id="inputNumber" placeholder="City">
            </div>
            <div class="col-12 mb-3 signup_input_wraper">
              <input type="text" class="form-control" id="inputNumber" placeholder="P/O Box">
            </div>
            <div class="col-12 mb-3 signup_input_wraper">
              <input type="password" class="form-control" id="inputNumber" placeholder="Password">
            </div>
            <div class="col-12 mb-3 signup_input_wraper">
              <input type="password" class="form-control" id="inputNumber" placeholder="Confirm Password">
            </div>
            <div class="col-12 mb-3 signup_input_wraper">
              <div class="d-grid gap-2 mt-3 mb-4">
                <button class="btn btn-secondary block get_appointment" type="button">SIGN UP
                </button>
              </div>
            </div>
          </form>
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
</section>
<?php include 'footersignup.php';?>   
