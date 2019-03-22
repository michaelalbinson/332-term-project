<?php 
	// Loads in database connection, called $connection and some helper functions
	include_once("../config/database.php")
?>

<?php 
	$session_id= $_GET["id"];
	$name = $_GET["name"];
	$time = $_GET["time"];
	$day = $_GET["day"];
	$room = strtoupper($_GET["conf_room"]);
	$datetime = $day." ".$time;
	echo $datetime;

	$SQL = "UPDATE Session SET conf_room='$room', name='$name', start_time='$datetime' WHERE id=$session_id";
	execute($SQL);
	header('Location: '."index.php");
?>