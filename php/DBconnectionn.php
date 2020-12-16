<?php
//getting database requirements

$serverName = "localhost";
$userName ="root";
$dbPassword = "";
$dbName ="graphdatabase";

//try to establish connection
$conn = new mysqli($serverName,$userName,$dbPassword,$dbName);

//check if connection was established
if ($conn -> connect_error) {
	echo "error while making connection..";
}

?>