<?php
include_once 'config.php';
if(isset($_SESSION['name']))
{
	echo '<script>  
		window.location = "https://quizspot.shop/list.php"; 
	</script>';

}
?>
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
	<p><a href="register.php">Dont have an account - Register</a></p>
	<form method="post" action="log.php">
		<div class="form-group">
			
			<label class="form-label" for="input-example-3">Mobile </label>
			<input class="form-input" type="number" id="input-example-3" placeholder="Mobile number" name="mob" min="7000000000" max="9999999999" placeholder="Mobile number" required>
			
			<label class="form-label" for="input-example-4">Password </label>
			<input class="form-input" type="password" id="input-example-4" placeholder="Password" name="pass" required><br><br>

			  
			<input type="submit" name="submit" value="Login" class="btn btn-primary btn-lg btn-block" />
		</div>
	</form>
	</div>
</body>
</html>
