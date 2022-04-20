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
      <div class="col-lg-10 col-md-12 mx-auto">
        <form>
          <div class="row g-2">
            <div class="col-lg-5 col-md-5 col-sm-5">
              <div class=" billing_info">
                <h3>Billing Info</h3>
              </div>

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

            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 ">
              <div class="payment_divider">
              </div>

            </div>
            <div class="col-lg-5 col-md-5 col-sm-5">
              <div class=" billing_info">
                <h3>Payment Info</h3>
              </div>

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

            </div>
          </div>
          <div class="row mt-5">
            <div class="col-xl-8 col-lg-10 col-sm-10 mx-auto">
              <div class="row">
                <div class="col-lg-5 col-sm-5">
                  <a href="" class="btn text-center btn-secondary get_quot block get_appointment" type="button">CONFIRM ORDER</a>
                </div>
                <div class="col-lg-2 col-sm-2">
                  <div >
                    <h3 class="conform_order_H3 text-center">OR</h3>
                  </div>

                  
                </div>
                <div class="col-lg-5 col-sm-5">
                  <a href="insurancePayment.php" class="btn text-center btn-primary get_quot block get_appointment d-flex align-items-center justify-content-center" type="button">PAY VIA INSURANCE COMPANY</a>
                </div>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>

    <div class="row  mt-5">
      <div class="col-lg-8 mx-auto">
        <div></div>
        <!-- <div class="conform_btns d-flex  align-items-center justify-content-center">
          <div class="d-grid gap-2 ">
            <button class="btn text-center btn-secondary get_quot block get_appointment" type="button">CONFIRM ORDER
            </button>
          </div>
          <div >
            <h3 class="conform_order_H3">OR</h3>
          </div>
          <div class="d-grid gap-2 ">
            <a href="insurancePayment.php" class="btn text-center btn-primary get_quot block get_appointment d-flex align-items-center justify-content-between" type="button">PAY VIA INSURANCE COMPANY
            </a>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</section>
<?php include 'footer.php';?>       
