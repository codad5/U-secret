<?php

if (isset($_GET['aim'])) {
  session_start();
  require_once 'dhb.inc.php';
  require_once 'functions.inc.php';

  if (isset($_SESSION['useruid'])) {

 $delmsg = $_GET['aim'];
 $msgu = $_SESSION['useruid'];
 deletemsg($conn, $delmsg, $msgu);
 header("location:../home.php?del");


  }


  elseif (!isset($_SESSION['useruid'])) {
    header("location:../index.php");
  }
else {
  header("location:../index.php");
}
}
