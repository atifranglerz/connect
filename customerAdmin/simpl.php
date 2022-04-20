
<?php include 'header.php';?> 
<div class="wrapper">
  <div class="container">
    <div class="chatMsg">
      <ul>
        <li>
          <div class="avatar">
            <img src="https://pickaface.net/gallery/avatar/20120828_115442_2229_tete.png" width="32" height="32" alt>
          </div>
          <div class="msg">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>                   </li>          
        </ul>
      </div>
      <div class="chatBox">
        <span class="mdi mdi-attachment"></span>
        <span class="mdi mdi-send disabled"></span>
        <textarea rows="1" placeholder="Write a response" id="msgTypeBox"></textarea>        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  
  $(".mdi-send").on("click", function() {
  var typeMsg = $("#msgTypeBox").val(); 
  if(typeMsg =="") {
    return false;    
  } else {     
    $(".chatMsg ul").append("<li><div class='avatar-reply'><img src='https://bootdey.com/img/Content/avatar/avatar6.png'></div><div class='msg-reply'>"+typeMsg+"</div></li>");
    $("#msgTypeBox").val("").css("height", "auto");
  }
});

$("#msgTypeBox").on("keyup", function() {
  if($(this).val() == "") {
    $(".mdi-send").addClass("disabled"); 
  } else {
    $(".mdi-send").removeClass("disabled");
  }    
});

var textarea = document.querySelector("#msgTypeBox");
textarea.addEventListener("keydown", autosize); 
function autosize() {
  var el = this;  
  setTimeout(function() {    
    el.style.cssText = "height:auto;";
    // for box-sizing other than "content-box" use:
    // el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = "height:" + el.scrollHeight + "px";     
  }, 0);
}
</script>
<?php include 'footer.php';?> 