<?php
  require_once('./conn.php');
	if(!isset($_COOKIE["member_id"])) {
	      die("not login");
	  } else {
	    $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT 
          cocoisbad_comments.id,
          cocoisbad_users_certificate.username
           FROM cocoisbad_comments 
           JOIN cocoisbad_users_certificate ON cocoisbad_comments.user_id = cocoisbad_users_certificate.id
           WHERE cocoisbad_comments.id=?");
          $stmt->bind_param("s", $id);
          $stmt->execute();
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();
          

        $stmt = $conn->prepare("SELECT * from cocoisbad_users_certificate WHERE id=?");
        $stmt->bind_param("s", $_COOKIE["member_id"]);
        $stmt->execute();
        $result2 = $stmt->get_result();
        $row2 = $result2->fetch_assoc();
        
	      if($row2['username'] === $row['username']) {
	          $stmt = $conn->prepare("DELETE FROM cocoisbad_comments WHERE id=?");
	          $stmt->bind_param("s", $id);
	          if($stmt->execute()) {
	            header('Location: ./index.php?page=1');
	          } else {
	            echo "failed:" . $conn->error;
	          }
	      } else {
	        echo ("這不是您的文章");
	      }
	  }
?>