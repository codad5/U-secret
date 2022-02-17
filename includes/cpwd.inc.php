<?php


  session_start();
  require_once 'dhb.inc.php';
  require_once 'functions.inc.php';
  if (isset($_POST['chapwd'])) {
  if (isset($_SESSION['useruid'])) {

 $npwd = $_POST['npwd'];
 $cpwd = $_POST['cpwd'];
 $pcuser = $_SESSION['useruid'];
 cpwd($conn, $pcuser, $cpwd, $npwd);
 header("location:../setting.php?error=sucessfull");


  }


  elseif (!isset($_SESSION['useruid'])) {
    header("location:../index.php");
  }
}
else {
  header("location:../index.php");
}
