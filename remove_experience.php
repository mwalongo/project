<?php ob_start();?>
<?php
include'include/header1.php'; 

?>
<div class="container-fluid"> <?php include'include/header.php'; ?>

                <?php
                include'sidebar.php';
                ?>
<?php include'include/messaging/messaging.php' ?>   


<?php
include'connection.php';
if(isset($_GET['id']))
{
  $id=$_GET['id'];
 
    $query="DELETE FROM experience WHERE id='$id'";
    $result=mysqli_query($link,$query);
    if($result){
        
    $_SESSION['message_type']='success';
    $_SESSION['msg']=' Experience succesful Removed ';
    header('Location:experience.php');
    

    }
    else{
      
        $_SESSION['message_type']='error';
        $_SESSION['msg']=mysqli_error($link);
        header('Location:experience.php');
    }      

}
ob_end_flush();
?>