
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
<li style="float:left;" class="btn btn-primary"><a href="dashboard.php" ><i class="fas fa-arrow-circle-left"></i>BACK</a></li>
<!-- <li  class="fas fa-print btn-info " onclick=(printFunc())>Print</li> -->
<li  class="fas fa-sign-out-alt btn btn-danger"><a href="logout.php">Logout</a> </li>
</ul>
</div>
</div>
        <!-- .................................. all goes here --> 
 
    <table  class="table table-striper well ">
    <?php 
 if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
 $start_from = ($page-1) * $limit;  

$query="SELECT * FROM applications WHERE declaration=''   LIMIT $start_from, $limit";
$rs_result=mysqli_query($link,$query);
if(mysqli_num_rows($rs_result)>0){

    ?>
    <thead> 

<th colspan="7" align="center" style="font-size:42px"> Incomplete Applications</th>

<tr>
<th>No</th>
<th>Name</th>
<th>@ Email</th>
<th>Title</th>
<th>Nationality</th>
<th>Status</th>
<th>View</th>
</tr>
</thead>
<tbody>
<?php

$sn=1;

 while( $member=mysqli_fetch_array($rs_result)){
?>
<tr>
   <td><?php echo   $sn;?></td>
   <td><?php echo $member['full_name']; ?></td>
   <td><?php echo $member['email']; ?></td>
   <td><?php echo $member['title']; ?></td>
   <td><?php echo $member['nationality'];?></td>
   <td class=" text-danger">Incomplete </td>
   <td><?php echo "<a href='incpreview.php?email2=$member[email]' ><i class='fas fa-eye'></i></a>";?></td>
   </tr>
   <?php
$sn ++;

 };

 ?>
 </tbody>
</table>
<div class="col-md-10 col-md-offset-1">
               
               <?php
               // include('connection.php');
               //for total count data
               $countSql = "SELECT COUNT(id) FROM applications";  
               $tot_result = mysqli_query($link, $countSql);                  
               $row = mysqli_fetch_row($tot_result);  
               $total_records = $row[0];  
               $total_pages = ceil($total_records / $limit);
               $page_link="<ul class='pagination'>";

                
                  if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):
                   if($i==1):
                     $page_link.="<li  class='page-item active'  id=".$i."><a href='incompleteA.php?page=".$i."'>".$i."</a></li>";

                   else:
                     $page_link.="<li  class='page-item '  id=".$i."><a href='incompleteA.php?page=".$i."'>".$i."</a></li>";

                   endif;
                 endfor;
               endif;

                  
               

           echo $page_link."</ul>";
            }
            else{
                echo' <tr><td colspan="8" align="center"><h3> Currently there is no Incomplete Applications</h3></td></tr> ';
                
                }
               ?>
               


</div>
</div>
</div>
</body>
</html>

</table>

<?php
include'connection.php';

ob_end_flush();
?>

