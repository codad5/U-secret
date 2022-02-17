<?php
session_start();


 ?>
 <?php
if (isset($_SESSION['useruid'])) {

$cuser = $_SESSION['useruid'];
require 'includes/functions.inc.php';
require 'includes/dhb.inc.php';


$sql = "SELECT * FROM ".$cuser." ORDER BY msgid DESC;";

$resultmsg = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($resultmsg);

$uidExists = UidExist($conn, $cuser);

if ($uidExists === false) {
 session_start();
 session_unset();
 session_destroy();
 header("location:index.php?error=wronglogin#formbox");
 exit();
}




}

else {
 header("location: index.php");
 exit();
}
 ?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Message, Anonymous, Anonymous message, Anonymous messaging">
    <meta name="description" content="Send anonymously to friends">
    <meta name="page_type" content="App">
    <?php
      if (isset($_SESSION['useruid'])) {
        echo "<title>Message ".$_SESSION['useruid']." anonymously now 😍😍😘🥰 at Usecrets.com</title>";
      }

      else if (isset($_GET['msgme'])) {
        echo "<title>Message ".$_GET['msgme']." anonymously now 😍😍😘🥰 at Usecrets.com</title>";
      }

      else {
        echo "<title>Signup for Usecrets Now</title>";
      }

     ?>

<link rel="stylesheet" href="css/Page-1.css" media="screen">
    <script class="u-script" type="text/javascript" src="scripts/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="scripts/scripts.js" defer=""></script>
    <link rel="stylesheet" href="css/master.css">
    <link rel="icon" href="images/favicon.png">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">



    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Usecret",
		"url": "index.php",
		"logo": "images/logo_usecret1.png"
}</script>
    <meta property="og:title" content="Usecret anonymous messaging">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Send anonymously to friends">
    <meta name="theme-color" content="#0c8558">
    <link rel="canonical" href="index.php">
    <meta property="og:url" content="index.php">
    <style media="screen">
      .delete{
        width: 100%;
        display: inline-block;
        background: green;
        color: currentColor;
        text-align: center;
      }
    </style>
  </head>
  <body class="u-body"><header class="u-clearfix u-header u-header" id="sec-aba3"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <a href="index.php" class="u-image u-logo u-image-1" data-image-width="2053" data-image-height="1490">
          <img src="images/logo_usecret1.png" class="u-logo-image u-logo-image-1" data-image-width="64">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</symbol>
</defs></svg>
            </a>
          </div>
          <div class="u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Home.php" style="padding: 10px 20px;">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="About.php" style="padding: 10px 20px;">About</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Contact.php" style="padding: 10px 20px;">Contact</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="includes/logout.inc.php" style="padding: 10px 20px;">Logout</a>
