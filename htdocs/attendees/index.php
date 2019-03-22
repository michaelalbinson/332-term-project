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
		$sponsors = execute("SELECT * FROM Attendee WHERE Attendee.type = 'Sponsor' ");
		$committee_options = execute("SELECT name FROM Subcommittee");

		function getTableRow($row) {
			return "<tr>".
					"<td>".$row["id"]."</td>".
					"<td>".$row["first_name"]."</td>".
					"<td>".$row["last_name"]."</td>".
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
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th></th>
				</tr>
				<?php
					while ($row = $students->fetch()) {
						echo getTableRow($row);
					}
				?>
			</table>
		</div>
		<div class="col-lg centered">
			<h2>Professionals</h2>
			<hr>
			<table>
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th></th>
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
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th></th>
				</tr>
				<?php
					while ($row = $sponsors->fetch()) {
						echo getTableRow($row);
					}
				?>
			</table>
		</div>
  </div>
	<hr>
	<br>
	<div class="row">
		<div class='col-lg centered'>
			<h5>Subcommittee <br><br>
					<form action="./committees.php" method="GET">
						<select name="subcommittee">
							<?php
								while ($next = $committee_options->fetch()) {
									echo buildSelect($next);
								}
							?>
						</select>
						<br><br>
						<input class="btn btn-success" type="submit" value="View" />
					</form>
			</h5>
		</div>
	</div>
	<hr>
	<br>
	<h5>Room</h5>
	<form action="./display_room.php" method="GET">
		<label for="room">Number</label>
		<input type="text" name="room_id">
		<br><br>
		<input class="btn btn-success" type="submit" value="Submit" />
	</form>
	<hr>
	<br>
	<div class="row">
		<div class='col-lg centered'>
			<h5><a href='./add_attendee.php'> Add Attendees </a></h5>
		</div>
	</div>


	<br><br><br><br><br><br>
	<?php include_once("../components/footer.php")?>
</body>
</html>
