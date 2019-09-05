<?php
  session_start();
  require_once('./conn.php');
	if(!isset($_SESSION['username'])) {
	      die("not login");
	  } else {
	    $id = $_POST['id'];
	    /*
	    $stmt = $conn->prepare("SELECT * FROM cocoisbad_users_certificate WHERE id=?");
		  $stmt->bind_param("s", $_COOKIE["member_id"]);
		  if($stmt->execute()) {
			  $result = $stmt->get_result();
			  $row = $result->fetch_assoc();
		  } else {
        	die("failed");
        */
     //   $username = $_SESSION['username'];
        $username = $_SESSION['username'];
     //   print_r($id ,$username);
	   }

        $stmt = $conn->prepare("DELETE FROM cocoisbad_comments WHERE id=? and username=?");
	    $stmt->bind_param("ss", $id, $username);
          if($stmt->execute()) {
          	echo "success";
           // header('Location: ./index.php?page=1');
          } else {
            echo "這不是你的文章";
          }
	//}
?>