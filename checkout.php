<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>


	<?php
if(isset($_POST["register"]))
{
	$product_name=$_POST['product_name'];
	$Username=$_POST['Username'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$Email=$_POST['Email'];
	$PhoneNumber=$_POST['PhoneNumber'];
	$cost=$_POST['cost'];


if(!empty($_POST['product_name']) && !empty($_POST['Username']) && !empty($_POST['address']) && !empty($_POST['city'])&& !empty($_POST['Email']) && !empty($_POST['PhoneNumber']) && !empty($_POST['cost']))
{
		$sql="INSERT INTO orders
				(product_name, Username, address, city, Email, PhoneNumber, cost)
				VALUES('$product_name','$Username','$address', '$city', '$Email','$PhoneNumber','$cost')";

		$result=mysql_query($sql);

		if($result)
			{
		 		$message = "Your order is purchased. Thanky You!";
			} else
			{
		 		$message = "Failed to insert data information!";
			}
	}

	} else {
		 $message = "All fields are required!";
	}
?>

<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>

<div class="container mregister">
			<div id="login">
	<h1>ORDER</h1>
<form name="registerform" id="registerform" class="formular" action="checkout.php" method="post">
	<p>
		<label for="product_name">Enter the product name<br />
		<input type="text" name="product_name" id="product_name" class="input" size="30" value=""  /></label>
	</p>

	<p>
		<label for="user_login">Username<br />
		<input type="text" name="Username" id="Username" class="input" size="30" value="" /></label>
	</p>

	<p>
		<label for="user_address">Enter your address<br />
		<input type="text" name="address" id="address" class="input" size="60" value=""  /></label>
	</p>

	<p>
		<label for="user_city">Enter your city<br />
		<input type="text" name="city" id="city" class="input" size="24" value=""  /></label>
	</p>

	<p>
		<label for="user_email">Email<br/>
		<input type="email" name="Email" id="Email" class="input" value="" size="21"/>
		<span id="validEm"></span>
		</label>
	</p>

	<p>
		<label for="user_phone">Enter your telephone Number<br />
		<input type="text" name="PhoneNumber" id="PhoneNumber" class="input"/></label>
	</p>
	<p>
		<label for="total_cost">Total cost from your CART<br/>
		<input type="text" name="cost" id="cost" class="input" value="" size="10"/></label>
	</p>

		<p class="submit">
		<input type="submit" name="register" id="Order" class="button" value="Order" />
	</p>
</form>

	</div>
	</div>
