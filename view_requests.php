<form>
<table border="1">
<th>Requesting Username</th><th>Status</th><th>Grant request</th>
<?php
include("includes/database.php");
session_start();
if($_SESSION['type']=='hospital' && !empty($_SESSION['username'])){
$sql = "SELECT * FROM requests WHERE requested_username='".$_SESSION['username']."'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$link = "<a href=requests_granted.php?p=".$row['requested_username']."&q=".$row['requesting_username'].">Grant</a>";
			if($row['status']!='granted')
			echo "<tr><td>".$row['requesting_username']."</td><td>".$row['status']."</td><td>".$link."</td></tr>";
			
		}
}
}

?>
</table>
</form>