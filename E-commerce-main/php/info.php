<?php
include("../php/connec.php") ;
$id=$_SESSION['id'];
$apa=$_GET['apa'];
$street=$_GET['street'];
$city=$_GET['city'];
$country=$_GET['country'];

$pName=$_GET['pName'];
$cvc=$_GET['cvc'];
$exp=$_GET['exp'];
$nbr=$_GET['nbr'];
$card=$_GET['card'];

$adressQuery="SELECT * FROM adress where User_id='$id'";
$req1=$conn->query($adressQuery);
$adress= mysqli_fetch_assoc($req1);

$paymentQuery="SELECT * FROM payment where User_id='$id'";
$req2=$conn->query($paymentQuery);
$payment= mysqli_fetch_assoc($req2);

if(mysqli_num_rows($req1)) {
    $adress="update adress set Country='$country' ,City='$city'	,Street='$street'	,User_id='$id' ,Apt_nbr='$apa' where User_id='$id' ";
    $conn->query($adress);
    header("Location:../html/myInfo.php");
    
} else{
   
    $adress="insert into adress (Country ,City	,Street	,User_id ,Apt_nbr) VALUES ('$country','$city','$street'
    ,'$id','$apa' ) ";
    $conn->query($adress);
    header("Location:../html/myInfo.php");
   
 }

if(mysqli_num_rows($req2)) {
    $payment="update payment set  Card_type='$card'	,Card_number='$nbr',	User_id='$id',	Card_CVV='$cvc',	Card_Expiration='$exp',	name='$pName' where User_id='$id' ";
    $conn->query($payment);
    header("Location:../html/myInfo.php");
} else{
    $payment="insert into payment   (Card_type	,Card_number,	User_id,	Card_CVV,	Card_Expiration,	name) VALUES ('$card','$nbr','$id'
    ,'$cvc','$exp' ,'$pName' ) ";
    $conn->query($payment);
    header("Location:../html/myInfo.php");
}