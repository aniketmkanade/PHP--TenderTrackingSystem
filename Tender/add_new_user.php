<?php include_once("assets/includes/header.inc");
include('connect.php');
/* ---------------------------------------------Insert Process----------------------------------------------------*/
if(isset($_REQUEST['btn_submit']))
{
	$query="INSERT INTO `reciever_master`(`reciever_name`, `phone`, `email`, `ext`) VALUES ('".$_GET['txt_name']."','".$_GET['txt_phone']."','".$_GET['txt_email']."','".$_GET['txt_ext']."')";
	//echo $query;
	if($result = mysqli_query($conn,$query))
	{
		HEADER("location:recievecourier.php");
	}
	else
	{
		echo"<script>alert('Query not fired...!!!')</script>";
	}
}
?>
<!------------------------------------------ Page Wrapper Design ------------------------------------------------->
	<div id="page-wrapper">
            <div class="row">
				<div class="col-lg-3">
				</div>
                <div class="col-lg-6">
				<h1>Courier For</h1><br>
                    <form role="form" method="get">
						<div class="form-group">
							<label>Name</label>
							<input type="text" id="txt_name" name="txt_name" class="form-control">
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" id="txt_phone" name="txt_phone" class="form-control">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" id="txt_email" name="txt_email" class="form-control">
						</div>
						<div class="form-group">
							<label>Ext</label>
							<input type="text" id="txt_ext" name="txt_ext" class="form-control">
						</div>
						<input type="submit" id="btn_submit" name="btn_submit" class="btn btn-default"/>
                        <input type="reset" id="btn_reset" name="btn_reset" class="btn btn-default" />
					</form>
				</div>
				<div class="col-lg-3">
				</div>
            </div>
        </div>
<?php include_once("assets/includes/footer.inc");?>