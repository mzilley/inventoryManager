<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Sales | UNI CBB</title>
<link rel="shortcut icon" type="image/png" href="InventoryManagerImages/Icons/0.png">
<link href="inventoryManagerStyles.css" rel="stylesheet">
</head>
<body>
<?php
		//Connect to DB
		include('../connect.php');
	
		$query = "SELECT apparelImage, brand, unitCost, personWhoTook, personReceiving, xsQuantityTaken, sQuantityTaken, mQuantityTaken, lQuantityTaken, xlQuantityTaken, xxlQuantityTaken, xxxlQuantityTaken, type, date FROM Apparel, Apparel_Sales WHERE Apparel.ID = Apparel_Sales.ID ORDER BY date";
		$result = mysqli_query($con, $query);
	
		echo "<h1>Transaction History | Apparel</h1>";
	
		//Main Menu
		echo "<a href='viewApparelSales.php'><button class='button'>Apparel</button></a>";
		echo "<a href='viewItemSales.php'><button class='button'>Items</button></a>";			echo "<a href='viewMktgMaterialSales.php'><button class='button'>Printed Material</button></a>";
		?>
		<button onClick ="$('#tblexportData').tableExport({type:'excel', separator:',', ignoreColumn: [0,13], escape:'false'});" title='Download an Excel report from the filtered or unfiltered data' class='button'>Download</button>
		<?php
		echo "<a href='../inventoryIndex.php'><button class='button'>Back</button></a>";
		
		echo "<br>";
		echo "<br>";
	
		//Display Data
		echo "<table class='applyFont' cellspacing='0' cellpadding='0'>";
			echo "<tr>";
				echo "<th></th>";
				echo "<th>BRAND</th>";
				echo "<th>COST</th>";
				echo "<th>REQUESTOR</th>";
				echo "<th>PURPOSE</th>";
				echo "<th>XS</th>";
				echo "<th>S</th>";
				echo "<th>M</th>";
				echo "<th>L</th>";
				echo "<th>XL</th>";
				echo "<th>XXL</th>";
				echo "<th>XXXL</th>";
				echo "<th>TYPE</th>";
				echo "<th>DATE</th>";
			echo "</tr>";
	
		while($row=mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td align='center' width='8%'><img src='/InventoryManager/InventoryManagerImages/Apparel/{$row['apparelImage']}' width='115' height='125' style='display:block'></td>";
				echo "<td align='center' width='10%'>{$row['brand']}</td>";
				echo "<td align='center' width='6%'>{$row['unitCost']}</td>";
				echo "<td align='center' width='13%'>{$row['personWhoTook']}</td>";
				echo "<td align='center' width='17%'>{$row['personReceiving']}</td>";
				echo "<td align='center' width='4.5%'>{$row['xsQuantityTaken']}</td>";
				echo "<td align='center' width='4%'>{$row['sQuantityTaken']}</td>";
				echo "<td align='center' width='4%'>{$row['mQuantityTaken']}</td>";
				echo "<td align='center' width='4%'>{$row['lQuantityTaken']}</td>";
				echo "<td align='center' width='4.75%'>{$row['xlQuantityTaken']}</td>";
				echo "<td align='center' width='4.75%'>{$row['xxlQuantityTaken']}</td>";
				echo "<td align='center' width='4.75%'>{$row['xxxlQuantityTaken']}</td>";
				echo "<td align='center' width='7%'>{$row['type']}</td>";
				echo "<td align='center' width='7%'>{$row['date']}</td>";
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
</body>
	<!--jQuery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!--Table Filter Plug-In-->
	<script src="ddtf.js"></script>
	<script>
		//Table Filtering
		jQuery('.applyFont').ddTableFilter();	
	</script>
	<!--Javascript-->
	<script type="text/javascript">
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
</html>

		