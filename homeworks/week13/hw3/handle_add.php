<?php
  session_start();
  require_once('./conn.php');
  if(!isset($_SESSION['username'])) {
      die("notLogin");
  } else {
    /*
    $stmt = $conn->prepare("SELECT * from cocoisbad_users_certificate WHERE id=?");
    $stmt->bind_param("s", $_COOKIE["member_id"]);
    $stmt->execute();
    $result = $stmt->get_result();
    if($row = $result->fetch_assoc()) {
      $username = $row['username'];
    } else {
      echo ("系統不穩，請在試一次");
    }
    */
    $username = $_SESSION['username'];
    $nickname = $_SESSION['nickname'];

  }
    $comments = $_POST['comments'];
    if(empty($comments)) {
    die("notContent");
     // die("請輸入內容");
    }



    $sql = "INSERT INTO cocoisbad_comments(username, content) VALUES('$username', '$comments')";
    if ($conn->query($sql)) {


    //ajax
    $sql = 'SELECT cocoisbad_comments.content,
              cocoisbad_comments.created_at,
              cocoisbad_comments.id,
              cocoisbad_comments.username,
              cocoisbad_users.nickname
            FROM cocoisbad_comments
            JOIN cocoisbad_users ON cocoisbad_users.username = cocoisbad_comments.username ORDER BY created_at  DESC LIMIT 1';

          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            $row2 = $result->fetch_assoc();
         //   $nickname = $row2['nickname'];
            $created_at = $row2['created_at'];
            $id = $row2['id'];
          }

      $arr = array('result' => 'success', 'name' => $nickname, 'created_at' => $created_at, 'id' => $id);
      echo json_encode($arr);
      //header('Location: ./index.php?page=1');
    } else {
      echo ("failed" . $conn->error);
    }
?>

