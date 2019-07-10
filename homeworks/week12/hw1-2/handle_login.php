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

    //亂數id
    for($i = 0; $i < 32; $i += 1) {
    $randomChr = rand(1,3);
    if($randomChr === 1) {
      $randomCode = rand(0,9);
    }
    if($randomChr === 2) {
      $ascii = rand(97,122);
      $randomCode = chr($ascii);
    }
    if($randomChr === 3) {
      $ascii = rand(65,90);
      $randomCode = chr($ascii);
    }
    $randomId = $randomId . $randomCode;
  }

  $sql = "INSERT INTO cocoisbad_users_certificate(id, username) VALUES('$randomId', '$registerName')";
    if($conn->query($sql)) { 
      setcookie("member_id", $randomId , time()+3600*24);
      header('Location: ./index.php?page=1');
    } else {
      echo ("在試一次");
    }
  } else {
    echo ("登入失敗");
  }

?>