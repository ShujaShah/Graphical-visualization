<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'graphdatabase');
$conn = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$user_name=$_GET['userName'];
$user_pass=$_GET['userPass'];
$user_pass2=$_GET['userPass2'];

//get connection
// $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$conn){
	die("Connection failed: " . $mysqli->error);
}
if($user_pass===$user_pass2)
{
//query to get data from the table
$sql = "INSERT INTO signup_details (username,userpassword) values ('$user_name', '$user_pass')";
	
mysql_select_db('graphdatabase');
   $retval = mysql_query( $sql, $conn );

   
   // if(! $retval ) {
   //    die('Could not enter data: ' . mysql_error());
   // }
   header('Location: ../pages/signupSuccess.html');
   // // echo "Entered data successfully\n";
   }
   else
  echo "passwords do not match";

?>