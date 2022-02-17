


<?php
if (isset($_POST['send'])) {

  require_once 'dhb.inc.php';
  require_once 'functions.inc.php';
  session_start();


  $name = $_POST['receiver'];
  $_SESSION['reciever'] = $name;
  $msg = $_POST['msg'];
  $msg = filter_var($msg, FILTER_SANITIZE_STRING);
  echo $msg;

  if(emptymsg($msg, $name) !== false){
    header("location:../textme.php?msgme=".$_SESSION['reciever']."&error=emptymsg");
    exit();


  }





  if(UidExist($conn, $name) !== false){

    sendmsg($conn, $msg, $name);



  }


  else {
    header("location:../index.php");
    exit();

  }





}

else {
  header("location:../index.php");
}
 ?>
