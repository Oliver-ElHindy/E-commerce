<?php
include("connec.php");

if(isset($_POST["Loginbtn"])){
  // Start session
  session_start();


  // Get user input
  $firstname = mysqli_real_escape_string($conn, $_POST["Fname"]);
  $lastname = mysqli_real_escape_string($conn, $_POST["Lname"]);
  $username = mysqli_real_escape_string($conn, $_POST["Uname"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  $phoneNumber = mysqli_real_escape_string($conn, $_POST["phoneNum"]);
  
  // Check if any field is empty
  if(empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($phoneNumber)){
    echo "Please fill out all the required information";
  } else {
    // Hash the password
   $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query
    $sql = "INSERT INTO users (Username, First_name, Last_name, Phone_number, Password, Role) 
            VALUES ('$username', '$firstname', '$lastname', '$phoneNumber', '$hashedPassword', 0)";

    // Execute the query and handle exceptions
    try {
      if(mysqli_query($conn, $sql)) {
        echo "User is now registered";
        $_SESSION["LoggedIn"] = true;
        $query="SELECT User_id FROM users where Username='$username'and First_name= '$firstname'and Last_name= '$lastname'";
        $req=$conn->query($query);
        $id=$req->fetch_assoc();
        $_SESSION["id"]=$id;
        header("Location: ../html/index.php");
      } else {
        throw new Exception("Couldn't register");
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
?>
