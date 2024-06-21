<!DOCTYPE html>
<?php
include("../php/connec.php");
   
$query="SELECT * FROM products ORDER BY ProfitPerUnit DESC LIMIT 4;";
$req=$conn->query($query);

error_reporting(0);
?>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/home.css">

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








      <div class="row g-0 text-center" >
        <div class="col-sm-6 col-md-8" style="position: relative;text-align:center; align-items: center; justify-content: center; width: 100%;"> 
          <table style=" position: absolute; align-self: center;top: 30%;right: 30%; z-index: 1;">
            <tr><td><span style="font-size: xx-large;"><b>Discover Our Innovative Products</b></span></td></tr>
            <tr><td><span style="font-size: x-large; "><b>Elevate Your Tech Lifestyle Today </b></span></td></tr>
            <tr><td> <button type="button"  value="Shop Now" 
              onclick="location.href = '../html/index.php';"
               style="background-color:white; color: black; border-color: black; opacity: 80%;">
              Shop Now</button></td></tr>
          </table>    
          <img class="img-fluid" src="../images/laptop-blue-background-copy-spacee.jpg" style="opacity: 70%;z-index:-1;">
          
          </div>
        </div> 
        
        <div class="container-fluid pb-3">
        <h1 > Featured Products:</h1>
            <div class="d-grid gap-3" style="grid-template-columns: repeat(auto-fit, minmax(250px, auto));">
             <?php
             while ($product= mysqli_fetch_assoc($req)):
             
             ?> <div class="bg-body-tertiary border rounded-3" style="display: inline; padding:10px">
                <figure class="figure">
                   <?php $Prod_id = urlencode($product['Prod_id']);
                  $price = $product['Prod_price'];
                   $url= "item.php?Product=".$Prod_id;
                 
                           ?>
                  <a href="<?php echo"$url" ?>" >
                  <div class="row">
                    <div class="col">
                  <img src="<?php echo $product['Img'] ?>" class="figure-img img-fluid rounded" width="240px">
                 <!-- <figcaption class="figure-name" style="width: 100%;">Samsung galaxy <br> $1299</figcaption> -->
                 <figcaption class="figure-caption"><?php echo $product['Prod_name'] ?> <br>$<?php echo $product['Prod_price'] ?> </figcaption> 
                     </div> 
                </a>
              </figure>
              </div> <?php  endwhile;?>
    


      