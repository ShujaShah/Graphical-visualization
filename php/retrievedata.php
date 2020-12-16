

<script type="text/javascript" src="fusioncharts.js"></script>
<script type="text/javascript" src="fusioncharts.charts.js"></script>
<?php
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

  // Form the SQL query that returns the top 10 most populous countries
  $strQuery = "SELECT std_name, std_roll, java_given, java_at, networking_given, networking_at, wireless_given, wireless_at, multi_given, multi_at, ai_given, ai_at FROM attendance ORDER BY std_roll";

  // Execute the query, or else return the error message.
  $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

  // If the query returns a valid response, prepare the JSON string
  if ($result) {
    // The `$arrData` array holds the chart attributes and data
    $arrData = array(
      "chart" => array(
          "caption" => "Attendace chart of students",
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


 ?><div id="chart-1"></div><?php
    /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

   $jsonEncodedData = json_encode($arrData);

    /*Create an object for the column chart  using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

    $columnChart = new FusionCharts("mscolumn3d", "myFirstChart" , 1000, 500, "chart-1", "json", $jsonEncodedData);

    // Render the chart
    $columnChart->render();

    // Close the database connection
 
  }
   $dbhandle->close();
?>

