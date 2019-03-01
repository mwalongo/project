<?php ob_start();?>

<?php
include'include/header1.php'; 

    $email2=$_GET['email2'];

    $sql="SELECT * FROM applications WHERE email='$email2'"; 
    $rslr=mysqli_query($link,$sql);
    $applicant=mysqli_fetch_array($rslr);
   $id=$applicant['id'];
    $name=$applicant['full_name'];
    $title=$applicant['title'];
    $birthdate=$applicant['birthdate'];
    $nationality=$applicant['nationality'];
    $placeOfBirth=$applicant['placeOfBirth'];
    $district=$applicant['district'];
    $telephone=$applicant['telephone_no'];
    $fax=$applicant['fax_no'];
    $otheremail=$applicant['other_email'];
    $address=$applicant['address'];
    $dialing=$applicant['dialing'];
    
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
    $declaration=$applicant['declaration'];

    if($declaration==1){
      $declare='
      I certify that the information provided is true and correct. If I am called to assist an Applicant before the court 
      I will do it up to the finality of the case and I undertake to be present at the court within a reasonable time as specified time
      as specified by the registrar, as necessary <br>
      ';
      $print='<input type="submit" class="btn btn-danger btn-lg"  value="Print" onclick= (printFunc()) > ';
    }else{
      $declare='    <b>Incomplete Application</b> ';
      $print='';
    }

?>

  <?php
$query="SELECT  min(from_date) as fromDate, max(to_date) as toDate FROM experience WHERE email='$email2'";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)>=1){

$no=1;

 while( $experience=mysqli_fetch_array($result)){
$no ++;

$date1=$experience['fromDate'];
$date2=$experience['toDate'];

$datetime1 = new DateTime($date1);
$datetime2 = new DateTime($date2);

$interval = date_diff($datetime1, $datetime2);
$years=$interval->format('%Y');

 }
}
else{

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Document</title>
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
<li style="float:left;" class="btn btn-primary"><a href="approve.php" ><i class="fas fa-arrow-circle-left"></i> BACK</a></li>
<!-- <li  class="fas fa-print btn-success "> <a href="preview.php">Approve</a></li> -->
<?php 
echo"<li  class=' btn btn-success'> <a href='appr2.php?eml=$email2'>Approve</a> </li>";
?>
<!-- <li  class="fas fa-print btn btn-success"> <a href="preview.php">Approve</a> </li> -->

<li  class="fas fa-sign-out-alt btn btn-danger"> <a href="logout.php">Logout</a> </li>
</ul>
</div>
</div>

<div class="row">
<div class="col-md-12">
<img src="images/header.PNG"  width="100%" alt="">
</div>
</div>

<div class="row">
<div class="col-md-12">
            <?php
            

 echo '

 <table id="print" class="well table table-stripper" border="1">
 <tr><th class="well" >Name of Applicant: &nbsp;&nbsp;'.  $name.' </th> <th class="well" > Title:&nbsp; '. $title .' </th></tr>
 <tr><td class="well" >Date  of Birth: &nbsp;'. $birthdate .'  &nbsp;&nbsp;&nbsp;  Place: '. $placeOfBirth."-". $district.' 
 </td> <td class="well" > Nationality:&nbsp; '. $nationality.' </td></tr>
 <tr><td rowspan="5">Address: <br>
 &nbsp; '. $address.'
  </td> </tr> 
 <tr> <td>Tell: &nbsp; '. $dialing.' '. $telephone.' </td> </tr>
 <tr> <td>Fax: &nbsp; '. $dialing.' '.$fax.' </td> </tr>
  <tr><td>Email: &nbsp;'.' </td></tr>
 <tr> <td>Other Email: &nbsp;  '. $otheremail.' </td> </tr>
 
 
 <tr>
 <th colspan="2" class="well">  Working experiences  <b>'.$years.'</b> </th>
 <tr> <th>No: &nbsp;&nbsp; Time Frame:&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$date1.'&nbsp;&nbsp;<-->&nbsp;&nbsp;'.$date2.'</b>&nbsp;&nbsp;   </th><th> Law Practised </th></tr>
 </tr>'.
 
   '
 <tr>
 </tr>
 
 
 <tr> <th class="well" colspan="2">Have you handled cases on human rights in a regional or international tribunal before ? <br>
 </th> </tr>
 
 <tr><td colspan="2" > '. $cases .'  <br> '.$caseDetails.'</td></tr>
 <tr> <th class="well" colspan="2">Languages :  <br> </th> </tr>
 <tr>
 <td> Arabic : <br> '. $arabic.' <br> '. $arabic_working_language.'</td>
 <td> English : <br> '. $english.' <br>'.$english_working_language.' </td>
 </tr>
 <tr>
 <td>French : <br> '. $french.' <br> '. $french_working_language .' </td> 
 <td> Portuguese : <br> '. $portuguese .' <br> '. $portuguese_working_language .'</td>
 </tr>
 
 <tr> <th class="well" colspan="2"> Are You Versed in : </th> </tr>
 <tr>
 <td>The Common Law System ? :
 <br> '. $common_law_system .'
 <br>'. $commonsystemDetails .' </td>
 <td> The Civil Law system ?
 <br>'. $civil_law_system .'
 <br> '.$civilsystemDetails.'
 </td>
 </tr>
 <tr>
 <td colspan="2">Any other System ?
 <br> '.$any_other_system .'<br> '. $anyothersystemDetails.'
 </td>
 </tr>
 <tr>
 <th colspan="2">Declaration </th> 
 </tr>

 <tr>
  <td colspan="2">
'.$declare.'
 </td>
 </tr>
 
 </table>
 
 
 
 ';
 
             ?>
             </div>

</div>

<hr>

<div class="row">
<h4 class="well">Attacments</h4>


<?php
$query="SELECT * FROM attachments WHERE email='$email2'";
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

</div>

<form action="" method="post">
<?php 
// echo $print;
?>
</form>
            </div>
            </div>
</div>

  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });klhsfkskkfskfslsflfshfsl
    </script>



<script >

function printFunc(){

 var divToPrint = document.getElementById('print');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'solid #000;' +
        'padding;0.5em;' +
        '}' +
        'th:nth-child(9),td:nth-child(9) {' +
        ' display: none;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write("<h3 align='center'>Applicant CV</h3>");
    //  newWin.document.write("<img src='burner.PNG' />");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
}

</script>

</div>
</div>
</body>

</html>

<script>
$(document).ready(function(){
$('#btn_approve').click(function(){
if(confirm("Are You Shure You want to Approve ? ")){
var id=[];

$(':checkbox:checked').each(function(i){
id[i]=$(this).val();
});

if(id.length === 0)//tell you if array is empty
{
alert("please select atleast one Applicant");

}
else{
$.ajax({
    url:'approve.php',
    method:'POST',
    data:{id:id},
     success:function(){
         for(var i=0; i<id.length;   i++)
         {
             $('tr#' +id[i]+'').css('background-color','#ccc');
             $('tr#' +id[i]+'').fadeOut('slow');
         }
     }
});

}
}
else{
    return false;
}
 
});
});
</script>