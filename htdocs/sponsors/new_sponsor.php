<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" >
	<link href="../css/style.css" type="text/css" rel="stylesheet" >
	<title>New Sponsor</title>
</head>

<body>
    <br>
    <h3>Add a Sponsor</h3> 
    <hr>

    <form action="" method="post">

        <label>Sponsor Name:</label>
        <input type="text" name="name" id="name" required="required" placeholder="Please Enter Name"/><br /><br />

        <label>Sponsor Email:</label>
        <input type="text" name="email" id="email" required="required" placeholder="Please Enter email"/><br /><br />

        <label>Sponsor Tier:</label>
        <select name="sponsor_tier">
            <option name="platinum" value="platinum">Platinum</option>
            <option name="gold" value="gold">Gold</option>
            <option name="silver" value="silver">Silver</option>
            <option name="bronze" value="bronze">Bronze</option>
        </select>

        <br>
        <br>
        <input type="submit" value="Submit" name="submit" class="btn btn-success" /><br />

    </form>

	<?php 
		// Loads in database connection, called $connection and some helper functions
		include_once("../config/database.php")
	?>
    <?php
        if(isset($_POST['submit']))
        {
            $name = $_POST["name"];
            $tier = $_POST["sponsor_tier"];
            $email = $_POST["email"];

            singleRowExecute("INSERT INTO Sponsor (name, tier, num_emails_sent, email_address) 
            VALUES ('$name', '$tier', 0, '$email')");

            header("location: index.php");
            exit;
        }

?>

    <br><br><br><br><br><br><br><br><br>
	<?php include_once("../components/footer.php")?>
</body>
</html>
