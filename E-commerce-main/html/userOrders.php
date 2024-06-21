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
    session_start();
     error_reporting(0);


?>
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

<h2>Your orders:</h2>

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Order number</th>
        <th scope="col">Total</th>
        <th scope="col">Date placed</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>$371</td>
        <td>sept 17th 2023</td>
        <td>
          <div class="popup" onclick="myFunction()"><button><svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> view status</button>
            <span class="popuptext" id="myPopup"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105767.87997379372!2d35.528476518967!3d34.06320122708955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f438916e87fb1%3A0xd8c9dcaad7abef00!2sLe%20CNAM!5e0!3m2!1sen!2slb!4v1716375436251!5m2!1sen!2slb" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   
            </span>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>$18</td>
        <td>jan 2nd 2024</td>
        <td>
          <div class="popup" onclick="myFunction()"><button><svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> view status</button>
            <span class="popuptext" id="myPopup"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105767.87997379372!2d35.528476518967!3d34.06320122708955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f438916e87fb1%3A0xd8c9dcaad7abef00!2sLe%20CNAM!5e0!3m2!1sen!2slb!4v1716375436251!5m2!1sen!2slb" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   
            </span>
          </div>
        </td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>$726</td>
        <td>may 15th 2024</td>
        <td>
          <div class="popup" onclick="myFunction()"><button><svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> view status</button>
            <span class="popuptext" id="myPopup"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105767.87997379372!2d35.528476518967!3d34.06320122708955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f438916e87fb1%3A0xd8c9dcaad7abef00!2sLe%20CNAM!5e0!3m2!1sen!2slb!4v1716375436251!5m2!1sen!2slb" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   
            </span>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <script>
    // When the user clicks on <div>, open the popup
    function myFunction() {
      var popup = document.getElementById("myPopup");
      popup.classList.toggle("show");
    }
    </script>
</body>
</html>