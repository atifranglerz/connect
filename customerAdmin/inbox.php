<?php include 'header.php';?> 
<section class="main_wraper d-flex">
	<div class="chat_overlay d-none"></div>
	<div class="side_inbox">
		<div class="side_inbox_search_sec text-center">
			<h3 class="inbox_nmae">Inbox</h3>
			<form >
				<div class="searchInput">
					<input class="form-control me-2" id="search_input"  placeholder="Search">
					<a href="#" type="submit"><img src="assets/images/searchicon.svg"></a>
				</div>
			</form>
		</div>
		<div class="main_contact mt-3">
			<a href="#">
				<div class="inbox_contact">
					<div class="contact_img">
						<img src="assets/images/repair2.jpg">
					</div>
					<div class="name_of_contact"><p class="mb-0">vendor name</p></div>
				</div>
			</a>
			<a href="#">
				<div class="inbox_contact">
					<div class="contact_img">
						<img src="assets/images/repair2.jpg">
					</div>
					<div class="name_of_contact"><p class="mb-0">Ali name</p></div>
				</div>
			</a>
			<a href="#">
				<div class="inbox_contact">
					<div class="contact_img">
						<img src="assets/images/repair2.jpg">
					</div>
					<div class="name_of_contact"><p class="mb-0">vendor name</p></div>
				</div>
			</a>
			<a href="#">
				<div class="inbox_contact">
					<div class="contact_img">
						<img src="assets/images/repair2.jpg">
					</div>
					<div class="name_of_contact"><p class="mb-0">Asif name</p></div>
				</div>
			</a>
			<a href="#">
				<div class="inbox_contact">
					<div class="contact_img">
						<img src="assets/images/repair2.jpg">
					</div>
					<div class="name_of_contact"><p class="mb-0">Noman name</p></div>
				</div>
			</a>
			<a href="#">
				<div class="inbox_contact">
					<div class="contact_img">
						<img src="assets/images/repair2.jpg">
					</div>
					<div class="name_of_contact"><p class="mb-0">Zain name</p></div>
				</div>
			</a>
			<a href="#">
				<div class="inbox_contact">
					<div class="contact_img">
						<img src="assets/images/repair2.jpg">
					</div>
					<div class="name_of_contact"><p class="mb-0">vendor name</p></div>
				</div>
			</a>
			<a href="#">
				<div class="inbox_contact">
					<div class="contact_img">
						<img src="assets/images/repair2.jpg">
					</div>
					<div class="name_of_contact"><p class="mb-0">vendor name</p></div>
				</div>
			</a>
		</div>
	</div>

	<div class="chat_section" style="background-image:url('assets/images/chat_bg.png')" >
		<div class="chat_top_name ">
			<div class="d-flex justify-content-between align-items-center">
				<a href="#">
					<div class="inbox_contact top_main">
						<div class="contact_img">
							<img src="assets/images/repair2.jpg">
						</div>
						<div class="name_of_contact">
							<p class="mb-0">vendor name</p>
							<p class="mb-0 status">online</p>
						</div>
					</div>
				</a>
				<div class="chat_toggle_button">
					<a href="#" id="chat_toggle"><i class="bi bi-three-dots-vertical"></i></a>
					<div class="submenue shadow " id="delet_message_toggle">
						<ul>
							<li><a href="#" id="MobileContactToggler">Delete All Messages</a></li>
							
						</ul>
					</div>
				</div>
				
			</div>
		</div>
		<div class="cahtting_messages">
			<div class="main_message">
				<div class="inbox_contact align-items-end top_main">
					<div class="contact_img">
						<img src="assets/images/repair2.jpg">
					</div>
					<div class="message_txt_wraper">
						<p class="mb-2">11:20 AM, Today</p>
						<p class="mb-0 message_txt">Sample text sample text Sample text sample text Sample text sample text Sample text sample text Sample text sample text</p>
					</div>
				</div>
			</div>

			<!-- <div class="main_message">
				<div class="inbox_contact align-items-end top_main">
					<div class="contact_img">
						<img src="assets/images/repair2.jpg">
					</div>
					<div class="message_txt_wraper">
						<p class="mb-2">11:20 AM, Today</p>
						<p class="mb-0 message_txt">Sample text sample text Sample text sample text Sample text sample text Sample text sample text Sample text sample text</p>
					</div>
				</div>
			</div>-->
		</div>
		<div class="sending_input_field">
			<form  method="post"  enctype="multipart/form-data" id="uploadForm">
				<div class="form-floating d-flex align-items-center form_sending_wraper">
					<textarea class="form-control enterKey" id="typeMsg" placeholder="Say Somthing" ></textarea>
					<a href="#" id="sendMsg"   disabled>send</a>
					<div class="file_input_messages">
						<input type="file" name="file" class="messages_file">
					</div>
				</div>
			</form>
		</div>
	</div>	
	
	
</section>

<?php include 'footer.php';?> 