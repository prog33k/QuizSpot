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
		<h1>Login for QuizSpot </h1>
<?php 
include_once 'config.php';

	$mob = $_POST["mob"];
	$pass = $_POST["pass"];
	
	$valid = "SELECT uid, uname, flag, upass FROM usercontry where umob = '$mob'";
	
	$row = $conn->query($valid);
	
	$row = $row->fetch_assoc();
	
	
	if( ($row["upass"] == $pass) and ($row["flag"] == 1) ){
		
		$_SESSION["name"] = $row["uid"];

	echo '<script>  
		window.location = "https://quizspot.shop/list.php"; 
	</script>';
		
	} else {
		echo "<p>Mobile no. or password incorrect</p>";
		echo "<p>Or Account is not Activated yet</p>";
		echo "<a href='index.php'>Click here to Login</a>";
	}
	
	$conn->close();
?>
