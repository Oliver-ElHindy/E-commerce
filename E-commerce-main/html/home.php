<!DOCTYPE html>
<?php
include("../php/connec.php");
include("../php/navBar.php");
   
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
    


      