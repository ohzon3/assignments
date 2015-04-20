<!--
/*********************
 * A1 Realty         *
 * Kevin Oh		     *
 * MIS565 - SP '15   *
 * 04/20/15          *
 *                   *
 * Final             *
 * Listings			 *
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
		<!--Subpage : Listings Main-->
		<div data-role="page" id="listings">
			<!--Header with Logo-->
			<div data-role="header">
				<div class="logo">
					<img src="logo.jpg" border="0" alt="logo" height="40"/>
				</div>
				<h1>Featured Listings</h1>
			</div>	
			<!--Header with Home Button/More Listings-->
			<div data-role="header" data-theme="e">
				<a href="#home" data-icon="home" data-iconpos="left" data-direction="reverse">Home</a>
				<h1></h1>
				<a href="#listings2" data-icon="arrow-r" data-iconpos="right">More Listings</a>	 
			</div>
			<!--Listings Main : Page Content-->
			<div data-role="content" style="background-color:#ffffff;">
				<?php
				define("MYSQLUSER", "root");
				define("MYSQLPASS", "");
				define("HOSTNAME", "localhost");
				define("MYSQLDB", "midwest");

				$connection = @mysqli_connect(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
				if (mysqli_connect_error()) {
					die('Connect Error: ' . mysqli_connect_error());
				}
				else {
					if ($result = mysqli_query($connection, "SHOW TABLES")) {
						$count = mysqli_num_rows($result);
						
						$query = "SELECT * FROM properties";

							$result = mysqli_query($connection, $query); 
							

							if ($result) {
								$count = mysqli_num_rows($result);
								while($row = mysqli_fetch_array($result)){
									echo '<b>MLS#: </b>'. $row['mls'] . '<br/>'; 
									echo '<b>Address: </b>'. $row['address'] . '<br/>';
									echo '<b>City: </b>'. $row['city'] . '<br/>';
									echo '<b>State: </b>'. $row['state'] . '<br/>';
									echo '<b>Zip Code: </b>'. $row['zip'] . '<br/>';
									echo '<b>Price: $</b>'. $row['price'] . '<br/>';
									echo '<b>Type: </b>'. $row['type'] . '<br/>';
									echo '<b>Acres: </b>'. $row['acres'] . '<br/>';
									echo '<b>Rooms: </b>'. $row['rooms'] . '<br/>';
									echo '<b>Bathes: </b>'. $row['bath'] . '<br/>';
									echo "<b>Image: </b> <img width='200px' src='". $row['image'] ."'></img>".'<br/><br/><br/>';
								}
								
							}
							else{
								echo '<br>Sorry, something went wrong. Please contact us at (888)555-1234';
								}
					}
				} 
				?>
				
			</div>
			<br><br>
			<!--Footer with Copyright/More Listings-->
			<div data-role="footer" data-theme="e" align="center">
				<a href="#home" data-icon="home" data-iconpos="left" data-direction="reverse">Home</a>
				<a href="#listings2" data-icon="arrow-r" data-iconpos="right">More Listings</a>
			</div>	
			<div data-role="footer">
				<h5>A1 Realty &copy; All Rights Reserved</h5>
			</div>				
		</div>
	</body>
</html>	