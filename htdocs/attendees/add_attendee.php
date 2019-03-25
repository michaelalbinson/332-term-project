<!DOCTYPE html>
<html>
<head>
        <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" >
        <link href="../css/style.css" type="text/css" rel="stylesheet" >
        <title>Conference Intake</title>
</head>
<body onload="change_display()">
	<script>
		function change_display() {
			var st = document.getElementById("st");
			var sp = document.getElementById("sp");
			var opt = document.getElementById("ty");
			if (opt.value === "student") {
				st.style.display = "block";
				sp.style.display = "none";
			} else if (opt.value === "sponsor") {
				st.style.display = "none";
				sp.style.display = "block";
			} else {
				st.style.display = "none";
				sp.style.display = "none";
			}
		}
		
	</script>

        <?php
                // Loads in database connection, called $connection and some helper functions
                include_once("../config/database.php")
        ?>

        <?php
        	$spons = execute("SELECT DISTINCT id, name FROM Sponsor");


        	function getOption($row) {
        		echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
        	}
		?>

	<br>
	<h1>Add Attendee</h1>
	<hr>
	<form action="./update_attendee.php" method="GET">
		<label for="first_name">Attendee's First Name</label>
		<input type="text" name="first_name" value="">
		
		<br><br>
		<label for="last_name">Attendee's Last Name</label>
		<input type="text" name="last_name" value="">

		<br><br>
		<label for="type">Type</label>
		<select id="ty"onchange="change_display()" name="type">
			<option value="professional">Professional</option>
			<option value="student">Student</option>
			<option value="sponsor">Sponser</option>
		</select>
		<br>
		<div id="st">
			<br>
			<label id="st" for="room_num">Hotel Room Number</label>
			<input id="st" type="text" name="room_num" value="">
		</div>
		<div id="sp">
			<br>
			<label id="sp" for="sponsor_id">Sponsor</label>
			<select name="sponsor_id">
				<option disabled="disabled" selected="selected">Select a Sponsor</option>
				<?php 
					while ($row = $spons->fetch()) {
						echo getOption($row);
					}
				?>
			</select>
		</div>
		<br>
		<input class="btn btn-success" type="submit" value="Submit" />
        	<a href="/attendees" class="btn btn-warning">Cancel</a>
	</form>

	<div class="push"></div>
        <?php include_once("../components/footer.php")?>
</body>
</html>


