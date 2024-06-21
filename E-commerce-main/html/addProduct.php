<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/signincss.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
      .form-cont{
        margin-top: 14vh;
      }
    </style>
</head>
 <?php 
 session_start(); 
 error_reporting(0);

include("../php/connec.php");
$query="SELECT * FROM products;";
$req=$conn->query($query);
if($_GET['like']){
  $query="SELECT * FROM products where Prod_name LIKE '%". $_GET['like']."%'";
$req=$conn->query($query);
}
else if($_GET['Products']){
$query="SELECT * FROM products where Category='".$_GET['Products']."'";
$req=$conn->query($query);
}
?>
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
          <form class="d-flex" role="search" action="addProduct.php">
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


<!--Login form starts-->
<section class="container-fluid form-cont">
  <!--row justify-content-center is used for centering the login form-->
    <section class="row justify-content-center">
    <!--Making the form responsive-->
      <section class="col-12 col-sm-6 col-md-4">
        <form class="form-container" method="post" action="../php/AddProduct.php">
        <!--Binding the label and input together-->
        <div class="form-group">
          <h4 class="text-center font-weight-bold"> Add Product </h4>
          <label for="Inputuser1">Name</label>
           <input type="text" class="form-control" name="prodName" id="Inputuser1" aria-describeby="usernameHelp" placeholder="Enter Product name">
        </div>
        <!--Binding the label and input together-->
        <div class="form-group">
          <label for="InputPassword1">Price</label>
          <input type="number" class="form-control" id="InputPassword1" name="prodPrice" placeholder="Price">
        </div>
        <div class="form-group">
          <label for="InputPassword1">Quantity</label>
          <input type="number" class="form-control" id="InputPassword1" name="prodQty" placeholder="Quantity">
        </div>
        <div class="form-group">
          <label for="InputPassword1">Profit per unit</label>
          <input type="number" class="form-control" id="InputPassword1" name="prodPPU" placeholder="Profit">
        </div>
        <div class="form-group">
          <label for="InputPassword1">Description</label>
          <input type="text" class="form-control" id="InputPassword1" name="description" placeholder="Description">
        </div>
        <div class="form-group">
          <label>Category</label>
          <select class="form-select" name="prodCateg" aria-label="Default select example">
            <option disabled selected>Select Category</option>
            <option value="phone">Phones</option>
            <option value="laptop">Laptops</option>
            <option value="pc">PCs</option>
            <option value="accessory">Accessories</option>
          </select>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" value="Black" name="Colors">
          <label class="form-check-label" for="inlineRadio1">Black</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" value="White" name="Colors">
          <label class="form-check-label" for="inlineRadio2">White</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" value="Grey" name="Colors">
          <label class="form-check-label" for="inlineRadio3">Grey</label>
        </div>
       
          <label for="InputPassword1">Product image</label>
          <input type="text" class="form-control" name="ProdImgPath" placeholder="Path">
          <label for="InputPassword1">Image 2</label>
          <input type="text" class="form-control" name="1"  placeholder="Path">
          <label for="InputPassword1">Image 3</label>
          <input type="text" class="form-control" name="2"  placeholder="Path">
          <label for="InputPassword1">Image 4</label>
          <input type="text" class="form-control" name="3"  placeholder="Path">
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="ADDPRODUCTBTN">Add Product</button>
      
        </form>
      </section>
      <section class="col-12 col-sm-6 col-md-4">
        <form class="form-container" method="post" action="../php/EditProduct.php">
        <!--Binding the label and input together-->
        <div class="form-group">
          <h4 class="text-center font-weight-bold"> Edit Product </h4>

          <form method="post" action="../php/EditProduct.php">
          <label for="cars">Choose a product:</label>
         
            
<select name="prod" id="prod" style="width:60%; margin-bottom:1%">
<option disabled selected>Select Product</option>
<?php

