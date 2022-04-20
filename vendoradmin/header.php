<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- custome css -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css ">
  <link rel="stylesheet" type="text/css" href="assets/css/newstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/OwlCarousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/OwlCarousel/dist/assets/owl.theme.default.min.css">
  <link rel="stylesheet" type="text/css" href="assets/image-uploader/dist/image-uploader.min.css">
  <title>Vendor Pannel</title>
  <style>
/* width */
.login_sinup>.accoutntData>.notification_tooltip>ul.notification_list::-webkit-scrollbar,.form_sending_wraper>textarea::-webkit-scrollbar,ul.sidebar_navcigation::-webkit-scrollbar {
  display: none;
}

/* Track */
/*.login_sinup>.accoutntData>.notification_tooltip>ul.notification_list::-webkit-scrollbar-track {
  background: #f1f1f1; 
}*/
 
/* Handle */
/*.login_sinup>.accoutntData>.notification_tooltip>ul.notification_list::-webkit-scrollbar-thumb {
  background: #888; 
}*/

/* Handle on hover */
/*.login_sinup>.accoutntData>.notification_tooltip>ul.notification_list::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
*/
</style>
  <style >
    .form-check-input:checked {
      background-color: var(--orange);
      border-color: var(--orang-mask);
    }.form-check-input:focus {
      box-shadow: 0 0 0 0.25rem var(--orang-mask);
    }
    .form-switch .form-check-input:checked{
      background-image: url(assets/images/toggler.svg);
    }
    .form-switch .form-check-input:focus {
      background-image: url(assets/images/toggler.svg);
    }
    .form-check-input:focus {
      border-color: var(--orange);
    }
    .form-switch .form-check-input{
      background-image: url(assets/images/orangesvg.svg);
    } 
    .form-switch.toggler_switch{
      padding-left: 7.5em;
    }
    .lang_toggler>label{
      color: var(--orange);
    }
    .lang_toggler>label.arabi{
      position: absolute;
      left: 26px;

    }
    .lang_toggler>label.english{
      position: absolute;
      right: 26px;
    }
    @media (max-width: 575px) {
      .form-switch.toggler_switch {
    padding-left: 7.5em;
  }
  .form-switch .form-check-input {
    width: 2em;
  }
  .lang_toggler>label.arabi {
    left: 45px;
}
.lang_toggler>label.english {
    right: 35px;
}



}
@media (min-width: 992px) and (max-width: 1024px){
  .form-switch.toggler_switch {
        padding-left: 5.5em;
    }
}

  </style>
</head>

<body>
  <div class="main ">
    <div class="over_lay d-none" id="sideNavOverlay"></div>
    <div id="dashboardSidebar">
      <div class="main_profile_img_name">
      <div class="customer_dashboard_img_wraper">
        <img src="assets/images/repair3.jpg">
      </div>
      <div class="name_of_person mx-auto text-center">
        <h3>Hi, Ali</h3>
      </div>
      </div>
      
      <div class="sidebar_navigation">
        <ul class="sidebar_navcigation">
          <li>
            <a href="index.php"><img src="assets/images/dashomeicon.svg"> <span>Home</span></a>
          </li>
          <li>
            <a href="inbox.php"><img src="assets/images/dashinboxicon.svg"><span>Inbox</span></a>
          </li>
          <li>
            <a href="activequotes.php"><img src="assets/images/dashhearticon.svg"><span>Active Quotes</span></a>
          </li>
          <li>
            <a href="activeOrders.php"><img src="assets/images/dashallqouticon.svg"><span>Active Orders</span></a>
          </li>
          <li>
            <a href="editWorkshop.php"><img src="assets/images/dashpaymenticon.svg"><span>Edit Workshop</span></a>
          </li>
          <li>
            <a href="postAd.php"><img src="assets/images/dashsellcaricon.svg"><span>Sell Your Car</span></a>
          </li>
          
        </ul>
      </div>
      <div class="soignou_plus_language_wraper">
        <button class="btn ">SignOut</button>
        <div class="form-check form-switch toggler_switch lang_toggler mt-1 mt-lg-3">
          <label class="form-check-label arabi" for="flexSwitchCheckDefault">Arabic</label>
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
          <label class="form-check-label english" for="flexSwitchCheckDefault">English</label>
        </div>
      </div>
    </div>
    <div class="right_main" id="dashboardSidebarRightContent">
      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-custom-orange ">
          <div class="container-lg container-fluid">
            <a href="#" class="sidebqar_toggler navbar-toggler d-block me-2" type="button"  id="menuToggle">
              <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=" fa-solid fa-bars"></span>
            </button> -->

              <span class=" fa-solid fa-bars"></span>
            </a>
            <a class="navbar-brand" href="index.php">
              <div class="logo_wraper">
                <img src="assets/images/logo.jpg">
              </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=" fa-solid fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="d-flex  customer_heading_main">
                <div class="costumer_heading">
                  <h3 class="mb-0">Garage Dashboard</h3>
                </div> 
              </div>
              <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item">
                  <a class="nav-link active " aria-current="page" href="index.php">Home</a>
                </li>-->
                <li class="nav-item">
                  <a class="nav-link " href="myAdds.php">My Listing</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="activebid.php">My Bids</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="allOrder.php">Orders</a>
                </li>
              </ul>
              <div class="login_sinup">
                <div class="accoutntData">
                  <a href="inbox.php" ><i class="fa-solid fa-message"></i></a>
                </div>
                <div class="accoutntData">
                  <a href="#" class="notify-btn" ><i class="fa-solid fa-bell"></i></a>
                  <div class="notification_tooltip " id="notification_tolltip">
                    <ul class="notification_list shadow">
                      <li><a href="#">Your Received a message from Ali</a> <a href="#"><i class="bi bi-plus"></i></a>
                      </li>
                      <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                      </li>
                      <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                      </li>
                      <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                      </li>
                      <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                      </li>
                      <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                      </li>
                      <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                      </li>
                      <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                      </li>
                   
                    </ul>
                  </div>
                </div>
                <div class="accoutntData">
                  <a href="#" id="Logout_Profile"><i class="fa-solid fa-user"></i></a>
                  <div class="notification_tooltip  " id="TopProfile">
                    <ul class="notification_list shadow">
                      <li><a href="profile.php">Profile</a> 
                      </li>
                      <li><a href="#">Logout</a>
                      </li>
                                         
                    </ul>
                  </div>

                </div>
                
                
                
              </div> 

            </div>
          </div>
        </nav>
      </header>