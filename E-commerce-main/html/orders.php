<!DOCTYPE html>
<?php
 include("../php/connec.php");
    session_start();
    error_reporting(0);
    
?>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/orders.css">

  </head>
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






  <div class="container">
    <div class="row">
        <div class="col-lg-4">
            <!-- First pair of cards -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- First Card -->
                    <div class="card l-bg-cherry">
                        <!-- Card Content -->
                        <div class="card-statistic-3 p-4">
                          <div class="mb-4">
                              <h5 class="card-title mb-0">Total Orders</h5>
                          </div>
                          <div class="row align-items-center mb-2 d-flex">
                              <div class="col-8">
                                  <h2 class="d-flex align-items-center mb-0">
                                      3,243
                                  </h2>
                              </div>
                           </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Second Card -->
                    <div class="card l-bg-blue-dark">
                        <!-- Card Content -->
                        <div class="card-statistic-3 p-4">
                          <div class="mb-4">
                              <h5 class="card-title mb-0">Total Customers</h5>
                          </div>
                          <div class="row align-items-center mb-2 d-flex">
                              <div class="col-8">
                                  <h2 class="d-flex align-items-center mb-0">
                                      1,937
                                  </h2>
                              </div>
                           </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Second pair of cards -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- Third Card -->
                    <div class="card l-bg-cherry">
                        <!-- Card Content -->
                        <div class="card-statistic-3 p-4">
                          <div class="mb-4">
                              <h5 class="card-title mb-0">Yearly Profit</h5>
                          </div>
                          <div class="row align-items-center mb-2 d-flex">
                              <div class="col-8">
                                  <h2 class="d-flex align-items-center mb-0">
                                      10273$
                                  </h2>
                              </div>
                           </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Fourth Card -->
                    <div class="card l-bg-blue-dark">
                        <!-- Card Content -->
                        <div class="card-statistic-3 p-4">
                          <div class="mb-4">
                              <h5 class="card-title mb-0">Profit Increase (yearly)</h5>
                          </div>
                          <div class="row align-items-center mb-2 d-flex">
                              <div class="col-8">
                                  <h2 class="d-flex align-items-center mb-0">
                                      7.42%
                                  </h2>
                              </div>
                           </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Third pair of cards -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- Fifth Card -->
                    <div class="card l-bg-cherry">
                        <!-- Card Content -->
                        <div class="card-statistic-3 p-4">
                          <div class="mb-4">
                              <h5 class="card-title mb-0">Most Purchased Product</h5>
                          </div>
                          <div class="row align-items-center mb-2 d-flex">
                              <div class="col-8">
                                  <h2 class="d-flex align-items-center mb-0">
                                      iphone 15 Pro
                                  </h2>
                              </div>
                           </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Sixth Card -->
                    <div class="card l-bg-blue-dark">
                        <!-- Card Content -->
                        <div class="card-statistic-3 p-4">
                          <div class="mb-4">
                              <h5 class="card-title mb-0">Least Purchased Product</h5>
                          </div>
                          <div class="row align-items-center mb-2 d-flex">
                              <div class="col-8">
                                  <h2 class="d-flex align-items-center mb-0">
                                      iphone XS
                                  </h2>
                              </div>
                           </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<h3>All orders:</h3>
  <div class="tableContainer">
  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Full name</th>
        <th scope="col">total</th>
        <th scope="col">Adress</th>
        <th scope="col">Date placed</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark Smith</td>
        <td>$63.91</td>
        <td>123 Main Street, apt 4B San Diego CA</td>
        <td>dec 18th 2023</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob Clark</td>
        <td>$21.83</td>
        <td>5396 North Reese Avenue, Fresno CA</td>
        <td>jan 17th 2024</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry Williams</td>
        <td>$271.34</td>
        <td>44 E. West Street Ashland, OH</td>
        <td>feb 2nd 2024</td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>