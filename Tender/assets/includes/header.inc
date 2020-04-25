<?php 
	if(!session_start())
    {
        session_start();
    }
	if(isset($_GET['logout']))
		{
			SESSION_DESTROY();
			echo "<script>location='index.php'</script>";
		}
	if(!isset($_SESSION['username']))
	{
		echo "<script>location='index.php'</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracker</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="css/dark-bootstrap/all.min.css" />
</head>
<body>
<form >
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar">ss</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
					<li class="user-view">
						<a href="#"> 
							<h4> Menu </h4>
						</a>
					</li>
					<li><a href="dashboard.php"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
					<?php
					if($_SESSION['is_superuser'] == 1)
					{
					?>
						<li><a href="uncollected_couriers_list.php"><i class="glyphicon glyphicon-th-list"></i> Uncollected Tenders</a></li>
						<li><a href="unissued_couriers_list.php"><i class="glyphicon glyphicon-th-list"></i> UnIssued Tenders</a></li>
						<li><a href="courier_services.php"><i class="glyphicon glyphicon-th-list"></i> Tender (Add/Delete)</a></li>
						<li><a href="courier_for.php"><i class="glyphicon glyphicon-th-list"></i> Vendor (Add/Delete)</a></li>
						<li><a href="login_users.php"><i class="glyphicon glyphicon-th-list"></i> Create Users</a></li>
						<li><a href="superwisor.php"><i class="glyphicon glyphicon-th-list"></i> Create Superwisors</a></li>
						<li><a href="feedback.php"><i class="glyphicon glyphicon-th-list"></i> Feedback</a></li>
						<li><a href="queries_pending.php"><i class="glyphicon glyphicon-th-list"></i> Pending Queries</a></li>
						<li><a href="superuser_change_password.php"><i class="glyphicon glyphicon-th-list"></i> Change Admin Password</a></li>
					<?php
					}
					else if($_SESSION['is_login_user'] == 1)
					{
					?>
						<li><a href="recievecourier.php"><i class="glyphicon glyphicon-th-list"></i> Recieve Tenders</a></li>
					<?php
					}
					else if($_SESSION['is_superwisor'] == 1)
					{
					?>
						<li><a href="uncollected_couriers_list.php"><i class="glyphicon glyphicon-th-list"></i> Uncollected Tenders</a></li>
					<?php
					}
					?>
				</ul>
				<ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                        <a href="?logout=true"><i class="fa fa-power-off"></i> Log-Out</a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li></li>
                        </ul>
                    </li>
                </ul>
        	</div>
			</form>
        </nav>