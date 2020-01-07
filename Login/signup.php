<?php
$user_id=$_POST[id];
$user_pw=$_POST[pw];
$email=$_POST[email];

// 아이디, 비밀번호, 이메일 다 적혀있을때 실행
if( $user_id != '' && $user_pw != '' && $email != '' ){

	// php에서 MySQL을 연결해준다.
	$conn=mysqli_connect('', '', '', '');
	
	// query문 => 아이디 중복 확인
	$sql = "SELECT * FROM user WHERE user_id='{$user_id}'"; 
	
	// mysqli_connect를 통해 연결된 객체를 이용해 MySQL 쿼리를 실행
	$result = mysqli_query($conn, $sql);
	
	// 변수의 총 레코드 수를 반환
	$total = mysqli_num_rows($result);	
	if($total>0){
		echo "<script> alert('already ID');</script>";
		echo '<meta http-equiv="refresh" content="0">';
	}else{
		$sql = "INSERT INTO user(user_id, user_pw, email) VALUE( '$user_id',md5('$user_pw'),'$email')";
		$result = mysqli_query($conn, $sql);
		if ( $result ){
			echo "<script> alert('okay good');</script>";
			echo '<meta http-equiv="refresh" content="0;url=index.php">'; 
		}
	}
}else{
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
        <form method='POST' action='signup.php'>
                        <p>ID: <input type="text" name="id"></p>
                        <p>PW: <input type="password" name="pw"></p>
                        <p>Email: <input type="email" name="email"></p>
                        <input type="submit" value="회원가입">
        </form>
</body>
</html>


<?php
	}
?>

