
<?php ob_start();?>
<?php
session_start();

// $_SESSION['msg']="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AFCHPR</title>
    <link rel="stylesheet" type="text/css" href="css/parsley.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script>

function checkP1(){
  var plength=document.getElementById('password');
  if(plength.value.length <8 ){
    document.getElementById("msg").innerHTML='Password should be at least  8 characters';
    document.getElementById("Button").disabled = true;

  }
  else{
    document.getElementById("msg").innerHTML='';
    document.getElementById("Button").disabled = false;
  }

}
function checkPassword(){
    var psswrd= document.getElementById('password');
    var rpssword= document.getElementById('repassword');
if (document.getElementById('password').value===document.getElementById('repassword').value){
    document.getElementById("Button").disabled = false;
    document.getElementById("msg2").innerHTML='';
}
else {
    document.getElementById("msg2").innerHTML='password does not match';
    document.getElementById("Button").disabled = true;
}
}

function show(){
    var password= document.getElementById('password');
    var repassword= document.getElementById('repassword');
    if(document.getElementById('check').checked){
        repassword.setAttribute('type','text');
        password.setAttribute('type','text');
    }
    else{
        password.setAttribute('type','password') ;
        repassword.setAttribute('type','password') ;
    }
   }
</script>
</head>
<body style="background-color:#006940;">
<div class="container-fluid"> <?php include'include/header.php'; ?>
<!-- <h1> please fill out all your information * this are required fields </h1> -->


            <div class="col-md-3  sidebar-header">
                <?php
                // include'sidebar.php';
                ?>
            </div>

            <!-- register -->

            <div class="col-md-6 ">
            <div  class="row">
<div class="col-md-12">
<ul class="menu">
<div class="back">
</div>
<li style="float:left;" class="btn btn-primary"><a href="." ><i class="fas fa-arrow-circle-left"></i>BACK</a></li>
<!-- <li  class="fas fa-print btn-info " onclick=(printFunc())>Print</li> -->
<li  class="">  </li>
</ul>
</div>
</div>
        <!-- .................................. all goes here -->

        <form action="" method="post">
        <div class="well">
        <div class="header well "><h4 align="center"> <b>REGISTER</b> </h4></div>
        <p id="dng3" align="center" class="text-danger"></p>
        <p id="msg3" align="center" class="text-success"></p>
        <div class="form-group">
        <input type="hidden" name="type" value="customer">
        <input type="hidden" name="status" value="Inactive">
        <input type="hidden" name="status_admin" value="Active">


Email: <input type="email" name="email" id="" class="form-control" required="required">
</div>
<div class="form-group">
Password: <input type="password" name="password" id="password" autocomplete="none" name="password" class="form-control" minlength="8"  required="" onkeyup=(checkP1())>
<p id="msg" align="center" class="text-danger"></p>
</div>
<div class="form-group">
Confirm Password: <input type="password" autocomplete="none" name="repassword" onkeyup=(checkPassword()) id="repassword" name="repassword" class="form-control" required="required">
<p id="msg2" align="center" class="text-danger"></p>
<input type="checkbox" name="" id="check" onclick=(show())>Show password </input> <br>
<a href="."class="btn btn-primary  "> <i class="fas fa-sign-in-alt"></i> Login<a>
<button type="submit" id="Button" onclick=(checkPassword())  value="Register" name="register" class="btn btn-success pull-right "><i class="fas fa-user-plus"></i> Register</button>

</div>

</div>
</form>

            </div>
</div>
</body>
</html>



<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include'connection.php';
if(isset($_POST['register'])){
$email=$_POST['email'];
$type=$_POST['type'];
$status=$_POST['status'];
$status_admin=$_POST['status_admin'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$profile="profile.png";


$sq="SELECT * FROM userlogin WHERE email='$email'";
$rslt=mysqli_query($link,$sq);
if(mysqli_num_rows($rslt)>=1){

    $_SESSION['message_type']='error';
    $_SESSION['msg']='User with this Email Arleady Exist';
    header('Location:signup.php');
}
else{


if ($email!="" && $type!="" && $status!="" && $password!="password" && $repassword!="repassword"){

    if($password==$repassword){
        $email=  mysqli_real_escape_string($link,$email);
       $password=  mysqli_real_escape_string($link,($password));
        $password=md5($password);

        $query="INSERT INTO userlogin VALUES('','$email','$password','$type','$status','$status_admin','$profile',Now(),Now())";
        $result=mysqli_query($link,$query);
        if($result){
                require'vendor/autoload.php';
               $mailSubject='Account Activation link';
               $mailMsg='<h2>Copy link below to activate your Account </h2> <br> http://localhost/afchpr/activate.php?mail='.$email ;
                   $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                   try {
                   $mail->IsSmtp();
                   $mail->SMTPDebug=0;
                   $mail->SMTPAuth=true;
                   $mail->SMTPSecure='tls';
                   $mail->Host='smtp.gmail.com; smtp.mail.yahoo.com';
                   $mail->Port= 587; //465
                   $mail->IsHTML(true);
                   $mail->Username='legalc2019@gmail.com';
                   $mail->Password='Court@123';
                   $mail->SetFrom("legalc2019@gmail.com");
                   $mail->Subject=$mailSubject;
                   $mail->Body=$mailMsg;
                   $mail->AddAddress($email);
                   $mail->send();
                   $_SESSION['email']=$email;



                   $_SESSION['message_type']='success';
                   $_SESSION['msg']='We sent you an Email to activate your Account
                    Check your Inbox for Activation of your Account ';
                    header('Location:resendmail.php');
                   }
                   catch (Exception $e) {


        $_SESSION['message_type']='error';
        $_SESSION['msg']='Message could not be sent.';
        header('Location:signup.php');
                   }

               }

               else{

                $_SESSION['message_type']='error';
                $_SESSION['msg']='Error Occured while Saving Data ';
                header('Location:signup.php');

               }


        }
        else{

            $_SESSION['message_type']='error';
            $_SESSION['msg']='Your Passwords Doesnot Match';
            header('Location:signup.php');

        }



}

    else{

        $_SESSION['message_type']='error';
        $_SESSION['msg']='Please fill all field';
        header('Location:signup.php');


        }
}

}



ob_end_flush();

?>
