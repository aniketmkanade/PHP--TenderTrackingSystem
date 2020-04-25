<?php
include('connect.php'); 
include_once("assets/includes/header.inc");
//echo "<script>alert('".$_SESSION['username']."')</script>";?>
		<h1 align="center">Feedback List</h1>
		<h3 align="right">
		<?php
		$result = (mysqli_query($conn,"SELECT count(feedback_master_id) as total FROM `feedback_master`"));
		while($r = mysqli_fetch_array($result))
		{
			echo "'".$r['total']."' Feedbacks...!!!&nbsp&nbsp&nbsp&nbsp";
		}
		?>
		</h3>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Feedback List </h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="js/gridData.js"></script>
    <script type="text/javascript">
        jQuery(function ($) {
                var traffic = [
	<?php
		$result = (mysqli_query($conn,"SELECT * FROM `feedback_master`"));
		$rowcount= mysqli_num_rows($result);
		$counter=1;
		while($r = mysqli_fetch_array($result))
		{
			echo '
			{feedback_name:"'.$r['feedback_name'].'",
			feedback_email:"'.$r['feedback_email'].'",
			feedback_subject:"'.$r['feedback_subject'].'",
			feedback_message:"'.$r['feedback_message'].'",
			action:"<a href=\'?action=issue&id='.$r['feedback_master_id'].' \' class=\'btn btn-danger\'> Delete</a>",
			}';
			
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
	{ field: "feedback_name",width: "40px", title: "Name" },
	{ field: "feedback_email", width: "55px", title: "Email" },
	{ field: "feedback_subject", width: "75px", title: "Subject" },
	{ field: "feedback_message", width: "145px", title: "Message" },
	{ field: "action",width: "35px", title: "Delete" }
	]
});
});      
    </script>
<?php include_once("assets/includes/footer.inc"); ?>
<?php
if(isset($_REQUEST['action']))
{
	if($_REQUEST['action'] == 'issue')
	{
		$query="DELETE FROM `feedback_master` 
		WHERE `feedback_master_id`='".$_GET['id']."'";		
		if($result = (mysqli_query($conn,$query)))
		{
			echo"<script>alert('Feedback Deleted...!!! Please Refresh page..')</script>";
		}
		else
		{
			echo"<script>alert('Feedback not Deleted...!!!')</script>";
		}
	}
}
?>