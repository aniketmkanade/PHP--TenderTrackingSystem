<?php include_once("assets/includes/header.inc");
include('connect.php');
?>
<!----------------------------------------------------- Page Wrapper Design-------------------------------------------->
<div id="page-wrapper">
	<div class="row">
	</div>
	<div class="row">
		<div class="col-lg-3">
		</div>
		<div class="col-lg-6">
		<h1>Recieve Courier</h1><br>
			<form role="form">				
				<div class="form-group">
					<label>Courier Name</label>
					<input type="text" id="txt_courier_name" name="txt_courier_name" class="form-control">
				</div>
				<div class="form-group">
					<label>Courier Mobile</label>
					<input type="text" id="txt_courier_mobile" name="txt_courier_mobile" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" value="Add New" id="btn_add_new" name="btn_add_new" class="btn btn-default" />
				</div>
			</form>
		</div>
		<div class="col-lg-3">
		</div>
	</div>
</div>
<?php include_once("assets/includes/footer.inc"); ?>
<?php
if(isset($_GET['btn_add_new']))
{
	$query2 = "INSERT INTO `courier` (`name_of_courier`, `mobile`) VALUES ('".$_GET['txt_courier_name']."','".$_GET['txt_courier_mobile']."')";
		if($result = mysqli_query($conn,$query2))
		{
		//echo"<script>alert('Courier Added in List..!! Refresh Page Once')</script>";
		HEADER("location:recievecourier.php");
		}
}
?>