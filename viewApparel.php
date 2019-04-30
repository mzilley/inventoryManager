<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Inventory | UNI CBB</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
	<body>
	<?php
		//Connect to DB
		include('../connect.php');

    	$query = "SELECT * FROM `Apparel` WHERE `isActive` = 'Active'";
		$result = mysqli_query($con, $query);
	
			echo "<h1>Current Inventory | Apparel</h1>";

			//Main Menu
			echo "<a href='viewApparel.php'><button class='button'>Apparel</button></a>";
			echo "<a href='viewItems.php'><button class='button'>Items</button></a>";
			echo "<a href='viewMarketingMaterials.php'><button class='button'>Printed Material</button></a>";
			?>
			<button onClick ="$('#tblexportData').tableExport({type:'excel', separator:',', ignoreColumn: [0,13], escape:'false'});" title='Download an Excel report from the filtered or unfiltered data' class='button'>Download</button>
			<?php
			echo "<a href='viewInactiveApparel.php'><button class='button'>Inactive Apparel</button></a>";
			echo "<a href='viewApparel.php'><button class='button' title='Reset filters'>Reset</button></a>";
			echo "<a href='../inventoryIndex.php'><button class='button'>Back</button></a>";
			
			echo "<br>";
			echo "<br>";

		echo "<table class='applyFont' id='tblexportData' cellspacing='0' cellpadding='0'>";
			echo "<tr>";
				echo "<th>M/W</th>";
				echo "<th>BRAND</th>";
				echo "<th>COLOR</th>";
				echo "<th>CATEGORY</th>";
				echo "<th>PURPOSE</th>";
				echo "<th>COST</th>";
				echo "<th>XS</th>";
				echo "<th>S</th>";
				echo "<th>M</th>";
				echo "<th>L</th>";
				echo "<th>XL</th>";
				echo "<th>2XL</th>";
				echo "<th>3XL</th>";
				echo "<th>STATUS</th>";
				echo "<th></th>";
			echo "</tr>";
	
		while($row=mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td align='center' width='6%'>{$row['manWomanUnisex']}</td>";
				echo "<td align='center' width='8.75%'>{$row['brand']}</td>";
				echo "<td align='center' width='9.25%'>{$row['color']}</td>";
				echo "<td align='center' width='12.5%'>{$row['category']}</td>";
				echo "<td align='center' width='11%'>{$row['purpose']}</td>";
				echo "<td align='center' width='7.75%'>$ {$row['unitCost']}</td>";
				echo "<td align='center' width='5.5%'>{$row['xsQuantity']}</td>";
				echo "<td align='center' width='4.25%'>{$row['sQuantity']}</td>";
				echo "<td align='center' width='4.25%'>{$row['mQuantity']}</td>";
				echo "<td align='center' width='4%'>{$row['lQuantity']}</td>";
				echo "<td align='center' width='5%'>{$row['xlQuantity']}</td>";
				echo "<td align='center' width='6.25%'>{$row['xxlQuantity']}</td>";
				echo "<td align='center' width='6.25%'>{$row['xxxlQuantity']}</td>";
				echo "<td align='center' width='7%'>{$row['isActive']}<br><br><a href='editStatus.php?ID={$row['ID']}'><img src='/InventoryManager/InventoryManagerImages/Icons/pencil-edit-button.png' title='Edit the status of the selected row'><br><br><a href='viewApparelTotals.php?ID={$row['ID']}'><img src='/InventoryManager/InventoryManagerImages/Icons/sum-sign.png' title='View the total inventory for this row'></td>";			
				echo "<td width='9%'><img src='/InventoryManager/InventoryManagerImages/Apparel/{$row['apparelImage']}' width='115' height='125' style='display:block'></td>";
			echo "</tr>";
		}
		echo "</table>";
	
		echo "<br>";
		echo "<a href='../inventoryIndex.php'><button class='button'>Back</button></a>";

		//Error Handling
		if($result) {
			echo "";
		} else {
 			if (mysqli_connect_errno()){
				die("Unsuccessful connection to database: " . mysqli_connect_error());
			}
		}
	?>
	<!--jQuery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!--Excel Export Plug-In-->
	<script src="tableExport.js"></script>
	<script src="jquery.base64.js"></script>
	<!--Table Filter Plug-In-->
	<script src="ddtf.js"></script>
	<script>
		//Table Filtering
		jQuery('.applyFont').ddTableFilter();
		
		//Button Tooltips
		$(function() {
			$(document).tooltip();
		});
		
	</script>
	<script type="text/javascript">
		//Prevents "Confirm Form Resubmission" pop-up, preventing the possibility of a double submission
		if (window.history.replaceState) {
  			window.history.replaceState(null, null, window.location.href);
		};
		
		//Excel Export Function
		function exportToExcel(tblexportData, filename = 'ApparelInventoryReport'){
    		var downloadurl;
			var dataFileType = 'application/vnd.ms-excel';
			var tableSelect = document.getElementById(tblexportData);
    		var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
    
    	filename = filename?filename+'.xls':'export_excel_data.xls';
    
    	downloadurl = document.createElement("a");
    
    	document.body.appendChild(downloadurl);
    
    	if(navigator.msSaveOrOpenBlob){
			var blob = new Blob(['\ufeff', tableHTMLData], {
            	type: dataFileType
        	});
        navigator.msSaveOrOpenBlob( blob, filename);
		}else{
			downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
    
        	//Set the file name
        	downloadurl.download = filename;
        
        	downloadurl.click();
    		}
		}
	</script>
</body>
</html>