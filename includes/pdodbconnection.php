<?php
$dsn = 'mysql:host=localhost;dbname=angularjs';
$dbuser = "root";//"retail_dev";
$dbpass = "root";//"retail@dev";
$db = new PDO($dsn, $dbuser, $dbpass);
if ($db) {
//	echo "connection sucessfull";
} else {
	$dberror = $db->errorInfo();
	echo "Error code : " . $dberror[1] . "<br>";
	echo "Error name : " . $dberror[2] . "<br>";
}
?>
