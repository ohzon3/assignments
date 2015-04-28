<!--
/*********************
 * A1 Realty         *
 * Kevin Oh		     *
 * MIS565 - SP '15   *
 * 04/20/15          *
 *                   *
 * Final             *
 * Feedback *
 ********************/
 -->
<!DOCTYPE html>
<html>
	<head>
		<title>A1 Realty</title>
		<meta name="viewport" content="Width=device-width,initial-scale=1">
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
		
		<style>
			.logo
			{
				width:100%;
				background-color:#000;
				text-align:center;
				padding:5px 0;
			}
			.auto-style1 {
				text-align: right;
			}
		</style>
	</head>
	<body>
	
				<?php
					$con=mysqli_connect("localhost","root","","midwest");
					// Check connection
					if (mysqli_connect_errno())
					{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$sql="INSERT INTO feedback (fName, fPhone, fEmail, fComment)
					VALUES
					('$_POST[name]','$_POST[phone]','$_POST[email]','$_POST[feedback]')";

					if (!mysqli_query($con,$sql))
					{
						die('Error: ' . mysqli_error($con));
					}
					echo "1 record added";
					mysqli_close($con);
				?>

		<!--Subpage : Feedback-->
		<div data-role="page" id="feedback">
			<!--Header with Logo-->
			<div data-role="header">
				<div class="logo">
					<img src="logo.jpg" border="0" alt="logo" height="40"/>
				</div>
				<h1>Give us feedback!</h1>
			</div>	
			<!--Header with Home Button/Back Button-->
			<div data-role="header" data-theme="e">
				<a href="#home" data-icon="home" data-iconpos="left" data-direction="reverse">Home</a>
				<h1></h1>
				<a href="javascript:history.go(-1)" data-icon="back" data-iconpos="right" data-direction="reverse">Back</a>	 
			</div>
			<!--Feedback Main : Page Content-->
			<div data-role="content" style="background-color:#ffffff;" class="ui-content">
				Enter your feedback and comments below about our website and we will take all suggestion to consideration. <br><br>
				<form method="post" action="feedback.php">
					<label for="name">Name:</label>
					<input type="text" name="name" id="name">
					<label for="phone">Phone Number:</label>
					<input type="text" name="phone" id="phone">
					<label for="email">Email Address:</label>
					<input type="email" name="email" id="email">
					<label for="feedback">Feedback or Comments about our website:</label>
					<input type="text" name="feedback" id="feedback"><br>
					<input type="reset" value="Reset Form">
					<input type="submit" value="Submit Information">
				</form>
			</div>
			<br><br>
			<!--Footer with Copyright/Home-->
			<div data-role="footer" data-theme="e" align="center">
				<a href="#home" data-icon="home" data-iconpos="left" data-direction="reverse">Home</a>
			</div>	
			<div data-role="footer">
				<h5>A1 Realty &copy; All Rights Reserved</h5>
			</div>				
		</div>
	</body>
</html>	