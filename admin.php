
<html>
	<head>
		<title>Add Blood Info</title>
	</head>
	<body>
		<h1>Add Blood Info</h1>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Add Blood Group:<select name="bgroupadmin" required>
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
			<input type="Submit" value="Submit"/>
		</form>
	</body>
</html>

<?php
		session_start();
		$name = $_SESSION['username'];
		$type = 'hospital';
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
		
		if(isset($_POST['bgroupadmin']) && !empty($_POST['bgroupadmin'])) {
			$get_bgroups_sql = "SELECT bgroup from users WHERE username='".$name."'";
			$bgroups_fetched = mysqli_query($conn, $get_bgroups_sql);
			$updated_bgroup = "";
			if(mysqli_num_rows($bgroups_fetched)>0){
				while($row = mysqli_fetch_assoc($bgroups_fetched)){
					
					$bgroup_array = explode(";",$row['bgroup']);
					if(in_array($_POST['bgroupadmin'],$bgroup_array)){
						$updated_bgroup = $row['bgroup'];
						//echo $updated_bgroup;
					}else{
						$updated_bgroup = $row['bgroup'].$_POST['bgroupadmin'].";";
						//echo $updated_bgroup;
					}
					
				}
			}
			//echo "(Available Bloodgroups:".$updated_bgroup.")";
			$update_bgroup_sql = "UPDATE users SET bgroup ='".$updated_bgroup."' WHERE username = '".$name."'";
			//echo $update_bgroup_sql;
			$updated_bgroup_result = mysqli_query($conn, $update_bgroup_sql );
			if(!$updated_bgroup_result){
				echo 'Bloodgroups not updated';
			}
			else{
				echo 'Bloodgroup updated successfully';
				echo '<script>window.location.href = "index.php";</script>';
			}
			
		}

?>
