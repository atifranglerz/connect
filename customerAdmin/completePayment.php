<?php include 'header.php';?> 
<section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
  <div class="container-lg container-fluid" >
    <div class="row">
      <div class="col-lg-10  mx-auto">
        <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
          <h1 class="sec_main_heading text-center mb-0">SELF PAYMENTS</h1>
          <p class="sec_main_para text-center">Choose and add your payment details below</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-10 col-md-11 col-sm-11 mx-auto">
        <div class="row g-2">
          <div class="col-lg-5 col-md-5 col-sm-5">
            <div class=" billing_info">
              <h3>Billing Info</h3>
            </div>
            <form>
              <div class="inpu_wraper mb-3">
                <input type="text" class="form-control" placeholder="Name" >
              </div>
              <div class="inpu_wraper mb-3">
                <input type="text" class="form-control" placeholder="Address" >
              </div>
              <div class="inpu_wraper mb-3">
                <input type="text" class="form-control" placeholder="Postal Code" >
              </div>
              <div class="inpu_wraper mb-3">
                <input type="text" class="form-control" placeholder="City">
              </div>
            </form>
          </div>
          <div class="col-lg-2 col-md-2  col-sm-2">
            <div class="payment_divider">
            </div>
            
          </div>
          <div class="col-lg-5 col-md-5 col-sm-5">
            <div class=" billing_info">
              <h3>Payment Info</h3>
            </div>
            <form>
              <div class="inpu_wraper mb-3">
                <input type="text" class="form-control" placeholder="Card Number" aria-label="Make">
              </div>
              <div class="inpu_wraper mb-3">
                <input type="text" class="form-control" placeholder="Cardholder Name" aria-label="Make">
              </div>
              <div class="inpu_wraper mb-3">
                <input type="text" class="form-control" placeholder="Expiry Date" aria-label="Make">
              </div>
              <div class="inpu_wraper mb-3">
                <input type="text" class="form-control" placeholder="CVV" aria-label="Make">
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>

    <div class="row  mt-5">
      <div class="col-lg-12">
        <div class="conform_btns d-flex justify-content-center align-items-center flex-column">
          <div class="d-grid gap-2 ">
            <a href="leaveReview.php" class="btn text-center btn-secondary get_quot block get_appointment" type="button">COMPLETE PAYMENT
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'footer.php';?>       
