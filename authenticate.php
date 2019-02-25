<?php 
  session_start();
  $isSessionSet = (!isset($_SESSION['user_id']) || !isset($_SESSION['HTTP_USER_AGENT']));
  $isClientChanged = $_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'] . 's3cr3t_k3y');
  if ($isSessionSet || $isClientChanged) {
    header("Location:/wbdojek/login.php");
  }
?>