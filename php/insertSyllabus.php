<?php
 include "DBconnectionn.php";
// $databaseName="graphdatabase";

$java_comp=$_GET['javaStats'];
$net_comp=$_GET['netStats'];
$wire_comp=$_GET['wireStats'];
$mul_comp=$_GET['mulStats'];
$ai_comp=$_GET['aiStats'];
// $c=new 
//query to get data from the table
// $sql = "INSERT INTO syllabus_details (java_comp,net_comp,wire_comp,mul_comp,ai_comp) values ('$java_comp', '$net_comp' ,'$wire_comp', '$mul_comp', '$ai_comp')";

$sql="UPDATE syllabus_details SET java_comp='$java_comp',net_comp='$net_comp',wire_comp='$wire_comp',mul_comp='$mul_comp',ai_comp='$ai_comp' WHERE 1";

 if($conn->query($sql) === TRUE)
	{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                       window.alert('Syllabus Updated Succesfully')
                       window.location.href='../pages/SyllabusStats.html'; </SCRIPT>");
    
   
    }
     
	else
	{

	  echo "error occured or data updated already present";
	 }
   // // echo "Entered data successfully\n";
   
   // mysql_close($conn);
?>