<?php
	# members배열 선언 => DB역활
	$members=[
		'user1'=>['pw'=>'pw1', 'name'=>'Tom'],
		'user2'=>['pw'=>'pw2', 'name'=>'Jorn']
	]; 
	# ID와 PW 입력했는지 검사
	if ( isset( $_REQUEST[user_id] ) && isset( $_REQUEST[user_pw] )) {
		
		# 입력받은 ID를 인덱스로 가지는 members 배열의 pw 요소 가져옴
		# 입력받은 PW와 같은지 조건문 실행 
		if ( $members[$_REQUEST[user_id]][pw] === $_REQUEST[user_pw] ) {

			setcookie('user_id',$_REQUEST[user_id],time()+(86400*30),'/');
			setcookie('user_name',$members[$_REQUEST[user_id]][name],time()+(86400*30),'/');
			
			echo "<script> alert('login success'); </script>";
		}else{
			echo "<script> alert('login failed');</script>";
		}
		echo '<meta http-equiv="refresh" content="0">';  
	}else{
		#쿠키값들이 존재하지 않은다면 밑의 html실행 
		if ( !isset($_COOKIE[user_id]) && !isset($_COOKIE[user_name])){
?>

<!DOCTYPE html>
<html>	
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method=post action=login.php>
		<table>
			<tr>
				<td>아이디</td>
				<td><input type=text name=user_id tabindex=1/></td>
				<td rowspan=2><input type=submit tabindex=3 value=로그인 style=height:50px/></td>
			</tr>
			<tr>
				<td>비밀번호</td>
				<td><input type=password name=user_pw tabindex=2/></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php	 
	}else{
		#$_COOKIE[user_name] 생성 시 members 배열의 name요소 가져옴 	
		echo "<p>안녕하세요. $_COOKIE[user_name]님</p>";
		echo "<p><a href=logout.php> Logout </a></p>";
	}
}
?>
