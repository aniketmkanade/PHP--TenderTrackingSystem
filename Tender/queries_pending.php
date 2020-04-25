<?php
include('connect.php'); 
include_once("assets/includes/header.inc");
//echo "<script>alert('".$_SESSION['username']."')</script>";?>
		<h1 align="center">Pending Queries</h1>
		<h3 align="right">
		<?php
		$result = (mysqli_query($conn,"SELECT count(query_master_id) as total FROM `query_master` where is_answered = 0"));
		while($r = mysqli_fetch_array($result))
		{
			echo "'".$r['total']."' Pending Queries...!!!&nbsp&nbsp&nbsp&nbsp";
		}
		?>
		</h3>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Pending Queries </h3>
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
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="js/gridData.js"></script>
    <script type="text/javascript">
        jQuery(function ($) {
                var traffic = [
	<?php
		$result = (mysqli_query($conn,"SELECT q.*,r.* FROM query_master q,reciever_master r where 
		r.reciever_master_id = q.question_by_id and q.is_answered = 0"));
		$rowcount= mysqli_num_rows($result);
		$counter=1;
		while($r = mysqli_fetch_array($result))
		{
			echo '
			{reciever_name:"'.$r['reciever_name'].'",
			email:"'.$r['email'].'",
			question:"'.$r['question'].'",
			question_date:"'.$r['question_date'].'",
			action:"<div class=\'row\' ng-app=\'\'><div class=\'col-lg-9\'><input type=\'text\' id=\'txt_'.$r['query_master_id'].'\' ng-model=\'name\' name=\'txt_'.$r["query_master_id"].'\' class=\'form-control\'></div><div class=\'col-lg-3\'><a href=\'?action=issue&id='.$r['query_master_id'].' \' class=\'btn btn-primary\'>Answer</a></div>';
			$id ="{{name}}";
			echo '</div>",
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
	{ field: "reciever_name",width: "40px", title: "reciever_name" },
	{ field: "email", width: "50px", title: "email" },
	{ field: "question", width: "75px", title: "question" },
	{ field: "question_date", width: "40px", title: "question_date" },
	{ field: "action",width: "145px", title: "Answer" }
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
		$rslt = (mysqli_query($conn,"SELECT * FROM `login` WHERE email = '".$_SESSION['username']."'"));
		$rc= mysqli_num_rows($rslt);
		if($rc > 0)
		{
			while($rw = mysqli_fetch_array($rslt))
			{
				$loginid = $rw['login_id'];
			}
		}
		
		$urlid = "txt_'".$_GET['id']."'";
		echo "<script>alert('".$urlid."')</script>";
		$dt = date("Y-m-d");
		$tm = date("h:i:sa");
			$query="UPDATE `query_master` SET 
			`is_answered`=1,
			`answer_by_id`='".$loginid."',
			`answer`='".$id."',
			`answer_time`='".$tm."',
			`answer_date`='".$dt."'
			WHERE `query_master_id`='".$_GET['id']."'";		
			if($result = (mysqli_query($conn,$query)))
			{
				echo"<script>alert('Answer Sent Successfully...!!! Please Refresh page..')</script>";
			}
			else
			{
				echo"<script>alert('Answer not sent...!!!')</script>";
			}
	}
}
?>