<?php include 'header.php';?> 
<section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
  <div class="container-lg container-fluid" >
   <div class="row">
    <div class="col-lg-10  mx-auto">
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
          <h3 class=" text-center mb-5">ADD MORE FUNDS</h3>
          <p class="text-center">ADD FUNDS IF THE COST INCREASE TOTAL BUDGET OF THE ORDER</p>
        </div>
        <div class="vendor__rply__dttl">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="increase_budge">
                <div class="form-check form-check-inline custom_radio ">
                  <input class="form-check-input checkbook" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                  <label class="form-check-label" for="inlineRadio1">ADD FUNDS</label>
                </div>
                <div class="form-check form-check-inline custom_radio ">
                  <input class="form-check-input checkbook" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                  <label class="form-check-label" for="inlineRadio2">REFUND</label>
                </div>
                
              </div>
              
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
          <h3 class=" text-center mb-5">ADD MORE FUNDS</h3>
          <p class="text-center">ADD FUNDS IF THE COST INCREASE TOTAL BUDGET OF THE ORDER</p>
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
                </label> --> 
              </div>
              <div class="col-lg-12">
                <div class="row g-lg-3 g-2">
                 <div class="col-lg-6 col-md-6 col-sm-6">
                  <input type="text" class="form-control" placeholder="Work Days To Be Added">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <input type="text" class="form-control" placeholder="Amount To Be Added">
                </div>
                <div class="col-lg-12 col-md-12 mb-3">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Add information in details" id="floatingTextarea2" style="height: 110px"></textarea>
                    <label for="floatingTextarea2">Add Budget Increase Details</label>
                  </div>

                </div>
                <div class="col-lg-5 col-md-6 mx-auto">
                  <div class="d-grid gap-2 mt-3 mb-4">
                    <button class="btn btn-primary block get_appointment" type="button">SUBMIT REQUEST
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
