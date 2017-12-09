<?php
include("index.php");
?>

<html>
	<head>
	<title>Register Hospital</title>
	</head>
	<body>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h2>Hospital Registration</h2>
		Username:<input type="text" name="name" required/><br/><br/>
		Password:<input type="password" name="password" required/><br/><br/>
		<input type="Submit" value= "Submit">
		</form>

	</body>
</html>

<?php
	
	include("includes/database.php");
	
	if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['password']) && !empty($_POST['password'])) {
		
			$sql = "CREATE TABLE IF NOT EXISTS users (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		username VARCHAR(30) NOT NULL,
		type VARCHAR(30) NOT NULL,
		password varchar(50) NOT NULL,
		bgroup VARCHAR(50),
		reg_date VARCHAR(25)
		)";

	if (mysqli_query($conn, $sql)) {
		//echo "Table Users created successfully";
		$date = date('Y-m-d H:i:s');
		
		
		$login_sql = "SELECT password FROM users WHERE username='".$_POST['name']."'";
			$pass =  mysqli_query($conn, $login_sql);
			if(mysqli_num_rows($pass)>0){
				while($row = mysqli_fetch_assoc($pass)){
					//echo "Password:".$row['password'];
				
					if ($row['password']) {
						echo 'Username Exists !!';
					}
					else{
						echo 'Creating new username !!';
					}
					
				}
			}else{
					$user_insert_sql = "INSERT INTO users(username,type,password,bgroup,reg_date) values('".$_POST['name']."','hospital','".$_POST['password']."','','".$date."')";
					if (mysqli_query($conn, $user_insert_sql)) {
					echo "Username created successfully";
					echo '<script>window.location.href = "index.php";</script>';
					?><a href="index.php">Home</a> <?php 
					}
					else{
						echo 'Username not created !!';
					}
				}
		
		
		
		
		
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}
}
else
{
	//echo 'Fill form correctly!';
}
?>