<!DOCTYPE html>
<html>
  
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/signincss.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php error_reporting(0);
include("../php/navBar.php");?>



<!--Login form starts-->
<section class="container-fluid form-cont">
  <!--row justify-content-center is used for centering the login form-->
    <section class="row justify-content-center">
    <!--Making the form responsive-->
      <section class="col-12 col-sm-6 col-md-4">
        <form class="form-container" action="../php/signed-in.php" method="post">
          <input type="hidden" name="prod" value="<?php if(!$_GET['product']){}else{echo $_GET['product'];}?>">
        <!--Binding the label and input together-->
        <div class="form-group">
          <h4 class="text-center font-weight-bold"> Login </h4>
          <label for="Inputuser1">Username</label>
           <input type="text" class="form-control in1" id="Inputuser1" aria-describeby="usernameHelp" placeholder="Enter username" name="Uname" required>
        </div>
        <!--Binding the label and input together-->
        <div class="form-group">
          <label for="InputPassword1">Password</label>
          <input type="password" class="form-control in1" id="InputPassword1" placeholder="Password" name="password" required>
        </div>
        <button type="Sign in" class="btn btn-primary btn-block" name="signinbtn">Login</button>
        <div class="form-footer">
          <p> Don't have an account? <a href="/html/Sign-up.html">Sign Up</a></p>
        </div>
        </form>
      </section>
    </section>
  </section>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
