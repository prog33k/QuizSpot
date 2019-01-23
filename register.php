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
	<h1>Register for QuizSpot </h1>
	<p>All fields are mandatory</p>
	<p><a href="index.php">Already have an account - Login</a></p>
	<form method="post" action="reg.php">
		<div class="form-group">
			<label class="form-label" for="input-example-1">Full Name (ex.: Abc Xyz)</label>
			<input class="form-input" type="text" id="input-example-1" placeholder="Full Name" name="fullname" required>
			
			<label class="form-label" for="input-example-2">Email</label>
			<input class="form-input" type="email" id="input-example-2" placeholder="Email" name="email" required>
			
			<label class="form-label" for="input-example-3">Mobile (ex.: 1234567890)</label>
			<input class="form-input" type="number" id="input-example-3" placeholder="Mobile number" name="mob" min="7000000000" max="9999999999" required>
			
			<label class="form-label" for="input-example-4">Desired Password </label>
			<input class="form-input" type="password" id="input-example-4" placeholder="Password" name="pass" required>
			
			<label class="form-label" for="input-example-5">Student / Faculty</label>
			  <label class="form-radio">
				<input type="radio" name="role" value="s" id="s" checked>
				<i class="form-icon"></i> Student
			  </label>
			  <label class="form-radio">
				<input type="radio" name="role" value="f" id="t">
				<i class="form-icon"></i> Teacher
			  </label><br>
			  
			<input type="submit" name="submit" value="Register" class="btn btn-primary btn-lg btn-block" />
		</div>
	</form>
	</div>
</body>
</html>
