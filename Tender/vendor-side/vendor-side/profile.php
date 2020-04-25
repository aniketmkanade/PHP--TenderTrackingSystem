<?php include_once("assets/include/header.inc");
include('connect.php');
if(!(isset($_SESSION['vendor_username'])))
{
	HEADER('location:login.php');
}
?>	
	<!--start wrapper-->
	<section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Status of Tender</h2>
                            <span class="sub_heading">Get your tenders status here...</span>
                        </div>
						<nav id="breadcrumbs">
                            <ul>
                                <li><input class="btn btn-default btn-block" name="btn_query" id="btn_query" value="Queries" type="submit"></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section><br><br><br>

		<section class="content faq">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
					</div>
					<div class="col-lg-4">
						<div class="widget widget_search">
							<div class="site-search-area">
								<form method="get" id="site-searchform" action="#">
									<div>
										<input class="input-text" name="txt_inward_document_no" id="txt_inward_document_no" placeholder="Enter inward document no..." type="text"/>
										<input id="searchsubmit" name="searchsubmit" value="Search" type="submit" />
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
					</div><br>
				</div>
				<?php
				$width = 0;
				if(isset($_REQUEST['searchsubmit']))
				{
					$query = "SELECT d.*,l.* FROM `courier_details` d,`login` l,`reciever_master` m WHERE 
					d.recieved_by_id = l.login_id and 
					d.is_recieved = 1 and 
					d.recieved_to_id = m.reciever_master_id and
					m.email = '".$_SESSION['vendor_username']."' and 
					d.inward_document_no = '".$_REQUEST['txt_inward_document_no']."'";
					if($result = mysqli_query($conn,$query))
					{
						$num = mysqli_num_rows($result);
						if($num > 0)
						{
							$width = 33;
						}
					}
				}
				if(isset($_REQUEST['searchsubmit']))
				{
					$query = "SELECT d.*,l.* FROM `courier_details` d,`login` l,`reciever_master` m WHERE d.recieved_by_id = l.login_id and 
					d.is_recieved = 1 and
					d.is_collected = 1 and
					d.recieved_to_id = m.reciever_master_id and
					m.email = '".$_SESSION['vendor_username']."' and 
					d.inward_document_no = '".$_REQUEST['txt_inward_document_no']."'";
					if($result = mysqli_query($conn,$query))
					{
						$num = mysqli_num_rows($result);
						if($num > 0)
						{
							$width = 66;
						}
					}
				}
				if(isset($_REQUEST['searchsubmit']))
				{
					$query = "SELECT d.*,l.* FROM `courier_details` d,`login` l,`reciever_master` m WHERE d.recieved_by_id = l.login_id and 
					d.is_recieved = 1 and
					d.is_collected = 1 and
					d.is_issued = 1 and
					d.recieved_to_id = m.reciever_master_id and
					m.email = '".$_SESSION['vendor_username']."' and 
					d.inward_document_no = '".$_REQUEST['txt_inward_document_no']."'";
					if($result = mysqli_query($conn,$query))
					{
						$num = mysqli_num_rows($result);
						if($num > 0)
						{
							$width = 100;
						}
					}
				}
				?>
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">	
						<div class="progress progress-striped active">
							<div style="width:<?php echo $width;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
							</div>
						</div>
					</div>
					<div class="col-lg-2"></div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
                        <div class="panel-group accordion" id="accordion">
