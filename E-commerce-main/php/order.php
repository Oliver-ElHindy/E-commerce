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

        $ProfitQuery="SELECT * FROM cart , products where products.Prod_id=cart.Prod_id and User_id='$id'";
        $req=$conn->query($ProfitQuery);
        $cartTotal=0;

     while ($profit= mysqli_fetch_assoc($req)){
        $date=date('d/m/y H:i:s');
        $Totalprofit=$profit['ProfitPerUnit']*$profit['Quantity'];
        $prodid=$profit['Prod_id'];
        $quan=$profit['Quantity'];
        $name=$profit['Prod_name'];
        $insertProfit="Insert into profit (
Prod_ID	,
QTY_SOLD	,
ProfitPU	,
Date	,
Prod_name	) VALUES ('$prodid','$quan','$Totalprofit','$date','$name') ";
$req5=$conn->query($insertProfit);
        }


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
