<!--
/*********************
 * A1 Realty         *
 * Kevin Oh		     *
 * MIS565 - SP '15   *
 * 04/20/15          *
 *                   *
 * Final             *
 * Search			 *
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
		<div data-role="page" id="search">
			<!--Header with Logo-->
			<div data-role="header">
				<div class="logo">
					<img src="logo.jpg" border="0" alt="logo" height="40"/>
				</div>
				<h1>Search for a Property</h1>
			</div>	
			<!--Header with Home Button/Back Button-->
			<div data-role="header" data-theme="e">
				<a href="index.html" data-icon="home" data-iconpos="left" data-direction="reverse">Home</a>
				<h1></h1>
				<a href="javascript:history.go(-1)" data-icon="back" data-iconpos="right" data-direction="reverse">Back</a>	 
			</div>
			<!--Photo Gallery Main : Page Content-->
			<div data-role="content" style="background-color:#ffffff;">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<label for="min">Minimim Amount ($):</label>
					<input type="text" name="min" id="min">
					<label for="max">Maximum Amount ($):</label>
					<input type="text" name="max" id="max">
					<label for="proptype">Property Type:</label>
					<input type="text" name="proptype" id="proptype">
					<input type="reset" value="Reset Form">
					<input type="submit" value="Submit Information">
				</form>
				
				<?php
				$min = $max = $proptype = "";
				
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
						
						#TODO SELECT STATEMENT
						$query = "SELECT * FROM properties";
						
						

							$result = mysqli_query($connection, $query); 
							
							if ($result) {
								$count = mysqli_num_rows($result);
								
								echo '<div class="ui-grid-b">';
								while($row = mysqli_fetch_array($result)){
									echo '<b>MLS#: </b>'. $row['mls'] . '<br/>'; 
									echo '<b>Price: $</b>'. $row['price'] . '<br/>';
									if ($columncounter = 0){
										echo "<div class='ui-block-a'><img width='200px' src='".$row['image']."'></img></div>";
										$columncounter++;
										echo '0test';
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
	</body>
</html>	