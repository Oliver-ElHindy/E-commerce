<?php
include("connec.php");
$id = $_GET['id'];
$sql="delete from orders where Order_ID='$id'";
if(mysqli_query($conn,$sql)){
  header("Location: ../html/orders.php");
}else{
  echo "couldn't delete row";
}
?>