<?php
include('connect.php'); 
include_once("assets/includes/header.inc");?>
		<h1 align="center">Dashboard</h1>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Monthwise Courier Report </h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid1"></div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Daily Courier Report </h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid2"></div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Priorities </h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid3"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-4">
                    <header>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#stats">Users</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#report">Favorites</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#dropdown1">Commenters</a>
                            </li>
                        </ul>
                    </header>
                    <div class="body tab-content">
                        <div class="tab-pane clearfix active" id="stats">
                            <h5 class="tab-header"><i class="fa fa-calendar-o fa-2x"></i> Last logged-in users</h5>
                            <ul class="news-list">
                                <li>
                                    <i class="fa fa-user fa-4x pull-left"></i>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Ivan Gorge</a></div>
                                        <div class="position">Software Engineer</div>
                                        <div class="time">Last logged-in: Mar 12, 11:11</div>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-user fa-4x pull-left"></i>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Roman Novak</a></div>
                                        <div class="position">Product Designer</div>
                                        <div class="time">Last logged-in: Mar 12, 19:02</div>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-user fa-4x pull-left"></i>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Teras Uotul</a></div>
                                        <div class="position">Chief Officer</div>
                                        <div class="time">Last logged-in: Jun 16, 2:34</div>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-user fa-4x pull-left"></i>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Deral Ferad</a></div>
                                        <div class="position">Financial Assistant</div>
                                        <div class="time">Last logged-in: Jun 18, 4:20</div>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-user fa-4x pull-left"></i>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Konrad Polerd</a></div>
                                        <div class="position">Sales Manager</div>
                                        <div class="time">Last logged-in: Jun 18, 5:13</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="report">
                            <h5 class="tab-header"><i class="fa fa-star fa-2x"></i> Popular contacts</h5>
                            <ul class="news-list news-list-no-hover">
                                <li>
                                    <i class="fa fa-user fa-4x pull-left"></i>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Pol Johnsson</a></div>
                                        <div class="options">
                                            <button class="btn btn-xs btn-success">
                                                <i class="fa fa-phone"></i>
                                                Call
                                            </button>
                                            <button class="btn btn-xs btn-warning">
                                                <i class="fa fa-envelope-o"></i>
                                                Message
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="dropdown1">
                            <h5 class="tab-header"><i class="fa fa-comments fa-2x"></i> Top Commenters</h5>
                            <ul class="news-list">
                                <li>
                                    <i class="fa fa-user fa-4x pull-left"></i>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Edin Garey</a></div>
                                        <div class="comment">
                                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur 
                                            aut odit aut fugit,sed quia
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-user fa-4x pull-left"></i>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Firel Lund</a></div>
                                        <div class="comment">
                                            Duis aute irure dolor in reprehenderit in voluptate velit
                                             esse cillum dolore eu fugiat.
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-user fa-4x pull-left"></i>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Jessica Desingter</a></div>
                                        <div class="comment">
                                            Excepteur sint occaecat cupidatat non proident, sunt in
                                             culpa qui officia deserunt.
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-user fa-4x pull-left"></i>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Novel Forel</a></div>
                                        <div class="comment">
                                            Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque.
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-user fa-4x pull-left"></i>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Wedol Reier</a></div>
                                        <div class="comment">
                                            Laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis
                                            et quasi.
                                        </div>
                                    </div>
                                </li>
                            </ul>
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
	//Month Calculation		
	$month = date("Y/m/d");
	$timestamp = strtotime ("-1 month",strtotime ($month));
	$lastMonth  =  date("Y/m/d",$timestamp);
	/*-------------------------------------------------Monthly Calculation--------------------------------------------------*/
	
	//Recieved/Alloted Couriers
	$total = 1;
	$query = "SELECT count(*) as total FROM `courier_details` WHERE `date`<='".date("Y/m/d")."' and `date`>'".$lastMonth."' and `is_recieved` = 1";
	if($result = mysqli_query($conn,$query))
	{
		if($r = mysqli_fetch_array($result))
		{
			$total = $r['total'];
		}
	}
	
	//Collected Couriers
	$total2 = 1;
	$query2 = "SELECT count(*) as total FROM `courier_details` WHERE `is_collected_date`<='".date("Y/m/d")."' and `is_collected_date`>'".$lastMonth."' and `is_recieved` = 1 and `is_collected` = 1";
	if($result2 = mysqli_query($conn,$query2))
	{
		if($r2 = mysqli_fetch_array($result2))
		{
			$total2 = $r2['total'];
		}
	}
	
	//Issued Couriers
	$total3 = 1;
	$query3 = "SELECT count(*) as total FROM `courier_details` WHERE `is_issued_date`<='".date("Y/m/d")."' and `is_issued_date`>'".$lastMonth."' and `is_recieved` = 1 and `is_collected` = 1 and `is_issued` = 1 ";
	if($result3 = mysqli_query($conn,$query3))
	{
		if($r3 = mysqli_fetch_array($result3))
		{
			$total3 = $r3['total'];
		}
	}
	/*---------------------------------------------------------------------------------------------------------------------*/
		echo '
		{Recieved:"'.$total.'",
		Collected:"'.$total2.'", 
		Issued:"'.$total3.'",
	}';
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
	{ field: "Recieved",width: "40px", title: "Recieved/Alloted" },
	{ field: "Collected", width: "40px", title: "Collected" },
	{ field: "Issued", width: "45px", title: "Issued" }
	]
});
});
</script>



