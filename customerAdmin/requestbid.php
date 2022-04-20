  <?php include 'header.php';?> 
  <section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
    <div class="container" >
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
            <h1 class="sec_main_heading text-center mb-3">REQUEST QUOTE</h1>
            <!-- <p class="sec_main_para text-center">See what's happening on your profile</p> -->
          </div>
        </div>
      </div>

      <div class="row ">
        <div class="col-lg-8 col-md-11  mx-auto">
          <div class="bid_form_wraper">
            <div class="row">
              <div class="col-lg-8 mx-auto px-5 px-lg-1 ">
                <div  class="divider_top_request_quote" >
                  <span class="highlight"></span>
                  <span></span>
                  <span class="last"><span></span></span>
                </div>
              </div>
              <div class="col-lg-9 mx-auto">
                <p class=" request_quote_heading">CAR INFORMATION</p>
              </div>
            </div>
            <form>
              <div class="row g-lg-3 g-2">
                <div class="col-lg-6">
                 <select class="form-select" aria-label="Model">
                  <option selected>Model</option>
                  <option value="1">2019</option>
                  <option value="2">2020</option>
                  <option value="3">2021</option>
                </select>
              </div>
              <div class="col-lg-6">
                <input type="text" class="form-control" placeholder="Make" aria-label="Make">
              </div>
              <div class="col-lg-6">
                <input type="text" class="form-control" placeholder="Year" aria-label="Year">
              </div>
              <div class="col-lg-6">
               <select class="form-select" aria-label="Type of Service">
                <option selected>Type of Service</option>
                <option value="1">2019</option>
                <option value="2">2020</option>
                <option value="3">2021</option>
              </select>
            </div>
            <div class="col-lg-6">
              <input type="text" class="form-control" placeholder="Timeline For Work" aria-label="Timeline For Work">
            </div>
            <div class="col-lg-6">
              <input type="text" class="form-control" placeholder="Car Milage" aria-label="Car Milage">
            </div>
            <div class="col-lg-12">
              <div class="d-grid gap-2 mt-3 mb-4">
                <button class="btn btn-secondary block get_appointment" type="button">NEXT
                </button>
              </div>
              
            </div>
          </div>
        </form>
      </div>

    </div>
        <!-- <div class="col-lg-10 col-md-11   mx-auto">
          <div class="quote_card_heading mb-lg-4 mb-2 mt-lg-5 mt-3">
            <h3>All Orders</h3>
            <a href="#">View All</a>
          </div>
          <div class="all_quote_card">
            <div class="quote_info">
              <h3>Car Repair</h3>
              <p >Red Suzuki For Repair</p>
              <p class="quote_rev">Order ID:<span> #12345678 </span></p>
            </div>
            <div class="quote_detail_btn_wraper">
              <a href="#" class="btn-secondary">VIEW DETAILS</a>
              
            </div>

          </div>
        </div> -->

      </div>
    </div>
  </section>
  <?php include 'footer.php';?>  