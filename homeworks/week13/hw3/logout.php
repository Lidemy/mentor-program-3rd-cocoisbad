<?php
  session_start();
  //setcookie("member_id", '', 0);
  session_destroy();
  header('Location: ./index.php?page=1');
?>