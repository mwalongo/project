<?php ob_start();?>

<?php
include'include/header1.php';


?>

<?php

$_SESSION['preview']='<li class="btn btn-success"> <a href="u_preview.php"> Preview</a></li>';

$sql="SELECT * FROM applications WHERE email='$email'";
$_qry=mysqli_query($link,$sql);
$rslt=mysqli_fetch_array($_qry);

// echo $rslt['full_name'];
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
    <style>
      .hdr{
    /* background-color: silver; */
    margin-top:2px;
    background-color:#e6eae9;
    color:black;
    list-style:none;
    text-align:center;
    border-radius:5px;
    padding:1px 0 1px 0;
    font-weight:bold;
  }
    </style>
    <script src="js/app.js"></script>
    <script src="js/parsley.min.js" ></script>
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

            <div class="col-md-10 ">
            <div  class="row">
<div class="col-md-12">
<ul class="menu">
<div class="back">
</div>
<!-- <li style="float:left;" class="btn btn-primary"><a href="declaration.php" ><i class="fas fa-arrow-circle-left"></i> BACK</a></li> -->
<?php if(isset($_SESSION['back'])){     echo $_SESSION['back'];   unset($_SESSION['back']); } ?>
<li  class="fas fa-sign-out-alt btn btn-danger"> <a href="logout.php">Logout</a> </li>
</ul>
</div>
</div>

    <div class="col-md-10 well">
 
    <div class="row">  
    <?php
    if($rslt['pdone']==1){

    }
    else{
        echo '<h3 class="hdr">  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp; </h3>';
    }
    echo'
   <h3  class="hdr"> Personal Details  &nbsp;&nbsp; <i><a href="personal.php"> Edit</a></i> </h3> 
    Full Name:  &nbsp;&nbsp; '. $rslt['full_name'].' <br>
    Title:&nbsp;&nbsp; '.  $rslt['title'].' <br>
    Birthdate:&nbsp;&nbsp; '. $rslt['birthdate'].' <br>
    Nationality:&nbsp;&nbsp;'. $rslt['nationality'].' <br>
    Place Of Birth:&nbsp;&nbsp;'.  $rslt['placeOfBirth'].' <br>'; 
    ?>

    </div>

 
    <div class="row">  
<?php
 if($rslt['cdone']==1){
echo '
<h3 class="hdr"> Contact Details  &nbsp;&nbsp; <i><a href="contact.php"> Edit</a></i> </h3>
Telephone Number:&nbsp;&nbsp; '.$rslt['telephone_no'].' <br>
Fax Number:&nbsp;&nbsp; '. $rslt['fax_no'].' <br>
Email:&nbsp;&nbsp; '. $rslt['email'].' <br>
Other Email:&nbsp;&nbsp;  '. $rslt['other_email'].' <br>
Address:&nbsp;&nbsp;  '. $rslt['address'].'<br>
';
}else{
    echo '<h3 class="hdr">  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp; </h3>';
}
?>
    
 
    </div>

    <div class="row"> 

    <?php
 if($rslt['experience']>=5){
echo '


<h3 class="hdr" >  Relevant Years of Experience <b><u> '. $rslt['experience'].' </u> </b>  &nbsp;&nbsp; <i><a href="experience.php"> Edit</a></i> </h3>
';

$qry="SELECT * FROM experience WHERE email='$email' order by from_date  Desc ";
$results=mysqli_query($link,$qry);
$m=1;
echo '<table class="table">
<tr>
<td>#</td>
<td>Law</td>
<td>From Date</td>
<td>To Date</td>
<td>Summary</td>
</tr>';
while($exp=mysqli_fetch_array($results)){
echo '<tr>
<td>'.$m.'</td>
<td>'.$exp['law'].'</td>
<td>'.$exp['from_date'].'</td>
<td>'.$exp['to_date'].'</td>
<td>'.$exp['summary'].'</td>
</tr>'.
$m++;
}
echo '</table>';


}else{
    echo '<h3 class="hdr">  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp; </h3>';
}
?>

    </div>
<div class="row">
<?php
 if($rslt['cadone']==1){
echo '
<h4 class="hdr" > You have Handel cases on Human Rights in a Regional or International Tribunal before ? <b> <u>'. $rslt['cases'].'</u> </b>  &nbsp;&nbsp; <i><a href="cases.php"> Edit</a></i> </h4> 
    Details &nbsp;&nbsp; <u>'. $rslt['caseDetails'].' </u> <br>
   
    </div>
    <div class="row">
    <h3 class="hdr">Languages :  &nbsp;&nbsp; <i><a href="cases.php"> Edit</a></i> </h3>
     <ol>
      <li>  <input type="checkbox"  name="" id="" checked="checked" readonly="readonly"/> Arabic:&nbsp;&nbsp; '. $rslt['arabic'].' <br>
        have you used Arabic as working language before: ? <input type="checkbox"  name="" id="" checked="checked" readonly="readonly"/>'.$rslt['arabic_working_language'].'<br>
        </li>
        <li>
        <input type="checkbox"  name="" id="" checked="checked" readonly="readonly"/> English:&nbsp;&nbsp; '.$rslt['english'].' <br>
        have you used English as working language before: ? <input type="checkbox"  name="" id="" checked="checked" readonly="readonly"/>'.$rslt['english_working_language'].' <br>
        </li><li>
        <input type="checkbox"  name="" id="" checked="checked" readonly="readonly"/> French:&nbsp;&nbsp;'. $rslt['french'].' <br>
        have you used French as working language before: ? <input type="checkbox"  name="" id="" checked="checked" readonly="readonly"/>'. $rslt['french_working_language'].'<br>
        </li><li>
        <input type="checkbox"  name="" id="" checked="checked" readonly="readonly"/>  Portuguese:&nbsp;&nbsp;'.$rslt['portuguese'].' <br>
        have you used Portuguese as working language before: ? <input type="checkbox"  name="" id="" checked="checked" readonly="readonly"/> '. $rslt['portuguese_working_language'].'<br>
        </li>
        </ol>
';
}else{
    echo '<h3 class="hdr">  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp; </h3>';
}
?>
   
    </div>
    <div class="row">
    <?php
 if($rslt['vdone']==1){
echo '
<h3 class="hdr"> Are You Versed in : &nbsp;&nbsp; <i><a href="versed.php"> Edit</a></i> </h3>
<ol>
<li>The Common Law System ? <br>
<input type="checkbox"  name="" id="" checked="checked" readonly="readonly"/>  &nbsp;&nbsp; '.$rslt['common_law_system'].' <br>
Common Law System Details:   &nbsp;&nbsp; <u> '.$rslt['commonsystemDetails'].'</u>
</li>

<li>The Civil  Law System ? <br>
<input type="checkbox"  name="" id="" checked="checked" readonly="readonly"/>  &nbsp;&nbsp; '.$rslt['civil_law_system'].' <br>
Common Law System Details:   &nbsp;&nbsp;  <u>'.$rslt['civilsystemDetails'].'</u>
</li>

<li>Any Other Law System ? <br>
<input type="checkbox"  name="" id="" checked="checked" readonly="readonly"/>  &nbsp;&nbsp; '.$rslt['any_other_system'].'<br>
Common Law System Details:   &nbsp;&nbsp; <u> '. $rslt['anyothersystemDetails'].'</u> 
</li>


</ol>
<h3 class="hdr">  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp; </h3>
';
}else{
    echo '<h3 class="hdr">  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp; </h3>';
}
?>


</div>

    </div>
    </div>


    </div>
</body>
</html>

<?php


ob_end_flush();
?>
