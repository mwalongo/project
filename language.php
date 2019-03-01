
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
$arbc=$member['arabic'];
$arabicworkinglanguage=$member['arabic_working_language'];
$englsh=$member['english'];
$englishworkinglanguage=$member['english_working_language'];

$frnch=$member['french'];
$frnchworkinglanguage=$member['french_working_language'];
$prtgs=$member['portuguese'];
$prtgsworkinglanguage=$member['portuguese_working_language'];
$lng=$member['language'];

// $cses=$member['caseDetails'];
$btn=$member['ladone'];

}
else{
$id="";
$arbc="";
$arabicworkinglanguage="";
$englsh="";
$englishworkinglanguage="";
$frnch="";
$frnchworkinglanguage="";
$prtgs="";
$prtgsworkinglanguage="";
$lang="";
// $cses="No";
$btn="";

}

if($btn==1){
  $next='<a href="versed.php" class="btn btn-primary ">Next <i class="fas fa-arrow-circle-right"></i></a>';
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

function languageInput(){
  document.getElementById("otherLanguage").innerHTML='If Yes Select the Language below (<i> Required </i>) *'+"<br>"+' <select class="form-control" name="language"> <option value="<?php echo $lng; ?>"><?php echo $lng; ?></option> <?php $sql="SELECT * FROM language "; $rslt=mysqli_query($link,$sql); while($lang=mysqli_fetch_array($rslt)){  echo "<option value=".$lang['name'].">".$lang['name']."</option>";} ?> </select> '; 
  
}
function languageInputRemove(){
document.getElementById("otherLanguage").innerHTML=''; 
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
    Languages : 
  <br>
  <div class="form-group col-md-6">
<b>Arabic <b class="text-danger"> * </b></b> <br><br>
<label > <input type="radio" name="arabic"  value="Mother Tongue /Excellent" onclick=(release()) > Mother Tongue /Excellent </label><br>
<label > <input type="radio" name="arabic"  value="Very Good" onclick=(release()) >Very Good </label><br>
<label > <input type="radio" name="arabic"  value="Working Language" onclick=(release()) > Working Language  </label><br>
<label > <input type="radio" name="arabic"  value="I need an Interpreter" onclick=(release()) > I need an Interpreter  </label>
<hr>
Have you used Arabic as working language before ? <b class="text-danger" > * </b> <br>
<label > <input type="radio" name="arabic_working_language"  value="Yes" onclick=(release()) > Yes </label>
<label > <input type="radio" name="arabic_working_language"  value="No" onclick=(release()) > No </label>
<hr>

</div>
<div class="form-group col-md-6">
<b>English <b class="text-danger"> * </b></b>
<br><br>
<label > <input type="radio" name="english"  value="Mother Tongue /Excellent"onclick=(release())  > Mother Tongue /Excellent </label><br>
<label > <input type="radio" name="english"  value="Very Good" onclick=(release()) >Very Good </label><br>
<label > <input type="radio" name="english"  value="Working Language" onclick=(release())  > Working Language  </label><br>
<label > <input type="radio" name="english"  value="I need an Interpreter" onclick=(release()) > I need an Interpreter  </label>
<hr>
Have you used English as working language before ? <b class="text-danger"> * </b> <br>
<label > <input type="radio" name="english_working_language"  value="Yes" onclick=(release()) > Yes </label>
<label > <input type="radio" name="english_working_language"  value="No" onclick=(release())> No </label>
<hr>
</div>

<div class="form-group col-md-6">
<b>French <b class="text-danger"> * </b></b>
<br><br>
<label > <input type="radio" name="french"  value="Mother Tongue /Excellent" onclick=(release()) > Mother Tongue /Excellent </label><br>
<label > <input type="radio" name="french"  value="Very Good" onclick=(release())>Very Good </label><br>
<label > <input type="radio" name="french"  value="Working Language" onclick=(release())> Working Language  </label><br>
<label > <input type="radio" name="french"  value="I need an Interpreter" onclick=(release())> I need an Interpreter  </label> 
<hr>
Have you used French as working language before ? <b class="text-danger"> * </b> <br>
<label > <input type="radio" name="french_working_language"  value="Yes" onclick=(release())> Yes </label>
<label > <input type="radio" name="french_working_language"  value="No" onclick=(release())> No </label>
<hr>
</div>

<div class="form-group col-md-6">
<b>Portuguese <b class="text-danger"> * </b></b>
<br><br>
<label > <input type="radio" name="portuguese"  value="Mother Tongue /Excellent" onclick=(release())> Mother Tongue /Excellent </label><br>
<label > <input type="radio" name="portuguese"  value="Very Good" onclick=(release())>Very Good </label><br>
<label > <input type="radio" name="portuguese"  value="Working Language" onclick=(release())> Working Language  </label><br>
<label > <input type="radio" name="portuguese"  value="I need an Interpreter" onclick=(release())> I need an Interpreter  </label>
<hr>
Have you used Portuguese as working language before ? <b class="text-danger"> * </b>
<br>
<label > <input type="radio" name="portuguese_working_language"  value="Yes" onclick=(release())> Yes </label>
<label > <input type="radio" name="portuguese_working_language"  value="No" onclick=(release())> No </label>
<hr>
</div>
<div class="form-group col-md-6">
<b>Other Lanuage <b class="text-danger">  </b></b>
<br><br>
<label > <input type="radio" name="otherLaanguage"  value="YES" onclick=(languageInput()) >Yes</label><br>
<label > <input type="radio" name="otherLaanguage"  value="NO" onclick=(languageInputRemove())>No</label><br>
<hr>

</div>
<div class="form-group col-md-6">
<p id="otherLanguage" class="text-danger"></p>
<hr>
</div>
</div>
</div>







<div class="form-row well">
<div class="form-group col-md-6">
<button id="Button"  type="submit" class="btn btn-success " name="save" onmousemove="ValidateForm(this.form)"><i class="fas fa-save"></i>  SAVE </button>
</div>
<div class="form-group col-md-6">
<table class="well" align="right" width="20%">
 <tr><td><a href="cases.php" class="btn btn-info "> <i class="fas fa-arrow-circle-left"></i> Back </a></td> 
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
<tr><th>Arabic</th><td>'. $arbc.'</td></tr>
<tr><th>Have you used Arabic as working language before ? </th><td>'. $arabicworkinglanguage.'</td></tr>

<tr><th>English</th><td>'.$englsh.'</td> </tr>
<tr><th>Have you used English as working language before ? </th><td>'.$englishworkinglanguage.'</td> </tr>

<tr><th>French</th><td>'. $frnch.'</td></tr>
<tr><th>Have you used French as working language before ?</th><td>'. $frnchworkinglanguage.'</td></tr>

<tr><th>Portuguese</th><td>'.$prtgs.'</td></tr>
<tr><th>Have you used Portuguese as working language before ?</th><td>'.$prtgsworkinglanguage.'</td></tr>
<tr><th>Other Language</th><td>'.$lang.'</td></tr>
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
// $case=$_POST['case'];
// $caseDetails=$_POST['caseDetails'];
$arabic=$_POST['arabic'];
$arabic_working_language=$_POST['arabic_working_language'];
$english=$_POST['english'];
$english_working_language=$_POST['english_working_language'];
$french=$_POST['french'];
$french_working_language=$_POST['french_working_language'];
$portuguese=$_POST['portuguese'];
$portuguese_working_language=$_POST['portuguese_working_language'];
$ladone=1;


if($_POST['otherLaanguage']=="YES"){
$otherLaanguage=$_POST['otherLaanguage'];
$language=$_POST['language'];
}
else{
$otherLaanguage=$_POST['otherLaanguage'];
$language=""; 
}


// if($case=="Yes"){
//   $caseDetails2=$caseDetails;
// }
// else{
//   $caseDetails2="";
// }

if($english!=""){
$_english='Mother Tongue /Excellent';
}
else{
 $_english=$english;
}


$query="UPDATE  applications SET  ladone='$ladone', 
otherLaanguage='$otherLaanguage', language='$language',
arabic='$arabic',arabic_working_language='$arabic_working_language',
english='$_english',english_working_language='$english_working_language',
french='$french',french_working_language='$french_working_language',portuguese='$portuguese',
portuguese_working_language='$portuguese_working_language',
 updated_at=Now() WHERE  email='$email'";
$result=mysqli_query($link,$query);
                 if($result){
                  $_SESSION['preview']='<li class="btn btn-success"> <a href="u_preview.php"> Preview</a></li>';
                  $_SESSION['message_type']='success';
                  $_SESSION['msg']='Saved  successful';
                  header('Location:language.php');

}
else{

  $_SESSION['message_type']='error';
  $_SESSION['msg']='Error Occured wahile Saving Data ';
  header('Location:language.php');

}

}
ob_end_flush();
?>

