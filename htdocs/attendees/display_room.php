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
		$id = $_GET['room_id'];
		$room_members = execute("SELECT * FROM Attendee WHERE Attendee.room_number = ".$id);
		$room = singleRowExecute("SELECT * FROM Room WHERE id=".$id);
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
													echo "<h2>Students in room ".$id."</h2>"
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
                                	$cnt = 0;
                                        while ($row = $room_members->fetch()) {
                                        		$cnt++;
                                                echo getTableRow($row);
                                        }
                                ?>
                        </table>
                        <br>
                        <strong><i>Beds Used: <?php echo $cnt."/".$room["num_beds"] ?></i></strong>
                </div>
	</div>
	<br><br><br>
	<h5><a href='../attendees'>Back</a></h5>

	<div class="push"></div>
	<?php include_once("../components/footer.php")?>
	</body>
	</html>
