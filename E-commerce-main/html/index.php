<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/index.css">

  </head>
<body>
  
  <?php
include("../php/connec.php");
$query="SELECT * FROM products;";
include("../php/navBar.php");
$req=$conn->query($query);
error_reporting(0);
if($_GET['like']){
  $query="SELECT * FROM products where Prod_name or Category LIKE '%". $_GET['like']."%'";
$req=$conn->query($query);
}
else if($_GET['Products']){
$query="SELECT * FROM products where Category='".$_GET['Products']."'";
$req=$conn->query($query);
}
?>





      <div style="width:100%;height: 10%; border-color:black;border:solid;">
     
      </div>
      <div style="width:100%;height: 40px;">
     
      </div>

      <div class="container" style="justify-content: center;">
        <!-- <header class="d-flex justify-content-center py-3" style="width: auto;">
          <table style="width: auto;"><tr>
            <td >
            <ul class="nav nav-pills" style="width: auto;">
           
             <li class="nav" style="width: auto;"><a href="#" class="nav-link">Laptops</a></li> </td>
            <td> <li class="nav" style="width: auto;"><a href="#" class="nav-link">Pcs</a></li>  </td>
          <td> <li class="nav" style="width: auto;"><a href="#" class="nav-link">Phones</a></li></td>
        <td>  <li class="nav" style="width: auto;"><a href="#" class="nav-link">Accessories</a></li></td>
            </ul>
            </tr></table>
          </header> -->

          <div class="container-fluid pb-3">
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
              
    </div>
</body>
</html>