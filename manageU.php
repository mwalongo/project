<?php ob_start();?>
<?php

$email2=$_GET['email2'];
include'include/header1.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AFCHPR</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
    </style>
<script>

</script>
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

<div class="container-fluid"> <?php include'include/header.php'; ?>
<div class="col-md-2 well sidebar-header">
    <div class="well">
    <img src="profiles/<?php echo $profile;?>" alt="" class="img" width="100%;" height="100%;" style="" />
    </div>
               <?php

                include'sidebar.php';
                
                ?>
            </div>
            <div class="col-md-10">

<?php
include'connection.php';
$sql="SELECT u.*, a.* FROM userlogin u, applications a  WHERE u.email='$email2' && a.email='$email2'";
$qry=mysqli_query($link, $sql);

 $applicant=mysqli_fetch_array($qry);
 $name=$applicant['full_name'];
 $title=$applicant['title'];
 $birthdate=$applicant['birthdate'];
 $nationality=$applicant['nationality'];
 $placeOfBirth=$applicant['placeOfBirth'];
 $district=$applicant['district'];
 $_email=$applicant['email'];
 $telephone=$applicant['telephone_no'];
 $fax=$applicant['fax_no'];
 $otheremail=$applicant['other_email'];
 $address=$applicant['address'];
 $dialing=$applicant['dialing'];
 $type=$applicant['type'];
 $status=$applicant['status_admin'];





?>
<form action="" method="post">
<div  class="row">
<div class="col-md-12">
<ul class="menu">
<div class="back">
</div>
<li style="float:left;" class="btn btn-primary"><a href="registered.php" ><i class="fas fa-arrow-circle-left"></i> BACK</a></li>
<!-- <li class="fas fa-print btn btn-info">Print</li> -->
<li  class="fas fa-sign-out-alt btn btn-danger"> <a href="logout.php">Logout</a> </li>
</ul>

</div>
</div>
<?php include'include/messaging/messaging.php' ?>   

            <div class="row">
            <div class="col-md-12">
<table class="well table table-stripper table-bordered">
<tr><th class="well" >Name of Applicant: &nbsp;&nbsp; <?php echo $name; ?> </th> <th class="well" > Title:&nbsp; <?php echo $title; ?> </th></tr>
<tr><td class="well" >Date  of Birth: &nbsp;<?php echo $birthdate; ?>,  &nbsp;&nbsp;&nbsp;  Place: <?php echo $PlaceOfBirth."-". $district; ?> 
</td> <td class="well" > Nationality:&nbsp; <?php echo $nationality; ?> </td></tr>
<tr><td rowspan="5">Address: <br>
&nbsp; <?php echo $address; ?>
 </td> </tr> 
<tr> <td>Tell: &nbsp; <?php echo $dialing.' '. $telephone; ?> </td> </tr>
<tr> <td>Fax: &nbsp; <?php echo $dialing.' '.$fax; ?> </td> </tr>
 <tr><td>Email: &nbsp; <?php echo $_email; ?> </td></tr>
<tr> <td>Other Email: &nbsp;  <?php echo $otheremail; ?> </td> </tr>
</table>

</div>  
</div>
<div class="row ">
<div class="form-group col-md-12">
<h3 class=" well "> Current Adminstrative Status: &nbsp; <u> <b><?php echo $status; ?></b> </u> </h3>
</div>
</div>
        

        <div class="row well">
        
        <div class="form-group col-md-3">
        <label >Select Status</label>
<select name="status" class="form-control">
<option value="<?php echo $status; ?>"> <?php echo  $status; ?></option>
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>
</select>

</div>
</div>
<div class="row well">
<div class="form-group col-md-3">
<button class="btn btn-primary" name="change"> <i class="far fa-edit"></i>Change Account status</button>
</div>
</div>

</form>     
</div>
</div>

  
</body>
</html>



<?php 
include'connection.php';
if(isset($_POST['change'])){
    $status= $_POST['status'];
    if($status!=""){

$sql="UPDATE userlogin SET status_admin='$status'  WHERE email='$email2'";
$rslt =mysqli_query($link,$sql);
if($rslt){

    $_SESSION['message_type']='info';
    $_SESSION['msg']='Administrative Status Changed';
    header('Location:manageU.php?email2='.$email2);

}
else{

    $_SESSION['message_type']='error';
    $_SESSION['msg']='Error occured while  Changing Status';
    header('Location:manageU.php?email2='.$email2);
    // header('Location:manageU.php');

  
}
           }
        else{


            $_SESSION['message_type']='error';
            $_SESSION['msg']='please select Active or Inactivate';
            header('Location:manageU.php?email2='.$email2);
    // header('Location:manageU.php');

        }



}



?>