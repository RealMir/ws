<?php
$conn=mysqli_connect( '' , '' , '', '');

// 세션이 유지되므로 로그인시 생성된 글로벌 변수인 세션의 user_id 가져옴
session_start();
$sess_id = $_SESSION[user_id];

if ( $sess_id === null ){
    echo "<script> alert('please login first');</script>";
    echo "<script>window.history.back()</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php

// 세션이 유지되므로 로그인시 생성된 글로벌 변수인 세션의 is_login 이용해 if조건문으로 로그인 여부 확인  
if(!isset($_SESSION[is_login])){
?>

<!-- 로그인 폼 -->
<form method=POST action=login.php>
        <input type="text" name="user_id" placeholder="USER ID">
        <input type="password" name="user_pw" placeholder="Password">
        <button type="submit">Sign in</button>
</form><br>

<?php
}else{
?>

<a href=logout.php><button type="button">logout</button></a><br>

<?php
}
?>

<!-- 글을 올릴 폼 -->
<form method=POST action=write_ok.php>
	title<br>
	<input type="text" name="title" placeholder="title"><br>
	board<br>
	<textarea rows="10" name="text" ></textarea><br>
	<button type="submit">submit</button>
</form>
</body>
</html>
