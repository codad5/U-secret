<?php
if (isset($_POST['signup'])){


$name = $_POST['username'];
$upwd = $_POST['upwd'];

require_once 'dhb.inc.php';
require_once 'functions.inc.php';

if(emptyinput($name, $upwd) !== false){
  header("location:../index.php?error=emptyinput#formbox");
  exit();


}




  if(invalidUid($name) !== false){
    header("location:../index.php?error=Invaliduid#formbox");
    exit();


  }

  if(UidExist($conn, $name) !== false){
    header("location:../index.php?error=usernamealreadytaken#formbox");
    exit();



  }


  createUser($conn, $name, $upwd);
  


}

else {
  header("location:../index.php");
  exit();
}
