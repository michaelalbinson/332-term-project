<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" >
	<link href="../css/style.css" type="text/css" rel="stylesheet" >
	<title>Available Jobs</title>
</head>
<body>

    <?php 
		// Loads in database connection, called $connection
		include_once("../config/database.php")
	?>

    <?php
        $jobs = execute("SELECT * FROM job");

        function getTableRow($row) {
            return "<tr>".
             "<td>" . $row['title'] . "</td>".
             "<td>" . $row['city'] . "</td>".
             "<td>" . $row['province'] . "</td>".
             "<td>" . $row['pay_rate'] . "</td>".
             "</tr>";
        }

    ?>
    <br><br>
    <h3> All Jobs currently available</h3>
    <br><br>
    <div class="row centered">
        <div class="col-md">
                <table>
                    <tr>
                        <th>Title</th>
                        <th>City</th>
                        <th>Province</th>
                        <th>Pay Rate</th>
                    </tr>
                    <?php 
                        while($row = $jobs->fetch()) {
                            echo getTableRow($row);
                        } 
                    ?>    
                </table>   
            
                <br><br><br>

        </div>
    </div>        



<br><br><br><br><br><br><br>
	<?php include_once("../components/footer.php")?>
</body>
</html>