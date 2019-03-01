<?php ob_start();?>
<?php
include'include/header1.php'; 

$qry="SELECT * FROM userlogin WHERE email='$email'";

$result=mysqli_query($link,$qry);
if($result){
  $user=mysqli_fetch_array($result);
  $profile=$user['profile'];
}
$_SESSION['back']='<li style="float:left;" class="btn btn-primary"> <a href="experience.php"> <i class="fas fa-arrow-circle-left"></i> Back</a></li>';


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


<script src="js/app.js"></script>
<script src="js/parsley.min.js" ></script>
</head>
<body style="background-color:#006940;">
<div class="container-fluid"> <?php include'include/header.php'; ?>
<br>
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
<?php if(isset($_SESSION['preview'])){     echo $_SESSION['preview'];   unset($_SESSION['preview']); } ?>
<li  class="fas fa-sign-out-alt btn btn-danger">  <a href="logout.php">Logout</a> </li>
</ul>
</div>
</div>
<?php include'include/messaging/messaging.php' ?>   

        <!-- .................................. all goes here -->
<div>
<div class=" well"> <b>Do you have at last 5 year`s relevant experience ?</b> <br>
The details will appear in your CV, Below, 
please provide a brief summary of your Activities and number of years of experience in :   </div>
<form action="experience.php" method="POST" ata-parsley-validate="">
<div class="well">


 <div class="form-row">
<div class="form-group col-md-4">
    <label for="inputAddress2">Law <b class="text-danger"> * </b></label>
    <select name="law" class="form-control" required="">
    <option value="">  </option>
    <option value="Human Right Law">Human Right Law</option>
    <option value="Criminal Law">Criminal Law</option>
    <option value="Internation Human Law">Internation Humanitarian Law</option>
    <option value="Internation Law">Internatinal Law</option>
    <option value="Other Law">Other Law</option>
    </select>
</div>

<div class="form-group col-md-4">
<label for="">Start Date <b class="text-danger"> * </b></label>
       <input type="date" name="from_date" id="" class="form-control" required="">
</div>


<div class="form-group col-md-4">
<label for=""> End Date <b class="text-danger"> * </b></label>

        <input type="date" name="to_date" id="" class="form-control" required="">
</div>

</div>
<div class="form-row">
<div class="form-group col-md-12">
    <label for="inputAddress2">Brief summary of your Activity <b class="text-danger"> * </b></label>
    <textarea id="textarea" rows="2" name="summary" class="form-control " required=""></textarea>
</div> 

 <!-- <td><button type="submit" class="btn btn-success" name="save">Add</button></td> -->

</div>

      
  </div>
  <div class="well">
  <?php
$query="SELECT DATEDIFF( to_date,from_date)  AS DateDiff FROM experience WHERE email='$email'";
$result=mysqli_query($link,$query);
$year=0;
if($result){
    while($date=mysqli_fetch_array($result)){
         $year+=$date['DateDiff'];
    }

  $years= (round($year2=$year/366));
}
else
{
    echo mysqli_error($link);
}


// $query="SELECT  min(from_date) as fromDate, max(to_date) as toDate FROM experience WHERE email='$email'";
$query="SELECT  DATEDIFF(month, 'from_date', 'to_date') AS DateDiff FROM experience WHERE email='$email'";
// DATEDIFF(month, '2017/08/25', '2017/10/25') AS DateDiff
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)>=1){

$no=1;
$years=00;

 while( $experience=mysqli_fetch_array($result)){
$no ++;

// $date1=$experience['fromDate'];
echo $years=$experience['DateDiff'];

// $date2=$experience['toDate'];

// $datetime1 = new DateTime($date1);
// $datetime2 = new DateTime($date2);

// $interval = date_diff($datetime1, $datetime2);
// $years=$interval->format('%D');

 }

 echo "<p class='text-danger'>Your Years of Experience is  ". "<b>".$years."</b></p>";  

 if($years>=5){
    $qry="UPDATE  applications SET experience='$years' WHERE  email='$email'";
    $rslt=mysqli_query($link,$qry);
   $next='<a href="cases.php" class="btn btn-primary">Next <i class="fas fa-arrow-circle-right"></i></a>';
 }
 else{
$next='';
 }

}
else{

}
?>
</div>

<div class="form-row well">
<div class="form-group col-md-6">
<button type="submit" class="btn btn-success " name="save"><i class="fas fa-save"></i>  Add </button>
</div>
<div class="form-group col-md-6">
<table class="well" align="right" width="20%"> <tr><td>
 <a href="contact.php" class="btn btn-info " > <i class="fas fa-arrow-circle-left"></i> Back </a></td> 
 <td> &nbsp;&nbsp; </td>
 <td><?php echo $next; ?></td>
 </tr>
 </table>
</div>
</div>

<br>

  </div>
</form>

<div class="well ">
<?php
$query="SELECT * FROM experience WHERE email='$email'";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)>=1){
  echo '<table class="well table table-striper well">';
$no=1;
$years=0;

echo'<tr><th colspan="6" align="center">ADDED  EXPERIENCE</th></tr>';
  echo'<tr><th>S/N</th><th>Law</th><th>From</th> <th>To</th> <th>Summary</th><th></th></tr>';
 while( $experience=mysqli_fetch_array($result)){     
echo'<tr>';
echo'<td>'.$no.'</td>';
echo'<td>'.$experience['law'].'</td>';
echo'<td>'.$experience['from_date'].'</td>';
echo'<td>'.$experience['to_date'].'</td>';
echo'<td>'.$experience['summary'].'</td>';
echo"<td><a href='remove_experience.php?id=$experience[id]' class='text-danger'>X</a></td>";
echo'</tr>';


 echo $years+=$interval;

    
        $date1 = new DateTime($experience['from_Date']);
        $date2 = new DateTime($experience['to_Date']);
        // $interval = $date1->diff($date2);
        $interval = date_diff($date1, $date2);
        $years=$interval->format('%Y'); 
        // echo $years;
        
$no ++;
 }
   echo'
   <tr><td colspan="5"> Your experince' .$years. '</td></tr>
   </table>';


}
else{

}
?>
</div>

</div>
        

           </div>
</div>
</body>
</html>




<?php
include'connection.php';
if(isset($_POST['save']))
{
$law=$_POST['law'];
$from_date=$_POST['from_date'];
$to_date=$_POST['to_date'];
$summary=$_POST['summary'];
$edone=1;



if ($law!="" && $from_date!="" && $to_date!="" && $summary!=""){

        $query="INSERT INTO experience VALUES('','$email','$law','$from_date','$to_date','$summary',Now(),Now())";
        $result=mysqli_query($link,$query);
        if($result){
            $_SESSION['preview']='<li class="btn btn-success"> <a href="u_preview.php"> Preview</a></li>';
            $_SESSION['message_type']='success';
            $_SESSION['msg']='Saved  successful';
            header('Location:experience.php');

          
        }
        else{
            $_SESSION['message_type']='error';
            $_SESSION['msg']='Error occured while Saving';
            header('Location:experience.php');
        }
    
}
else{
    $_SESSION['message_type']='error';
    $_SESSION['msg']=' Please fill all fields';
    header('Location:experience.php');
   
}
}
ob_end_flush();
?>
