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

        ?>
	
	<br>
	<h1>View Rooms</h1>
	<hr>
	<br>
	<form action="./display_room.php" method="GET">
		<label for="room">Room Number</label>
		<input type="text" name="room_id" value"Enter room number">
		
		<br><br>
		<input class="btn btn-success" type="submit" value="Submit" />
	</form>
	<div class="push"></div>
	<?php include_once("../components/footer.php")?>	

</body>
</html>
