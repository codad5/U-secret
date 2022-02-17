<?php


 function emptyinput($name, $upwd){
  $result;
  if (empty($name) || empty($upwd)) {
    $result = true;

  }

  else {
    $result = false;
    session_start();
  }
  return $result;
}

function emptymsg($msg){
 $result;
 if (empty($msg)) {
   $result = true;
 }

 else {
   $result = false;
 }
 return $result;
}


function invalidUid($name){
 $result;
 if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
   $result = true;
 }

 else {
   $result = false;
 }
 return $result;
}


function UidExist($conn, $name){
  $sql ="SELECT * FROM users WHERE usersName = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:../index.php?error=stmtfailed#formbox");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $name);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }

  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);

}


function createUser($conn, $name, $upwd){
  $sql ="INSERT INTO users (usersName, usersPwd) VALUES (?, ?);";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:../index.php?error=stmtfailed#formbox");
    exit();
  }


$hashedPwd = password_hash($upwd, PASSWORD_DEFAULT);




  mysqli_stmt_bind_param($stmt, "ss", $name, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  createusertable($conn, $name);
  loginUser($conn, $name, $upwd);
  exit();

}

function sendmsg($conn, $msg, $name){
  $date = date("y-m-d");
  $time = date("H:i:sa");
  $datetime = $date." ".$time;
  $sql ="INSERT INTO ".$name." (msg, date) VALUES (?,?);";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:../index.php?error=stmtfailed");
    exit();
  }





  mysqli_stmt_bind_param($stmt, "ss", $msg, $datetime);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("location:../index.php?cng=sucess#formbox");
  exit();

}

function createusertable($conn, $name){
  $sql = "CREATE TABLE ".$name." (
    msgid int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    msg varchar(260) NOT NULL,
    date datetime NOT NULL
  );";
  $resultfinal = mysqli_query($conn, $sql);
}

function   loginUser($conn, $name, $upwd){
  $uidExists = UidExist($conn, $name);

  if ($uidExists === false) {
    header("location:../index.php?error=wronglogin#formbox");
    exit();
  }


  $pwdHashed = $uidExists['usersPwd'];
  $checkPwd = password_verify($upwd, $pwdHashed);

  if ($checkPwd === false) {
    header("location:../index.php?error=wrongpassword#formbox");
    exit();
  }

  else if ($checkPwd === true) {
    session_start();
    $_SESSION['uid'] = $uidExists['usersId'];
    $_SESSION['useruid'] = $uidExists['usersName'];
    header("location:../home.php");
    exit();

  }


}
function realuid($conn, $mu){
  $uidExist = UidExist($conn, $mu);

  if ($uidExist === false) {
    header("location:index.php?error=stmtfailed");
    exit();
  }


}


function deletemsg($conn, $delmsg, $msgu){
  $sql = "DELETE FROM ".$msgu." WHERE msgid='".$delmsg."';";
  $resultfinal = mysqli_query($conn, $sql);
}


function deleteuser($conn, $duser){
  $sql = "DELETE FROM users WHERE usersName='".$duser."';";
  $resultfinal = mysqli_query($conn, $sql);
  $sql = "DELETE FROM ".$duser.";";
  $resultfinal = mysqli_query($conn, $sql);
  $sql = "DROP TABLE ".$duser.";";
  $resultfinal = mysqli_query($conn, $sql);
  session_start();
  session_unset();
  session_destroy();
  header("location:../index.php?error=sucessfull");
  exit();
}




function   cpwd($conn, $pcuser, $cpwd, $npwd){
  $uidExists = UidExist($conn, $pcuser);

  if ($uidExists === false) {
    header("location:../index.php?error=wronglogin#formbox");
    exit();
  }


  $pwdHashed = $uidExists['usersPwd'];
  $checkPwd = password_verify($cpwd, $pwdHashed);

  if ($checkPwd === false) {
    header("location:../setting.php?error=wrongpassword");
    exit();
  }

  else if ($checkPwd === true) {
    $hashedPwd = password_hash($npwd, PASSWORD_DEFAULT);
    $sql ="UPDATE users set usersPwd='".$hashedPwd."' WHERE usersName='".$pcuser."';";
    $resultfinal = mysqli_query($conn, $sql);









  }


}
