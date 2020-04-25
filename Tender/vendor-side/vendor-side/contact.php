<?php include_once("assets/include/header.inc");
include('connect.php');?>	
	<!--start wrapper-->
	<section class="wrapper">
		<section class="page_head">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Feedback</h2>
                            <span class="sub_heading">We are here for you 24/7</span>
                        </div>
					</div>
				</div>
			</div>
		</section>

		<section class="content contact">
			<div class="container">
				<div class="row sub_content">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="dividerHeading">
							<h4><span>Get in Touch</span></h4>
						</div>
						<p>For Feedback...</p>
						<form id="contactForm" method="get" action="#" novalidate="novalidate">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 ">
                                        <input type="text" id="txt_name" name="txt_name" required class="form-control" maxlength="100" data-msg-required="Please enter your name." placeholder="Your Name" >
                                    </div>
                                    <div class="col-lg-6 ">
                                        <input type="email" id="txt_email" name="txt_email" required class="form-control" maxlength="100" data-msg-email="Please enter a valid email address." data-msg-required="Please enter your email address." placeholder="Your E-mail" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" id="txt_subject" name="txt_subject" required class="form-control" maxlength="100" data-msg-required="Please enter the subject." value="" placeholder="Subject">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea id="txt_message" class="form-control" name="txt_message" rows="10" cols="50" data-msg-required="Please enter your message." maxlength="5000" placeholder="Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" id="btn_send" name="btn_send" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Send Message">
                                </div>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</section>
	<!--end wrapper-->
<?php include_once("assets/include/footer.inc");?>
<?php
if(isset($_REQUEST['btn_send']))
{
	$query="INSERT INTO `feedback_master`(`feedback_name`, `feedback_email`, `feedback_subject`, `feedback_message`) VALUES ('".$_REQUEST['txt_name']."','".$_REQUEST['txt_email']."','".$_REQUEST['txt_subject']."','".$_REQUEST['txt_message']."')";
	if($result = mysqli_query($conn,$query))
	{
		echo "<script>alert('Message Sent Successfully...')</script>";
	}
	else
	{
		echo "<script>alert('Message not sent. Please try after sometime...')</script>";
	}
}
?>