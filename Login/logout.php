<?php
$conn=mysqli_connect('','','','');

session_start();
$user_id = $_SESSION[user_id];

$sql = "DELETE FROM session WHERE user_id='{$user_id}'";
$result = mysqli_query($conn,$sql);

setcookie(session_name(),'',time()-99999999999);
session_destroy();

if($result){
	echo "<script>alert('logout success');</script>";
}else{
	echo "<script>alert('logout fail');</script>";
}
?>

<meta http-equiv="refresh" content="0;url=index.php">
