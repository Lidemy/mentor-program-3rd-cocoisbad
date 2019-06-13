<?php
  require_once('./conn.php');
  $registerName = $_POST['registerName'];
  $registerPassword = $_POST['registerPassword'];
  $registerNickname = $_POST['registerNickname'];

  if(empty($registerName) || empty($registerPassword) || empty($registerNickname)) {
    die("請確認內容");
  }
  $sql = "INSERT INTO users(username, password, nickname) VALUES('$registerName', '$registerPassword', '$registerNickname')";
  if ($conn->query($sql)) {
  	header('Location: ./index.php');
  } else {
  	echo ("failed" . $conn->error);
  }

?>