
<?php
$email=$_GET['eml'];

// $id=$_GET['id'];
// $id="ewewew";
$approved="Approved";


include'connection.php';
       $sql="UPDATE applications SET approve='$approved', updated_at=Now() WHERE email ='$email'";
    //    $sql="DELETE FROM applications  WHERE id ='".$id."'"; 
       $rslt=mysqli_query($link,$sql);
 if($rslt){
     header('location:approve.php');

 }
 else{
echo mysqli_error($link);
    // header('location:preview.php?email2='.$mail);
 }


?>
