<?php
 include "DBconnectionn.php";
// $serverName="localhost";
// $userName="root";
// $userPassword="";
// $conn = new mysqli($serverName, $userName, $userPassword,"graphdatabase");
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
// if ($conn->connect_error) {
// 	echo "something is wrong in database.... ";
// }
// else
// {

//query to get data from the table
$sql = "INSERT INTO attendance (std_name, std_roll, java_given, java_at, networking_given, networking_at, wireless_given, wireless_at, multi_given, multi_at, ai_given, ai_at) values ('$std_name', '$std_roll' ,'$java_marks', '$java_obt', '$net_marks', '$net_obt', '$wire_marks', '$wire_obt', '$mul_marks', '$mul_obt', '$ai_marks', '$ai_obt')";



	
// mysql_select_db('graphdatabase');
//    $retval = mysqli_query( $sql, $conn );
 if($conn->query($sql) === TRUE)
	{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                       window.alert('Attendence Added Succesfully')
                       window.location.href='../pages/Attendence.html'; </SCRIPT>");
    
   
    }
     
	else
	{

	  echo "error occured or data inserted already present";
	 
    }
?>