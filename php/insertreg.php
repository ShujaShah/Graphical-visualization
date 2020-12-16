
<?php
 include "DBconnectionn.php";


$std_name=$_GET['studentname'];
$std_roll=$_GET['enroll'];
$std_sem=$_GET['semester'];
$std_sec=$_GET['section'];
$std_addr=$_GET['stdaddress'];

// $c=new mysqli($serverName,$userName,$userPassword,$databaseName);
// if ($conn->connect_error) {
// 	echo "something is wrong in database.... ";
// }
// else

$sql = "INSERT INTO registered_students (studentname,enroll,semester,section,stdaddress) values ('$std_name','$std_roll','$std_sem','$std_sec','$std_addr')";
if($conn->query($sql) === TRUE)
	{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                       window.alert('Member Added Succesfully')
                       window.location.href='../pages/registration.html'; </SCRIPT>");
    
   
    }
     
	else
	{

	  echo "error occured or data inserted already present";
	  }
	
// mysql_select_db('graphdatabase');
//    $retval = mysql_query( $sql, $conn );

   
   // if(!$retval ) {
   //    die('Could not enter data: ' . mysql_error());
   
   // header('Location: ../pages/pie.html');
   // echo "Entered data successfully\n";
   
   // mysql_close($conn);
?>