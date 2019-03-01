<?php ob_start();?>
<?php
// session_start();
// if(!$_SESSION['msg']){
// $msg="";
// }
// else{
//     $msg=$_SESSION['msg'];
// }

// $_SESSION['msg']="";


// $email=$_SESSION['email'];
// include'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="include/css/all.css">
<!-- pagination -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
<!-- end pagination -->

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
 -->

       <link rel="stylesheet" type="text/css" href="library/notification/dist/jquery.toast.min.css">
<script src="js/app.js"></script>
   <script type="text/javascript" src="library/notification/dist/jquery.toast.min.js"> </script>

    <title>AFCHPR</title>
    <script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


    function myPreview(){
        location.replace("preview.php")
    }
    </script>

    <style>

 .logo {
     float:left;
     padding-left:25px;
     font-size:16px;
     font-weight:bold;
 }
 
 .logo >a{
     text-decoration:none;
     color:none;
      }

      .bannar{
          width:100%;
          display:block;
          /* background-color:#ffff; */
          background-color: #e6eae9;
          font-size:36px;
          font-weight:bold;
          color:green;
          /* font-style:italic; */
          

      }
      .banner>.bannar-image{
        width:100%;
          display:block;
      }
    </style>
    <style>
.menu{
    margin-top:2px;
    background-color:#e6eae9;
    color:#ffffff;
    list-style:none;
    text-align:right;
    border-radius:5px;
    padding:1px 0 1px 0;
    font-weight:bold;

    }
    .menu > li {
        display:inline-block;
        padding:0 25px 0 25px;
        margin-right:5px;
        margin-left:5px;
        color:#ffffff;
         font-weight:bold;

    }
    .menu > li >a{
text-decoration:none;
/* color:darkgreen; */
color:#ffffff;
         font-weight:bold;
    }
    .nav > li > a.hover{
color:#c1c1c1;
    }
    .back{
        color:#003443;
        float:left;
        padding-left:25px;
        font-size:16px;
        color:darkgreen;

        font-weight:bold;
    }
    .back > a{
text-decoration:none;
color:#ffffff;
    }
    .back >  a.hover{
color:#c1c1c1;
    }

</style>

 
</head>
<body style="background-color:#006940;">
<div class="bannar">
<img  class="bannar-image"  src="include/logo.png"/>    Legal Counsel System Application System
</div>
       
</body>
</html>




