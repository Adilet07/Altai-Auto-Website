<?php require_once("includes/connection.php"); ?>
<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ALTAI AUTO</title>
<meta name="keywords" content="web store, contact page, form, free templates, website templates, CSS, HTML" />
<meta name="description" content="Web Store Theme, Contact Form, free CSS template provided by templatemo.com" />
<link href="../phpform/css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="../phpform/css/ddsmoothmenu.css" />

<script type="text/javascript" src="../phpform/js/jquery.min.js"></script>
<script type="text/javascript" src="../phpform/js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<style>
 #contact-wrapper {
 	width:430px;
 	border:1px solid #e2e2e2;
 	background:#F1F1F1;
 	padding:20px;
 }
 #contact-wrapper div {
 	clear:both;
 	margin:1em 0;
 }
 #contact-wrapper label {
 	display:block;
 	float:none;
 	font-size:16px;
 	width:auto;
 }
 form#contactform input {
 	border-color:#B7B7B7 #E8E8E8 #E8E8E8 #B7B7B7;
 	border-style:solid;
 	border-width:1px;
 	padding:5px;
 	font-size:16px;
 	color:#333;
 }
 form#contactform textarea {
 	font-family:Arial, Tahoma, Helvetica, sans-serif;
 	font-size:100%;
 	padding:0.6em 0.5em 0.7em;
 	border-color:#B7B7B7 #E8E8E8 #E8E8E8 #B7B7B7;
 	border-style:solid;
 	border-width:1px;
 }

 </style>

</head>

<body id="subpage">

<div id="templatemo_wrapper">
	<div id="templatemo_header">
		<div id="site_title"><h1><a href=""></a></h1></div>
		<div id="header_right">
            <ul id="language">
                <li><a><img src="images/rus.png" alt="English" /></a></li>
				<li><a><img src="images/eng.png" alt="English" /></a></li>
            </ul>
            <div class="cleaner"></div>
         </div> <!-- END -->

    </div> <!-- END of header -->

		<div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
	<?php
			if(!isset($_SESSION["session_username"]))
			{
			echo
			'<li><a id="sign" href="http://localhost/altai_auto/register.php">Sign up</a></li>
			<li><a id="sign" href="http://localhost/altai_auto/login.php">Log in</a></li>
			<li><a id="nav" href="index.php">Home</a></li>
            <li><a id="nav" href="about.html">About</a></li>
';
			}
			else {
			echo '<li><a id="nav" href="index.php">Home</a></li>
            <li><a id="nav" href="product.php">Products</a></li>
            <li><a id="nav" href="about.php">About</a></li>
            <li><a id="nav" href="contact.php" class="selected">Contact us</a></li>

				  <li><a id="sign" href="logout.php">Logout</a></li>
				  <li><a id="sign">'.$_SESSION['session_username'].'</a></li>';
			}
			 ?>
			  </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->

    <div class="cleaner h20"></div>
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">

        <div id="content">
        	<h2>Contact Information</h2>

            <?php

  if(isset($_POST['submit'])) {

  if(trim($_POST['contactname']) == '') {
  $Error = true;
  } else {
  $name = trim($_POST['contactname']);
  }

  if(trim($_POST['email']) == '')  {
  $Error = true;
  } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
  $Error = true;
  } else {
  $email = trim($_POST['email']);
  }

  if(trim($_POST['message']) == '') {
  $Error = true;
  } else {
  if(function_exists('stripslashes')) {
  $comment = stripslashes(trim($_POST['message']));
  } else {
  $comment = trim($_POST['message']);
  }
  }

  if(!isset($Error)) {
  $emTo = 'adlet.askerov98@gmail.com';
  $bodymsg = "Name: $name \n\nEmail: $email \n\nComments:\n $comment";
  $headermsg = 'From: Altai Auto <'.$emTo.'>' . "\r\n" . 'Reply-To: ' . $email;
 mail($emTo, $bodymsg, $headermsg);
  $emSent = true;
  }
  }
  ?>
  <div id="contact-wrapper">
	  <?php if(isset($Error)) {?>
		<p class="error">Please, check so that all the fields are filled.</p>
	<?php } ?>

	<?php if(isset($emSent) && $emSent == true) {?>
		<p><strong>Email is successfully sent!</strong></p>
		<p>Thank you, <strong><?php $_SESSION["session_username"]?></strong>. Your email has been sent to us and we will respond to it as soon as possible!</p>
	<?php } ?>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
      <div>

      <label for="name"><strong>Name:</strong></label>
      <input type="text" size="50" name="contactname" id="contactname" value="" class="required" />
      </div>
       <div>
        <label for="email"><strong>Email:</strong></label>
        <input type="text" size="50" name="email" id="email" value="" class="required email" />
        </div>
       <div>
        <label for="message"><strong>Message:</strong></label>
        <textarea rows="5" cols="50" name="message" id="message" class="required"></textarea>
        </div>
        <input type="submit" value="Send Message" name="submit" />
        </form>
  </div>
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->

    <div id="templatemo_footer">
        <div class="col col_16">
        	<h4>Pages</h4>
            <ul class="footer_menu">
<?php
			if(!isset($_SESSION["session_username"]))
			{
			echo
			'<li><a id="nav" href="index.php">Home</a></li>
            <li><a id="nav" href="about.php">About</a></li>';
			}
			else {
			echo '<li><a id="nav" href="index.php" >Home</a></li>
            <li><a id="nav" href="product.php">Products</a></li>
            <li><a id="nav" href="about.php">About</a></li>
            <li><a id="nav" href="contact.php" class="selected">Contact us</a></li>';
			}
			 ?>			</ul>
        </div>
        <div class="col col_13 no_margin_right" style="float:right">
        	<h4>About Us</h4>
            <p>Altai Auto is an online shop of auto particles. We have a huge variety of spares of high quality!</p>
			<p>Address: Republic Avenue 15, Kazakhstan, Astana. </p>
			<p> Mobile telephone:+7-701-388-48-18</p>
        </div>

        <div class="cleaner h40"></div>
		<center>
			Copyright © 2016 ALTAI AUTO
		</center>
    </div> <!-- END of footer -->

</div>

</body>
</html>
