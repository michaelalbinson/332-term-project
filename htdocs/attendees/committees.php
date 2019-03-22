<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" >
	<link href="../css/style.css" type="text/css" rel="stylesheet" >
	<title>Conference Intake</title>
</head>
<body>
	<?php
		// Loads in database connection, called $connection and some helper functions
		include_once("../config/database.php")
	?>

	<?php
		$subcomm = $_GET["subcommittee"];
		$SQL = "SELECT Organizer.id, first_name, last_name FROM Organizer, Subcommittee WHERE name = '".$subcomm."'";
		$members = execute($SQL);

		function getTableRow($row) {
			return "<tr>".
					"<td>".$row["id"]."</td>".
					"<td>".$row["first_name"]."</td>".
					"<td>".$row["last_name"]."</td>".
				"</tr>";
		}
	?>
	<hr>
				<br>
				<div class="row">
								<div class="col-lg centered">
												<?php
													echo "<h2>Members of ".$subcomm."</h2>"
												?>
												<hr>
												<table>
																<tr>
																				<th>ID</th>
																				<th>First Name</th>
																				<th>Last Name</th>
																				<th></th>
																</tr>
																<?php
																				while ($row = $members->fetch()) {
																								echo getTableRow($row);
																				}
																?>
												</table>
								</div>
	</div>
	<br><br><br>
	<h5><a href='../attendees'>Back</a></h5>

	<div class="push"></div>
	<?php include_once("../components/footer.php")?>
	</body>
	</html>

	<hr>
