<!DOCTYPE html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/cart.css">

  </head>
  <?php include("../php/navBar.php")  ;
  include("../php/connec.php") ;
  $id = $_SESSION['id']; 
   $adressQuery="SELECT * FROM adress where User_id='$id'";
    $req1=$conn->query($adressQuery);
    $adress= mysqli_fetch_assoc($req1);

    $paymentQuery="SELECT * FROM payment where User_id='$id'";
    $req2=$conn->query($paymentQuery);
    $payement= mysqli_fetch_assoc($req2);
    ?>
<body>
<div class="container" style="margin-top:1%">
            <div class="row">
              <div class="col-lg-6">
              <form action="../php/info.php" method="get">
                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Adress</h5>
                    </div>
          
                  
                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <label class="form-label"  for="typeName">Country</label>
                        <input type="text" name="country" id="typeName" class="form-control form-control-lg" value="<?php echo $adress['Country']?>" placeholder="Country" required>  
                      </div>

                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <label class="form-label" for="typeName">City</label>
                        <input type="text" name="city" value="<?php echo $adress['City']?>" id="typeName" class="form-control form-control-lg" placeholder="City" required>  
                      </div>
          
                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <label class="form-label" for="typeText">Street</label>
                        <input type="text"  name="street" value="<?php echo $adress['Street']?>" id="typeText" class="form-control form-control-lg" placeholder="Street" required>
                      </div>
          
                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <label class="form-label" for="typeText">Apartement number</label>
                        <input type="text" id="typeText" name="apa" value="<?php echo $adress['Apt_nbr']?>"class="form-control form-control-lg" placeholder="Apartement number" required>
                      </div>
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
          <select class="form-select" name="card" aria-label="Default select example" required>
            <option disabled selected>Select Card Type</option>
            <option value="MC" <?php if($payement['Card_type']=="MC"){ echo "selected";}?>>MasterCard</option>
            <option value="Visa" <?php if($payement['Card_type']=="Visa") {echo "selected";}?>>Visa</option>
            <option value="AE" <?php if($payement['Card_type']=="AE") {echo "selected";}?>>American Express</option>
          </select>

        
            <div data-mdb-input-init class="form-outline form-white mb-4">
              <label class="form-label" for="typeName">Cardholder's Name</label>
              <input type="text" id="typeName" name="pName" value="<?php echo $payement['name']?>" class="form-control form-control-lg" placeholder="Cardholder's Name" />  
            </div>

            <div data-mdb-input-init class="form-outline form-white mb-4">
              <label class="form-label" for="typeText">Card Number</label>
              <input type="text" name="nbr" id="typeText" value="<?php echo $payement['Card_number']?>" class="form-control form-control-lg" placeholder="1234 5678 9012 3457" minlength="16" maxlength="16" />
            </div>

            <div class="row mb-4">
              <div class="col-md-6">
                <div data-mdb-input-init class="form-outline form-white">
                  <label class="form-label" for="typeExp">Expiration</label>
                  <input type="text" name="exp"id="typeExp"value="<?php echo $payement['Card_Expiration']?>" class="form-control form-control-lg" placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />           
                </div>
              </div>

              <div class="col-md-6">
                <div data-mdb-input-init class="form-outline form-white">
                  <label class="form-label" for="typeText">Cvv</label>
                  <input type="password" name="cvc" id="typeText" value="<?php echo $payement['Card_CVV']?>" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                </div>
                <br>
              </div>
              <button type="submit" style="width:30%" action="../php/info.php" data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-block btn-lg">
            Confirm
          </button>
            </div>
            </body>
        
