<!DOCTYPE html>
<html>
<head>
    <title>General Chart</title>
    <link type="text/css" rel="stylesheet" href="css/default.css" />





     <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">




</head>
<script type="text/javascript" src="fusioncharts.js"></script>
<script type="text/javascript" src="fusioncharts.charts.js"></script>

<?php
$id=$_GET['enroll'];
//echo $id;
//header('Content-Type: application/json');
  include("fusioncharts.php");
 $hostdb = "127.0.0.1";  // MySQl host
 $userdb = "root";  // MySQL username
 $passdb = "";  // MySQL password
 $namedb = "graphdatabase";  // MySQL database name

 // Establish a connection to the database
 $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

 // Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect
 if ($dbhandle->connect_error) {
  exit("There was an error with your connection: ".$dbhandle->connect_error);
 }

$strQuery = "SELECT * FROM attendance Where std_roll='$id'";

$strQuery2 = "SELECT * FROM `progress_report` WHERE std_roll='$id'";

$strQuery3 = "SELECT id FROM registered_students";

 	$strQuery4 = "SELECT * FROM syllabus_details";

 	////attendance///////
 	 $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

  // If the query returns a valid response, prepare the JSON string
  if ($result) {
    // The `$arrData` array holds the chart attributes and data
    $arrData = array(
      "chart" => array(
          "caption" => "Attendace chart of '$id'",
          "paletteColors" => "#0075c2",
          "bgColor" => "#ffffff",
          "borderAlpha"=> "20",
          "canvasBorderAlpha"=> "0",
          "usePlotGradientColor"=> "0",
          "plotBorderAlpha"=> "10",
          "showXAxisLine"=> "1",
          "xAxisLineColor" => "#999999",
          "showValues" => "0",
          "divlineColor" => "#999999",
          "divLineIsDashed" => "1",
          "showAlternateHGridColor" => "0"
        )
    );

    $arrJava = array();
    $arrNetworking=array();
    $arrMulti=array();
    $arrAI = array();
    $arrWireless = array();
    $categoryArray=array();


    // Push the data into the array
    while($row = mysqli_fetch_array($result)) {

        // pushing category array values
            array_push($categoryArray, array(
            "label" => $row['std_name'].'@'.$row['std_roll']
            
          )
        );

      array_push($arrJava, array(
   
          "value" => $row["java_at"]
        //  "backgroundColor" =>$row["(255, 145, 65, 0.5"]
        
         
       //   "backgroundColor" =>$row["(255, 0, 0, 1"]
          )
      );
      array_push($arrMulti, array(
   
          // "label" => "Multi Atendance",
          "value" => $row["multi_at"]
        //  "backgroundColor" =>$row["(255, 145, 65, 0.5"]
        
         
       //   "backgroundColor" =>$row["(255, 0, 0, 1"]
          )
      );
      array_push($arrNetworking, array(
   
          "value" => $row["networking_at"]
        //  "backgroundColor" =>$row["(255, 145, 65, 0.5"]
        
         
       //   "backgroundColor" =>$row["(255, 0, 0, 1"]
          )
      );
      array_push($arrWireless, array(
   
          "value" => $row["wireless_at"]
        //  "backgroundColor" =>$row["(255, 145, 65, 0.5"]
        
         
       //   "backgroundColor" =>$row["(255, 0, 0, 1"]
          )
      );
      array_push($arrAI, array(
   
          "value" => $row["ai_at"]
        //  "backgroundColor" =>$row["(255, 145, 65, 0.5"]
        
         
       //   "backgroundColor" =>$row["(255, 0, 0, 1"]
          )
      );
    }


 $arrData["categories"]=array(array("category"=>$categoryArray));

  // creating dataset object
      $arrData["dataset"] = array(
        array("seriesName"=> "JAVA", "data"=>$arrJava),
         array("seriesName"=> "Multimedia", "data"=>$arrMulti),
         array("seriesName"=> "Networking", "data"=>$arrNetworking),
         array("seriesName"=> "Wireless", "data"=>$arrWireless),
         array("seriesName"=> "Artificial Intelligence", "data"=>$arrAI)
       );

   $jsonEncodedData = json_encode($arrData);

    /*Create an object for the column chart  using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

    $columnChart = new FusionCharts("mscolumn3d", "myFirstChart" , 400, 300, "chart-1", "json", $jsonEncodedData);

    // Render the chart
   $columnChart->render();

    // Close the database connection
 
  }
///////attendance//////

      ////////progress report///////
      $result2 = $dbhandle->query($strQuery2) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

  // If the query returns a valid response, prepare the JSON string
  if ($result2) {
    // The `$arrData` array holds the chart attributes and data
    $arrData2 = array(
      "chart" => array(
          "caption" => "Progress Report  chart of '$id'",
          "paletteColors" => "#0075c2",
          "bgColor" => "#ffffff",
          "borderAlpha"=> "20",
          "canvasBorderAlpha"=> "0",
          "usePlotGradientColor"=> "0",
          "plotBorderAlpha"=> "10",
          "showXAxisLine"=> "1",
          "xAxisLineColor" => "#999999",
          "showValues" => "0",
          "divlineColor" => "#999999",
          "divLineIsDashed" => "1",
          "showAlternateHGridColor" => "0"
        )
    );

    $arrJava2 = array();
    $arrNetworking2=array();
    $arrMulti2=array();
    $arrAI2 = array();
    $arrWireless2 = array();
    $categoryArray2=array();


    // Push the data into the array
    while($row2 = mysqli_fetch_array($result2)) {

        // pushing category array values
            array_push($categoryArray2, array(
            "label" => $row2['std_name']
          )
        );

      array_push($arrJava2, array(
   
          "value" => $row2["java_obt"]
        //  "backgroundColor" =>$row["(255, 145, 65, 0.5"]
        
         
       //   "backgroundColor" =>$row["(255, 0, 0, 1"]
          )
      );
      array_push($arrMulti2, array(
   
          // "label" => "Multi Atendance",
          "value" => $row2["mul_obt"]
        //  "backgroundColor" =>$row["(255, 145, 65, 0.5"]
        
         
       //   "backgroundColor" =>$row["(255, 0, 0, 1"]
          )
      );
      array_push($arrNetworking2, array(
   
          "value" => $row2["net_obt"]
        //  "backgroundColor" =>$row["(255, 145, 65, 0.5"]
        
         
       //   "backgroundColor" =>$row["(255, 0, 0, 1"]
          )
      );
      array_push($arrWireless2, array(
   
          "value" => $row2["wire_obt"]
        //  "backgroundColor" =>$row["(255, 145, 65, 0.5"]
        
         
       //   "backgroundColor" =>$row["(255, 0, 0, 1"]
          )
      );
      array_push($arrAI2, array(
   
          "value" => $row2["ai_obt"]
        //  "backgroundColor" =>$row["(255, 145, 65, 0.5"]
        
         
       //   "backgroundColor" =>$row["(255, 0, 0, 1"]
          )
      );
    }


 $arrData2["categories"]=array(array("category"=>$categoryArray2));

  // creating dataset object
      $arrData2["dataset"] = array(
        array("seriesName"=> "JAVA", "data"=>$arrJava2),
         array("seriesName"=> "Multimedia", "data"=>$arrMulti2),
         array("seriesName"=> "Networking", "data"=>$arrNetworking2),
         array("seriesName"=> "Wireless", "data"=>$arrWireless2),
         array("seriesName"=> "Artificial Intelligence", "data"=>$arrAI2)
       );
      $jsonEncodedData2 = json_encode($arrData2);

    /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

    $columnChart2 = new FusionCharts("mscolumn3d", "myFirstChart2" ,  400, 300, "chart-2", "json", $jsonEncodedData2);

    // Render the chart
    $columnChart2->render();
}
///////progrss report///////////
///////registration//////
$result3 = $dbhandle->query($strQuery3) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

  // If the query returns a valid response, prepare the JSON string
  if ($result3) {
  	 $arrData3 = array(
                "chart" => array(
                    "caption"=> "Registered percentage of students",
                    "subCaption"=> " year 2018",
                    "enableSmartLabels"=> "0",
                    "showPercentValues"=> "1",
                    "showLegend"=> "1",
                    "decimals"=> "1",
                    "theme"=> "zune"
                )
            );
          $count=0;
            foreach ($result3 as $row3) {
    
    $count++;
}
$regS=$count;
$unregS=100-$regS;
//echo $count;
            /*
                The data to be plotted on the chart is stored in the `$actualData` array in the key-value form.
            */
            $actualData3 = array(
                "registered students" => $regS,
                "unregistered students" => $unregS
                //"Mid-age" => 1050700,
                //"Senior" => 491000
            );
            /*        Convert the data in the `$actualData` array into a format that can be consumed by FusionCharts. The data for the chart should be in an array wherein each element of the array is a JSON object having the "label" and “value” as keys.
            */
            $arrData3['data'] = array();
            // Iterate through the data in `$actualData` and insert in to the `$arrData` array.
            foreach ($actualData3 as $key => $value) {
                array_push($arrData3['data'],
                    array(
                        'label' => $key,
                        'value' => $value
                    )
                );
            }

            /*
                JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
            */
            $jsonEncodedData3 = json_encode($arrData3);
            /*
                Create an object for the pie chart  using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.
            */
            $pieChart = new FusionCharts("pie3D", "myFirstChart3" , 400, 300, "chart-3", "json", $jsonEncodedData3);
            // Render the chart
            $pieChart->render();
        }
        /////registration/////
        /////syllabus////////
        	$result4 = $dbhandle->query($strQuery4) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

     	// If the query returns a valid response, prepare the JSON string
     	if ($result4) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData4 = array(
                "chart" => array(
                    "caption" => "syllabus completion percentage",
                    "numberSuffix"=> "%",
                    "showAxisLines"=> "1",
                    "showValues"=> "0",
                    "theme"=> "zune"
              	)
           	);

        	$arrData4["data"] = array();

	// Push the data into the array

        	while($row4 = mysqli_fetch_array($result4)) {
           	array_push($arrData4["data"], array(
                "label" => "JAVA",
                "value" => $row4["java_comp"]
              	),

            array(
                "label" => "WIRELESS",
                "value" => $row4["wire_comp"]
                ),

                array(
                "label" => "NETWORKING",
                "value" => $row4["net_comp"]
                ),

                array(
                "label" => "MULTIMEDIA",
                "value" => $row4["mul_comp"]
                ),

                array(
                "label" => "ARTIFICIAL INTELLIGENCE",
                "value" => $row4["ai_comp"]
                )
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData4 = json_encode($arrData4);

        	/*Create an object for the column chart. Initialize this object using the FusionCharts PHP class constructor. The constructor is used to initialize the chart type, chart id, width, height, the div id of the chart container, the data format, and the data source. */

        	$columnChart4 = new FusionCharts("bar3D", "myFirstChart4" , 400, 300, "chart-4", "json", $jsonEncodedData4);

        	// Render the chart
        	$columnChart4->render();
        }
        ////	syallabus////////////
        $dbhandle->close();
        ?>
        <div  class="row">
     <div class="container">   
                
    <div  class=" col-lg-6 panel panel-default  ">
        <div id="chart-1"></div>
           </div>                
    <div class=" col-lg-6  panel panel-default">
         <div id="chart-2"></div>
     </div>
 </div>
</div>

<div  class="row">
     <div class="container">   
     <div class=" col-lg-6  panel panel-default">
          <div id="chart-3"></div>
      </div>
          <div class=" col-lg-6  panel panel-default">
           <div id="chart-4"></div>
       </div>
   
</div>
</div>

    