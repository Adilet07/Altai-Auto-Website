<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ALTAI AUTO</title>
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="style/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<script type="text/javascript" src="jquery123.js"></script>
 <script>
  $(document).ready(
    function()
    {
      $("#search").keyup(function()
     {
       var length = $(this).val().length;
       if (length >= 2)
       {
         var string = $(this).val();
         $.post("search.php",{title:string},function(data)
                 {
                   if (data != "")
                   {
                   $("#autocomplete").show();
                   $("#autocomplete").html(data);
                   }
                   else
                   {
                  $("#autocomplete").show();
                  $("#autocomplete").html("<i>NO RESULTS FOUND</i>");
                   }
                 }
               );
       }
       else if(length<2)
       {
         $("#autocomplete").hide();
       }
       else if(length == 0)
       {
         $("#autocomplete").html("");
       }
     });
    });
  </script>
    <style>
	#autocomplete
  {
    width: 185px;
    border: 1px solid #333;
	background-color:#fff;
    display: none;
	z-index:1111111;
  }
 a
 {
   text-decoration: none;
   color: #333;
   z-index:11111111;
   	background-color:#fff;


 }
 a:visited
 {
   color: #333;
 }
  #autocomplete li
  {
  cursor: pointer;
  padding: 5px;
  	z-index:111221111;
		background-color:#fff;


  }
  #autocomplete li:hover
  {
    background: #ccc;
		z-index:11131321111;
	background-color:#fff;

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
			<li><a id="nav" href="index.php" >Home</a></li>
            <li><a id="nav" href="about.php">About</a></li>
';
			}
			else {
			echo '<li><a id="nav" href="index.php">Home</a></li>
            <li><a id="nav" href="product.php" class="selected">Products</a></li>
            <li><a id="nav" href="about.php">About</a></li>
            <li><a id="nav" href="contact.php">Contact us</a></li>
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
        <div id="sidebar">
        	<input type="text" id="search" placeholder="Search"/>
			<div id="autocomplete"></div>
		</div><!-- END of sidebar -->

        <div id="content">
		<!-- View Cart Box Start -->
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
	echo '<div class="cart-view-table-front" id="view-cart">';
	echo '<h3>Your Shopping Cart</h3>';
	echo '<form method="post" action="cart_update.php">';
	echo '<table width="100%"  cellpadding="6" cellspacing="0">';
	echo '<tbody>';

	$total =0;
	$b = 0;
	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		$product_name = $cart_itm["product_name"];
		$product_qty = $cart_itm["product_qty"];
		$product_price = $cart_itm["product_price"];
		$product_code = $cart_itm["product_code"];
		$bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
		echo '<tr class="'.$bg_color.'">';
		echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
		echo '<td>'.$product_name.'</td>';
		echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
		echo '</tr>';
		$subtotal = ($product_price * $product_qty);
		$total = ($total + $subtotal);
	}
	echo '<td colspan="4">';
	echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';
	echo '</td>';
	echo '</tbody>';
	echo '</table>';

	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	echo '</form>';
	echo '</div>';

}
?>
<!-- View Cart Box End -->


<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT product_code, product_name, product_descr, product_img, price FROM products ORDER BY product_id ASC");
if($results){
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<li class="product">
	<form method="post" action="cart_update.php">
	<div class="product-content"><h3>{$obj->product_name}</h3>
	<div class="product-thumb"><img src="images/product/{$obj->product_img}"></div>
	<div class="product-descr">{$obj->product_descr}</div>
	<div class="product-info">
	Price {$currency}{$obj->price}

	<fieldset>

	<label>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>

	</fieldset>
	<input type="hidden" name="product_code" value="{$obj->product_code}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="add_to_cart">Add to cart</button></div>
	</div></div>
	</form>
	</li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>
<!-- Products List End -->

        <div class="cleaner"></div>
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
            <li><a id="nav" href="about.html">About</a></li>';
			}
			else {
			echo '<li><a id="nav" href="index.php" class="selected">Home</a></li>
            <li><a id="nav" href="product.php">Products</a></li>
            <li><a id="nav" href="about.html">About</a></li>
            <li><a id="nav" href="contact.html">Contact us</a></li>';
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
