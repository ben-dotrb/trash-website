<?php
	// by including the session code it will execute and redirect unauth users to the login page
	include("auth_session.php");
	include("db.php");
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard Client area</title>
</head>
<body>
<?php 
	//define the username as the current user session
	$username = $_SESSION['username'];
	//select all the data and make sure the username is string format
	$sql = "SELECT * FROM users WHERE username='$username'";
	//query the data base
	$result = mysqli_query($con, $sql);
	
	//welcome user
	echo "<h2>welcome ", $username," you are logged in now</h2>";
?>

<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$image = $_FILES['upload_file'];

		echo "<pre>";
		print_r($image);
		echo "</pre>";
	}
?>
	<img src=x><br/><br/>
	<form enctype="multipart/form-data" action="dashboard.php" method="POST">
	<input type="file" name="upload_file"><br/>
	<input type="submit" value="upload">
	</form>
<?php
	// a loop with all the db data in array format
	while($rows=mysqli_fetch_array($result)){
		echo "<h4>your id is: ", $rows['id'],"</h4><br/>";
		echo "<h4>your name is: ", $rows['username'],"</h4><br/>";
		echo "<h4>your email is: ", $rows['email'],"</h4><br/>";
	}
?>

	<center><p><a href="logout.php">logout</a></p></center>
</body>
</html>
