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
		<h1>Register</h1><br>
			<form role="form">
				<div class="form-group">
					<label>Employee Name</label>
					<input type="text" id="txt_name" name="txt_name" class="form-control">
				</div>
				<div class="form-group">
					<label>Employee Code</label>
					<input type="text" id="txt_employee_code" name="txt_employee_code" class="form-control">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" id="txt_email" name="txt_email" class="form-control">
				</div>
				<div class="form-group">
					<label>Contact Number</label>
					<input type="number" id="txt_phone" name="txt_phone" class="form-control">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" id="txt_password" name="txt_password" class="form-control">
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" id="txt_cpassword" name="txt_cpassword" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" id="btn_submit" name="btn_submit" class="btn btn-default" />
				</div>
			</form>
		</div>
	</div>
</div>
<?php include_once("assets/includes/footer.inc"); ?>
<?php
if(isset($_GET['btn_submit']))
{
	if($_GET['txt_password'] == $_GET['txt_cpassword'])
	{
		//$query = "select * from login where email='".$_GET['txt_email'];
		//$result = mysqli_query($conn,$query);
		//$col = mysql_num_rows($result);
		//if($col >0)
		//{
			//echo"<script>alert('Email Exists..!!')</script>";
		//}
		//else
		//{
		$query = "INSERT INTO `login`(`employee_code`, `name`, `email`, `phone`, `password`) VALUES('".$_GET['txt_employee_code']."','".$_GET['txt_name']."','".$_GET['txt_email']."','".$_GET['txt_phone']."','".$_GET['txt_password']."')";
		$result = mysqli_query($conn,$query);
		echo"<script>alert('Registration Complete..!!')</script>";
		//}
	}
	else
	{
		echo"<script>alert('Password Mismatch..!!')</script>";
	}
}
?>