<!-- /#wrapper -->
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="js/gridData.js"></script>
    <script type="text/javascript">
jQuery(function ($) {
		var traffic = [
<?php
	/*-------------------------------------------------Daily Calculation--------------------------------------------------*/
	//Recieved/Alloted Couriers
	$query = "SELECT count(*) as total FROM `courier_details` WHERE `date`='".date("Y/m/d")."' and `is_recieved` = 1";
	if($result = mysqli_query($conn,$query))
	{
		if($r = mysqli_fetch_array($result))
		{
			$total = $r['total'];
		}
	}
	
	//Collected Couriers
	$query2 = "SELECT count(*) as total FROM `courier_details` WHERE `date`='".date("Y/m/d")."' and `is_recieved` = 1 and `is_collected` = 1";
	if($result2 = mysqli_query($conn,$query2))
	{
		if($r2 = mysqli_fetch_array($result2))
		{
			$total2 = $r2['total'];
		}
	}
	
	//Issued Couriers
	$query3 = "SELECT count(*) as total FROM `courier_details` WHERE `date`='".date("Y/m/d")."' and `is_recieved` = 1 and `is_collected` = 1 and `is_issued` = 1 ";
	if($result3 = mysqli_query($conn,$query3))
	{
		if($r3 = mysqli_fetch_array($result3))
		{
			$total3 = $r3['total'];
		}
	}
	/*---------------------------------------------------------------------------------------------------------------------*/
		echo '
		{Recieved:"'.$total.'",
		Collected:"'.$total2.'", 
		Issued:"'.$total3.'",
	}';
?>
	];
$("#shieldui-grid2").shieldGrid({
	dataSource: {
		data: traffic
	},
	sorting: {
		multiple: true
	},
	rowHover: true,
	paging: false,
	columns: [
	{ field: "Recieved",width: "40px", title: "Recieved/Alloted" },
	{ field: "Collected", width: "40px", title: "Collected" },
	{ field: "Issued", width: "45px", title: "Issued" }
	]
});
});
</script>



<!-- /#wrapper -->
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="js/gridData.js"></script>
    <script type="text/javascript">
jQuery(function ($) {
		var traffic = [
<?php
	/*-------------------------------------------------Priorities--------------------------------------------------*/
	//Recieved/Alloted Couriers
	$query = "SELECT count(*) as total FROM `courier_details` WHERE `date`='".date("Y/m/d")."' and `priority` = High";
	if($result = mysqli_query($conn,$query))
	{
		if($r = mysqli_fetch_array($result))
		{
			$total = $r['total'];
		}
	}
	
	//Collected Couriers
	$query2 = "SELECT count(*) as total FROM `courier_details` WHERE `date`='".date("Y/m/d")."' and `priority` = Medium";
	if($result2 = mysqli_query($conn,$query2))
	{
		if($r2 = mysqli_fetch_array($result2))
		{
			$total2 = $r2['total'];
		}
	}
	
	//Issued Couriers
	$query3 = "SELECT count(*) as total FROM `courier_details` WHERE `date`='".date("Y/m/d")."' and `priority` = Low";
	if($result3 = mysqli_query($conn,$query3))
	{
		if($r3 = mysqli_fetch_array($result3))
		{
			$total3 = $r3['total'];
		}
	}
	/*---------------------------------------------------------------------------------------------------------------------*/
		echo '
		{High:"'.$total.'",
		Medium:"'.$total2.'", 
		Low:"'.$total3.'",
	}';
?>
	];
$("#shieldui-grid3").shieldGrid({
	dataSource: {
		data: traffic
	},
	sorting: {
		multiple: true
	},
	rowHover: true,
	paging: false,
	columns: [
	{ field: "High",width: "40px", title: "High" },
	{ field: "Medium", width: "40px", title: "Medium" },
	{ field: "Low", width: "45px", title: "Low" }
	]
});
});
</script>
<?php include_once("assets/includes/footer.inc"); ?>