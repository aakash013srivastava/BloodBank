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
		}
	
		if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['password']) && !empty($_POST['password'])) {
			 
			
			$login_sql = "SELECT password FROM users WHERE username='".$_POST['name']."'";
			$pass =  mysqli_query($conn, $login_sql);
			if(mysqli_num_rows($pass)>0){
				while($row = mysqli_fetch_assoc($pass)){
					//echo "Password:".$row['password'];
				
					if ($row['password'] == $_POST['password']) {
						echo 'Logged in !!';
					}
					else{
						echo 'Wrong Credentials !!';
					}
					
				}
			}
			
		}
		
else
{
	echo 'Fill form correctly!';
}
?>