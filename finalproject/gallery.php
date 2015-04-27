<!--
/*********************
 * A1 Realty         *
 * Kevin Oh		     *
 * MIS565 - SP '15   *
 * 04/20/15          *
 *                   *
 * Final             *
 * Gallery			 *
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
		<!--Subpage : Photo Gallery Main-->
		<div data-role="page" id="gallery">
			<!--Header with Logo-->
			<div data-role="header">
				<div class="logo">
					<img src="logo.jpg" border="0" alt="logo" height="40"/>
				</div>
				<h1>Our Photo Gallery</h1>
			</div>	
			<!--Header with Home Button/Back Button-->
			<div data-role="header" data-theme="e">
				<a href="index.html" data-icon="home" data-iconpos="left" data-direction="reverse">Home</a>
				<h1></h1>
				<a href="javascript:history.go(-1)" data-icon="back" data-iconpos="right" data-direction="reverse">Back</a>	 
			</div>
			<!--Photo Gallery Main : Page Content-->
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
							
							$columncounter = 0;
							if ($result) {
								$count = mysqli_num_rows($result);
								
								echo '<div class="ui-grid-b">';
								while($row = mysqli_fetch_array($result)){
									
									if ($columncounter == 0){
										echo '<b>MLS#: </b>'. $row['mls'] . '<br/>'; 
										echo '<b>Price: $</b>'. $row['price'] . '<br/>';
										echo "<div class='ui-block-a'><img width='200px' src='".$row['image']."'></img></div>";
										$columncounter++;
										echo '0test';
									}
									else if ($columncounter == 1){
										echo '<b>MLS#: </b>'. $row['mls'] . '<br/>'; 
										echo '<b>Price: $</b>'. $row['price'] . '<br/>';
										echo "<div class='ui-block-b'><img width='200px' src='".$row['image']."'></img></div>";
										$columncounter++;
										echo '1test';
									}
									else {
										echo '<b>MLS#: </b>'. $row['mls'] . '<br/>'; 
										echo '<b>Price: $</b>'. $row['price'] . '<br/>';
										echo "<div class='ui-block-c'><img width='200px' src='".$row['image']."'></img></div>";
										$columncounter = 0;
										echo '2test';
									}
								}
								echo '</div>';
								
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
				<a href="index.html" data-icon="home" data-iconpos="left" data-direction="reverse">Home</a>
			</div>	
			<div data-role="footer">
				<h5>A1 Realty &copy; All Rights Reserved</h5>
			</div>				
		</div>
		
		<!--Subpage : Photo Gallery Details Page-->
		<div data-role="page" id="details">
			<!--Header with Logo-->
			<div data-role="header">
				<div class="logo">
					<img src="logo.jpg" border="0" alt="logo" height="40"/>
				</div>
				<h1>Detailed Information</h1>
			</div>	
			<!--Header with Home Button/Back Button-->
			<div data-role="header" data-theme="e">
				<a href="index.html" data-icon="home" data-iconpos="left" data-direction="reverse">Home</a>
				<h1></h1>
				<a href="javascript:history.go(-1)" data-icon="back" data-iconpos="right" data-direction="reverse">Back</a>	 
			</div>
			<!--Photo Gallery Details : Page Content-->
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
									
								}
							}
							else{
								echo '<br>Sorry, something went wrong. Please contact us at (888)555-1234';
								}
					}
				} 
				?>
				<div data-role="main" class="ui-content">
					<div data-role="controlgroup" data-type="horizontal">
					<a href="#http://maps.google.com/maps?q=401+south+state+street,+chicago,+il" class="ui-btn">Map</a>
					<a href="#" class="ui-btn">Button 2</a>
					</div><br>
				</div>
				
			</div>
			<br><br>
			<!--Footer with Copyright/More Listings-->
			<div data-role="footer" data-theme="e" align="center">
				<a href="index.html" data-icon="home" data-iconpos="left" data-direction="reverse">Home</a>
			</div>	
			<div data-role="footer">
				<h5>A1 Realty &copy; All Rights Reserved</h5>
			</div>				
		</div>
		
	</body>
</html>	