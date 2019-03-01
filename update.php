<?php
include('connection2.php');
if(isset($_POST['hidden_id'])){
    $email=$_POST['email'];
    $status=$_POST['status'];
    $status_admin=$_POST['status_admin'];
    $created_at=$_POST['created_at'];
    $updated_at=$_POST['updated_at'];
    $id=$_POST['hidden_id'];

    for($count = 0; $count< count($id); $count++){
        $data=array(
':email'=>$email[$count],
':status'=>$status[$count],
':status_admin'=>$status_admin[$count],
':created_at'=>$created_at[$count],
':updated_at'=>$updated_at[$count],
        );

        $query=" UPDATE  userlogin SET email=:email, status = :status
        status_admin=:status_admin, updated_at=Now() WHERE id=:id
         ";

          $statement=$connect->prepare($query);
          $statement->execute($data);
    }




}
?>