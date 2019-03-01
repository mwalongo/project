
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
    <title>AFCHPR</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/parsley.css">
    <script src="js/app.js"></script>
<script src="js/parsley.min.js" ></script>
<script>

function myTest(){
    
}

</script>


</head>
<body style="background-color:#006940;">
<div class="container-fluid"> <?php include'include/header.php'; ?>
<!-- <h1> please fill out all your information * this are required fields </h1> -->

            <div class="col-md-2  sidebar-header">
        
                <?php
                // include'sidebar.php';
                ?>
            </div>
            <div class="col-md-10">
        <!-- .................................. all goes here -->
        <?php include'include/messaging/messaging.php' ?>   

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

<div class=" well"><b>Forget Password </b></div>
<div class="well">
<form action="" method="POST" data-parsley-validate="" >

  <div class="form-row">
    <div class="form-group col-md-12">
         <label for="emailTo" onclick=(fname())>Enter your Email</label>
      <input type="email" class="form-control"  name="emailTo" placeholder="" value="" required="">
</div>
    
     </div>



<div class="form-row">
<div class="form-group col-md-6">
<button type="submit" class="btn btn-success " name="save"><i class="far fa-envelope"></i>  Send Me Email </button>
</div>

</div>
<br><br>


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
if(isset($_POST['save']))
{
    
    // require'library/PHPMailer-master/get_oauth_token.php';

$mailTo=$_POST['emailTo'];

$sql="SELECT * FROM userlogin WHERE email='$mailTo'";
$result=mysqli_query($link,$sql);
if(mysqli_num_rows($result)==1){
 require'vendor/autoload.php';
$mailSubject='Password reset link';
$mailMsg='<h2>Copy link below to reset your Password</h2> <br> http://localhost/afchpr/resetPassword.php?mail='.$mailTo;
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
    $mail->AddAddress($mailTo);
    $mail->send();


    $_SESSION['message_type']='success';
    $_SESSION['msg']='Mail has been sent Check your Inbox';
    header('Location:forgetPassword.php');

    } 
    catch (Exception $e) {

        $_SESSION['message_type']='error';
        $_SESSION['msg']='Message could not be sent. Type your Email correctly. <br> Mailer Error: ' . $mail->ErrorInfo;
        header('Location:forgetPassword.php');

  

    }

}
    else{

        $_SESSION['message_type']='error';
        $_SESSION['msg']='Unknown Email check your Email';
        header('Location:forgetPassword.php');

    }



}
ob_end_flush();
?>

