<?php
//getting database requirements

$serverName = "localhost";
$userName ="root";
$dbPassword = "";
$dbName ="graphdatabase";

//try to establish connection
$cn = new mysqli($serverName,$userName,$dbPassword,$dbName);

//check if connection was established
if ($cn -> connect_error) {
	echo "error while making connection..";
}

?>