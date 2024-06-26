<!DOCTYPE html>
<?php
 include("../php/connec.php");
 error_reporting(0);
    session_start();
    include("../php/navBar.php");
   
    
?>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/orders.css">

  </head>
<body>








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