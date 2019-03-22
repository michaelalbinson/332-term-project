<?php
        // Loads in database connection, called $connection and some helper functions
        include_once("../config/database.php")
?>

<?php
	$type = $_GET["type"];
	$first_name = $_GET["first_name"];
	$last_name = $_GET["last_name"];
	if ($type == "student") {
		$room_number = $_GET["room_num"];
		$SQL = "INSERT INTO Attendee(type, room_number, first_name, last_name) VALUES('".$type."', ".$room_number.", '".$first_name."', '".$last_name."')";
		echo $SQL;
		execute($SQL);
	} else if ($type == "sponsor") {
		$sponsor_id = $_GET["sponsor_id"];
		$SQL = "INSERT INTO Attendee(type, sponsor_id, first_name, last_name) VALUES('".$type."', ".$sponsor_id.", '".$first_name."', '".$last_name."')";
		execute($SQL);
	} else {
		$SQL = "INSERT INTO Attendee(type, first_name, last_name) VALUES('".$type."', '".$first_name."', '".$last_name."')";
		execute($SQL);
	}
	header('Location: '."/attendees");
?>
