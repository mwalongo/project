
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
    <link rel="stylesheet" href="include/Pagination/public/css/zebra_pagination.css" type="text/css">
    <script src="js/app.js"></script>
    <script src="js/parsley.min.js" ></script>
    <script src="include/Pagination/public/javascript/zebra_pagination.js"></script>
    <style type="text/css">
	.card {
		height: 260px;
		width: 20%;
		margin-top:10px;
		margin-right:10px;
		float: left
	}
	.page-container {
		margin-top: 20px;
	}
</style>

</head>
<body style="background-color:#006940;">
<div class="container-fluid"> 
<?php include'include/header.php'; 
?>

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
<li style="float:left;" class="btn btn-primary"><a href="dashboard.php" > <i class="fas fa-arrow-circle-left"></i>Back</a></li>
<li  class="btn btn-danger"> <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a> </li>
</ul>
</div>
</div>
        <!-- .................................. all goes here --> 
        <?php include'include/messaging/messaging.php' ?>   

        <?php
        

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM userlogin WHERE type='customer' ORDER BY status_admin DESC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($link, $sql); 
?>
        
        <table class="table table-bordered well">
        <thead>
        <th>S/N</th>
        <th>email</th>
        <th>Status</th>
        <!-- <th>Roles </th> -->
        <th>Administative  Status</th>
        <th>Created_at</th>
        <th>--</th>


        </thead>
        <tbody>
        <?php 
        $n=1;
        while($member=mysqli_fetch_array($rs_result)){
      
        ?>
        <tr>
        <?php $email0=$member['email'];?>
        <td><?php echo $n;?></td>
        <td><?php echo $member['email'];?></td>
        <td><?php echo $member['status'];?></td>
        <td><?php echo $member['status_admin'];?></td>
        <td><?php echo $member['created_at'];?></td>
        <td><?php echo "<a href='manageU.php?email2=$email0' class=''> <i class='fas fa-eye'></i></a>";?></td>
        </tr>
      <?php $n++; };?>
        </tbody>
        
        </table>
                <div class="col-md-10 col-md-offset-1">
               
                <?php
                // include('connection.php');
                //for total count data
                $countSql = "SELECT COUNT(id) FROM userlogin";  
                $tot_result = mysqli_query($link, $countSql);                  
                $row = mysqli_fetch_row($tot_result);  
                $total_records = $row[0];  
                $total_pages = ceil($total_records / $limit);
                $page_link="<ul class='pagination'>";

                 
                   if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):
                    if($i==1):
                      $page_link.="<li  class='page-item active'  id=".$i."><a href='registered.php?page=".$i."'>".$i."</a></li>";

                    else:
                      $page_link.="<li  class='page-item '  id=".$i."><a href='registered.php?page=".$i."'>".$i."</a></li>";

                    endif;
                  endfor;
                endif;

                   
                

            echo $page_link."</ul>";
                ?>
                


</div>
</div>

</div>
</div>
</body>
</html>

</table>

<?php
ob_end_flush();
?>

<script type="text/javascript">
jQuery("#pagination li").on('click',function(e){
 e.preventDefault();
 jQuery("#target-content").html('loading...');
 jQuery("#pagination li").removeClass('active');
 jQuery(this).addClass('active');
        var pageNum = this.id;
        jQuery("#target-content").load("response.php?page=" + pageNum);
});
</script>