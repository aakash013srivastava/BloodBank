<html>
	<head>
	
				<link rel="stylesheet" type="text/css" href="styles.css">
				<!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

				<!-- jQuery library -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

				<!-- Latest compiled JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>BloodBank System</title>
	</head>
	<body>
		<div id="header">
			<h3>BloodBank System</h3>
		</div>
		
		<div id ="navigation">
			<a href="index.php" class="navItem">Index</a>
			<a href="#" class="navItem">About Us</a>
			<a href="#" class="navItem">Contact Us</a>
			<?php
			 session_start();
			 if (isset($_SESSION['type']) && $_SESSION['type']=='hospital') {
			 ?>
			<a href="admin.php" class="navItem">Add Blood Info</a>
			<a href="view_requests.php" class="navItem">View Requests</a>
			 <?php }?>
		</div>
		
		<div id="sidebar">
			
			<?php

			 if (isset($_SESSION['type'])) {
			 ?>
			<center><h4><a href="logout.php">Logout</a></h4></center>
			 <?php
			
			 } else {
			   ?>
			<center><h4>LOGIN</h4></center>
			<form method="POST" action="login.php">
				Username:<input type="text"name="name" required/>
				Password:<input type="password"name="password" required/>
					<input type="Submit" value="Submit">
			</form>
				<center>OR</center>
			<center><h4>REGISTER</h4></center>
				<center><a href="register_hospital.php">Hospitals</a>/<a href="register_receiver.php">Receivers</a></center>
			
			   <?php
			 }
			?>
			
			
			
		</div>
		<br/><br/>
		<div id="page_content">
			
			
			<form>
			
			<table border="1">
			<th>Id</th><th>Hospital Username</th><th>Bloodgroups available</th><th>Request</th>
			<?php 
			include("includes/database.php");
			$sql = "SELECT * FROM users WHERE type = 'hospital'";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
					
					echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$row['bgroup']."</td>";
					if(isset($_SESSION['type']) && $_SESSION['type']=='receiver'){
					$link = "<a href=requests.php?p=".$row['id']."&q=".$row['username']."&r=".$_SESSION['username']."&s=".urlencode($row['bgroup']).">Request</a>";
					echo "<td>".$link."</td></tr>";
					}else{
						echo "<td></td></tr>";
					}
					
				}
			}
			
			?>
			</table>
			</form>
		</div>
		
		<div id="footer">
 		</div>
	</body>
</html>
