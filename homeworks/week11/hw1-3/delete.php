<?php
  require_once('./conn.php');
  $id = $_GET['id'];
  $sql = "DELETE FROM cocoisbad_comments WHERE id =" . $id;
  if($conn->query($sql)) {
  	header('Location: ./index.php?page=1');
  } else {
  	echo "failed:" . $conn->error;
  }
?>