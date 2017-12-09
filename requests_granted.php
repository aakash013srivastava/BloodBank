<?php
include("includes/database.php");
$sql = "UPDATE requests SET status='granted' WHERE requested_username='".$_GET['p']."' AND requesting_username='".$_GET['q']."'";
$result = mysqli_query($conn,$sql);
if($result){
	echo 'Request granted!!!<br/><br/><br/>';
	echo "<a href='index.php'>Back to home</a>";
	//sleep(2);
	//header("Location:index.php");
	//echo '<script>window.location.href = "index.php";</script>';
}else{
	echo 'Request could not be granted!!!';
	//echo '<script>window.location.href = "index.php";</script>';
}
?>