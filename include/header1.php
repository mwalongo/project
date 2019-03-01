<?php
session_start();
if(!$_SESSION['email']){
    // $_SESSION['Redirect']=$_SERVER['REQUEST_URI'];
    header("location:.");
}

// if(!$_SESSION['msg']){
//     $msg="";
//     }
//     else{
//         $msg=$_SESSION['msg'];
//     }
    
//     $_SESSION['msg']="";
    $email=$_SESSION['email'];
    $profile=$_SESSION['profile'];
    $type=$_SESSION['type'];
    include'connection.php';


?> 