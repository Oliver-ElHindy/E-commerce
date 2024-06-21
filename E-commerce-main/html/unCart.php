<?php
include("../php/connec.php");
$cid= $_GET["id"];

$query="DELETE FROM cart where Cart_id=$cid ";
$req=$conn->query($query);
header("Location: Cart.php");