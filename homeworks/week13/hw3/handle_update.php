<?php
  session_start();
  require_once('./conn.php');
  if(!isset($_SESSION['username'])) {
        die("not login");
    } else {
      $comments = $_POST['comments'];
      $id = $_POST['id'];
/*
      $stmt = $conn->prepare("SELECT * FROM cocoisbad_users_certificate WHERE id=?");
      $stmt->bind_param("s", $_COOKIE["member_id"]);
      if($stmt->execute()) {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
      } else {
          die("failed");
        }
*/
        $stmt = $conn->prepare("UPDATE cocoisbad_comments SET content = '$comments' WHERE id=? and username=?");
        $stmt->bind_param("ss", $id, $_SESSION['username']);
          if($stmt->execute()) {
            header('Location: ./index.php?page=1');
          } else {
            echo "這不是你的文章";
          }      
    } 
?>