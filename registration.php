<html>
<head>
	<meta charset="utf-8"/>
	<title>Registration</title>
</head>
<body>
<?php
	session_start();
	require('db.php');
	if(isset($_POST["username"])){
		$username = stripslashes($_REQUEST["username"]);
		$username = mysqli_real_escape_string($con, $username);
		//$username = $_POST['username'];
		//check if the username alreay exists
		$username_check = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
		$number_of_rows = mysqli_num_rows($username_check);
		if ($number_of_rows){
			echo "<center><h2>this username ",$username," already exists</h2></center><br/><center><a href='registration.php'>register again</a></center>";
		}else{
			$email = stripslashes($_REQUEST["email"]);
			$email = mysqli_real_escape_string($con, $email);
			$password = stripslashes($_REQUEST["password"]);
			$password = mysqli_real_escape_string($con, $password);
			$create_datetime = date("Y-m-d H:i:s");
			$query = "INSERT into `users` (username, password, email, create_datetime) VALUES ('$username', '" .md5($password) . "', '$email', '$create_datetime')";
			// initiating the sql query
			$result = mysqli_query($con, $query);
			//if results are true ( which means the query was seccessful
			if($result){
				echo "<center><h2>You are registred successfully ",$username," </h2></center><br/><center><p>click here to login <a href='login.php'>Login</a></center>";
			} else {
				echo "<center><p>required fields are missing</p></center><br/><center><p>click here to re register <a href='registration.php'>Registration</a></center>";
			}
		}
	} else {
?>
<center>
	<form action="" method="POST">
		<h1>Registration</h1>
<input type="text" name="username" placeholder="username", required><br/>
<input type="text" name="email" placeholder="Email"><br/>
<input type="password" name="password" placeholder="password"><br/>
<input type="submit"><br/><br/>
<p><a href="login.php">Login</a></p>
</center>

<?php
	}
?>
</body>
</html>
