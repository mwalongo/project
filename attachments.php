<?php ob_start();?>

<?php
include'include/header1.php'; 
$qry="SELECT * FROM userlogin WHERE email='$email'";

$result=mysqli_query($link,$qry);
if($result){
  $user=mysqli_fetch_array($result);
  $profile=$user['profile'];
}
?>



<?php
$query="SELECT * FROM attachments WHERE email='$email'";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)){

 while( $attach=mysqli_fetch_array($result)){
  $id=$attach['id'];
 $latter='<a href="attachments/'.$attach['letterfilename'].'">View</a>';
 $bar='<a href="attachments/'.$attach['barfilename'].'">View</a>';
$law='<a href="attachments/'.$attach['lawfilename'].'">View</a>';
$award='<a href="attachments/'.$attach['awardedfilename'].'">View</a>';
$prefessional='<a href="attachments/'.$attach['professionalfilename'].'">View</a>';
$other='<a href="attachments/'.$attach['otherfilename'].'">View</a>';
$barassociationdetails=$attach['Bar_Association_Details'];
// next
$next='<a href="declaration.php" class="btn btn-primary">Next <i class="fas fa-arrow-circle-right"></i></a>';
 }
}
else{
  $id="";
  $latter="";
  $bar="";
 $law="";
 $award="";
 $prefessional="";
 $other="";
 $barassociationdetails="";
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
    <script src="js/parsley.min.js"></script>
    <script>
    
    // A letter informing us that you will accept assignments by the court to represent and indigent Applicant 
function letter(){
var attached_letter = document.getElementById("attached_letter");
attached_letter.onchange = function() {
    if(this.files[0].size > 1000000){
  document.getElementById("lttr").innerHTML='Letter File is too big make sure it is less than 1Mb !';
       this.value = "";       document.getElementById("Button").disabled = true;    }    else {
  var file = document.querySelector("#attached_letter");
  if ( /\.(pdf?)$/i.test(attached_letter.files[0].name) === false )   {  document.getElementById("lttr").innerHTML='Letter File is not a Pdf Format !';  
     this.value = "";  document.getElementById("Button").disabled = true;
  }  else{    document.getElementById("lttr").innerHTML=" ";  
  document.getElementById("Button").disabled = false;   }}};}

// A Certified true copy of attestination or certificate of registration with a Bar Association on 

function bar(){
var attached_bar = document.getElementById("attached_bar");
attached_bar.onchange = function() {
    if(this.files[0].size > 1000000){
  document.getElementById("bar").innerHTML='Attestination File is too big make sure it is  less than 1Mb !';
       this.value = "";       document.getElementById("Button").disabled = true;    }  
         else {
  var file = document.querySelector("#attached_bar");
  if ( /\.(pdf?)$/i.test(attached_bar.files[0].name) === false ) 
    {  document.getElementById("bar").innerHTML='Attestination File is not a Pdf Format !';  
       this.value = "";  document.getElementById("Button").disabled = true;
  }  else{    document.getElementById("bar").innerHTML=" ";  
  document.getElementById("Button").disabled = false;   }}};}

// A Certified true copy of certificate allowing you to practice law.
function law(){
var attached_certificate_law = document.getElementById("attached_certificate_law");
attached_certificate_law.onchange = function() {
    if(this.files[0].size > 1000000){
  document.getElementById("law").innerHTML='Law certificate file  is too big make sure it is  less than  1Mb !';
       this.value = "";       document.getElementById("Button").disabled = true;    }  
         else {
  var file = document.querySelector("#attached_certificate_law");
  if ( /\.(pdf?)$/i.test(attached_certificate_law.files[0].name) === false ) 
    {  document.getElementById("law").innerHTML='File is not a Pdf Format !';   
      this.value = "";  document.getElementById("Button").disabled = true;
  }  else{    document.getElementById("law").innerHTML=" ";  
  document.getElementById("Button").disabled = false;   }}};}






// A Certified true copy of you certificate of law Degree from a University awarded on. 

function award(){
var attached_certificate_awarded = document.getElementById("attached_certificate_awarded");
attached_certificate_awarded.onchange = function() {
    if(this.files[0].size > 1000000){
  document.getElementById("awarded").innerHTML='File is too big make sure it is  less than 1Mb!';
       this.value = "";       document.getElementById("Button").disabled = true;    } 
          else {
  var file = document.querySelector("#attached_certificate_awarded");
  if ( /\.(pdf?)$/i.test(attached_certificate_awarded.files[0].name) === false )  
   {  document.getElementById("awarded").innerHTML='File is not a Pdf Format !';  
      this.value = "";  document.getElementById("Button").disabled = true;
  }  else{    document.getElementById("awarded").innerHTML=" ";  
  document.getElementById("Button").disabled = false;   }}};}



// certificate of good standing issued by your professional Body. 

function professional(){
var attached_certificate_professional = document.getElementById("attached_certificate_professional");
attached_certificate_professional.onchange = function() {
    if(this.files[0].size > 1000000){
  document.getElementById("professional").innerHTML='File is too big make sure it is  less than 1Mb !';
       this.value = "";       document.getElementById("Button").disabled = true;    }  
         else {
  var file = document.querySelector("#attached_certificate_professional");
  if ( /\.(pdf?)$/i.test(attached_certificate_professional.files[0].name) === false ) 
    {  document.getElementById("professional").innerHTML='File is not a Pdf Format !';   
      this.value = "";  document.getElementById("Button").disabled = true;
  }  else{    document.getElementById("professional").innerHTML=" ";  
  document.getElementById("Button").disabled = false;   }}};}



// Other specific (Fore example a document certifying that you have practiced law fo 5 years continuously 
function other(){
var attached_letter = document.getElementById("attached_other_certificate");
attached_other_certificate.onchange = function() {
    if(this.files[0].size > 1000000){
  document.getElementById("other").innerHTML='File is too big make sure it is  less than 1Mb !';
       this.value = "";       document.getElementById("Button").disabled = true;    }  
         else {
  var file = document.querySelector("#attached_other_certificate");
  if ( /\.(pdf?)$/i.test(attached_other_certificate.files[0].name) === false ) 
    {  document.getElementById("other").innerHTML='File is not a Pdf Format !';  
       this.value = "";  document.getElementById("Button").disabled = true;
  }  else{    document.getElementById("other").innerHTML=" ";  
  document.getElementById("Button").disabled = false;   }}};}

</script>

</head>
<body style="background-color:#006940;">
<div class="container-fluid"> <?php include'include/header.php'; ?>
<!-- <h1> please fill out all your information * this are required fields </h1> -->
            <div class="col-md-2 well sidebar-header">
            <div class="">
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

<li  class="fas fa-sign-out-alt btn btn-danger"> <a href="logout.php">Logout</a> </li>
</ul>
</div>
</div>
<?php include'include/messaging/messaging.php' ?>   

        <!-- .................................. all goes here -->

<form  action="" method="POST" enctype="multipart/form-data" data-parsley-validate="">
<input type="hidden" name="id2" value="<?php echo $id ?>">
<div class="well">
<ol type="1">

<div class="well text-danger"> <b>Carefully  attach the appropriate attachment  file should be in  <b>Pdf</b> format </b></>  <b>and size should be  less than 1Mb</b> 

</div>
<div class="form-row">
<div class="form-group col-md-10">
<li><label> A letter informing us that you will accept assignments by the court to represent and indigent Applicant <b class="text-danger"> * </b> </label> </li>
<input type="file" id="attached_letter"  name="attached_letter" required="" onmouseover=(letter())> 
<p id="lttr" class="text-danger"></p>

</div>
<div class="form-group col-md-4">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-10">
<li><label> 
A Certified true copy of attestination or certificate of registration with a Bar Association on <b class="text-danger"> * </b> </label></li>
<input type="file" name="attached_bar" id="attached_bar" required="" onmouseover=(bar())>
<p id="bar" class="text-danger"></p>
<br>Please provide us the name address P.O.BOX telephone ,fax number and email of Your Bar Association. <b class="text-danger"> * </b> <br> 
<textarea id="textarea" rows="2" name="Bar_Association_Details" class="form-control " required=""></textarea>  
</div>

<div class="form-group col-md-4">
<p id="bar" class="text-danger"></p>

</div>
</div>

<div class="form-row">
<div class="form-group col-md-10">
 <li><label> A recent certified true copy of certificate allowing you to practice law.  <b class="text-danger"> * </b> </label> </li> 
<input type="file" id="attached_certificate_law" name="attached_certificate_law" required=""  onmouseover=(law())>
<p id="law" class="text-danger"></p>
</div>
<div class="from-group col-md-4">

</b> 
</div>
</div>


<div class="form-row">
<div class="form-group col-md-10">
 <li><label> A certified true copy of your certificate of law Degree from a University awarded on.</label>  <b class="text-danger"> * </b> </li>
<input type="file" id="attached_certificate_awarded"  name="attached_certificate_awarded" required="" onmouseover=(award())>
<p id="awarded" class="text-danger"></p>
</div>
<div class="from-group col-md-4">

</div>
</div>

<div class="form-row">
  <div class="form-group col-md-10">
    <li> <label> A certificate of good standing issued by your professional Body. <b class="text-danger"> * </b> </label> </li> 
<input type="file" id="attached_certificate_professional" name="attached_certificate_professional" required="" onmouseover=(professional())>
<p id="professional" class="text-danger"></p> 
</div>

<div class="from-group col-md-4">
  </div>
</div>

<div class="form-row">
<div class="form-group col-md-10">
<li><label >  Other-specify (For example a document certifying that you have practiced law for 5 years continuously) <b class="text-danger"> * </b> </label></li>
 <input type="file" id="attached_other_certificate" name="attached_other_certificate" required="" onmouseover=(other())>
 <p id="other" class="text-danger"></p>

</div>
<div class="from-group col-md-4">

</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<td><button id="Button" type="submit" class="btn btn-success" name="save" ><i class="fas fa-save"></i>  SAVE  </button>
<!-- <input type="button" name="SubmitButton" value="Submit" onClick="ValidateForm(this.form)" class="btn btn-success"> -->

</td>
</div>
<div class="form-group col-md-6">    
<table class="well" align="right" width="20%">
 <tr><td><a href="versed.php" class="btn btn-info" > <i class="fas fa-arrow-circle-left"></i> Back </a></td> 
 <td> &nbsp;&nbsp; </td>
 <td> <?php echo $next;?> </td>
 <!-- <button type="submit" class="btn btn-primary" name="save">Next | >></button></td> -->
 </tr>
 </table>
 </ol>
</div>



<table class="table table-striper well">

<tr><th colspan="6" align="center">SAVED ATTACHMENTS</th></tr>
<tr><th> Letter</th> <th>Attestination</th> <th>certificate_practice_law
  </th><th>certificate Degree of law </th><th>professional Body Cerificate</th><th>Certification_Practicing_Law </th> </tr>
 <tr>
 <td> <?php echo $latter;?></td>
 <td> <?php echo $bar;?></td>
 <td> <?php echo $law;?></td>
 <td> <?php echo $award;?></td>
 <td> <?php echo $prefessional;?></td>
 <td> <?php echo $other;?></td>
 <td> <?php echo $barassociationdetails;?></td>
 </tr>
</table>

</form>
        


<div></div>


</div>
</body>
</html>


<?php
include'connection.php';
if(isset($_POST['save']))
{

// $attachedletter=$_POST['attachedletter'];
// $attachedbar=$_POST['attachedbar'];
// $attachedcertificatelaw=$_POST['attachedcertificatelaw'];
// $attachedcertificateawarded=$_POST['attachedcertificateawarded'];
// $attachedcertificateprofessional=$_POST['attachedcertificateprofessional'];
// $attachedothercertificate=$_POST['attachedothercertificate'];
$Bar_Association_Details=$_POST['Bar_Association_Details'];
$id2=$_POST['id2'];



  
  // A letter informing us that you will accept assignments by the court to represent and indigent Applicant .................................
  $attached_letter=$_FILES['attached_letter'];
  $fileName=$_FILES['attached_letter']['name'];
  $fileTmpName=$_FILES['attached_letter']['tmp_name'];
  $fileSize=$_FILES['attached_letter']['size'];
  $fileError=$_FILES['attached_letter']['error'];
  $fileType=$_FILES['attached_letter']['type'];
  
  $fileExt=explode('.',$fileName);
  $fileActualExt=strtolower(end($fileExt));
  $allowed =array('pdf');
  if(in_array($fileActualExt, $allowed)){
  if($fileError===0){
      if($fileSize<1000000){
  $fileNameNew=uniqid('',true).".".$fileActualExt;
  $fileDestination = 'attachments/'.$fileNameNew;
  move_uploaded_file($fileTmpName,$fileDestination);
  
  $letterfilename=$fileNameNew;




  
// Certified true copy of attestination or certificate of registration with a Bar Association on .........................................

$attached_bar=$_FILES['attached_bar'];
$fileName=$_FILES['attached_bar']['name'];
$fileTmpName=$_FILES['attached_bar']['tmp_name'];
$fileSize=$_FILES['attached_bar']['size'];
$fileError=$_FILES['attached_bar']['error'];
$fileType=$_FILES['attached_bar']['type'];

$fileExt=explode('.',$fileName);
$fileActualExt=strtolower(end($fileExt));
$allowed =array('pdf');
if(in_array($fileActualExt, $allowed)){
if($fileError===0){
    if($fileSize<1000000){
$fileNameNew=uniqid('',true).".".$fileActualExt;
$fileDestination = 'attachments/'.$fileNameNew;
move_uploaded_file($fileTmpName,$fileDestination);

$barfilename=$fileNameNew;








  // Certified true copy of certificate allowing you to practice law..........................................................

  $attached_certificate_law=$_FILES['attached_certificate_law'];
  $fileName=$_FILES['attached_certificate_law']['name'];
  $fileTmpName=$_FILES['attached_certificate_law']['tmp_name'];
  $fileSize=$_FILES['attached_certificate_law']['size'];
  $fileError=$_FILES['attached_certificate_law']['error'];
  $fileType=$_FILES['attached_certificate_law']['type'];
  
  $fileExt=explode('.',$fileName);
  $fileActualExt=strtolower(end($fileExt));
  $allowed =array('pdf');
  if(in_array($fileActualExt, $allowed)){
  if($fileError===0){
      if($fileSize<1000000){
  $fileNameNew=uniqid('',true).".".$fileActualExt;
  $fileDestination = 'attachments/'.$fileNameNew;
  move_uploaded_file($fileTmpName,$fileDestination);
  
  $lawfilename=$fileNameNew;





  // Certified true copy of you certificate of law Degree from a University awarded on......................................

  $attached_certificate_awarded=$_FILES['attached_certificate_awarded'];
  $fileName=$_FILES['attached_certificate_awarded']['name'];
  $fileTmpName=$_FILES['attached_certificate_awarded']['tmp_name'];
  $fileSize=$_FILES['attached_certificate_awarded']['size'];
  $fileError=$_FILES['attached_certificate_awarded']['error'];
  $fileType=$_FILES['attached_certificate_awarded']['type'];
  
  $fileExt=explode('.',$fileName);
  $fileActualExt=strtolower(end($fileExt));
  $allowed =array('pdf');
  if(in_array($fileActualExt, $allowed)){
  if($fileError===0){
      if($fileSize<1000000){
  $fileNameNew=uniqid('',true).".".$fileActualExt;
  $fileDestination = 'attachments/'.$fileNameNew;
  move_uploaded_file($fileTmpName,$fileDestination);
  
  $awardedfilename=$fileNameNew;


// certificate of good standing issued by your professional Body.....................................................

$attached_certificate_professional=$_FILES['attached_certificate_professional'];
$fileName=$_FILES['attached_certificate_professional']['name'];
$fileTmpName=$_FILES['attached_certificate_professional']['tmp_name'];
$fileSize=$_FILES['attached_certificate_professional']['size'];
$fileError=$_FILES['attached_certificate_professional']['error'];
$fileType=$_FILES['attached_certificate_professional']['type'];

$fileExt=explode('.',$fileName);
$fileActualExt=strtolower(end($fileExt));
$allowed =array('pdf');
if(in_array($fileActualExt, $allowed)){
if($fileError===0){
    if($fileSize<1000000){
$fileNameNew=uniqid('',true).".".$fileActualExt;
$fileDestination = 'attachments/'.$fileNameNew;
move_uploaded_file($fileTmpName,$fileDestination);

$professionalfilename=$fileNameNew;





// Other specific (Fore example a document certifying that you have practiced law fo 5 years continuously..............................

$attached_other_certificate=$_FILES['attached_other_certificate'];
$fileName=$_FILES['attached_other_certificate']['name'];
$fileTmpName=$_FILES['attached_other_certificate']['tmp_name'];
$fileSize=$_FILES['attached_other_certificate']['size'];
$fileError=$_FILES['attached_other_certificate']['error'];
$fileType=$_FILES['attached_other_certificate']['type'];

$fileExt=explode('.',$fileName);
$fileActualExt=strtolower(end($fileExt));
$allowed =array('pdf');
if(in_array($fileActualExt, $allowed)){
if($fileError===0){
    if($fileSize<1000000){
$fileNameNew=uniqid('',true).".".$fileActualExt;
$fileDestination = 'attachments/'.$fileNameNew;
move_uploaded_file($fileTmpName,$fileDestination);

$otherfilename=$fileNameNew;



if($id2==""){
$sql="INSERT INTO attachments VALUES('','$letterfilename',
'$barfilename','$lawfilename','$awardedfilename',
'$professionalfilename','$otherfilename','$barassociationdetails','$email',Now(),Now())";
$rslt=mysqli_query($link,$sql);
if($rslt){
  // $_SESSION['msg']='<p class="text-info"> Attachments success full Saved</p>';
  header('Location:attachments.php');
}
else{
  // $_SESSION['msg']=mysqli_error($link);
  header('Location:attachments.php');
}

}else{

$query="UPDATE attachments SET 
letterfilename='$letterfilename',
barfilename='$barfilename',
Bar_Association_Details='$Bar_Association_Details',
lawfilename='$lawfilename',
awardedfilename='$awardedfilename',
professionalfilename='$professionalfilename',
otherfilename='$otherfilename',
 updated_at=Now() WHERE email='$email' ";
$result=mysqli_query($link,$query);
if($result){

  $_SESSION['message_type']='success';
  $_SESSION['msg']='Attachments success full Saved ';
  header('Location:attachments.php');

}
else{
  

  $_SESSION['message_type']='error';
  $_SESSION['msg']='Error occured while Saving Data';
  header('Location:attachments.php');
 
}


}



}else{ 
  $_SESSION['message_type']='error';
   $_SESSION['msg']=' Document of certification  file is to big '; 
  header('Location:attachments.php');
}

}else{
  $_SESSION['message_type']='error';
   $_SESSION['msg']= ' There was an error in Uploading Document of certification';
  header('Location:attachments.php');

}
}
else{
  $_SESSION['message_type']='error';
$_SESSION['msg']='you cant apload file of this type as your Document of certification make sure it is in pdf format';
header('Location:attachments.php');

}
}
// certifiaction from professional body
else{ 
  $_SESSION['message_type']='error';
   $_SESSION['msg']=' Your certification  file from professional body is to  is to big  make sure it is 1Mb '; 
    header('Location:attachments.php');
  }
  
  }else{ $_SESSION['msg']= ' There was an error in Uploading Your certification  file from professional body ';
    header('Location:attachments.php');
  
  }
  }
  else{
  $_SESSION['msg']='you cant apload file of this type  as your certificate of degree in Law make sure it is in pdf format';
  header('Location:attachments.php'); 
  }


  
  
  // certificate of degree in law from university
  }else{  $_SESSION['msg']=' your Cerificate of Law  file is to big make sure it is 1Mb '; 
      header('Location:attachments.php');
    }
    
    }else{ $_SESSION['msg']= ' There was an error in Uploading your certificate of law';
      header('Location:attachments.php');
    
    }
    }
    else{
    $_SESSION['msg']='you cant apload file of this type as your certificate of practising law make sure it is pdf file';
    header('Location:attachments.php');
    
    }
  
  
  




  
  
    // certified certicate of practicing law
  
  }else{  $_SESSION['msg']=' your certificate of practising law  is to big  make sure it is 1Mb'; 
      header('Location:attachments.php');
    }
    
    }else{ $_SESSION['msg']= ' There was an error in Uploading your Certificate of practising law';
      header('Location:attachments.php');
    
    }
    }  
    else{
    $_SESSION['msg']='you cant apload file of this type as your Bar Association file  make sure it is pdf format';
    header('Location:attachments.php');
    }
  





  // Bar Association file..............................................

}else{  $_SESSION['msg']=' your Bar Association file file is to big make sure is is 1mb'; 
    header('Location:attachments.php');
  }
  
  }else{ $_SESSION['msg']= ' There was an error in Uploading Bar Association file';
    header('Location:attachments.php');
  
  }
  }
  else{
  $_SESSION['msg']='you cant apload file of this type as your Bar Association file';
  header('Location:attachments.php');
  
  }







  
    // Letter
  
  }else{  $_SESSION['msg']=' your  leter file is to big  make sure it is 1Mb'; 
      header('Location:attachments.php');
    }
    
    }else{ $_SESSION['msg']= ' There was an error in Uploading Letter';
      header('Location:attachments.php');
    
    }
    }
    else{
    $_SESSION['msg']='you cant apload file of this type as your Letter';
    header('Location:attachments.php');
    
    }
  
  
  











}
ob_end_flush();
?>
