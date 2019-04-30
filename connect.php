
<!--Connects to Database-->
<?php
 $con = mysqli_connect("mysql4.uni.edu", "business", "HwHudY5JJYIZLPRy", "business_business");
 	if (mysqli_connect_errno()){
		die("Unsuccessful connection to database: " . mysqli_connect_error());
	}
?>

