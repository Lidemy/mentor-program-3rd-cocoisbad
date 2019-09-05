<?php

  require_once('./conn.php');
  $registerName = $_POST['registerName'];
  $registerPassword = $_POST['registerPassword'];


  if(empty($registerName) || empty($registerPassword)) {
    die("請確認內容");
  }
  
  $stmt = $conn->prepare("SELECT * FROM cocoisbad_users WHERE username=?");
  $stmt->bind_param("s", $registerName);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $hash = $row['password'];
  if (password_verify($registerPassword, $hash)) {
    session_start();
      $_SESSION['username'] = $row['username'];
      $_SESSION['nickname'] = $row['nickname'];
     header('Location: ./index.php?page=1');
  } else {
      echo ("在試一次");
    }
?>