<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" >
	<link href="../css/style.css" type="text/css" rel="stylesheet" >
	<title>Conference Sponsors</title>
</head>
<body>
	<br>
	<h1>Conference Sponsors</h1> 
	<hr>
	<br>

	<?php 
		// Loads in database connection, called $connection
		include_once("../config/database.php")
	?>

	<?php
		$result = execute("SELECT * FROM Sponsor");


		function getTableRow($row) {	
			if ($row["num_emails_sent"] == NULL) {
				$row["num_emails_sent"] = 0; 
			}

			if ($row["email_address"] == NULL) {
				$row["email_address"] = "random@mail.com";
			}

			return "<tr>".
			 "<td> <a href='sponsor_details.php?id=".$row['id'] . "'>".$row['name']."</a></td>". //builds the link
			 "<td>" .ucfirst($row['tier']). "</td>".
			 "<td>" . $row['num_emails_sent'] . "</td>".
			 "<td><a href='mailto:".$row['email_address']."'>" . $row['email_address'] . "</a></td>".
			 "</tr>";
		}	

	?>

	<table>
		<tr>
			<th>Name</th>
			<th>Tier</th>
			<th># emails sent</th>
			<th>Email Address</th>
		</tr>
		<?php 
        	while($row = $result->fetch()) {
                echo getTableRow($row);
            } 
    	?>    
	</table>
	<br>
	<input type="button" onclick="location.href='new_sponsor.php';" value="Add Sponsor" class="btn btn-primary"/>
	<input class="btn btn-success" type= "button" onclick="location.href='jobs.php';" value="View all Jobs" />
	

	<br><br><br><br><br><br><br>
	<?php include_once("../components/footer.php")?>
</body>
</html>