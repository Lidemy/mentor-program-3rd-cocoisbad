<?php
  require_once('./conn.php');
  $registerName = $_POST['registerName'];
  $registerPassword = $_POST['registerPassword'];
  $registerNickname = $_POST['registerNickname'];

  if(empty($registerName) || empty($registerPassword) || empty($registerNickname)) {
    die("請確認內容");
  }

  $hash = password_hash($registerPassword, PASSWORD_DEFAULT);
  


  $sql = "INSERT INTO cocoisbad_users(username, password, nickname) VALUES('$registerName', '$hash', '$registerNickname')";
  if ($conn->query($sql)) {
  	header('Location: ./index.php?page=1');
  } else {
  	echo ("failed" . $conn->error);
  }

?>