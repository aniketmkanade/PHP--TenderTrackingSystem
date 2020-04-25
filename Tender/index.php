<?php
session_start();
include('connect.php');
?>
<?php
if(isset($_GET['btn_login']))
{
	if($_GET['txt_usename'] != "" && $_GET['txt_password'] != "")
	{
		$query = "select * from login where email ='".$_GET['txt_usename']."' and password ='".$_GET['txt_password']."'";
		
		if($result = mysqli_query($conn,$query))
		{
			while ($r = mysqli_fetch_array($result)) 
			{
				$_SESSION['is_superuser'] = $r['is_superuser'];
				$_SESSION['is_superwisor'] = $r['is_superwisor'];
				$_SESSION['is_login_user'] = $r['is_login_user'];
					
				$_SESSION['username'] = $_GET['txt_usename'];
				if($_SESSION['is_superuser'] == 1)
				{
					HEADER("location:uncollected_couriers_list.php");
				}
				else if($_SESSION['is_superwisor'] == 1)
				{
					HEADER("location:uncollected_couriers_list.php");
				}
				else if($_SESSION['is_login_user'] == 1)
				{
					HEADER("location:recievecourier.php");
				}
			}
		}
		else
		{
			echo "<script>alert('Query Error')</script>";
		}
	}
	else
	{
		echo "<script>alert('Usename or Password Empty')</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
		<!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/login/form-elements.css">
        <link rel="stylesheet" href="css/login/style.css">

        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
	</head>
	<body>
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Login Form</h1>
                            <div class="description">
                            	<p>
	                            	Track your Tender
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to Tender tracker</h3>
                            		<p>Enter your Email and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
<!------------------------------------------------------------------------------------------------------------------>
                            <div class="form-bottom">
			                    <form role="form" action="" method="get" class="login-form">
									<div class="form-group">
			                    		<label class="sr-only" for="UserReg_Uname">Email</label>
			                        	<input type="text" name="txt_usename" placeholder="Email..." class="form-username form-control" id="txt_usename">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="UserReg_Upass">Password</label>
			                        	<input type="password" name="txt_password" placeholder="Password..." class="form-password form-control" id="txt_password">
			                        </div>
			                        <button type="submit" class="btn" id="btn_login" name="btn_login" value="Sign in!">Sign in!</button><br><br>
			                    </form>
		                    </div>
                        </div>
                    </div>	
<!------------------------------------------------------------------------------------------------------------------>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>Developed By <a href="#">Team Elite</a></h3>
							<span> To know about us please visit...</span>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-1 btn-link-1-facebook" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-1 btn-link-1-twitter" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-1 btn-link-1-google-plus" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>