<?php
  require_once('./conn.php');


  if(!isset($_COOKIE["member_id"])) {
      die("not login");
  } else {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * from cocoisbad_users_certificate WHERE id=?");
    $stmt->bind_param("s", $_COOKIE["member_id"]);
    $stmt->execute();
    $result = $stmt->get_result();
    if($row = $result->fetch_assoc()) {
      $user_id = $row['id'];
    } else {
      echo ("系統不穩，請在試一次");
    }
  }
    $reply = $_POST['reply'];
    if(empty($reply)) {
      die("請輸入內容");
    }
    $sql = "INSERT INTO cocoisbad_reply(comments_id, reply_user_id, reply_content) VALUES('$id', '$user_id', '$reply')";
    if ($conn->query($sql)) {
      header('Location: ./index.php?page=1');
    } else {
      echo ("failed" . $conn->error);
    }
?>