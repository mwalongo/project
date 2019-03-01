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

                include'sidebar.php';
                
                ?>
            </div>
            <div class="col-md-10">
        <?php
include'connection.php';
$sql="SELECT u.*, a.* FROM userlogin u, applications a  WHERE u.email='$email2' && a.email='$email2'";
$qry=mysqli_query($link, $sql);
if(mysqli_num_rows($qry)){
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
 $status=$applicant['status'];
 $declaration=$applicant['declaration'];

 $cases=$applicant['cases'];
$caseDetails=$applicant['caseDetails'];
$arabic=$applicant['arabic'];
$arabic_working_language=$applicant['arabic_working_language'];
$french=$applicant['french'];
$french_working_language=$applicant['french_working_language'];
$english=$applicant['english'];
$english_working_language=$applicant['english_working_language'];
$portuguese=$applicant['portuguese'];
$portuguese_working_language=$applicant['portuguese_working_language'];
//  $name=$applicant['full_name'];

  $common_law_system=$applicant['common_law_system'];
  $civil_law_system=$applicant['civil_law_system'];
  $any_other_system=$applicant['any_other_system'];
 $commonsystemDetails=$applicant['commonsystemDetails'];
 $civilsystemDetails=$applicant['civilsystemDetails'];
 $anyothersystemDetails=$applicant['anyothersystemDetails'];




}
else{


  $name=' <i> Null </i>';
  $title=' <i> Null </i>';
  $birthdate=' <i> Null </i>';
  $nationality=' <i> Null </i>';
  $placeOfBirth='<i> Null </i>';
  $district=' <i> Null </i>';
  $telephone='<i> Null </i>';
  $fax='<i> Null </i>';
 $_email=' <i> Null </i>';
  $otheremail=' <i> Null </i>';
  $address='<i> Null </i>';
  $dialing=' <i> Null </i>';
  $declaration=' <i> Null </i>';
  $type='<i> Null  </i> ';
  $status=' <i> Null </i>';


}
?>
<form action="" method="post">
<div  class="form-row well" >
<div class="col-md-6">
<a href="registered.php" class="btn bt-lg btn-primary"> <i class="fas fa-arrow-circle-left"></i>BACK</a>
</div>
</div>
          

        <div class="form-row well">
        <table  class="well table table-stripper table-bordered">
<tr><th class="well" >Name of Applicant: &nbsp;&nbsp; <?php echo $name; ?> </th> <th class="well" > Title:&nbsp; <?php echo $title; ?> </th></tr>
<tr><td class="well" >Date  of Birth: &nbsp;<?php echo $birthdate; ?>,  &nbsp;&nbsp;&nbsp;  Place: <?php echo $placeOfBirth."-". $district; ?> 
</td> <td class="well" > Nationality:&nbsp; <?php echo $nationality; ?> </td></tr>
<tr><td rowspan="5">Address: <br>
&nbsp; <?php echo $address; ?>
 </td> </tr> 
<tr> <td>Tell: &nbsp; <?php echo $dialing.' '. $telephone; ?> </td> </tr>
<tr> <td>Fax: &nbsp; <?php echo $dialing.' '.$fax; ?> </td> </tr>
 <tr><td>Email: &nbsp; <?php echo $_email; ?> </td></tr>
<tr> <td>Other Email: &nbsp;  <?php echo $otheremail; ?> </td> </tr>


<tr>
<th colspan="2" class="well">  <b>  Experience at least 5 years </b> <br> </th>
<tr> <th>No: &nbsp;&nbsp; Time Frame:</th><th> Law Practised </th></tr>
</tr>
<?php
include'connection.php';
$ql="SELECT from_date, to_date, law, min(from_date) as fromDate, max(to_date) as toDate  FROM experience WHERE email='$email2'";

$sqry=mysqli_query($link, $ql);
if(mysqli_num_rows($sqry)>=1){
  $sn=1;
  

  echo'
 
  ';
while($experience=mysqli_fetch_array($sqry)){
  $date1=$experience['fromDate'];
$date2=$experience['toDate'];

$datetime1 = new DateTime($date1);
$datetime2 = new DateTime($date2);

$interval = date_diff($datetime1, $datetime2);
$years=$interval->format('%Y');

  echo'
   <tr> <td>'. $sn.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '. $from=$experience['from_date'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<:>&nbsp;&nbsp; &nbsp;'.$to=$experience['to_date'].
  '</td><td>'. $law=$experience['law']. '</td>
  </tr>';
  $sn++;
} 
 
}
else{
  $years="";
  echo'
  <tr><td>'.$sn="".$law="".'</td>'.
  '<td>'. $from="".'&nbsp;<:> &nbsp;'.$to="".'</td>'.
  '<td>'. $summary="".'</td>
  </tr>';
  
}

  ?>
<tr>
<td colspan="2" >Total Years of Experience in Practising Law : <u> <b><?php echo $years; ?> </b> </u> </td>

</tr>


<tr> <th class="well" colspan="2">Have you handled cases on human rights in a regional or international tribunal before ? <br>
</th> </tr>

<tr><td colspan="2" > <?php echo $cases; ?>  <br> <?php echo $caseDetails; ?></td></tr>
<tr> <th class="well" colspan="2">Languages :  <br> </th> </tr>
<tr>
<td> Arabic : <br> <?php echo $arabic;?> <br> <?php echo $arabic_working_language; ?></td>
<td> English : <br> <?php echo $english; ?> <br> <?php echo $english_working_language; ?> </td>
</tr>
<tr>
<td>French : <br> <?php echo $french; ?> <br> <?php echo $french_working_language; ?> </td> 
<td> Portuguese : <br> <?php echo $portuguese; ?> <br> <?php echo $portuguese_working_language; ?></td>
</tr>

<tr> <th class="well" colspan="2"> Are You Versed in : </th> </tr>
<tr>
<td>The Common Law System ? :
<br> <?php echo $common_law_system; ?>
<br> <?php echo $commonsystemDetails; ?> </td>
<td> The Civil Law system ?
<br> <?php echo $civil_law_system; ?>
<br> <?php echo $civilsystemDetails; ?>
</td>
</tr>
<tr>
<td colspan="2">Any other System ?
<br> <?php echo $any_other_system; ?><br> <?php echo $anyothersystemDetails; ?>
</td>
</tr>


<tr>
<td colspan="2">
<?php 
if($declaration ==1){
$declare= "Declare";

echo 'I <b> '. $declare .' </b> that the information provided is true and correct. If I am called to assist an Applicant before the court 
I will do it up to the finality of the case and I undertake to be present at the court within a reasonable time as specified time
as specified by the registrar, as necessary <br>';
}
else{
$declare='Not Declared';

echo '<h2 class="text-danger"> '.$declare.'</h2>';
}
?> 

</td>
</tr>
<?php echo "<a href='print.php?email2=$applicant[email]' class='btn btn-danger'> Printer</a>" ?>

</table>

        </div>    
            </div>
            </div>
</div>



</form>
  
</body>
</html>