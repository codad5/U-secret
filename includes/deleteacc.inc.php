<?php


  session_start();
  require_once 'dhb.inc.php';
  require_once 'functions.inc.php';

  if (isset($_SESSION['useruid'])) {


 $duser = $_SESSION['useruid'];
 deleteuser($conn, $duser);
 header("location:index.php?error=sucessfull");


  }


  elseif (!isset($_SESSION['useruid'])) {
    header("location:../index.php");
  }
else {
  header("location:../index.php");
}
