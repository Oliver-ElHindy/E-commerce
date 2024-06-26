<?php
include("connec.php");
$price=$_GET['totalPrice'];
$date=date('d/m/y H:i');
$id=$_SESSION['id'];
    $paymentQuery="SELECT * FROM payment where User_id='$id'";
    $req2=$conn->query($paymentQuery);

    $adressQuery="SELECT * FROM adress where User_id='$id'";
    $req1=$conn->query($adressQuery);
    $adress= mysqli_fetch_assoc($req1);
    $payment= mysqli_fetch_assoc($req2);
$payId=$payment['Payment_id'];
$adId=$adress['Adress_id'];
    if(!mysqli_num_rows($req1)||!mysqli_num_rows($req2)) {
       header("Location:../html/myInfo.php");
    } 
    else{
        $orderQuery="Insert into orders (
Date,
Adress_ID,
payment_ID,
price,
user_id
) VALUES ('$date','$adId','$payId','$price','$id') ";
        $req=$conn->query($orderQuery);

        $cartQuery="delete from cart where user_Id='$id'";
        $req=$conn->query($cartQuery);
        header("Location:../html/userOrders.php");
   
    }
