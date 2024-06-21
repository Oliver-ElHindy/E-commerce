<?php
include("connec.php");

if(isset($_POST["ADDPRODUCTBTN"])){
  $ProdName = $_POST["prodName"];
  $ProdPrice = $_POST["prodPrice"];
  $Category = $_POST["prodCateg"];
  $id= $_POST["prodId"];
  $ProfitPerUnit = $_POST["prodPPU"];
  $ProdQTY = $_POST["prodQty"];
  $desc =$_POST["description"];
  $img= "../images/".$_POST["ProdImgPath"].".jpg";
  $i=2;

  $sql = "UPDATE products SET Prod_Name ='$ProdName', Prod_Price='$ProdPrice', Category='$Category' , Prod_Quantity='$ProdQTY', ProfitPerUnit='$ProfitPerUnit' , Img='$img', Description='$desc' where Prod_id=$id ";

  try {
    if(mysqli_query($conn, $sql)) {
        $query= "SELECT * FROM images WHERE Prod_id='$id'";
        $req=$conn->query($query);
        if(mysqli_num_rows($req)){
       while($image=mysqli_fetch_assoc($req)){
            $imgs="../images/".$_POST[$i++].".jpg";
            $Img_query="UPDATE images SET Img_name ='$imgs' where Img_id='".$image['Img_id']."'";
             mysqli_query($conn,  $Img_query); 
            
            } }
        else{
            for($i;$i<5;$i++){
            $imgs="../images/".$_POST[$i].".jpg";
            $Img_query="Insert into images (Img_name,Prod_id) VALUES ('$imgs','$id') ";
            mysqli_query($conn,  $Img_query); 
            }
        }
    }
    
    header("Location: ../html/addProduct.php");
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

?>