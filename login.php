<?php
session_start();
?>

<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<?php

if(isset($_SESSION["session_username"])){
// echo "Session is set"; // for testing purposes
header("Location: index.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['Username']) && !empty($_POST['Pass'])) {
    $Username=$_POST['Username'];
    $Pass=md5($_POST['Pass']);

    $query =mysql_query("SELECT * FROM customers WHERE Username='".$Username."' AND Pass='".$Pass."'");

    $numrows=mysql_num_rows($query);
    if($numrows!=0)

    {
    while($row=mysql_fetch_assoc($query))
    {
    $dbusername=$row['Username'];
    $dbpassword=$row['Pass'];
    }

    if($Username == $dbusername && $Pass == $dbpassword)

    {


    $_SESSION['session_username']=$Username;

    /* Redirect browser */
    header("Location: index.php");
    }
    } else {

 $message =  "Invalid username or password!";
    }

} else {
    $message = "All fields are required!";
}
}
?>

    <div class="container mlogin">
            <div id="login">
    <h1>LOGIN</h1>
<form name="loginform" id="loginform" action="" method="POST">
    <p>
        <label for="user_login">Username<br />
        <input type="text" name="Username" id="Username" class="input" value="" size="30" /></label>
    </p>
    <p>
        <label for="user_pass">Password<br />
        <input type="password" name="Pass" id="Pass" class="input" value="" size="255" /></label>
    </p>
        <p class="submit">
        <input type="submit" name="login" class="button" value="Log In" />
    </p>
        <p class="regtext">No account yet? <a href="register.php" >Register Here!</a> <br> <a href="index.php">Go to the Home Page :) </a> </p>
</form>

    </div>

    </div>



	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
