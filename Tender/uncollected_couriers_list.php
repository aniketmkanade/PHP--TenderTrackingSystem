<?php
include('connect.php'); 
include_once("assets/includes/header.inc");
//echo "<script>alert('".$_SESSION['username']."')</script>";?>
		<h1 align="center">Uncollected Tender List</h1>
		<h3 align="right">
		<?php
		$result = (mysqli_query($conn,"SELECT count(courier_details_id) as total FROM `courier_details` where is_collected = 0"));
		while($r = mysqli_fetch_array($result))
		{
			echo "'".$r['total']."' Tenders Uncollected...!!!&nbsp&nbsp&nbsp&nbsp";
		}
		?>
		</h3>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Uncollected Tenders List </h3>
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
		$result = (mysqli_query($conn,"SELECT * FROM `courier_details` where is_collected = 0"));
		$rowcount= mysqli_num_rows($result);
		$counter=1;
		while($r = mysqli_fetch_array($result))
		{
			echo '
			{date:"'.$r['date'].'",
			time:"'.$r['time'].'",
			inward_document_no:"'.$r['inward_document_no'].'",
			doc:"'.$r['doc'].'",
			courier_type:"'.$r['courier_type'].'",
			priority:"'.$r['priority'].'",
			action:"<a href=\'?action=issue&id='.$r['courier_details_id'].' \' class=\'btn btn-warning\'> Collected</a>",
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
	{ field: "date",width: "40px", title: "Date" },
	{ field: "time", width: "40px", title: "Time" },
	{ field: "inward_document_no", width: "75px", title: "inward Doc No" },
	{ field: "doc", width: "50px", title: "Doc" },
	{ field: "courier_type", width: "50px", title: "Courier Type" },
	{ field: "priority", width: "40px", title: "Priority" },
	{ field: "action",width: "55px", title: "Collect Tenders" }
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
		$dt = date("Y-m-d");
		$tm = date("h:i:sa");
			$query="UPDATE `courier_details` SET 
			`is_collected`= 1,
			`is_collected_date`='".$dt."',
			is_collected_by_name ='".$_SESSION['username']."',
			`is_collected_time`='".$tm."' 
			WHERE `courier_details_id`='".$_GET['id']."'";		
			if($result = (mysqli_query($conn,$query)))
			{
				echo"<script>alert('Package Collected...!!! Please Refresh page..')</script>";
			}
			else
			{
				echo"<script>alert('Package not issued...!!!')</script>";
			}
	}
}
?>