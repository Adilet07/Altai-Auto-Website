<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>


	<?php
if(isset($_POST["register"])) {

	$Username=$_POST['Username'];
	$Name=$_POST['Name'];
	$Surname=$_POST['Surname'];
	$Email=$_POST['Email'];
	$Pass=md5($_POST['Pass']);
	$DateOfBirth=$_POST['DateOfBirth'];
	$PhoneNumber=$_POST['PhoneNumber'];

		if(!empty($_POST['Username']) && !empty($_POST['Name']) && !empty($_POST['Surname']) && !empty($_POST['Email'])&& !empty($_POST['Pass']) && !empty($_POST['DateOfBirth']) && !empty($_POST['PhoneNumber'])) {

		$query=mysql_query("SELECT * FROM customers WHERE Username='$Username'");
		$numrows=mysql_num_rows($query);

		if($numrows==0)
		{
		$sql="INSERT INTO customers
				(Username, Name, Surname, Email, Pass, DateOfBirth, PhoneNumber)
				VALUES('$Username','$Name', '$Surname', '$Email','$Pass','$DateOfBirth','$PhoneNumber')";

		$result=mysql_query($sql);

		if($result){
		 $message = "Account Successfully Created";
		} else {
		 $message = "Failed to insert data information!";
		}

		} else {
		 $message = "That username already exists! Please try another one!";
		}

	} else {
		 $message = "All fields are required!";
	}
}
?>

<script type="text/javascript" src="js/jquery.js"></script>

<script>
function checkPass()
{
	var password1 = document.getElementById('Pass');
	var password2 = document.getElementById('ConfirmPass');
	var confirmMsg = document.getElementById('confirmMsg');
	var correctP = "#008fff";
	var incorrectP = "#ff6666";
	if(password1.value == password2.value)
	{
			password1.style.backgroundColor = correctP;
			password2.style.backgroundColor = correctP;
			confirmMsg.style.color = correctP;
			confirmMsg.innerHTML = "Passwords Match!"
	} else
		{
			password2.style.backgroundColor = incorrectP;
			confirmMsg.style.color = incorrectP;
			confirmMsg.innerHTML = "Passwords Do Not Match!"
		}
}
</script>

<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>

<div class="container mregister">
			<div id="login">
	<h1>REGISTER</h1>
<form name="registerform" id="registerform" class="formular" action="register.php" method="post">
	<p>
		<label for="user_login">Username<br />
		<input type="text" name="Username" id="Username" class="input" size="30" value=""  /></label>
	</p>

	<p>
		<label for="user_name">Name<br />
		<input type="text" name="Name" id="Name" class="input" size="17" value=""  /></label>
	</p>

	<p>
		<label for="user_surname">Surname<br />
		<input type="text" name="Surname" id="Surname" class="input" size="19" value=""  /></label>
	</p>

	<p>
		<label for="user_email">Email<br/>
		<input type="email" name="Email" id="Email" class="input" value="" size="21"/>
		<span id="validEm"></span>
		</label>
	</p>


	<p>
		<label for="user_pass">Password<br/>
		<input type="password" name="Pass" id="Pass" class="input" value="" size="255" style="background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;" /></label>
	</p>

	<p>
		<label for="user_confirmpass">Confirm Password<br />
		<input type="password" name="ConfirmPass" id="ConfirmPass" class="input" value="" size="255" onkeyup="checkPass(); return false;" style="background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;" /></label>
		<span id="confirmMsg" class="confirmMsg"></span>
	</p>


	<p>
		<label for="user_date">Date of Birth<br />
		<input type="date" name="DateOfBirth" id="DateOfBirth" class="input" /></label>
	</p>

	<p>
		<label for="user_phone">Telephone Number<br />
		<input type="text" name="PhoneNumber" id="PhoneNumber" class="input"/></label>
	</p>

		<p class="submit">
		<input type="submit" name="register" id="register" class="button" value="Register" />
	</p>

	<p class="regtext">Already have an account? <a href="login.php" >Login Here!</a> <br> <a href="index.php">Go to the Home Page :) </a></p>
</form>

	</div>
	</div>
