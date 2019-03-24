<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" >
	<link href="css/style.css" type="text/css" rel="stylesheet" >
	<script type="text/javascript" src="js/chart.js"></script>
	<title>Conference Dashboard</title>
</head>
<body>
	<?php 
		// Loads in database connection, called $connection
		include_once("config/database.php");
	?>

	<?php 
		// for schedule analytics
		$res = singleRowExecute("SELECT COUNT(*) AS num_events FROM Session");
		$total_events = $res["num_events"];

		$res = singleRowExecute("SELECT COUNT(*) AS num FROM Session WHERE start_time < '2019-04-05 23:59:59'");
		$fri_events = $res["num"];

		$res = singleRowExecute("SELECT COUNT(*) AS num FROM Session WHERE start_time >= '2019-04-05 23:59:59'");
		$sat_events = $res["num"];

		// for attendee analytics
		$res = singleRowExecute("SELECT COUNT(*) AS num_attendees FROM Attendee");
		$total_attendees = $res["num_attendees"];

		$res = execute("SELECT COUNT(*) AS num, type FROM Attendee GROUP BY type");
		$row = $res->fetchAll();
		$students = $row[0]["num"];
		$professionals = $row[1]["num"];
		$sponsors = $row[2]["num"];

		// for sponsor analytics
		$res = singleRowExecute("SELECT COUNT(*) AS num_sponsors FROM Sponsor");
		$total_sponsors = $res["num_sponsors"];

		$res = execute("SELECT COUNT(*) AS num, tier FROM Sponsor GROUP BY tier");
		$row = $res->fetchAll();
		
		$bronze_num = $row[0]["num"];
		$silver_num = $row[1]["num"];
		$gold_num = $row[2]["num"];
		$platinum_num = $row[3]["num"];

		// intake analysis
		$spons_intake = $bronze_num * 1000 + $silver_num * 3000 + $gold_num * 5000 
			+ $platinum_num * 10000;
		$stu_intake = $students * 50;
		$pro_intake = $professionals * 100;
		$tot_intake = $spons_intake + $stu_intake + $pro_intake;
	?>

	<br>
	<h1>Conference Dashboard</h1>
	<hr>
	<br>
	<div class="row centered">
		<div class="col-md">
			<div class="card half-width">
				<h2>Scheduled Events</h2>
				<hr>
				<p>There are <b><?php echo $total_events ?></b> events scheduled for the conference</p>
				<canvas id="schedule" width="300" height="300"></canvas>
				<br>
				<a href="schedule/index.php">View Schedule</a>
			</div>
			<br>
		</div>
		<div class="col-md">
			<div class="card half-width">
				<h2>Attendees</h2>
				<hr>
				<p>There are <b><?php echo "$total_attendees" ?></b> attendees to the conference</p>
				<canvas id="attendance" width="300" height="300"></canvas>
				<br>
				<a href="attendees/index.php">View All Attendees</a>
			</div>
			<br>
		</div>
	</div>
	
	<div class="row centered">
		<div class="col-md">
			<div class="card half-width">
				<h2>Sponsors</h2>
				<hr>
				<p>There are <b><?php echo $total_sponsors ?></b> sponsors for the conference</p>
				<canvas id="sponsors" width="300" height="300"></canvas>
				<br>
				<a href="sponsors/index.php">View All Sponsors</a>
			</div>
		</div>
		<div class="col-md">
			<div class="card half-width">
				<h2>Conference Intake</h2>
				<hr>
				<p>Conference intake: <b>$<?php echo $tot_intake ?></b></p>
				<canvas id="intake" width="300" height="300"></canvas>
				<br>
				<a href="intake/index.php">View Breakdown</a>
			</div>
		</div>
	</div>
	<br><br>
	<?php include_once("components/footer.php")?>

	<script type="text/javascript">
		var ctx = document.getElementById('attendance').getContext('2d');
		var data = <?php echo "[$students, $professionals, $sponsors]"?>;
		var myChart = new Chart(ctx, {
		    type: 'doughnut',
		    data: {
		        labels: ['Students', 'Professionals', 'Sponsors'],
		        datasets: [{
		        	label: '',
		            label: 'Attendees',
		            data: data,
		            backgroundColor: [
		                'rgba(0, 234, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)'
		            ],
		            borderColor: [
		                'rgba(0, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)'
		            ],
		            borderWidth: 1,
		        }],
		        options: {
	            	labels: {
	            		display: false
	            	}
	            }
		    }
		});

		var ctx = document.getElementById('sponsors').getContext('2d');
		var data = 
			<?php echo "[$platinum_num, $gold_num, $silver_num, $bronze_num,]" ?>;
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: ['Platinum', 'Gold', 'Silver', 'Bronze'],
		        datasets: [{
		            label: '',
		            data: [12, 19, 3, 7],
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
		var data = <?php echo "[$stu_intake, $pro_intake, $spons_intake]" ?>;
		var intake = new Chart(ctx, {
		    type: 'pie',
		    data: {
		        labels: ['Student Registration', 'Professional Registration', 'Sponsorship'],
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

		var ctx = document.getElementById('schedule').getContext('2d');
		var data = <?php echo "[$fri_events, $sat_events]" ?>;
		var schedule = new Chart(ctx, {
		    type: 'pie',
		    data: {
		        labels: ['Friday', 'Saturday'],
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
