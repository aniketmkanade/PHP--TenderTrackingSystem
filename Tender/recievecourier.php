<?php
ob_start(); 
include_once("assets/includes/header.inc");
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
		<h1>Allot Tender</h1><br>
			<form role="form">
				<div class="form-group">
					<label>Description of Tender</label>
					<select id="ddl_doc"name="ddl_doc" class="form-control">
						<option>Road Tender </option>
						<option>Housing Tender</option>
						<option>Electricity Dept Tender</option>
					</select>
				</div>
				<div class="row">
					<div class="form-group col-lg-11">
						<label>Tender Names</label>
						<select id="txt_recieved_from" name="txt_recieved_from" class="form-control">
						<?php
							$result = mysqli_query($conn,"SELECT `courier_id`, `name_of_courier` FROM `courier`");
							while ($r = mysqli_fetch_array($result)) 
							{
						?>
							<option value="<?php echo $r['courier_id'];?>"><?php echo $r['name_of_courier'];?></option>
						<?php
							}
						?>
						</select>
					</div>
					<div class="form-group col-lg-1"><br>
						<input type="submit" value="add" id="btn_add" name="btn_add" class="btn btn-default"/>
						<?php
							if(isset($_GET['btn_add']))
							{
								HEADER("location:add_new_courier.php");
							}
						?>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-11">
						<label>Allot Tender To</label>
						<select id="txt_recieved_for" name="txt_recieved_for" class="form-control">
							<?php
								$result = mysqli_query($conn,"SELECT `reciever_name`,`reciever_master_id` FROM `reciever_master`");
								while ($r = mysqli_fetch_array($result)) 
								{
							?>
								<option value="<?php echo $r['reciever_master_id'];?>"><?php echo $r['reciever_name'];?></option>
							<?php
								}
							?>
						</select> 
					</div>
					<div class="form-group col-lg-1"><br>
						<input type="submit" value="add" id="btn_add_user" name="btn_add_user" class="btn btn-default"/>
						<?php
							if(isset($_GET['btn_add_user']))
							{
								HEADER("location:add_new_user.php");
							}
						?>
					</div>
				</div>
				<div class="form-group">
					<label>Tender Type</label>
					<select id="ddl_courier_type" name="ddl_courier_type" class="form-control">
						<option>UnOfficial</option>
						<option>Official</option>
					</select> 
				</div>
				<div class="form-group">
					<label>Priority</label>
					<select id="ddl_priority" name="ddl_priority" class="form-control">
						<option>Low</option>
						<option>Medium</option>
						<option>High</option>
					</select> 
				</div>
				<div class="form-group">
					<label>Tender Alloted By </label>
					<input type="text" disabled id="txt_recieved_by" name="txt_recieved_by" value="<?php echo $_SESSION['username'] ?>" class="form-control">
					<?php    
						$query1 = "select login_id from login where email ='".$_SESSION['username']."'";
						$result = mysqli_query($conn,$query1);
							while ($r = mysqli_fetch_array($result)) 
							{
								$login_id = $r['login_id'];
							}
					?>
				</div>
				<div class="form-group">
					<input type="submit" value="save" id="btn_save" name="btn_save" class="btn btn-default" />
				</div>
		</div>
		<div class="col-lg-3">
		</div>
		</form>
	</div>
</div>
<?php include_once("assets/includes/footer.inc"); ?>
<?php
//GENERATING INWARD Document NUMBER
$query2 = "select max(courier_details_id) as last from courier_details";

if($result = mysqli_query($conn,$query2))
{
	if($r = mysqli_fetch_array($result))
	{		
		for($i=2016;$i<2100;$i++)
		{
			if(date("Y") == $i)
			{
				$inward_document_no1 = date("Y").date("M").str_pad(($r['last']+1), 5, '0', STR_PAD_LEFT);
			}
		}
	}
}
//$no = str_pad(, 5, "0", STR_PAD_LEFT);

$date = date("Y/m/d");
$time = date("h:i:sa");
if(isset($_GET['btn_save']) && $_GET['btn_save'] == 'save')
{
	
	$query = "INSERT INTO `courier_details`(`date`, `time`, `inward_document_no`, `doc`, `recieved_from_id`, `recieved_to_id`, `courier_type`, `priority`, `recieved_by_id`, `is_recieved`, `is_collected`, `is_issued`) VALUES 
	('".$date."','".$time."','".$inward_document_no1."','".$_GET['ddl_doc']."','".$_GET['txt_recieved_from']."','".$_GET['txt_recieved_for']."','".$_GET['ddl_courier_type']."','".$_GET['ddl_priority']."','".$login_id."',1,0,0)";
	//echo $query;
	if($result = mysqli_query($conn,$query))
	{
		echo"<script>alert('Data Entry Successful...!! Your INWARD DOCUMENT NUMBER IS ".$inward_document_no1."')</script>";
		//MAIL WORKING
		$query1 = "select * from login where email ='".$_GET['txt_recieved_for']."'";
		if($result = mysqli_query($conn,$query1))
		{
			
			while($r = mysqli_fetch_assoc($result))
			{
				$to = $r['email'];
				$subject = "Parcel";
				$txt = "Your document is Handovered.Your INWARD DOCUMENT NUMBER IS ".$inward_document_no1;
				$headers = "Recieved at Govt Ltd.";
				//mail($to,$subject,$txt,$headers);
			}
		}
		//MAIL WORKING END
	}
	else
		echo"<script>alert('Data Entry not Successful...!!')</script>";
}
?>