<?php
$currency = '&#8376; '; //Currency Character or code

$db_username = 'root';
$db_password = '';
$db_name = 'altai.auto';
$db_host = 'localhost';

$shipping_cost      = 1500.00; //shipping cost
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 8, 
                            'Service Tax' => 3
                            );						
//connect to MySql						
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>