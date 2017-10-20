<?php
// Rename this file env.php and insert the proper value for connection string
// from the Overview page of your Compose dashboard

$connection_string = 'postgres://username:password@servername.com:port/compose';

$conn = substr($connection_string, 11);
$endindex = strpos($conn, ":");
$dbuser = substr($conn, 0, $endindex);

$conn = substr($conn, $endindex+1);
$endindex = strpos($conn, "@");
$dbpass = substr($conn, 0, $endindex);

$conn = substr($conn, $endindex+1);
$endindex = strpos($conn, ":");
$host = substr($conn, 0, $endindex);

$conn = substr($conn, $endindex+1);
$endindex = strpos($conn, "/");
$port = substr($conn, 0, $endindex);

$dbname = substr($conn, $endindex+1);
?>