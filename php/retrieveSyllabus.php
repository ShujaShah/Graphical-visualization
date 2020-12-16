<script type="text/javascript" src="fusioncharts.js"></script>
<script type="text/javascript" src="fusioncharts.charts.js"></script><?php

/*Include the `fusioncharts.php` file that contains functions
	to embed the charts.
*/
  include("fusioncharts.php");

  /* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection.   */

   $hostdb = "localhost";  // MySQl host
   $userdb = "root";  // MySQL username
   $passdb = "";  // MySQL password
   $namedb = "graphdatabase";  // MySQL database name

   // Establish a connection to the database
   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

   // Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect
   if ($dbhandle->connect_error) {
  	exit("There was an error with your connection: ".$dbhandle->connect_error);
   }

?>

<html>
   <head>
  	<title>FusionCharts XT - Column 2D Chart - Data from a database</title>
	  <link  rel="stylesheet" type="text/css" href="css/style.css" />

	<!--  Include the `fusioncharts.js` file. This file is needed to render the chart. Ensure that the path to this JS file is correct. Otherwise, it may lead to JavaScript errors. -->

      <script src="fusioncharts/fusioncharts.js"></script>
   </head>
   <body>
  	<?php

     	// Form the SQL query that returns the top 10 most populous countries
     	$strQuery = "SELECT * FROM syllabus_details";

     	// Execute the query, or else return the error message.
     	$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

     	// If the query returns a valid response, prepare the JSON string
     	if ($result) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
                "chart" => array(
                    "caption" => "syllabus completion percentage",
                    "numberSuffix"=> "%",
                    "showAxisLines"=> "1",
                    "showValues"=> "0",
                    "theme"=> "zune"
              	)
           	);

        	$arrData["data"] = array();

	// Push the data into the array

        	while($row = mysqli_fetch_array($result)) {
           	array_push($arrData["data"], array(
                "label" => "JAVA",
                "value" => $row["java_comp"]
              	),

            array(
                "label" => "WIRELESS",
                "value" => $row["wire_comp"]
                ),

                array(
                "label" => "NETWORKING",
                "value" => $row["net_comp"]
                ),

                array(
                "label" => "MULTIMEDIA",
                "value" => $row["mul_comp"]
                ),

                array(
                "label" => "ARTIFICIAL INTELLIGENCE",
                "value" => $row["ai_comp"]
                )
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData = json_encode($arrData);

        	/*Create an object for the column chart. Initialize this object using the FusionCharts PHP class constructor. The constructor is used to initialize the chart type, chart id, width, height, the div id of the chart container, the data format, and the data source. */

        	$columnChart = new FusionCharts("bar3D", "myFirstChart" , 700, 500, "chart-1", "json", $jsonEncodedData);

        	// Render the chart
        	$columnChart->render();

        	// Close the database connection
        	$dbhandle->close();

     	}

  	?>
  	<div id="chart-1"><!-- Fusion Charts will render here--></div>
   </body>
</html>