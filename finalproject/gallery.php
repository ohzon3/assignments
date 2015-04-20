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
				<a href="#home" data-icon="home" data-iconpos="left" data-direction="reverse">Home</a>
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
									echo '<b>MLS#: </b>'. $row['mls'] . '<br/>'; 
									echo '<b>Price: $</b>'. $row['price'] . '<br/>';
									if ($columncounter = 0){
										echo "<div class='ui-block-a'><img width='200px' src='".$row['image']."'></img></div>";
										$columncounter++;
										echo '0';
									}
									else if ($columncounter = 1){
										echo "<div class='ui-block-b'><img width='200px' src='".$row['image']."'></img></div>";
										$columncounter++;
										echo '1';
									}
									else {
										echo "<div class='ui-block-c'><img width='200px' src='".$row['image']."'></img></div>";
										$columncounter++;
										echo '2';
									}
									
									
									
									
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
			</div>	
			<div data-role="footer">
				<h5>A1 Realty &copy; All Rights Reserved</h5>
			</div>				
		</div>
	</body>
</html>	