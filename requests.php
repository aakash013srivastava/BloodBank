<?php
include("includes/database.php");

$requester_bgroup_sql = "SELECT bgroup FROM users WHERE username='".$_GET['r']."'";
$requester_bgroup_result = mysqli_query($conn,$requester_bgroup_sql);
if(mysqli_num_rows($requester_bgroup_result)>0){
				while($row = mysqli_fetch_assoc($requester_bgroup_result )){
					$requester_bg = $row['bgroup'];
					$requestee_bgroups = explode(";",$_GET['s']);
					if(!in_array($requester_bg,$requestee_bgroups)){
						echo 'Your bloodgroup not present,request someone else!';
					}else{
						// Check if requests table exists,if not then create
						
						$create_request_table_sql = "CREATE TABLE IF NOT EXISTS requests(
						id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
						requested_id VARCHAR(30) NOT NULL,
						requested_username VARCHAR(30) NOT NULL,
						requesting_username  varchar(50) NOT NULL,
						status VARCHAR(20),
						reg_date VARCHAR(25)
						)";
						$table_creation_result = mysqli_query($conn,$create_request_table_sql);
						
						if(!$table_creation_result){
							die('Requests Table Not created');
						}else{
						
						$dt = date('Y-m-d H:i:s');
						
						$check_sql = "SELECT * FROM requests WHERE requested_username='".$_GET['q']."' and requesting_username='".$_GET['r']."'";
						$check_sql_execute = mysqli_query($conn,$check_sql);
						if(mysqli_num_rows($check_sql_execute)>0){
							echo "Request already submitted !!!";
						}else{
								
							$sql = "INSERT INTO requests(requested_id,requested_username,requesting_username,status,reg_date) values('".$_GET['p']."','".$_GET['q']."','".$_GET['r']."','pending','".$dt."')";
							//echo $sql;
							$request_insertion_result = mysqli_query($conn,$sql);
							
							if($request_insertion_result){
								echo 'Request submitted successfully';
							}else{
								echo 'Request not inserted,please Retry';
							}
						}
						
								
						}
						
					}
					
				}
}
			

	

?>