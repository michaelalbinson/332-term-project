<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" >
	<link href="../css/style.css" type="text/css" rel="stylesheet" >
	<script type="text/javascript" src="../js/chart.js"></script>
	<title>Conference Intake</title>
</head>
<body>
	<?php 
		// Loads in database connection, called $connection
		include_once("../config/database.php")
	?>

	<?php 
		// for attendee analytics
		$res = singleRowExecute("SELECT count(id) as num_attendees FROM Attendee");
		$total_attendees = $res["num_attendees"];

		$res = execute("SELECT count(*) AS num, type FROM Attendee GROUP BY type");
		$row = $res->fetchAll();
		// $null = $row[0]["num"];
		$students = $row[0]["num"];
		$professionals = $row[1]["num"];
		$sponsors = $row[2]["num"];		

		$num_spons = singleRowExecute("SELECT count(id) as num_sponsors FROM Sponsor");
		$num_sponsors = $num_spons["num_sponsors"];

		// for sponsor analytics
		$res = singleRowExecute("SELECT COUNT(*) AS num_sponsors FROM Sponsor");
		$total_sponsors = $res["num_sponsors"];

		$res = execute("SELECT COUNT(*) AS num, tier FROM Sponsor GROUP BY tier");
		$row = $res->fetchAll();
		
		$bronze_num = $row[0]["num"];
		$silver_num = $row[1]["num"];
		$gold_num = $row[2]["num"];
		$platinum_num = $row[3]["num"];

		$spons = execute("SELECT * FROM Sponsor");
		$attendee = execute("SELECT * FROM Attendee");

		$bronze_intake = $bronze_num * 1000;
		$silver_intake = $silver_num * 3000;
		$gold_intake = $gold_num * 5000;
		$platinum_intake = $platinum_num * 10000;


		$spons_intake = $bronze_num * 1000 + $silver_num * 3000 + $gold_num * 5000 
		+ $platinum_num * 10000;

		$stu_intake = $students * 50;
		$pro_intake = $professionals * 100;
		$tot_intake = $spons_intake + $stu_intake + $pro_intake;

		$atten_intake = $stu_intake + $pro_intake;


		function getattendee($row) {	

			if($row["type"] == "student" || $row["type"] == "professional") {
				$cost = 0;
				if ($row["type"] == "student" ) {
					$cost = "$50"; 
				}
				else if ($row["type"] == "professional") {
					$cost = "$100";
				}

				return "<tr>".
					"<td>" .$row['first_name'] . "</td>". 
					"<td>" .$row['last_name'] . "</td>". 
					"<td>" . ucfirst($row['type']) . "</td>".
					"<td>" . $cost . "</td>".
				"</tr>";
			} 
		}

		function getTableRow($row) {	
			$cost = 0;
			if ($row["tier"] == "platinum" ) {
				$cost = "$10000"; 
			}
			else if ($row["tier"] == "gold") {
				$cost = "$5000";
			}
			else if ($row["tier"] == "silver") {
				$cost = "$3000";
			}
			else if ($row["tier"] == "bronze") {
				$cost  = "$1000";
			}

			return "<tr>".
			 "<td> <a href='sponsor_details.php?id=".$row['id'] . "'>".$row['name']."</a></td>". //builds the link
			 "<td>" . ucfirst($row['tier']) . "</td>".
			 "<td>" . $cost . "</td>".
			 "</tr>";
		}

	?>

	<br>
	<h1>Intake Dashboard</h1>
	<hr>
	<br>

	<div class="row centered">
		<div class="col-md">
			<div class="card half-width">
			<h2>Intake from attendees</h2>
				<hr>
				<p>Attendence intake: <b>$<?php echo $atten_intake ?></b></p>
				<canvas id="intake" width="300" height="300"></canvas>
				<br>
				<a href="/attendees">View All Attendees</a>
				<br>
				<table width=90%>
					<tr>
						<th>First Name</th>
						<th>First Name</th>
						<th>Type</th>
						<th>$ Paid</th>
					</tr>
		
					<?php
						while ($row = $attendee->fetch()) {
							echo getattendee($row);
						}
					?>
				</table>
			</div>
			<br>
		</div>
		<div class="col-md">
			<div class="card half-width">
				<h2>Sponsors</h2>
				<hr>
				<p>Sponsor Intake: <b>$<?php echo $tot_intake ?></b> </p>
				<canvas id="sponsors" width="300" height="300"></canvas>
				<br>
				<a href="../sponsors/index.php">View All Sponsors</a>
				<br>
				<table width=90%>
					<tr>
						<th>Name</th>
						<th>Tier</th>
						<th>$ Paid</th>
					</tr>
					<?php
						while ($row = $spons->fetch()) {
							echo getTableRow($row);
						}
					?>
				</table>
			</div>
		</div>	
	</div>

	<br><br>
	<?php include_once("../components/footer.php")?>

	<script type="text/javascript">

		var ctx = document.getElementById('sponsors').getContext('2d');
		var data = 
			<?php echo "[$platinum_intake, $gold_intake, $silver_intake, $bronze_intake,]" ?>;

		var myChart = new Chart(ctx, {
		    type: 'pie',
		    data: {
		        labels: ['Platinum', 'Gold', 'Silver', 'Bronze'],
		        datasets: [{
		            label: '',
		            data: data,
		            backgroundColor: [
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(54, 54, 54, 0.2)',
		                'rgba(128, 70, 27, 0.2)'
		            ],
		            borderColor: [
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(54, 54, 54, 1)',
		                'rgba(128, 70, 27, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero: true
		                }
		            }]
		        }
		    }
		});

		var ctx = document.getElementById('intake').getContext('2d');
		var data = <?php echo "[$stu_intake, $pro_intake]" ?>;
		var intake = new Chart(ctx, {
		    type: 'pie',
		    data: {
		        labels: ['Student Registration', 'Professional Registration'],
		        datasets: [{
		            label: '',
		            data: data,
		            backgroundColor: [
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)'
		            ],
		            borderColor: [
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)'
		            ],
		            borderWidth: 1
		        }]
		    }
		});
	</script>	
</body>
</html>