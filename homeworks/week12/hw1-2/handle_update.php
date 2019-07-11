<?php
  require_once('./conn.php');
  if(!isset($_COOKIE["member_id"])) {
        die("not login");
    } else {
      $id = $_GET['id'];
      $comments = $_POST['comments'];
      $id = $_POST['id'];
      if(empty($comments)) {
        die("請輸入內容");
      }
      $stmt = $conn->prepare("UPDATE cocoisbad_comments SET content = '$comments' WHERE id=?");
      $stmt->bind_param("s", $id);
      if ($stmt->execute()) {
        header('Location: ./index.php?page=1');
      } else {
        echo ("failed" . $conn->error);
      }
    } 
?>