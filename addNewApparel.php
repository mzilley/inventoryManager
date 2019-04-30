<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Apparel | UNI CBB</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>	
<body>
	<?php 

	//Add Apparel Form
		echo "<h1>Add New Apparel</h1>";
		echo "<table>";
		echo "<form action='addNewApparel.php' method='post' name='addApparel' enctype='multipart/form-data'>";

			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
				echo "GENDER: ";
				echo "</td>";
				echo "<td>";
				echo "<select name='manWomanUnisex' required>";
						echo "<option value='' disabled selected></option>";
						echo "<option value='Mens'>Mens</option>";
						echo "<option value='Womens'>Womens</option>";
						echo "<option value='Unisex'>Unisex</option>";
					echo "</select>";
				echo "</td>";
				echo "<td class='applyFont' align='right'>";
					echo "XS QUANTITY: ";
				echo "</td>";
				echo "<td>";
					echo "<input type='number' name='xsQuantity' min = '0' value='0'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "BRAND<span style='color:#B22222'>*</span>: ";
				echo "</td>";
				echo "<td>";
					echo "<select name='brand' required>";
						echo "<option value='' disabled selected></option>";
						echo "<option value='Avil'>Avil</option>";
						echo "<option value='Gildan'>Gildan</option>";
						echo "<option value='Next Level'>Next Level</option>";
						echo "<option value='Nike'>Nike</option>";
						echo "<option value='Port Authority'>Port Authority</option>";
						echo "<option value='Russell'>Russell</option>";
						echo "<option value='SportTek'>SportTek</option>";
						echo "<option value='Tri Mountain'>Tri Mountain</option>";
					echo "</select>";
				echo "</td>";
				echo "<td class='applyFont' align='right'>";
					echo "S QUANTITY: ";
				echo "</td>";
				echo "<td>";
					echo "<input type='number' name='sQuantity' min = '0' value='0'>";
				echo "</td>";
			echo "</tr>";
	
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "COLOR<span style='color:#B22222'>*</span>: ";
				echo "</td>";
				echo "<td>";
					echo "<select name='color' required>";
						echo "<option value='' disabled selected></option>";
						echo "<option value='Black'>Black</option>";
						echo "<option value='Gold'>Gold</option>";
						echo "<option value='Gray'>Gray</option>";
						echo "<option value='Purple'>Purple</option>";
						echo "<option value='White'>White</option>";
						echo "<option value='Yellow'>Yellow</option>";
					echo "</select>";
				echo "</td>";
				echo "<td class='applyFont' align='right'>";
					echo "M QUANTITY: ";
				echo "</td>";
				echo "<td>";
					echo "<input type='number' name='mQuantity' min = '0' value='0'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "CATEGORY<span style='color:#B22222'>*</span>: ";
				echo "</td>";
				echo "<td>";
					echo "<select name='category' required>";
						echo "<option value='' disabled selected></option>";
						echo "<option value='T-Shirt'>T-Shirt</option>";
						echo "<option value='Polo'>Polo</option>";
						echo "<option value='Button Up'>Button Up/Oxford</option>";
						echo "<option value='1/4 Zip'>1/4 Zip</option>";
					echo "</select>";
				echo "</td>";
				echo "<td class='applyFont' align='right'>";
					echo "L QUANTITY: ";
				echo "</td>";
				echo "<td>";
					echo "<input type='number' name='lQuantity' min = '0' value='0'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "PURPOSE:<span style='color:#B22222'>*</span> ";
				echo "</td>";
				echo "<td>";
					echo "<input type='text' name='purpose' placeholder='Visit Days, Events, etc.' required>";
				echo "</td>";
				echo "<td class='applyFont' align='right'>";
					echo "XL QUANTITY: ";
				echo "</td>";
				echo "<td>";
					echo "<input type='number' name='xlQuantity' min = '0' value='0'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "COST: $ ";
				echo "</td>";
				echo "<td>";
					echo "<input type='text' name='unitCost' placeholder='0.00'>";
				echo "<td class='applyFont' align='right'>";
					echo "XXL QUANTITY: ";
				echo "</td>";
				echo "<td>";
					echo "<input type='number' name='xxlQuantity' min = '0' value='0'>";
				echo "</td>";
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "PURCHASER: ";
				echo "</td>";
				echo "<td>";
					echo "<input type='text' name='purchaser'>";
				echo "</td>";
				echo "<td class='applyFont' align='right'>";
					echo "XXXL QUANTITY: ";
				echo "</td>";
				echo "<td>";
					echo "<input type='number' name='xxxlQuantity' min = '0' value='0'>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td class='applyFont' align='right'>";
					echo "PURCHASE DATE: ";
				echo "</td>";
				echo "<td>";
					echo "<input type='date' name='purchaseDate'>";
				echo "</td>";
			echo "</tr>";
	
			echo "<tr>";
				echo "<td></td>";
				echo "<td class='applyFont'>";
					echo "<input type='file' name='apparelImage' id='chooseFile' onchange='loadFile(event)' required>";
				echo "</td>";
				echo "<td class='applyFont'>";
					echo "<img src='http://placehold.it/150/D1D1E6/D1D1E6?' width='115' height='125' id='apparelImage'>";
				echo "</td>";
			echo "<tr>";
			echo "</tr>";
				echo "<td class='applyFont'>";
					echo "<input class='submitBtn' type='submit' id='submit' name='submit' value='Submit'>";

			echo "</form>";
					echo "<a href='addInventoryMenu.php'><button class='button'>Back</button></a>";
				echo "</td>";
				echo "<td></td>";
			echo "</tr>";
			echo "</table>";
	
		//Connect to DB
		require_once("../connect.php");

		if(isset($_POST['submit'])) {
			
			//Define POST Variables for Query 1
			$manWomanUnisex = $_POST["manWomanUnisex"];
			$brand = $_POST["brand"];	
			$color = $_POST["color"];
			$category = $_POST["category"];	
			$purpose = $_POST["purpose"];
			$unitCost = $_POST["unitCost"];
			$xsQuantity = $_POST["xsQuantity"];
			$sQuantity = $_POST["sQuantity"];
			$mQuantity = $_POST["mQuantity"];
			$lQuantity = $_POST["lQuantity"];
			$xlQuantity = $_POST["xlQuantity"];
			$xxlQuantity = $_POST["xxlQuantity"];
			$xxxlQuantity = $_POST["xxxlQuantity"];
			$apparelImage = $_FILES["apparelImage"]["name"];	
			$purchaser = $_POST["purchaser"];
			$purchaseDate = $_POST["purchaseDate"];
			
			$fileName = $_FILES['fileName']['name'];
			$fileTmp = $_FILES['apparelImage']['tmp_name'];
			$fileError = $_FILES['apparelImage']['error'];
			$fileType = $_FILES['apparelImage']['type'];
			
			//Query to insert data into DB on form submission
			$query = "INSERT INTO `Apparel` (`manWomanUnisex`, `brand`, `color`, `category`, `purpose`, `unitCost`, `xsQuantity`, `sQuantity`, `mQuantity`, `lQuantity`, `xlQuantity`, `xxlQuantity`, `xxxlQuantity`, `apparelImage`, `purchaser`, `purchaseDate`) VALUES ('$manWomanUnisex', '$brand', '$color', '".mysqli_real_escape_string($con,$category)."', '$purpose', '$unitCost', '$xsQuantity', '$sQuantity', '$mQuantity', '$lQuantity', '$xlQuantity', '$xxlQuantity', '$xxxlQuantity', '$apparelImage', '$purchaser', '$purchaseDate')";
			
			//Check for Errors with File Upload
			if($query) {
					if($fileError === 0) {
						move_uploaded_file($_FILES['apparelImage']['tmp_name'], "InventoryManagerImages/Apparel/$apparelImage");
						echo "";
					} else {
						echo "There was an error uploading your file";
					}
				}
			}
	
		//Verify successful database connection and query execution
		$result = mysqli_query($con, $query);
		$result2 = mysqli_query($con, $query2);

		//Error Handling
		if($result) {
			echo "<p style=font-family:'Roboto Condensed', sans-serif>Apparel has been added</p>";
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
    		var output = document.getElementById('apparelImage');
    		output.src = URL.createObjectURL(event.target.files[0]);
		}
	</script>
</body>
</html>