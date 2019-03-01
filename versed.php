
<?php ob_start();?>
<?php
include'include/header1.php'; 



$qry="SELECT * FROM userlogin WHERE email='$email'";

$result=mysqli_query($link,$qry);
if($result){
  $user=mysqli_fetch_array($result);
  $profile=$user['profile'];
}
$_SESSION['back']='<li style="float:left;" class="btn btn-primary"> <a href="versed.php"> <i class="fas fa-arrow-circle-left"></i> Back</a></li>';

$query="SELECT * FROM applications WHERE email='$email'";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)==1){
  $member=mysqli_fetch_array($result);
  $id=$member['id'];

  $cls=$member['common_law_system'];
  $cvls=$member['civil_law_system'];
  $aos=$member['any_other_system'];
  $isl=$member['islamic_law'];
  $cyd=$member['commonsystemDetails'];
  $csd=$member['civilsystemDetails'];
  $asd=$member['anyothersystemDetails'];
  $btn=$member['vdone'];
}
else{
    $id="";
    $cls="";
    $cvls="";
    $aos="";
    $btn="";
 }
if($btn==1){
    $next=' <a href="attachments.php" class="btn btn-primary">Next <i class="fas fa-arrow-circle-right"></i></a>';

}
else{
    $next='';

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
    <link rel="stylesheet" type="text/css" href="css/parsley.css">
    <script src="js/app.js"></script>
    <script src="js/parsley.min.js" ></script>
<script>


function ValidateForm(form){
    if((form.civil_law_system[0].checked==false) && (form.civil_law_system[1].checked==false) && (form.civil_law_system[2].checked==false))
    {
        document.getElementById("Button").disabled = true;
    }
    else if ((form.any_other_system[0].checked==false) && (form.any_other_system[1].checked==false) && (form.civil_law_system[2].checked==false))
    {
        document.getElementById("Button").disabled = true;
    }
    else if ((form.common_law_system[0].checked==false) && (form.common_law_system[1].checked==false) && (form.common_law_system[2].checked==false))
    {
        document.getElementById("Button").disabled = true;
    }
    else  {
        document.getElementById("Button").disabled = false;

    }
}

function commonLawDetails(){
document.getElementById("commonLawDetails").innerHTML='If Yes  Give a details on theory below (<i> Required </i>) '
+"<br>"+' <textarea id="textarea" rows="3" name="commonsystemDetails" class="form-control" required=""><?php echo $cyd; ?> </textarea>';   
document.getElementById("Button").disabled = false; 
} 

function myNothing(){
document.getElementById("commonLawDetails").innerHTML=''; 
document.getElementById("Button").disabled = false;
}

function civilLawDetails(){
document.getElementById("civilLawDetails").innerHTML=' If Yes Provide Details  (<i> Required </i>) '
+"<br>"+' <textarea id="textarea" rows="3" name="civilsystemDetails" class="form-control" required=""> <?php echo $csd; ?> </textarea>';  
document.getElementById("Button").disabled = false;  
} 

function cimyNothing(){
document.getElementById("civilLawDetails").innerHTML=''; 
document.getElementById("Button").disabled = false;
}


function ilLawDetails(){
document.getElementById("islamicDetails").innerHTML=' If Yes Provide Details  (<i> Required </i>) '
+"<br>"+' <textarea id="textarea" rows="3" name="islamicLawDetails" class="form-control" required=""> <?php echo $csd; ?> </textarea>';  
document.getElementById("Button").disabled = false;  
} 

function ilmyNothing(){
document.getElementById("islamicDetails").innerHTML=''; 
document.getElementById("Button").disabled = false;
}



function anyOtherSystemDetails(){
document.getElementById("anyOtherSystemDetails").innerHTML='If Yes  give a deetails below (<i> Required </i>) '
+"<br>"+' <textarea id="textarea" rows="3" name="anyothersystemDetails" class="form-control" required=""> <?php echo $asd; ?>  </textarea>';  
document.getElementById("Button").disabled = false;  
} 
function anyOtherNothing(){
document.getElementById("anyOtherSystemDetails").innerHTML=''; 
document.getElementById("Button").disabled = false;
}
</script>
</head>


<body style="background-color:#006940;">
<div class="container-fluid">
 <?php include'include/header.php'; ?>
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
<li  class="fas fa-sign-out-alt btn btn-danger">  <a href="logout.php">Logout</a> </li>
</ul>
</div>
</div>
<?php include'include/messaging/messaging.php' ?>   

        <!-- .................................. all goes here --> 
     
<form action="" method="POST" data-parsley-validate="">
<h5 class="well">Are you Versed in : </h5>

<div class="form-row well">
<div class="form-group col-md-4">
The Common Law System ? <b class="text-danger"> * </b> <br>
<label> <input type="radio" name="common_law_system"  value="No" onclick=(myNothing()) > No  </label><br> 
<label> <input type="radio" name="common_law_system"  value="YES" onclick=(commonLawDetails()) > Yes  </label><br> 
<label> <input type="radio" name="common_law_system"  value="Theory Only" onclick=(myNothing()) >Theory Only</label>
</div>
<div class="form-group col-md-8">
<p id="commonLawDetails" class="text-danger"></p>
</div>
</div>

<hr>
<div class="form-row well">
<div class="form-group col-md-4">
The Civil Law system ? <b class="text-danger"> * </b> <br>

<label> <input type="radio" name="civil_law_system"  value="No" onclick=(cimyNothing()) > No  </label><br> 
<label> <input type="radio" name="civil_law_system"  value="YES" onclick=(civilLawDetails()) > Yes  </label><br> 
<label> <input type="radio" name="civil_law_system"  value="Theory Only" onclick=(cimyNothing()) >Theory Only</label>
</div>
<div class="form-group col-md-8">
<p id="civilLawDetails" class="text-danger"></p>
</div>
</div>


<hr>
<div class="form-row well">
<div class="form-group col-md-4">
The Islamic Law  ? <b class="text-danger"> * </b> <br>

<label> <input type="radio" name="islamic_law"  value="No" onclick=(ilmyNothing()) > No  </label><br> 
<label> <input type="radio" name="islamic_law"  value="YES" onclick=(ilLawDetails()) > Yes  </label><br> 
<label> <input type="radio" name="islamic_law"  value="Theory Only" onclick=(ilmyNothing()) >Theory Only</label>
</div>
<div class="form-group col-md-8">
<p id="islamicDetails" class="text-danger"></p>
</div>
</div>


<hr>
<div class="form-row well">
<div class="form-group col-md-4">
Any other System ? <b class="text-danger"> * </b><br>
<label> <input type="radio" name="any_other_system"  value="No" onclick=(anyOtherNothing()) > No  </label><br> 
<label> <input type="radio" name="any_other_system"  value="YES" onclick=(anyOtherSystemDetails()) > Yes  </label><br> 
<label> <input type="radio" name="any_other_system"  value="Theory Only" onclick=(anyOtherNothing()) >Theory Only</label><br> 
</div>
<div class="form-group col-md-8 ">
<p id="anyOtherSystemDetails" class="text-danger"></p>
</div>
</div>
<hr>
<div class="form-row well">
<div class="form-group col-md-6">
<td>
<button id="Button"  type="submit" class="btn btn-success " name="save" onmousemove="ValidateForm(this.form)"><i class="fas fa-save"></i>  SAVE </button>
</div>

<div class="form-group col-md-6">    
<table class="well" align="right" width="20%">
 <tr><td><a href="cases.php" class="btn btn-info" > <i class="fas fa-arrow-circle-left"></i> Back </a></td> 
 <td> &nbsp;&nbsp; </td>
 <td><?php echo $next;?></td>
 </tr>
 </table>
 </div>
 </div>
<div class="row well">
<div class="form-group col-md-12">

<?php
if($id!=""){
  echo' 
<table  class="well table table-striper">
<tr><th colspan="4" align="center">SAVED VERSED CASES</th></tr>
<tr><th>Common Law System</th><th>Civil Law System</th><th>Islamic Law</th><th>Any Other System</th></tr>
<tr><td>'. $cls.'</td><td>'.$cvls.'</td><td>'.$isl.'</td> <td>'. $aos.'</td></tr>
</table>';
}
?>


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
// update here......................................................

$common_law_system=$_POST['common_law_system'];
$civil_law_system=$_POST['civil_law_system'];
$islamic_law=$_POST['islamic_law'];
$any_other_system=$_POST['any_other_system'];

$commonsystemDetails=$_POST['commonsystemDetails'];
$civilsystemDetails=$_POST['civilsystemDetails'];
$anyothersystemDetails=$_POST['anyothersystemDetails'];
$islamicLawDetails=$_POST['islamicLawDetails'];
$vdone=1;

if($civil_law_system=="YES"){
    $civilsystemDetails2=$civilsystemDetails;
}else{
    $civilsystemDetails2="";
}

if($common_law_system=="YES"){
    $commonsystemDetails2=$commonsystemDetails;
}else{
    $commonsystemDetails2="";
}

if($islamic_law=="YES"){
    $islamicLawDetails2=$islamicLawDetails;
}
else{
    $islamicLawDetails2="";
}

if($any_other_system=="YES"){
    $anyothersystemDetails2=$anyothersystemDetails;
}else{
    $anyothersystemDetails2="";
}


if ($common_law_system!="" || $civil_law_system!="" || $any_other_system!=""){

        $query="UPDATE  applications SET common_law_system='$common_law_system',
         civil_law_system='$civil_law_system',
         islamic_law='$islamic_law',
         any_other_system='$any_other_system',
         commonsystemDetails='$commonsystemDetails2',
         civilsystemDetails='$civilsystemDetails2',
         islamicLawDetails='$islamicLawDetails2',
         anyothersystemDetails='$anyothersystemDetails2',
         vdone='$vdone',
         updated_at=Now() WHERE id='$id' AND email='$email'";
        $result=mysqli_query($link,$query);
        if($result){

            $_SESSION['preview']='<li class="btn btn-success"> <a href="u_preview.php"> Preview</a></li>';
            $_SESSION['message_type']='success';
            $_SESSION['msg']='Data Saved Successful  ';
            header('Location:versed.php');

        }
        else{

            $_SESSION['message_type']='error';
            $_SESSION['msg']='Error occured while Saving Data  ';
            header('Location:versed.php');

       
        }
}
else{


    
    $_SESSION['message_type']='error';
    $_SESSION['msg']='Please Select at least one of the Law System ';
    header('Location:versed.php');

}



}
ob_end_flush();
?>

