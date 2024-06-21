<?php
include("connec.php");
$id=$_GET['prodId'];
$query="DELETE FROM images where Prod_id = $id";
$req=$conn->query($query);
$query="DELETE FROM products where Prod_id = $id";
$req=$conn->query($query);
header("Location:../html/addProduct.php");