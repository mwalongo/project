
<?php ob_start();?>
<?php
session_start();

if(!$_SESSION['msg']){
$msg="";
}
else{
    $msg=$_SESSION['msg'];
}


$email=$_SESSION['email'];

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

</script>
</head>
<body style="background-color:#006940;">
<div class="container-fluid"> <?php include'include/header.php'; ?>
<!-- <h1> please fill out all your information * this are required fields </h1> -->

<br>

            <div class="col-md-3  sidebar-header">
                <?php
                // include'sidebar.php';
                ?>
            </div>

            <!-- register -->
            <div class="col-md-6 ">
        <!-- .................................. all goes here -->

        <form action="" method="post">
        <div class="well">
        <div class="header well "><h4 align="center"> <b><?php echo $msg; ?></b> </h4></div>
        <p id="dng3" align="center" class="text-danger"></p>
        <p id="msg3" align="center" class="text-success"></p>

<div class="form-group well">
<!-- <a href="." class="btn btn-primary">Login Now</a> -->
<input type="submit" id="Button"   value="Resend Confimation Mail" name="resend" class="btn btn-success pull-right " >

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
if(isset($_POST['resend'])){

    require'vendor/autoload.php';
    $mailSubject='Account Activation link';
    $mailMsg='<h2>Copy link below to activate your Account </h2> <br>http://www.afchpr.org/activate.php?mail='.$email;
                   $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                   try {
                   $mail->IsSmtp();
                   $mail->SMTPDebug=0;
                   $mail->SMTPAuth=true;
                   $mail->SMTPSecure='tls';
                   $mail->Host='smtp.gmail.com';
                   $mail->Port= 587; //465
                   $mail->IsHTML(true);
                   $mail->Username='legalc2019@gmail.com';
                   $mail->Password='Court@123';
                   $mail->SetFrom("legalc2019@gmail.com");
                   $mail->Subject=$mailSubject;
                   $mail->Body=$mailMsg;
                   $mail->AddAddress($email);
                   $mail->send();

                   $_SESSION['message_type']='success';
                   $_SESSION['msg']='Email Successful Sent';
                   header('Location:resendmail.php');
                   }
                   catch (Exception $e) {

                    $_SESSION['message_type']='error';
                    $_SESSION['msg']= 'Message could not be sent. <br> Mailer Error: ' . $mail->ErrorInfo;
                   header('Location:resendmail.php');
                   }

               }





ob_end_flush();

?>
