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
if($result){
  $declar=mysqli_fetch_array($result);
 $declaration=$declar['declaration'];
 $declarationname=$declar['full_name'];
}
else{
$declaration='';
$declarationname='';
}

  
$_SESSION['back']='<li style="float:left;" class="btn btn-primary"> <a href="declaration.php"> <i class="fas fa-arrow-circle-left"></i> Back</a></li>';



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

function preview(){

    // window.alert(123);
    var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "afchpr"
});

con.connect(function(err) {
  if (err) throw err;
  window.alert("Connected!");
  var sql = "SELECT * FROM applications WHERE email='nolascomwalongo@gmail.com'";
  con.query(sql, function (err, result) {
    if (err) throw err;
   window.alert("Selected");
  });
});
 }


 
</script>

<style> 

input[type=text] {
  width: 20%;
  padding: 12px 20px;
  margin: 4px 0;
  background:white;
  /* box-sizing: border-box; */
  border: none;
  border-bottom: 2px solid  black;
}
</style>


</head>
<body style="background-color:#006940;">
<div class="container-fluid"> <?php include'include/header.php'; ?>

<!-- <h1> please fill out all your information * this are required fields </h1> -->
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

<li  class="fas fa-sign-out-alt btn btn-danger"> <a href="logout.php">Logout</a> </li>
</ul>
</div>
</div>
        <!-- .................................. all goes here -->
        <?php include'include/messaging/messaging.php' ?>   

<div class="header well"><b>Declaration</b></div>
<form action="" method="POST" data-parsley-validate="">
 <div class="well">
<div class="form-row">
</div>
<div class="form-row">
<div class="form-check form-group">

<?php
if($declaration!=""){
    echo'<b>'. $declarationname.'</b> You  Declared   that the information provided is true and correct. If you called to assist an Applicant before the court 
    You will do it up to the finality of the case and You undertake to be present at the court within a reasonable time as specified time
    as specified by the registrar, as necessary'.' <br> <input class="form-check-input" type="checkbox" id="gridCheck" name="declare"  disabled checked>';
    $chek=' <br> <button type="submit" name="save" class="btn btn-success" disabled> <i class="fas fa-file-signature"></i> Certify </button>';
    $next='<a href="dashboard.php" class="btn btn-primary"> <i class="fas fa-check"></i> Finish</a>';
  $prev= '  <button  type="submit" name="preview" class="btn btn-success" onclick=(preview())> <i class="fas fa-file-eye"></i> Preview </button>';

} 
else{


  echo'  
 <b> I  <input type="text" name="decname"  value="" placeholder="John Doe" required="required"> </b>certify that the information provided is true and correct. If I am called to assist an Applicant before the court 
  I will do it up to the finality of the case and I undertake to be present at the court within a reasonable time as specified time
  as specified by the registrar, as necessary <br><br>

  <b>Note:</b> By ticking the box will be taken as your signature   <b class="text-danger">*</b> &nbsp;&nbsp;
  <input class="form-check-input" type="checkbox" id="gridCheck" name="declare" value="1" required=""> <br>

  ';
  $chek= ' <br> <button type="submit" name="save" class="btn btn-success"> <i class="fas fa-file-signature"></i> Certify </button>';
  $prev= ' <button type="submit" name="preview" class="btn btn-success" onclick=(preview())>  <i class="fas fa-file-eye"></i>  Preview </button>'; 
$next='';
}
?>

      <label class="form-check-label" for="gridCheck">
       
      </label>
      
    </div>
   

  </div>
</div>


<div class="form-row well">
<div class="form-group col-md-6">
<?php echo $chek;?>
</div>
<div class="form-group col-md-6">    
<table class="well" align="right" width="20%">
 <tr>
 <td><a href="attachments.php" class="btn btn-info pull-left"> <i class="fas fa-arrow-circle-left"></i> Back </a></td>
 <td> &nbsp; </td>
 <td> <?php echo $prev; ?></td>
 <td> &nbsp; </td>
 <td> <?php echo $next; ?></td>
 </tr>
 </table>

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
$declare=$_POST['declare'];
$decname=$_POST['decname'];
$ddone=1;
$approve="Notapproved";


if ($declare!="" ){

        $query="UPDATE applications  SET declaration='$declare',decname='$decname',approve='$approve',ddone='$ddone',updated_at=Now() WHERE email='$email'";
        $result=mysqli_query($link,$query);
        if($result){

            $_SESSION['message_type']='success';
            $_SESSION['msg']='Thanks for Certification';
            header('Location:declaration.php');

         
        }
        else{

            $_SESSION['message_type']='error';
            $_SESSION['msg']='Error occured while Certifying ';
            header('Location:declaration.php');

        }
    
}
else{

    $_SESSION['message_type']='error';
    $_SESSION['msg']='Please tick the box to certify ';
    header('Location:declaration.php');

}
}



if(isset($_POST['preview'])){
  header('Location:u_preview.php');

}


ob_end_flush();
?>
