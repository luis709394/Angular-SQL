<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=ISO-8859-1");

// include the configuration file and the Rate model file
include_once ("config.php");
include_once ("Rate.php");

// get the name of currency from the url
$currencyName=$_GET['currency'];



try {
	$db = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbpass);
	$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


		$stmt = $db -> prepare('SELECT currency, exchange, cash FROM rates WHERE currency= :currencyName');
         $stmt->bindParam(':currencyName', $currencyName);
		$stmt->execute();

		# Map results to object
		$result = $stmt -> fetchAll(PDO::FETCH_CLASS, 'Rate');

// encode the result to a JSON object 
	echo json_encode($result);

} catch(PDOException $ex) {
	
	$outp = array('error'=>$ex -> getMessage());
	echo json_encode($outp);
}


