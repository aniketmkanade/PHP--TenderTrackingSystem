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
		<h1>Change Admin Password</h1><br>
			<form role="form" method="get" >
				<div class="form-group">
					<label>Current Password</label>
					<input type="password" id="txt_current_password" name="txt_current_password" class="form-control">
				</div>
				<div class="form-group">
					<label>Changed Password</label>
					<input type="password" id="txt_changed_password" name="txt_changed_password" class="form-control">
				</div>
				<div class="form-group">
					<label>Confirm Changed Password</label>
					<input type="password" id="txt_cchanged_password" name="txt_cchanged_password" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" value="save" id="btn_save" name="btn_save" class="btn btn-default" />
				</div>
			</form>
		</div>
		<div class="col-lg-3">
		</div>
	</div>
</div>
<?php include_once("assets/includes/footer.inc"); ?>
<?php
if(isset($_GET['btn_save']))
{
	if($_GET['txt_changed_password'] != "" && $_GET['txt_cchanged_password']!= "")
	{
		if($result = mysqli_query($conn,"SELECT * FROM `login` WHERE `is_superuser`=1"))
		{
			while($r = mysqli_fetch_assoc($result))
			{
				if($r['password'] == $_GET['txt_current_password'])
				{
					if($_GET['txt_changed_password'] == $_GET['txt_cchanged_password'])
					{
						$query = "UPDATE `login` SET `password`='".$_GET['txt_changed_password']."' WHERE `is_superuser`=1 ";
						if($result = mysqli_query($conn,$query))
						{
							echo"<script>alert('Password Changed Successfully...!!')</script>";
						}
						else
							echo"<script>alert('Password change not successful...!!')</script>";
					}
					else
						echo"<script>alert('Password Missmatch...!!')</script>";
				}
				else
					echo"<script>alert('Old Password Dont Match...!!')</script>";
			}
		}
	}
	else
			echo"<script>alert('Empty field found...!!')</script>";
}
?>