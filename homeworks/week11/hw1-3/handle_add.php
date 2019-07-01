<?php
  require_once('./conn.php');

  if(!isset($_COOKIE["member_id"])) {
      die("not login");
  } else {
    $sql = "SELECT * from cocoisbad_users_certificate WHERE id ='". $_COOKIE["member_id"]."'";
 
    $result = $conn->query($sql);
    if($row = $result->fetch_assoc()) {
      $user_id = $row['id'];
    } else {
      echo ("系統不穩，請在試一次");
    }
  }
    $comments = $_POST['comments'];
    if(empty($comments)) {
      die("請輸入內容");
    }
    $sql = "INSERT INTO cocoisbad_comments(user_id, content) VALUES('$user_id', '$comments')";
    if ($conn->query($sql)) {
      header('Location: ./index.php?page=1');
    } else {
      echo ("failed" . $conn->error);
    }
?>