while ($product= mysqli_fetch_assoc($req)):

  ?>
  <option <?php if($product['Prod_id']==$_GET['id']) echo 'selected'?> value="<?php echo $product['Prod_id']?>"><?php echo $product['Prod_name']?></option> 
  <?php endwhile ?>
</select>
<script>
document.getElementById('prod').addEventListener('change', function() {
    var product = this.value;
    window.location.href =  "addProduct.php?id="+product+"";
   
}); </script>
<?php 
$query="SELECT * FROM products where Prod_id='".$_GET['id']."'";
$req=$conn->query($query);
$productDisp= mysqli_fetch_assoc($req);

?>
        <div>
          <input type="hidden" name="prodId" value="<?php echo $_GET['id']?>">
          <label for="Inputuser1">Name</label>
           <input type="text" value="<?php echo $productDisp['Prod_name']?>" class="form-control" name="prodName" id="Inputuser1" aria-describeby="usernameHelp" placeholder="Enter Product name">
        </div>
        <!--Binding the label and input together-->
        <div class="form-group">
          <label for="InputPassword1">Price</label>
          <input type="number"value="<?php echo $productDisp['Prod_price']?>" class="form-control" id="InputPassword1" name="prodPrice" placeholder="Price">
        </div>
        <div class="form-group">
          <label for="InputPassword1">Quantity</label>
          <input type="number" value="<?php echo $productDisp['Prod_Quantity']?>" class="form-control" id="InputPassword1" name="prodQty" placeholder="Quantity">
        </div>
        <div class="form-group">
          <label for="InputPassword1">Profit per unit</label>
          <input type="number" value="<?php echo $productDisp['ProfitPerUnit']?>"class="form-control" id="InputPassword1" name="prodPPU" placeholder="Profit">
        </div>
        <div class="form-group">
          <label for="InputPassword1">Description</label>
          <input type="text" class="form-control" value="<?php echo $productDisp['Description']?>" id="InputPassword1" name="description" placeholder="Description">
        </div>
        <div class="form-group">
          <label>Category</label>
          <select class="form-select" name="prodCateg" aria-label="Default select example">
            <option disabled>Select Category</option>
            <option value="phone" <?php if($productDisp['Category']="phone") echo "active"?>>Phones</option>
            <option value="laptop" <?php if($productDisp['Category']=="laptop") echo "active"?>>Laptops</option>
            <option value="pc" <?php if($productDisp['Category']=="pc") echo "active"?>>PCs</option>
            <option value="accessory" <?php if($productDisp['Category']=="accessory") echo "active"?>>Accessories</option>
          </select>
        </div>
      
     <?php 
$imgQuery="SELECT Img_name from images where Prod_id='".$_GET['id']."'";
$imgreq=$conn->query($imgQuery);
 ?>
          <label for="InputPassword1">Product image</label>
          <input type="text" class="form-control" name="ProdImgPath" <?php if($_GET['id']){
           $imgname1=substr($productDisp['Img'],0,-4);  $imgname=substr($imgname1,10);
           echo "value=".$imgname."" ;}?>   placeholder="Path">
       <?php $i=1;
      if(mysqli_num_rows($imgreq)){ 
       while($prodImg= mysqli_fetch_assoc($imgreq)):?>
          <label for="InputPassword1">Image <?php echo $i; $i++;?></label>
          <input type="text" value="<?php $imgname1=substr($prodImg['Img_name'],0,-4);  $imgname=substr($imgname1,10); echo $imgname ;?>" class="form-control" name="<?php echo $i?>"  placeholder="Path">
           <?php  endwhile ;}
       else{ while($i<4): ?>
           <label for="InputPassword1">Image <?php echo $i; $i++?></label>
           <input type="text" value="" class="form-control" name="<?php echo $i?>"  placeholder="Path">
           <?php endwhile;}?>
</div>
        <button type="submit" class="btn btn-primary btn-block" name="ADDPRODUCTBTN">Edit Product</button>
        <form></form>
        </form>
      </section>
    </section>
  </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>