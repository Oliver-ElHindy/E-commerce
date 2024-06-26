<!DOCTYPE html>
<?php
include("../php/connec.php");
   
    $id = $_SESSION['id'];
    error_reporting(0);
    include("../php/navBar.php");
 
    $query="SELECT * FROM cart , products where products.Prod_id=cart.Prod_id and User_id='$id'";
    $req=$conn->query($query);
    $cartTotal=0;

    $adressQuery="SELECT * FROM adress where User_id='$id'";
    $req1=$conn->query($adressQuery);
    $adress= mysqli_fetch_assoc($req1);

    $paymentQuery="SELECT * FROM payment where User_id='$id'";
    $req2=$conn->query($paymentQuery);
    $payement= mysqli_fetch_assoc($req2);

?>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/cart.css">

  </head>
<body>








  <section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">
  
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
          </div>
  


          <?php while ($product= mysqli_fetch_assoc($req)): ?>
          <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
          

              <div class="row d-flex justify-content-between align-items-center">
                 <div class="col-md-2 col-lg-2 col-xl-2">
                  <img src="<?php echo $product['Img']?>" class="img-fluid rounded-3">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="lead fw-normal mb-2"><?php echo $product['Prod_name']?></p>
                  <p><span <?php if($product['Category']=="accessory") echo "hidden" ?> class="text-muted">Specification: </span><?php if($product['Category']!="accessory") echo $product['Option_name']?></p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <p><span class="text-muted">Quantity: </span><?php echo $product['Quantity']?></p>                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">Price: <?php echo $product['Total_price']?>$</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                  <form action="unCart.php">
                    <input type="hidden" name="id"value="<?php echo $product['Cart_id']?>">
                 <button style="
background: transparent;
border: none ;
font-size:0;
width: 37px
" type="submit"><svg  xmlns="http://www.w3.org/2000/svg" class="TrashIcon" viewBox="0 0 448 512"><path fill="#e01010" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>

                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php 
          $cartTotal+=$product['Total_price'];
          endwhile ?>
  

         
          <hr class="my-4">

          <div class="d-flex justify-content-between">
            <p class="mb-2">Subtotal</p>
            <p class="mb-2">$<?php echo $cartTotal?></p>
          </div>

          <div class="d-flex justify-content-between">
            <p class="mb-2">Shipping</p>
            <p class="mb-2">$20</p>
          </div>

          <div class="d-flex justify-content-between mb-4">
            <p class="mb-2">Total</p>
            <p class="mb-2">$<?php echo $cartTotal+20?></p>
          
          </div>
          <form action="../php/order.php" action="get">
          <input type="hidden" name="totalPrice" value="<?php echo $cartTotal+20?>" >
          <button type="submit" <?php if($cartTotal=="0") echo "disabled"?> data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-block btn-lg">
            Checkout
          </button>
          </form>
          <!-- <script>
            submit=function(){
              document.getElementById("").submit();
              document.getElementById("").submit();            
            } -->
          </script>
        </div>              
      </div>
    </div>
  </section>
</body>
</html>