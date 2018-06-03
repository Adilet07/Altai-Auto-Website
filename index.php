<?php require_once("includes/connection.php"); ?>
<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ALTAI AUTO</title>
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" src="js/ddsmoothmenu.js">

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

<link rel="stylesheet" type="text/css" href="css/styles.css" />
<script language="javascript" type="text/javascript" src="scripts/mootools-1.2.1-core.js"></script>
<script language="javascript" type="text/javascript" src="scripts/mootools-1.2-more.js"></script>
<script language="javascript" type="text/javascript" src="scripts/slideitmoo-1.1.js"></script>
<script language="javascript" type="text/javascript">
	window.addEvents({
		'domready': function(){
			/* thumbnails example , div containers */
			new SlideItMoo({
						overallContainer: 'SlideItMoo_outer',
						elementScrolled: 'SlideItMoo_inner',
						thumbsContainer: 'SlideItMoo_items',
						itemsVisible: 5,
						elemsSlide: 2,
						duration: 200,
						itemsSelector: '.SlideItMoo_element',
						itemWidth: 171,
						showControls:1});
		},
	});
</script>

</head>

<body id="home">

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
			<li><a id="nav" href="index.php" class="selected">Home</a></li>
            <li><a id="nav" href="about.php">About</a></li>
';
			}
			else {
			echo '<li><a id="nav" href="index.php" class="selected">Home</a></li>
            <li><a id="nav" href="product.php">Products</a></li>
            <li><a id="nav" href="about.php">About</a></li>
            <li><a id="nav" href="contact.php">Contact us</a></li>

				  <li><a id="sign" href="logout.php">Logout</a></li>
				  <li><a id="sign">'.$_SESSION['session_username'].'</a></li>';
			}
			 ?>
			  </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->

    <div id="templatemo_middle">
    	<img src="images/autospares1.jpg" style="width:500px; height:220px" alt="Image 01" />
    	<h1>ALTAI AUTO</h1>
        <p><a style="font-weight:bold; color:#fff;">Altai Auto</a> is an online shop of auto particles. We have a huge variety of spares of high quality!</p>
        <?php
				if(!isset($_SESSION["session_username"]))
				{
					echo '<a class="buy_now">Please, log in to see the main features!</a>';
				}
					else {
						echo '<a href="product.php" class="buy_now">Browse All Products</a>';
					}
				?>
    </div> <!-- END of middle -->

    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
    	<div id="product_slider">
    		<div id="SlideItMoo_outer">
                <div id="SlideItMoo_inner">
                    <div id="SlideItMoo_items">
                        <div class="SlideItMoo_element">
                                <a href="#" target="_parent">
                                <img src="images/gallery/01.jpg" style="width:160px; height:120px" alt="product 1" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                                <a href="#" target="_parent">
                                <img src="images/gallery/02.jpg" style="width:160px; height:120px" alt="product 2" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                                <a href="#" target="_parent">
                                 <img src="images/gallery/03.jpg" style="width:160px; height:120px" alt="product 3" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                                <a href="#" target="_parent">
                                <img src="images/gallery/04.jpg" style="width:160px; height:120px" alt="product 4" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                                <a href="#" target="_parent">
                               <img src="images/gallery/05.jpg" style="width:160px; height:120px" alt="product 5" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                                <a href="#" target="_parent">
                                <img src="images/gallery/06.jpg" style="width:160px; height:120px" alt="product 6" /></a>
                        </div>
                        <div class="SlideItMoo_element">
                                <a href="#" target="_parent">
                                <img src="images/gallery/07.jpg" style="width:160px; height:120px" alt="product 7" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cleaner"></div>
        </div>


        <div id="content">

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
			'<li><a id="nav" href="index.php" class="selected">Home</a></li>
            <li><a id="nav" href="about.php">About</a></li>';
			}
			else {
			echo '<li><a id="nav" href="index.php" class="selected">Home</a></li>
            <li><a id="nav" href="product.php">Products</a></li>
            <li><a id="nav" href="about.php">About</a></li>
            <li><a id="nav" href="contact.php">Contact us</a></li>';
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

</body>
</html>
