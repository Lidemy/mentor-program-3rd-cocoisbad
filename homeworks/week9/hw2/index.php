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
		<div class="warning">本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</div>
		<h1 class="title">cocoisbad 留言板</h1>
		<div class="login"><a href="./login.php">登入會員</a></div>
		<div class="logout"><a href="./logout.php">登出會員</a></div>
		<div class="register"><a href="./register.php">註冊會員</a></div>
		<form method="POST" action="./handle_add.php">
			<div><textarea name="comments"></textarea></div>
			<div>
				<input type="submit" value="送出">
			</div>
		</form>
		<?php
		  $sql = 'SELECT comments.content, comments.created_at, users.nickname FROM comments JOIN users ON comments.user_id = users.id ORDER BY created_at  DESC LIMIT 50';
		  $result = $conn->query($sql);
		  if($result->num_rows > 0) {
		  	while($row = $result->fetch_assoc()) {
		  		echo "<div class='message'>";
		  		echo "<div class='message__name'>" . $row['nickname'] . "</div>";
		  		echo "<div class='message__datetime'>" . $row['created_at'] . "</div>";
		  		echo "<div class='message__content'>" . $row['content'] . "</div>";
		  		echo "</div>";
		  	}
		  }
		?>
		
	</div>
</body>
</html>