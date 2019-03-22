<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" >
	<link href="../css/style.css" type="text/css" rel="stylesheet" >
	<title>Sponsor Details</title>
</head>
<body>
    <?php 
		// Loads in database connection, called $connection
		include_once("../config/database.php")
	?>

    <?php 
        $id = $_GET['id'];


        $res = singleRowExecute("SELECT * FROM sponsor WHERE id = $id");
        $tier = $res['tier'];
        $company_name = $res["name"];
        $num_emails_sent = $res["num_emails_sent"];

        if ($res["num_emails_sent"] == NULL ) {
            $res["num_emails_sent"] = 0; 
        }

		$tier_options = ["bronze", "silver", "gold", "platinum"];

        if(isset($_POST['deleteItem']))
        {
            $SQL = singleRowExecute("DELETE FROM sponsor WHERE id = $id");

            header("location: index.php");
            exit;
        }

        function buildSelect($name, $options, $selected) {
			$res = "<select name='$name'>";
			for ($i = 0; $i < count($options); ++$i) {
				if ($options[$i] == $selected) {
					$res = $res."<option value='$options[$i]' selected='selected'>$options[$i]</option>";
				} else {
					$res = $res."<option value='$options[$i]'>$options[$i]</option>";
				}
			}

			$res = $res."</select>";
			return $res;
		}

        $jobs = execute("SELECT * FROM job WHERE id = $id");
                    
        function getTableRow($row) {

            return "<tr>".            //echo "<td>" "<a href='profile.php?id=".$row['id'] . "'>" . $row['name'] . "</a>" "</td>";
            //echo "<td> <a href='sponsor_details.php?id=".$row['id'] . "'>".$row['name']."</a></td>"; //builds the link
                "<td>" . $row['title'] . "</td>".
                "<td>" . $row['city'] . "</td>".
                "<td>" . $row['province'] . "</td>".
                "<td>" . $row['pay_rate'] . "</td>".
                "</tr>";
        }        
    ?>

    <h1> Details on <?php echo $res['name'] ?> </h1>

    <br>
    <div class="row centered">
        <div class="col-md">
            <form action="./update_sponsor.php" method ="GET">

    		    <label for="sponsor_name">Sponsor Name: </label>
		        <input type="text" name="sponsor_name" value="<?php echo $res['name'] ?>">      
                <br><br>

                <label for="sponsor_tier">Sponsor Tier: </label>
                <?php echo buildSelect("sponsor_tier", $tier_options, $tier) ?>
                <br><br>

                <label for="num_emails_sent"># Emails Name: </label>
		        <input type="text" name="num_emails_sent" value="<?php echo $res['num_emails_sent'] ?>">     

                <br><br>               
                <label for="email_address">Email Address: </label>
		        <input type="text" name="email_address" value="<?php echo $res['email_address'] ?>">   

                <br><br>
		        <input class="btn btn-success" type="submit" value="Submit" />
                <a href="index.php" class="btn btn-warning">Cancel</a>

                <?php echo "<input type='hidden' name='id' value='$id'>" ?>
            </form>

            <br><br>
            <h4>They have the following jobs available</h4>
            <br>
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
                
            <h5> Delete this company from the database?</h5>
            <form action="" method="post">
                <input type="submit" name="deleteItem" value='delete' />
            </form>    
        </div>
    </div>


<br><br><br><br><br><br>
	<?php include_once("../components/footer.php")?>
</body>
</html>