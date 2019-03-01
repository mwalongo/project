
<?php ob_start();?>
<?php
include'include/header1.php'; 

$qry="SELECT * FROM userlogin WHERE email='$email'";

$result=mysqli_query($link,$qry);
if($result){
  $user=mysqli_fetch_array($result);
  $profile=$user['profile'];
}
$_SESSION['back']='<li style="float:left;" class="btn btn-primary"> <a href="cases.php"> <i class="fas fa-arrow-circle-left"></i> Back</a></li>';

$query="SELECT * FROM applications WHERE email='$email'";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)==1){
  $member=mysqli_fetch_array($result);
$id=$member['id'];
$cass=$member['cases'];
$cses=$member['caseDetails'];
$btn=$member['cadone'];

}
else{
$id="";
$cass="";
$cses="No";
$btn="";

}

if($btn==1){
  $next='<a href="language.php" class="btn btn-primary ">Next <i class="fas fa-arrow-circle-right"></i></a>';
}
else{
  $next="";
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

function myDis(){

 document.getElementById("dis").innerHTML='If Yes  give a deetails below (<i> Required </i>) *'
+"<br>"+' <textarea id="textarea" rows="3" name="caseDetails" class="form-control" required="required"> <?php echo $cses;?> </textarea>'; 
     
}
function myNo(){

document.getElementById("dis").innerHTML='' ; 

}
function myMemb(){

document.getElementById("memb").innerHTML='If Yes  give a deetails below " ( Required )" '
+"<br>"+'<input type="text" name="caseDetails" value=" " class="form-control" required="">'; 
}
 


function ValidateForm(form){
ErrorText= "";

 if((form.arabic[0].checked==false) && (form.arabic[1].checked==false) && (form.arabic[2].checked==false) && (form.arabic[3].checked==false))
{
  document.getElementById("Button").disabled = true;
}
 else if((form.arabic_working_language[0].checked==false) && (form.arabic_working_language[1].checked==false)){
  document.getElementById("Button").disabled = true;
 }
 else if((form.english[0].checked==false) && (form.english[1].checked==false) && (form.english[2].checked==false)&& (form.english[3].checked==false)){
  document.getElementById("Button").disabled = true;
 }

 else if((form.english_working_language[0].checked==false) && (form.english_working_language[1].checked==false)){
  document.getElementById("Button").disabled = true;
 }

 else if((form.french[0].checked==false) && (form.french[1].checked==false)  && (form.french[2].checked==false)  && (form.french[3].checked==false)) {
  document.getElementById("Button").disabled = true;
}
else if((form.french_working_language[0].checked==false) && (form.french_working_language[1].checked==false)) {
  document.getElementById("Button").disabled = true;
}
else if((form.portuguese[0].checked==false) && (form.portuguese[1].checked==false) && (form.portuguese[2].checked==false) && (form.portuguese[3].checked==false)) {
  document.getElementById("Button").disabled = true;
}
else if((form.portuguese_working_language[0].checked==false) && (form.portuguese_working_language[1].checked==false)) {
  document.getElementById("Button").disabled = true;
}

else{
document.getElementById("Button").disabled = false;

}
}

function release(){
  document.getElementById("Button").disabled = false;
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
<li  class=" btn btn-danger"> <i class="fas fa-sign-out-alt"></i> <a href="logout.php">Logout</a> </li>
</ul>
</div>
</div>
<?php include'include/messaging/messaging.php' ?>   

        <!-- .................................. all goes here --> 
     
      

<form action="" method="POST" data-parsley-validate="">
<div class="">

<div class="form-row ">
    <div class="form-group col-md-12 well">
    Have you handled cases on human rights in a regional or international tribunal before  ? <b class="text-danger" style="font-size:18px;" > * </b> <br> <br>
     
     <label> <input type="radio" name="case"  value="Yes" onclick=(myDis()) > Yes  </label>
     <label> <input type="radio" name="case"  value="No" onclick=(myNo()) > No  </label>
      <p id="dis" class="text-danger"></p>
        </div>
    <hr>    
</div>

<div class="form-row well">
<div class="form-group col-md-6">
<button id="Button"  type="submit" class="btn btn-success " name="save" onmousemove="ValidateForm(this.form)"><i class="fas fa-save"></i>  SAVE </button>
</div>
<div class="form-group col-md-6">
<table class="well" align="right" width="20%">
 <tr><td><a href="experience.php" class="btn btn-info "> <i class="fas fa-arrow-circle-left"></i> Back </a></td> 
 <td> &nbsp;&nbsp; </td>
 <td> <?php echo $next;?> </td>
 </tr>
 </table>
</div>
</div>




</form>
<br><br>
<div class="well">
<?php
if($id!=""){
  echo' 
<table  class=" well table table-striper">
<tr><th colspan="4" align="center">LANGUAGES DETAILS</th></tr>
<tr><th>Case</th><th>Cases Summary</th></tr>
<tr><td>'.$cass.'</td><td>'.$cses.'</td></tr>
</table>';
}
?>

</div>
</div>
</p>
</div>
</div>
</body>
</html>


<?php
include'connection.php';
if(isset($_POST['save']))
{
// update here......................................................
$case=$_POST['case'];
$caseDetails=$_POST['caseDetails'];

$cadone=1;

if($case=="Yes"){
  $caseDetails2=$caseDetails;
}
else{
  $caseDetails2="";
}




$query="UPDATE  applications SET cases ='$case', cadone='$cadone', caseDetails='$caseDetails2',
 updated_at=Now() WHERE  email='$email'";
$result=mysqli_query($link,$query);
                 if($result){
                  $_SESSION['preview']='<li class="btn btn-success"> <a href="u_preview.php"> Preview</a></li>';
                  $_SESSION['message_type']='success';
                  $_SESSION['msg']='Saved  successful';
                  header('Location:cases.php');

}
else{

  $_SESSION['message_type']='error';
  $_SESSION['msg']='Error Occured wahile Saving Data ';
  header('Location:cases.php');

}

}
ob_end_flush();
?>

