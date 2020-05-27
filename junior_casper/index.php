<!DOCTYPE HTML>

<html>
	<head>
	<style type="text/css">
		body{ background:#000000; color:#33ff33}
	</style>
	</head>
	<body bgcolor="black" color="white">
		<img src="hacker.png" height=300><br><br>		
		<form method=POST action=index.php>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;
			name : <input type="text" name="name"><br>
			&nbsp;
                        school_number : <input type="password" name="password"><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       	<input type="submit" value="submit">
		</form>
	<?php
		echo "Hello ".$_POST["name"]."<br>";
	?>
	TWF5YmUgdGhlcmUgaXMgYSBoaWRkZW4gcGxhY2UgbmFtZWQgJ2hpJw==<br>
	<?php
		if($_GET["hi"]){	
			echo "good your value is ".$_GET["hi"]."<br>";
			echo "FLAG is CASPER akstp";
		}
	?>
	</body>
</html>
