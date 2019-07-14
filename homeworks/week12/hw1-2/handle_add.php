<?php
  require_once('./conn.php');

  if(!isset($_COOKIE["member_id"])) {
      die("not login");
  } else {
    $stmt = $conn->prepare("SELECT * from cocoisbad_users_certificate WHERE id=?");
    $stmt->bind_param("s", $_COOKIE["member_id"]);
    $stmt->execute();
    $result = $stmt->get_result();
    if($row = $result->fetch_assoc()) {
      $username = $row['username'];
    } else {
      echo ("系統不穩，請在試一次");
    }
  }
    $comments = $_POST['comments'];
    if(empty($comments)) {
      die("請輸入內容");
    }
    $sql = "INSERT INTO cocoisbad_comments(username, content) VALUES('$username', '$comments')";
    if ($conn->query($sql)) {
      header('Location: ./index.php?page=1');
    } else {
      echo ("failed" . $conn->error);
    }
?>