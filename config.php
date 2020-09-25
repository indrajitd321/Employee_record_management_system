<?php
date_default_timezone_set("Asia/Kolkata"); 

$server = "localhost"; 	// often localhost
$username = "root"; 			// Your mysqli server username
$password = ""; 			// Your mysqli server password
$database = "emp";			// If you fill in nothing database 'members' will be used. If 'members' doesn't exist it will be created.
$DBprefix = "";			// the prefix for the tables in the database (can be left blank)
$hnm=$_SERVER['HTTP_HOST'];
$expl=explode(".",$hnm);
if($expl[0]=="www"){$hn=$expl[1];}else{$hn=$expl[0];}
$TripodSupport = false;			// Only set this to true if you are hosted on tripod.

// ErrorStrings:
$couldNotConnectmysqli = "Could not connect to Server<BR>\n please check your settings in config.php";
$couldNotOpenDatabase = "Could not open database<BR>\n please check your settings in config.php";

if ($DBprefix != ""){$DBprefix = $DBprefix . "_";}

// Code to make sure that the $database field was filled and code to connect to the database

	// connect or show an error.
	$conn = @mysqli_connect($server,$username,$password) or die ($couldNotConnectmysqli); 
	mysqli_select_db($conn,$database) or die ($couldNotOpenDatabase);


?>