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
    include("../php/navBar.php");
    $id= $_GET['Product'];
$query="SELECT * FROM products where Prod_id='$id'";
$req=$conn->query($query);
$product= mysqli_fetch_assoc($req);

$query="SELECT * FROM images where Prod_id='$id'";
$req=$conn->query($query);


?>


   
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
       

        <label <?php if($product['Prod_Quantity']=="0"){ ?>style="color: red">  <?php echo "OUT OF STOCK";?> </label> <?php echo "<br>";} ?>
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
                <button type="submit" <?php if($product['Prod_Quantity']=="0")echo "disabled"?>>
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
       
        
