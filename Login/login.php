<?php

$conn=mysqli_connect('','','','');

// 세션을 시작함
session_start();

$id = $_POST[user_id];
$pw = $_POST[user_pw];

// ID와 PW과 올바른지 확인하기 위한 쿼리문
$sql = "SELECT * FROM user WHERE user_id = '{$id}'and user_pw = md5('{$pw}');";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

// ID와 PW 체크한 쿼리문을 수를 반영하여 올바르면 if문 실행 
if($num>0){

	// 아이디에 이미 세션이 존재하는지 확인하기 위한 쿼리문
	$sql = "SELECT * FROM session WHERE user_id = '{$id}'";
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);

	// 세션이 이미 존재하는 아이디의 경우 if문 실행
	if($num>0){
		echo "<script>alert('you already login');</script>";
	}else{

		// 쿼리문에 세션을 추가하기 위해 세션 ID를 조회 변경하는 PHP함수 사용
		$sess_id = session_id();

		// 세션이 생성되었음을 알리기 위해 세션 테이블에 정보 추가하는 쿼리문 
		$sql = "INSERT INTO session VALUE ($row[no],'$id'.'$sess_id')";
		$result = mysqli_query($conn,$sql);

		// 세션이 이미 존재하는지 구별하기 위해 필요한 변수 
		$_SESSION[user_id] = $id;

		// index.php에 세션 유뮤를 알리기 위한 변수
		$_SESSION[is_login] = 1;

		echo "<script>alert('login okay');</script>";
	}
}else{
	echo "<script>alert('login fail');</script>";
}

?>

<meta http-equiv="refresh" content="0;url=index.php">
