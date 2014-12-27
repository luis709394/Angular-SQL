<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=ISO-8859-1");

// include the configuration file and the Currency model file
include_once ("config.php");
include_once ("Currency.php");



try {
	$db = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbpass);
	$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


		$stmt = $db -> query('SELECT * FROM currencies');

		# Map results to object
		$result = $stmt -> fetchAll(PDO::FETCH_CLASS, 'Currency');

// encode the result to a JSON object 
	echo json_encode($result);

} catch(PDOException $ex) {
	
	$outp = array('error'=>$ex -> getMessage());
	echo json_encode($outp);
}


