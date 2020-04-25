<?php include_once("assets/includes/header.inc");
include('connect.php');
/* ---------------------------------------------Insert Process----------------------------------------------------*/
if(isset($_REQUEST['btn_submit']))
{
	$query="INSERT INTO `courier`(`name_of_courier`, `courier_info`) VALUES ('".$_GET['txt_courier_name']."','".$_GET['txt_courier_info']."')";
	//echo $query;
	if($result = mysqli_query($conn,$query))
	{
		echo"<script>alert('Tender added...!!!')</script>";
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
		$query="DELETE FROM `courier` WHERE `courier_id` =".$_REQUEST['id'];
		if($result = (mysqli_query($conn,$query)))
		{
			echo"<script>alert('Tender Deletion Successful...!!!')</script>";
		}
		else
		{
			echo"<script>alert('Tender Deletion Not Successful...!!!')</script>";
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
				<h1>Add Tender</h1><br>
                    <form role="form" method="get">
						<div class="form-group">
							<label>Tender Name</label>
							<input type="text" id="txt_courier_name" name="txt_courier_name" class="form-control">
						</div>
						<div class="form-group">
							<label>Tender Information</label><?php //Add TextArea Here instead text type  ?>
							<input type="text" id="txt_courier_info" name="txt_courier_info" class="form-control">
						</div>
						<div class="form-group">
							<label>Status&nbsp </label><br>
							<label class="radio-inline">
								<input type="radio" id="is_active" name="is_active" checked value="1">Enable</input>
							</label>
							<label class="radio-inline">
								<input type="radio" id="is_active" name="is_active" value="0">Disable</input>
							</label>
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
									<h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Tender List :</h3>
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
		$result = (mysqli_query($conn,"SELECT * FROM `courier`"));
		$rowcount= mysqli_num_rows($result);
		$counter=1;
		while($r = mysqli_fetch_array($result))
		{
			echo '
			{name_of_courier:"'.$r['name_of_courier'].'",
			courier_info:"'.$r['courier_info'].'",
			action:"<a href=\'?action=delete&id='.$r['courier_id'].' \' class=\'btn btn-danger\'><i class=\'fa fa-trash\'></i></a>",}';
			
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
	{ field: "name_of_courier",width: "40px", title: "Tender Name" },
	{ field: "courier_info", width: "40px", title: "Tender info" },
	{ field: "action", width: "45px", title: "action" }
	]
});
});          
</script>