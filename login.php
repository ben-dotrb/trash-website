<html>
<head>
	<meta charset="utf-8"/>
	<title>Login</title>
</head>
<body>
<?php
	require("db.php");
	session_start();
	if (isset($_POST["username"])){
		$username = stripslashes($_POST["username"]);
		$username = mysqli_real_escape_string($con, $username);
		$password = stripslashes($_POST["password"]);
		$password = mysqli_real_escape_string($con, $password);
		
		//$username = $_POST["username"];
		//password = $_POST["password"];
		//check if user exists
		$query = "SELECT * FROM `users` WHERE username='$username' AND password='" . md5($password) . "'";
		$result = mysqli_query($con, $query); //or die(mysql_error());
		$rows = mysqli_num_rows($result);
		if ($rows ==1){
			$_SESSION['username'] = $username;
			// redirect to the dashboard
			header("Location:dashboard.php");
		} else{
			echo "<center><h2>sorry but this is the wrong password</h2></center><br/><center><a href='login.php'>Login</a></center>";
		}
	} else {
?>
<center>
<form action="" method="POST">
<input type="text" name="username" placeholder="username"><br/>
<input type="password" name="password" placeholder="password"><br/>
<input type="submit">
<br/>
<br/>
<a href="registration.php">here to register</a>
</center>
<?php
	}
?>
</body>
</html>
