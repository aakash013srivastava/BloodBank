<?php
include("includes/database.php");
$sql = "UPDATE requests SET status='granted' WHERE requested_username='".$_GET['p']."' AND requesting_username='".$_GET['q']."'";
$result = mysqli_query($conn,$sql);
if($result){
	echo 'Request granted!!!';
	sleep(2);
	echo '<script>window.location.href = "index.php";</script>';
}else{
	echo 'Request could not be granted!!!';
	echo '<script>window.location.href = "index.php";</script>';
}
?>