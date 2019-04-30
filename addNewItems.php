<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Items | UNI CBB</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<body>	
	<?php
	
	//Add New Items Form
		echo "<h1>Add New Items</h1>";
		echo "<table>";
		echo "<form action='addNewItems.php' method='post' name='addItems' enctype='multipart/form-data'>";
			
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "DESCRIPTION:<span style='color:#B22222'>*</span> ";
				echo "</td>";
				echo "<td>";
					echo "<input type='text' name='description' required>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "UNIT COST: $ ";
				echo "</td>";
				echo "<td class='applyFont'>";
					echo "<input type='text' name='unitCost' placeholder='0.00'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "QUANTITY: ";
				echo "</td>";
				echo "<td class='applyFont'>";
					echo "<input type='number' name='itemQuantity' min = '0' value='0'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "PURCHASER: ";
				echo "</td>";
				echo "<td class='applyFont'>";
					echo "<input type='text' name='purchaser'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "PURCHASE DATE: ";
				echo "</td>";
				echo "<td class='applyFont'>";
					echo "<input type='date' name='purchaseDate'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td></td>";
				echo "<td class='applyFont' align='right'>";
					echo "<input type='file' name='itemImage' onchange='loadFile(event)' required>";
				echo "</td>";
				echo "<td>";
					echo "<img id='itemImage' name='itemImage' src='http://placehold.it/125/D1D1E6/D1D1E6' width='125' height='125'>";
				echo "</td>";
			echo "</tr>";
	
			echo "<tr>";
				echo "<td>";
					echo "<input type='submit' class='submitBtn' id='submit' name='submit' value='Submit'>";
	
			echo "</form>";
	
					echo "<a href='addInventoryMenu.php'><button class='button'>Back</button></a>";
				echo "</td>";
			echo "</tr>";
		echo "</table>";
	
		//Connect to DB
		require_once("../connect.php");

		if(isset($_POST['submit'])) {
		
			//Define POST variables
			$description = $_POST["description"];
			$unitCost = $_POST["unitCost"];
			$itemQuantity = $_POST["itemQuantity"];
			$purchaser = $_POST["purchaser"];
			$purchaseDate = $_POST["purchaseDate"];
			$itemImage = $_FILES["itemImage"]["name"];
	
			$fileName = $_FILES['fileName']['name'];
			$fileTmp = $_FILES['itemImage']['tmp_name'];
			$fileError = $_FILES['itemImage']['error'];
			$fileType = $_FILES['itemImage']['type'];
	
			//Query to insert data into DB on form submission
			$query = "INSERT INTO `Items` (`description`, `unitCost`, `itemQuantity`, `itemImage`, `purchaser`, `purchaseDate`) VALUES ( '".mysqli_real_escape_string($con,$description)."', '$unitCost', '$itemQuantity', '$itemImage', '$purchaser', '$purchaseDate')";

			//Check for Errors with File Upload
			if($query) {
					if($fileError === 0) {
						move_uploaded_file($_FILES['itemImage']['tmp_name'], "InventoryManagerImages/Items/$itemImage");
						echo "";
					} else {
						echo "There was an error uploading your file";
					}
				}
			}
	
		//Verify successful database connection and query execution
		$result = mysqli_query($con, $query);
	
		//Error Handling
		if($result) {
			echo "<p style=font-family:'Roboto Condensed', sans-serif>Item has been added</p>";
		} else {
 			if (mysqli_connect_errno()){
				die("Unsuccessful connection to database: " . mysqli_connect_error());
			}
		}
	?>
	
	<!--Javascript-->
	<script type="text/javascript">		
		//Prevents "Confirm Form Resubmission" pop-up, preventing the possibility of a double submission
		if (window.history.replaceState) {
  		window.history.replaceState(null, null, window.location.href);
		}
		
		//Image Preview in Form
  		var loadFile = function(event) {
    		var output = document.getElementById('itemImage');
    		output.src = URL.createObjectURL(event.target.files[0]);
		}
	</script>

</body>
</html>