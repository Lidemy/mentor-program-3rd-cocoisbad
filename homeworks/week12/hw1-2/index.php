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
			$sql = 'SELECT * from cocoisbad_comments WHERE id';
			$result = $conn->query($sql);
			$pageNum = ceil($result->num_rows / 20);
			$page = $_GET['page'];
			$x = ($page - 1) * 20;
			$sql = 'SELECT cocoisbad_comments.content,
			   	cocoisbad_comments.created_at,
			   	cocoisbad_comments.id,
			    cocoisbad_users.nickname 
		    FROM cocoisbad_users_certificate
		    JOIN cocoisbad_comments ON cocoisbad_comments.user_id = cocoisbad_users_certificate.id
		    JOIN cocoisbad_users ON cocoisbad_users.username = cocoisbad_users_certificate.username ORDER BY created_at  DESC LIMIT ' . $x . ',20';

		  $result = $conn->query($sql);
		  if($result->num_rows > 0) {
		  	while($row = $result->fetch_assoc()) {
		  		echo "<div class='message'>";
		  		echo "<div class='message__name'>" . $row['nickname'] . "</div>";
		  		echo "<div class='message__datetime'>" . $row['created_at'] . "</div>";
		  		echo "<div class='message__content'>" . htmlspecialchars($row['content'], ENT_QUOTES, 'utf-8') . "</div>";
		  		echo "<form method='POST' action='./handle_reply.php?id=" . $row['id'] . "'>";
				echo "<div><textarea class='message__reply' name='reply'></textarea></div>";
				echo "<div class='message__repay--submit'>";
				echo "<input type='submit' value='回覆'>";
			    echo "</div>";
				echo "</form>";
		  		echo "<div class='message__delete'><a href='./delete.php?id=" . $row['id'] . "'>刪除</a></div>";
		  		echo "<div class='message__update'><a href='./update.php?id=" . $row['id'] . "'>編輯</a></div>";	


				$stmt = $conn->prepare("SELECT * from cocoisbad_reply WHERE comments_id=?");
				$stmt = $conn->prepare("SELECT 
					cocoisbad_users.nickname,
					cocoisbad_reply.comments_id,
					cocoisbad_reply.reply_created_at,
					cocoisbad_reply.reply_content
					 FROM cocoisbad_reply 
					 JOIN cocoisbad_users_certificate ON cocoisbad_reply.reply_user_id = cocoisbad_users_certificate.id
					 JOIN cocoisbad_users ON cocoisbad_users.username = cocoisbad_users_certificate.username
					 WHERE comments_id=? ORDER BY reply_created_at ASC");
			    $stmt->bind_param("s", $row['id']);
			    $stmt->execute();
			    $result2 = $stmt->get_result();
			    if($result2->num_rows > 0) {
		  			while($reply_row = $result2->fetch_assoc()) {
		  				if ($row['nickname'] === $reply_row['nickname']) {
		  					echo "<div class='message__replyContent message__replyBg'>";
		  				} else {
		  					echo "<div class='message__replyContent'>";
		  				}
		  				
				  		echo "<div class='message__reply--nickname'>" . $reply_row['nickname'] . "</div>";
				  		echo "<div class='message__reply--datetime'>" . $reply_row['reply_created_at'] . "</div>";
				  		echo "<div class='message__reply--content'>" . htmlspecialchars($reply_row['reply_content'], ENT_QUOTES, 'utf-8')  . "</div>";
				  		echo "</div>";
		  			}
		  			
		  		}
		  		echo "</div>";
		  	}

		  	for ($i = 1; $i <= $pageNum; $i += 1) {
			  	echo "<a class='page__number' href='./index.php?page=". $i ."'>";
			  	echo $i;
			  	echo "</a>";
		  	}
		  }
		?>
		
	</div>

</body>
</html>