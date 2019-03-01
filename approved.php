
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
    <!-- <script src="js/app.js"></script> -->
    <script src="node_modules/jquery/dist/jquery.js"></script>

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
 

$(document).ready(function(){
$('.checkall').on('click',function(){
$(this).closest('table').find(':checkbox').prop('checked',this.checked);
});
$('.check').on('click',function(){
$(this).closest('table').find('.checkall').prop('uncheck',this.uncheck);
});
});

 
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
<li style="float:left;" class="btn btn-primary"><a href="dashboard.php" > <i class="fas fa-arrow-circle-left"></i> BACK</a></li>
<!-- <li  class="fas fa-print btn-info " onclick=(printFunc())>Print</li> -->
<li  class="fas fa-sign-out-alt btn btn-danger"><a href="logout.php">Logout</a> </li>
</ul>
</div>
</div>
        <!-- .................................. all goes here --> 
       <h4 class="well">Approved Lawyers</h4>   
    <table  class="table table-striper well ">
    <?php

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM applications WHERE declaration='1' AND approve='Approved'  ORDER BY experience DESC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($link, $sql); 
if(mysqli_num_rows($rs_result)>0){
?>
 <thead>
<th>No</th><th>@ Email</th><th>Name</th><th>Title</th><th>Experience</th>
<th>Nationality</th> <th>Preview</th> <th>
<input type="checkbox" name="all" id="" class="checkall"> </th>
</thead>
<tbody>
<?php 
$sn=1;
while($member=mysqli_fetch_array($rs_result)){
   
?>

<tr id="<?php echo $member['id']; ?>">
   <td><?php echo $sn; ?></td>
   <td><?php echo $member['email'];?></td>
   <td><?php echo $member['full_name']; ?></td>
   <td><?php echo $member['title'];?></td>
   <td><?php echo $member['experience'];?></td>
   <td><?php echo $member['nationality'];?></td>
   <td><?php echo "<a href='print.php?email2=$member[email]' >  <i class='fas fa-eye'></i></a>";?></td>
   <td> <input type="checkbox" name="customer_id[]" class="delete_customer"  value="<?php echo $member["id"]; ?>"/> </td>
   </tr>
<?php
$sn ++;
};


echo'
<tr><td colspan="8">

<div class="row" align="center">
<div class="col md-12">
<button type="button" name="btn_approve" id="btn_approve" class="btn btn-danger  pull-center"> Disapprove</button>
</div>
</div>
</td>
</tr>
';

?>
</tbody>
</table>

               
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
                     $page_link.="<li  class='page-item active'  id=".$i."><a href='approved.php?page=".$i."'>".$i."</a></li>";

                   else:
                     $page_link.="<li  class='page-item '  id=".$i."><a href='approved.php?page=".$i."'>".$i."</a></li>";

                   endif;
                 endfor;
               endif;

                  
               

           echo $page_link."</ul>";
            }
            else{
echo '<tr><td colspan="8" align="center"><h3> There is no approved Lawyer</h3></td></tr>';

                }
               ?>
               


</div>
   
</div>
</div>
</body>
</html>


<?php

ob_end_flush();
?>


<?php

$approved="Notapproved";


if(isset($_POST["id"]))
{
   foreach($_POST["id"] as $id){
       $sql="UPDATE applications SET approve='$approved', updated_at=Now() WHERE id ='$id'";
    //    $sql="DELETE FROM applications  WHERE id ='".$id."'"; 
       $rslt=mysqli_query($link,$sql);
   } 
   header("Refresh:0");
}

?>

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
    url:'approved.php',
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