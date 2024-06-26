<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/userOrders.css">
</head>
<body>
<?php
include("../php/connec.php");
error_reporting(0);   
session_start();

include("../php/navBar.php");
   $user_id=$_SESSION["id"];
$sql="Select * from orders where user_id='$user_id'";
$result=mysqli_query($conn,$sql);
?>


<h2>Your orders:</h2>

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Order number</th>
        <th scope="col">Total</th>
        <th scope="col">Date placed</th>
        <th scope="col">Adress</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $i=0;
          while($row= mysqli_fetch_assoc($result)){
          
            ?>
            <tr>
              <td><?php echo $row["Order_ID"] ;?></td>
              <td><?php echo $row["price"] ;?></td>
              <td><?php echo $row["Date"] ;?></td>
              <td><?php 
              $adress_ID=$row["Adress_ID"];
              $sql="select * from adress where Adress_id='$adress_ID'";
              $res=mysqli_query($conn,$sql);
              $Adressrow=mysqli_fetch_assoc($res);
              echo $Adressrow["Country"].' , '.$Adressrow["City"].' , '.$Adressrow["Street"].' , '.$Adressrow["Apt_nbr"];
              
              ?></td>
              <td>
              <div class="popup" id="<?php echo 'myPopup'.$i;?>" onclick="myFunction(<?php echo 'myPopup'.$i;?>)"><button><svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> view status</button>
            <span class="popuptext" id="<?php echo 'myPopup'.$i;?>"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105767.87997379372!2d35.528476518967!3d34.06320122708955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f438916e87fb1%3A0xd8c9dcaad7abef00!2sLe%20CNAM!5e0!3m2!1sen!2slb!4v1716375436251!5m2!1sen!2slb" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   
            </span>
          </div>
              </td>
             <?php
          }
          $i++;
          ?>
        
      
    </tbody>
  </table>
  <script>
    // When the user clicks on <div>, open the popup
    function myFunction(x) {
      var popup = document.getElementById("myPopup"+x);
      popup.classList.toggle("show");
    }
    </script>
</body>
</html>