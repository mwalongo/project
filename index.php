
<?php ob_start();?>
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AFCHPR</title>
    <link rel="stylesheet" type="text/css" href="css/parsley.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" type="text/css" href="library/notification/dist/jquery.toast.min.css">
<script src="js/app.js"></script>
   <script type="text/javascript" src="library/notification/dist/jquery.toast.min.js"> </script>
<script>$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});</script>


   
   <script>


function show(){
    var password= document.getElementById('password');
    // var repassword= document.getElementById('repassword');
    if(document.getElementById('check').checked){
        // repassword.setAttribute('type','text');
        password.setAttribute('type','text');
    }
    else{
        password.setAttribute('type','password') ;
        // repassword.setAttribute('type','password') ;
    }
   }
</script>
</head>
<body style="background-color:#006940;">
<div class="container-fluid">
     <?php include'include/header.php'; ?>
<!-- <h1> please fill out all your information * this are required fields </h1> -->

<br>

            <div class="col-md-3  sidebar-header">
                <?php
                // include'sidebar.php';
                ?>
            </div>

            <div class="col-md-6 ">
        <!-- .................................. all goes here -->

        <form action="index.php" method="post">
        <div class="well">
        <div class="header well "><h4 align="center"> <b>LOGIN</b> </h4></div>  
        <?php 
        include'include/messaging/messaging.php' ?>   
<p id="dng" class="text-danger"></p>
<p id="" class="text-success"></p>


        <div class="form-group"> 
Email: <input type="email" name="email" id="email" class="form-control" required="">
</div>
<div class="form-group"> 
Password: <input type="password" id="password" name="password"  class="form-control">
<input type="checkbox" name="" id="check" onclick=(show())>Show password </input>

</div>
<a href="forgetPassword.php">Forget Password</a> <br>
<a href="signup.php" class="btn btn-success"> <i class="fas fa-user-plus"></i> SignUp</a>
<button type="submit" value="Login" name="login" class="btn btn-primary pull-right " ><i class="fas fa-sign-in-alt"></i>  Login</button>
</div>

</form>
   
            </div>

            <!-- register -->
                </div>
</div>
</body>
</html>



<?php

if(isset($_POST['login'])){
    include'connection.php';
    $email =$_POST['email'];
    $password =$_POST['password'];
    //Dealing with mysql injection - security issue
    $email=  mysqli_real_escape_string($link,$email);
    $password=  mysqli_real_escape_string($link,($password));
    //checking if the user provides both email and password
	
 if ($email!="" && $password!=""){
      $password=md5($password);      
        $sql="SELECT * FROM userlogin WHERE email='$email' AND password='$password'";
     $result=mysqli_query($link,$sql);
		if(mysqli_num_rows($result)==1){
//create and store session variable
            $_SESSION['email']=$email;
            // $_SESSION['profile']=$profile;
          
            $row=  mysqli_fetch_array($result);
			 if($row['status']=='Active' && $row['status_admin']=='Active' && $row['type']=='customer')
                {   $_SESSION['type']=$row['type'];
                    // $_SESSION['msg']='';
                    $_SESSION['profile']=$row['profile'];
                header("location:dashboard.php");
            }
			elseif ($row['status']=='Active' && $row['status_admin']=='Active' && $row['type']=='admin') 
                {   $_SESSION['type']=$row['type'];
                    // $_SESSION['msg']='';
                    $_SESSION['profile']=$row['profile'];
               header("location:dashboard.php"); 
            }

            elseif ($row['status']=='Inactive' && $row['status_admin']=='Active') {

                $_SESSION['message_type']='error';
                $_SESSION['msg']='Please your Account is Inactive please check your Mail box to Activate ';
                header('Location:.');

            //     echo "<script>
            //     $(document).ready(function(e){
            //  $.toast({
            //  text:'Please your Account is Inactive please check your Mail box to Activate  ',
            //  heading:'Error  !',
            //  icon:'error',
            //  position:'top-right',
            //  // showHideTransition:'plain',
            //  hideAfter:  false
             
            //  });
            //     })  ; 
            //     </script>";
       

            //    header("location:inactive.php"); 
            }

            elseif ($row['status_admin']=='Inactive') {

                
                $_SESSION['message_type']='error';
                $_SESSION['msg']='Your Account is Deactivated ';
                header('Location:.');


            //     echo "<script>
            //     $(document).ready(function(e){
            //  $.toast({
            //  text:'Your Account is Deactivated ',
            //  heading:'Error  !',
            //  icon:'error',
            //   position:'top-right',             
            //  // showHideTransition:'plain',
            //  hideAfter:  false
             
            //  });
            //     })  ; 
            //     </script>";
       
            //    header("location:inactive.php"); 
            }
          
			else{

                $_SESSION['message_type']='error';
                $_SESSION['msg']='Unknown  please contact your System Administartor';
                header('Location:.');

            //     echo "<script>
            //     $(document).ready(function(e){
            //  $.toast({
            //  text:'Unknown  please contact your System Administartor',
            //  heading:'Error  !',
            //  icon:'error',
            //   position:'top-right',             
            //  // showHideTransition:'plain',
            //  hideAfter:  false
             
            //  });
            //     })  ; 
            //     </script>";



          
            }
}
        elseif (mysqli_num_rows($result)==0) 
            {

                $_SESSION['message_type']='error';
                $_SESSION['msg']='User  with this Details doesnot  Exsist';
                header('Location:.');

    //   echo "<script>
    //             $(document).ready(function(e){
    //          $.toast({
    //          text:'User  with this Details doesnot  Exsist',
    //          heading:'Error  !',
    //          icon:'error',
    //           position:'top-right',             
    //          // showHideTransition:'plain',
    //          hideAfter:  false
             
    //          });
    //             })  ; 
    //             </script>";


        }
		else {

            $_SESSION['message_type']='error';
                $_SESSION['msg']='There was an Error on Login';
                header('Location:.');

            // echo "<script>
            //     $(document).ready(function(e){
            //  $.toast({
            //  text:'There was an Error on Login',
            //  heading:'Error !',
            //  icon:'error',
            //   position:'top-right',              
            //  // showHideTransition:'plain',
            //  hideAfter:  false
             
            //  });
            //     })  ; 
            //     </script>";
        }
    }
	else {

        $_SESSION['message_type']='error';
        $_SESSION['msg']='Please provide both email and password';
        header('Location:.');

    //     echo "<script>
    //     $(document).ready(function(e){
    //  $.toast({
    //  text:'Please provide both email and password',
    //  heading:'Error !',
    //  icon:'error',
    //   position:'top-right',              
    //  // showHideTransition:'plain',
    //  hideAfter:  false
     
    //  });
    //     })  ; 
    //     </script>";


    }
}


ob_end_flush();

?>