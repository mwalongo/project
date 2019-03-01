<?php ob_start();?>
<?php
include'include/header1.php'; 



if($type=="admin"){



    $menues ='
    <div class="header">
    <header class="header well" align="center"> <b>WELCOME ADMIN</b> </header>
    </div>
    
    <div class="content well">
    <div class="form-row">
    <div class="group col-md-6">
    <a href="registered.php" class="btn btn-primary"> USERS ACCOUNTS </a>
    </div>
    <div class="group col-md-6">
    <a href="applied.php" class="btn btn-primary">  APPLIED USERS </a>
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
    <div class="group col-md-6">

</div>
<div class="group col-md-6">
<a href="personal.php" class="btn btn-primary"> Fill Application Form </a>
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
    <title>AFCHPR</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
<script>

function myTest(){
    
}
 function myPage(){ document.getElementById("page").innerHTML="this is Home";
 }
 function myContact(){ document.getElementById("page").innerHTML="this is Contact";
 }
 function myAcademic(){ document.getElementById("page").innerHTML="this is Academic";
 }
 function myExperiance(){ document.getElementById("page").innerHTML="this is Experiance";
 }
 function myEnclosure(){ document.getElementById("page").innerHTML="this is Encosure";
 }
 function myProfessional(){ document.getElementById("page").innerHTML="this is Proffessional";
 }
 
 
 
</script>
</head>
<body style="background-color:#006940;">

<div class="container-fluid"> <?php include'include/header.php'; ?>
<div class="col-md-2 well sidebar-header">
    <div class="well">
    <img src="profiles/<?php echo $profile;?>" alt="" class="img" width="100%;" height="100%;" style="" />
    </div>
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
        $_SESSION['msg']='<p class="text-info">Profile Changed</p>';
        header('Location:dashboard.php');
    }
    else{
        $_SESSION['msg']='<p class="text-danger">'.mysqli_error($link).'</p>';
        header('Location:dashboard.php');
    }
}


      }else{
          $_SESSION['msg']='<h4 class="text-danger">  your file is to big</h4> ';
          header('location:dashboard.php');
      }
  
  }else{
    $_SESSION['msg']= '<h4 class="text-danger"> There was an error in Uploading</h4>';
    header('location:dashboard.php');
  }
  }
  else{
    $_SESSION['msg']='<h4 class="text-danger"> you cant apload file of this type</h4';
 
    header('location:dashboard.php');
  }
}



                // include'sidebar.php';
                
                ?>
            </div>
            <div class="col-md-10">
            <h3 align="center"><?php echo $msg ?></h3>


        <!-- .................................. all goes here -->
    
<p class="align-left">
<div class="row-12">
<p>
<h1 class="text-danger">  Sorry your Account is  <b> <u>INACTIVE</u></b>   </h1>
<ul>
<li>Contact your account Administrator</li>
<li>Due to the un filled informations to the fields </li>
</ul>


</p>
<a href="logout.php" class="btn btn-primary">Ok</a>

</div>
<!-- <img src="images/court.jpg" alt="" class="img" width="50%;"/> -->

</div>
</div>
</p>
            </div>
</div>
</body>
</html>

<?php  ob_end_flush();?>