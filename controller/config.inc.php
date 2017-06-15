<?php

// $db_username        = 'root'; //MySql database username
// $db_password        = ''; //MySql dataabse password
// $db_name            = 'juchimello'; //MySql database name
// $db_host            = 'localhost'; //MySql hostname or IP

$db_username        = 'chiapadesign'; //MySql database username
$db_password        = 'queroveragora10'; //MySql dataabse password
$db_name            = 'chiapadesign'; //MySql database name
$db_host            = 'localhost'; //MySql hostname or IP

$currency			= '&#82;&#36;'; //currency symbol
$shipping_cost		= 1.50; //shipping cost
// $taxes				= array( //List your Taxes percent here.
// 						'VAT' => 12, 
// 						'Service Tax' => 5,
// 						'Other Tax' => 10
// );
$mysqli_conn = mysqli_connect($db_host, $db_username, $db_password,$db_name);

$sql= "SET NAMES 'utf8'";
mysqli_query($mysqli_conn, $sql);
$sql = 'SET character_set_connection=utf8';
mysqli_query($mysqli_conn, $sql);
$sql ='SET character_set_client=utf8';
mysqli_query($mysqli_conn, $sql);
$sql ='SET character_set_results=utf8';
mysqli_query($mysqli_conn, $sql);

if ($mysqli_conn->connect_error) {//Output any connection error
    die('Error : ('. $mysqli_conn->connect_errno .') '. $mysqli_conn->connect_error);
}?>
