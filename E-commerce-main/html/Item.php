<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/item.css">
  </head>
<body >
<?php

    session_start();
    error_reporting(0);
    

    include("../php/connec.php");
    $id= $_GET['Product'];
$query="SELECT * FROM products where Prod_id='$id'";
$req=$conn->query($query);
$product= mysqli_fetch_assoc($req);

$query="SELECT * FROM images where Prod_id='$id'";
$req=$conn->query($query);


?>
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

   
      <div class="row g-0 text-center" style="margin-top: 2% ;">
        <div class="col-sm-6 col-md-8" style="width:50% ;"> 
            <div id="carousel" class="carousel slide" style="width: 100%">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?php echo $product['Img']?>" class="img-fluid" alt="...">
                  </div>
                  <?php
             while ($image= mysqli_fetch_assoc($req)):
             
             ?>
                  <div class="carousel-item">
                    <img src="<?php echo $image['Img_name']?>" class="img-fluid" alt="...">
                  </div>
                  <?php  endwhile ?>
              
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev" style="width: fit-content;">
                  <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
                 
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next" style="width: fit-content;">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
              </div>
        </div>
        <div class="description col-6 col-md-4" style="padding-left: 5%;">
          <div class="row">
            <h1><?php echo $product["Prod_name"];
                   ?></h1>
          </div>
          <div class="row" style="padding-bottom: 10px;">
          <?php echo $product["Description"];
                   ?>          </div>
        
        <div class="form-check form-check-inline" style="margin-right:5px">
        <form action="addToCart.php">
          <input type="hidden" name="Product"value="<?php echo $_GET['Product'];?>" >

          <?PHP if($product['Category']=="accessory") $type="hidden";else $type="radio"?>
        <input type="<?php echo $type ?>" name="option" value="1" checked>
        <label <?php echo $type ?>>8GB/128GB <?php echo $product['Prod_price'] ?>$</label>

           <input type="<?php echo $type ?>" name="option" value="2">
           <label <?php echo $type ?>> 12GB/256GB <?php echo $product['Prod_price']+100 ?>$ </label>

            <input type="<?php echo $type ?>"  name="option" value="3">
             <label  <?php echo $type ?>> 12GB/512GB <?php echo $product['Prod_price']+175 ?>$</label>
              </div>
          <div class="row">
            <div class="price-per-item__container">
                <input type="number" name="quantity" data-min="1" min="1" step="1" value="1" >
              </quantity-input></div></div>
              <div class="row">
                <button type="submit">
                  <span>Add to cart</span>
    </form>
      
      </div>
      </button>
          </div>
        </div>
            
            
        </div>
      </div>
        
          </div>
    </div>
       
        
