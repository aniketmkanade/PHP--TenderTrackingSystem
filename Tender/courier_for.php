<?php include_once("assets/includes/header.inc");
include('connect.php');
/* ---------------------------------------------Update Process----------------------------------------------------*/
if(isset($_REQUEST['action']))
{
	if($_REQUEST['action'] == 'edit')
	{
		if(isset($_REQUEST['btn_submit']))
		{
			$query="UPDATE `reciever_master` SET `reciever_name`='".$_GET['txt_name']."',`phone`='".$_GET['txt_phone']."',`email`='".$_GET['txt_email']."',`password`='".$_GET['txt_pass']."' WHERE `reciever_master_id`=".$_REQUEST['id'];
					
			if($result = (mysqli_query($conn,$query)))
			{
				echo"<script>alert('Updation Done...!!!')</script>";
			}
			else
			{
				echo"<script>alert('Query not fired...!!!')</script>";
			}
		}
	}
}
/* ---------------------------------------------Insert Process----------------------------------------------------*/
if(isset($_REQUEST['btn_submit']))
{
	$query="INSERT INTO `reciever_master`(`reciever_name`, `phone`, `email`, `password`) VALUES ('".$_GET['txt_name']."','".$_GET['txt_phone']."','".$_GET['txt_email']."','".$_GET['txt_pass']."')";
	//echo $query;
	if($result = mysqli_query($conn,$query))
	{
		echo"<script>alert('Insertion Done...!!!')</script>";
	}
	else
	{
		echo"<script>alert('Query not fired...!!!')</script>";
	}
}
/* ---------------------------------------------Deletion Process----------------------------------------------------*/
if(isset($_REQUEST['action']))
{
	if($_REQUEST['action'] == 'delete')
	{
		$query="DELETE FROM `reciever_master` WHERE `reciever_master_id`=".$_REQUEST['id'];
		if($result = (mysqli_query($conn,$query)))
		{
			echo"<script>alert('Deletion Successful...!!!')</script>";
		}
		else
		{
			echo"<script>alert('Deletion Not Successful...!!!')</script>";
		}
	}
}
?>
<!------------------------------------------ Page Wrapper Design ------------------------------------------------->
	<div id="page-wrapper">
            <div class="row">
				<div class="col-lg-3">
				</div>
                <div class="col-lg-6">
				<h1>Add Vendors</h1><br>
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
							<label>Password </label>
							<input type="text" id="txt_pass" name="txt_pass" class="form-control">
						</div>
						<input type="submit" id="btn_submit" name="btn_submit" class="btn btn-default"/>
                        <input type="reset" id="btn_reset" name="btn_reset" class="btn btn-default" />
					</form>
					<br/>
					<hr/>
					<br/>
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Tender For List :</h3>
								</div>
								<div id="txt_level_list" class="panel-body">
									<div id="shieldui-grid1"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
				</div>
            </div>
        </div>
<?php include_once("assets/includes/footer.inc"); ?>	
<!-------------------------------------------- JavaScript Code -------------------------------------------------------->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/shieldui-all.min.js"></script>
<script type="text/javascript" src="js/gridData.js"></script>
<script type="text/javascript">
jQuery(function ($) {
var traffic = [
	<?php
		$result = (mysqli_query($conn,"SELECT * FROM `reciever_master`"));
		$rowcount= mysqli_num_rows($result);
		$counter=1;
		while($r = mysqli_fetch_array($result))
		{
			echo '
			{reciever_name:"'.$r['reciever_name'].'",
			phone:"'.$r['phone'].'",
			email:"'.$r['email'].'",
			password:"'.$r['password'].'",
			action:"</a>&nbsp;<a href=\'?action=delete&id='.$r['reciever_master_id'].' \' class=\'btn btn-danger\'><i class=\'fa fa-trash\'></i></a>",}';
			
			$counter++;
			if($rowcount>=$counter)
				echo ',';
		}
	?>
	
	];
$("#shieldui-grid1").shieldGrid({
	dataSource: {
		data: traffic
	},
	sorting: {
		multiple: true
	},
	rowHover: true,
	paging: false,
	columns: [
	{ field: "reciever_name",width: "40px", title: "Vendor name" },
	{ field: "phone", width: "40px", title: "phone" },
	{ field: "email", width: "50px", title: "email" },
	{ field: "password", width: "40px", title: "password" },
	{ field: "action", width: "35px", title: "action" }
	]
});
});          
</script>