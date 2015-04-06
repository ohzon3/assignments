<?php
define("MYSQLUSER", "root");
define("MYSQLPASS", "");
define("HOSTNAME", "localhost");
define("MYSQLDB", "midwest");

$connection = @mysqli_connect(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
if (mysqli_connect_error()) {
	die('Connect Error: ' . mysqli_connect_error());
}else {
	echo 'Successful connection to MYSQL <br />';
	if ($result = mysqli_query($connection, "SHOW TABLES")) {
		$count = mysqli_num_rows($result);
		echo "Tables: ($count)<br />";
		while ($row = mysqli_fetch_array($result)) {
			echo $row[0]. '<br />';
			}
			$query = "SELECT * FROM properties";

							$result = mysqli_query($connection, $query); 
							

							if ($result) {
								$count = mysqli_num_rows($result);
								echo '<b><u>Results:</u></b><br><br>';
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
	} ?>

