<!DOCTYPE html>
<html>
<head>
<title>QuizSpot</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="dist/spectre.min.css">
<link rel="stylesheet" href="dist/spectre-exp.min.css">
</head>
<body>
	<div class="container">
		<h1>Registration for QuizSpot </h1>
<?php 
include_once 'config.php';
if(isset($_SESSION['name']))
{
	echo '<script>  
		window.location = "https://quizspot.shop/"; 
	</script>';

}
	$name = $_POST["fullname"];
	$email = $_POST["email"];
	$mob = $_POST["mob"];
	$pass = $_POST["pass"];
	$role = $_POST["role"];
	
	
	$valid = "SELECT created FROM usercontry where umob = '$mob' or uemail = '$email'";
	$sql = "INSERT INTO usercontry (uname, uemail, umob, upass, role) VALUES ('$name', '$email', '$mob', '$pass', '$role')";

	if($conn->query($valid)->num_rows == 0 ){
	if ($conn->query($sql) === TRUE) {
		echo "<p>You are now registered successfully</p>";
		echo "<p>Contact Admin for Account Activation</p>";
		echo "<a href='index.php'>Click here to login</a>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} } else {
		echo "<p>Mobile no. or email is already used</p>";
		echo "<a href='register.php'>Click here to Register</a>";
	}
	$conn->close();
	
?>
