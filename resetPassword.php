
<?php ob_start();?>
<?php
session_start();
$uemail=$_GET['mail'];
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
    <link rel="stylesheet" type="text/css" href="node_modules/jquery-toast-plugin/dist/jquery.toast.min.css">
    <script src="node_modules/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
    <script src="js/app.js"></script>
<script src="js/parsley.min.js" ></script>
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
    document.getElementById("msg").innerHTML='';
}
else {
    document.getElementById("msg").innerHTML='password does not match';
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

            <div class="col-md-2 sidebar-header">
            <div class="">
    </div>
                <?php
                // include'sidebar.php';
                ?>
            </div>
            <div class="col-md-10">
        <!-- .................................. all goes here -->
        <?php include'include/messaging/messaging.php' ?>   


<div class=" well"><b>Reset Your Password </b></div>

<div class="well">
<form action="" method="POST" data-parsley-validate="" >

  <div class="form-row">
    <div class="col-md-6">
         <label for="fname" onclick=(fname())>New Password</label>
      <input type="password" id="password" autocomplete="none"  class="form-control" minlength="8"  name="password"  value=""  required="" onkeyup=(checkP1())>
<!-- <progress max="100" value="0" id="strength"  style="width: 230px;"> </progress> -->
     

</div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
         <label for="fname" onclick=(fname())>Re-password :</label>
      <input type="password" id="repassword" class="form-control" autocomplete="none"  name="repassword" placeholder="" value="" required="" onkeyup=(checkPassword())>
      <p id="msg" class="text-danger"></p>
      <input type="checkbox" name="" id="check" onclick=(show())>Show password </input>
</div>
     </div>
<div class="form-row">
<div class="form-group col-md-6">
<button type="submit" id="Button" class="btn btn-success " name="save" onclick=(checkPassword())>| Update Password |</button>
</div>
</div>
</div>
</div>

</form>

</div>
</div>
</body>
</html>


<?php
include'connection.php';

if(isset($_POST['save'])){
    // $email =$_POST['email'];
    $password =$_POST['password'];
    $repassword=$_POST['repassword'];
    //Dealing with mysql injection - security issue
    // $email=  mysqli_real_escape_string($link,$email);
    $password=  mysqli_real_escape_string($link,($password));
    //checking if the user provides both email and password
	
 if ($repassword!="" && $password!=""){
      $password=md5($password);      
        $sql="SELECT * FROM userlogin where email='$uemail'";
     $result=mysqli_query($link,$sql);
		if(mysqli_num_rows($result)==1){
//create and store session variable
            $query="UPDATE userlogin SET password = '$password' WHERE email='$uemail'";
            $rslt=mysqli_query($link,$query);
if($rslt){

    
    $_SESSION['message_type']='success';
    $_SESSION['msg']='Your Password  Successfull Changed  Now Login ';
    header('Location:index.php');

}
else{
    // echo mysqli_error($link);
    $_SESSION['message_type']='error';
    $_SESSION['msg']=mysqli_error($link);
    header('Location:resetPassword.php');
}
}
 }
 else
 {
    $_SESSION['message_type']='error';
    $_SESSION['msg']='Please fill all fields';
    header('Location:resetPassword.php');
 }
}


ob_end_flush();
?>

