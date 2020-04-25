<?php include_once("assets/includes/header.inc");
include('connect.php');
?>
<?php
/*---------------------------------------Per Day Reports---------------------------------------------*/
//Recieved Couriers
$total = 1;
$query = "SELECT count(*) as total FROM `courier_details` WHERE `date`='".date("Y/m/d")."' and `is_recieved` = 1";
if($result = mysqli_query($conn,$query))
{
	if($r = mysqli_fetch_array($result))
	{
		$total = $r['total'];
	}
}
//Collected Couriers
$total2 = 1;
$query2 = "SELECT count(*) as total FROM `courier_details` WHERE `date`='".date("Y/m/d")."' and `is_recieved` = 1 and `is_collected` = 1";
if($result2 = mysqli_query($conn,$query2))
{
	if($r2 = mysqli_fetch_array($result2))
	{
		$total2 = $r2['total'];
	}
}
//Issued Couriers
$total3 = 1;
$query3 = "SELECT count(*) as total FROM `courier_details` WHERE `date`='".date("Y/m/d")."' and `is_recieved` = 1 and `is_collected` = 1 and `is_issued` = 1 ";
if($result3 = mysqli_query($conn,$query3))
{
	if($r3 = mysqli_fetch_array($result3))
	{
		$total3 = $r3['total'];
	}
}
/*---------------------------------------Per Month Reports---------------------------------------------*/

$month = date("Y/m/d");
$timestamp = strtotime ("-1 month",strtotime ($month));
$lastMonth  =  date("Y/m/d",$timestamp);

//Recieved Couriers
$total4 = 1;
$query = "SELECT count(*) as total FROM `courier_details` WHERE `date`<='".date("Y/m/d")."' and `date`>'".$lastMonth."' and `is_recieved` = 1";
if($result = mysqli_query($conn,$query))
{
	if($r = mysqli_fetch_array($result))
	{
		$total4 = $r['total'];
	}
}
//Collected Couriers
$total5 = 1;
$query2 = "SELECT count(*) as total FROM `courier_details` WHERE `date`<='".date("Y/m/d")."' and `date`>'".$lastMonth."' and `is_recieved` = 1 and `is_collected` = 1";
if($result2 = mysqli_query($conn,$query2))
{
	if($r2 = mysqli_fetch_array($result2))
	{
		$total5 = $r2['total'];
	}
}
//Issued Couriers

$total6 = 1;
$query3 = "SELECT count(*) as total FROM `courier_details` WHERE `date`<='".date("Y/m/d")."' and `date`>'".$lastMonth."' and `is_recieved` = 1 and `is_collected` = 1 and `is_issued` = 1 ";

if($result3 = mysqli_query($conn,$query3))
{
	if($r3 = mysqli_fetch_array($result3))
	{
		$total6 = $r3['total'];
	}
}
?>
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
		<h1>Dashboard <small>Statistics and more</small></h1><br><br><br>
	</div>
</div>
<div class="row">
	<div class="col-lg-1">
	</div>
	<div class="col-lg-4">
	<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-magnet"></i> Tenders Monthly Statistics</h3>
			</div>
			<div class="panel-body">
				<tr>
					<td>Alloted <?php for($i=0;$i<56;$i++){echo "&nbsp";}?> <?php echo $total ?></td>
					<td>Collected <?php for($i=0;$i<52;$i++){echo "&nbsp";}?> <?php echo $total ?></td>
					<td>Issued <?php for($i=0;$i<56;$i++){echo "&nbsp";}?> <?php echo $total3 ?></td>
					<?php
					//pending = total - total3
					?>
				</tr>
			</div>
		</div>
	</div>
	<div class="col-lg-2">
	</div>
	<div class="col-lg-4">
		<!--<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-magnet"></i> Tenders Daily Statistics</h3>
			</div>
			<div class="panel-body">
				<tr>
					<td>Recipt <?php //for($i=0;$i<56;$i++){echo "&nbsp";}?> <?php //echo $total ?></td>
					<td>Collected <?php //for($i=0;$i<51;$i++){echo "&nbsp";}?> <?php //echo $total4 ?></td>
					<td>Delivered <?php //for($i=0;$i<51;$i++){echo "&nbsp";}?> <?php //echo $total6 ?></td>
					<td>Pending <?php //for($i=0;$i<53;$i++){echo "&nbsp";}?> <?php //echo $total4 - $total6?></td>
				</tr>
			</div>
		</div>-->
	</div>
	<div class="col-lg-1">
	</div>
</div>
<div class="row">
	<div class="col-lg-1">
	</div>
	<div class="col-lg-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-magnet"></i> Tenders Pending Status</h3>
			</div>
			<div class="panel-body">
				<tr>
				<?php
				$totals=0;
				$totals2=0;
				$totals3=0;
				$query = "select count(*) as total from courier_details where is_issued = 0 and priority = 'high'";
				if($result = mysqli_query($conn,$query))
				{
					while($r = mysqli_fetch_array($result))
					{
						$totals = $r['total'];
					}
				}
				$query2 = "select count(*) as total2 from courier_details where is_issued = 0 and priority = 'Medium'";
				if($result = mysqli_query($conn,$query2))
				{
					while($r = mysqli_fetch_array($result))
					{
						$totals2 = $r['total2'];
					}
				}
				$query3 = "select count(*) as total3 from courier_details where is_issued = 0 and priority = 'Low'";
				if($result = mysqli_query($conn,$query3))
				{
					while($r = mysqli_fetch_array($result))
					{
						$totals3 = $r['total3'];
					}
				}
				?>
					<td>High <?php for($i=0;$i<59;$i++){echo "&nbsp";}?> <?php echo $totals; ?></td>
					<td>Middle <?php for($i=0;$i<56;$i++){echo "&nbsp";}?> <?php echo $totals2; ?></td>
					<td>Low <?php for($i=0;$i<60;$i++){echo "&nbsp";}?> <?php echo $totals3; ?></td>
				</tr>
			</div>
		</div>
	</div>
	<div class="col-lg-2">
	</div>
	<div class="col-lg-4">
	</div>
	<div class="col-lg-1">
	</div>
</body>
</html>