</li></ul>
          </div>
          <div class="u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.php">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="About.php">About</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.php">Contact</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="includes/logout.inc.php">Logout</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-clearfix u-image u-shading u-section-1" src="" data-image-width="1080" data-image-height="1080" id="sec-f0b8">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xl u-container-style u-layout-cell u-left-cell u-size-60 u-layout-cell-1">
                <div class="u-container-layout u-valign-middle u-container-layout-1">
                  <h1 class="u-align-center-xs u-heading-font u-text u-title u-text-1"><?php echo $cuser; ?></h1>
                  <p class="u-align-left-xs u-large-text u-text u-text-font u-text-variant u-text-2"> <code> Send link to friends: <a href="textme.php?msgme=<?php echo $cuser; ?>" class="ulink" id="ulink">localhost/Usecre/textme.php?msgme=<?php echo $cuser; ?></a> </code><input type="text" name="" value="" id="uulink" style="opacity:0.1;" readonly> </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-2" id="sec-9165">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-expanded-width u-tab-links-align-left u-tabs u-tabs-1">
          <ul class="u-border-2 u-border-palette-1-base u-spacing-10 u-tab-list u-unstyled" role="tablist">
            <li class="u-tab-item" role="presentation">
              <a class="active u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-1" id="link-tab-0da5" href="#tab-0da5" role="tab" aria-controls="tab-0da5" aria-selected="true">Messages</a>
            </li>
            <li class="u-tab-item" role="presentation">
              <a class="u-active-palette-1-base u-button-style u-grey-10 u-link u-text-active-white u-text-black u-tab-link-2" href="" onclick="copy()">Copy</a>
            </li>
            <li class="u-tab-item" role="presentation">
              <a class="u-active-palette-1-base u-button-style u-grey-10 u-link u-text-active-white u-text-black u-tab-link-3 more"  >Share</a>
              <script>
             const sharebutton = document.querySelector('.more');
             const title = window.document.title;
             const url = window.document.querySelector('.ulink').href;

             sharebutton.addEventListener('click', () => {
                  if (navigator.share) {
                    navigator.share({
                      title: `${title}`,
                      url: `${url}`
                    }).then(() => {
                      console.log('Thanks for sharing!');
                    })
                    .catch(console.error);
                  }
                  else {

                  }
             })

             </script>

             <script type="text/javascript">
            function copy() {


                var ttbcl = document.getElementById('ulink').href;
                var ttbc = document.getElementById('uulink');
                    ttbc.value=ttbcl;

                                ttbc.select();

                                ttbc.setSelectionRange(0, 999999);

                                document.execCommand('copy');








              }
            </script>
            </li>
            <li class="u-tab-item u-tab-item-4" role="presentation">
              <a class="u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-4" id="tab-93fc" href="#link-tab-93fc" role="tab" aria-controls="link-tab-93fc" aria-selected="false">Setting</a>
            </li>
          </ul>
          <div class="u-tab-content">
            <div class="u-container-style u-tab-active u-tab-pane u-white u-tab-pane-1" id="tab-0da5" role="tabpanel" aria-labelledby="link-tab-0da5">
              <div class="u-container-layout u-valign-top u-container-layout-1">
                <h4 class="u-text u-text-1">Your Messages!</h4>
                <div class="u-expanded-width u-table u-table-responsive u-table-1">
                  <table class="u-table-entity">
                    <colgroup>
                      <col width="83.3%">

                      <col width="16.5%">
                    </colgroup>
                    <tbody class="u-table-alt-grey-5 u-table-body">
                      <tr style="height: 48px;">
                        <td class="u-table-cell">Message</td>
                        <td class="u-table-cell">Message info</td>

                      </tr>
                      <tr style="background:black;color:whitesmoke;">
                        <td class="u-table-cell">You have <code style="color:red;"> <?php echo $resultcheck; ?></code> MESSAGES</td>
                        <td class="u-table-cell">Description</td>

                      </tr>
                      <?php
require_once 'includes/dhb.inc.php';
require_once 'includes/functions.inc.php';

$sql = "SELECT * FROM ".$cuser." ORDER BY msgid DESC;";

$resultmsg = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($resultmsg);
/*setcookie($cuser, $resultcheck, time() + 86000000);


if (isset($_COOKIE[$cuser])) {

$newmsg = $resultcheck - $_COOKIE[$cuser];
if ($newmsg > 0) {
 echo "<div class='msgnoti' id='msgnoti'>You have<b style='color:red;'> ".$newmsg."</b> new message(s)<button onclick='closenoti()'>&times;</button></div>";
}
}*/
//to know number of new msg


if ($resultcheck > 0) {
  while ($row = mysqli_fetch_assoc($resultmsg)) {
    echo "<tr><td class='msga'>".$row['msg']."</td><td><br><code class='msgtime'>".$row['date']." GMT<br><a class='delete ' href='includes/deletemsg.inc.php?aim=".$row['msgid']."'>DELETE<i class='fa fa-trash'></i></a></code><br><a href='' id='anyno'>@anonymous_me</a></td></tr>";

  }
}

elseif ($resultcheck == 0) {
  echo "<tr class='msgs'> <td>  NO MESSAGES YET!!!</td></tr>";
}




 ?>



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="u-align-left u-container-style u-tab-pane u-white u-tab-pane-2" id="tab-14b7" role="tabpanel" aria-labelledby="link-tab-14b7">
              <div class="u-container-layout u-valign-top u-container-layout-2">
                <p class="u-text u-text-2">Sample text. Click to select the text box. Click again or double click to start editing the text. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br>
                  <br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
              </div>
            </div>
            <div class="u-container-style u-tab-pane u-white u-tab-pane-3" id="tab-2917" role="tabpanel" aria-labelledby="link-tab-2917">
              <div class="u-container-layout u-container-layout-3">
                <h4 class="u-text u-text-default u-text-3">Be The First To Review This Product!</h4>
                <p class="u-text u-text-4">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                <a href="" class="u-btn u-button-style u-btn-1">write product review</a>
              </div>
            </div>
            <div class="u-container-style u-tab-pane u-white u-tab-pane-4" id="link-tab-93fc" role="tabpanel" aria-labelledby="tab-93fc">
              <div class="u-container-layout u-container-layout-4"></div>
            </div>
          </div>
        </div>
      </div>
    </section>


  <?php
  include_once 'footer.php'; ?>