<!----------------------------------------------ALLOTMENT AREA------------------------------------------------------------>
									<?php
									if(isset($_REQUEST['searchsubmit']))
									{
										$query = "SELECT d.*,l.* FROM `courier_details` d,`login` l,`reciever_master` m WHERE d.recieved_by_id = l.login_id and 
										d.is_recieved = 1 and 
										d.recieved_to_id = m.reciever_master_id and
										m.email = '".$_SESSION['vendor_username']."' and 
										d.inward_document_no = '".$_REQUEST['txt_inward_document_no']."'";
										if($result = mysqli_query($conn,$query))
										{
											$num = mysqli_num_rows($result);
											if($num > 0)
											{
												if($r = mysqli_fetch_array($result))
												{
													$alloted_date = $r['date'];
													$alloted_time = $r['time'];
													$alloted_by = $r['email'];
									?>
							<div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <span class="accordian-icon">
                                            <i class="switch fa fa-plus-circle"></i>
                                        </span>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            <i class="fa fa-cogs"></i>
                                            Alloted
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
									<?php
												echo "DATE OF ALLOTMENT : '".$alloted_date."'";
												echo "<br>";
												echo "TIME OF ALLOTMENT : '".$alloted_time."'";
												echo "<br>";
												echo "TENDER ALLOTED BY (EMAIL) : '".$alloted_by."'";
									?>
									</div>
                                </div>
                            </div>
									<?php
												}
											}
											else
											{
												echo "<script>alert('No such Inward Document Number Exist.')</script>";
											}
										}
									}
									?>
<!----------------------------------------------COLLECTED AREA------------------------------------------------------------>
							<?php
							if(isset($_REQUEST['searchsubmit']))
							{
								$query = "SELECT d.*,l.* FROM `courier_details` d,`login` l,`reciever_master` m WHERE d.recieved_by_id = l.login_id and 
										d.is_recieved = 1 and
										d.is_collected = 1 and
										d.recieved_to_id = m.reciever_master_id and
										m.email = '".$_SESSION['vendor_username']."' and 
										d.inward_document_no = '".$_REQUEST['txt_inward_document_no']."'";
								if($result = mysqli_query($conn,$query))
								{
									$num = mysqli_num_rows($result);
									if($num > 0)
									{
										if($r = mysqli_fetch_array($result))
										{
											$collected_date = $r['is_collected_date'];
											$collected_time = $r['is_collected_time'];
											$collected_by = $r['is_collected_by_name'];
							?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <span class="accordian-icon">
                                            <i class="switch fa fa-plus-circle"></i>
                                        </span>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            <i class="fa fa-cogs"></i>
                                            Collected
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
							<?php
								echo "DATE OF COLLECTION : '".$collected_date."'";
								echo "<br>";
								echo "TIME OF COLLECTION : '".$collected_time."'";
								echo "<br>";
								echo "TENDER COLLECTED BY (EMAIL) : '".$collected_by."'";
							?>
									</div>
                                </div>
                            </div>
							<?php
										}
									}
									else
									{
										//echo "<script>alert('Tender not Collected yet.')</script>";
									}
								}
							}
							?>
<!----------------------------------------------ISSUED AREA------------------------------------------------------------>
                            <?php
							if(isset($_REQUEST['searchsubmit']))
							{
								$query = "SELECT d.*,l.* FROM `courier_details` d,`login` l,`reciever_master` m WHERE d.recieved_by_id = l.login_id and 
										d.is_recieved = 1 and
										d.is_collected = 1 and
										d.is_issued = 1 and
										d.recieved_to_id = m.reciever_master_id and
										m.email = '".$_SESSION['vendor_username']."' and 
										d.inward_document_no = '".$_REQUEST['txt_inward_document_no']."'";
								if($result = mysqli_query($conn,$query))
								{
									$num = mysqli_num_rows($result);
									if($num > 0)
									{
										if($r = mysqli_fetch_array($result))
										{
											$issued_date = $r['is_issued_date'];
											$issued_time = $r['is_issued_time'];
							?>
							<div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <span class="accordian-icon">
                                            <i class="switch fa fa-plus-circle"></i>
                                        </span>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                            <i class="fa fa-cogs"></i>
                                            issued
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
									<?php
										echo "DATE OF ISSUE : '".$issued_date."'";
										echo "<br>";
										echo "TIME OF ISSUE : '".$issued_time."'";
									?>
									</div>
                                </div>
                            </div>
                            <?php
										}
									}
									else
									{
										//echo "<script>alert('Tender not issued yet.')</script>";
									}
								}
							}
							?>
                        </div>
					</div>
					<div class="col-lg-2"></div>
				</div>
			</div>
		</section>
		
	</section>
	<!--end wrapper-->
<?php include_once("assets/include/footer.inc");?>
<?php
if(isset($_REQUEST['btn_query']))
{
	HEADER('location:query.php');
}
?>