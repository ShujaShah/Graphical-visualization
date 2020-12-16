<?php
//setting header to json
// header('Content-Type: application/json');

//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'graphdatabase');
$userName=$_GET['username'];
$userPassword=$_GET['userpassword'];
$usertype=$_GET['usertype'];

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
if($usertype==admin){
$query = "SELECT username,userpassword FROM signup_details ";
$result = $mysqli->query($query);

// $row = $result->fetch_assoc();
while ($row=$result->fetch_assoc()) {
	# code...


 // $row = mysqli_fetch_array($result);
if(($userName==$row['username'])&&($userPassword==$row['userpassword'])){
	header("Location:../pages/index.html");
}


}
echo "incorrect password";
}elseif ($usertype==student) {
	$query = "SELECT username,userpassword FROM signup_details ";
$result = $mysqli->query($query);

// $row = $result->fetch_assoc();
while ($row=$result->fetch_assoc()) {
	# code...


 // $row = mysqli_fetch_array($result);
if(($userName==$row['username'])&&($userPassword==$row['userpassword'])){
	header("Location:../pages/student.html");
}


}
echo "incorrect password";
}
?>