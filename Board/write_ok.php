<?php
$conn=mysqli_connect( '' , '' , '', '');

session_start();

// 게시판에 글 올릴 때 사용할 쿼리문의 변수들 
$title=$_POST[title];
$text=$_POST[text];
$user_id = $_SESSION[user_id];
$write_time = date("Y:M:D");

// 글을 올리는 쿼리문
$sql="INSERT INTO board(title,text,user_id,write_time) VALUE('{$title}','{$text}','{$user_id}','{$write_time}')";
$result=mysqli_query($conn,$sql);
if($result){
	echo "<script>alert('submit success');</script>";
}else{
	echo "<script>alert('submit fail');</script>";
}
?>

<meta http-equiv='refresh'content="0;url='index.php'">
