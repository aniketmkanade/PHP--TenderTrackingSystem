<?php include_once("assets/include/header.inc");
include('connect.php');?>	
	<!--start wrapper-->
	<section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Tender Information</h2>
                            <span class="sub_heading">Tender Information</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		
		<section class="content elements">
            <div class="container">
				<div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="dividerHeading">
                            <h4><span>Total Tenders</span></h4>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Information</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php
							$query = "SELECT * FROM `courier`";
							if($result = mysqli_query($conn,$query))
							{
								$num = mysqli_num_rows($result);
								if($num > 0)
								{
									$count = 0;
									while($r = mysqli_fetch_assoc($result))
									{
										$count++;
										$name = $r['name_of_courier'];
										$info = $r['courier_info'];
										echo "<tr><td>'".$count."'</td><td>'".$name."'</td>";
										echo "<td>'".$info."'</td></tr>";	
									}
								}
							}
							?>
                            </tbody>
                        </table>
                    </div>
                </div> <!--./row-->
				
                </div> <!--./Container-->
            </section>
	</section>
	<!--end wrapper-->
<?php include_once("assets/include/footer.inc");?>