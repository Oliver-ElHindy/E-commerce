<?php
    session_start();
    $db_server="localhost:3307";
    $db_user="root";
    $db_pass= ""; 
    $db_name="test";
    $conn=""; //connection
    

    try{ //try to connect  to the server
        $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    }catch(mysqli_sql_exception){// if it doesnt work show "couldn't connect" instead of long error texts
        echo "couldn't connect";
    }

   /* if($conn){
        echo "connected";
    }*/
    //i commented it so it only shows a message if it didnt connect

