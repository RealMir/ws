<?php

session_start();

$conn = mysqli_connect('','','','');
$sql = "SELECT * FROM board";
$result = mysqli_query($conn, $sql);

// 글 목록을 위한 리스트 생성
$list='';

// 글 목록을 누르면 밑에 있는 함수에 의해 $row과 생성되고 $row 배열의 no속성을 GET 값으로 가진다.
while($row = mysqli_fetch_array($result)) {
	$list=$list."<li><a href=\"index.php?id={$row['no']}\">{$row['title']}</a></li>";
}

// GET 값이 없을 때 사용할 변수 선언 
$article = array(
	'title'=>'Welcome',
	'text'=>'Hello, web'
);

// GET 값 있을 때 사용할 변수 선언 
if(isset($_GET['id'])) {
	$sql = "SELECT * FROM  board WHERE no={$_GET['id']}";            
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$article['title'] = $row['title'];
	$article['text'] = $row['text'];
}

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
<a href='signup.php'>signup</a>
<form method=POST action=login.php>
	<input type="text" name="user_id" placeholder="USER ID">
	<input type="password" name="user_pw" placeholder="Password">
      	<button type="submit">Sign in</button>
</form>
 
<?php

}else{
	echo " Welcome~ ";
	echo "<a href='logout.php'>logout</a>";
}

?>

<br><a href=write.php>write</a><br>

<!-- 게시판 목록을 불러오는 html -->
<h1><a href="index.php">WEB</a></h1>
    <ol>
        <?php
        echo $list;
        ?>
    </ol>
    <h2><?php
        echo $article['title']
        ?>
    </h2>
    <?php
        echo $article['text']
    ?>
    <br>
</body>
</html>
