<?php
ob_start();
session_start(); 
?>
<?php
if(isset($_REQUEST['btn_logout']))
{
	unset($_SESSION['vendor_username']);
	HEADER('location:login.php');
}
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<meta http-equiv="content-type" content="text/html; charset=windows-1252">

	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" href="images/logoTitle.png">
	<title>TenderTracker </title>
	<meta name="description" content=" Netist is the leading provider of high-performance Development on Customer Demand. Netist specializes in Web-Development, Software Development, Web-site and Web Applications, Desktop & Distributed Applications, Mobile  App Development, Hosting Packages, Domain Sale, Online Marketing, Our Products are Hospital Management, School, Hotel Management, Tourism, ERP and CMS Development, SEO Optimization. Netist solutions headquarter in Aurangabad,India,">
	<meta name="description" content="Netist Solutions  Company Firm in Aurangabad Maharashtra India">
	<meta name="keywords" content="Netist Solutions Software Responsive Web Design Web-Site Applications Desktop Distributed Mobile App Android IT Network Domain Hosting online Marketing  e-Marketing  e-Learning  e-Commerce, SEO Optimization ">
	<meta name="author" content="Netist Solutions Aurangabad ">
    <!-- CSS FILES -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/skins/DarkCyan.css" media="screen" data-name="skins"> -->
    <link rel="stylesheet" href="css/layout/wide.css" data-name="layout">

    <link rel="stylesheet" href="css/fractionslider.css"/>
    <link rel="stylesheet" href="css/style-fraction.css"/>
    <link rel="stylesheet" href="css/animate.css"/>

    <link rel="stylesheet" type="text/css" href="css/switcher.css" media="screen" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		
</head>
<body>
	<!--Start Header-->
    <header id="header">
        <div id="top-bar">
        <div class="container">
            <div class="row">
				<div class="top-info">
                    <span class="hidden-xs"><i class="fa fa-mobile"></i>Phone: +91 9403821601</span>
                    <span class="hidden-xs"><i class="fa fa-at"></i>Email: kanadeaniket@sggs.ac.in</span>
					<div style="text-align:center; margin:auto; position:absolute">
                        <ul>
                            <li><a href="" class="my-tweet"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="" class="my-facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="" class="my-skype"><i class="fa fa-skype"></i></a></li>
                            <li><a href="" class="my-pint"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="" class="my-rss"><i class="fa fa-rss"></i></a></li>
                            <li><a href="" class="my-google"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
					
                </div>
            </div>
        </div>
    </div>
        
        <!-- Navigation
================================================== -->
        <div class="navbar navbar-default navbar-static-top" role="navigation" data-spy="affix" data-offset-top="40">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div id="logo">
							<h1>ss
								<a href="#">
									<!-- <div class="img" data-placement="bottom" data-toggle="tooltip"title="TenderTracker" ></div> -->
								</a>
							</h1>
						</div>
					</div>
					<div class="col-sm-1  navbar-header ">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="col-sm-8 navbar-collapse collapse">
					<form method="get" action="#">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php"><i class="fa fa-home"></i>&nbsp;Home</a>
							</li>

							<li><a href="tender_info.php">Tender Information</a>
							</li>

							
							<li><a href="contact.php">Contact/Feedback</a></li>
							<?php
							if(isset($_SESSION['vendor_username']))
							{
								echo '<li><input class="btn btn-default btn-block" type="submit" value="Logout" name="btn_logout" id="btn_logout" ></li>';
							}
							else
							{
								echo '<li><a href="login.php">Login</a></li>';
							}
							?>
						</ul>
					<form>
					</div>
				</div><!--/.row -->
			</div><!--/.container -->
        </div>
	</header>