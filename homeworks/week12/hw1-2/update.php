<?php 
  require_once('./conn.php'); 
    if(!isset($_COOKIE["member_id"])) {
        die("not login");
    } else {
      $id = $_GET['id'];
		  $stmt = $conn->prepare("SELECT * FROM cocoisbad_comments WHERE id=?");
		  $stmt->bind_param("s", $id);
		  if($stmt->execute()) {
			  $result = $stmt->get_result();
			  $row = $result->fetch_assoc();
		  } else {
        	die("系統不穩定");
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
			<div><textarea name="comments"><?php echo htmlspecialchars($row["content"], ENT_QUOTES, 'utf-8') ?></textarea></div>
			<div>
				<input type="hidden" name="id" value="<?php echo $row["id"] ?>">
				<input type="submit" value="送出">
			</div>
		</form>
	</div>
</body>
</html>