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
                            <h2>Navigation Page</h2>
                            <span class="sub_heading">Navigate Here...</span>
                        </div>
						<nav id="breadcrumbs">
                            <ul>
                                <li><input class="btn btn-default btn-block" name="btn_profile" id="btn_profile" value="Profile" type="submit"></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section><br><br><br>

		<section class="content faq">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 ">
						<div align="center" class="alert alert-info alert-dismissable">
							Maximum <strong>10</strong> Questions can be asked so Please Eloberate Your Question...
						</div>
					</div>
				</div><br><br>
				<div class="row">
					<div class="col-lg-3">
					</div>
					<div class="col-lg-6">
						<div class="widget widget_search">
							<div class="site-search-area">
								<form method="get" id="site-searchform" action="#">
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<textarea id="txt_question" class="form-control" name="txt_question" rows="4" cols="50" data-msg-required="Please enter your Question." maxlength="1000" placeholder="Ask Your Question Here..."></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<input type="submit" id="btn_ask" name="btn_ask" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Ask Question">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
					</div><br>
				</div>
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
                        <div class="panel-group accordion" id="accordion">
									<?php
									$add = 0;
									if(isset($_REQUEST['btn_ask']))
									{
										$query = "SELECT * FROM `reciever_master` WHERE email = '".$_SESSION['vendor_username']."'";
										if($result = mysqli_query($conn,$query))
										{
											$num = mysqli_num_rows($result);
											if($num > 0)
											{
												if($r = mysqli_fetch_array($result))
												{
													$qry = "INSERT INTO `query_master`(`question_by_id`, `question`, `question_time`, `question_date`) VALUES('".$r['reciever_master_id']."','".$_REQUEST['txt_question']."','".date("h:i:sa")."','".date("Y-m-d")."')";
													if($add < 9)
													{
														if($rslt = mysqli_query($conn,$qry))
														{
															$add++;
															echo "<script>alert('Question Sent Successfully....Answer will be given within 3 days...')</script>";
														}
														else
														{
															echo "<script>alert('Question Not Sent....Some Error Occured...')</script>";
														}
													}
												}
											}
										}
									}
									$incr = 0;
									$query = "SELECT r.*,q.* FROM reciever_master r,query_master q WHERE 
									q.question_by_id = r.reciever_master_id and 
									r.email = '".$_SESSION['vendor_username']."' ORDER BY q.query_master_id ASC";
										if($result = mysqli_query($conn,$query))
										{
											$num = mysqli_num_rows($result);
											if($num > 0)
											{
												while($r = mysqli_fetch_array($result))
												{
													if($r['is_answered'] == 1)
													{
														if($incr<=9)
														{
														$incr++;
														$arr1 = ["collapseOne","collapseTwo","collapseThree",
														"collapseFour","collapseFive","collapseSix","collapseSeven","collapseEight","collapseNine","collapseTen"];
									?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <span class="accordian-icon">
                                            <i class="switch fa fa-plus-circle"></i>
                                        </span>
                                        <a data-toggle="collapse" data-parent="#accordion" 
										href="#<?php print_r($arr1[$incr-1]) ?>">
                                            <i class="fa fa-cogs"></i>
                                            <?php echo $r['question'] ;?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="<?php print_r($arr1[$incr-1]) ?>" class="panel-collapse collapse">
                                    <div class="panel-body"><?php echo $r['answer'] ;?></div>
                                </div>
                            </div>
									<?php
														}
													}
												}
												if($incr > 9)
												{
													echo "<script>alert('Your 10 Questions are Completed...No Further Questions will be entertained...')</script>";
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
if(isset($_REQUEST['btn_profile']))
{
	HEADER('location:profile.php');
}
?>