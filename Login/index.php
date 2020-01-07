<?php

session_start();
$conn = mysqli_connect('','','','');
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

// session의 존재에 따른 if문을 사용으로 로그인창 / 로그아웃창 띄움 
if( !isset($_SESSION[is_login]) ){ 
	 
?>
<form method=POST action=login.php>
	<input type="text" name="user_id" placeholder="USER ID">
	<input type="password" name="user_pw" placeholder="Password">
      	<button type="submit">Sign in</button>
</form><br>
<a href='signup.php'>signup</a>
 
<?php

}else{
	echo " Welcome~ ";
	echo "<a href='logout.php'>logout</a>";
}

?>
