<?php
include("connec.php");

if(isset($_POST["ADDPRODUCTBTN"])){
  $ProdName = $_POST["prodName"];
  $ProdPrice = $_POST["prodPrice"];
  $Category = $_POST["prodCateg"];
  $Colors = $_POST["Colors"];
  $ProfitPerUnit = $_POST["prodPPU"];
  $ProdQTY = $_POST["prodQty"];
  $desc =$_POST["description"];
  $img= "../images/".$_POST["ProdImgPath"].".jpg";



    $sql = "INSERT INTO products (Prod_Name, Prod_Price, Category, Color, Prod_Quantity, ProfitPerUnit , Img, Description) VALUES 
    ('$ProdName', '$ProdPrice', '$Category', '$Colors', '$ProdQTY', '$ProfitPerUnit','$img','$desc')";

    try {
      if(mysqli_query($conn, $sql)) {
        $query= "SELECT Prod_id FROM products WHERE Prod_Name ='$ProdName'AND Prod_Price='$ProdPrice'AND Category='$Category'";
        $req=$conn->query($query);
        $id=$req->fetch_assoc();
        $id2=$id["Prod_id"];
        for($i=1;$i<4;$i++){
          if($_POST[$i]){
          $imgs="../images/".$_POST[$i].".jpg";
        $Img_query="Insert into images (Img_name,Prod_id) VALUES ('$imgs','$id2') ";
        mysqli_query($conn,  $Img_query); 
          }
      }
      
      header("Location: ../html/addProduct.php");
      } else {
        throw new Exception("Couldn't add product");
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

?>