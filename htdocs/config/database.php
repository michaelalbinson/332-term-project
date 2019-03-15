<?php
	$username = "root";
	$pass = "";
	$dbName = "cmpe_332_project";

	#connect to the database
	$connection = new PDO("mysql:host=localhost;dbname=$dbName", $username, $pass);

	function execute($query) {
		$stmt = $GLOBALS['connection']->prepare($query); #create the query
		$stmt->execute([$query]); #bind the parameters
		return $stmt;
	}

	function singleRowExecute($query) {
		$stmt = $GLOBALS['connection']->prepare($query); #create the query
		$stmt->execute([$query]); #bind the parameters
		return $stmt->fetch();;
	}
	
?>
