<?php

require_once "mysqlconnect.php";
session_start();
$email=$_SESSION['email_address'];
$sql5="select * from cart1 where email_address='$email'";
$result5= mysqli_query($db,$sql5);
for($row['id']=1;$row['id']<table.rows.length;$row['id']++){
    
$sql2="select * from cart1 where id='$id'";
$result2=mysqli_query($db,$sql2);
$oneresult2 = $result2->fetch_object();
$quantity_needed = $oneresult2->quantity_needed;
$_SESSION["quantity_needed"] = $quantity_needed;

$product_name = $oneresult2->product_name;
$_SESSION["product_name"] = $product_name;



$sql3="select * from products where product_name=$product_name";

$result4=mysqli_query($db,$sql3);
$oneresult4 = $result4->fetch_object();
$product_ID = $oneresult2->product_ID;
$_SESSION["product_ID"] = $product_ID;
// $quantity_needed=$_SESSION['quantity_needed'];
// $product_ID=$_SESSION['product_ID'];
$sql1="SELECT quantity from products where product_ID='$product_ID'";
$result1=mysqli_query($db,$sql1);
$oneresult3 = $result1->fetch_object();
$quantity = $oneresult3->quantity;
$_SESSION["quantity"] = $quantity;
$update="UPDATE products set quantity=quantity-$quantity_needed where product_ID='$product_ID';";
$result=mysqli_query($db,$update);
}


?>