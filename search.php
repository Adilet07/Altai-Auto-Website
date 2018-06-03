<?php
if (isset($_POST['title']))
{
  $connect=mysql_connect("localhost","root","");
  mysql_select_db("altai.auto",$connect);
  mysql_query("SET NAMES cp1251");
  $title= iconv("UTF-8","cp1251",$_POST['title']);
  $query = mysql_query("SELECT * FROM products WHERE product_name LIKE '%$title%'");
  if (mysql_num_rows($query) >0)
  {
  echo "<ul>";
  while($rows=mysql_fetch_assoc($query))
  {
    echo "<li><a href='product.php'>".$rows['product_name']."</a></li>";
  }
    echo "</ul>";
  }
}
 ?>
