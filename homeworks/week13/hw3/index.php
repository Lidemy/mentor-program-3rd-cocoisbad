 <?php require_once('./conn.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>cocoisbad 的留言板</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/jquery-3.3.1.min.js"></script>

<script>
	$(document).ready(function(){
		//刪除
		$('.board__comments').on('click', '.message__delete', function(e){
			if(!confirm('是否確定要刪除?')) return;
			const id = $(e.target).attr('data-id');
			$.ajax({
				method: "POST",
				url: "./delete.php",
				data: {
					id
				}
			}).done(function(msg) {
				$(e.target).parent('.message').hide(200);
			}).fail(function(){
				alert('刪除失敗!');
			})

			
		})


		//留言內容
		$('form[name=comments]').submit(function(e){
			e.preventDefault();
			const content = $(e.target).find('textarea[name=comments]').val();
		$.ajax({
		  type: 'POST',
		  url: 'handle_add.php',
		  data: {
		  	 comments: content
		  	},
		  	success:function(resp) {
		  		if(resp === 'notLogin'){
		  			alert('請登入');
		  			return;
		  		}else if(resp ==='notContent') {
		  			alert('請輸入內容');
		  			return;
		  		}
		  		const res = JSON.parse(resp);
		  		if (res.result === 'success') {
		  			$('.board__comments').prepend(`
		  				  		<div class='message'>
							  		<div class='message__name'>${res.name}</div>
							  		<div class='message__datetime'>${res.created_at}</div>
							  		<div class='message__content'> ${content} </div>
							  		<form method='POST' action='./handle_reply.php?id=${res.id}'>
										<div><textarea class='message__reply' name='reply'></textarea></div>
										<div class='message__repay--submit'>
											<button type='submit' class='btn btn-primary'>回覆</button>
									    </div>
									</form>
									<div class='btn message__delete' data-id='${res.id}'>刪除</div>
							  		
							  		<div class='message__update'><a href='./update.php?id=${res.id}'>編輯</a></div>
							  	</div>
		  				`)

		  		} else {
		  			alert('not login');
		  		}
		  	}
		});

		})
	})

</script>
		<div class="container">
		<div class="warning">本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</div>
		<h1 class="title">cocoisbad 留言板</h1>
		<div class="login"><a href="./login.php"><button type="button" class="btn btn-info">登入會員</button></a></div>
		<div class="logout"><a href="./logout.php"><button type="button" class="btn btn-info">登出會員</button></a></div>
		<div class="register"><a href="./register.php"><button type="button" class="btn btn-info">註冊會員</button></a></div>
		


		<form method="POST" action="./handle_add.php" name="comments">
			<div><textarea name="comments"></textarea></div>
			<div>
				<button type="submit" class="btn btn-primary">送出</button>
			</div>
		</form>
		<div class="board__comments">
		<?php
			session_start();
			$sql = 'SELECT * from cocoisbad_comments WHERE id';
			$result = $conn->query($sql);
			$pageNum = ceil($result->num_rows / 20);
			$page = $_GET['page'];
			$x = ($page - 1) * 20;
			$sql = 'SELECT cocoisbad_comments.content,
			   	cocoisbad_comments.created_at,
			   	cocoisbad_comments.id,
			   	cocoisbad_comments.username,
			    cocoisbad_users.nickname
		    FROM cocoisbad_comments
		    JOIN cocoisbad_users ON cocoisbad_users.username = cocoisbad_comments.username ORDER BY created_at  DESC LIMIT ' . $x . ',20';

		  $result = $conn->query($sql);
		  if($result->num_rows > 0) {
		  	while($row = $result->fetch_assoc()) {
		  		echo "<div class='message'>";
		  		echo "<div class='message__name'>" . htmlspecialchars($row['nickname'], ENT_QUOTES, 'utf-8') . "</div>";
		  		echo "<div class='message__datetime'>" . htmlspecialchars($row['created_at'], ENT_QUOTES, 'utf-8') . "</div>";
		  		echo "<div class='message__content'>" . htmlspecialchars($row['content'], ENT_QUOTES, 'utf-8') . "</div>";
		  		echo "<form method='POST' action='./handle_reply.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'utf-8') . "'>";
				echo "<div><textarea class='message__reply' name='reply'></textarea></div>";
				echo "<div class='message__repay--submit'>";
				echo "<button type='submit' class='btn btn-primary'>回覆</button>";

			    echo "</div>";
				echo "</form>";
    
    		
	      		if(isset($_SESSION['username']) && $_SESSION['username'] === $row['username']) {
	     			echo "<div class='btn message__delete' data-id='" . htmlspecialchars($row['id'], ENT_QUOTES, 'utf-8') ."'>刪除</div>";
	     		//	echo "<div class='message__delete'><a href='./delete.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'utf-8') . "'>刪除</a></div>";
			  	//	echo "<div class='message__delete'><a href='./delete.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'utf-8') . "'>刪除</a></div>";
			  		echo "<div class='message__update'><a href='./update.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'utf-8') . "'>編輯</a></div>";	
			  	} else {
			  	//	echo "not login";
			  	}

				
				$stmt = $conn->prepare("SELECT 
					cocoisbad_reply.reply_created_at,
					cocoisbad_reply.reply_content,
					cocoisbad_users.nickname
					FROM cocoisbad_reply 
					JOIN cocoisbad_users ON cocoisbad_reply.reply_user_id = cocoisbad_users.username WHERE comments_id=? ORDER BY reply_created_at ASC");
			    $stmt->bind_param("s", $row['id']);
			    $stmt->execute();
			    $result2 = $stmt->get_result();
			    if($result2->num_rows > 0) {
		  			while($reply_row = $result2->fetch_assoc()) {
		  				if (isset($_SESSION['username']) && $row['nickname'] === $_SESSION['nickname']) {
		  					echo "<div class='message__replyContent message__replyBg'>";
		  				} else {
		  					echo "<div class='message__replyContent'>";
		  				}
		  				
				  		echo "<div class='message__reply--nickname'>" . htmlspecialchars($reply_row['nickname'], ENT_QUOTES, 'utf-8') . "</div>";
				  		echo "<div class='message__reply--datetime'>" . htmlspecialchars($reply_row['reply_created_at'], ENT_QUOTES, 'utf-8') . "</div>";
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
	</div>

</body>
</html>