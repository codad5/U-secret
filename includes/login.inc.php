<?php


if (isset($_POST['login'])) {

  $name = $_POST['username'];
  $upwd = $_POST['upwd'];


  require_once 'dhb.inc.php';
  require_once 'functions.inc.php';


  if(emptyinput($name, $upwd) !== false){
    header("location:../index.php?error=emptyinput#formbox");
    exit();


  }

  loginUser($conn, $name, $upwd);


}

else {
  header("location:../index.php");
  exit();
}
