<?php
include("connec.php");

if(isset($_POST["signinbtn"])){
    
  $username=filter_input(INPUT_POST,"Uname",FILTER_SANITIZE_SPECIAL_CHARS);
  $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
  if(empty($username)){
      echo "please enter a username <br>";
  }else if (empty($password)){
      echo "please enter a password <br>";
  }else{
      $sql="SELECT Username,Password from users Where Username='$username'";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        if($row["Username"]== $username){                  
            if(password_verify($password,$row["Password"])){
                $query="SELECT * from users Where Username='$username';";
        $result=mysqli_query($conn,$query);
        $user=mysqli_fetch_assoc($result);
                session_start();
                $_SESSION["loggedin"]=true;
                $_SESSION["id"]=$user['User_id'];
                $_SESSION["role"]=$user['Role'];
                header("Location: ../html/index.php");
            }
            else{
                echo "password incorrect";
            }
        }
    }else{
        echo "no users found";
        header("Location: ../html/Sign-up.html");
    }
  }
}
?>