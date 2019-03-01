<?php ob_start();?>
<?php
include'include/header1.php'; 


if($type=="admin"){

    $menues ='
    <div class="header">
    <header class="header well" > <b>WELCOME ADMIN</b> </header>
    </div>
    
    <div class="content well">

    <div class="form-row">
 
    <div class="group col-md-3">   <a href="registered.php" class="btn btn-primary"> USERS ACCOUNTS </a></div>
    <div class="group col-md-3">    <a href="approve.php" class="btn btn-primary">  APPLIED LAWYERS </a></div>
    <div class="group col-md-3">    <a href="approved.php" class="btn btn-primary">  APPROVED LAWYERS </a></div>
    <div class="group col-md-3">    <a href="incompleteA.php" class="btn btn-primary"> INCOMPLETE  APPLICATION </a></div>
    </div>
    </div>

    <div class="row-12">
    <div class="col-md-4 well">
    <b><u> Legal Counsel System Application System Legal Counsel System Application System </u></b> <br>
    <div class="ex1">
    <ul><li>Legal Counsel System Application System Legal Counsel System Application System</li>
    <li>Legal Counsel System Application System Legal Counsel System Application System</li>
    <li>Legal Counsel System Application System Legal Counsel System Application System</li>
    <li>Legal Counsel System Application System Legal Counsel System Application System</li>
    <li>Legal Counsel System Application System Legal Counsel System Application System</li>
    <li>Legal Counsel System Application System Legal Counsel System Application System</li>
    </ul>
    </div>
    </div>
    <div class="col-md-4 well" >
    <b><u> Legal Counsel System Application System Legal Counsel System Application System </u></b> <br>
    <div class="ex1">
    Legal Counsel System Application System Legal Counsel System Application System
    Legal Counsel System Application System Legal Counsel System Application System
    Legal Counsel System Application System Legal Counsel System Application System
    Legal Counsel System Application System Legal Counsel System Application System
    Legal Counsel System Application System Legal Counsel System Application System
    Legal Counsel System Application System Legal Counsel System Application System

    </div>
    </div>

    <div class="col-md-4 well"> 
    <b><u>Legal Counsel System Application System Legal Counsel System Application System</u></b> <br>
    <div class="ex1">
    Legal Counsel System Application System Legal Counsel System Application System
    Legal Counsel System Application System Legal Counsel System Application System
    Legal Counsel System Application System Legal Counsel System Application System
    Legal Counsel System Application System Legal Counsel System Application System
    Legal Counsel System Application System Legal Counsel System Application System
    Legal Counsel System Application System Legal Counsel System Application System
    Legal Counsel System Application System Legal Counsel System Application System


    </div>
    </div>
    </div>
    </div>
    ';


}

else{


    $menues= ' 
    <div class="header">
<header class="header well" align="center"> <b>WELCOME TO VACANCY</b> </header>
</div>

<div class="content well">
<div class="form-row">  
  <div class="group col-md-6"></div>
<div class="group col-md-6"><a href="personal.php" class="btn btn-primary"> Fill Application Form </a></div>
</div>
</div>
<div class="row-12">
<div class="col-md-4 well">
<b> Legal Counsel System Application System Legal Counsel System Application System</b> <br>
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System

Legal Counsel System Application System Legal Counsel System Application System
</div>
<div class="col-md-4 well" >Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System

</div>
<div class="col-md-4 well">Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System
Legal Counsel System Application System Legal Counsel System Application System

</div>
</div>
</div>
    ';
    
}



$email=$_SESSION['email'];
include'connection.php';

$qry="SELECT * FROM userlogin WHERE email='$email'";

$result=mysqli_query($link,$qry);
if($result){
  $user=mysqli_fetch_array($result);
  $profile=$user['profile'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AFCHPR</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- <script type="text/javascript" src="include/js/custom.jquery.js"></script> -->
<script>

function myTest(){
    
}
 
</script>
<style>
 div.ex1 {
    background-color: lightgray;
    height: 380px;
    border-radius:15px;
    overflow: scroll;
  }
  
</style>
</head>
<body style="background-color:#006940;">


<div class="container-fluid"> <?php include'include/header.php'; ?>


<div class="col-md-2 well sidebar-header">
    <div class="well">
    <img src="profiles/<?php echo $profile;?>" alt="" class="img" width="100%;" height="100%;" style="" />
    </div>
                <?php
                include'sidebar.php';              
                ?>
            </div>
            <div class=" col-md-10">

            <div  class="row">
<div class="col-md-12">
<ul class="menu">
<div class="back">
</div>

<li  class="btn btn-danger"> <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a> </li>
</ul>
</div>
</div>
        <?php include'include/messaging/messaging.php' ?>        
        <!-- .................................. all goes here -->
    
<p class="align-left">

<?php echo  $menues ?>

</div>
</div>
</p>
            </div>
</div>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
   
    $file=$_FILES['file'];
  
    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];
  
    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
    $allowed =array('jpg','jpeg','png');
    if(in_array($fileActualExt, $allowed)){
    if($fileError===0){
        if($fileSize<1000000){
    $fileNameNew=uniqid('',true).".".$fileActualExt;
    $fileDestination = 'profiles/'.$fileNameNew;
    move_uploaded_file($fileTmpName,$fileDestination);
    
  if($fileNameNew!=""){
      $sql="UPDATE userlogin SET profile='$fileNameNew', updated_at=Now() WHERE email='$email'";
      $rslt=mysqli_query($link,$sql);
      if($rslt){
          
      $_SESSION['message_type']='info';
      $_SESSION['msg']='Profile Changed';
          header('Location:dashboard.php');
      }
      else{
          $_SESSION['message_type']='error';
          $_SESSION['msg']=mysqli_error($link);
          header('Location:dashboard.php');
      }
  }
  
  
        }else{
          $_SESSION['message_type']='error';
          $_SESSION['msg']='Photo size should be less than 1Mb </h4> ';
          header('Location:dashboard.php');
           
        }
    
    }else{
  
      $_SESSION['message_type']='error';
      $_SESSION['msg']='There was an error in Uploading Photo';
      header('Location:dashboard.php');
    
    }
    }
    else{
      $_SESSION['message_type']='error';
      $_SESSION['msg']='Upload file type of (JPG,JPEG, PNG,)';
      header('location:dashboard.php');
    }
  }
  
?>

<?php  ob_end_flush();?>