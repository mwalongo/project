
<?php ob_start();?>
<?php
include'include/header1.php'; 

$qry="SELECT * FROM userlogin WHERE email='$email'";

$result=mysqli_query($link,$qry);
if($result){
  $user=mysqli_fetch_array($result);
  $profile=$user['profile'];


}

$_SESSION['back']='<li style="float:left;" class="btn btn-primary"> <a href="personal.php"> <i class="fas fa-arrow-circle-left"></i> Back</a></li>';


$query="SELECT * FROM applications WHERE email='$email'";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)==1){
  $user=mysqli_fetch_array($result);
  $id=$user['id'];
  $fnm=$user['full_name'];
  $bdate=$user['birthdate'];
  $ntnlty=$user['nationality'];
  $rgn=$user['placeOfBirth'];
  $dstct=$user['district'];
  $ttle=$user['title'];
  $btn=$user['pdone'];
  $gndr=$user['gender'];
  // $mrts=$user['marital_status'];
}
else{

  $id=0;
  $fnm="";
  $ntnlty="";
  $bdate="";
  $rgn="";
  $dstct="";
  $ttle="";
  $btn="";
  $gndr="";
}

if($btn==1){
   $next=' <button type="submit" class="btn btn-primary " name="next_save"> <i class="fas fa-arrow-circle-right"></i> Next </button>';

}else{
    $next="";

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
    <link rel="stylesheet" type="text/css" href="css/parsley.css">
    <script src="js/app.js"></script>
<script src="js/parsley.min.js" ></script>

</head>
<body style="background-color:#006940;">
<div class="container-fluid">
 <?php include'include/header.php'; ?>
<!-- <h1> please fill out all your information * this are required fields </h1> -->

            <div class="col-md-2 well sidebar-header">
            <div class="well">
    <img src="profiles/<?php echo $profile;?>" alt="" class="img" width="100%;" height="100%;" style="" />
    </div>
                <?php
                include'sidebar.php';
                ?>
            </div>
            <div class="col-md-10">
            <div  class="row">
<div class="col-md-12">
<ul class="menu">
<div class="back">
</div>
 <?php if(isset($_SESSION['preview'])){     echo $_SESSION['preview'];   unset($_SESSION['preview']); } ?>
<li  class="fas fa-sign-out-alt btn btn-danger"> <a href="logout.php"> Logout</a> </li>
</ul>
</div>
</div>
        <!-- .................................. all goes here -->
        <?php include'include/messaging/messaging.php' ?>   

<div class=" well"><b>Applicant Personal Details </b></div>
<div class="well">
<form action="" method="POST" data-parsley-validate="" >
<input type="hidden" name="id" value="<?php echo $id;?> ">
<input type="hidden" name="district" value="district">

  <div class="form-row">
    <div class="form-group col-md-8">
     <label>   Full Name  <b class="text-danger"> * </b></label>   
      <input type="text" class="form-control"  name="fullname" placeholder="Full Name" value="<?php echo $fnm;?>" required="">
</div>
    <div class="form-group col-md-4">
         <label for="fname" onclick=(fname())>Title / Position  <b class="text-danger"> * </b>  </label>
      <input type="text" class="form-control"  name="title" placeholder="" value="<?php echo $ttle;?>" required="">
</div>
     </div>



<div class="form-row">
<div class="form-group col-md-3">
    <label for="inputAddress2">Birth Date <b class="text-danger"> * </b>   </label>
    <input type="date" class="form-control" id="inputAddress2" name="birthdate" placeholder="" value="<?php echo $bdate;?>" required="">
  </div> 

<div class="form-group col-md-3">
      <label for="inputPassword4">Nationality <b class="text-danger"> * </b>  </label> 
      <select name="nationality" class="form-control" required="">
<?php 
$query="SELECT * FROM countries";
$result=mysqli_query($link,$query);

echo '<option value="'.$ntnlty.'"> '. $ntnlty .'</option>';

while($country=mysqli_fetch_array($result)){
    $id=$country['id'];
    $Counry_Name=$country['Counry_Name'];

  echo '<option value="'.$Counry_Name.'">'.$Counry_Name.' </option>';
  

}
?>


</select>
    </div>
<div class="form-group col-md-3">
      <label for="inputPassword4">Place Of Birth:<b class="text-danger"> * </b>  </label> 
    <input type="text" class="form-control" id="inputAddress2" name="placeOfBirth" placeholder="" value="<?php echo $rgn;?>" required="">
      
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Gender <b class="text-danger"> * </b> </label> 
<select name="gender" class="form-control" required="">
<option value="<?php echo $gndr;?>"><?php echo $gndr;?></option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Not To Say">Not To Say</option>
</select> 
    </div>
    </div>
</div>


<div class="well form-row">
<div class="form-group col-md-6">
<button type="submit" class="btn btn-success " name="save"> <i class="fas fa-save"></i>  SAVE </button>
</div>

<div class="form-group col-md-6">
<table class="well" align="right" width="20%">
 <!-- <tr><td><a href="dashboard.php" class="btn btn-info "> <<| Back </a></td>  -->
 <td> &nbsp;&nbsp; </td>
 <td> <?php echo $next; ?> </td>
 </tr>
 </table>
</div>
</div>

<div class="form-row well">
<div class="form-group col-md-12">
<table  class=" table table-striper">
<tr><th colspan="6"> SAVED PERSONAL DETAILS</th></tr>
 <tr><td>Full Name </td><td>Title/ Position </td>  <td>Birthdate </td> <td>Gender </td> <td>Nationality</td> <td>Place Of Birth</td> </tr>
 <tr><td><?php echo $fnm;?></td>
 <td><?php echo $ttle;?></td>
 <td><?php echo $bdate;?></td>
 <td><?php echo $gndr;?></td>
 <td><?php echo $ntnlty;?> </td>
 <td><?php echo $rgn;?></td>
 <!-- <td><?php echo $dstct;?></td></tr> </table> -->
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
if(isset($_POST['save']))
{

$id2=$_POST['id'];
$title=$_POST['title'];
$birthdate=$_POST['birthdate'];
$nationality=$_POST['nationality'];
$placeOfBirth=$_POST['placeOfBirth'];
$district=$_POST['district'];
$gender=$_POST['gender'];
$fullName=$_POST['fullname'];
$pdone=1;



if($id2==0){ 

$sql="SELECT * FROM countries WHERE Counry_Name='$nationality'";
$rslt=mysqli_query($link,$sql);
$contry=mysqli_fetch_array($rslt);

$dialing=$contry['Calling_Code'];

if ( $nationality!="" && $placeOfBirth!="" && $district!="" && $email!=""){

        $query="INSERT INTO applications
         VALUES('','$email','$fullName','$title','$birthdate',
         '$nationality','$placeOfBirth','$gender','$dialing',$pdone,'',
         '','','','','',         '','','','','',         '','','','','',         '','','','','',     '','','','','',
         '','','','','',         '','','','','',         '','','','','',         '','','',          Now(),Now())";
        $result=mysqli_query($link,$query);
        if($result){
            $_SESSION['message_type']='success';
            $_SESSION['msg']='Personal Info Saved';
            header('Location:personal.php');
        }
        else{

            $_SESSION['message_type']='error';
            $_SESSION['msg']='Error Occured while Saving';
            header('Location:personal.php');
        }
    
}
else{

    $_SESSION['message_type']='error';
    $_SESSION['msg']='Please fill all fields';
    header('Location:personal.php');

}

}

else{

// update here......................................................

$sql="SELECT * FROM countries WHERE Counry_Name='$nationality'";
$rslt=mysqli_query($link,$sql);
$contry=mysqli_fetch_array($rslt);
$dialing=$contry['Calling_Code'];


if ($fullName!="" && $birthdate!="" && $placeOfBirth!="" && $district!="" && $email!="" ){

        $query="UPDATE  applications SET full_name='$fullName', title='$title', gender='$gender', birthdate='$birthdate', nationality='$nationality',
        placeOfBirth='$placeOfBirth',  district='$district', dialing='$dialing',pdone='$pdone', updated_at = Now()  WHERE  email='$email'";
        $result=mysqli_query($link,$query);
        if($result){

            $_SESSION['preview']='<li class="btn btn-success"> <a href="u_preview.php"> Preview</a></li>';
            $_SESSION['message_type']='info';
            $_SESSION['msg']='Personal Informations Saved';
            header('Location:personal.php');

   
        }
        else{
            $_SESSION['message_type']='error';
            $_SESSION['msg']=mysqli_error($link);
            header('Location:personal.php');

       }
    
}
else{

    $_SESSION['message_type']='error';
    $_SESSION['msg']='Please fill all fields';
    header('Location:personal.php');
    
}


}
}


if(isset($_POST['next_save'])){


 $id2=$_POST['id'];
$title=$_POST['title'];
$birthdate=$_POST['birthdate'];
$nationality=$_POST['nationality'];
$placeOfBirth=$_POST['placeOfBirth'];
$district=$_POST['district'];
$fullName=$_POST['fullname'];
$gender=$_POST['gender'];
$pdone=1;



    $sql="SELECT * FROM countries WHERE Counry_Name='$nationality'";
    $rslt=mysqli_query($link,$sql);
    $contry=mysqli_fetch_array($rslt);
    $dialing=$contry['Calling_Code'];
    
    
    if ($fullName!="" && $birthdate!="" && $placeOfBirth!="" && $district!="" && $email!="" ){
    
            $query="UPDATE  applications SET full_name='$fullName', title='$title',gender='$gender', birthdate='$birthdate', nationality='$nationality',
            placeOfBirth='$placeOfBirth',  district='$district', dialing='$dialing',pdone='$pdone', updated_at = Now()  WHERE  email='$email'";
            $result=mysqli_query($link,$query);
            if($result){
    
                 
                // $_SESSION['message_type']='info';
                // $_SESSION['msg']='Personal Information Saved';
                header('Location:contact.php');
    
       
            }
            else{
                $_SESSION['message_type']='error';
                $_SESSION['msg']=mysqli_error($link);
                header('Location:personal.php');
    
           }
        
    }
    else{
    
        $_SESSION['message_type']='error';
        $_SESSION['msg']='Please fill all fields';
        header('Location:personal.php');
        
    }
    

}


ob_end_flush();
?>

