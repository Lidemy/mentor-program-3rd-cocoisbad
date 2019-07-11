<?php 
  require_once('./conn.php'); 
    if(!isset($_COOKIE["member_id"])) {
        die("not login");
    } else {
      $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT 
          cocoisbad_comments.id,
          cocoisbad_users_certificate.username
           FROM cocoisbad_comments 
           JOIN cocoisbad_users_certificate ON cocoisbad_comments.user_id = cocoisbad_users_certificate.id
           WHERE cocoisbad_comments.id=?");
          $stmt->bind_param("s", $id);
          $stmt->execute();
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();
          

        $stmt = $conn->prepare("SELECT * from cocoisbad_users_certificate WHERE id=?");
        $stmt->bind_param("s", $_COOKIE["member_id"]);
        $stmt->execute();
        $result2 = $stmt->get_result();
        $row2 = $result2->fetch_assoc();
        
        if($row2['username'] === $row['username']){
		  $stmt = $conn->prepare("SELECT * FROM cocoisbad_comments WHERE id =?");
		  $stmt->bind_param("s", $id);
		  $stmt->execute();
		  $result = $stmt->get_result();
		  $row3 = $result->fetch_assoc();
        } else {
        	die("這不是您的文章");
	      }
    }
  
?>
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
		<h1 class="title">編輯留言</h1>
		<form method="POST" action="./handle_update.php">
			<div><textarea name="comments"><?php echo htmlspecialchars($row3["content"], ENT_QUOTES, 'utf-8') ?></textarea></div>
			<div>
				<input type="hidden" name="id" value="<?php echo $row["id"] ?>">
				<input type="submit" value="送出">
			</div>
		</form>
	</div>
</body>
</html>