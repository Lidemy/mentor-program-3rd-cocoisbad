 <?php require_once('./conn.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>cocoisbad 的留言板</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h1 class="title">cocoisbad 留言板</h1>
		<div class="login"><a href="./login.php">登入會員</a></div>
		<div class="logout"><a href="./logout.php">登出會員</a></div>
		<div class="register"><a href="./register.php">註冊會員</a></div>
		<form method="POST" action="./handle_register.php">
			<div class="registerText">帳號：<input type="text" name="registerName"></div>
			<div class="registerText">密碼：<input type="text" name="registerPassword"></div>
			<div class="registerText">暱稱：<input type="text" name="registerNickname"></div>
			<div class="registerSubmit"><input type="submit" value="註冊"></div>
		</form>
		<form method="POST" action="./backIndex.php">
			<div class="registerSubmit"><input type="submit" value="返回"></div>
		</form>
		
	</div>
</body>
</html>