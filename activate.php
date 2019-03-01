
<?php ob_start();?>

<?php
session_start();
if(!$_SESSION['msg']){
    $msg="";
    }
    else{
        $msg=$_SESSION['msg'];
    }
    
$uemail=$_GET['mail'];

include'connection.php';
     


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

<div class=" well"><b>Error </b></div>

<div class="well">
<?php echo $msg?>
<form action="" method="POST" data-parsley-validate="" >
<?php
     $sql="SELECT * FROM userlogin where email='$uemail'";
     $result=mysqli_query($link,$sql);
		if(mysqli_num_rows($result)==1){
//create and store session variable
            $query="UPDATE userlogin SET status = 'Active' WHERE email='$uemail'";
            $rslt=mysqli_query($link,$query);
if($rslt){
    $_SESSION['message_type']='success';
   $_SESSION['msg']= "Your Accont is successful Activated Now Login";
    header('location:.');

}
else{
    $_SESSION['message_type']='error';
    $_SESSION['msg']=mysqli_error($link);
    header('Location:activate.php');
}
}
 
 else
 {
    $_SESSION['msg'] =mysqli_error($link);
    header('Location:activate.php');
 }


?> 

<div class="form-row">
<div class="form-group col-md-6">

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

ob_end_flush();
?>

