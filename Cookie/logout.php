<?php
	# logout.php 역할 : 쿠키 제거, 페이지 새로고침 

	setcookie( "user_id" , '' , time()-99999999 , "/" );
	setcookie( "user_name" , '' , time()-99999999 , "/" );
?>
 
<meta http-equiv="refresh" content="0;url=login.php">
