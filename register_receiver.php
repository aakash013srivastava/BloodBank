
<html>
	<head>
	<title>Register Receiver</title>
	</head>
	<body>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Username:<input type="text" name="name" required /><br/><br/>
		BloodGroup: <select name="bgroup" required>
					  <option value="">--select--</option>
					  <option value="A+">A+</option>
					  <option value="A-">A-</option>
					  <option value="B+">B+</option>
					  <option value="B-">B-</option>
					  <option value="O+">O+</option>
					  <option value="O-">O-</option>
					  <option value="AB+">AB+</option>
					  <option value="AB-">AB-</option>
					</select><br/><br/>
		Password:<input type="password" name="password" required/><br/><br/>
		<input type="Submit" value= "Submit">
		</form>

		
<?php
		$servername = "localhost";
		$username = "root";
		$password = "";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$dbselect = mysqli_select_db($conn,"bloodbank");
		if (!$dbselect){
			die('could not select database');
			mysqli_query($conn, "CREATE DATABASE bloodbank");
			mysqli_select_db($conn,"bloodbank");
		}
		
		if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['bgroup']) && !empty($_POST['bgroup']) && isset($_POST['password']) && !empty($_POST['password'])) {
		
		
			$sql = "CREATE TABLE IF NOT EXISTS Users (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			username VARCHAR(30) NOT NULL,
			type VARCHAR(30) NOT NULL,
			bgroup VARCHAR(5),
			reg_date TIMESTAMP
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

						$user_insert_sql = "INSERT INTO users(username,type,password,bgroup,reg_date) values('".$_POST['name']."','receiver','".$_POST['password']."','".$_POST['bgroup']."','".$date."')";
						if (mysqli_query($conn, $user_insert_sql)) {
							echo 'User inserted successfully';
						}
						else{
							echo 'User not inserted !!';
						}
					}
					
				}
			}
				
			
				

			} else {
				echo "Error creating table: " . mysqli_error($conn);
			}
		
}
else
{
	echo 'Fill form correctly!';
}
?>
	</body>
</html>