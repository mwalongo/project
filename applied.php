
<?php ob_start();?>
<?php
include'include/header1.php'; 

$qry="SELECT * FROM userlogin WHERE email='$email'";

$result=mysqli_query($link,$qry);
if($result){
  $user=mysqli_fetch_array($result);
  $profile=$user['profile'];
}

$query="SELECT * FROM applications WHERE email='$email'";

$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)==1){
  $member=mysqli_fetch_array($result);
$id=$member['id'];
$arbc=$member['arabic'];
$englsh=$member['english'];
$frnch=$member['french'];
$prtgs=$member['portuguese'];
$cses=$member['caseDetails'];

}
else{
$id="";
$arbc="";
$englsh="";
$frnch="";
$prtgs="";
$cses="";

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

 document.getElementById("dis").innerHTML='If Yes  give a deetails below (<i> Required </i>) '
+"<br>"+' <textarea id="textarea" rows="3" name="caseDetails" class="form-control" </textarea>'; 
     
}
function myNo(){

document.getElementById("dis").innerHTML='' ; 

}
function myMemb(){

document.getElementById("memb").innerHTML='If Yes  give a deetails below " ( Required )" '
+"<br>"+'<input type="text" name="caseDetails" value=" " class="form-control" required="">'; 
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
<li style="float:left;" class="btn btn-primary"><a href="dashboard.php" >BACK</a></li>
<!-- <li  class="fas fa-print btn-info " onclick=(printFunc())>Print</li> -->
<li  class="fas fa-print btn btn-danger"> <a href="logout.php">Logout</a> </li>
</ul>
</div>
</div>
        <!-- .................................. all goes here --> 
<?php
// $query="SELECT a.*, u.* FROM  applications a , userlogin u   WHERE u.email=a.email  AND u.type='customer' AND  ORDER BY 'desc' ";

$query="SELECT * FROM applications WHERE declaration='1'  ORDER BY experience DESC";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)>0){
    echo'
    <table  class="table table-striper well ">
<tr>
<th colspan="5" align="center" style="font-size:42px"> Applied Lawyers</th></tr>
<tr><td>No</td><td>Name</td><td>@ Email</td><td>Title</td><td>Experience</td><td>Nationality</td><td><b style="font-size:32px"> ... <b></td></tr>

    ';
$sn=1;

 while( $member=mysqli_fetch_array($result)){



echo '<tr>
   <td>'.$sn.'</td>
   <td>'.$member['full_name'].'</td>
   <td>'.$member['email'].'</td>
   <td>'.$member['title'].'</td>
   <td>'.$member['experience'].'</td>
   <td>'.$member['nationality'].'</td>
   
   '.'</td>';
  echo " <td><a href='print.php?email2=$member[email]' class='btn btn-info'> Preview</a></td></tr>";
$sn ++;

 }

}
else{
echo '<h3> There is no one registered</h3>';
}
?>     



</div>
</div>
</body>
</html>

</table>

<?php
include'connection.php';

ob_end_flush();
?>

