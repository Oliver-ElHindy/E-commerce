
<?php
    session_start();
    include("../php/connec.php");



$product = $_GET['Product'];
if ($_SESSION['id']) {
    
    $product = $_GET['Product'];
    $option = $_GET['option'];
    $quantity = $_GET['quantity'];
    $id = $_SESSION['id'];

    $query="SELECT Prod_price FROM products where Prod_id='$product'";
$req=$conn->query($query);
$prodPrice=$req->fetch_assoc();
$a= $prodPrice['Prod_price'];

$query="SELECT Option_price , Option_name FROM options where Option_id=' $option'";
$req=$conn->query($query);
$optionPrice=$req->fetch_assoc();
$b=$optionPrice['Option_price'];
$totalPrice=($a+$b)*$quantity;
$Oname=$optionPrice['Option_name'];
    
    $query="INSERT INTO cart SET Cart_id = 'NULL', Quantity = '$quantity', User_id='$id',Prod_id=' $product',Total_price='$totalPrice',Option_name='$Oname'";
    
    $req=$conn->query($query);
    header('Location: Index.php?');  
}

else{
    header('Location: Sign-in.php?product='.$product);
}

