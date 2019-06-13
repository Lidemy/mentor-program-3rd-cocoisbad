<?php
  require_once('./conn.php');

  if(!isset($_COOKIE["member_id"])) {
      die("not login");
  } else {
    $sql = "SELECT * from users WHERE id =" . $_COOKIE["member_id"];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $nickname = $row['nickname'];
    $user_id = $row['id'];
  }
    $comments = $_POST['comments'];
    if(empty($comments)) {
      die("請輸入內容");
    }
    $sql = "INSERT INTO comments(user_id, content) VALUES('$user_id', '$comments')";
    if ($conn->query($sql)) {
      header('Location: ./index.php');
    } else {
      echo ("failed" . $conn->error);
    }
?>