<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" >
	<link href="../css/style.css" type="text/css" rel="stylesheet" >
	<title>New Sponsor</title>
</head>

<body>
    <br>
    <h3> Add a new sponsor </h3> 
    <br>

    <form action="" method="post">

        <label>Sponsor Name :</label>
        <input type="text" name="name" id="name" required="required" placeholder="Please Enter Name"/><br /><br />

        <label>Sponsor Email :</label>
        <input type="text" name="email" id="email" required="required" placeholder="Please Enter email"/><br /><br />

        <label>Sponsor Tier:</label>
        <select name="sponsor_tier">
            <option name="platinum" value="platinum">platinum</option>
            <option name="gold" value="gold">gold</option>
            <option name="silver" value="silver">silver</option>
            <option name="bronze" value="bronze">bronze</option>
        </select>

        <br>
        <br>
        <input class="btn btn-success" type="submit" value="submit" name="submit"/><br />

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

            singleRowExecute("INSERT INTO sponsor (name, tier, num_emails_sent, email_address) 
            VALUES ('$name', '$tier', 0, '$email')");
            //$result = mysqli_query($conn, $SQL);

            header("location: index.php");
            exit;
        }

?>

    <br><br><br><br><br><br>
	<?php include_once("../components/footer.php")?>
</body>
</html>
