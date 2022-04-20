<?php include 'header.php';?> 
<section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
  <div class="container-lg container-fluid" >
   <div class="row">
    <div class="col-lg-10 mx-auto">
      <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
        <h1 class="sec_main_heading text-center mb-0"> ACTIVE ORDER</h1>
        <!-- <p class="sec_main_para text-center">See what are the active orders you have</p> -->
      </div>
    </div>
  </div>
  <div class="row g-2">
    <div class="col-lg-5 col-md-12 col-sm-12 col-11  mx-auto">
      <div class="all_quote_card replies_allquot ">
        <div class=" w-100  quote_detail_wraper replies ">
          <div class="quote_info">
            <h3 class="d-flex align-items-center active_quote nowrape ">Cultus Repairs</h3>
            <p class="mb-0">M . Usman</p>

            <p class="mb-0" >0987654321778</p>
            <p class="milage" >Mileage  <span>37000km</span></p>
          </div>
          <div class="quote_detail_btn_wraper replies">
            <h3 class="vendor_order_id">Order Id: #0-9876598765</h3>
            <div class="d-flex chat_view__detail qoute_replies vendor_order ">
              <h3 class="">7 Days</h3>
              <a href="#" class="chat_icon">
                <i class="fa-solid fa-message"></i>
                <!-- <img src="assets/images/meassageiconblk.svg"> -->
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-11  mx-auto">
      <div class="all_quote_card replies_allquot h-100 ">
        <div class=" w-100  quote_detail_wraper replies ">
          <div class="quote_info">
            <h3 class="d-flex align-items-center active_quote nowrape  ">Suzuki Alto</h3>
            <p class="mb-0">2017</p>
            <p class="mb-0" >Suzuki</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-11  mx-auto">
      <div class="all_quote_card  replies_allquot h-100">
        <div class=" w-100  quote_detail_wraper replies payviainsu">
          <div class="quote_detail_btn_wraper">
            <div class="d-flex align-items-center chat_view__detail allreplies ">
              <div class="pay_via_insurance_header_garages">
                <p>Payed Via Insurance</p>
                <i class="bi bi-star-fill"></i>
              </div>
            </div>
          </div>
          <div class="quote_info">
            <h3 class="d-flex align-items-center active_quote nowrape"> Budget</h3>
            <div class="quote_detail_btn_wraper">
              <h3 class="quotereplies">AED 1200</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <div class="row  mt-5">
    <div class="col-lg-12">

      <div class="all_quote_card  vendor_rply_dtlL _text">
        <div class="over_view_part carad_data vendor_detail">
          <h3 class=" text-center mb-5">FINAL INVOICE</h3>
        </div>
        <div class="vendor__rply__dttl">
          <form>
           <div class="row g-lg-3 g-2">
            <div class="col-lg-12 mb-3">
              <div class="Upload_final_report"></div>
              <!-- <label class="img_wraper_label">
                <div class="file_icon_wraper">
                  <img src="assets/images/fileuploadicon.svg">
                </div>
                <p class="mb-0">Upload Final Report</p>
                <input type="file" size="60" >
              </label>  -->
            </div>
            <div class="row g-lg-3 g-2">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <input type="text" class="form-control" placeholder="Labor Hours Charges">
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <input type="text" class="form-control" placeholder="Spare Parts Charges">
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <input type="text" class="form-control" placeholder="Other Charges">
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <input type="email" class="form-control" placeholder="VAT" >
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <input type="email" class="form-control" placeholder="Total Charges" >
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-7 mx-auto">
                  <div class="d-grid gap-2 mt-3 mb-4">
                    <button class="btn btn-primary block get_appointment" type="button">SEND AND  UPLOAD FINAl INVOICE
                    </button>
                  </div>
                </div>
                
              </div>
              
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>


</div>
</section>
<?php include 'footer.php';?>       
