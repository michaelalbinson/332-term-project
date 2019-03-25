<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" >
	<link href="../css/style.css" type="text/css" rel="stylesheet" >
	<title>Conference Attendees</title>
</head>
<body>
	<?php
		// Loads in database connection, called $connection
		include_once("../config/database.php")
	?>

	<?php
		$students = execute("SELECT * FROM Attendee WHERE Attendee.type = 'Student' ");
		$professionals = execute("SELECT * FROM Attendee WHERE Attendee.type = 'Professional' ");
		$sponsors = execute("SELECT Attendee.first_name, Attendee.last_name, Attendee.ID, Sponsor.name, Sponsor.id AS spons_id FROM Attendee INNER JOIN Sponsor ON  Attendee.sponsor_id=Sponsor.id WHERE Attendee.type = 'sponsor'");

		$committee_options = execute("SELECT name FROM Subcommittee");

		function getStudentRow($row) {
			return "<tr>".
					"<td>".$row["first_name"]."</td>".
					"<td>".$row["last_name"]."</td>".
					"<td><a href='./display_room.php?room_id=".$row["room_number"]."'>".$row["room_number"]."</a></td>".
				"</tr>";
		}

		function getTableRow($row) {
			return "<tr>".
					"<td>".$row["first_name"]."</td>".
					"<td>".$row["last_name"]."</td>".
				"</tr>";
		}

		function getSponsorRow($row) {
			return "<tr>".
					"<td>".$row["first_name"]."</td>".
					"<td>".$row["last_name"]."</td>".
					"<td><a href='/sponsors/sponsor_details.php?id=".$row["spons_id"]."'>".$row["name"]."</td>".
				"</tr>";
		}


		function buildSelect($next) {
			return "<option value=\"".$next["name"]."\">".$next["name"]."</option>";
		}
	?>

	<br>
	<h1>Conference Attendees</h1>
	<hr>
	<br>
	<div class="row">
		<div class="col-lg centered">
			<h2>Students</h2>
			<hr>
			<table>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Room Number</th>
				</tr>
				<?php
					while ($row = $students->fetch()) {
						echo getStudentRow($row);
					}
				?>
			</table>
		</div>
		<div class="col-lg centered">
			<h2>Professionals</h2>
			<hr>
			<table>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
				</tr>
				<?php
					while ($row = $professionals->fetch()) {
						echo getTableRow($row);
					}
				?>
			</table>
		</div>
		<div class="col-lg centered">
			<h2>Sponsors</h2>
			<hr>
			<table>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Sponsor Name</th>
					<th></th>
				</tr>
				<?php
					while ($row = $sponsors->fetch()) {
						echo getSponsorRow($row);
					}
				?>
			</table>
		</div>
  </div>
	<hr>
	<br>
	<div class="row">
		<div class='col-lg align-items-center'>
			<h5>View Subcommittee</h5>
			<hr>
			<form action="./committees.php" method="GET" class="text-center">
				<select name="subcommittee" class="half">
					<?php
						while ($next = $committee_options->fetch()) {
							echo buildSelect($next);
						}
					?>
				</select>
				<br><br>
				<input class="btn btn-success" type="submit" value="View" />
			</form>
		</div>
		<div class="col-lg centered">
			<h5>View Room</h5>
			<hr>
			<form action="./display_room.php" method="GET">
				<label for="room">Number</label>
				<input type="text" name="room_id">
				<br><br>
				<input class="btn btn-success" type="submit" value="Submit" />
			</form>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class='col-lg centered'>
			<h5><a href='./add_attendee.php'>Add Attendee</a></h5>
		</div>
	</div>


	<br><br><br><br><br><br>
	<?php include_once("../components/footer.php")?>
</body>
</html>
