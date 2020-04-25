<?php include_once("assets/include/header.inc");
include('connect.php');?>
<?php
if(isset($_GET['btn_login']))
{
	if($_GET['txt_username'] != "" && $_GET['txt_password'] != "")
	{
		$query = "SELECT * FROM `reciever_master` WHERE email ='".$_GET['txt_username']."' and password ='".$_GET['txt_password']."'";
		
		if($result = mysqli_query($conn,$query))
		{
			$rowcount=mysqli_num_rows($result);
			if($rowcount > 0) 
			{
				while($r = mysqli_fetch_assoc($result))
				$uname = $r['email'];
				$pwd = $r['password'];
				$_SESSION['vendor_username'] = $uname;
				HEADER('location:profile.php');
			}
			else
			{
				echo "<script>alert('no username and password found')</script>";
			}
		}
		else
		{
			echo "<script>alert('Query Error')</script>";
		}
	}
	else
	{
		echo "<script>alert('Usename or Password Empty')</script>";
	}
}
?>
	<!--start wrapper-->
	<section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Log-In </h2>
                            <span class="sub_heading">TenderTracker Log-in</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<section class="content typography">
			<div class="container">
				<div class="row sub_content">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="dividerHeading">
							<h4><span></span></h4>

						</div>
					</div>
					<div class="mrgb-50 clearfix"></div>
					<div class="pricingBlock theme-color-pt">
						<!--  DARK-BLUE PRICE ITEM  -->
						<div class="col-lg-4 col-md-4 col-sm-4">
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<div class="pricingTable"><!-- BODY BOX-->
								<div class="pricingTable-header"><!-- HEADER BOX-->
									<span class="heading">Log-In</span>
									<span class="price-value">Enter Username and Password</span>
								</div><br><!--/ BODY BOX-->

								<div class="pricingContent">
									<form id="contactForm" action="" novalidate="novalidate">
										<div class="row">
											<div class="form-group">
												<div class="col-md-1"></div>
												<div class="col-md-10">
													<input type="text" id="txt_username" name="txt_username" class="form-control" maxlength="100" placeholder="Username">
												</div>
												<div class="col-md-1"></div>
											</div>
										</div><br>
										<div class="row">
											<div class="form-group">
												<div class="col-md-1"></div>
												<div class="col-md-10">
													<input type="password" id="txt_password" name="txt_password" class="form-control" maxlength="100" placeholder="Password">
												</div>
												<div class="col-md-1"></div>
											</div>
										</div><br>
								</div>
								<div class="pricingTable-sign-up"><!-- BUTTON BOX-->
									<div class="row">
										<div class="col-md-12">
											<input type="submit" name="btn_login" id="btn_login" class="btn btn-default btn-lg" value="Log-In">
										</div>
									</div>
								</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
						</div>
					</div>
				</div>

				<div class="row sub_content">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="dividerHeading">
							<h4><span></span></h4>
						</div>
					</div>
				</div>
			</div>
		</section>
	</section>
	<!--end wrapper-->
	<?php include_once("assets/include/footer.inc");?>