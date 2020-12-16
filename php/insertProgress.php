<?php
include "DBconnectionn.php";
// $serverName="localhost";
// $userName="root";
// $userPassword="";
// $conn = mysql_connect($serverName, $userName, $userPassword);
// // $databaseName="graphdatabase";

$std_name=$_GET['std_name'];
$std_roll=$_GET['std_roll'];
$java_marks=$_GET['jG'];
$java_obt=$_GET['jA'];
$net_marks=$_GET['nG'];
$net_obt=$_GET['nA'];
$wire_marks=$_GET['wG'];
$wire_obt=$_GET['wA'];
$mul_marks=$_GET['mG'];
$mul_obt=$_GET['mA'];
$ai_marks=$_GET['aG'];
$ai_obt=$_GET['aA'];
// $c=new mysqli($serverName,$userName,$userPassword,$databaseName);



//query to get data from the table
$sql = "INSERT INTO progress_report (std_name, std_roll, java_marks, java_obt, net_marks, net_obt, wire_marks, wire_obt, mul_marks, mul_obt, ai_marks, ai_obt) values ('$std_name', '$std_roll' ,'$java_marks', '$java_obt', '$net_marks', '$net_obt', '$wire_marks', '$wire_obt', '$mul_marks', '$mul_obt', '$ai_marks', '$ai_obt')";

 if($conn->query($sql) === TRUE)
	{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                       window.alert('Marks Added Succesfully')
                       window.location.href='../pages/ProgressReport.html'; </SCRIPT>");
    
   
    }
     
	else
	{

	  echo "error occured or data inserted already present";
	 
}
   
   // if(! $retval ) {
   //    die('Could not enter data: ' . mysql_error());
   // }
   
    // echo "Entered data successfully\n";
  // header("Location:../pages/progressbar.html")
   
   // mysql_close($conn);
?>