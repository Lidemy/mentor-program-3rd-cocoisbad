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
		<form method="POST" action="./handle_login.php">
			<div class="registerText">帳號：<input type="text" name="registerName"></div>
			<div class="registerText">密碼：<input type="password" name="registerPassword"></div>
			<div class="registerSubmit"><input type="submit" value="登入"></div>
			<div class="backSubmit"><a class="backSubmit__botton" href="./index.php?page=1">返回</a></div>
		</form>
	</div>
</body>
</html>