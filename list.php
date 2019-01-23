<?php
include_once 'config.php';
if(!isset($_SESSION["name"]))
{
	echo '<script>  
		window.location = "https://quizspot.shop/index.php"; 
	</script>';

}
	$user = $_SESSION['name'];
	$sql = "SELECT uname from usercontry where uid = '$user'";
	
	$row = $conn->query($sql);
	
	$row = $row->fetch_assoc();
	
	$fullname = $row["uname"];
	
?>
<!DOCTYPE html>
<html>
<head>
<title>QuizSpot </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="dist/spectre.min.css">
<link rel="stylesheet" href="dist/spectre-exp.min.css">
</head>
<body>
	<div class="container">
	<h3>Welcome - <?php echo $fullname; ?> <a href="logout.php"><button class="btn">Logout</button></a> </h3><br>
	
	<div class="columns">
	  <div class="column">
		<!-- column content -->
		<form action="" method="post">
    <input type="submit" name="sj" value="See JPR" class="btn btn-block" />
	</form><br>
	  </div>
	  <div class="divider-vert" data-content=""></div>
	  <div class="column">
		<!-- column content -->
		<form action="" method="post">
		<input type="submit" name="aj" value="Add JPR" class="btn btn-primary btn-block"/>
	</form><br>
	  </div>
	</div>
	
	<div class="divider text-center" data-content=""></div>
	
	<div class="columns">
	  <div class="column">
		<!-- column content -->
		<form action="" method="post">
		<input type="submit" name="sm" value="See MGMT" class="btn btn-block"/>
	</form><br>
	  </div>
	  <div class="divider-vert" data-content=""></div>
	  <div class="column">
		<!-- column content -->
		<form action="" method="post">
		<input type="submit" name="am" value="Add MGMT" class="btn btn-primary btn-block"/>
	</form><br>
	  </div>
	</div><hr>


