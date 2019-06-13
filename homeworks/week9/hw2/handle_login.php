<?php
  require_once('./conn.php');
  $registerName = $_POST['registerName'];
  $registerPassword = $_POST['registerPassword'];


  if(empty($registerName) || empty($registerPassword)) {
    die("請確認內容");
  }


  $sql = "SELECT * from users WHERE username = '" .  $registerName . "' AND password = '" . $registerPassword . "'";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    setcookie("member_id", $row['id'] , time()+3600*24);
    header('Location: ./index.php');
  } else {
    echo ("登入失敗");
  }


?>