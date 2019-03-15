<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" >
	<link href="../css/style.css" type="text/css" rel="stylesheet" >
	<title>Conference Schedule</title>
</head>
<body>
	<?php 
		// Loads in database connection, called $connection
		include_once("../config/database.php")
	?>

	<?php 
		$friday_sessions = 
			execute("SELECT *, Session.id AS session_id FROM Session ".
				"INNER JOIN Speaking ON Speaking.session_id=Session.id ".
				"INNER JOIN Attendee ON Speaking.attendee_id=Attendee.id ".
				"WHERE start_time < '2019-04-05 23:59:59' ".
				"ORDER BY start_time ASC");
		$sat_sessions = 
			execute("SELECT * FROM Session ".
				"INNER JOIN Speaking ON Speaking.session_id=Session.id ".
				"INNER JOIN Attendee ON Speaking.attendee_id=Attendee.id ".
				"WHERE start_time >= '2019-04-05 23:59:59' ".
				"ORDER BY start_time ASC");

		function getTableRow($row) {
			return "<tr>".
						"<td>".date("H:i",strtotime($row["start_time"]))."</td>". 
						"<td>".$row["name"]."</td>".
						"<td>".$row["first_name"]." ".$row["last_name"]."</td>".
						"<td>".ucwords(strtolower($row["conf_room"]))."</td>".
						"<td>".
							"<a href='./edit-session.php?id=".$row["session_id"]."'>Edit</a>".
						"</td>".
					"</tr>";
		}
	?>

	<br>
	<h1>Conference Schedule</h1>
	<hr>
	<br>
	<div class="row">
		<div class="col-lg centered">
			<h2>Friday Schedule</h2>
			<hr>
			<table>
				<tr>
					<th>Time</th>
					<th>Session Name</th>
					<th>Session Speaker</th>
					<th>Location</th>
					<th></th>
				</tr>
				<?php
					while ($row = $friday_sessions->fetch()) {
						echo getTableRow($row);
					}
				?>
			</table>
		</div>
		<div class="col-lg centered">
			<h2>Saturday Schedule</h2>
			<hr>
			<table>
				<tr>
					<th>Time</th>
					<th>Session Name</th>
					<th>Session Speaker</th>
					<th>Location</th>
					<th></th>
				</tr>
				<?php 
					while ($row = $sat_sessions->fetch()) {
						echo getTableRow($row);
					}
				?>
			</table>
		</div>
	</div>
	<br><br><br><br><br><br>
	<?php include_once("../components/footer.php")?>
</body>
</html>