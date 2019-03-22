<?php 
	// Loads in database connection, called $connection and some helper functions
	include_once("../config/database.php")
?>

<?php 
	$sponsor_id= $_GET["id"];
	$tier = $_GET["sponsor_tier"];
    $name = $_GET["sponsor_name"];
    $num_emails = $_GET["num_emails_sent"];
    $email_address = $_GET["email_address"];

	$SQL = "UPDATE sponsor SET tier='$tier', name='$name', num_emails_sent='$num_emails', email_address = '$email_address' WHERE id=$sponsor_id";
	execute($SQL);
	header('Location: '."index.php");
?>