<!DOCTYPE html>
<?php
include("../php/connec.php");
   
    $id = $_SESSION['id'];
    error_reporting(0);
 
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

<nav class="navbar navbar-expand-lg bg-body-tertiary" style="width: 100%;">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html"><img src="../images/logo.png" style="padding-left:7%; width:55px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-link">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-link">
                <a class="nav-link" href="../html/AboutUs.php">About Us</a>
              </li>
          
                <li class="nav-link dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Category
                  </a>
                  <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="index.php">All</a></li>
                    <li><a class="dropdown-item" href="index.php?Products=phone">Phones</a></li>
                    <li><a class="dropdown-item" href="index.php?Products=laptop">Laptops</a></li>
                    <li><a class="dropdown-item" href="index.php?Products=pc">Pc</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="index.php?Products=accessory">Accessories</a></li>
                  </ul>
                </li>
              <li class="nav-link">
                <a class="nav-link" <?php if ($_SESSION['role']!=1) echo 'hidden="hidden"'?> href="../html/addProduct.php">Add product</a>
              </li>
         
            <li class="nav-link">
              <a class="nav-link" <?php if ($_SESSION['role']!=1) echo 'hidden="hidden"' ?> href="../html/orders.php">Orders</a>
            </li>
          </ul>
          <form class="d-flex" role="search" action="index.php">
            <input class="form-control me-2" name="like" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          
            <a href="Sign-in.html"><i class="bi bi-person-fill" style="margin-left: 10px;">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                  </svg>
                  
                </a>
                <ul class="dropdown-menu dropdown-menu-right" style="left: auto; right: 0;">
                  <li><a class="dropdown-item" href="../html/Cart.php">My Cart</a></li>
                  <li><a class="dropdown-item" href="../html/userOrders.php">My Orders</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a <?php if ($_SESSION['id']) echo 'hidden="hidden"'?>class="dropdown-item" href="../html/Sign-in.php">Sign-in</a></li>
                
                  <li><a <?php if ($_SESSION['id']) echo 'hidden="hidden"'?>class="dropdown-item" href="../html/Sign-up.php">Sign-Up</a></li>
                  <?php if ($_SESSION['id']) echo ' <li><a class="dropdown-item" href="../html/sign-out.php">Sign Out</a></li>' ?>
                </ul>
              </li></i>
            </a>

            </div>
        </div>
      </nav>






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
  
   
         
  
          <div class="container">
            <div class="row">
              
          
              <div class="col-lg-6">
                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Adress</h5>
                    </div>
          
                    <form class="mt-4">
                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <label class="form-label"  for="typeName">Country</label>
                        <input type="text" id="typeName" class="form-control form-control-lg" value="<?php echo $adress['Country']?>" placeholder="Country" />  
                      </div>

                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <label class="form-label" for="typeName">City</label>
                        <input type="text" value="<?php echo $adress['City']?>" id="typeName" class="form-control form-control-lg" placeholder="City" />  
                      </div>
          
                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <label class="form-label" for="typeText">Street</label>
                        <input type="text" value="<?php echo $adress['Street']?>" id="typeText" class="form-control form-control-lg" placeholder="Street"/>
                      </div>
          
                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <label class="form-label" for="typeText">Apartement number</label>
                        <input type="text" id="typeText" value="<?php echo $adress['Apt_nbr']?>"class="form-control form-control-lg" placeholder="Apartement number"/>
                      </div>
                    
                    </form>

        </div>
        
      </div>
      
    </div>
    <div class="col-lg-6">
      <div class="card bg-primary text-white rounded-3">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Card details</h5>
          </div>

          <p class="small mb-2">Card type</p>
          <select class="form-select" aria-label="Default select example" required>
            <option disabled selected>Select Card Type</option>
            <option value="MC" <?php if($payement['Card_type']="MC") echo "active"?>>MasterCard</option>
            <option value="Visa" <?php if($payement['Card_type']="Visa") echo "active"?>>Visa</option>
            <option value="AE" <?php if($payement['Card_type']="AE") echo "active"?>>American Express</option>
          </select>

          <form class="mt-4">
            <div data-mdb-input-init class="form-outline form-white mb-4">
              <label class="form-label" for="typeName">Cardholder's Name</label>
              <input type="text" id="typeName" value="<?php echo $payement['']?>" class="form-control form-control-lg" placeholder="Cardholder's Name" />  
            </div>

            <div data-mdb-input-init class="form-outline form-white mb-4">
              <label class="form-label" for="typeText">Card Number</label>
              <input type="text" id="typeText" value="<?php echo $payement['Card_number']?>" class="form-control form-control-lg" placeholder="1234 5678 9012 3457" minlength="16" maxlength="16" />
            </div>

            <div class="row mb-4">
              <div class="col-md-6">
                <div data-mdb-input-init class="form-outline form-white">
                  <label class="form-label" for="typeExp">Expiration</label>
                  <input type="text" id="typeExp"value="<?php echo $payement['Card_Expiration']?>" class="form-control form-control-lg" placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />           
                </div>
              </div>

              <div class="col-md-6">
                <div data-mdb-input-init class="form-outline form-white">
                  <label class="form-label" for="typeText">Cvv</label>
                  <input type="password" id="typeText" value="<?php echo $payement['Card_CVV']?>" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                </div>
              </div>
            </div>
          </form>

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

          <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-block btn-lg">
            Checkout
          </button>
        </div>              
      </div>
    </div>
  </section>
</body>
</html>