<?php
	if(isset($_POST["sj"])){
		$sql = "SELECT title, o1, o2, o3, o4, extra FROM quizcontyrbyallajp WHERE uid = '$user' ORDER BY qid DESC LIMIT 25";
		
		$res = $conn->query($sql);
		echo '
			<div class="container">
				<table class="table table-striped table-hover table-scroll">
				  <thead>
					<tr class="active">
					  <th>Title</th>
					  <th>Option 1</th>
					  <th>Option 2</th>
					  <th>Option 3</th>
					  <th>Option 4</th>
					  <th>Notes</th>
					</tr>
				  </thead>
				  <tbody>
				  '; 
					  while($row = $res->fetch_assoc()){
						  echo '
					<tr>
					  <td>'.$row["title"].'</td>
					  <td>'.$row["o1"].'</td>
					  <td>'.$row["o2"].'</td>
					  <td>'.$row["o3"].'</td>
					  <td>'.$row["o4"].'</td>
					  <td>'.$row["extra"].'</td>
					</tr> ';
				} 
					echo '
				  </tbody>
				</table>
			</div>
		';
	}
	
	if(isset($_POST["aj"])){
		echo '
		<div class="container card">
			<form method="post">
			<div class="form-group">
			  <label class="form-label" for="title">Question for java :</label>
			  <textarea class="form-input" id="title" name="title" placeholder="Enter " rows="3"></textarea>
			  <label class="form-label" for="option-1">Option 1</label>
			  <input class="form-input" name="o1" type="text" id="input-example-1" placeholder="Name">
			  
			  <label class="form-label" for="option-2">Option 2</label>
			  <input class="form-input" name="o2" type="text" id="input-example-2" placeholder="Name">
			  
			  <label class="form-label" for="option-3">Option 3</label>
			  <input class="form-input" name="o3" type="text" id="input-example-3" placeholder="Name">
			  
			  <label class="form-label" for="option-4">Option 4</label>
			  <input class="form-input" name="o4" type="text" id="input-example-4" placeholder="Name">
			  
			  <label class="form-label">Correct option (At least one)</label>
			    <label class="form-switch">
					<input type="checkbox" name="optiona[]" value="1">
					<i class="form-icon"></i> Option 1
				</label>
				
				<label class="form-switch">
					<input type="checkbox" name="optiona[]" value="2">
					<i class="form-icon"></i> Option 2
				</label>
				
				<label class="form-switch">
					<input type="checkbox" name="optiona[]" value="3">
					<i class="form-icon"></i> Option 3
				</label>
				
				<label class="form-switch">
					<input type="checkbox" name="optiona[]" value="4">
					<i class="form-icon"></i> Option 4
				</label>
				
				
				<label class="form-label" for="option-10">Extra notes (optional)</label>
				<input class="form-input" type="text" id="notes" placeholder="Extra notes" name="notes"><br>
				
				<input type="submit" name="addj" value="Submit >>>" class="btn btn-primary btn-lg btn-block" /><br><br>

			  
			</div>
			</form>
		</div>
		';
	}
	
	if(isset($_POST["addj"])){
		$title = $_POST["title"];
		$o1 = $_POST["o1"];
		$o2 = $_POST["o2"];
		$o3 = $_POST["o3"];
		$o4 = $_POST["o4"];
		$ans = $_POST["optiona"];
		$fians = 0;
		foreach ($ans as $color){ 
			$fians = $fians + $color;
			}
		$notes = $_POST["notes"];
		
		$valid = "SELECT title FROM quizcontyrbyallajp where title = '$title'";
		
		$sql = "INSERT INTO quizcontyrbyallajp (uid, title, o1, o2, o3, o4, ans, extra) VALUES ('$user', '$title', '$o1', '$o2', '$o3', '$o4', '$fians', '$notes')";
		if($conn->query($valid)->num_rows == 0 ){
		if ($conn->query($sql) === TRUE) {
				echo "<kbd>New java Quiz added Successfully </kbd>";
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		} } else {
			echo "<kbd>The entered title for java quiz is already used, choose different question or title</kbd>";			
		}
	
		$conn->close();			
	}
	
	if(isset($_POST["sm"])){
		
		$sql = "SELECT title, o1, o2, o3, o4, extra FROM quizcontyrbyallmgmt WHERE uid = '$user' ORDER BY qid DESC LIMIT 25";
		
		$res = $conn->query($sql);
		echo '
			<div class="container">
				<table class="table table-striped table-hover table-scroll">
				  <thead>
					<tr class="active">
					  <th>Title</th>
					  <th>Option 1</th>
					  <th>Option 2</th>
					  <th>Option 3</th>
					  <th>Option 4</th>
					  <th>Notes</th>
					</tr>
				  </thead>
				  <tbody>
				  '; 
					  while($row = $res->fetch_assoc()){
						  echo '
					<tr>
					  <td>'.$row["title"].'</td>
					  <td>'.$row["o1"].'</td>
					  <td>'.$row["o2"].'</td>
					  <td>'.$row["o3"].'</td>
					  <td>'.$row["o4"].'</td>
					  <td>'.$row["extra"].'</td>
					</tr> ';
				} 
					echo '
				  </tbody>
				</table>
			</div>
		';
	}
	
	if(isset($_POST["am"])){
		
		echo '
		<div class="container card">
			<form method="post">
			<div class="form-group">
			  <label class="form-label" for="title">Question for management :</label>
			  <textarea class="form-input" id="title" name="title" placeholder="Enter " rows="3"></textarea>
			  <label class="form-label" for="option-1">Option 1</label>
			  <input class="form-input" name="o1" type="text" id="input-example-1" placeholder="Name">
			  
			  <label class="form-label" for="option-2">Option 2</label>
			  <input class="form-input" name="o2" type="text" id="input-example-2" placeholder="Name">
			  
			  <label class="form-label" for="option-3">Option 3</label>
			  <input class="form-input" name="o3" type="text" id="input-example-3" placeholder="Name">
			  
			  <label class="form-label" for="option-4">Option 4</label>
			  <input class="form-input" name="o4" type="text" id="input-example-4" placeholder="Name">
			  
			  <label class="form-label">Correct option (At least one)</label>
			    <label class="form-switch">
					<input type="checkbox" name="optiona[]" value="1">
					<i class="form-icon"></i> Option 1
				</label>
				
				<label class="form-switch">
					<input type="checkbox" name="optiona[]" value="2">
					<i class="form-icon"></i> Option 2
				</label>
				
				<label class="form-switch">
					<input type="checkbox" name="optiona[]" value="3">
					<i class="form-icon"></i> Option 3
				</label>
				
				<label class="form-switch">
					<input type="checkbox" name="optiona[]" value="4">
					<i class="form-icon"></i> Option 4
				</label>
				
				
				<label class="form-label" for="option-10">Extra notes (optional)</label>
				<input class="form-input" type="text" id="notes" placeholder="Extra notes" name="notes"><br>
				
				<input type="submit" name="addm" value="Submit >>>" class="btn btn-primary btn-lg btn-block" /><br><br>

			  
			</div>
			</form>
		</div>
		';
	}
	
	if(isset($_POST["addm"])){
		$title = $_POST["title"];
		$o1 = $_POST["o1"];
		$o2 = $_POST["o2"];
		$o3 = $_POST["o3"];
		$o4 = $_POST["o4"];
		$ans = $_POST["optiona"];
		$fians = 0;
		foreach ($ans as $color){ 
			$fians = $fians + $color;
			}
		$notes = $_POST["notes"];
		
		$valid = "SELECT title FROM quizcontyrbyallmgmt where title = '$title'";
		
		$sql = "INSERT INTO quizcontyrbyallmgmt (uid, title, o1, o2, o3, o4, ans, extra) VALUES ('$user', '$title', '$o1', '$o2', '$o3', '$o4', '$fians', '$notes')";
		if($conn->query($valid)->num_rows == 0 ){
		if ($conn->query($sql) === TRUE) {
				echo "<kbd>New management Quiz added Successfully </kbd>";
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		} } else {
			echo "<kbd>The entered title for management quiz is already used, choose different question or title</kbd>";			
		}
	
		$conn->close();			
	}
	
?>
	</div>
</body>
</html>
