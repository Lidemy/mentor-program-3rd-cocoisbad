<?php
  require_once('./conn.php');
  $id = $_GET['id'];

  $stmt = $conn->prepare("DELETE FROM cocoisbad_comments WHERE id=?");
    $stmt->bind_param("s", $id);
  if($stmt->execute()) {
  	header('Location: ./index.php?page=1');
  } else {
  	echo "failed:" . $conn->error;
  }
?>