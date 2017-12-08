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
			<a href="index.php" class="navItem">About Us</a>
			<a href="index.php" class="navItem">Contact Us</a>
			<?php
			 session_start();
			 if (isset($_SESSION['type']) && $_SESSION['type']=='hospital') {
			 ?>
			<a href="admin.php" class="navItem">Add Blood Info</a>
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
		
		<div id="page_content">
			<form>
				
			</form>
		</div>
		
		<div id="footer">
 		</div>
	</body>
</html>