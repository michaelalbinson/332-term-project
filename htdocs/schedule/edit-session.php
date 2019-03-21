<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" >
	<link href="../css/style.css" type="text/css" rel="stylesheet" >
	<title>Edit Session</title>
</head>
<body>
	<?php 
		// Loads in database connection, called $connection and some helper functions
		include_once("../config/database.php")
	?>

	<?php 
		$id = $_GET['id'];
		$res = singleRowExecute("SELECT * FROM Session WHERE id=$id");
		$sessionDate=date('Y:m:d', strtotime($res['start_time']));
		$sessionTime=date("H:i",strtotime($res["start_time"]));
		$room = $res['conf_room'];

		$room_options = ["Etherington 5", "Dupuis Hall", "Stirling 53", 
			"Dunning 101", "Arc 90"];

		$date_options = ["2019-04-05", "2019-04-06"];

		function buildSelect($name, $options, $selected) {
			$res = "<select name='$name'>";
			for ($i = 0; $i < count($options); ++$i) {
				if (strtoupper($options[$i]) == $selected) {
					$res = $res."<option value='$options[$i]' selected='selected'>$options[$i]</option>";
				} else {
					$res = $res."<option value='$options[$i]'>$options[$i]</option>";
				}
			}

			$res = $res."</select>";
			return $res;
		}
	?>

	<br>
	<h1>Edit Session</h1>
	<hr>
	<form action="./update-session.php" method="GET">
		<label for="name">Session Name</label>
		<input type="text" name="name" value="<?php echo $res['name'] ?>">

		<br><br>
		<label for="day">Session Date</label>
		<?php echo buildSelect("day", $date_options, str_replace(":", "-", $sessionDate)) ?>

		<br><br>
		<label for="time">Session Time</label>
		<?php echo "<input type='time' name='time' value='$sessionTime'/>" ?>

		<br><br>
		<label for="conf_room">Session Location</label>
		<?php echo buildSelect("conf_room", $room_options, $room) ?>

		<br><br>
		<input class="btn btn-success" type="submit" value="Submit" />
		<a href="/schedule" class="btn btn-warning">Cancel</a>

		<?php echo "<input type='hidden' name='id' value='$id'>" ?>
	</form>
	<div class="push"></div>
	<?php include_once("../components/footer.php")?>
</body>
</html>